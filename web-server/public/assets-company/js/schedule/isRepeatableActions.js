document.getElementById('isRepeatable').addEventListener('change', function () {
    var dateRange = document.getElementById('dateRange');
    var weekdays = document.getElementById('weekdays');

    if (this.checked) {
        dateRange.style.display = 'none';
        weekdays.style.display = 'block';
    } else {
        dateRange.style.display = 'block';
        weekdays.style.display = 'none';
    }
});
