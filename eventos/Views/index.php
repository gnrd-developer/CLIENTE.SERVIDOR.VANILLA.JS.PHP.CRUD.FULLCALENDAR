<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!--<link href="<?php echo base_url; ?>Assets/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url; ?>Assets/css/main.min.css" rel="stylesheet">

    <title>Reservas</title>
  </head>
  <body>

    <div class="container">
      <div id="calendar"></div>
    </div><!-- el div anterior contiene el calendario -->

    <!-- escribi m5-modal-body -->
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">

      <div class="modal-dialog">

        <div class="modal-content">

          <div class="modal-header bg-info">
            <h5 class="modal-title" id="titulo"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form id="formulario">

            <div class="modal-body">

              <div>
                <input type="text" id="id" name="id">
              </div>
              
              <div class="form-floating mb-3">
                <input id="title" type="text" class="form-control" name="title">
                <label for="title" class="form-label">Evento</label>
              </div>

              <div class="form-floating mb-3">
                <input id="start" type="text" class="form-control" name="start">
                <label for="start" class="form-label">Fecha</label>
              </div>

              <div class="form-floating mb-3">
                <input id="color" type="color" class="form-control" name="color">
                <label for="color" class="form-label">Color</label>
              </div>

            </div>

            <div class="modal-footer">
              <button class="btn btn-danger" type="button" id="btnEliminar"></button>
              <button class="btn btn-info" id="btnAccion" type="submit"></button>
            </div>

          </form>

        </div>

      </div>

    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/main.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/moment.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/es.js"></script>
    <script>
      const base_url = "<?php echo base_url; ?>";
    </script>
    <script src="<?php echo base_url; ?>Assets/js/app.js"></script>
  </body>
</html>