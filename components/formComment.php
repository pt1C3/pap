<form method="post" action="./auth/comment.php">
  <div style="margin-top:5vh;">
    <div style="height:50px;width:inherit;vertical-align: middle;"><img style="height:44px;border:solid 3pt black;border-image-source: linear-gradient(45deg,rgba(180, 0, 255, 1) 0%,rgba(0, 6, 255, 1) 50%,rgba(255, 0, 114, 1) 100%);border-image-slice: 100 0;border-image-slice: 1;" src="<?= $_SESSION["userAvatar"] ?>"><span style="margin-left:7pt;margin-bottom:7pt;"><?= $_SESSION["username"] ?></span></div><br>

    <input type="hidden" value="<?= $_SESSION["id"] ?>" name="authorID">
    <?php
    if(isset($_GET["id"]) == false)
    {
      echo '<input type="hidden" value="' . $_SESSION["id"] . '" name="profileID">';
    }
    else if ($_SESSION["id"] != $_GET["id"]) echo '<input type="hidden" value="' . $_GET["id"] . '" name="profileID">';
    ?>


    <label for="comment" style="width:100%">Comment:</label><br>
    <textarea name="comment" style="resize: none;width:100%;height:20vh;"></textarea><br>
    <input style="margin-left:90%;width:10%;" type="submit">
  </div>
</form>