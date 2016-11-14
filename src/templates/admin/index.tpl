{extends file="admin/layout.tpl"}
{block "content"}

    <div class="myinfo">
        <table class="table">
            {foreach $models as $model}
            <tr>
                <td>
                    <p><a href="#">{$model->title}</a></p>
                </td>
                <td>
                    <p><form method="post" action="/admin/create"">
                    <input type="hidden" name="entity" value="{$model->entity}"/>
                    <button>Create New</button></form></p>
                </td>

                <td>
                    <p><form method="post" action="/admin/showlist">
                        <input type="hidden" name="entity" value="{$model->entity}"/>
                        <button>List</button>
                    </form></p>
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

