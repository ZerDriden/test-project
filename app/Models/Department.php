<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, DepartmentEmployee::getTableName());
    }
}
