<style>
    body {
        background-color: #1a1a1a;
        color: white;
    }
    .logo-container {
        width: 150px;
        margin: 0 auto;
    }
    .back-arrow {
        color: #9ed84b;
        font-size: 2rem;
        cursor: pointer;
    }
    .availability-container {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }
    .calendar {
        background: white;
        color: #333;
        border-radius: 8px;
        padding: 15px;
        margin: 20px 0;
    }
    .calendar th {
        padding: 10px;
        text-align: center;
    }
    .calendar td {
        padding: 10px;
        text-align: center;
        cursor: pointer;
    }
    .calendar .today {
        background-color: #007bff;
        color: white;
        border-radius: 50%;
    }
    .calendar .selected {
        background-color: #28a745;
        color: white;
        border-radius: 50%;
    }
    .form-control, .form-select {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid #ced4da;
    }
    .month-selector {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    .month-selector button {
        background: none;
        border: none;
        font-size: 1.5rem;
        color: #333;
        cursor: pointer;
    }
</style>
<div class="container py-4">
    <div class="availability-container">
        <h1 class="text-center mb-4">GESTIONAR DISPONIBILIDAD</h1>

        <div class="row mb-3">
            <div class="col-12 mb-3">
                <label class="mb-2">Glamping</label>
                <select class="form-select" id="glampingAvailability">
                    <option selected value="available">Disponible</option>
                    <option value="unavailable">No Disponible</option>
                </select>
            </div>
            <div class="col-12">
                <label class="mb-2">Áreas comunes</label>
                <select class="form-select" id="commonAreasAvailability">
                    <option value="available">Disponible</option>
                    <option selected value="unavailable">No Disponible</option>
                </select>
            </div>
        </div>

        <div class="calendar" id="calendar">
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <select class="form-select" id="hourSelect">
                    <option selected disabled>Hora</option>
                </select>
            </div>
            <div class="col-6">
                <select class="form-select" id="minuteSelect">
                    <option selected disabled>Minutos</option>
                    <option value="00">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                </select>
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-primary btn-lg px-5" id="updateAvailability">Actualizar Disponibilidad</button>
        </div>
    </div>
</div>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendar = document.getElementById('calendar');
            const hourSelect = document.getElementById('hourSelect');
            const updateButton = document.getElementById('updateAvailability');
            const glampingSelect = document.getElementById('glampingAvailability');
            const commonAreasSelect = document.getElementById('commonAreasAvailability');

            let currentDate = new Date();
            let selectedDates = [];

            function generateCalendar(year, month) {
                const firstDay = new Date(year, month, 1);
                const lastDay = new Date(year, month + 1, 0);
                let html = `
                    <div class="month-selector">
                        <button id="prevMonth">&lt;</button>
                        <h5>${firstDay.toLocaleString('default', { month: 'long', year: 'numeric' })}</h5>
                        <button id="nextMonth">&gt;</button>
                    </div>`;
                html += '<table class="table table-bordered">';
                html += '<thead><tr><th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sá</th><th>Do</th></tr></thead>';
                html += '<tbody>';

                let date = new Date(firstDay);
                date.setDate(date.getDate() - (date.getDay() === 0 ? 6 : date.getDay() - 1));

                while (date <= lastDay || date.getDay() !== 1) {
                    html += '<tr>';
                    for (let i = 0; i < 7; i++) {
                        const currentDate = new Date(date);
                        const isToday = currentDate.toDateString() === new Date().toDateString();
                        const isSelected = selectedDates.some(d => d.toDateString() === currentDate.toDateString());
                        const isCurrentMonth = currentDate.getMonth() === month;

                        html += `<td class="${isToday ? 'today' : ''} ${isSelected ? 'selected' : ''} ${isCurrentMonth ? '' : 'text-muted'}" data-date="${currentDate.toISOString()}">`;
                        html += currentDate.getDate();
                        html += '</td>';
                        date.setDate(date.getDate() + 1);
                    }
                    html += '</tr>';
                }

                html += '</tbody></table>';
                calendar.innerHTML = html;

                calendar.querySelectorAll('td').forEach(cell => {
                    cell.addEventListener('click', function() {
                        const date = new Date(this.dataset.date);
                        const index = selectedDates.findIndex(d => d.toDateString() === date.toDateString());
                        if (index > -1) {
                            selectedDates.splice(index, 1);
                            this.classList.remove('selected');
                        } else {
                            selectedDates.push(date);
                            this.classList.add('selected');
                        }
                    });
                });

                document.getElementById('prevMonth').addEventListener('click', () => {
                    currentDate.setMonth(currentDate.getMonth() - 1);
                    generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                });

                document.getElementById('nextMonth').addEventListener('click', () => {
                    currentDate.setMonth(currentDate.getMonth() + 1);
                    generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
                });
            }

            function populateHourSelect() {
                for (let i = 0; i < 24; i++) {
                    const option = document.createElement('option');
                    option.value = i.toString().padStart(2, '0');
                    option.textContent = i.toString().padStart(2, '0');
                    hourSelect.appendChild(option);
                }
            }

            generateCalendar(currentDate.getFullYear(), currentDate.getMonth());
            populateHourSelect();

            updateButton.addEventListener('click', function() {
                const glampingAvailability = glampingSelect.value;
                const commonAreasAvailability = commonAreasSelect.value;
                const selectedHour = hourSelect.value;
                const selectedMinute = minuteSelect.value;

                console.log('Glamping Availability:', glampingAvailability);
                console.log('Common Areas Availability:', commonAreasAvailability);
                console.log('Selected Dates:', selectedDates.map(d => d.toDateString()));
                console.log('Selected Time:', `${selectedHour}:${selectedMinute}`);

                alert('Disponibilidad actualizada');
            });
        });
    </script>