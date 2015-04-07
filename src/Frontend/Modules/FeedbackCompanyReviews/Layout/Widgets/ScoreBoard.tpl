<section class="mod feedbackcompanyreview feedbackcompanyreview-widget well">
    <div class="inner">
        <div class="score-board">

            {option:FeedbackCompanyReviewsWidget.reviews}
                {option:FeedbackCompanyReviewsWidget.reviews.score}
                    <div itemscope itemtype="http://data-vocabulary.org/Review-aggregate">
                        <a target="_blank" title="{$SITE_TITLE} {$lblScoreBoardTitle|sprintf:{$FeedbackCompanyReviewsWidget.reviews.noReviews}:{$FeedbackCompanyReviewsWidget.reviews.score}:{$FeedbackcompanyReviewWidget.reviews.scoremax}}" href="{$FeedbackcompanyReviewWidget.url}" class="clearfix">
                            <div>
                                <h2>
                                    {$msgFeedbackCompanyScoreBoardIntro|sprintf:{$SITE_TITLE}}
                                    <i class="fa fa-quote-left pull-right"></i>
                                </h2>
                            </div>

                            {option:FeedbackCompanyReviewsWidget.best}
                                <div class="best-review right">
                                    <blockquote title="{$FeedbackCompanyReviewsWidget.best.text}">{$FeedbackCompanyReviewsWidget.best.text|truncate:80}</blockquote>
                                </div>
                            {/option:FeedbackCompanyReviewsWidget.best}

                            <div class="left">
                                {option:FeedbackCompanyReviewsWidget.stars}
                                    <div class="stars">
                                        {iteration:FeedbackCompanyReviewsWidget.stars}
                                            <i class="fa fa-{$FeedbackCompanyReviewsWidget.stars.value}"></i>
                                        {/iteration:FeedbackCompanyReviewsWidget.stars}
                                    </div>
                                {/option:FeedbackCompanyReviewsWidget.stars}
                                <p class="number-of-reviews">
                                    <span class="summary">{$lblNumberOfReviews|sprintf:{$FeedbackCompanyReviewsWidget.reviews.noReviews}}</span>
                                </p>
                                <span class="logo"><img height="33" width="200" alt="{$lblFeedbackCompanyLogo}" src="/frontend/modules/feedback_company_reviews/layout/images/feedback_company_logo.jpg" /></span>
                                <div class="rating">
                                    <span itemprop="itemreviewed">{$SITE_TITLE}</span>
                                    <span itemprop="rating" itemscope itemtype="http://data-vocabulary.org/Rating">
                                         <span itemprop="average">{$FeedbackCompanyReviewsWidget.reviews.score}</span>
                                         out of
                                         <span itemprop="best">{$FeedbackCompanyReviewsWidget.reviews.scoremax}</span>
                                         based on
                                         <span itemprop="votes">{$FeedbackCompanyReviewsWidget.reviews.noReviews}</span>
                                         reviews
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                {/option:FeedbackCompanyReviewsWidget.reviews.score}
                {option:FeedbackCompanyReviewsWidget.reviews.error}
                    {$lblError}: {$FeedbackCompanyReviewsWidget.reviews.error}
                {/option:FeedbackCompanyReviewsWidget.reviews.error}
            {/option:FeedbackCompanyReviewsWidget.reviews}
            {option:!FeedbackCompanyReviewsWidget.reviews}
                {$msgFeedbackCompanyReviewsNoItems|ucfirst}
            {/option:!FeedbackCompanyReviewsWidget.reviews}
        </div>
    </div>
</section>
