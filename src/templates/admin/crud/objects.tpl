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