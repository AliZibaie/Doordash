<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Banner;
use App\Models\FoodCategory;
use App\Models\RestaurantCategory;
use App\Policies\Admin\BannerPolicy;
use App\Policies\Admin\FoodCategoryPolicy;
use App\Policies\Admin\RestaurantCategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        RestaurantCategory::class=>RestaurantCategoryPolicy::class,
        FoodCategory::class=>FoodCategoryPolicy::class,
        Banner::class=>BannerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * @param string[] $policies
     */

}
