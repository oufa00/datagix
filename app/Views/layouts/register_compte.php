<?= $this->extend("layouts/app") ?>

<?= $this->section("body") ?>

<div class="container" style="margin-top:20px;">
<div>
    <?php
     if(isset($message)){
         echo $message;
     } 
    ?>
</div>
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <form class="" id='add_create' action="<?= base_url('register_user') ?>" method="post">
                    <div class="form-group">
                            <label for="name">name</label>
                            <input type="name" required class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" required class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone</label>
                            <input type="phone" required class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
      <label>Role</label>
   <select name="role" required  id="role" class="form-control input-lg">
    <option value="">Selectioné role</option>
    <option value="admin">admin</option>
    <option value="editor">editor</option>
   </select>
  </div>
                        <button type="submit" class="btn btn-success">Inscription</button>
                        <a href="<?php echo site_url('/login') ?>" class="btn btn-success">retour</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>