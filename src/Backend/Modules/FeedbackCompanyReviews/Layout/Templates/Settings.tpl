{include:{$BACKEND_CORE_PATH}/Layout/Templates/Head.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureStartModule.tpl}

<div class="pageTitle">
    <h2>{$lblModuleSettings|ucfirst}: {$lblFeedbackCompanyReviews}</h2>
</div>

{form:settings}
    <div class="box">
        <div class="horizontal">
            <div class="heading">
                <h3>{$lblFeedbackCompanyReviewsFeed}</h3>
            </div>
            <div class="options">
                <label for="latestReviewsNumberOfItems">{$lblItemsPerPage|ucfirst}</label>
                {$ddmLatestReviewsNumItems} {$ddmLatestReviewsNumItemsError}
            </div>
            <div class="options">
                <label for="reviewCacheTimeout">{$lblReviewCacheTimeout|ucfirst}</label>
                {$txtReviewCacheTimeout} {$txtReviewCacheTimeoutError}
                <span class="helpTxt">{$msgHelpReviewCacheTimeout}</span>
            </div>
            <div class="options">
                <label for="reviewFeedUrl">{$lblReviewFeedUrl|ucfirst}</label>
                {$txtReviewFeedUrl} {$txtReviewFeedUrlError}
                <span class="helpTxt">{$msgHelpReviewFeedUrl}</span>
            </div>
            <div class="options">
                <label for="reviewInfoUrl">{$lblReviewUrl|ucfirst}</label>
                {$txtReviewUrl} {$txtReviewUrlError}
                <span class="helpTxt">{$msgHelpReviewUrl}</span>
            </div>
        </div>
    </div>
    <div class="fullwidthOptions">
        <div class="buttonHolderRight">
            <input id="save" class="inputButton button mainButton" type="submit" name="save"
                   value="{$lblSave|ucfirst}"/>
        </div>
    </div>
{/form:settings}

{include:{$BACKEND_CORE_PATH}/Layout/Templates/StructureEndModule.tpl}
{include:{$BACKEND_CORE_PATH}/Layout/Templates/Footer.tpl}