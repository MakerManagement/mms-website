<div id="language-chooser">
    <li><a href="/"><?php echo $lang["HOME_BTN"] ?></a></li>
    <li>|</li>
    <li><a href="admin.php">Admin</a></li>
    <li>|</li>
    <li><a href="?lang=eng">English</a></li>
    <li>|</li>
    <li><a href="?lang=nor">Norsk</a></li>
</div>

<div id="top-banner">
    <div id="wrapper-logo">
        <a href="/" ><img class="resize_fit_center" src="sources/logos/logo-lang.png" alt="MakerSpace logo" /></a>
    </div>

    <div class="search-box">
        <div class="search-wrapper">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" id="search" placeholder="Search for item">
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