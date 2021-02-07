<?php 

namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use Illuminate\Support\Facades\Route;
use App\Models\City;
use App\Models\Category;
use App\Models\ResCategory;
use App\Models\ResidenceCategory;
use App\Models\Type;
use App\Models\Residence;
use App\Models\UserFavorite;
use App\Models\Area;
use App\Models\Item;
use Carbon\Carbon;
use Cookie;
use URL;
use DB;


class SiteComposer {

    /**
     * Create a new profile composer.
     *
     */
    public function __construct()
    {
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $title = 'Seven - счастливое число вашей сделки';
        $cities = City::all();

        $current_city = Cookie::get('current_city');
        $current_city_title = Cookie::get('current_city_title');
        if (!$current_city or !$current_city_title) {
            $minutes = 15;
            Cookie::queue('current_city', '2', $minutes);
            Cookie::queue('current_city_title', 'Сочи', $minutes);
            $current_city = 2;
            $current_city_title = 'Сочи';
        }

        $current_areas = Area::where('city_id', $current_city)->get();
        $current_areas_arr = $current_areas->pluck('id')->toArray();

        //dd($current_city);
        $resCategoryArr = ResidenceCategory::select('category_id')->groupBy('category_id')->pluck('category_id')->toArray();
        $resCategoryMenu = ResCategory::whereIn('id', $resCategoryArr)->get();

        $residenceArea = Residence::select('area_id')->groupBy('area_id')->pluck('area_id')->toArray();
        //dd($residenceArea);


        $types = Type::where('active', 1)->where('show_menu', 1)->get();
        //$resMenu = Residence::where('active', 1)->where('show_menu', 1)->get();
        
        $category_life = Category::main()->where('type', 'life')->with('children')->get();
        $category_bizness = Category::Main()->where('type', 'bizness')->with('children')->get();
        $category_menu = Category::Menu()->with('children')->get();

        $areaMas = [];
        foreach ($category_menu as $main_cat) {
            $sub_cat = $main_cat->children->pluck('id')->toArray();
            $cat_id_array = array_merge($sub_cat, [$main_cat->id]);

            $cat_areas_id = Item::whereIn('area_id', $current_areas_arr)->WhereHas('categories',  function ($query) use ($cat_id_array) {
                $query = $query->whereIn('categories.id', $cat_id_array);
            })->select('area_id')->groupBy('area_id')->pluck('area_id')->toArray();
            
            $areaMas[$main_cat->id] = $cat_areas_id;

        }

        //dd($areaMas);


        $massFav =[];
        $user = auth()->user();
        if ($user){
            $massFav = UserFavorite::where('user_id', $user->id)->pluck('item_id')->toArray();
        }
      
        $view->with([
            'active'              => Route::currentRouteName(),
            'action'              => URL::current(),
            'fullurl'             => url()->full(),
            //'lang'              => $locale,
            'cities'              => $cities,
            'current_city'        => $current_city,
            'current_city_title'  => $current_city_title,
            'cities'              => $cities,
            'html_title'          => $title,
            'html_description'    => '',
            'category_life'       => $category_life,
            'category_bizness'    => $category_bizness,
            'types'               => $types,
            //'resMenu'             => $resMenu,
            'massFav'             => $massFav,
            'resCategoryMenu'     => $resCategoryMenu,
            'residenceArea'       => $residenceArea,
            'current_areas'       => $current_areas,
            'category_menu'       => $category_menu,
            'areaMas'             => $areaMas,

		]);
    }

}