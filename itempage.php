<?php
/**
 * Created by IntelliJ IDEA.
 * User: thobber
 * Date: 21.02.17
 * Time: 00:31
 */
include "sources/lang/common.php";
?>

<!DOCTYPE html>
<!--suppress ALL -->
<html lang="<?php echo $_SESSION["lang"]; ?>">
<head>
    <link href="sources/logos/icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta charset="UTF-8" />
    <title>Makerspace Management System</title>
    <link rel="stylesheet" type="text/css" href="sources/css/main.css" />
    <!-- Importing font for search icon !-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        const itemId = "<?php echo $_GET["item"]; ?>";
        const language = "<?php
            echo $_SESSION["lang"]; ?>";
    </script>
</head>
<body>
<?php
include("sources/html/wrapper.php");
?>
<div id="main-body">
    <h1 id="item"></h1>
    <div id="main-content">
        <p id="description"></p>
        <div class="item-image-div">
            <img alt="The item picture is not availible." id="item_image" />
        </div>
        <div id="item-info">
            <table style="width: 100%">
                <tr>
                    <th>Quantity</th>
                    <th>Location</th>
                </tr>
                <tr>
                    <td id="item-quantity">N/A</td>
                    <td id="item-location">N/A</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>