<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\SportCategory;
use App\Models\Team;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductRepositoryInterface
{
    const IMAGE_PATH = 'admin/images/products/';
    public function getPaginatedItems()
    {
        return Product::paginate(10);
    }
    public function getAllProducts()
    {
        return Product::all();
    }
    public function getAllBrands()
    {
        return Brand::all();
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
    public function getAllProductCategories()
    {
        return ProductCategory::all();
    }
    public function getNotNullLetters()
    {
        return Size::whereNotNull('letter')->get();
    }
    public function getNotNullNumbers()
    {
        return Size::whereNotNull('number')->get();
    }
    public function store($request)
    {
        $data=$request->all();
        $images = array();
        $destination = public_path('admin/images/products/');
        if ($files = $request->file('image'))
        {
            if (!file_exists($destination))
            {
                mkdir($destination, 0777, true);
            }
            foreach ($files as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move($destination, $name);
                $images[]   =   $name;
            }
        }
        $data['image'] = implode("|",$images);

        if($data['discount'] > "0"){
            $d=$data['discount'];
            $p=$data['price'];
            $data['price']=$p-($p*$d/100);
        }

        $product = Product::create($data);
        $product->sizes()->attach($request->size_id);
        return true;
    }
    public function findOne($id)
    {
        return Product::whereId($id)->first();
    }
    public function update($request, $id)
    {
        $item=$this->findOne($id);
        $data=$request->all();

        $images = array();
        $destination = public_path('admin/images/products/');

        if ($request->file('image') !== null)
        {
            $images_db = explode("|", $item->image);
            foreach ($images_db as $img)
            {
                if (file_exists($destination . $img))
                {
                    unlink($destination . $img);
                }
            }
            $files = $request->file('image');

            foreach ($files as $file) {
                $name = time().'_'.$file->getClientOriginalName();
                $file->move($destination, $name);
                $images[]   =   $name;
            }
            $data['image'] = implode("|",$images);
        }

        if($data['discount'] > "0"){
            $d=$data['discount'];
            $p=$data['price'];
            $data['price']=$p-($p*$d/100);
        }

        $item->sizes()->sync($request->size_id);
        $item->update($data);
    }

    public function delete($id)
    {
        $item=$this->findOne($id);
        $item->sizes()->detach();
        if ($item->image == null)
        {
            $item->delete();
        }
        else {
            $images = explode("|", $item->image);
            
            foreach ($images as $img)
            {
                unlink(self::IMAGE_PATH . $img);
            }

            $item->delete();
        }
        return Product::destroy($id);
    }
}
