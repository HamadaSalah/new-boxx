
<?php

use App\Order;
use Illuminate\Support\Facades\DB;

if (!function_exists('Collections')) {
    function Collections()
    {
        return App\Collection::all()->count();
    }
}
if (!function_exists('Products')) {
    function Products()
    {
        return App\Product::all()->count();
    }
}
if (!function_exists('Boxes')) {
    function Boxes()
    {
        return App\Box::all()->count();
    }
}
if (!function_exists('Cats')) {
    function Cats()
    {
        return App\Category::all()->count();
    }
}
if (!function_exists('Brands')) {
    function Brands()
    {
        return App\Brand::all()->count();
    }
}
if (!function_exists('Orders')) {
    function Orders()
    {
        return App\Order::all()->count();
    }
}


if (!function_exists('mothly')) {
    function mothly()
    {
        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $order = Order::whereMonth('created_at', '=', $i)
                ->count();
            array_push($data, $order);
        }
        return json_encode($data);
    }
}
if (!function_exists('WebName')) {
    function WebName()
    {
        return App\Setting::first()->name;
    }
}
if (!function_exists('WebStatus')) {
    function WebStatus()
    {
        return App\Setting::first()->WebsiteStatus;
    }
}

if (!function_exists('logo')) {
    function logo()
    {
        return App\Setting::first()->logo;
    }
}
if (!function_exists('MainBoxes')) {
    function MainBoxes()
    {
        return App\FrontBoxes::all()->where('status', 0);
    }
}
if (!function_exists('CopyRights')) {
    function CopyRights()
    {
        if (app()->getLocale() == 'en')
            return App\Setting::first()->CopyRights_en;
        else if (app()->getLocale() == 'ar')
            return App\Setting::first()->CopyRights_ar;
    }
}


?>
