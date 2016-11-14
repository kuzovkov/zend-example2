{extends file='admin/layout.tpl'}
{block "content"}



<h4><a href="/admin">Home</a> -> {$data['model']->entity}</h4>
<h3>{$data['model']->title}</h3>

<p>
<form method="get" action="/admin/create/{$data['model']->entity}">
    <button>Create New</button>
</form>
</p>
<table class="table">
    <tr>
        {foreach $data['model']->schema_list as $col=>$val}
        {if $data['model']->schema_list[$col]['visible']}
        <th><a href="/admin/showlist/?entity={$data['model']->entity}&col={$col}&order={if isset($data['order'])}{$data['order']}{/if}">{$data['model']->schema_list[$col]['name']}</a></th>
        {/if}
        {/foreach}
    </tr>
    {foreach $data['list'] as $object}
    <tr>
        {foreach $data['model']->schema_list as $col=>$val}
        {if $data['model']->schema_list[$col]['visible']}
        {if $col == 'id'}
        <td><a title="Edit" href="/admin/edit/{$data['model']->entity}/{$object['id']}">{$object['id']}</a></td>
        {else}
        {if $data['model']->schema_list[$col]['type']=='string'}
        <td>{$object[$col]|strip_tags}</td>
        {elseif $data['model']->schema_list[$col]['type'] == 'text'}
        <td>{$object[$col]}</td>
        {elseif $data['model']->schema_list[$col]['type'] == 'datetime'}
        <td>{$object[$col]|date_format:"%Y/%m/%d %H:%i:%s"}</td>
        {elseif $data['model']->schema_list[$col]['type'] == 'date'}
        <td>{$object[$col]|date_format:"%Y/%m/%d"}</td>
        {elseif $data['model']->schema_list[$col]['type'] == 'img'}
        <td><img width="50" height="50" src="/{$data['upload_dir']}/{$object[$col]}"/></td>
        {elseif $data['model']->schema_list[$col]['type'] == 'boolean'}
        <td>{if $object[$col]} busy {/if}</td>
        {elseif $data['model']->schema_list[$col]['type'] == 'object_array'}
        <td>
            {$objects = $object[$col]}
            {foreach $objects as $obj}
            {$obj}&nbsp;
            {/foreach}
        </td>
        {elseif $data['model']->schema_list[$col]['type'] == 'array'}
        <td>{foreach $object[$col] as $item} {$item} {/foreach}</td>
        {/if}
        {/if}
        {/if}
        {/foreach}
        <td>
            <form onsubmit="return confirmDelete({$object['id']});" method="get" action="/admin/delete/{$data['model']->entity}/{$object['id']}"><button>Delete</button></form>
        </td>
        <td>
            <form method="get" action="/admin/edit/{$data['model']->entity}/{$object['id']}"><button>Edit</button></form>
        </td>

    </tr>

    {/foreach}

</table>


{/block}

{block "bottom_js"}
<script type="text/javascript">
    App.switchMenu('home');

    function confirmDelete(id){
        return confirm('Would you like delete item ' + id);
    }
</script>

{/block}