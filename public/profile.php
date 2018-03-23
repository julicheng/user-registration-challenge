<?php require_once('../private/initialize.php'); ?>
<?php require_login(); ?>
<?php $page_title = "Profile"; ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<?php 

if(is_get_request()) {
    $user['id'] = $_GET['id'];
    $user = find_user_by_id($user['id']);
}

if(is_post_request()) {

}

?>

<div class="content">

<div class="profile">
    <h1>Your Profile</h1>
    <h4>First Name: <span><?php echo ucfirst($user['first_name']); ?></span></h4> 
    <h4>Last Name: <span><?php echo ucfirst($user['last_name']); ?></span></h4>
    <h4>Email: <span><?php echo $user['email']; ?></span></h4>
</div>
    
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>