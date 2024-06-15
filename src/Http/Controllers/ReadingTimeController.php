<?php

namespace Somarkn99\EstimatedReadingTime\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Somarkn99\EstimatedReadingTime\EstimatedReadingTime;

class ReadingTimeController extends Controller
{
    /**
     * Calculate the estimated reading time.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function calculate(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'lang' => 'nullable|string|in:en,ar'
        ]);

        $content = $request->input('content');
        $lang = $request->input('lang', 'en');

        $readingTime = EstimatedReadingTime::calculate($content, $lang);

        return response()->json(['reading_time' => $readingTime]);
    }
}
