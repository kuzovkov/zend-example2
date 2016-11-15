<?php
/* Smarty version 3.1.30, created on 2016-11-15 20:57:51
  from "/var/www/vhosts/test5/src/templates/admin/crud/tinymce.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b4c9f0e74a3_79450464',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '958dff1d1e385977c471ca2b863c07d827a40191' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/tinymce.tpl',
      1 => 1479232669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582b4c9f0e74a3_79450464 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript" src="/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    if ( $('textarea').is('.html') ) {
        tinymce.init({
            selector: ".html", width: 800, height: 300, language : 'ru',
            plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste textcolor"
            ],
            image_list: [],
            toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
                toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
                menubar: false,
                code_dialog_width: 1024,
                toolbar_items_size: 'small',
                style_formats: [
                { title: 'Bold text', inline: 'b'},
                { title: 'Red text', inline: 'span', styles: { color: '#ff0000'}},
                { title: 'Red header', block: 'h1', styles: { color: '#ff0000'}},
                { title: 'Example 1', inline: 'span', classes: 'example1'},
                { title: 'Example 2', inline: 'span', classes: 'example2'},
                { title: 'Table styles'},
                { title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],
                templates: [
                { title: 'Test template 1', content: 'Test 1'},
                { title: 'Test template 2', content: 'Test 2'}
            ]
        });
    }
<?php echo '</script'; ?>
><?php }
}
