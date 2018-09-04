<?php

/*
 * This file is part of the phper2007/weather.
 *
 * (c) phper2007 <liubo3ds@126.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Phper2007\Weather;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton(Weather::class, function () {
            return new Weather(config('services.weather.key'));
        });

        $this->app->alias(Weather::class, 'weather');
    }

    public function providers()
    {
        return [Weather::class, 'weather'];
    }
}
