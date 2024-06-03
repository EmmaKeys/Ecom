<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

    public function admin_dashboard()
    {
        return view('admin.index');
    }


    //function for CATEGORY
    public function category()
    {
        //$categories = Category::all(); // we can us get,all,first and paginate Categories:: is from our MODEL WE CREATED
        $categories = Category::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        //VALIDATION OF USER INPUTS
        $validator = $request->validate([
            'category' => 'required|unique:categories,category',
            

        ],[
            //CUSTOMIZED ERROR MESSGAGE
            'category.unique' => 'This category already exists',
        ]);

        Category::create($validator);
        
        return redirect()->back()->with('success', 'Category added successfully');
        
    }

    public function deleteCategory($id)
    {
        // dd($id);
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');

    }

    public function admin_logout(){
        Auth::guard('web')->logout(); //LOGOUT IS LARAVEL KEYWORD FOR LOGOUT
        return redirect('/')->with('message', 'You have successfully logged out');

    }

    public function createProduct(){
        return view('admin.createProduct');
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'productName' => 'required|max:225',
            'productCategory' => 'required|max:225',
            'productImage' => ['nullable','file', 'max:10000'],
            'productDescription' => 'required',
            'manufacturerName' => 'required|max:225',
            'status' => 'required',
            'productPrice' => 'required',
            'discountPrice' => 'nullable',
            // 'Quantity' => 'nullable',
            'warranty' => 'nullable|max:225',
        ]);

        $product = new Product();
        $product->productName = $request->productName;
        $product->productCategory = $request->productCategory;
        $product->productDescription = $request->productDescription;
        $product->manufacturerName = $request->manufacturerName;
        $product->status = $request->status;
        $product->productPrice = $request->productPrice;
        $product->discountPrice = $request->discountPrice;
        $product->quantity = $request->quantity;
        $product->warrant = $request->warranty;

        if($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $productImage = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productFolder'), $product);
            $product->$productImage->$productImage;
        }

        $product->save();
        return redirect()->back()->with('message', 'product added successfully');
    }
}
