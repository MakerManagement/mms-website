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

        function checkData()
        {
            const categoryRaw = document.getElementById("category-selector");
            const category = categoryRaw.options[categoryRaw.selectedIndex].value;
            const locationRaw = document.getElementById("location-selector");
            const location = locationRaw.options[categoryRaw.selectedIndex].value;
            if (category == "0")
            {
                alert("Please chose category");
                return false;
            }
            else if (location == "0")
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
        <div id="update-item">
            <h2><?php echo $lang["edit_itempage"]; ?></h2>
            <form method="POST" onsubmit="return checkData()" action="sources/background_php/adminController.php">
                <input type="hidden" value="2" name="type">
                <input type="hidden" name="item_id" id="item_id">
                <input id="item_name" type="text" placeholder="Name" name="item_name" required />
                <br />
                <br />
                <input id="image_url" type="text" placeholder="Image URL" name="image_url" />
                <br />
                <br />
                <select id="category-selector" name="category">
                    <option value=""><?php echo $lang["category_selector"]; ?></option>
                </select>
                <br />
                <br />
                <textarea id="desc_eng" rows="6" cols="70" placeholder="Description English" name="desc_eng"></textarea>
                <br />
                <br />
                <textarea id="desc_nor" rows="6" cols="70" placeholder="Description Norwegian" name="desc_nor"></textarea>
                <br />
                <br />
                <input id="quantity" type="number" placeholder="Quantity" name="quantity" min="0"/>
                <br />
                <br />
                <select id="location_selector" name="location">
                    <option value=""><?php echo $lang["location_selector"]; ?></option>
                </select>
                <br />
                <br />
                <input type="submit" value="Update" name="update" onclick="checkData()">
                <input type="submit" value="Delete" name="delete" onclick="return confirm('Are you sure you want to delete?');" />
            </form>
        </div>
    </div>
</div>
</body>
</html>