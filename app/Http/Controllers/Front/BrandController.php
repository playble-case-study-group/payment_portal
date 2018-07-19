<?php

namespace App\Http\Controllers\Front;

use App\Shop\Brands\Brand;
use App\Shop\Brands\Repositories\BrandRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{

    private $brandRepo;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepo = $brandRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get the product
     *
     * @param string $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $brand = $this->brandRepo->findBrandById($id);
        $products = DB::table('products')
            ->join('category_product', 'products.id','=', 'category_product.product_id')
            ->join('categories', 'categories.id', '=', 'category_product.category_id')
            ->select('products.slug','categories.name')
            ->where('brand_id', $id)
            ->where('categories.slug', '!=', 'all-products')
            ->get();
        return view('front.brands.brand', compact('brand', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
