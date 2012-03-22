<td colspan="2">
  <?php echo __('%%id%% - %%name%%', array('%%id%%' => link_to($category->getId(), 'category_edit', $category), '%%name%%' => $category->getName()), 'messages') ?>
</td>
