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
    <link href="sources/logos/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <meta charset="UTF-8" />
    <title>Makerspace Management System</title>
    <link rel="stylesheet" type="text/css" href="sources/css/main.css" />
    <!-- Importing font for search icon !-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
        const language = "<?php
            echo $_SESSION["lang"]; ?>";

        function checkData()
        {
            const categoryRaw = document.getElementById("category-selector");
            const category = categoryRaw.options[categoryRaw.selectedIndex].value;

            const locationRaw = document.getElementById("location-selector");
            const location = locationRaw.options[categoryRaw.selectedIndex].value;
            if (category === "0")
            {
                alert("Please choose category");
                return false;
            }
            else if (location === "0")
            {
                alert("Please chose location");
                return false;
            }
        }
    </script>
</head>
<body>
<?php
include("sources/html/wrapper.php");
?>
<div id="main-body">
    <h1><?php echo $lang["ADMIN_HEADER"]; ?></h1>
    <div id="main-content">

        <a href="javascript:setParam('type', 'item')"><?php echo $lang["add_items"]; ?></a>
        <a href="javascript:setParam('type', 'category')"><?php echo $lang["add_category"]; ?></a>
        <a href="javascript:setParam('type', 'locale')"><?php echo $lang["add_locale"]; ?></a>
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
        <?php
        $type = $_GET["type"];

        switch ($type)
        {
            case "item":
                include ("sources/html/item.php");
                break;
            case "category":
                include ("sources/html/category.php");
                break;
            case "locale":
                include ("sources/html/locale.php");
                break;
            case "tag":
                break;
        }
        ?>
</div>
</body>
</html>
