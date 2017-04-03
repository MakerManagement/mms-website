<h2><?php echo $lang["add_category"]; ?></h2>
<form id="admin-form" onsubmit="return checkData()" action="sources/background_php/adminController.php" method="POST">
    <input type="text" placeholder="English category name" name="category_nameEn" required />
    <br />
    <br />
    <input type="text" placeholder="Norsk kategorinavn" name="category_nameNo" required />
    <br />
    <br />
    <input type="hidden" name="type" value="3"/>
    <input type="submit" value="Send" name="Send" />
    <!-- <input type="submit" value="Delete" name="Delete" onclick="return confirm('Are you sure you want to delete?');" /> -->
</form>