<td colspan="6">
  <?php echo __('%%name%% - %%category_id%% - %%description%% - %%location%% - %%path%% - %%is_public%%', array('%%name%%' => $photo->getName(), '%%category_id%%' => $photo->getCategoryId(), '%%description%%' => $photo->getDescription(), '%%location%%' => $photo->getLocation(), '%%path%%' => $photo->getPath(), '%%is_public%%' => get_partial('photo/list_field_boolean', array('value' => $photo->getIsPublic()))), 'messages') ?>
</td>
