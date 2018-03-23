<?php require_once('../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $page_title = "Profile"; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php 

$errors = [];

if(!isset($_GET['id'])) {
    redirect_to(url_for('/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {
    $user = [];
    $user['id'] = $id;
    $user['first_name'] = isset($_POST['first_name']) ? $_POST['first_name'] : "";
    $user['last_name'] = isset($_POST['last_name']) ? $_POST['last_name'] : "";
    $user['email'] = isset($_POST['email']) ? $_POST['email'] : "";
    $user['password'] = isset($_POST['password']) ? $_POST['password'] : "";
    $user['confirm_password'] = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : "";

    $result = update_user($user);
    if ($result === true) {
        redirect_to(url_for('/profile.php?id=' . $_SESSION['id']));
    } else {
        $user = find_user_by_id($id);
        $errors = $result;
    }

} elseif(is_get_request()) {
    $user = find_user_by_id($id);
}

?>

<div class="content">

    <div class="profile">
        <h1>Your Profile</h1>
        <h4>First Name: <span><?php echo ucfirst($user['first_name']); ?></span></h4> 
        <h4>Last Name: <span><?php echo ucfirst($user['last_name']); ?></span></h4>
        <h4>Email: <span><?php echo $user['email']; ?></span></h4>
    </div>

    <hr>

    <div class="profile-errors">
        <?php echo display_errors($errors); ?>
    </div>

    <form action="<?php echo 'profile.php?id=' . $user['id']; ?>" method="post" class="form_update">

        First Name:
        <input type="text" name="first_name" value="<?php echo ucfirst($user['first_name']); ?>" /><br /><br />
        Last Name:
        <input type="text" name="last_name" value="<?php echo ucfirst($user['last_name']); ?>" /><br /><br />
        Email:
        <input type="email" name="email" value="<?php echo $user['email']; ?>" /><br /><br />
        Password:
        <input type="password" name="password" value="" /><br /><br />
        Confirm Password:
        <input type="password" name="confirm_password" value="" /><br /><br />
        <input type="submit" name="submit" value="Update"  />

    </form>
    

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>