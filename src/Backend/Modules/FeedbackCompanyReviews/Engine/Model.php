<?php

/**
 * @author Bart Lagerweij <bart@webleads.nl>
 * @copyright Copyright 2014 by Webleads http://www.webleads.nl
 */
class BackendFeedbackcompanyReviewModel
{
    public static function clearFrontendCache()
    {
        $cacheFilename = FRONTEND_CACHE_PATH . '/feedbackcompany_review/reviews.cache';
        if (is_file($cacheFilename)) {
            @unlink($cacheFilename);
        }
    }
}
