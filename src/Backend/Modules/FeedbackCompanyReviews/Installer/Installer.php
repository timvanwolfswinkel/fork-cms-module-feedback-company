<?php

/**
 * @author Bart Lagerweij <bart@webleads.nl>
 * @copyright Copyright 2014 by Webleads http://www.webleads.nl
 */
class FeedbackcompanyReviewInstaller extends ModuleInstaller
{
    /**
     *
     */
    public function install()
	{
		// install the module in the database
		$this->addModule('feedbackcompany_review');

		// install the locale, this is set here because we need the module for this
		$this->importLocale(dirname(__FILE__) . '/data/locale.xml');

		$this->setModuleRights(1, 'feedbackcompany_review');

        // settings navigation
        $navigationSettingsId = $this->setNavigation(null, 'Settings');
        $navigationModulesId = $this->setNavigation($navigationSettingsId, 'Modules');
        $this->setNavigation($navigationModulesId, 'FeedbackcompanyReview', 'feedbackcompany_review/settings');

        // add widget
        $this->insertExtra('feedbackcompany_review', 'block', 'FeedbackcompanyReview');
        $this->insertExtra('feedbackcompany_review', 'widget', 'FeedbackcompanyScoreBoard', 'score_board', null, 'N', 1000);
    }
}
