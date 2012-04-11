<?php use_helper('I18N') ?>
<!--<form method="POST" action="<?php // echo url_for("@sf_guard_signin") ?>" name="sf_guard_signin" id="sf_guard_signin" class="sf_apply_signin_inline">
    <?php // echo $form->renderHiddenFields(); ?>
    <input id="signin_username" type="text" name="signin[username]" placeholder="login..."/>
    <input id="signin_password" type="password" name="signin[password]" placeholder="hasło..."/>
    <br/>
    Zapamiętaj
    <input id="signin_remember" type="checkbox" name="signin[remember]"/>
    <input type="submit" value="<?php // echo __('Zaloguj') ?>" />
</form>-->



   <form method="POST" action="<?php echo url_for("@sf_guard_signin") ?>" name="sf_guard_signin" id="sf_guard_signin" class="sf_apply_signin_inline">
    <?php  echo $form->renderHiddenFields(); ?>
        <p class="control-group">
            <input id="signin_username" type="text" name="signin[username]" placeholder="login..."/>
            <span class="help-inline"></span>
        </p>
        <p class="control-group">
            <input id="signin_password" type="password" name="signin[password]" placeholder="hasło..."/>
            <span class="help-inline"></span>
        </p>
        <p class="control-group">
          Zapamiętaj
          <input id="signin_remember" type="checkbox" name="signin[remember]"/>  
        </p>
    </form>


