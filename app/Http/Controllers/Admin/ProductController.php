<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SportCategory;
use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $productRepo;
    function __construct(ProductRepositoryInterface $productRepository)
    {
         $this->productRepo=$productRepository;
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
         $items=$this->productRepo->getPaginatedItems();
        return view('admin.product.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items=$this->productRepo->getAllProducts();
        $brands=$this->productRepo->getAllBrands();
        $sizes=$this->productRepo->getAllSizes();
        $letters=$this->productRepo->getNotNullLetters();
        $numbers=$this->productRepo->getNotNullNumbers();
        $teams=$this->productRepo->getAllTeams();
        $sport_categories=$this->productRepo->getAllSportCategories();
        $product_categories=$this->productRepo->getAllProductCategories();

        return view('admin.product.create', compact('items', 'sport_categories', 'product_categories', 'brands', 'sizes', 'letters', 'numbers', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->productRepo->store($request);
        return redirect()->route('admin.products.index')->with('success', 'Ma`lumot yaratildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=$this->productRepo->findOne($id);
        return view('admin.product.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=$this->productRepo->findOne($id);
        $items=$this->productRepo->getAllProducts();
        $brands=$this->productRepo->getAllBrands();
        $letters=$this->productRepo->getNotNullLetters();
        $numbers=$this->productRepo->getNotNullNumbers();
        $teams=$this->productRepo->getAllTeams();
        $sport_categories=$this->productRepo->getAllSportCategories();
        $product_categories=$this->productRepo->getAllProductCategories();

        return view('admin.product.edit',compact('item', 'items','sport_categories', 'product_categories', 'brands', 'numbers', 'letters', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $item=Product::find($id);
        $data=$request->all();

        if ($request->file('image') !== null)
        {
            $images = array();
            $destination = public_path('admin/images/products/');

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
        return redirect()->route('admin.products.index')->with('success', $item->name . ' - ma`lumoti tahrirlandi!');
        // $this->productRepo->update($request, $id);
        // return redirect()->route('admin.products.index')->with('success', $request->name . ' - ma`lumoti tahrirlandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=$this->productRepo->findOne($id);
        $this->productRepo->delete($id);
        return redirect()->route('admin.products.index')->with('warning', $item->name . " - ma`lumoti o'chirildi!");
    }
}

