<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data= Recipe::orderBy("created_at", 'Desc')->limit(3)->get();
        return view("recipe", ['recipes'=>$data]);
    }

    public function showAllRecipes(){
        $recipes=Recipe::orderBy('created_at', 'Desc')->paginate(10);
        return view("guest.showAllRecipes", ['recipes'=>$recipes]);
    }
}
