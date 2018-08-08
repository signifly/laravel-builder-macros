<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('joinRelation', function ($relation, $operator = '=') {
    $relation = $this->getRelation($relation);

    return $this->join(
        $relation->getRelated()->getTable(),
        $relation->getQualifiedForeignKey(),
        $operator,
        $relation->getQualifiedOwnerKeyName()
    );
});
