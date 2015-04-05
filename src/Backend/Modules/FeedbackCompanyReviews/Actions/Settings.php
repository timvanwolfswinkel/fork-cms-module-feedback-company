<?php

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Backend\Core\Engine\Base\ActionEdit as BackendBaseActionEdit;
use Backend\Core\Engine\Form as BackendForm;
use Backend\Core\Engine\Language as BL;
use Backend\Core\Engine\Authentication as BackendAuthentication;
use Backend\Core\Engine\Model as BackendModel;
use Backend\Modules\FeedbackCompanyReviews\Engine\Model as BackendFeedbackCompanyReviewsModel;

/**
 * This is the settings action, it will display a form to set general Feedback Company Reviews settings.
 *
 * @author Bart Lagerweij <bart@webleads.nl>
 * @author Tim van Wolfswinkel <tim@webleads.nl>
 */
class Settings extends BackendBaseActionEdit
{
    /**
     * Is the user the main admin user?
     *
     * @var bool
     */
    protected $isAdmin = false;

    /**
     * Execute the action
     */
    public function execute()
    {
        parent::execute();
        $this->loadForm();
        $this->validateForm();
        $this->parse();
        $this->display();
    }

    /**
     * Loads the settings form
     */
    private function loadForm()
    {
        $this->isAdmin = BackendAuthentication::getUser()->isGod();

        $this->frm = new BackendForm('settings');

        $this->frm->addText('review_feed_url', BackendModel::getModuleSetting($this->URL->getModule(), 'review_feed_url_' . BL::getWorkingLanguage()));
        $this->frm->addText('review_url', BackendModel::getModuleSetting($this->URL->getModule(), 'review_url_' . BL::getWorkingLanguage()));
        $this->frm->addText('review_cache_timeout', BackendModel::getModuleSetting($this->URL->getModule(), 'review_cache_timeout', 3600));
    }

    /**
     * Parse the form
     */
    protected function parse()
    {
        parent::parse();
    }

    /**
     * Validates the settings form
     */
    private function validateForm()
    {
        if ($this->frm->isSubmitted()) {
            $feedCacheTimeout = $this->frm->getField('review_cache_timeout');
            if ($feedCacheTimeout->isFilled(BL::err('FieldIsRequired'))) {
                $feedCacheTimeout->isInteger(BL::err('InvalidInteger'));
            }

            $feedUrlField = $this->frm->getField('review_feed_url');
            if ($feedUrlField->isFilled(BL::err('FieldIsRequired'))) {
                $feedUrlField->isURL(BL::err('InvalidURL'));
            }

            $infoUrlField = $this->frm->getField('review_url');
            if ($infoUrlField->isFilled(BL::err('FieldIsRequired'))) {
                $infoUrlField->isURL(BL::err('InvalidURL'));
            }

            if ($this->frm->isCorrect()) {
                $feedUrl = htmlspecialchars_decode($feedUrlField->getValue()); // spoon auto-html-escape ?!?
                $infoUrl = htmlspecialchars_decode($infoUrlField->getValue()); // spoon auto-html-escape ?!?
                BackendModel::setModuleSetting($this->URL->getModule(), 'review_url_' . BL::getWorkingLanguage(), $infoUrl);
                BackendModel::setModuleSetting($this->URL->getModule(), 'review_feed_url_' . BL::getWorkingLanguage(), $feedUrl);
                BackendModel::setModuleSetting($this->URL->getModule(), 'review_cache_timeout', $feedCacheTimeout->getValue());

                BackendModel::triggerEvent($this->getModule(), 'after_saved_settings');
                BackendFeedbackCompanyReviewsModel::clearFrontendCache();

                // redirect to the settings page
                $this->redirect(BackendModel::createURLForAction('settings') . '&report=saved');
            }
        }
    }
}
