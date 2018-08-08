<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('map', function (callable $callback) {
    return $this->get()->map($callback);
});
