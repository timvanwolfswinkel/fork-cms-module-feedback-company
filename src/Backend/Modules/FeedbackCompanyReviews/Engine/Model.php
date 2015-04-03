<?php

namespace Backend\Modules\FeedbackCompanyReviews\Engine;

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

/**
 * In this file we store all generic functions that we will be using in the Feedback Company Reviews module
 *
 * @author Bart Lagerweij <bart@webleads.nl>
 * @author Tim van Wolfswinkel <tim@webleads.nl>
 */
class Model
{
    public static function clearFrontendCache()
    {
        $cacheFilename = FRONTEND_CACHE_PATH . '/feedback_company_reviews/reviews.cache';
        if (is_file($cacheFilename)) {
            @unlink($cacheFilename);
        }
    }
}
