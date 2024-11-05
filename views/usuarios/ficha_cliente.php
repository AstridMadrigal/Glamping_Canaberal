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
    .client-container {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }
    .form-control, .form-select {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid #ced4da;
        margin-bottom: 15px;
    }
    .document-group {
        display: flex;
        gap: 10px;
    }
    .document-group .form-select {
        width: 30%;
    }
    .document-group .form-control {
        width: 70%;
    }
</style>
<div class="container py-4">
    <div class="client-container">
        <h1 class="text-center mb-4">CREAR FICHA DE CLIENTE</h1>

        <form id="clientForm">
            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre del huésped" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" required>
            </div>

            <div class="mb-3 document-group">
                <select class="form-select" id="tipoDocumento" required>
                    <option value="">Tipo</option>
                    <option value="CC">CC</option>
                    <option value="CE">CE</option>
                    <option value="PAS">PAS</option>
                    <option value="NIT">NIT</option>
                </select>
                <input type="text" class="form-control" id="numeroDocumento" placeholder="Número de documento" required>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Correo electrónico" required>
            </div>

            <div class="mb-4">
                <input type="tel" class="form-control" id="telefono" placeholder="Teléfono de contacto" required>
            </div>

            <div class="row">
                <div class="col-6">
                    <button type="button" id="historialBtn" class="btn btn-secondary btn-lg w-100">HISTORIAL DE RESERVAS</button>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-lg w-100">ACTUALIZAR DATOS</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Form submission handling
        $('#clientForm').submit(function(e) {
            e.preventDefault();
            
            const formData = {
                nombre: $('#nombre').val(),
                apellidos: $('#apellidos').val(),
                tipoDocumento: $('#tipoDocumento').val(),
                numeroDocumento: $('#numeroDocumento').val(),
                email: $('#email').val(),
                telefono: $('#telefono').val()
            };

            // Here you would typically send the data to your server
            console.log('Datos del cliente:', formData);
            alert('Datos actualizados exitosamente');
        });

        // Historial button handling
        $('#historialBtn').click(function() {
            // Here you would typically redirect to or show the reservation history
            alert('Mostrando historial de reservas...');
        });

        // Back arrow functionality
        $('.back-arrow').click(function() {
            window.history.back();
        });

        // Document number validation
        $('#numeroDocumento').on('input', function() {
            // Remove any non-numeric characters
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });

        // Phone number validation
        $('#telefono').on('input', function() {
            // Remove any non-numeric characters except +
            $(this).val($(this).val().replace(/[^\d+]/g, ''));
        });
    });
</script>