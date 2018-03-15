<?php 
    if (!isset($page_title)) {
        $page_title = "";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Registration Challenge <?php echo " - " . $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo WWW_ROOT . '/styles/styles.css'; ?>"/>
</head>
<body>

<header>
        <h1>User Registration Challenge <?php echo " - " . $page_title; ?></h1>
    </header>

    <navigation>
        <ul>
            <li><a href="<?php echo WWW_ROOT . '/index.php'; ?>">Menu</a></li>
        </ul>
    </navigation>
