<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('defaultSelectAll', function () {
    if (is_null($this->getQuery()->columns)) {
        $this->select($this->getQuery()->from.'.*');
    }

    return $this;
});
