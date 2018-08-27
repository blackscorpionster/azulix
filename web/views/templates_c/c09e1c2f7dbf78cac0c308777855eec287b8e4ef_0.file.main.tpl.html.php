<?php
/* Smarty version 3.1.29, created on 2018-08-27 20:52:03
  from "C:\public_html\azulix\web\views\templates\main.tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b83d7d3374da3_31820185',
  'file_dependency' => 
  array (
    'c09e1c2f7dbf78cac0c308777855eec287b8e4ef' => 
    array (
      0 => 'C:\\public_html\\azulix\\web\\views\\templates\\main.tpl.html',
      1 => 1535367113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:userDetails.tpl.html' => 1,
    'file:menu.tpl.html' => 1,
    'file:contacts.tpl.html' => 1,
  ),
),false)) {
function content_5b83d7d3374da3_31820185 ($_smarty_tpl) {
?>
<div id="divMainMenu" class="menu">
	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:userDetails.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:menu.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:contacts.tpl.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>
<div id="divMainContainer" class="mainContainer">
	<div id="divOptionTitle" class="optionTitle"></div>
	<div id="divMainWorkMarea" class="workArea"></div>
</div><?php }
}
