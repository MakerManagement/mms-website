<?php
/**
 * Created by IntelliJ IDEA.
 * User: thobber
 * Date: 20.02.17
 * Time: 22:33
 */

include "sources/lang/common.php";
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"]; ?>">
<head>
    <meta charset="UTF-8" />
    <title>Makerspace Management System</title>
    <link rel="stylesheet" type="text/css" href="sources/css/main.css" />
    <!-- Importing font for search icon !-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
        const language = "<?php
            echo $_SESSION["lang"]; ?>";
        console.log(document.referrer);
    </script>
    <script src="sources/js/script.js" async></script>
</head>
<body>
<?php
include("sources/html/wrapper.php");
?>
<div id="main-body">
    <h1><?php echo $lang["ADMIN_HEADER"]; ?></h1>
    <div id="main-content">
        <p>BETA!</p>
        <p>Insert items to send to the API. This will not check for errors and is still in beta. Use with caution.</p>

        <p class="warning">
        <?php
            if ($_SESSION["adminController"] == true)
        {
            echo "Item added to database";
        }
        elseif ($_SESSION["adminControllerFailed"])
        {
            echo "Something went wrong";
        }
        $_SESSION["adminController"] = false;
        $_SESSION["adminControllerFailed"] = false;
        ?>
        </p>

        <form action="sources/php/adminController.php" method="POST">
            <input type="text" placeholder="Name" name="item_name" />
            <br />
            <br />
            <input type="text" placeholder="Image URL" name="image_url" />
            <br />
            <br />
            <input type="text" placeholder="Description English" name="desc_eng" />
            <br />
            <br />
            <input type="text" placeholder="Description Norwegian" name="desc_nor" />
            <br />
            <br />
            <input type="submit" value="Send" />
        </form>
    </div>
</div>
</body>
</html>