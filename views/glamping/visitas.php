<style>
    body {
        background-color: #1a1a1a;
        color: white;
        min-height: 100vh;
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
    .visit-container {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }
    .form-control, .form-select {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid #ced4da;
    }
    .date-selects .form-select {
        width: auto;
        display: inline-block;
        margin-right: 10px;
    }
</style>
<div class="container py-4">

    <div class="visit-container">
        <h1 class="text-center mb-4">REGISTRAR VISITA</h1>

        <form id="visitForm">
            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre del visitante" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" required>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Correo electrónico" required>
            </div>

            <div class="mb-3">
                <input type="tel" class="form-control" id="telefono" placeholder="Teléfono de contacto" required>
            </div>

            <div class="mb-3 date-selects">
                <label class="form-label">Fecha de visita</label>
                <div>
                    <select class="form-select" id="year" required>
                        <option selected disabled value="">año</option>
                    </select>
                    <select class="form-select" id="month" required>
                        <option selected disabled value="">mes</option>
                    </select>
                    <select class="form-select" id="day" required>
                        <option selected disabled value="">día</option>
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Motivo de la visita:</label>
                <textarea class="form-control" id="motivo" rows="4" required></textarea>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg px-5">ACTUALIZAR DATOS</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Populate year select
        const currentYear = new Date().getFullYear();
        for (let year = currentYear; year <= currentYear + 5; year++) {
            $('#year').append($('<option>', {
                value: year,
                text: year
            }));
        }

        // Populate month select
        const months = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];
        months.forEach((month, index) => {
            $('#month').append($('<option>', {
                value: index + 1,
                text: month
            }));
        });

        // Update days based on selected month and year
        function updateDays() {
            const year = $('#year').val();
            const month = $('#month').val();
            if (year && month) {
                const daysInMonth = new Date(year, month, 0).getDate();
                const $daySelect = $('#day');
                $daySelect.empty().append('<option value="">día</option>');
                for (let day = 1; day <= daysInMonth; day++) {
                    $daySelect.append($('<option>', {
                        value: day,
                        text: day
                    }));
                }
            }
        }

        $('#year, #month').change(updateDays);

        // Form submission handling
        $('#visitForm').submit(function(e) {
            e.preventDefault();
            
            const formData = {
                nombre: $('#nombre').val(),
                apellidos: $('#apellidos').val(),
                email: $('#email').val(),
                telefono: $('#telefono').val(),
                fecha: `${$('#year').val()}-${$('#month').val()}-${$('#day').val()}`,
                motivo: $('#motivo').val()
            };

            // Here you would typically send the data to your server
            console.log('Datos de la visita:', formData);
            alert('Visita registrada exitosamente');
            this.reset();
        });

        // Back arrow functionality
        $('.back-arrow').click(function() {
            window.history.back();
        });
    });
</script>