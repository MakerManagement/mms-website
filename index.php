<?php
session_start();
$_SESSION["language"] = "eng";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Makerspace Management System</title>
    <link rel="stylesheet" type="text/css" href="sources/css/main.css" />
    <!-- Importing font for search icon !-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script>
        const language = "<?php echo $_SESSION["language"]; ?>";
    </script>
    <script src="sources/js/script.js" async></script>
</head>
<body>
<?php
    include("sources/html/wrapper.html");
?>
<div id="main-body">
    <h1>Makerspace Inventory</h1>
    <div id="main-content">
        <ul id="main-list">

        </ul>
    </div>
</div>
</body>
</html>