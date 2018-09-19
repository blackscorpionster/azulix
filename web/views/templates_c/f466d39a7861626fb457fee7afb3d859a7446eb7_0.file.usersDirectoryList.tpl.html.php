<?php
/* Smarty version 3.1.29, created on 2018-08-30 21:26:08
  from "C:\public_html\azulix\web\views\templates\usersDirectoryList.tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b87d4503d23b0_29954989',
  'file_dependency' => 
  array (
    'f466d39a7861626fb457fee7afb3d859a7446eb7' => 
    array (
      0 => 'C:\\public_html\\azulix\\web\\views\\templates\\usersDirectoryList.tpl.html',
      1 => 1535628331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b87d4503d23b0_29954989 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\public_html\\azulix\\vendor\\Smarty\\libs\\plugins\\modifier.capitalize.php';
$_from = $_smarty_tpl->tpl_vars['directory']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_contact_0_saved_item = isset($_smarty_tpl->tpl_vars['contact']) ? $_smarty_tpl->tpl_vars['contact'] : false;
$__foreach_contact_0_saved_key = isset($_smarty_tpl->tpl_vars['ordenContacts']) ? $_smarty_tpl->tpl_vars['ordenContacts'] : false;
$_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['ordenContacts'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['contact']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ordenContacts']->value => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
$__foreach_contact_0_saved_local_item = $_smarty_tpl->tpl_vars['contact'];
?>

	<div id="contactFomDirectory<?php echo $_smarty_tpl->tpl_vars['contact']->value['COD_USER_GUEST'];?>
" class="usrContact" <?php if ($_smarty_tpl->tpl_vars['contact']->value['COD_STATE'] == 2) {?>style="background-color:#<?php if ($_smarty_tpl->tpl_vars['contact']->value['REQUEST_TYPE'] == "OUT") {?>D3F291<?php } else { ?>C9E4FC<?php }?>;" <?php }?> >
		
		<div style="position:absolute;"><?php echo $_smarty_tpl->tpl_vars['contact']->value['TXT_NAME'];?>
 <?php echo $_smarty_tpl->tpl_vars['contact']->value['TXT_SURNAME'];?>
</div>
		
		<?php if ($_smarty_tpl->tpl_vars['contact']->value['COD_STATE'] == 1) {?>
			<div title="<?php echo $_smarty_tpl->tpl_vars['labels']->value['delete_contact'];?>
" style="position:absolute;right:20px;cursor:pointer;" onclick="deleteContact(<?php if ($_smarty_tpl->tpl_vars['contact']->value['REQUEST_TYPE'] == "OUT") {
echo $_smarty_tpl->tpl_vars['contact']->value['COD_USER_GUEST'];
} else {
echo $_smarty_tpl->tpl_vars['contact']->value['COD_USER_GUEST'];
}?>,0,'<?php echo smarty_modifier_capitalize(mb_strtolower($_smarty_tpl->tpl_vars['contact']->value['TXT_NAME'], 'UTF-8'));?>
 <?php echo smarty_modifier_capitalize(mb_strtolower($_smarty_tpl->tpl_vars['contact']->value['TXT_SURNAME'], 'UTF-8'));?>
')">
				X
			</div>	
		<?php }?>
		
	</div>

<?php
$_smarty_tpl->tpl_vars['contact'] = $__foreach_contact_0_saved_local_item;
}
if ($__foreach_contact_0_saved_item) {
$_smarty_tpl->tpl_vars['contact'] = $__foreach_contact_0_saved_item;
}
if ($__foreach_contact_0_saved_key) {
$_smarty_tpl->tpl_vars['ordenContacts'] = $__foreach_contact_0_saved_key;
}
}
}
