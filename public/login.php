<?php require_once('../private/initialize.php'); ?>

<?php $page_title = "Login"; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div class="content">

    <form action="login.php" method="post">

        Email:<br />
        <input type="email" name="password" value="" /><br />
        Password:<br />
        <input type="password" name="password" value="" /><br />
        <br>
        <input type="submit" name="submit" value="Submit"  />

    </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>