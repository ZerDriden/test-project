<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    public function scopePaginationByPageFilter($query, $page, $take)
    {
        return $query->when($take, fn () => $query->take($take))
            ->when($page, fn () => $query->skip($page ? ($page - 1) * $take : 0));
    }

    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }
}
