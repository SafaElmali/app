<?php
function navbarStatus($slug)
{
    $serverSlug = $_SERVER['REQUEST_URI'];

    if ($slug == "/") { //for Homepage
        return $serverSlug === $slug;
    }

    // Url, slug'ı içeriyorsa (/potterhead/app/characters.php)
    return strpos($serverSlug, $slug) !== false;
}
?>

<div class="bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php">
                <img src="assets/images/menu-logo.png" style="width:220px" alt="Potterhead Logo">
            </a>
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                    include 'NavbarItem.php';

                    $navbarItems[] = new NavbarItem("index", "Anasayfa");
                    $navbarItems[] = new NavbarItem("characters", "Karakterler");
                    $navbarItems[] = new NavbarItem("houses", "Binalar");
                    $navbarItems[] = new NavbarItem("spells", "Büyüler");

                    foreach ($navbarItems as $item) :
                    ?>
                        <? if ($item->{'route'} === 'index') : ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo navbarStatus("/" . $item->{'route'} . ".php") ? 'active' : '' || navbarStatus("/") ? 'active' : ''?>" href="<?php echo $item->{'route'} ?>.php"><?php echo $item->{'name'} ?></a>
                            </li>
                        <? else : ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo navbarStatus("/" . $item->{'route'} . ".php") ? 'active' : '' ?>" href="<?php echo $item->{'route'} ?>.php"><?php echo $item->{'name'} ?></a>
                            </li>
                        <? endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>