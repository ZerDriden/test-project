<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['full_name'];

    protected $hidden = ['name', 'surname', 'patronymic'];

    protected $casts = ['gender' => GenderEnum::class];

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, DepartmentEmployee::getTableName());
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => trim(
                $attributes['surname'] . ' ' . $attributes['name'] . ' ' . $attributes['patronymic']
            )
        );
    }
}
