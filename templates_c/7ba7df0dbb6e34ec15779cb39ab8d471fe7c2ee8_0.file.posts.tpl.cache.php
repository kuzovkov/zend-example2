<?php
/* Smarty version 3.1.30, created on 2016-11-12 23:40:45
  from "/var/www/vhosts/test5/templates/posts.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58277e4d4773a1_31894124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ba7df0dbb6e34ec15779cb39ab8d471fe7c2ee8' => 
    array (
      0 => '/var/www/vhosts/test5/templates/posts.tpl',
      1 => 1478983242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58277e4d4773a1_31894124 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once '/var/www/vhosts/test5/include/Smarty/plugins/modifier.truncate.php';
$_smarty_tpl->compiled->nocache_hash = '32340720858277e4d44a5c0_08875257';
if ($_smarty_tpl->tpl_vars['posts']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'post');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
?>

    <div class="post_box">

        <h2><?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
<a href="#"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['post']->value['title']);?>
</a></h2> <?php $_smarty_tpl->_assignInScope('tags', $_smarty_tpl->tpl_vars['post']->value['tags']);
?>
        <div class="news_meta">Posted: <?php echo $_smarty_tpl->tpl_vars['post']->value['updated_at'];?>
 | Tags: <?php if ($_smarty_tpl->tpl_vars['tags']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
?><a href="#">&nbsp;<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
&nbsp; </a><?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}?></div>
        <div class="image_wrapper"><a href="#" target="_parent"><a class="fb_group" id="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
_image" href="/<?php echo $_smarty_tpl->tpl_vars['upload_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value['img'];?>
"><img src="/<?php echo $_smarty_tpl->tpl_vars['upload_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['post']->value['img'];?>
" alt="image" /></a></a></div>
        <div id="short_<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="short"><p align="justify"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['post']->value['body'],200);?>
</p></div>
        <div id="full_<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="full"><p align="justify"><?php echo $_smarty_tpl->tpl_vars['post']->value['body'];?>
</p></div>
        <div id="<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" class="in-more"><a class="continue">Больше...</a></div>
        <div class="cleaner"></div>
    </div>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }
}
}