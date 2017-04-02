<?php
/**
 * Created by IntelliJ IDEA.
 * User: thobber
 * Date: 20.02.17
 * Time: 22:50
 */
// To show admin.php we've been in this file
session_start();
$name = $_POST["item_name"];
$url = $_POST["image_url"];
$engDescription = $_POST["desc_eng"];
$norDescription = $_POST["desc_nor"];
$category = $_POST["category"];
$quantity = $_POST["quantity"];
$itemId = $_POST["item_id"];
//$location = $_POST["location"];

$whichForm = $_POST["type"];
$ch = null;

switch ($whichForm)
{
    // Post new item from admin page
    case "1":
        postPut_item($url, $name, $engDescription, $norDescription, $category, $quantity, "items", "POST", $itemId);
        break;
    // Update or delete from item page
    case "2":
        if ($_POST["update"])
        {
            postPut_item($url, $name, $engDescription, $norDescription, $category, $quantity, "items", "PUT", $itemId);
        }
        else if ($_POST["delete"])
        {
            delete_item("items", "DELETE", $itemId);
        }
        else
        {
            echo "Something went wrong";
        }
        break;
    case "3":
        // POST new category
        if ($_POST["category_button"])
        {

        }
        else if ($_POST["tag_button"])
        {

        }
        else
        {
            echo "Something went wrong";
        }
        break;
}

function delete_item($type, $sendType, $itemId)
{

    $rawData = array(
        "_id" => $itemId
    );

    $dataToJson = json_encode($rawData);
    $ch = curl_init("http://158.39.162.161/api/". $type . "/" . $itemId);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $sendType);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataToJson);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Content-Length: " . strlen($dataToJson)
    ));

    curl_exec($ch);
    //echo "</br>";
    //echo ("http://158.39.162.161/api/". $type);
}

function postPut_item($url, $name, $engDescription, $norDescription, $category, $quantity, $type, $sendType, $itemId)
{
    $rawData = null;

    if ($sendType == "POST")
    {
        $rawData = array(
            "image_url" => $url,
            "item_name" => $name,
            "description" => array(
                "en" => $engDescription,
                "no" => $norDescription
            ),
            "categories" => $category,
            "quantity" => $quantity
        );
    }
    else if ($sendType == "PUT")
    {
        $rawData = array(
            "_id" => $itemId,
            "image_url" => $url,
            "item_name" => $name,
            "description" => array(
                "en" => $engDescription,
                "no" => $norDescription
            ),
            "categories" => $category,
            "quantity" => $quantity
        );
    }
    else
    {
        $rawData = null;
        echo "Something went wrong";
    }

    $dataToJson = json_encode($rawData);
    $ch = curl_init("http://158.39.162.161/api/". $type);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $sendType);

    if ($sendType == "POST")
    {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataToJson);
    }
    else if ($sendType == "PUT")
    {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($rawData));
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Content-Length: " . strlen($dataToJson)
    ));

    curl_exec($ch);
}
/*
if (curl_exec($ch) === false)
{
    $_SESSION["adminControllerFailed"] = true;
}
else
{
    $_SESSION["adminController"] = true;
}
*/
header("Location: /");