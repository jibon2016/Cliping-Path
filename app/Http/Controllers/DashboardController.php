<?php

namespace App\Http\Controllers;

use App\Models\ActivityCategory;
use App\Models\Brand;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Color;
use App\Models\Customer;
use App\Models\Look;
use App\Models\News;
use App\Models\Size;
use App\Models\Space;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Surface;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\TextUI\Configuration\Source;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $sliders = Slider::count();
        $activityCategories = ActivityCategory::count();
        $customers = Customer::count();
        $news = News::count();
        return view('dashboard',compact('sliders',
            'activityCategories','customers','news'));
    }
}
