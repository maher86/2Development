<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::paginate(15);
        return view('layouts/dashboard/categories',compact('categories'));

    }


    public function create(){

        return view('/layouts/dashboard/createCategory');

    }

    public function store(Request $request){

        $cat = new Category();
        $request->validate([
            'name'=>['required','string'],
            
        ]);

        $cat->name = $request->input('name');
        $cat->desc = $request->input('desc');
        $cat->save();
       session()->flash('create_category','لقد تم إنشاء الصنف بنجاح');
       return redirect('/categories');


    }


    public function edit($id){
        
        $category = Category::find($id);        
        return view('layouts/dashboard/editCategory',compact('category'));
    }

    public function update(Request $request,Category $category){

        $request->validate([

            'name'=> ['required','string'],
            'desc'=> ['string']
        ]);
       // $category->name = $request->name;
       // $cat->desc = $request->desc;
        $category->update($request->all());
        session()->flash('update_category','تم تعديل معلومات الصنف بنجاح');
        return redirect('/categories');

    }

    public function delete($id){
        $cat = Category::find($id);
        $cat->delete();
        session()->flash('delete_cat','تم حذف الصنف بنجاح');
        return redirect('/categories');

    }

}
