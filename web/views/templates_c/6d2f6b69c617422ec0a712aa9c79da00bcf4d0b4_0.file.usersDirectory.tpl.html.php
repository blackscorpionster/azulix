<?php
/* Smarty version 3.1.29, created on 2018-08-30 21:26:07
  from "C:\public_html\azulix\web\views\templates\usersDirectory.tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b87d44fbcc400_12218804',
  'file_dependency' => 
  array (
    '6d2f6b69c617422ec0a712aa9c79da00bcf4d0b4' => 
    array (
      0 => 'C:\\public_html\\azulix\\web\\views\\templates\\usersDirectory.tpl.html',
      1 => 1535628354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:usersDirectoryList.tpl.html' => 1,
  ),
),false)) {
function content_5b87d44fbcc400_12218804 ($_smarty_tpl) {
?>
<div class="JasonSaysChatBox" style="_width:300px;" id="divMainDirectoryBox" onmouseover="checkReadBox('divMainDirectoryBox')">
	<div style="position:relative;">
		<div style="position:relative;"><?php echo $_smarty_tpl->tpl_vars['labels']->value['add_contact'];?>
</div>
		<div class="closeX" title="" onclick="byebye('divMainDirectoryBox')">X</div>
	</div>
	<div class="JsonSaysRequestsBox">
		<div class="JsonSaysFindBox" id="JsonSaysFindBox" title="<?php echo $_smarty_tpl->tpl_vars['labels']->value['find_contact'];?>
">
			<div style="position:relative;margin-right:30px;">
				<input type="text" id="txtFindMe" name="txtFindMe" value="" placeholder="<?php echo $_smarty_tpl->tpl_vars['labels']->value['find_usr_lbl'];?>
" class="textBox" onclick="this.value=''" />
			</div>
			<div style="position:absolute;right:0px;top:0px;cursor:pointer;margin-top:10px;margin-right:5px;" onclick="JsonFindUser()">
				>>
			</div>
		</div>
		<div style="margin-top:10px;margin-bottom:10px;" class="JsonSaysFindBox" id="JsonSaysConactOPtion">
		</div>
		<!--<div style="margin-top:10px;" id="JsonSaysDirectoryBox">
			<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:usersDirectoryList.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		</div>-->
	</div>
</div>
<?php }
}
