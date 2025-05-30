<?php get_header(); ?>

<?php
$current_month = date('m');
$current_year = date('Y');
$days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);
?>

<div id="calendar-wrapper">
  <button id="prev-month">&lt;</button>
  <span id="calendar-title"></span>
  <button id="next-month">&gt;</button>
  <div class="calendar-weekdays">
    <div data-key="monday"></div>
    <div data-key="tuesday"></div>
    <div data-key="wednesday"></div>
    <div data-key="thursday"></div>
    <div data-key="friday"></div>
    <div data-key="saturday"></div>
    <div data-key="sunday"></div>
  </div>
  <p datakey="calendar_info"></p>
  <div class="calendar-grid" id="calendar-grid"></div>
</div>

<div class="booking-form-container">
  <form class="booking-form" method="post">
    <h2 data-key="form_title"></h2>
    <p data-key="form_subtitle"></p>

    <label for="full_name" data-key="form_name"></label>
      <input type="text" name="full_name" required>

    <label for="email" data-key="form_email"></label>
      <input type="email" name="email" required>
    

    <label for="phone" data-key="form_phone"></label>
      <input type="tel" name="phone" required>
    

      <label for="arrival_time" data-key="form_arrival"></label>
        <input type="time" name="arrival_time">
      

    <label for="guests" data-key="form_guests"></label>
      <input type="number" name="guests" min="1">
    

    <label for="pets" data-key="form_pets"></label>
      <select name="pets">
        <option value="No" data-key="form_yes"></option>
        <option value="Yes" data-key="form_no"></option>
      </select>

    <label for="misc" data-key="form_misc"></label>
      <textarea name="misc" placeholder="..."></textarea>

    <input type="hidden" name="booking_start" id="booking_start" required>
    <input type="hidden" name="booking_end" id="booking_end" required>
    <input type="hidden" name="booking_date" id="booking_date" required>

    <button type="submit" name="submit_booking" class="submit-btn" data-key="form_submit"></button>
  </form>
</div>

<?php
  global $wpdb;
  $table = $wpdb->prefix . 'custom_bookings';

  $results = $wpdb->get_results("SELECT booking_start, booking_end FROM $table");

  $bookedDates = [];

  foreach ($results as $row) {
      $start = new DateTime($row->booking_start);
      $end = new DateTime($row->booking_end);
      $interval = new DateInterval('P1D');
      $period = new DatePeriod($start, $interval, $end->modify('+1 day'));

      foreach ($period as $date) {
          $bookedDates[] = $date->format('Y-m-d');
      }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_booking'])) {
    $wpdb->insert($table, [
      'booking_start' => sanitize_text_field($_POST['booking_start']),
      'booking_end'   => sanitize_text_field($_POST['booking_end']),
      'full_name'    => sanitize_text_field($_POST['full_name']),
      'email'         => sanitize_email($_POST['email']),
      'phone'         => sanitize_text_field($_POST['phone']),
      'arrival_time'  => sanitize_text_field($_POST['arrival_time']),
      'guests'        => intval($_POST['guests']),
      'pets'          => sanitize_text_field($_POST['pets']),
      'misc'          => sanitize_textarea_field($_POST['misc']),
    ]);

    wp_redirect(add_query_arg('booking_success', '1', get_permalink()));
    exit;
  }
  ?>
  <?php if (isset($_GET['booking_success']) && $_GET['booking_success'] === '1') : ?>
  <div class="booking-message-overlay" id="bookingMessage">
    <div class="booking-message">
      <button class="close-message" onclick="document.getElementById('bookingMessage').style.display='none'">&times;</button>
      <h2 data-key="message_title">Thank you for your booking!</h2>
      <p data-key="message_text">We`ve received your request. You will get a confirmation email shortly.</p>
      <p data-key="message_instruction">If you need to make changes, please contact us directly.</p>
    </div>
  </div>
  <?php endif; ?>

<script>
  const bookedDates = <?php echo json_encode($bookedDates); ?>
</script>

</main>

<?php get_footer(); ?>