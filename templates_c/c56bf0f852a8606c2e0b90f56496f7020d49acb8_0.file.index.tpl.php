<?php
/* Smarty version 3.1.30, created on 2016-11-14 01:05:52
  from "/var/www/vhosts/test5/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5828e3c0ae2322_97121371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c56bf0f852a8606c2e0b90f56496f7020d49acb8' => 
    array (
      0 => '/var/www/vhosts/test5/templates/index.tpl',
      1 => 1478982924,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:posts.tpl' => 1,
  ),
),false)) {
function content_5828e3c0ae2322_97121371 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7626097635828e3c0ade6c1_96688046', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_7626097635828e3c0ade6c1_96688046 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div id="posts-wrapper">
    <?php $_smarty_tpl->_subTemplateRender("file:posts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>

<button id="add-posts">Загрузить еще...</button>



<?php echo '<script'; ?>
 type="text/javascript">
    function hideFull() {
        $('div.full').hide();
    }
    function showShort() {
        $('div.short').show();
    }
    hideFull();
    function more( id, elem ) {
        console.log(id);
        if ( elem.html() == '<a class="continue">Больше...</a>') {
            $('#short_'+id).hide();
            $('#full_'+id).fadeIn(1000);
            elem.html('<a class="continue">Меньше...</a>');
        }else if (elem.html() == '<a class="continue">Меньше...</a>'){
            $('#full_'+id).hide();
            $('#short_'+id).fadeIn(1000);
            elem.html('<a class="continue">Больше...</a>');
        }
    }
    $('.in-more').click(function(){
        var id=this.id;
        var elem = $(this);
        more(id,elem);
    });
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $('#add-posts').click(function(){
        var number_posts = $('.post_box').length;
        //console.log(number_posts);
        $.post('/addposts/?n=' + (number_posts-1), function (content) {
            $('#posts-wrapper').append(content);
            hideFull();
            showShort();
            $('.in-more').each(function(){
                $(this).unbind('click');
            });
            $('.in-more').click(function(){
                var id=this.id;
                var elem = $(this);
                more(id,elem);
            });
        });
    });
    $("a.fb_group").fancybox();
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "content"} */
}
