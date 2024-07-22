<?php

namespace App\Http\Controllers;

use App\Models\Atribute;
use App\Models\Categori;
use App\Models\Product;
use App\Models\ProductAttributes;
use App\Models\ProductImages;
use App\Models\Social;
use Illuminate\Http\Request;
use Inertia\Inertia;

class JustOrangeController extends Controller
{
    

    public function show(Request $request): \Inertia\Response
    {
        $filter = ($request->get('filter')) ? $request->get('filter') : null;
        // dd($filter);
        switch ($filter) {
            case 'all':
                $product = Product::where("active",true)->orderBy('created_at')->take(8)->with('category')->get();
                break;
            case 'new':
                $product = Product::where("active",true)->orderBy('id','desc')->take(8)->with('category')->get();
            case 'rekomendasi':
                $product = Product::where('recomended',true)->orderBy('id','asc')->take(8)->with('category')->get();
            case 'desc_harga':
                $product = Product::where('active',true)->orderBy('price','desc')->take(8)->with('category')->get();
            case 'asc_harga':
                $product = Product::where('active',true)->orderBy('price','asc')->take(8)->with('category')->get();
             default:
                $product =  Product::where('active', true)->orderBy('id', 'desc')->take(8)->with('category')->with('atributes')->get();
                break;
        }
        $data["ProductsAll"] = $product;
        $data['Categori'] = Categori::all();
        return Inertia::render('products/index',$data);
    }
    public function index(Request $request): \Inertia\Response
    {
       
        $filter = ($request->get('filter')) ? $request->get('filter') : null;
        // dd($filter);
        switch ($filter) {
            case 'all':
                $product = Product::where("active",true)->orderBy('created_at')->with('category')->with('attribute')->get();
                break;
            case 'new':
                $product = Product::where("active",true)->orderBy('id','desc')->take(8)->with('category')->get();
            case 'rekomendasi':
                $product = Product::where('active',true)->orderBy('recomended')->with('category')->get();
            case 'desc_harga':
                $product = Product::where('active',true)->orderBy('price','desc')->take(8)->with('category')->get();
            case 'asc_harga':
                $product = Product::where('active',true)->orderBy('price','asc')->take(8)->with('category')->get();
             default:
             $product =  Product::where('active', true)->orderBy('id', 'desc')->take(8)->with('category')->with('atributes')->get();
             break;
        }
        $data["ProductsAll"] = $product;
        // dd($data["ProductsAll"]);
        $data["ProductsPopuller"] = $product = Product::where('recomended',true)->orderBy('id','asc')->take(8)->with('category')->get();
        $data['Filter'] = $filter;
        $data['Categoris'] = Categori::all();
        // $data['searchQuery'] = 
        // dd($data['Categoris']);
        return Inertia::render('justorange-default',$data);
    }
    public function product(Request $request): \Inertia\Response
    {

        $slug = $request->slug;
        $data["Products"] = Product::where("slug",$slug)->first();
        $data["Categori"] = Categori::where('id',$data["Products"]->category_id)->first();
        $data["ProductsPopuller"] = Product::where("category_id",$data["Products"]->category_id)->with('category')->with('atributes')->get();
        $data["Categoris"] = Categori::all();
        $data['Attribute'] = Atribute::where("products_id",$data["Products"]->id)->get();
        return Inertia::render('products/detail',$data);
    }
    public function categoribyid(Request $request): \Inertia\Response
    {
       if($request->id){
           $data['ProductCategori'] = Product::where('category_id',$request->id)->with('category')->get();
        //    dd($data['ProductCategori']);
        }else{
            $data['ProductCategori'] = Product::all();
        }
        // dd($data['ProductCategori']);
        $data['Categoris'] = Categori::all();
        return Inertia::render('categori/index',$data);
    }

    public function contact (Request $request): \Inertia\Response
    {
        $data['Social'] = Social::all();
        $data['Categoris'] = Categori::all();
        return Inertia::render('contact',$data);

    }
}
