<?php
/* Smarty version 3.1.30, created on 2016-11-14 19:15:46
  from "/var/www/vhosts/test5/src/templates/admin/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829e3322a81a7_34906017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3521705977cd38b7bbb34b2f8cfe6297c57ebcc2' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/layout.tpl',
      1 => 1479071898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/auth_bar.tpl' => 1,
  ),
),false)) {
function content_5829e3322a81a7_34906017 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="icon" href="favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/js/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet">
    <link href="/js/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--<link href="/bootstarp/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="/bootstrap/css/navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../assets/js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <?php echo '<script'; ?>
 src="/bootstrap/js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-ui-1.11.4.custom/jquery-ui.min.js"><?php echo '</script'; ?>
>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
</head>

<body>

<div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">Admin panel</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/admin" id="home"  class="menu">Главная</a></li>
                    <!--<li><a href="/admin/upload" id="upload"  class="menu">Изображения</a></li>-->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Изображения<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/upload" id="upload" class="menu">Загрузка (1 вариант)</a></li>
                            <li><a href="/admin/upload2" id="upload2" class="menu">Загрузка (2 вариант)</a></li>
                            <!--<li role="separator" class="divider"></li>-->
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">База данных<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/backup" id="backup" class="menu">Скачать дамп БД</a></li>
                            <li><a href="/admin/recovery" id="recovery" class="menu">Залить дамп БД</a></li>
                            <!--<li role="separator" class="divider"></li>-->
                            </li>

                        </ul>



                </ul>
                <?php $_smarty_tpl->_subTemplateRender("file:admin/auth_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">

        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9724939475829e33229a7f2_45305289', "content");
?>


    </div>

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>-->
<?php echo '<script'; ?>
>window.jQuery || document.write('<?php echo '<script'; ?>
 src="../../assets/js/vendor/jquery.min.js"><\/script>')<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<?php echo '<script'; ?>
 src="/bootstrap/js/ie10-viewport-bug-workaround.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/js/app.js"><?php echo '</script'; ?>
>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3758272715829e33229e8b5_43003671', "bottom_js");
?>

</body>
</html><?php }
/* {block "content"} */
class Block_9724939475829e33229a7f2_45305289 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block "content"} */
/* {block "bottom_js"} */
class Block_3758272715829e33229e8b5_43003671 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "bottom_js"} */
}
