<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmployeeRepository;
use App\Repositories\DepartmentRepository;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;

final class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
