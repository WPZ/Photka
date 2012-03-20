<td class="sf_admin_text sf_admin_list_td_username">
  <?php echo $sf_guard_user->getUsername() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_email_address">
  <?php echo $sf_guard_user->getEmailAddress() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('user/list_field_boolean', array('value' => $sf_guard_user->getIsActive())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_super_admin">
  <?php echo get_partial('user/list_field_boolean', array('value' => $sf_guard_user->getIsSuperAdmin())) ?>
</td>
