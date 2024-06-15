<?php

use Illuminate\Support\Facades\Route;
use Somarkn99\EstimatedReadingTime\Http\Controllers\ReadingTimeController;

Route::post('/reading-time', [ReadingTimeController::class, 'calculate']);
