<?php use_helper('I18N', 'Date') ?>
<?php include_partial('photo/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Photo', array(), 'messages') ?></h1>

  <?php include_partial('photo/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('photo/form_header', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('photo/form', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('photo/form_footer', array('photo' => $photo, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
