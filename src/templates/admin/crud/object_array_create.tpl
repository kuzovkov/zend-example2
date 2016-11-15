<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />

<div id="objects-wrap">
    <div class="inner-object-wrap" id="inner-object-wrap">
        {if isset($value) && is_array($value)}
        {foreach $value as $obj}
            <a href="#" id="{$obj['id']}" class="inner-object" title="Удалить">{$obj['name']}</a>
        {/foreach}
        {/if}
    </div>

    {$array_object = $data['model']->getObjects()}
    <hr/>
    Выберите из существующих:
    <div class="all-object-wrap">
        {foreach $array_object as $obj}
        <a href="#" id="{$obj['id']}" class="all-object" title="Добавить">{$obj['name']}</a>
        {/foreach}

    </div>
</div>

<input id="object_array_input" type="hidden" name="tags" value="" />

<script>
    var objectId = [];
    function setHandlers(){
        $('.all-object').click(function(event){
            event.preventDefault();
            var id = this.id;
            var name = this.text;
            if (objectId.indexOf(id) == -1){
                objectId.push(id);
                $('#object_array_input').val(objectId.join(','));
                $('#inner-object-wrap').append('<a href="#" id="'+id+'" class="inner-object" title="Удалить">'+name+'</a>');
                $('.inner-object').click(function(event){
                    event.preventDefault();
                    var id = this.id;
                    $(this).remove();
                    for (var i = 0; i < objectId.length; i++){
                        if ((objectId[i]) == id)
                            objectId.splice(i,1);
                    }
                    $('#object_array_input').val(objectId.join(','));
                });
            }
        });
    }
    setHandlers();
</script>
