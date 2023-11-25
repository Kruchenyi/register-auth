<?php require VIEWS . '/inc/header.php'; ?>
<h1>Login</h1>
<form method="post" enctype="multipart/form-data">
    <div class="col-md-6 offset-md-3">


        <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control" id="email" placeholder="email">
            <label for=" email">Email</label>

        </div>
        <div class="form-floating mb-3">
            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            <label for=" password">Password</label>

        </div>
        <button type="submit" class="btn btn-primary">Login</button>

    </div>
</form>

<?php require VIEWS . '/inc/footer.php'; ?>