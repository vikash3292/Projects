<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Schema;

use Auth;
use DB;


use App;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
        function generateTree1($items = array(), $parent_id = 0)
    {
        $pages = array();
        for ($i = 0, $ni = count($items); $i < $ni; $i++) {
            if ($items[$i]['parent_menu_id'] == $parent_id) {


                //$tree[] = '<input type="checkbox" value="'.$items[$i]['id'].'">';
                $page['id'] = $items[$i]['id'];
                $page['title'] = $items[$i]['menu_title'];
                $page['url'] = $items[$i]['url'];
                $page['icon'] = $items[$i]['icon'];
                $page['parentid'] = $items[$i]['parent_menu_id'];
                $page['sub'] = $this->generateTree1($items, $items[$i]['id']);
                $pages[] = $page;
            }
        }

        return $pages;
    }

    public function boot()
    {

        \View::composer('*', function($view)
            {
         View::share('key', 'value');
         Schema::defaultStringLength(191);

            $rolldata = array();

            if(Auth::guard('main_users')->check())
                {

           $role_id = \Auth::guard('main_users')->user()->emprole;
            $user_id= \Auth::guard('main_users')->user()->id;
            $user_name= \Auth::guard('main_users')->user()->firstname;

         $rol_permission =DB::table('role_permissions')->where('role_id','=',$role_id)->groupBy('role_permissions.site_menu_id')->get();

         foreach ($rol_permission as $key => $rol_per) {

           $parrentdata =DB::table('site_menu')->where('id','=',$rol_per->site_menu_id)->first();
           if(!empty($parrentdata)){


        
            $subparrentdata =DB::table('site_menu')->where('id','=',$parrentdata->parent_menu_id)->first();

            if(!empty($subparrentdata)){

                $rolldata[] = $subparrentdata->parent_menu_id;

            }
           

            //$rol_per->parrentid = $parrentdata->parent_menu_id;
            if($parrentdata->parent_menu_id !=0 || $rol_per->site_menu_id !=0){

                $rolldata[] = $parrentdata->parent_menu_id;
                $rolldata[] = $rol_per->site_menu_id;

             }
             

           }
           
            //$rolldata[] = $parrentid->menu_title;
         }

           View::share('rolldata', array_unique(array_filter($rolldata)));  
           View::share('userid',$user_id);
           View::share('username',$user_name);
            View::share('role',$role_id);


        $items =  DB::table('site_menu')->where('is_active',1)->orderBy('sort', 'ASC')->get();

        foreach ($items as $object) {
            $arrays[] =  (array) $object;
        }
        $menu = $this->generateTree1($arrays, $parent_id = 0);
        View::share('menu',$menu);  

         } 

         $mainsetting = DB::table('main_settings')->where('id',1)->first();
        
         View::share('mainsetting',$mainsetting); 

        


     });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
