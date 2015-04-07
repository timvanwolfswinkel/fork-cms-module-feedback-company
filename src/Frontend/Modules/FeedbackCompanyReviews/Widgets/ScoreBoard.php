<?php

namespace Frontend\Modules\FeedbackCompanyReviews\Widgets;

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Widget as FrontendBaseWidget;
use Frontend\Modules\FeedbackCompanyReviews\Engine\Model as FrontendFeedbackCompanyReviewsModel;

/**
 * This is a widget for showing a reviews score board
 *
 * @author Bart Lagerweij <bart@webleads.nl>
 * @author Tim van Wolfswinkel <tim@webleads.nl>
 */

class ScoreBoard extends FrontendBaseWidget
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
        $reviewData = FrontendFeedbackCompanyReviewsModel::getReviewData();
        if (!empty($reviewData)) {
			$this->tpl->assign('FeedbackCompanyReviewsWidget', $reviewData);
        }
	}
}
