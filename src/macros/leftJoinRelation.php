<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('leftJoinRelation', function (string $relationName, $operator = '=') {
    $relation = $this->getRelation($relationName);

    return $this->leftJoin(
        $relation->getRelated()->getTable(),
        $relation->getQualifiedForeignKeyName(),
        $operator,
        $relation->getQualifiedOwnerKeyName()
    );
});
