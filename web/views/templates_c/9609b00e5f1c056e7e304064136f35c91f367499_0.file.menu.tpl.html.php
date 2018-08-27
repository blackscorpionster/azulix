<?php
/* Smarty version 3.1.29, created on 2018-08-27 20:52:03
  from "C:\public_html\azulix\web\views\templates\menu.tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b83d7d38c0a55_96479382',
  'file_dependency' => 
  array (
    '9609b00e5f1c056e7e304064136f35c91f367499' => 
    array (
      0 => 'C:\\public_html\\azulix\\web\\views\\templates\\menu.tpl.html',
      1 => 1535367078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b83d7d38c0a55_96479382 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\public_html\\azulix\\vendor\\Smarty\\libs\\plugins\\modifier.capitalize.php';
?>
<div id="divMenuOptions" class="menuOptions">
	<?php
$_from = $_smarty_tpl->tpl_vars['menu']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_arrOpt_0_saved_item = isset($_smarty_tpl->tpl_vars['arrOpt']) ? $_smarty_tpl->tpl_vars['arrOpt'] : false;
$__foreach_arrOpt_0_saved_key = isset($_smarty_tpl->tpl_vars['appOptName']) ? $_smarty_tpl->tpl_vars['appOptName'] : false;
$_smarty_tpl->tpl_vars['arrOpt'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['appOptName'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['arrOpt']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['appOptName']->value => $_smarty_tpl->tpl_vars['arrOpt']->value) {
$_smarty_tpl->tpl_vars['arrOpt']->_loop = true;
$__foreach_arrOpt_0_saved_local_item = $_smarty_tpl->tpl_vars['arrOpt'];
?>
		<div id="DivAppPpt<?php echo $_smarty_tpl->tpl_vars['arrOpt']->value['OPT_COD'];?>
" class="menuOption" onclick="<?php echo $_smarty_tpl->tpl_vars['arrOpt']->value['COMMAND'];?>
">
			<?php echo substr(smarty_modifier_capitalize(mb_strtolower($_smarty_tpl->tpl_vars['appOptName']->value, 'UTF-8')),0,1);?>

		</div>
	<?php
$_smarty_tpl->tpl_vars['arrOpt'] = $__foreach_arrOpt_0_saved_local_item;
}
if ($__foreach_arrOpt_0_saved_item) {
$_smarty_tpl->tpl_vars['arrOpt'] = $__foreach_arrOpt_0_saved_item;
}
if ($__foreach_arrOpt_0_saved_key) {
$_smarty_tpl->tpl_vars['appOptName'] = $__foreach_arrOpt_0_saved_key;
}
?>
</div><?php }
}
