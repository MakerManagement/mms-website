<?php
include "sources/lang/common.php";
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION["lang"]; ?>">
<head>
    <meta charset="UTF-8" />
    <link href="sources/logos/icon.png" rel="shortcut icon" type="image/x-icon" />
    <title>Makerspace Management System</title>
    <link rel="stylesheet" type="text/css" href="sources/css/main.css" />
    <!-- Importing font for search icon !-->
    <link href="sources/css/font-awesome.min.css" rel="stylesheet">
    <!-- jQuery if needed !-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
        const language = "<?php
            echo $_SESSION["lang"]; ?>";
    </script>
    <script type="text/javascript">
        function loadMore()
        {
            $(function ()
            {
                if ($("li:hidden").length <= 12)
                {
                    $("#main-load-more").fadeOut('fast');
                }
                $("li:hidden").slice(0, 12).show();
                $("#main-load-more").on('click', function (e)
                {
                    e.preventDefault();
                    $("li:hidden").slice(0, 12).slideDown();
                    if ($("li:hidden").length == 0)
                    {
                        $("#main-load-more").fadeOut('slow');
                    }
                    $('html,body').animate({
                        scrollTop: $(this).offset().top
                    }, 1500);
                });
            });

        }
    </script>
</head>
<body>
<?php
include("sources/html/wrapper.php");
?>
<div id="main-body">
    <h1><?php echo $lang["MAIN_HEADER"]; ?></h1>
    <div id="main-content">
        <p id="item-message"></p>
        <ul id="main-list">
        </ul>
    </div>
    <a href="#" id="main-load-more"><?php echo $lang["load"]; ?></a>
</div>
</body>
</html>