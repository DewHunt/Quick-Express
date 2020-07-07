<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use DB;

// use App\Settings;
use App\Menu;
use App\MenuAction;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        View::composer('frontend.*', function ($view) {

            $categories = \App\Category::where('categoryStatus', 1)->get();
        });

        View::composer('*',function($menus){
            $activeMenu = Menu::where('status',1)->get();
            $menus->with('activeMenu',$activeMenu);
        });

        // View::composer('*',function($siteInfo){
        //     $information = Settings::where('siteStatus',1)->first();
        //     $siteInfo->with('information',$information);
        // });

        //Link for Add New Button
        View::composer('*',function($addLink){
            $actionLink = 'admin.index';
            $routeName = \Request::route()->getName();

            if ($routeName)
            {
                $userMenus = Menu::where('menu_link',$routeName)->first();
                if ($userMenus)
                {
                    $userMenuAction = MenuAction::where('parent_menu_id',@$userMenus->id)->where('menu_type',1)->first();
                // dd($userMenuAction);

                    if(@$userMenuAction->action_link)
                    {
                        $actionLink = @$userMenuAction->action_link;
                    }
                }
                
            }
            $addLink->with('addNewLink',$actionLink);
        });

        //Link for Go Back
        View::composer('*',function($backLink){
            $link = "'admin.index'";
            $routeName = \Request::route()->getName();

            if ($routeName)
            {
                $userMenuAction = MenuAction::where('action_link',@$routeName)->first();
                if ($userMenuAction)
                {
                    $userMenu = Menu::where('id',@$userMenuAction->parent_menu_id)->first();
                    if ($userMenu)
                    {
                        $link = $userMenu->menu_link;
                    }
                }
            }

            $backLink->with('goBackLink',@$link); 
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
