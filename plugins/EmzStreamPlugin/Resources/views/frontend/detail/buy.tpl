{extends file='parent:frontend/detail/buy.tpl'}

{block name='frontend_detail_buy_quantity'}{/block}


{block name="frontend_detail_buy_button"}
    {if $sArticle.sConfigurator && !$activeConfiguratorSelection}
        <button class="buybox--button block btn is--disabled is--icon-right is--large" disabled="disabled" aria-disabled="true" name="{s name="DetailBuyActionAddName" namespace='frontend/detail/buy'}{/s}"{if $buy_box_display} style="{$buy_box_display}"{/if}>
            {s name="DetailBuyActionAdd" namespace='frontend/detail/buy'}{/s} 
        </button>
    {else}
        <button class="buybox--button block btn is--primary is--icon-right is--center is--large" name="{s name="DetailBuyActionAddName" namespace='frontend/detail/buy'}{/s}"{if $buy_box_display} style="{$buy_box_display}"{/if}>
            {s name="DetailBuyActionAdd" namespace='frontend/detail/buy'}{/s} 
        </button>
    {/if}
{/block}