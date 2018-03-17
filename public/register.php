<?php require_once('../private/initialize.php'); ?>

<?php $page_title = "Register"; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<div class="content">

    <form action="register.php" method="post">

        First Name:<br />
        <input type="text" name="first_name" value="" /><br />
        Last Name:<br />
        <input type="text" name="last_name" value="" /><br />
        Email:<br />
        <input type="email" name="password" value="" /><br />
        Password:<br />
        <input type="password" name="password" value="" /><br />
        <br>
        <input type="submit" name="submit" value="Submit"  />

    </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>