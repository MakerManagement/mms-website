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
//$location = $_POST["location"];


$rawData = array(
    "image_url" => $url,
    "item_name" => $name,
    "description" => array(
        "en" => $engDescription,
        "no" => $norDescription
    ),
    "category" => $category,
    "quantity" => $quantity
);

$dataToJson = json_encode($rawData);
$ch = curl_init("http://158.39.162.161/api/items");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataToJson);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "Content-Length: " . strlen($dataToJson)
));

$result = curl_exec($ch);
echo $result;

if (curl_exec($ch) === false)
{
    $_SESSION["adminControllerFailed"] = true;
}
else
{
    $_SESSION["adminController"] = true;
}

header("Location: " . $_SERVER["HTTP_REFERER"]);