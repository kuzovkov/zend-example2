<link rel="stylesheet" href="/css/upload/main.css" type="text/css" media="screen, projection" />
<script type="text/javascript">
    var open_image = false;
    if ( $('a').is('#open-images') ) {
        $('#open-images').click(function(){
            if (!open_image) {
                $('#open-images').text('Скрыть');
                open_image = true;
                $('#open-images').after('<div id="img-wrap"><img class="preload" src="/img/preload.gif"/></div>');
                $('#img-wrap').load('/admin/imglist_select');
            }else{
                $('#open-images').text('Изображения');
                open_image = false;
                $('#img-wrap').html('');
            }
        });
    }
</script>