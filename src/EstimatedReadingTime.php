<?php

namespace Somarkn99\EstimatedReadingTime;

class EstimatedReadingTime
{
    /**
     * Calculate the estimated reading time.
     *
     * @param string $content The content to calculate the reading time for.
     * @param string $lang The language of the content (default is 'en').
     * @return string The formatted estimated reading time.
     */
    public static function calculate($content, $lang = 'en')
    {
        $settings = config('estimatedreadingtime');
        $wpm = $lang == 'ar' ? $settings['ar_wpm'] : $settings['en_wpm'];

        // Strip tags and count words in the content
        $wordCount = str_word_count(strip_tags($content));
        $readingTime = ceil($wordCount / $wpm);

        // Determine suffix based on language and word count
        if ($lang == 'ar') {
            $suffix = $readingTime == 1 ? $settings['ar_suffix_s'] : $settings['ar_suffix_p'];
            return $settings['ar_prefix'] . ' ' . $readingTime . ' ' . $suffix;
        }

        return $settings['en_prefix'] . ' ' . $readingTime . ' ' . $settings['en_suffix'];
    }
}
