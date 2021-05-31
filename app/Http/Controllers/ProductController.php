<?php

namespace App\Http\Controllers;


use App\Models\product;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Validator;


use Illuminate\Http\Request;
// use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = Product::latest()->get();
        foreach($products as $product){
            $categoryid =$product->category_id;
            $categories = Category::all();

            $category = $categories->find($categoryid);
            $categoryname = $category->nameEn;
            $product->categoryname = $categoryname;
        }
        
        if ($request->ajax()) {
            $data = Product::latest()->get();
         
        }
      
        return view('product',compact('products'));
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

      
       
       
        $imageName=''; 
        
        if($request->hasFile('image')){
            
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('image'), $imageName);
  
            $image=$request->file('image');
            
        }
      

    $product= new Product();
    
        $name = $request->name;
        $product->name = $name;
      
        $category_id=$request->category_id;
        $product->category_id = $category_id;
        $product->image = $imageName;
        $price=$request->price;
        $product->price = $price;
       
        $product->save();    
     
            
                
     
       return response()->json(['success'=>'product saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $product = Product::find($id);
        return response()->json($product);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product= Product::find($id)->delete();
     
        return response()->json(['success'=>'product deleted successfully.']);
    }



    public function addtocart( $id)
    {
         $product =product::find($id);
        //  echo "<pre>"; print_r($product);die;

         if(!$product){
             abort(404);

         }
        //  $cart = session()->get('cart');


         $cart [$id]=[
            "name"=>$product->name,
            "price"=>$product->price,
            "image"=>$product->image

        ];
        // dd($cart);

        // session()->push( $cart,'cart');
    //    \Session::push('cart',$cart);
    request()->session()->push('cart', $cart);

    
          
    //    dd(\Session::get('cart'));
        return redirect()->back()->with('success','product added to cart successfully' );  
      
        //  dd($cart);

        //  if($cart){
            //  $cart = [$id =>[
            //      "name"=>$product->name,
            //      "price"=>$product->price,
            //      "image"=>$product->image
            //  ]

            //  ];
            // //  dd($cart);
           
            //  session()->put('cart',$cart);
            // //  dd(session()->get('cart'));
             
            //  return redirect()->back()->with('success','product added to cart successfully' );
            //  dd($cart);

        //  }


        //  if(isset($cart[$id])){
        //      $cart[$id];
        //      session()->put('cart',$cart);
        //      return redirect()->back()->with('success','product added to cart successfully' );
        //  }

        

        
    }

    
       
    



    public function Cart(){
    
        return view('cart');
    }



}
