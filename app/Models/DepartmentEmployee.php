<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

final class DepartmentEmployee extends Model
{
    use HasFactory;

    protected $table = 'department_employee';

    protected $guarded = [];

    public $timestamps = false;
}
