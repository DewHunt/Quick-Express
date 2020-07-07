<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use DB;

use App\WebsiteInformation;
use App\Menu;
use App\MenuAction;
use App\SocialLinks;

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

        //Link for Add New Button
        View::composer('*',function($addLink){
            $actionLink = 'admin.index';
            $routeName = \Route::currentRouteName();

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
            $routeName = \Route::currentRouteName();

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

        //Link Frontend information
        View::composer('*',function($siteInfo){
            $website_information = WebsiteInformation::where('id',1)->first();
            $siteInfo->with('website_information',$website_information);
        });

        //Link For Social Info
        View::composer('*',function($socialInfo){
            $social_link_list = SocialLinks::where('status',1)->get();
            $socialInfo->with('social_link_list',$social_link_list);
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
