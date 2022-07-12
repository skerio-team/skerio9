<?php
namespace App\Repositories\Interfaces;

interface AdminRepositoryInterface{

    public function getAllProducts();
    public function getAllBrands();
    public function getAllHomes();
    public function getAllProductCategories();
    public function getAllSizes();
    public function getAllTeams();
    public function getAllSportCategories();
    public function getAllSportComplexes();
    public function getAllTickets();
    public function getAllStadiums();
    public function getAllUsers();
    public function getAllNews();
    public function getAllOrders();
    public function getTodayProducts();
    public function getTodaySportCategories();
    public function getTodayNews();
    public function getTodayUsers();

}
