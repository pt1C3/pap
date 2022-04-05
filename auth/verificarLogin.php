<?php
if(isset($_SESSION["id"])==false) header("location: ./homePage.php");
if($_SESSION["adm"]==true) header("location: ./admin/admHome.php");
?>