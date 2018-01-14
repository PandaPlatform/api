<?php

/*
 * This file is part of the Panda framework.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use App\Controllers\MainController;
use Panda\Support\Facades\Route;

Route::get('/hello', MainController::class . '@hello');
Route::get('/hello/{message}', MainController::class . '@hello');
