{block name="widgets_emotion_components_emotion_element"}
    <div class='emz-emotion--wrapper'>
        <div class='emz-image-wrapper'>
            {if $Data.emz_image}
                <img src='{$Data.emz_image}' />
            {/if}
            {if $Data.emz_headline}
                <div class='emz-headline-box'>
                    <h3>{$Data.emz_headline}</h3>
                </div>
            {/if}
        </div>
    </div>
{/block}