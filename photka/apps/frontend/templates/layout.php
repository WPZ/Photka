<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php use_javascript('jquery-1.7.1.min.js'); ?>
        <?php use_javascript('bootstrap.min.js'); ?>
        <?php include_javascripts() ?>
        <script type="text/javascript">
            $(function () {
                var form = $('#sf_guard_signin');
                $('#login').click(function(){
                    form.submit();
                })
            })
        </script>    
    </head>
    <body>
        
      <div class="modal hide" id="logowanie">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Logowanie</h3>
        </div>
       <div class="modal-body">
            <?php  include_component('sfApply', 'login'); ?>
        </div>
        <div class="modal-footer">
          <a href="#" id="login" class="btn btn-warning">zaloguj</a>
      </div>
      </div>
        
      <div class="modal hide" id="rejestracja">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Rejestracja</h3>
        </div>
        <div class="modal-body">
          <form>
<!--            <p class="control-group">
              <input type="text" placeholder="login" class="input-medium"/> 
              <span class="help-inline">maksimum 12 znaków</span>
            </p>
            <p class="control-group">
              <input type="password" placeholder="hasło" class="input-medium"/>
              <span class="help-inline">minimum 8 znaków</span>
            </p>
            <p class="control-group error">
              <input type="password" placeholder="powtórz hasło" class="input-medium"/> 
              <span class="help-inline">hasła muszą być zgodne</span>
            </p>-->
          </form>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-info">zarejestruj</a>
        </div>
      </div>
        
      <div class="navbar navbar-fixed-top"> 
        <div class="navbar-inner"> 
          <div class="container"> 
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
              <span class="icon-bar"></span> 
            </a> 
            <a class="brand" href="<?php echo url_for('homepage') ;?>">Photka</a> 
            <div class="nav-collapse"> 
              <ul class="nav"> 
                <li class="active"><a href="./index.php">Strona główna</a></li> 
              </ul>
              <div id="panel-right" class="pull-right">
                  <form id="search-bar" class="form-horizontal" action="<?php echo url_for('photo_search') ?>" method="get">
                    <div class='input-append'> 
                      <input placeholder="wpisz szukaną frazę" type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
                      <button class='btn add-on' value="search" >
                        <i class="icon-search"></i>
                      </button>
                    </div>
                  </form>
                  <?php if ($sf_user->isAuthenticated()): ?>
                    <div class="btn-group">
                      <button id="btn-user" class="btn btn-success"><?php echo($sf_user->getUsername()); ?></button>
                      <button class="btn dropdown-toggle btn-success" data-toggle="dropdown">
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo url_for('guard/logout');?>">wyloguj</a></li>
                      </ul>
                    </div>
                  <?php else: ?>
                    <a id="btn-register" class="btn btn-info" href="<?php echo url_for('sfApply/apply'); ?>">zarejestruj</a>
                    <a id="btn-login" class="btn btn-warning" data-toggle="modal" href="#logowanie">zaloguj</a>
                  <?php endif ?>
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
        
        <hr> 
   
        <footer> 
          <p>Photka, Uniwersytet Jagielloński 2012</p> 
        </footer> 
        
      </div>

    </body>
</html>
