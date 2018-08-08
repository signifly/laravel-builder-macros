<?php

namespace Signifly\BuilderMacros;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class BuilderMacroServiceProvider extends ServiceProvider
{
    public function register()
    {
        Collection::make(glob(__DIR__.'/macros/*.php'))
            ->mapWithKeys(function ($path) {
                return [$path => pathinfo($path, PATHINFO_FILENAME)];
            })
            ->each(function ($macro, $path) {
                require_once $path;
            });
    }
}
