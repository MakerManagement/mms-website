<head>
    <link rel="icon" href="../sources/logos/icon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<div id="language-chooser">
    <ul>
        <li><a href="/"><?php echo $lang["HOME_BTN"] ?></a></li>
        <li>|</li>
        <li><a href="admin.php">Admin</a></li>
        <li>|</li>
        <li><a href="javascript:setParam('lang', 'en')">English</a></li>
        <li>|</li>
        <li><a href="javascript:setParam('lang','no')">Norsk</a></li>
    </ul>
</div>

<div id="top-banner">
    <div id="wrapper-logo">
        <a href="/" ><img class="resize_fit_center" src="sources/logos/logo-lang.png" alt="MakerSpace logo" /></a>
    </div>

    <script>
        $( function() {
            $( "#search" ).autocomplete({
                source: itemArray
            });
        } );
    </script>

    <div class="search-box">
        <div class="search-wrapper ui-widget">
            <form action="/sources/background_php/searchQuery.php" method="GET">
                <span class="icon"><i class="fa fa-search"></i></span>
                <input name="q" type="search" id="search" placeholder="Search for item">
            </form>
        </div>
    </div>
</div>

<div id="aside-box">
    <aside>
        <h2><?php
            //echo $lang;
            echo $lang["CATEGORY"]; ?></h2>
        <ul id="category-list">
        </ul>
    </aside>
</div>