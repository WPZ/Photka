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
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
            </a> 
            <a class="brand" href="#">Photka</a> 
            <div class="nav-collapse"> 
              <ul class="nav"> 
                <li class="active"><a href="./index.php">Strona główna</a></li> 
              </ul> 
              <a id="btn-register" class="pull-right btn btn-info" href="#">zarejestruj</a>
              <div id="login-bar" class="login navbar-text pull-right">
                  <input type="text" placeholder="login" class="input-small inline"/> 
                  <input type="password" placeholder="pass" class="input-small inline"/> 
                  <input type="submit" value="zaloguj" />
              </div>
          <!--    <p class="navbar-text pull-right">zalogowany jako: <a href="#">username</a></p> -->
            </div>
          </div> 
        </div> 
      </div> 
    
    <!--
        <div class="header top">
            <div class="banner span9"><h1>Photka</h1></div>
            <div class="login span3">
                <input type="text" placeholder="login" /> 
                <input type="password" placeholder="pass" /> 
            </div>
        </div>
    -->

      <div class="container">   
        <?php echo $sf_content ?>
      </div>
      
    </body>
</html>
