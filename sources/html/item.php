<h2><?php echo $lang["add_items"]; ?></h2>
<form id="admin-form" onsubmit="return checkData()" action="sources/background_php/adminController.php" method="POST">
    <input type="text" placeholder="Name" name="item_name" required /> <span style="color: red;">*</span>
    <br />
    <br />
    <input type="text" placeholder="Image URL" name="image_url" />
    <br />
    <br />
    <select id="category-selector" name="category" required>
        <option value=""><?php echo $lang["category_selector"]; ?></option>
    </select>
    <br />
    <br />
    <textarea rows="5" cols="50" placeholder="Description English" form="admin-form" name="desc_eng"></textarea>
    <br />
    <br />
    <textarea rows="5" cols="50" placeholder="Description Norwegian" form="admin-form" name="desc_nor"></textarea>
    <br />
    <br />
    <input type="number" placeholder="Quantity" name="quantity" min="0"/>
    <br />
    <br />
    <input type="hidden" name="type" value="1"/>
    <select id="location_selector" name="location" required>
        <option value=""><?php echo $lang["location_selector"]; ?></option>
    </select>
    <br />
    <br />
    <input type="submit" value="Send" />
</form>