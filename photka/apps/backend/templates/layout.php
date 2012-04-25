<html lang="en">
    <head>
        <?php $sf_user->setCulture('pl_PL'); ?>
        <meta charset="utf-8" />
        <title>Photka - Panel Administracyjny</title>
        <meta name="description" content="" />
        <meta name="author" content="" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <style type="text/css">
            body {
                padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
            }
        </style>
    </head>
    <body>
        <?php if ($sf_user->isAuthenticated()): ?>
            <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container-fluid">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href="<?php echo url_for('homepage') ?>">Photka</a>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <li><a href="<?php echo url_for('sf_guard_user'); ?>">user</a></li>
                                <li><a href="<?php echo url_for('photo'); ?>">photo</a></li>
                                <li><a href="<?php echo url_for('category'); ?>">category</a></li>    
                                <li><a href="<?php echo url_for('category_value'); ?>">category values</a></li>    
                                <li class="pull-right"><a href="<?php echo url_for('sf_guard_signout'); ?>">logout</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container-fluid">
            <?php echo $sf_content ?>
        </div>
    </body>
</html>
