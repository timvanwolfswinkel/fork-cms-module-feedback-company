<?php

/**
 * @author Bart Lagerweij <bart@webleads.nl>
 * @copyright Copyright 2014 by Webleads http://www.webleads.nl
 */
class FrontendFeedbackcompanyReviewIndex extends FrontendBaseBlock
{
    /**
	 * Execute the action
	 */
	public function execute()
	{
		parent::execute();
		$this->loadTemplate();
		$this->loadAndParse();
	}

	/**
	 * Load the data, don't forget to validate the incoming data
	 */
	private function loadAndParse()
	{
	}
}
