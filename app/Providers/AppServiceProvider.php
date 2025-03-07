<?php

namespace App\Providers;

use App\Models\About;
use App\Models\ContactSeo;
use App\Models\DefaultData;
use App\Models\JobSeo;
use App\Models\Menu;
use App\Models\NewsSeo;
use App\Models\Service;
use App\Models\ServiceSeo;
use App\Models\Slider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register your services here
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $sharedData = [
                'sliders' => Slider::with('localizations')->limit(10)->get(),
                'defaultData' => DefaultData::with('localizations')->first(),
                'contactSlug' => ContactSeo::with('localizations')->get(),
                'aboutSlug' => About::with('localizations')->get(),
                'about' => About::with('localizations')->first(),
                'menuSideBar' => Menu::with(['children.localizations'])->whereNull('parent_id')->get(),
                 'menus' => Menu::with('localizations')->whereNull('parent_id')->get(),
                 'subMenusLimit' => Menu::with(['localizations' => function ($query) {
                             $query->select('id', 'menu_id', 'title', 'lang', 'slug');
                   }])->whereNotNull('parent_id')->inRandomOrder()->limit(5)->get(),

             ];

                View::composer('*', function ($view) use ($sharedData) {
                    $view->with($sharedData);
                });
    }

}
