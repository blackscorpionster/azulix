<?php
/* Smarty version 3.1.29, created on 2018-08-23 21:50:04
  from "C:\public_html\azulix\web\views\templates\login.tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b7e9f6c1be3a4_24686084',
  'file_dependency' => 
  array (
    'a72d07000645f6900800bf458d27efe7ace34721' => 
    array (
      0 => 'C:\\public_html\\azulix\\web\\views\\templates\\login.tpl.html',
      1 => 1535024325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b7e9f6c1be3a4_24686084 ($_smarty_tpl) {
?>
<div id="divLogin" class="login">
	<input type="hidden" name="token" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
	<div style="margin-top:10px;">
		<?php echo $_smarty_tpl->tpl_vars['labels']->value['user_text'];?>

	</div>
	<div style="margin-top:10px;text-align:center;">
		<input type="text" id="txtLogin" name="txtLogin" class="textBox" value="" />
	</div>
	<div style="margin-top:10px;">
		<?php echo $_smarty_tpl->tpl_vars['labels']->value['pass_txt'];?>

	</div>
	<div style="margin-top:10px;text-align:center;">
		<input type="password" id="txtPass" name="txtPass" class="textBox" />
	</div>
	<div style="margin-top:10px;text-align:center;">
		<input class="button" type="button" id="btIngresar" name="btIngresar" value="<?php echo $_smarty_tpl->tpl_vars['labels']->value['log_in'];?>
" onClick="validateLogin(this.form)" />
	</div>
</div><?php }
}
