<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />

<div id="objects-wrap">
    <div class="inner-object-wrap">
    {if isset($value)}
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

<script>
    function setHandlers(){
        $('.inner-object').click(function(event){
            event.preventDefault();
            var id = this.id;
            $.get('/admin/removetag/?obj={$data['object']['id']}&tag='+id, function(data){
                console.log(data);
                updateObjectsWrap();
            });
        });
        $('.all-object').click(function(event){
            event.preventDefault();
            var id = this.id;
            $.get('/admin/addtag/?obj={$data['object']['id']}&tag='+id, function(data){
                console.log(data);
                updateObjectsWrap();
            });
        });
    }
    function updateObjectsWrap(){
        $('#objects-wrap').load('/admin/showtags/?obj={$data['object']['id']}', function(){
            setHandlers();
        });
    }
    setHandlers();
</script>