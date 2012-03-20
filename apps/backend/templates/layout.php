<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
                        <a class="brand" href="#">Photka</a>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <li class=""><a href="<?php echo url_for('sf_guard_user'); ?>">user</a></li>
                                <li class=""><a href="<?php echo url_for('photo'); ?>">photo</a></li>
                                <li class=""><a href="<?php echo url_for('category'); ?>">category</a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
        <div class="content" style="margin-top: 20px;">
        <?php echo $sf_content ?>
        </div>    
    </body>
</html>
