<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agendar Cita Médica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Establecer un fondo de imagen */
    body {
      font-family: 'Poppins', sans-serif;
      background: url('https://img.freepik.com/fotos-premium/cuidado-salud-medicina-fondo-color-azul-suave_636537-150150.jpg') no-repeat center center fixed;
      background-size: cover;
    }

    /*  formularios */
    .container {
      background-color: rgba(0, 0, 0, 0.5); 
      padding: 30px;
      border-radius: 15px;
      max-width: 600px;
      margin-top: 100px;
    }

    h1 {
      font-family: 'Arial', sans-serif;
      font-weight: bold;
      text-transform: uppercase;
      color: white;
    }

    .form-label {
      font-weight: 600;
      color: white;
    }

    /* Estilizar los botones */
    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-success:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }

    /* Personalizar la selección de horas */
    select.form-select {
      background-color: #343a40;
      color: white;
      border: 1px solid #495057;
    }

    select.form-select:focus {
      background-color: #495057;
      border-color: #6c757d;
    }

    /* Personalizar campos de fecha */
    input[type="date"] {
      background-color: #343a40;
      color: white;
      border: 1px solid #495057;
    }

    input[type="date"]:focus {
      background-color: #495057;
      border-color: #6c757d;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 class="text-center mb-4">Agendar Cita Médica</h1>
    <form action="#" method="POST">
      <div class="mb-3">
        <label for="specialty" class="form-label">Especialidad</label>
        <select class="form-select" id="specialty" name="specialty" required>
          <option value="">Seleccione una especialidad</option>
          <option value="cardiologia">Cardiología</option>
          <option value="pediatria">Pediatría</option>
          <option value="neurologia">Neurología</option>
          <option value="ortopedia">Ortopedia</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="appointment_date" class="form-label">Fecha de la Cita</label>
        <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
      </div>

      <div class="mb-3">
        <label for="hora" class="form-label">Hora</label>
        <select class="form-select" id="hora" name="hora" required>
          <option value="">Seleccione horario de preferencia</option>
          <option value="1">07:00am - 10:00am</option>
          <option value="2">10:00am - 12:00pm</option>
          <option value="3">12:00pm - 02:00pm</option>
          <option value="4">02:00pm - 04:00pm</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success w-100">Agendar</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
