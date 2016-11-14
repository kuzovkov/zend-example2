{extends file='admin/layout.tpl'}
{block "content"}

<h4><a href="/admin">Home</a> -> Upload</h4>
<h3>Изображения</h3>

{include file='admin/upload_form_multi.tpl'}

{/block}
{block "bottom_js"}
   <script type="text/javascript">
        App.switchMenu('upload');
   </script>
{/block}