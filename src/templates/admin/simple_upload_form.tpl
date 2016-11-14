<link rel="stylesheet" href="/css/upload/main.css" type="text/css" media="screen, projection" />
<form method="post" action="{$data['upload_url']}" enctype="multipart/form-data">
    <div class="login-form">
        <div class="form-group">
            <label for="file">Файлы изображения</label>
            <input id="file" type="file" class="form-control" name="{$data['field_name']}[]" multiple placeholder="Файл изображения">
        </div>
        <button type="submit" id="login-btn" class="btn btn-default">Загрузить</button>
    </div>
</form>

<div class="img-wrap">
    <h5>Загруженные изображения</h5>
    <div id="show-images"><img class="preload" src="/img/preload.gif"/></div>
</div>
<script>
    function showImages(){
        $('#show-images').load('/admin/imglist');
    }
    showImages();
    showImages();
</script>