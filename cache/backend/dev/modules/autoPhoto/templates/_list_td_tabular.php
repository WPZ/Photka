<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $photo->getName() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_category_id">
  <?php echo $photo->getCategoryId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $photo->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_location">
  <?php echo $photo->getLocation() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_path">
  <?php echo $photo->getPath() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_public">
  <?php echo get_partial('photo/list_field_boolean', array('value' => $photo->getIsPublic())) ?>
</td>
