{extends file="admin/layout.tpl"}
{block "content"}

    <div class="myinfo">
        <table class="table">
            {foreach $models as $model}
            <tr>
                <td>
                    <p><a href="/admin/showlist/?entity={$model->entity}">{$model->title}</a></p>
                </td>
                <td>
                    <p><a href="""/admin/create/?entity={$model->entity}"><button>Create New</button></a</p>
                </td>

                <td>
                    <p><a href="/admin/showlist/?entity={$model->entity}"><button>List</button></a></p>
                </td>
            </tr>
            {/foreach}
        </table>

    </div>
{/block}

{block "bottom_js"}
<script type="text/javascript">
    App.switchMenu('home');
</script>
{/block}

