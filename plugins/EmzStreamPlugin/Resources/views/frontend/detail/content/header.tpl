{extends file='parent:frontend/detail/content/header.tpl'}

{block name='frontend_detail_index_product_info'}

    {* Product name *}
    {block name='frontend_detail_index_name'}
        <h1 class="product--title" itemprop="name">
            {$sArticle.articleName}
        </h1>
        <span class='emz-subtitle'>{s name='EmzSubtitle'}100% Natürlich{/s}</span>
    {/block}

    <div class='emz-info--boxes'>
        {if $sArticle.emz_infobox_01}
            <div class='box'>
                <i class='icon-emz-bio'></i>
                <p>{$sArticle.emz_infobox_01}
            </div>
        {/if}
        {if $sArticle.emz_infobox_02}
            <div class='box'>
                <i class='icon-emz-coffee-breaks'></i>
                <p>{$sArticle.emz_infobox_02}
            </div>
        {/if}
        {if $sArticle.emz_infobox_03}
            <div class='box'>
                <i class='icon-emz-food'></i>
                <p>{$sArticle.emz_infobox_03}
            </div>
        {/if}
    </div>
{/block}