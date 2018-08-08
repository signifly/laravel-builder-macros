<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('addSubSelect', function ($column, $query) {
    $this->defaultSelectAll();

    return $this->selectSub($query->limit(1)->getQuery(), $column);
});
