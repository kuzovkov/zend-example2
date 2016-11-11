<!-- Static navbar -->
<br>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Test5.loc</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!--<li <?php check_active('');?>><a href="/">Статистика</a></li>-->
                <li <?php check_active('file');?>><a href="/file">Загрузка из файла</a></li>
                <li <?php check_active('images');?>><a href="/images">Изображения</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Адреса<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li <?php check_active('');?>><a href="/">Весь список</a></li>
                        <li <?php check_active('sended');?>><a href="/sended">Отправленные</a></li>
                        <li <?php check_active('nosended');?>><a href="/nosended">Неотправленные</a></li>
                        <li role="separator" class="divider"></li>
                        <li <?php check_active('del-all');?>><a href="/del-all">Удалить все</a></li>
                        <li <?php check_active('mark-as-nosend');?>><a href="/mark-as-nosend">Пометить все как неотправленные</a></li>
                        <li <?php check_active('mark-as-send');?>><a href="/mark-as-send">Пометить все как отправленные</a></li>
                        <li <?php check_active('del-sended');?>><a href="/del-sended">Удалить отправленные</a></li>
                        <li <?php check_active('set-data');?>><a href="/set-data">Задать тему/текст</a></li>
                        <!--

                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                        -->
                    </ul>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li <?php check_active('settings');?>><a href="/settings">Настройки</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
<script type="text/javascript">
    $('.navbar-nav li a').click(function(){
        $('.navbar-nav li').removeClass('active');
        $(this).parent().addClass('active');
    });


</script>
<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">