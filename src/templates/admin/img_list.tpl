<hr/>
<form method="post" action="/admin/delimages">
    <div id="image-list">
        {if isset($images) && $images}
        {foreach $images as $image}
        <div class="image-conteiner">
            <img src="/{$upload_dir}/{$image['name']}" width="20%", height="20%" />
            <p>{$image['origin_name']}&nbsp; <input class="image-checkbox" type="checkbox" name="{$image['name']}"/></p>
        </div>
        {/foreach}

        {else}
        <h3>Изображений не загружено</h3>
        {/if}

        <div class="clear"></div>
    </div>


    <button class="img-del-btn">Удалить отмеченные</button>
</form>
<a href="#" id="select-all-img">Отметить все</a>
<a href="#" id="unselect-all-img">Снять отметки со всех</a>

<script type="text/javascript">
    $('#select-all-img').click(function(ev){
        ev.preventDefault();
        $('input:checkbox').prop('checked', true);
    });
    $('#unselect-all-img').click(function(ev){
        ev.preventDefault();
        $('input:checkbox').prop('checked', false);
    });
</script>