<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Drug;
use App\Models\Pharmacy;
use App\Policies\DrugPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Drug::class=>DrugPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
