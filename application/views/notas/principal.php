<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Notas</title>
  </head>
  <body>
    <div class="container">
      <?php $this->load->view("barra");?>
      <div class="row">
        <div class="col-md-9 offset-md-1">
          <br>
          <h1>Tareas</h1>
          <br>
          <div class="card">
            <div class="card-body">
              <?php echo validation_errors(); ?>
              <form method="post">
                <div class="form-group">
                  <label for="texto">Tarea:</label>
                  <input type="text" class="form-control" name="titulo">
                </div>
                <div class="form-group">
                  <label for="texto">Descripcion:</label>
                  <textarea class="form-control" name="contenido" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
              </form>
            </div>
          </div>  
        </div>
      </div>
      <div class="row">
        <div class="col-md-9 offset-md-1">
          <br>
          <?php if($notas){ ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Tarea</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Completar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($notas as $n){ ?>
              <tr>
                <?php if ($n["estado"]==2){?>
                <td> <del> <?php echo $n["titulo"];?></del></td>
                <td><del><?php echo $n["contenido"];?></del></td>
                <td><del><?php echo $n["fecha"];?></del></td>
                <td class="text-center"><a href="<?php echo site_url("notas/eliminar/".$n["nota_id"]);?>" class="bi bi-trash-fill text-danger"></a></td>
                <td class="text-center"><a href="<?php echo site_url("notas/destachar/".$n["nota_id"]);?>" class="bi bi-check2-square text-success"></a></td>
                <?php }else{ ?>
                  <td>  <?php echo $n["titulo"];?></td>
                <td><?php echo $n["contenido"];?></td>
                <td><?php echo $n["fecha"];?></td>
                <td class="text-center"><a href="<?php echo site_url("notas/eliminar/".$n["nota_id"]);?>" class="bi bi-trash-fill text-danger"></a></td>
                <td class="text-center"><a href="<?php echo site_url("notas/tachar/".$n["nota_id"]);?>" class="bi bi-check2-square"></a></td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
          <?php }else{ ?>
          <div class="alert alert-secondary" role="alert">
            No hay notas
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  </body>
</html>