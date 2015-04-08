<section class="mod feedbackcompanyreviews">
    <div class="inner">
        <div class="score-board clearfix">
            {option:reviews}
            {option:reviews.company.total_score}
                <h2>{$lblScoreBoardTitle|sprintf:{$reviews.company.total_reviews}:{$reviews.company.total_score}}</h2>
                <p>
                    <span class="score">{$reviews.company.total_score}</span>
                    {$msgFeedbackCompanyReviewIntro}
                </p>
                <span class="logo"><img
                            src="/frontend/modules/feedback_company_reviews/layout/images/feedbackcompany-logo.png"/></span>
            {/option:reviews.company.total_score}
            {option:reviews.error}
            {$lblError}: {$reviews.error}
            {/option:reviews.error}
            {/option:reviews}
            {option:!reviews}
            {$msgFeedbackCompanyReviewsNoItems|ucfirst}
            {/option:!reviews}
        </div>

        {option:reviews.review_list.review}
            <div class="reviews">
                <h2>{$lblRecentReviews|ucfirst}{option:numberOfReviews} ({$numberOfReviews}){/option:numberOfReviews}</h2>
                {iteration:reviews.review_list.review}
                    <div class="review clearfix">
                        <hr/>
                        <span class="score">{$reviews.review_list.review.total_score}</span>

                        <h3>{$reviews.review_list.review.customer.name|ucfirst}{option:reviews.review_list.review.customer.place} ({$reviews.review_list.review.customer.place|ucfirst}){/option:reviews.review_list.review.customer.place}</h3>

                        <p>{$reviews.review_list.review.customer.date}</p>
                        {option:reviews.review_list.review.positive}
                            <p>
                                {$lblPositive|ucfirst}:<br/><i>{$reviews.review_list.review.positive|ucfirst}</i>
                            </p>
                        {/option:reviews.review_list.review.positive}
                        {option:reviews.review_list.review.negative}
                            <p>
                                {$lblNegative|ucfirst}:<br/><i>{$reviews.review_list.review.negative|ucfirst}</i>
                            </p>
                        {/option:reviews.review_list.review.negative}
                        <p>{$lblRecommendation|ucfirst}: {$reviews.review_list.review.recommendation}</p>
                    </div>
                {/iteration:reviews.review_list.review}

                <hr/>
            </div>
        {/option:reviews.review_list.review}
    </div>
</section>
