{extends file='admin/layout.tpl'}

{block "content"}

<div class="left">
        <h3>Заливка базы данных</h3>

        <p>Заливка дампа базы mysql в базу <b>{$data['db_name']}</b></p>
        <p>Все прежние данные в базе <b>{$data['db_name']}</b> будут потеряны!</p>

        <form method="post" action="{$data['upload_url']}" enctype="multipart/form-data">
        <input type="file" name="{$data['field_name']}" required="required"/><br/>
        <button> Загрузить </button>
        </form>
    </div>


{/block}
{block "bottom_js"}
<script type="text/javascript">
    App.switchMenu('recovery');
</script>
{/block}