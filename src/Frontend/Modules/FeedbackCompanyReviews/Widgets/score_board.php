<?php

/**
 * @author Bart Lagerweij <bart@webleads.nl>
 * @copyright Copyright 2014 by Webleads http://www.webleads.nl
 */

class FrontendFeedbackcompanyReviewWidgetScoreBoard extends FrontendBaseWidget
{
	/**
	 * Execute the extra
	 */
	public function execute()
	{
		// call parent
		parent::execute();
		$this->addCSS('feedbackcompany_review.css');

		$this->loadTemplate();
		$this->loadAndParse();
	}

	/**
	 * Parse
	 */
	private function loadAndParse()
	{

        $reviewData = FrontendFeedbackcompanyReviewModel::getReviewData();
        if (!empty($reviewData)) {
			$this->tpl->assign('FeedbackcompanyReviewWidget', $reviewData);
        }
	}
}
