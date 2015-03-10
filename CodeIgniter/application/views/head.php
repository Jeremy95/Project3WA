<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
    <title>Mon Site e-commerce</title>
</head>
<body>

<nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Start Bootstrap</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if(isset($_SESSION)) : ?>
                    <?php if(array_key_exists("name", $_SESSION)) : ?>
                        <li>
                            <a href=<?= site_url("/product")?>>
                                Bienvenue
                                <?= $_SESSION["name"]; ?>
                            </a>
                        </li>
                    <?php else : ?>
                        <li>
                            <a href=<?= site_url("/user/login"); ?>>Login</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li>
                    <a href="#">About</a>
                </li>
                <?php if(isset($_SESSION)) : ?>
                    <?php if(array_key_exists("cart", $_SESSION)) : ?>
                        <li>
                            <a href=<?= site_url("/product/add"); ?>>Add product</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <li>
                    <a href="#">Contact</a>
                </li>
                <?php if(isset($_SESSION)) : ?>
                    <?php if(array_key_exists("cart", $_SESSION)) : ?>
                        <li>
                            <a href=<?= site_url("/user/getCart")?>>My cart</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(isset($_SESSION)) : ?>
                    <?php if(array_key_exists("name", $_SESSION)) : ?>
                        <li>
                            <a href=<?= site_url("/user/logout")?>>Logout</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
            <form id="searchProduct" action="" class="navbar-form navbar-right inline-form">
                <div class="form-group">
                    <input name="pattern" id="pattern" type="search" class="input-sm form-control" placeholder="Recherche">
                </div>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
