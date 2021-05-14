<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAJES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- AÑADIR REGISTROS DEL FORMULARIO -->
      <div class="card card-body">
        <form action="save_data.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Ingrese su número de teléfono" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="mail" class="form-control" placeholder="Ingrese su email" autofocus>
          </div>
          <input type="submit" name="save_data" class="btn btn-success btn-block" value="Registrar Datos">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>email</th>
            <th>Fecha</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM registro";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['mail']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_data.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
