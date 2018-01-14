<?php

/*
 * This file is part of the Panda framework.
 *
 * (c) Ioannis Papikas <papikas.ioan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Bootstrap;

use App\Support\Localization\DateTimer;
use App\Support\Localization\DateTimerInterface;
use Panda\Localization\Processors\FileProcessor;
use Panda\Localization\Processors\JsonProcessor;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class Localization
 * @package App\Bootstrap
 */
class Localization extends AbstractBootLoader
{
    /**
     * @param Request $request
     */
    public function boot($request = null)
    {
        // Set Translation File Processor
        $this->getApp()->set(FileProcessor::class, \DI\object(JsonProcessor::class));

        // Set DateTimerInterface
        $this->getApp()->set(DateTimerInterface::class, \DI\object(DateTimer::class));
    }
}
