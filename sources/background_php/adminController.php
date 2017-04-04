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
$location = $_POST["location"];


$whichForm = $_POST["type"];
$ch = null;

switch ($whichForm)
{
    // Post new item from admin page
    case "1":
        postPut_item($url, $name, $engDescription, $norDescription, $category, $quantity, "items", "POST", $itemId, $location);
        break;
    // Update or delete from item page
    case "2":
        if ($_POST["update"])
        {
            postPut_item($url, $name, $engDescription, $norDescription, $category, $quantity, "items", "PUT", $itemId, $location);
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
    // Update or delete category from admin page
    case "3":
        $categoryNameNo = $_POST["category_nameNo"];
        $categoryNameEn = $_POST["category_nameEn"];
        newCategory($categoryNameNo, $categoryNameEn, "POST", "categories");
        break;
    // Update or delete locale from admin page
    case "4":
        $localeName = $_POST["locale_name"];
        newLocale($localeName, "POST", "locations");
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
    header("Location: /");
}

function postPut_item($url, $name, $engDescription, $norDescription, $category, $quantity, $type, $sendType, $itemId, $location)
{
    $rawData = array(
        "image_url" => $url,
        "item_name" => $name,
        "description" => array(
            "en" => $engDescription,
            "no" => $norDescription
        ),
        "quantity" => $quantity,
    );

    if ($sendType == "POST")
    {
        if ($location !== "")
        {
            $rawData = array_merge($rawData, array("locale" => $location));
        }
        if ($category !== "")
        {
            $rawData = array_merge($rawData, array("categories" => $category));
        }
    }
    else if ($sendType == "PUT")
    {
        $rawData = array_merge($rawData, array("_id" => $itemId));

        if ($location !== "")
        {
            $rawData = array_merge($rawData, array("locale" => $location));
        }
        if ($category !== "")
        {
            $rawData = array_merge($rawData, array("categories" => $category));
        }
    }
    else
    {
        $rawData = null;
        echo "Something went wrong";
    }

    $dataToJson = json_encode($rawData);

    if ($sendType == "POST")
    {
        $ch = curl_init("http://158.39.162.161/api/". $type);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $sendType);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataToJson);
    }
    else if ($sendType == "PUT")
    {
        $ch = curl_init("http://158.39.162.161/api/". $type . "/" . $itemId);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $sendType);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataToJson);
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json",
        "Content-Length: " . strlen($dataToJson)
    ));

    echo $dataToJson;

    $result = curl_exec($ch);
    curl_close($ch);

    //echo $result;

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function newCategory($nameNo, $nameEn, $sendType, $location)
{
    $rawData = array(
        "category" => array(
            "en" => $nameEn,
            "no" => $nameNo
        )
    );

    $dataToJson = json_encode($rawData);
    $ch = curl_init("http://158.39.162.161/api/" . $location);
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
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}

function newLocale($localeName, $sendType, $location)
{
    $rawData = array(
        "locale" => $localeName
    );

    $dataToJson = json_encode($rawData);
    $ch = curl_init("http://158.39.162.161/api/" . $location);
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