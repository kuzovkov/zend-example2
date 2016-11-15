<?php
/* Smarty version 3.1.30, created on 2016-11-15 21:02:14
  from "/var/www/vhosts/test5/src/templates/admin/crud/img_list_select.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b4da617a186_53699046',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ac6fbdcdb8ffd935c0ccdd0c9f1364e7744b522' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/img_list_select.tpl',
      1 => 1479156046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582b4da617a186_53699046 (Smarty_Internal_Template $_smarty_tpl) {
?>
<hr/>

    <div id="image-list">
    <?php if ($_smarty_tpl->tpl_vars['images']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
            <div class="image-conteiner">
                <img id="<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
" class="image-for-select" src="/<?php echo $_smarty_tpl->tpl_vars['upload_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
" width="20%", height="20%" title="Выбрать"/>
                <p><?php echo $_smarty_tpl->tpl_vars['image']->value['origin_name'];?>
&nbsp;</p>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


    <?php } else { ?>
        <h3>Изображений не загружено</h3>
    <?php }?>

        <div class="clear"></div>
    </div>



<?php echo '<script'; ?>
 type="text/javascript">
    $('.image-for-select').click(function(){
        var image = this.id;
        document.getElementById('img-preview').src = '/<?php echo $_smarty_tpl->tpl_vars['upload_dir']->value;?>
/' + image;
        document.getElementById('img-value').value = image;
        //alert(image);
    });
<?php echo '</script'; ?>
><?php }
}
