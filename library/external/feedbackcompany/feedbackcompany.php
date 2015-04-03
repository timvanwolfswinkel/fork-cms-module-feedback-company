<?php

/**
 * @author Bart Lagerweij <bart@webleads.nl>
 * @copyright Copyright 2014 by Webleads http://www.webleads.nl
 */
class Feedbackcompany
{
	/**
	 * @param $feedUrl
	 * @return mixed|null
	 */
	public function getRecentReviews($feedUrl)
    {
        $reviews = null;
        $xmlData = @file_get_contents($feedUrl);
        if ($xmlData) {
            $xml = @simplexml_load_string($xmlData, null, LIBXML_NOCDATA);
            if ($xml) {
                $json = json_encode($xml);
                $reviews = json_decode($json, TRUE);
            }
        }
        return $reviews;
    }
}
