{extends file='parent:frontend/detail/tabs.tpl'}

{block name="frontend_detail_tabs"}
    {if $detailEmotion}
        {include file='frontend/_includes/emotion.tpl' emotion=$detailEmotion}
    {/if}
    {$smarty.block.parent}
{/block}