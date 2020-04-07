{extends file='parent:frontend/detail/image.tpl'}

{block name='frontend_detail_image_thumbs'}{/block}

{block name='frontend_detail_image_default_image_element'}
    {$alt = $sArticle.articleName|escape}

    {if $sArticle.image.description}
        {$alt = $sArticle.image.description|escape}
    {/if}

    <span class="image--element"
            {if $sArticle.image}
            data-img-large="{$sArticle.image.thumbnails[2].source}"
            data-img-small="{$sArticle.image.thumbnails[0].source}"
            data-img-original="{$sArticle.image.source}"
            {/if}
            data-alt="{$alt}">

        {block name='frontend_detail_image_default_image_media'}
            <span class="image--media">
                {if isset($sArticle.image.thumbnails)}
                    {block name='frontend_detail_image_default_picture_element'}
                        <img srcset="{$sArticle.image.thumbnails[2].sourceSet}"
                                src="{$sArticle.image.thumbnails[2].source}"
                                alt="{$alt}"
                                itemprop="image" />
                    {/block}
                {else}
                    {block name='frontend_detail_image_fallback'}
                        <img src="{link file='frontend/_public/src/img/no-picture.jpg'}" alt="{$alt}" itemprop="image" />
                    {/block}
                {/if}
            </span>
        {/block}
    </span>
{/block}

{block name='frontend_detail_image_box_dots'}{/block}