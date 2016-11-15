<?php
/* Smarty version 3.1.30, created on 2016-11-15 20:57:51
  from "/var/www/vhosts/test5/src/templates/admin/crud/select_image.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b4c9f154ba7_59633083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8f77beeedf486e92d1d12d4150f383b59fbc78c' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/select_image.tpl',
      1 => 1479155828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582b4c9f154ba7_59633083 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="/css/upload/main.css" type="text/css" media="screen, projection" />
<?php echo '<script'; ?>
 type="text/javascript">
    var open_image = false;
    if ( $('a').is('#open-images') ) {
        $('#open-images').click(function(){
            if (!open_image) {
                $('#open-images').text('Скрыть');
                open_image = true;
                $('#open-images').after('<div id="img-wrap"><img class="preload" src="/img/preload.gif"/></div>');
                $('#img-wrap').load('/admin/imglist_select');
            }else{
                $('#open-images').text('Изображения');
                open_image = false;
                $('#img-wrap').html('');
            }
        });
    }
<?php echo '</script'; ?>
><?php }
}
