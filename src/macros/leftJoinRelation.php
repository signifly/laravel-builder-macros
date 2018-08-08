<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('leftJoinRelation', function ($relation, $operator = '=') {
    $relation = $this->getRelation($relation);

    return $this->leftJoin(
        $relation->getRelated()->getTable(),
        $relation->getQualifiedForeignKey(),
        $operator,
        $relation->getQualifiedOwnerKeyName()
    );
});
