<?php require VIEWS . '/inc/header.php' ?>




<div class="container mt-3">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="col-md-6 offset-md-3">

                <div class="form-floating mb-3">
                    <input name="name" type="name" class="form-control" id="name" placeholder="name" value="<?= old('name') ?>">
                    <label for="name">Name</label>
                    <?= $validator->output('name') ?>
                </div>
                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="email" placeholder="email" value="<?= old('email') ?> ">
                    <label for=" email">Email</label>
                    <?= $validator->output('email') ?>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?= old('password') ?>">
                    <label for=" password">Password</label>
                    <?= $validator->output('password') ?>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>

            </div>
        </form>
    </div>
</div>



<?php require VIEWS . '/inc/footer.php' ?>