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
    .contact-container {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }
    .form-control {
        background-color: rgba(255, 255, 255, 0.9);
        border: 1px solid #ced4da;
    }
    .social-icons {
        font-size: 2rem;
    }
    .social-icons a {
        text-decoration: none;
        margin: 0 10px;
    }
    .social-icons .bi-facebook {
        color: #1877f2;
    }
    .social-icons .bi-instagram {
        color: #e4405f;
    }
    .social-icons .bi-tiktok {
        color: #000000;
    }
    .social-icons .bi-whatsapp {
        color: #25d366;
    }
</style>
<div class="container py-4">

    <div class="contact-container">
        <h1 class="text-center mb-4">CONTÁCTENOS</h1>

        <form id="contactForm">
            <div class="mb-4">
                <label for="message" class="form-label">Escríbanos con detalle su mensaje, nos contactaremos con usted en breve:</label>
                <textarea 
                    class="form-control" 
                    id="message" 
                    rows="4" 
                    maxlength="200"
                    placeholder="(200 caracteres aprox)"
                ></textarea>
                <div class="form-text text-white-50" id="charCount">0/200 caracteres</div>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese su nombre">
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" id="apellidos" placeholder="Ingrese sus apellidos">
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Ingrese su correo electrónico">
            </div>

            <div class="mb-4">
                <input type="tel" class="form-control" id="telefono" placeholder="Ingrese su teléfono de contacto">
            </div>

            <div class="row align-items-center">
                <div class="col-md-6 mb-3 mb-md-0">
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-tiktok"></i></a>
                        <a href="#" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5">GUARDAR</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageArea = document.getElementById('message');
        const charCount = document.getElementById('charCount');
        const contactForm = document.getElementById('contactForm');

        messageArea.addEventListener('input', function() {
            const remaining = this.value.length;
            charCount.textContent = `${remaining}/200 caracteres`;
        });

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Aquí iría la lógica para enviar el formulario
            alert('Mensaje enviado correctamente');
        });
    });
</script>