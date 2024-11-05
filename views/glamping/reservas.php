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
    .reservation-container {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }
    .calendar-header {
        background-color: #2196F3;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }
    .social-icons {
        font-size: 1.2rem;
    }
    .social-icons i {
        margin: 0 5px;
    }
    .custom-select {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 4px;
        padding: 8px;
    }
</style>
<div class="container py-4">
    <div class="reservation-container">
        <h1 class="text-center mb-4">GESTIONAR RESERVAS</h1>

        <div class="mb-4">
            <label class="mb-2">Personas que se hosperarán</label>
            <div class="row">
                <div class="col-6">
                    <select class="form-select">
                        <option disabled selected>Adultos</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>
                <div class="col-6">
                    <select class="form-select">
                        <option disabled selected>Niños (-12 años)</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">ENTRADA</label>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">SALIDA</label>
                    <input type="date" class="form-control">
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-6">
                <label class="mb-2">Hora de ingreso</label>
                <input type="time" class="form-control" name="check_in_time">
            </div>
            <div class="col-6">
                <label class="mb-2">Hora de Salida</label>
                <input type="time" class="form-control" name="check_out_time">
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-primary btn-lg px-5">Confirmar Reserva</button>
        </div>
    </div>
</div>
<div class="" style="margin-bottom: 20px;">
</div>