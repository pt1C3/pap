<form method="post" action="./auth/comment.php">
  <div style="margin-top:5vh;">
    <div class="commentWriter" >
    <img src="<?= $_SESSION["userAvatar"] ?>">
    <span class="commentWriterUsername"><?= $_SESSION["username"] ?></span>
    </div>
  <br>

    <input type="hidden" value="<?= $_SESSION["id"] ?>" name="authorID">
    <?php
    if(isset($_GET["id"]) == false)
    {
      echo '<input type="hidden" value="' . $_SESSION["id"] . '" name="profileID">';
    }
    else if ($_SESSION["id"] != $_GET["id"]) echo '<input type="hidden" value="' . $_GET["id"] . '" name="profileID">';
    ?>


    <label for="comment" style="width:100%">Comment:</label><br>
    <textarea class="commentArea" name="comment"></textarea><br>
    <input class="commentSubmit" type="submit" value="Submit">  
  </div>
</form>