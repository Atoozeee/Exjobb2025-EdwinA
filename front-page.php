<?php get_header(); ?>

<main class="front-page">
  <section class="hero-carousel">
    <div class="carousel-text">
        <h1 data-key="hero_title"></h1>
        <p data-key="hero_tagline"></p>
    </div>
    <div class="slides">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-2.jpg" alt="Slide 1">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-10.jpg" alt="Slide 9">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-11.jpeg" alt="Slide 2">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-9.jpg" alt="Slide 3">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-3.jpg" alt="Slide 4">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-5.jpg" alt="Slide 5">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-6.jpg" alt="Slide 6">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-7.jpg" alt="Slide 7">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/stugan-hero-8.jpg" alt="Slide 8">
    </div>
    <div class="carousel-controls">
      <button id="pauseBtn" aria-label="Pause Carousel">⏸</button>
      <div class="dots"></div>
    </div>
  </section>

  <div class="arrow-container">
    <a class="arrow-a" href="#info">
      <div class="arrow-down"></div>
    </a>
  </div>

  <section id="info">
    <main class="about-page">
  <section class="info-section">
    <div class="info-content">
      <div class="text">
          <h2 data-key="about_title_1"></h2>
          <p data-key="about_1"></p>
      </div>
      <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cabin/faraway.jpeg" alt="Image from far away">
      </div>
    </div>
  </section>

  <section class="info-section alt">
    <div class="info-content reverse">
      <div class="text">
        <h2 data-key="about_title_2"></h2>
        <p data-key="about_2"></p>
      </div>
      <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cabin/outsidedecor.jpeg" alt="Outside Decor">
      </div>
    </div>
  </section>

   <section class="info-section">
    <div class="info-content">
      <div class="text">
        <h2 data-key="about_title_3"></h2>
        <p data-key="about_3"></p>
      </div>
      <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cabin/livingroom.jpeg" alt="Living Room">
      </div>
    </div>
  </section>

  <section class="info-section alt">
    <div class="info-content reverse">
      <div class="text">
        <h2 data-key="about_title_4"></h2>
        <p data-key="about_4"></p>
      </div>
      <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cabin/pier.jpeg" alt="Pier">
      </div>
    </div>
  </section>

  <section class="info-section">
    <div class="info-content">
      <div class="text">
        <h2 data-key="about_title_5"></h2>
        <p data-key="about_5"></p>
      </div>
      <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cabin/pateo.jpeg" alt="Bathroom">
      </div>
    </div>
  </section>

  <section class="info-section alt">
    <div class="info-content reverse">
      <div class="text">
        <h2 data-key="about_title_6"></h2>
        <p data-key="about_6"></p>
      </div>
      <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cabin/lillstugan.jpg" alt="Small Cabin">
      </div>
    </div>
  </section>

  <section class="info-section">
    <div class="info-content">
      <div class="text">
        <h2 data-key="about_title_7"></h2>
        <p data-key="about_7"></p>
      </div>
      <div class="image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/area/stream.jpeg" alt="Stream">
      </div>
    </div>
  </section>
</main>
  </section>

</main>

<?php get_footer(); ?>