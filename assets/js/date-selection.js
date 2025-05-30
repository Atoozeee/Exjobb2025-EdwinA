let selectedDates = [];
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

function buildCalendar(month, year) {
  const grid = document.getElementById('calendar-grid');
  const title = document.getElementById('calendar-title');
  grid.innerHTML = '';
  title.textContent = new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' });

  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const firstDay = new Date(year, month, 1).getDay();
  const offset = (firstDay === 0) ? 6 : firstDay - 1;

  for (let i = 0; i < offset; i++) {
    const emptyCell = document.createElement('div');
    emptyCell.classname = 'calendar-day empty';
    grid.appendChild(emptyCell);
  }

  for (let day = 1; day <= daysInMonth; day++) {
    const dateStr = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
    const cell = document.createElement('div');
    cell.className = 'calendar-day';
    cell.textContent = day;
    cell.dataset.date = dateStr;

    if (bookedDates.includes(dateStr)) {
      cell.classList.add('booked');
      cell.title = 'Booked';
    } else {
      cell.addEventListener('click', () => handleDateClick(cell));
    }

    grid.appendChild(cell);

  }
}

function handleDateClick(cell) {
  const date = cell.dataset.date;

  if (bookedDates.includes(date)) return;

  if (selectedDates.length === 2) {
    selectedDates = [];
    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
  }

  selectedDates.push(date);
  selectedDates.sort(); 
  cell.classList.add('selected');

  if (selectedDates.length === 2) {
    const diffDays = (new Date(selectedDates[1]) - new Date(selectedDates[0])) / (1000 * 60 * 60 * 24);

    if (diffDays > 13) {
      alert('Maximum of 14 days allowed!');
      selectedDates = [];
      document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
      return;
    }

    if (rangeIncludesBookedDates(selectedDates[0], selectedDates[1])) {
      alert('One or more selected dates are already booked.');
      selectedDates = [];
      document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('selected'));
      return;
    }

    highlightRange();
  }

  document.getElementById('booking_start').value = selectedDates[0] || '';
  document.getElementById('booking_end').value = selectedDates[1] || '';
}

function highlightRange() {
  const allCells = document.querySelectorAll('.calendar-day');
  allCells.forEach(cell => {
    const cellDate = cell.dataset.date;
    if (cellDate >= selectedDates[0] && cellDate <= selectedDates[1] && !bookedDates.includes(cellDate)) {
      cell.classList.add('selected');
    }
  });
}

function rangeIncludesBookedDates(start, end) {
  const startDate = new Date(start);
  const endDate = new Date(end);
  for (let d = new Date(startDate); d <= endDate; d.setDate(d.getDate() + 1)) {
    const formatted = d.toISOString().split('T')[0];
    if (bookedDates.includes(formatted)) return true;
  }
  return false;
}

document.getElementById('prev-month').addEventListener('click', () => {
  currentMonth--;
  if (currentMonth < 0) {
    currentMonth = 11;
    currentYear--;
  }
  buildCalendar(currentMonth, currentYear);
});

document.getElementById('next-month').addEventListener('click', () => {
  currentMonth++;
  if (currentMonth > 11) {
    currentMonth = 0;
    currentYear++;
  }
  buildCalendar(currentMonth, currentYear);
});

buildCalendar(currentMonth, currentYear);

