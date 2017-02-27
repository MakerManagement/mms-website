<?php
/**
 * Created by IntelliJ IDEA.
 * User: thobber
 * Date: 27.02.17
 * Time: 23:11
 */

$item = $_GET["q"];
$curl = curl_init();

// Setting up correct curl api request
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://158.39.162.161/api/items",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

// Handling the response
$json = json_decode($response, true);

$item_id = 0;
foreach ($json as $jsonItem)
{
    $itemInJson = $jsonItem["item_name"];
    if ($itemInJson == $item)
    {
        $item_id = $jsonItem["_id"];
        header("Location: /itempage.php?item=" . $item_id);
    }
    else
    {
        header("Location: /");
    }
}