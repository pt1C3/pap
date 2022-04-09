<div class="commentSection">
    <h1>Comments</h1>
    <?php
    if(isset($_GET["id"])!=false) $id = $_GET["id"];
    else $id = $_SESSION["id"];
    $comments = $pdo->query("SELECT *  FROM comment where profileID=" . $id)->fetchall();

    if (count($comments) > 0) {
        foreach ($comments as $comment) {
            $author = $pdo->query('SELECT * FROM user WHERE userID=' . $comment["authorID"])->fetch();
            echo '
                    <div class="comment">
                        <div class="commentHead" >
                        <a class="commentAuthor" style="text-decoration:none" href="profile.php?id=' . $comment["authorID"] . '">
                            <img src="' . $author["image"] . '" >
                            <p >' . $author["username"] . '</p>
                        </a>
                        <p >' . substr($comment["shareDate"], 0, -3) . '</p>
                        </div>
                        <p class="commentText">' . wordwrap($comment["commentText"], 100, "\n", true) . '</p>
                    </div>';
        }
    }
    ?>