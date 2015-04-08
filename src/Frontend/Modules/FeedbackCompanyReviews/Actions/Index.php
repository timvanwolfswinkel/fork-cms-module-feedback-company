<?php

namespace Frontend\Modules\FeedbackCompanyReviews\Actions;

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Base\Block as FrontendBaseBlock;

/**
 * This is the overview-action
 *
 * @author Bart Lagerweij <bart@webleads.nl>
 * @author Tim van Wolfswinkel <tim@webleads.nl>
 */
class Index extends FrontendBaseBlock
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
