<?php
/* Smarty version 3.1.29, created on 2018-08-27 20:52:03
  from "C:\public_html\azulix\web\views\templates\userDetails.tpl.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b83d7d3646507_63276530',
  'file_dependency' => 
  array (
    '884468884d80b31b0399ddab72b4a351ac219215' => 
    array (
      0 => 'C:\\public_html\\azulix\\web\\views\\templates\\userDetails.tpl.html',
      1 => 1535367102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b83d7d3646507_63276530 ($_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\public_html\\azulix\\vendor\\Smarty\\libs\\plugins\\modifier.capitalize.php';
?>
<div id="divAccountInfo" class="accountInfo">
	<div id="sessionInfo" style="position:absolute;"><?php echo smarty_modifier_capitalize(mb_strtolower($_smarty_tpl->tpl_vars['accountName']->value, 'UTF-8'));?>
</div>
</div><?php }
}
