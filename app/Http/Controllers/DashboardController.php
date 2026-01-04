<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data= Recipe::orderBy("created_at", 'Desc')->limit(3)->get();
        return view("recipe", ['recipes'=>$data]);
    }

    public function showAllRecipes(Request $request){
        $search=$request->input('search');
        $category=$request->input('category',[]);
        $dietary=$request->input('dietary',[]);
        $occasion=$request->input('occasion',[]);
        $duration=$request->input('duration');
        $level=$request->input('level',[]);
        $query=Recipe::query();
        if($search){
            $query->where('title', 'like', "%{$search}%");
        }
        if($category){
            $query->whereIn('recipe_category', $category);
        }
        if(in_array('vegetarian',$dietary)){
            $query->where('is_vegetarian', true);
        }
        if(in_array('vegan',$dietary)){
            $query->where('is_vegan', true);
        }
        if(in_array('halal',$dietary)){
            $query->where('is_halal', true);
        }
        if(in_array('gluten_free',$dietary)){
            $query->where('is_gluten_free', true);
        }
        if($occasion){
            $query->whereIn('occasion',$occasion);
        }
        if($duration === 'over30'){
            $query->where('prep_time_minutes' , '>', 30);
        }
        if($duration === 'less30'){
            $query->where('prep_time_minutes' , '<=', 30);
        }
        if(in_array('easy',$level)){
            $query->whereIn('difficulty', ['easy','medium']);
        }


        $countSearch=$query->count();

        
        $recipes=$query->orderBy('created_at', 'Desc')->paginate(10);
        return view("guest.showAllRecipes", ['recipes'=>$recipes, 'search'=>$search, 'countSearch'=>$countSearch]);
    }

    public function showUserProfile(string $id){
        $user=User::findOrFail($id);
        $recipes=$user->Recipe()->latest()->paginate(9);
        return view('guest.showUserProfile',['data'=>$recipes , 'user'=>$user]);


    }
}
