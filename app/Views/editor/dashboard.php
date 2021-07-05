
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DATAGIX</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
<h1>Bonjour, <?= session()->get('name') ?> Vous pouvez pas supprimer</h1>
                    <h3><a href="<?= site_url('logout') ?>">Déconnecter</a></h3>
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/user-form') ?>" class="btn btn-success mb-2">Ajouter</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Nom</th>
             <th>Email</th>
             <th>Ville</th>
             <th>localités</th>
             <th>Cv</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
             <td><?php echo $user['id']; ?></td>
             <td><?php echo $user['name']; ?></td>
             <td><?php echo $user['email']; ?></td>
             <td><?php echo $user['ville']; ?></td>
             <td><?php echo $user['localite']; ?></td>
             <td>
             <form method="post" action="<?php echo base_url('FileUpload/upload');?>" enctype="multipart/form-data">
      <div class="form-group">
      <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>">

        <input type="file" required name="file"  accept="application/pdf" class="form-control">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger">Télécharger</button>
      </div>
    </form>

             </td>
             <td>
              <a href="<?php echo base_url('edit-view/'.$user['id']);?>" class="btn btn-primary btn-sm">Modifier</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );
</script>
</body>
</html>