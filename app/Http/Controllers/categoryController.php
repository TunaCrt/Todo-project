<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategoriler = Category::get();
        return view('panel.categories.index',compact('kategoriler'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('panel.categories.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $category = new Category();
        $category->name = $request->category_name;
        $category->isActive = $request->category_status;
        $category->save();
        return redirect()->route('panel.categoryIndex')->with(['success'=> 'Kategori başarıyla oluşturuldu']);
         }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //$category = Category::where('id',$id)->first();
        $category = Category::find($id);
        return view("panel.categories.update",compact("category"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('panel.categoryIndex')->with(['success'=> 'Kategori başarıyla Silindi']);

    }
    public function updateCategory(Request $request)
    {
        $request->validate([
            'category_status' => 'min:0 | max:1 | boolean',
            'category_name'=> 'min:3'
        ],
        [
           // 'category_name.min'=>'Kategori Adı Daha Uzun Olmalıdır'
        ]
        );

        $category = Category::find($request->category_id);
        if ($category != null){
            $category->name = $request->category_name;
            $category->isActive = $request->category_status;
            $category->save();
            return redirect()->route('panel.categoryIndex')->with(['success'=> 'Kategori Başarıyla Güncellendi']);
        }else{
            return redirect()->route('panel.categoryIndex')->with(['error'=> 'Bir Hata Oluştu Lütfen Tekrar Deneyiniz']);
        }

    }
}
