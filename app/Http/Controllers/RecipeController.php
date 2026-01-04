<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes=Recipe::where('user_id',auth()->id())->latest()->get();
        return view('user.userDashboard', ['recipes'=>$recipes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.userCreatePost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:1000',
            'ingredients'=>'required|string',
            'photo_path'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_halal'=>'nullable|boolean',
            'is_vegan'=>'nullable|boolean',
            'is_vegetarian'=>'nullable|boolean',
            'is_gluten_free'=>'nullable|boolean',
            'recipe_category'=>'required|string|in:main,dessert,breakfast,bread,appetizer,soup,beverage,snack,ice_cream',
            'prep_time_minutes'=>'nullable|integer|min:1|max:1440',
            'difficulty'=>'required|string|in:easy,medium,hard',
            'occasion'=>'required|string|in:eid,ramadan,family,wedding,party,everyday,special,anniversary',
            'cuisine'=>'required|string',
        ]);
        if($request->hasFile('photo_path')){
            $validated['photo_path']=$request->file('photo_path')->store('recipe','public');
        }else if(! $request->file('photo_path')->isValid()){
            throw ValidationException::withMessages([
                'photo_path'=>"Photo Upload Failed, try again !"
            ]);
        }
            $validated['user_id']=Auth::id();
            Recipe::create($validated);
            return redirect()->route('recipes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipes=Recipe::with('user')->findOrFail($id);
        return view('user.userSelectPost',['recipe'=>$recipes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $recipes=Recipe::findOrFail($id);
        if($recipes->user_id!==auth()->id()){
            return abort(403 ,'access denied!');
        }
        return view('user.userEditPost',['recipe'=>$recipes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $recipe= Recipe::findOrFail($id);
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:1000',
            'ingredients'=>'required|string',
            'photo_path'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_halal'=>'nullable|boolean',
            'is_vegan'=>'nullable|boolean',
            'is_vegetarian'=>'nullable|boolean',
            'is_gluten_free'=>'nullable|boolean',
            'recipe_category'=>'required|string|in:main,dessert,breakfast,bread,appetizer,soup,beverage,snack,ice_cream',
            'prep_time_minutes'=>'nullable|integer|min:1|max:1440',
            'difficulty'=>'required|string|in:easy,medium,hard',
            'occasion'=>'required|string|in:eid,ramadan,family,wedding,party,everyday,special,anniversary',
            'cuisine'=>'required|string',

        ]);
        if($request->hasFile('photo_path')){
            $validated['photo_path']=$request->file('photo_path')->store('recipe','public');
        }
            $recipe->update($validated);
            return redirect()->route('recipes.index')->with('success', 'Recipe updated well!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recipe=Recipe::findOrFail($id);
        if($recipe->user_id!==auth()->id()){
            return abort(403, 'access denied');
        }
        if($recipe->photo_path){
            Storage::disk('public')->delete($recipe->photo_path);
        }
        $recipe->delete();
        return redirect()->route('recipes.index')->with('success', 'Recipe deleted well!');
    }
}
