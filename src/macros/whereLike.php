<?php

use Illuminate\Database\Eloquent\Builder;

Builder::macro('whereLike', function ($columns, string $value) {
    $this->where(function (Builder $query) use ($columns, $value) {
        foreach (array_wrap($columns) as $column) {
            $query->when(
                str_contains($column, '.'),

                // Relational searches
                function (Builder $query) use ($column, $value) {
                    [$relationName, $relationColumn] = explode('.', $column);

                    return $query->orWhereHas(
                        $relationName,
                        function (Builder $query) use ($relationColumn, $value) {
                            $query->where($relationColumn, 'LIKE', "%{$value}%");
                        }
                    );
                },

                // Default searches
                function (Builder $query) use ($column, $value) {
                    return $query->orWhere($column, 'LIKE', "%{$value}%");
                }
            );
        }
    });

    return $this;
});
