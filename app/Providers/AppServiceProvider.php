<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use DB;
use Illuminate\Pagination\Paginator;
use App\Models\Categories;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        /*
        //Bootstrap pagination
        Paginator::useBootstrap();
        //Register form categories select from db table categories
        $categories_array = Categories::orderBy('id')->get();
        //Register form countries select from api first
        $count = HTTP::get('https://api.first.org/data/v1/countries?region=south%20america');
        $countries_array = $count->json();
        View::share(['categories'=> collect($categories_array),
                    'countries'=> collect($countries_array)]);
        */
    }
}
