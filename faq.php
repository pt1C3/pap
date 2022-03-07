
    
<html>

<head>
    <title>LetsGame</title>
    <link rel="icon" href="./images/iconfavicon.ico">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php session_set_cookie_params(0);
session_start();
include './components/navbar.php';
$search  = $_POST['search']; 
?>
    <?php echo '<p style="padding-top:50pt">' . $search . '</p>'; ?>

</body>
</html>