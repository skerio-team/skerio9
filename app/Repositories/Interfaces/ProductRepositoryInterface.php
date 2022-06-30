<?php
namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface{

    public function getPaginatedItems();
    public function getAllProducts();
    public function getAllBrands();
    public function getAllSizes();
    public function getAllTeams();
    public function getAllSportCategories();
    public function getAllProductCategories();
    public function getNotNullLetters();
    public function getNotNullNumbers();
    public function store($data);
    public function findOne($id);
    public function update($data, $id);
    public function delete($id);


}
