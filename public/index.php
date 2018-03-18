<?php require_once('../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $page_title = "Home"; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div class="content">

    <h2>You have succesfully logged in! Good job  <?php echo $_SESSION['first_name'] . " " . $_SESSION['last_name']; ?>!</h2>

    
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>