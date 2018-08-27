<?php
/* Smarty version 3.1.29, created on 2018-08-27 20:52:03
  from "C:\public_html\azulix\web\views\templates\contacts.tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b83d7d3d81b90_69418619',
  'file_dependency' => 
  array (
    '4856a13654a53d8bb483baf446f2403ae5246ffb' => 
    array (
      0 => 'C:\\public_html\\azulix\\web\\views\\templates\\contacts.tpl.html',
      1 => 1535366826,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b83d7d3d81b90_69418619 ($_smarty_tpl) {
?>
<div id="divContacsContainer">
	<?php
$_from = $_smarty_tpl->tpl_vars['contacts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_arrContacto_0_saved_item = isset($_smarty_tpl->tpl_vars['arrContacto']) ? $_smarty_tpl->tpl_vars['arrContacto'] : false;
$__foreach_arrContacto_0_saved_key = isset($_smarty_tpl->tpl_vars['pos']) ? $_smarty_tpl->tpl_vars['pos'] : false;
$_smarty_tpl->tpl_vars['arrContacto'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['pos'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['arrContacto']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pos']->value => $_smarty_tpl->tpl_vars['arrContacto']->value) {
$_smarty_tpl->tpl_vars['arrContacto']->_loop = true;
$__foreach_arrContacto_0_saved_local_item = $_smarty_tpl->tpl_vars['arrContacto'];
?>
		<div id="divContact<?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['COD_USER_GUEST'];?>
" onclick="JsonShowContacChatWindow(<?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['COD_USER_GUEST'];?>
,'<?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['TXT_NAME'];?>
','<?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['TXT_NAME'];?>
 <?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['TXT_SURNAME'];?>
')" class="contactOption" title="<?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['TXT_NAME'];?>
 <?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['TXT_SURNAME'];?>
">
			<?php echo $_smarty_tpl->tpl_vars['arrContacto']->value['TXT_NAME'];?>

		</div>
	<?php
$_smarty_tpl->tpl_vars['arrContacto'] = $__foreach_arrContacto_0_saved_local_item;
}
if ($__foreach_arrContacto_0_saved_item) {
$_smarty_tpl->tpl_vars['arrContacto'] = $__foreach_arrContacto_0_saved_item;
}
if ($__foreach_arrContacto_0_saved_key) {
$_smarty_tpl->tpl_vars['pos'] = $__foreach_arrContacto_0_saved_key;
}
?>
</div>
<?php }
}
