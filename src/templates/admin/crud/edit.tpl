{extends 'admin/layout.tpl'}
{block "content"}
<style>
.novalid
{
   border: 1px solid red;
}
.novalid-message
{
   color: red;
}
</style>

<h4><a href="/admin">Home</a> -> <a href="/admin/showlist/?entity={$data['model']->entity}">{$data['model']->entity}</a> -> {$data['model']->entity}</h4>
<h3>{$data['model']->title}</h3>
<form onsubmit="return validate();" method="POST" action="/admin/{$data['action']}/?entity={$data['model']->entity}{if isset($data['object'])}&id={$data['object']['id']}{/if}" enctype="application/x-www-form-urlencoded">
<table class="table">
{foreach $data['model']->schema_edit as $col=>$val}
{if $data['model']->schema_edit[$col]['visible']}
<tr>
	<td>{$data['model']->schema_edit[$col]['name']}</td>
    <td>

        {if isset($data['object'])}
            {if $data['model']->schema_edit[$col]['type'] == 'text'}
                {$value=$data['object'][$col]}
            {elseif $data['model']->schema_edit[$col]['type'] == 'datetime'}
                {$value=$data['object'][$col]|date_format:"%Y/%m/%d"}
            {elseif $data['model']->schema_edit[$col]['type'] == 'date'}
                {$value=$data['object'][$col]|date_format:"%Y/%m/%d"}
            {elseif $data['model']->schema_edit[$col]['type'] == 'array'}data.model.schema_edit[col]
                {$value=$data['object'][$col]|implode:","}
            {elseif $data['model']->schema_edit[$col]['type'] == 'img'}
                {$value=$data['object'][$col]}
            {elseif $data['model']->schema_edit[$col]['type'] == 'integer'}
                {$value=$data['object'][$col]}
            {elseif $data['model']->schema_edit[$col]['type'] == 'object_array'}
                {$value=$data['object'][$col]}
            {elseif $data['model']->schema_edit[$col]['type'] == 'string'}
                {$value=$data['object'][$col]}
            {/if}

            {if $data['model']->schema_edit[$col]['type'] == 'checkbox'}
                {if $data['object'][$col]}
                    {$checked='checked'}
                {else}
                    {$checked=''}
                {/if}
            {else}
                 {$checked=''}
            {/if}
        {else}
            {if isset($data['model']->schema_edit[$col]['default'])}
                {$value = $data['model']->schema_edit[$col]['default']}
            {else}
                {$value=''}
            {/if}
            {if $data['model']->schema_edit[$col]['type'] == 'checkbox'}
                {if isset($data['model']->schema_edit[$col]['default']) && $data['model']->schema_edit[$col]['default']}{$checked='checked'}{else}{$checked=''}{/if}
            {else}
                {$checked=''}
            {/if}
        {/if}
        {$disabled=''}
        {if isset($data['model']->schema_edit[$col]['enabled'])}{if !$data['model']->schema_edit[$col]['enabled']}{$disabled='disabled'}{/if}{/if}
        {$required=''}
        {if isset($data['model']->schema_edit[$col]['required'])}{if $data['model']->schema_edit[$col]['required']}{$required='required'}{/if}{/if}

        {if $data['model']->schema_edit[$col]['type'] == 'select'}
            <p>
                <select name="{$col}">
                    {foreach $data['model']->schema_edit[$col]['options'] as $opt}
                        <option value="{$opt}" {if $opt==$data['object'][$col]} selected {/if}>{$opt}</option>
                    {/foreach}
                </select>
            </p>
        {elseif $data['model']->schema_edit[$col]['type'] == 'multiselect'}
            <p>
                <select multiple name="{$col}[]">
                    {foreach $data['model']->schema_edit[$col]['options'] as $opt}
                        <option value="{$opt}" {if $opt == $data['object'][$col]} selected {/if}>{$opt}</option>
                    {/foreach}
                </select>
            </p>
        {elseif $data['model']->schema_edit[$col]['type'] == 'text'}
            <textarea name="{$col}" type="{$data['model']->schema_edit[$col]['type']}" {if isset($data['model']->schema_edit[$col]['class'])} class="{$data['model']->schema_edit[$col]['class']}" {/if}>{$value}</textarea>


        {elseif $data['model']->schema_edit[$col]['type'] == 'img'}


            <img id="img-preview" width="100" height="75"  src="{if value == ''}/{$data['upload_dir']}/default.png{else}/{$data['upload_dir']}/{$value}{/if}" {if isset($data['model']->schema_edit[$col]['class'])} class="{$data['model']->schema_edit[$col]['class']}" {/if}/>
            <input type="hidden" name="{$col}" value="{$value}" id="img-value"/>
            <a href="#" id="open-images">Изображения</a>

        {elseif $data['model']->schema_edit[$col]['type'] == 'object_array'}
            {if $data['action'] == 'edit'}
                {include file='admin/crud/object_array_edit.tpl'}
            {else}
                {include file='admin/crud/object_array_create.tpl'}
            {/if}
        {else}
            <p><input name="{$col}" type="{$data['model']->schema_edit[$col]['type']}" value="{$value}" {$checked} {$disabled} {$required} {if isset($data['model']->schema_edit[$col]['class'])} class="{$data['model']->schema_edit[$col]['class']}" {/if} {if isset($data['model']->schema_edit[$col]['placeholder'])} placeholder="{$data['model']->schema_edit[$col]['placeholder']}" {/if}/></p>
        {/if}
    </td>
</tr>
{/if}
{/foreach}

</table>
<button>{if $data['action']=='edit'} Save {else} Create {/if}</button>

</form>

{include file='admin/crud/tinymce.tpl'}
{include file='admin/crud/select_image.tpl'}
{/block}

{block "bottom_js"}
   <script type="text/javascript">
        App.switchMenu('home');
   </script>
   <script type="text/javascript" src="/js/validate.js"></script>
    <script type="text/javascript">
        $(function() {
            $( "input.datetime" ).datepicker();
        });
    </script>

    <script>
    </script>

{/block}