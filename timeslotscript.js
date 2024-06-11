// script.js
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('schedule-container');
    const days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    const timeSlots = [
        '8-9 AM', '9-10 AM', '10-11 AM', '11 AM-12 PM', 
        '1-2 PM', '2-3 PM', '3-4 PM'
    ];

    days.forEach(day => {
        let dayContainer = document.createElement('div');
        dayContainer.classList.add('day-container');
        let dayLabel = document.createElement('div');
        dayLabel.textContent = day;
        dayLabel.classList.add('day-label');
        dayContainer.appendChild(dayLabel);

        timeSlots.forEach(time => {
            let slot = document.createElement('div');
            slot.classList.add('time-slot');
            slot.textContent = time;
            dayContainer.appendChild(slot);

            slot.addEventListener('click', function() {
                this.classList.toggle('selected');
            });
        });

        container.appendChild(dayContainer);
    });
});
