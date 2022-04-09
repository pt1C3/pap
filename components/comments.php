<div style="height:auto;width:90%;margin-left:5%;">
    <h1 style="width:inherit;margin-bottom:3vh">Comments</h1>
    <?php
    if(isset($_GET["id"])!=false) $id = $_GET["id"];
    else $id = $_SESSION["id"];
    $comments = $pdo->query("SELECT *  FROM comment where profileID=" . $id)->fetchall();

    if (count($comments) > 0) {
        foreach ($comments as $comment) {
            $author = $pdo->query('SELECT * FROM user WHERE userID=' . $comment["authorID"])->fetch();
            echo '
                    <div class="comment" style="width:100%;height:auto;margin-bottom:3vh;background-color:rgba(0,0,0,0.5)">
                        <div class="commentHead" style="display:flex;justify-content:space-between;margin-bottom:5pt;border-bottom:solid 1pt #1926da;">
                        <a style="text-decoration:none" href="profile.php?id=' . $comment["authorID"] . '">
                            <img src="' . $author["image"] . '" style="box-sizing: border-box;height:5vh;border:solid 2pt black;border-image-source: linear-gradient(45deg,rgba(180, 0, 255, 1) 0%,rgba(0, 6, 255, 1) 50%,rgba(255, 0, 114, 1) 100%);border-image-slice: 100 0;border-image-slice: 1;">
                            <p style="display:inline">' . $author["username"] . '</p>
                        </a>
                        <p style="display:inline">' . substr($comment["shareDate"], 0, -3) . '</p>
                        </div>
                        <p style="border:solid 2pt #1926da;border-top:transparent;border-right:transparent;white-space: pre;width:100%;box-sizing: border-box;height:auto;display:block">' . wordwrap($comment["commentText"], 100, "\n", true) . '</p>
                    </div>';
        }
    }
    ?>