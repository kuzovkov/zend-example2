<?php
/* Smarty version 3.1.30, created on 2016-11-14 23:06:13
  from "/var/www/vhosts/test5/src/templates/admin/simple_upload_form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582a1935ed5b79_80397863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2fde9aa284c374c6fcc2ba79c97aa16d05ce7ac' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/simple_upload_form.tpl',
      1 => 1479152656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582a1935ed5b79_80397863 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="/css/upload/main.css" type="text/css" media="screen, projection" />
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['upload_url'];?>
" enctype="multipart/form-data">
    <div class="login-form">
        <div class="form-group">
            <label for="file">Файлы изображения</label>
            <input id="file" type="file" class="form-control" name="<?php echo $_smarty_tpl->tpl_vars['data']->value['field_name'];?>
[]" multiple placeholder="Файл изображения">
        </div>
        <button type="submit" id="login-btn" class="btn btn-default">Загрузить</button>
    </div>
</form>

<div class="img-wrap">
    <h5>Загруженные изображения</h5>
    <div id="show-images"><img class="preload" src="/img/preload.gif"/></div>
</div>
<?php echo '<script'; ?>
>
    function showImages(){
        $('#show-images').load('/admin/imglist');
    }
    showImages();
    showImages();
<?php echo '</script'; ?>
><?php }
}
