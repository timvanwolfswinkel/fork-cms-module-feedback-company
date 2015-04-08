<?php

namespace Frontend\Modules\FeedbackCompanyReviews\Engine;

/*
 * This file is part of Fork CMS.
 *
 * For the full copyright and license information, please view the license
 * file that was distributed with this source code.
 */

use Frontend\Core\Engine\Language as FL;
use Frontend\Core\Engine\Model as FrontendModel;
use Webleads\FeedbackCompany;

/**
 * In this file we store all generic functions that we will be using in the FeedbackCompanyReviews module
 *
 * @author Bart Lagerweij <bart@webleads.nl>
 * @author Tim van Wolfswinkel <tim@webleads.nl>
 */
class Model
{
    /**
     *
     */
    const DEFAULT_CACHE_TIMEOUT = 3600;

    /**
     * @return array|mixed|null
     */
    private static function getReviewsFromRemote()
    {
        $feedUrl = FrontendModel::getModuleSetting('FeedbackCompanyReviews', 'review_feed_url_' . FRONTEND_LANGUAGE);
        if (!empty($feedUrl)) {
            include_once PATH_LIBRARY . '/external/feedbackcompany/feedbackcompany.php';
            $obj = new FeedbackCompany();
            $result = $obj->getRecentReviews($feedUrl);
            return $result;
        }
        return array();
    }

    /**
     * @param $reviewData
     * @return null
     */
    public static function getLastBestReview($reviewData)
    {
        $selectedReview = null;
        $reviews = isset($reviewData['reviewDetails']['reviewDetail']) ? $reviewData['reviewDetails']['reviewDetail'] : null;
        if ($reviews) {
            $highestScore = 0;
            foreach ($reviews as $review) {
                if (self::isScoreBetterThan($review, $highestScore)) {
                    $selectedReview = $review;
                }

            }
        }
        return $selectedReview;
    }

    /**
     * @return array|bool|mixed|null
     */
    public static function getReviewData()
    {
        $timeout = FrontendModel::getModuleSetting('FeedbackCompanyReviews', 'review_cache_timeout',
            self::DEFAULT_CACHE_TIMEOUT);
        $cacheFilename = FRONTEND_CACHE_PATH . '/feedback_company_reviews/reviews.cache';

        $reviewData = null;

        if (self::cacheFileIsValid($cacheFilename, $timeout)) {
            $reviewData = self::cacheFileLoad($cacheFilename);
        } else {
            $reviews = self::getReviewsFromRemote();
            if (empty($reviews)) {
                $reviewData = self::cacheFileLoad($cacheFilename);
                self::cacheFileForceValid($cacheFilename);
            } else {
                if (!empty($reviews) && isset($reviews['scoremax'])) {
                    $stars = self::getStars($reviews['score'], $reviews['scoremax']);
                    $bestReview = self::getLastBestReview($reviews);
                    $reviewUrl = FrontendModel::getModuleSetting('FeedbackCompanyReviews',
                        'review_url_' . FRONTEND_LANGUAGE);

                    $reviewData = array(
                        'reviews' => $reviews,
                        'best' => $bestReview,
                        'url' => $reviewUrl,
                        'stars' => (isset($stars) ? $stars : null),
                    );
                    self::cacheFileStore($cacheFilename, $reviewData);
                }
            }
        }

        return $reviewData;
    }

    /**
     * @param $score
     * @param int $maxScore
     * @return array
     */
    public static function getStars($score, $maxScore = 5)
    {
        $wholeStars = floor($score);
        $halfStars = ceil($score - $wholeStars);
        $emptyStars = $maxScore - $wholeStars - $halfStars;

        $stars = array();
        for ($n = 0; $n < $wholeStars; $n++) {
            $stars[] = array('title' => FL::getLabel('Star'), 'value' => 'star');
        }
        for ($n = 0; $n < $halfStars; $n++) {
            $stars[] = array('title' => FL::getLabel('StarHalfOpen'), 'value' => 'star-half-o');
        }
        for ($n = 0; $n < $emptyStars; $n++) {
            $stars[] = array('title' => FL::getLabel('StarOpen'), 'value' => 'star-o');
        }

        return $stars;

    }

    /**
     * @param $cacheFilename
     * @param $timeout int seconds
     * @return bool
     */
    private static function cacheFileIsValid($cacheFilename, $timeout)
    {
        return is_file($cacheFilename) && time() - filemtime($cacheFilename) < $timeout;
    }

    /**
     * @param $cacheFilename
     * @param $reviews
     */
    private static function cacheFileStore($cacheFilename, $reviews)
    {
        @mkdir(dirname($cacheFilename), 0777, true);
        @file_put_contents($cacheFilename, serialize($reviews));
    }

    /**
     * @param $cacheFilename
     * @return mixed
     */
    private static function cacheFileLoad($cacheFilename)
    {
        $reviews = @unserialize(@file_get_contents($cacheFilename));
        return $reviews;
    }

    /**
     * @param $review
     * @param $score
     * @return bool
     */
    private static function isScoreBetterThan($review, $score)
    {
        return isset($review['score']) && $review['score'] > $score;
    }

    /**
     * @param $cacheFilename
     */
    private static function cacheFileForceValid($cacheFilename)
    {
        touch($cacheFilename);
    }
}
