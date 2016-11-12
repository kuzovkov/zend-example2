{if $posts}
    {foreach $posts as $post }

    <div class="post_box">

        <h2>{$post['id']}<a href="#">{$post['title']|strip_tags}</a></h2> {$tags = $post['tags']}
        <div class="news_meta">Posted: {$post['updated_at']} | Tags: {if $tags}{foreach $tags as $tag}<a href="#">&nbsp;{$tag}&nbsp; </a>{/foreach}{/if}</div>
        <div class="image_wrapper"><a href="#" target="_parent"><a class="fb_group" id="{$post['id']}_image" href="/{$upload_dir}/{$post['img']}"><img src="/{$upload_dir}/{$post['img']}" alt="image" /></a></a></div>
        <div id="short_{$post['id']}" class="short"><p align="justify">{$post['body']|truncate:200}</p></div>
        <div id="full_{$post['id']}" class="full"><p align="justify">{$post['body']}</p></div>
        <div id="{$post['id']}" class="in-more"><a class="continue">Больше...</a></div>
        <div class="cleaner"></div>
    </div>

    {/foreach}
{/if}