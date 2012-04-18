<?php use_stylesheet('photos.css') ?>
 
<div id="photos">
  <?php include_partial('photo/list', array('photos' => $photos)) ?>
</div>
