<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index',['category'=>Category::all()]);
    }

    




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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

    $category= new Category();
    $nameAr = $request->nameAr;
        $category->nameAr = $nameAr;
        $nameEn = $request->nameEn;
        $category->nameEn = $nameEn;
        $category->image = $imageName;
        $category->save();
    
   
   
        return redirect(route('category.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "fghfh";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.edit',[
            
            
           'category' => Category::find($id)
            
            
            ]);
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
        $nameAr = $request->nameAr;
        $nameEn = $request->nameEn;
        if($request->hasFile('image')){
            
            $imageName = time().'.'.$request->image->extension();  
         
            $request->image->move(public_path('image'), $imageName);
      
                $image=$request->file('image');
                
            }



        $category = Category::findOrFail($id);
        $category->nameAr = $nameAr;
        $category->nameEn = $nameEn;
        $category->image = $imageName;
        $category->save();
       
        return redirect(route('category.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        // dd($category,$id);
        Unlink(public_path('image') .'/'. $category->image);
        $category->delete();
        return redirect(route('category.index'));

    }
}
