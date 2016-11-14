<?php
/* Smarty version 3.1.30, created on 2016-11-14 22:47:33
  from "/var/www/vhosts/test5/src/templates/admin/upload_form_multi.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582a14d5caa171_73191618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12e08a42503da4f289eda37c406e9399d9244ffe' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/upload_form_multi.tpl',
      1 => 1479152849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582a14d5caa171_73191618 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="/css/upload/main.css" type="text/css" media="screen, projection" />
 <?php echo '<script'; ?>
 type="text/javascript" src="/js/upload/uploaderObject.js"><?php echo '</script'; ?>
>


<div id="wrapper">

    <div id="workfield">
        <div id="content">
            <div>Чтобы добавить картинки, выбери их в поле
                <input type="file" name="file" id="file-field" multiple="true" /><br/>
                ... или просто перетащи в область ниже
            </div>
            <div>
                    <input id="makethumb" type="checkbox" name="makethumb" />&nbsp;
                    <label>Сделать миниатюру</label><br />
                    <label>Масштаб:&nbsp;</label><span id="scale-value"></span>%<br />
                    <div></div><input id="scale" type="range" min="5" max="100" step="1" value="50" name="percent"/>
            </div>
            <div id="img-container">
                <ul id="img-list"></ul>
            </div>
        </div>
    </div>

    <div id="leftpanel">
        <div id="actions">
            <span id="info-count">Изображений не выбрано</span><br/>
            Общий размер: <span id="info-size">0</span> Кб<br/><br/>
            <button id="upload-all">Загрузить</button><button id="clear-all">Очистить список</button>
        </div>
        <div id="console">
        </div>
    </div>

    <div class="img-wrap">
        <h5>Загруженные изображения</h5>
        <div class="clear" id="show-images"><img class="preload" src="/img/preload.gif"/></div>
    </div>
</div>

<?php echo '<script'; ?>
 type="text/javascript">
    function showImages(){
        $('#show-images').load('/admin/imglist');
    }
    $(document).ready(function() {
    $("#scale-value").text($("#scale").val());
    // Консоль
    var console = $("#console");
    // Инфа о выбранных файлах
    var countInfo = $("#info-count");
    var sizeInfo = $("#info-size");
    // Стандарный input для файлов
    var fileInput = $('#file-field');

    // ul-список, содержащий миниатюрки выбранных файлов
    var imgList = $('ul#img-list');

    // Контейнер, куда можно помещать файлы методом drag and drop
    var dropBox = $('#img-container');
    // Счетчик всех выбранных файлов и их размера
    var imgCount = 0;
    var imgSize = 0;


    ////////////////////////////////////////////////////////////////////////////
    // Вывод в консоль
    function log(str) {
        $('<p/>').html(str).prependTo(console);
    }
    // Вывод инфы о выбранных
    function updateInfo() {
        countInfo.text( (imgCount == 0) ? 'Изображений не выбрано' : ('Изображений выбрано: '+imgCount));
        sizeInfo.text(Math.round(imgSize / 1024));
    }
    // Обновление progress bar'а
    function updateProgress(bar, value) {
        var width = bar.width();
        var bgrValue = -width + (value * (width / 100));
        bar.attr('rel', value).css('background-position', bgrValue+'px center').text(value+'%');
    }
    // Отображение выбраных файлов и создание миниатюр
    function displayFiles(files) {
        var imageType = /image.*/;
        var num = 0;

        $.each(files, function(i, file) {

            // Отсеиваем не картинки
            if (!file.type.match(imageType)) {
                log('Файл отсеян: `'+file.name+'` (тип '+file.type+')');
                return true;
            }

            num++;

            // Создаем элемент li и помещаем в него название, миниатюру и progress bar,
            // а также создаем ему свойство file, куда помещаем объект File (при загрузке понадобится)
            var li = $('<li/>').appendTo(imgList);
            $('<div/>').text(file.name).appendTo(li);
            var img = $('<img/>').appendTo(li);
            $('<div/>').addClass('progress').attr('rel', '0').text('0%').appendTo(li);
            li.get(0).file = file;
            // Создаем объект FileReader и по завершении чтения файла, отображаем миниатюру и обновляем
            // инфу обо всех файлах
            var reader = new FileReader();
            reader.onload = (function(aImg) {
                return function(e) {
                    aImg.attr('src', e.target.result);
                    aImg.attr('width', 150);
                    log('Картинка добавлена: `'+file.name + '` (' +Math.round(file.size / 1024) + ' Кб)');
                    imgCount++;
                    imgSize += file.size;
                    updateInfo();
                };
            })(img);

            reader.readAsDataURL(file);
        });
    }


    ////////////////////////////////////////////////////////////////////////////
    // Обработка события выбора файлов через стандартный input
    // (при вызове обработчика в свойстве files элемента input содержится объект FileList,
    //  содержащий выбранные файлы)
    fileInput.bind({
        change: function() {
            log(this.files.length+" файл(ов) выбрано через поле выбора");
            displayFiles(this.files);
        }
    });

    // Обработка событий drag and drop при перетаскивании файлов на элемент dropBox
    // (когда файлы бросят на принимающий элемент событию drop передается объект Event,
    //  который содержит информацию о файлах в свойстве dataTransfer.files. В jQuery "оригинал"
    //  объекта-события передается в св-ве originalEvent)
    dropBox.bind({
        dragenter: function() {
            $(this).addClass('highlighted');
            return false;
        },
        dragover: function() {
            return false;
        },
        dragleave: function() {
            $(this).removeClass('highlighted');
            return false;
        },
        drop: function(e) {
            var dt = e.originalEvent.dataTransfer;
            log(dt.files.length+" файл(ов) выбрано через drag'n'drop");
            displayFiles(dt.files);
            return false;
        }
    });
    // Обаботка события нажатия на кнопку "Загрузить". Проходим по всем миниатюрам из списка,
    // читаем у каждой свойство file (добавленное при создании) и начинаем загрузку, создавая
    // экземпляры объекта uploaderObject. По мере загрузки, обновляем показания progress bar,
    // через обработчик onprogress, по завершении выводим информацию

    $("#upload-all").click(function() {

        imgList.find('li').each(function() {
            var uploadItem = this;
            var pBar = $(uploadItem).find('.progress');
            log('Начинаем загрузку `'+uploadItem.file.name+'`...');
            new uploaderObject({
                file:       uploadItem.file,
                url:        '<?php echo $_smarty_tpl->tpl_vars['data']->value['upload_url'];?>
',
                fieldName:  '<?php echo $_smarty_tpl->tpl_vars['data']->value['field_name'];?>
',
                 makethumb: getCheckbox(),
                percent: getPercent(),
                onprogress: function(percents) {
                    updateProgress(pBar, percents);
                },

                oncomplete: function(done, data) {
                    if(done) {
                        updateProgress(pBar, 100);
                        showImages();
                        showImages();
                        log('Файл `'+uploadItem.file.name+'` загружен, полученные данные:<br/>*****<br/>'+data+'<br/>*****');
                    } else {
                        log('Ошибка при загрузке файла `'+uploadItem.file.name+'`:<br/>'+this.lastError.text);
                    }
                }
            });
        });
    });

    $("#clear-all").click(function(){
        $("#console").html('');
        imgList.html('');
        dropBox.removeClass('highlighted');
        imgCount = 0;
        imgSize = 0;
        updateInfo();
    });


    // Проверка поддержки File API в браузере
    if(window.FileReader == null) {
        log('Ваш браузер не поддерживает File API!');
    }

    $("#scale").change(function(){
        $("#scale-value").text($(this).val());
    });

    function getCheckbox(){
        return document.getElementById('makethumb').checked;
    }

    function getPercent(){
        return document.getElementById('scale').value;
    }

    showImages();
});
    showImages();
<?php echo '</script'; ?>
><?php }
}
