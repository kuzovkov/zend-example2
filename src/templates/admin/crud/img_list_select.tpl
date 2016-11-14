<hr/>

    <div id="image-list">
    {if $images}
        {foreach $images as $image}
            <div class="image-conteiner">
                <img id="{$image['name']}" class="image-for-select" src="/{$upload_dir}/{$image['name']}" width="20%", height="20%" title="Выбрать"/>
                <p>{$image['origin_name']}&nbsp;</p>
            </div>
        {/foreach}

    {else}
        <h3>Изображений не загружено</h3>
    {/if}

        <div class="clear"></div>
    </div>



<script type="text/javascript">
    $('.image-for-select').click(function(){
        var image = this.id;
        document.getElementById('img-preview').src = '/{$upload_dir}/' + image;
        document.getElementById('img-value').value = image;
        //alert(image);
    });
</script>