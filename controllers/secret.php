<?php require VIEWS . '/inc/header.php' ?>


<?php if (!check_auth()) {
    redirect('login');
} ?>

<h1>Secret</h1>



<?php require VIEWS . '/inc/footer.php' ?>