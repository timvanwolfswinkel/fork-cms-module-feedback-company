<section class="mod feedbackcompanyreview feedbackcompanyreview-widget well">
    <div class="inner">
        <div class="score-board">

            {option:FeedbackcompanyReviewWidget.reviews}
                {option:FeedbackcompanyReviewWidget.reviews.score}
                    <div itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
                        <a target="_blank" title="{$SITE_TITLE} {$lblScoreBoardTitle|sprintf:{$FeedbackcompanyReviewWidget.reviews.noReviews}:{$FeedbackcompanyReviewWidget.reviews.score}:{$FeedbackcompanyReviewWidget.reviews.scoremax}}" href="{$FeedbackcompanyReviewWidget.url}" class="clearfix">
                            <div>
                                <h2>
                                    {$msgFeedbackcompanyScoreBoardIntro|sprintf:{$SITE_TITLE}}
                                    <i class="fa fa-quote-left pull-right"></i>
                                </h2>
                            </div>

                            {option:FeedbackcompanyReviewWidget.best}
                                <div class="best-review right">
                                    <blockquote title="{$FeedbackcompanyReviewWidget.best.text}">{$FeedbackcompanyReviewWidget.best.text|truncate:80}</blockquote>
                                </div>
                            {/option:FeedbackcompanyReviewWidget.best}

                            <div class="left">
                                {option:FeedbackcompanyReviewWidget.stars}
                                    <div class="stars">
                                        {iteration:FeedbackcompanyReviewWidget.stars}
                                            <i class="fa fa-{$FeedbackcompanyReviewWidget.stars.value}"></i>
                                        {/iteration:FeedbackcompanyReviewWidget.stars}
                                    </div>
                                {/option:FeedbackcompanyReviewWidget.stars}
                                <p class="number-of-reviews">
                                    <span class="summary">{$lblNumberOfReviews|sprintf:{$FeedbackcompanyReviewWidget.reviews.noReviews}}</span>
                                </p>
                                <span class="logo"><img height="33" width="200" alt="{$lblFeedbackCompanyLogo}" src="/frontend/modules/feedbackcompany_review/layout/images/feedback_company_logo.jpg" /></span>
                                <div class="rating">
                                    <span itemprop="itemreviewed">{$SITE_TITLE}</span>
                                    <span itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">
                                         <span itemprop="average">{$FeedbackcompanyReviewWidget.reviews.score}</span>
                                         out of
                                         <span itemprop="best">{$FeedbackcompanyReviewWidget.reviews.scoremax}</span>
                                         based on
                                         <span itemprop="votes">{$FeedbackcompanyReviewWidget.reviews.noReviews}</span>
                                         reviews
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                {/option:FeedbackcompanyReviewWidget.reviews.score}
                {option:FeedbackcompanyReviewWidget.reviews.error}
                    {$lblError}: {$FeedbackcompanyReviewWidget.reviews.error}
                {/option:FeedbackcompanyReviewWidget.reviews.error}
            {/option:FeedbackcompanyReviewWidget.reviews}
            {option:!FeedbackcompanyReviewWidget.reviews}
                {$msgFeedbackcompanyReviewNoItems|ucfirst}
            {/option:!FeedbackcompanyReviewWidget.reviews}
        </div>
    </div>
</section>
