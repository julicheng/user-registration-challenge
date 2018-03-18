<?php require_once('../private/initialize.php'); ?>

<?php $page_title = "Register"; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php 
$errors = [];
if(is_post_request()) {
    $user = [];
    $user['first_name'] = isset($_POST['first_name']) ? $_POST['first_name'] : "";
    $user['last_name'] = isset($_POST['last_name']) ? $_POST['last_name'] : "";
    $user['email'] = isset($_POST['email']) ? $_POST['email'] : "";
    $user['password'] = isset($_POST['password']) ? $_POST['password'] : "";

    $result = insert_user($user);
    if($result === true) {
        redirect_to(url_for('/login.php'));
    } else {
        $errors = $result;
    }

}

?>

<div class="content">

    <?php echo display_errors($errors); ?>

    <form action="register.php" method="post">

        First Name:<br />
        <input type="text" name="first_name" value="" /><br />
        Last Name:<br />
        <input type="text" name="last_name" value="" /><br />
        Email:<br />
        <input type="email" name="email" value="" /><br />
        Password:<br />
        <input type="password" name="password" value="" /><br />
        <br>
        <input type="submit" name="submit" value="Submit"  />

    </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>