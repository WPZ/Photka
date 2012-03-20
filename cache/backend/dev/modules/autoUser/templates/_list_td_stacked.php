<td colspan="4">
  <?php echo __('%%username%% - %%email_address%% - %%is_active%% - %%is_super_admin%%', array('%%username%%' => $sf_guard_user->getUsername(), '%%email_address%%' => $sf_guard_user->getEmailAddress(), '%%is_active%%' => get_partial('user/list_field_boolean', array('value' => $sf_guard_user->getIsActive())), '%%is_super_admin%%' => get_partial('user/list_field_boolean', array('value' => $sf_guard_user->getIsSuperAdmin()))), 'messages') ?>
</td>
