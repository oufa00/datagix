<!DOCTYPE html>
<html>

<head>
  <title>DATAGIX</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">

      <div class="form-group">
        <label>NOM</label>
        <input type="text" name="name" class="form-control" value="<?php echo $user_obj['name']; ?>">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>">
      </div>
      <div class="form-group">
      <label>Ville</label>
   <select name="ville"  id="ville" class="form-control input-lg">
    @if($user_obj['email']=='Alger')
    <option value="Alger">Alger</option>
    @else
    <option value="Tizi Ouzou">Tizi Ouzou</option>
    @endif
   </select>
  </div>
  <br />
  <div class="form-group">
  <label>Localités</label>
   <select name="localite"  id="localite" class="form-control input-lg">
    <option value="<?php echo $user_obj['localite']; ?>"><?php echo $user_obj['localite']; ?></option>
   </select>
  </div>
  <br />
      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Modifier</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>

$(document).ready(function(){
 $('#ville').change(function(){
  var ville_id = $('#ville').val();
  if(ville_id != '')
  {
   if(ville_id=='Alger'){
    $('#localite').html('<option value="">Select localités</option><option value="Cheraga">Cheraga</option><option value="Beni messous">Beni messous</option>');
   }
   else{
    $('#localite').html('<option value="">Select localités</option><option value="Boukhalfa">Boukhalfa</option><option value="Redjaouna">Redjaouna</option>');

   }
  }
  else
  {
   $('#localite').html('<option value="">Select localités</option>');
  }
 });

 
});
</script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
          ville: {
            required: true,
          },
          localite: {
            required: true,
          },
        },
        messages: {
          name: {
            required: "Nom est obligatoir.",
          },
          email: {
            required: "Email est obligatoir .",
            email: "Entrer un email valid.",
            maxlength: ".",
          },
          ville: {
            required: "ville est obligatoir.",
          },
          localite: {
            required: "localite est obligatoir.",
          },
        },
      })
    }
  </script>
</body>

</html>