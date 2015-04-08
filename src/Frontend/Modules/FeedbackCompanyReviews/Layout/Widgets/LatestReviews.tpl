<section class="mod feedbackcompanyreviews latest-reviews-widget well">
    <div class="inner">
        <div class="reviews">
            {* !!!!!!!!!!!!!!!!TEMPLATE UNDER CONSTRUCTION!!!!!!!!!!!!!!!! *}

            {*{$LatestReviewsWidget|dump}*}

            {option:LatestReviewsWidget}
            {iteration:LatestReviewsWidget}
                <div class="review">
                    <span>{$LatestReviewsWidget.score}</span>

                    <p>{$LatestReviewsWidget.text}</p>

                    <p>{$LatestReviewsWidget.sterkepunten}</p>

                    <p>{$LatestReviewsWidget.verbeterpunten}</p>
                </div>
                <hr>
            {/iteration:LatestReviewsWidget}
            {/option:LatestReviewsWidget}

            {option:!LatestReviewsWidget}
            {$msgFeedbackCompanyReviewsNoItems|ucfirst}
            {/option:!LatestReviewsWidget}
        </div>
    </div>
</section>
