<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\Card;
use App\Models\Home;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\SportCategory;
use App\Models\SportComplex;
use App\Models\Stadium;
use App\Models\Team;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRepository implements AdminRepositoryInterface
{

    public function getAllProducts()
    {
        $products = Product::all();
        return $products->count();
    }
    public function getAllBrands()
    {
        $brands = Brand::all();
        return $brands->count();
    }
    public function getAllHomes()
    {
        return Home::all()->count();
    }
    public function getAllProductCategories()
    {
        return ProductCategory::all();
    }
    public function getAllSizes()
    {
        return Size::all();
    }
    public function getAllTeams()
    {
        return Team::all();
    }
    public function getAllSportCategories()
    {
        return SportCategory::all();
    }
    public function getAllSportComplexes()
    {
        return SportComplex::all();
    }
    public function getAllTickets()
    {
        return Ticket::all();
    }
    public function getAllStadiums()
    {
        return Stadium::all();
    }
    public function getAllUsers()
    {
        return User::all();
    }
    public function getAllNews()
    {
        return News::all();
    }
    public function getAllOrders()
    {
        return Card::all();
    }
    public function getTodayProducts()
    {
        $todayProduct = DB::table('products')->select(DB::raw('*'))
            ->whereRaw('Date(created_at) = CURDATE()')->get();
        return count($todayProduct);
    }
    public function getTodaySportCategories()
    {
        $todayCat = DB::table('sport_categories')->select(DB::raw('*'))
            ->whereRaw('Date(created_at) = CURDATE()')->get();
        return count($todayCat);
    }
    public function getTodayNews()
    {
        $todayNews = DB::table('news')->select(DB::raw('*'))
            ->whereRaw('Date(created_at) = CURDATE()')->get();
        return count($todayNews);
    }
    public function getTodayUsers()
    {
        $todayUsers = DB::table('users')->select(DB::raw('*'))
            ->whereRaw('Date(created_at) = CURDATE()')->get();
        return count($todayUsers);
    }

}

