<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AdminRepositoryInterface;

class AdminController extends Controller
{
    public $adminRepo;
    function __construct(AdminRepositoryInterface $adminRepository)
    {
         $this->adminRepo=$adminRepository;
         $this->middleware('permission:admin-enter', ['only' => ['dashboard']]);
    }

    public function dashboard(){
        $products=$this->adminRepo->getAllProducts();
        $brands=$this->adminRepo->getAllBrands();
        $homes=$this->adminRepo->getAllHomes();
        $productCategories=$this->adminRepo->getAllProductCategories();
        $sizes=$this->adminRepo->getAllSizes();
        $teams=$this->adminRepo->getAllTeams();
        $categories=$this->adminRepo->getAllSportCategories();
        $sportComplexes=$this->adminRepo->getAllSportComplexes();
        $tickets=$this->adminRepo->getAllTickets();
        $stadiums=$this->adminRepo->getAllStadiums();
        $users=$this->adminRepo->getAllUsers();
        $news=$this->adminRepo->getAllNews();
        $orders=$this->adminRepo->getAllOrders();
        $countTodayProduct=$this->adminRepo->getTodayProducts();
        $countSC=$this->adminRepo->getTodaySportCategories();
        $countNews=$this->adminRepo->getTodayNews();
        $countTodayUser=$this->adminRepo->getTodayUsers();

        return view('admin.dashboard',
            compact('products',
                    'brands',
                    'homes',
                    'productCategories',
                    'sizes',
                    'teams',
                    'categories',
                    'sportComplexes',
                    'tickets',
                    'stadiums',
                    'users',
                    'news',
                    'orders',
                    'countTodayProduct',
                    'countSC',
                    'countNews',
                    'countTodayUser',
                ));
    }
}
