<h2><?php echo $lang["add_locale"]; ?></h2>
<form id="admin-form" onsubmit="return checkData()" action="sources/background_php/adminController.php" method="POST">
    <input type="text" placeholder="<?php echo $lang["locale_placeholder"]; ?>" name="locale_name" required />
    <br />
    <br />
    <input type="hidden" name="type" value="4"/>
    <input type="submit" value="Send" name="Send" />
    <!-- <input type="submit" value="Delete" name="Delete" onclick="return confirm('Are you sure you want to delete?');" /> -->
</form>