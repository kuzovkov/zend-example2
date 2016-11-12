{extends file='layout.tpl'}

{block "content"}

<div id="posts-wrapper">
    {include file='posts.tpl'}
</div>

<button id="add-posts">Загрузить еще...</button>



<script type="text/javascript">
    function hideFull() {
        $('div.full').hide();
    }
    function showShort() {
        $('div.short').show();
    }
    hideFull();
    function more( id, elem ) {
        console.log(id);
        if ( elem.html() == '<a class="continue">Больше...</a>') {
            $('#short_'+id).hide();
            $('#full_'+id).fadeIn(1000);
            elem.html('<a class="continue">Меньше...</a>');
        }else if (elem.html() == '<a class="continue">Меньше...</a>'){
            $('#full_'+id).hide();
            $('#short_'+id).fadeIn(1000);
            elem.html('<a class="continue">Больше...</a>');
        }
    }
    $('.in-more').click(function(){
        var id=this.id;
        var elem = $(this);
        more(id,elem);
    });
</script>

<script>
    $('#add-posts').click(function(){
        var number_posts = $('.post_box').length;
        //console.log(number_posts);
        $.post('/addposts/?n=' + (number_posts-1), function (content) {
            $('#posts-wrapper').append(content);
            hideFull();
            showShort();
            $('.in-more').each(function(){
                $(this).unbind('click');
            });
            $('.in-more').click(function(){
                var id=this.id;
                var elem = $(this);
                more(id,elem);
            });
        });
    });
    $("a.fb_group").fancybox();
</script>

{/block}
