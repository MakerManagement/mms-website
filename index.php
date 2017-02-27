<?php
include "sources/lang/common.php";
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"]; ?>">
<head>
    <meta charset="UTF-8" />
    <title>Makerspace Management System</title>
    <link rel="stylesheet" type="text/css" href="sources/css/main.css" />
    <!-- Importing font for search icon !-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery if needed !-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        const language = "<?php
            echo $_SESSION["lang"]; ?>";
    </script>
    <script src="sources/js/script.js" async></script>
</head>
<body>
<?php
include("sources/html/wrapper.php");
?>
<div id="main-body">
    <h1><?php echo $lang["MAIN_HEADER"]; ?></h1>
    <div id="main-content">
        <ul id="main-list">
        </ul>
    </div>
</div>
</body>
</html>