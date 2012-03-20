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
        <div class="header top">
            <div class="banner span9"><h1>Photka</h1></div>
            <div class="login span3">
                <input type="text" placeholder="login" /> 
                <input type="password" placeholder="pass" /> 
            </div>
        </div>
        <div class="clear"></div>
        <div class="span9">
            <?php echo $sf_content ?>
        </div>
        <div class="span3"><p>sidebar</p></div>
    </body>
</html>
