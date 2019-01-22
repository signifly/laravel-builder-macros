<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('joinRelation', function (string $relationName, $operator = '=') {
    $relation = $this->getRelation($relationName);

    return $this->join(
        $relation->getRelated()->getTable(),
        $relation->getQualifiedForeignKey(),
        $operator,
        $relation->getQualifiedOwnerKeyName()
    );
});
