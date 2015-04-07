<?php

namespace Frontend\Modules\FeedbackCompanyReviews\Widgets;

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Core\Engine\Model as FrontendModel;
use Frontend\Modules\FeedbackCompanyReviews\Engine\Model as FrontendFeedbackCompanyReviewsModel;

/**
 * This is a widget for showing a reviews score board
 *
 * @author Tim van Wolfswinkel <tim@webleads.nl>
 */
class LatestReviews extends FrontendBaseWidget
{
    /**
     * Execute the extra
     */
    public function execute()
    {
        // call parent
        parent::execute();
        $this->addCSS('feedback_company_reviews.css');

        $this->loadTemplate();
        $this->loadAndParse();
    }

    /**
     * Parse
     */
    private function loadAndParse()
    {
        $numberOfReviews = FrontendModel::getModuleSetting('FeedbackCompanyReviews', 'latest_reviews_num_items', 10);
        $allReviews = FrontendFeedbackCompanyReviewsModel::getReviewData();
        $latestReviews = array_slice($allReviews['reviews']['reviewDetails']['reviewDetail'], 0, $numberOfReviews);

        if (!empty($latestReviews)) {
            $this->tpl->assign('LatestReviewsWidget', $latestReviews);
        }
    }
}
