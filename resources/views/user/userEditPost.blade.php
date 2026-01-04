<x-layout title="Edit My Recipe">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit Recipe</h2>
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary">← Back to Recipes</a>
        </div>
        <hr>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    class="form-control @error('title') is-invalid @enderror" 
                    value="{{ old('title', $recipe->title) }}" 
                    required
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description (Optional)</label>
                <textarea 
                    name="description" 
                    id="description" 
                    class="form-control @error('description') is-invalid @enderror" 
                    rows="3"
                >{{ old('description', $recipe->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Ingredients -->
            <div class="mb-3">
                <label for="ingredients" class="form-label fw-bold">Ingredients</label>
                <textarea 
                    name="ingredients" 
                    id="ingredients" 
                    class="form-control @error('ingredients') is-invalid @enderror" 
                    rows="5"
                >{{ old('ingredients', $recipe->ingredients) }}</textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Recipe Category -->
            <div class="mb-3">
                <label class="form-label fw-bold">Category</label>
                <select name="recipe_category" class="form-select @error('recipe_category') is-invalid @enderror">
                    <option value="main" {{ (old('recipe_category') ?? $recipe->recipe_category) == 'main' ? 'selected' : '' }}>Main Course</option>
                    <option value="breakfast" {{ (old('recipe_category') ?? $recipe->recipe_category) == 'breakfast' ? 'selected' : '' }}>Breakfast</option>
                    <option value="dessert" {{ (old('recipe_category') ?? $recipe->recipe_category) == 'dessert' ? 'selected' : '' }}>Dessert</option>
                    <option value="appetizer" {{ (old('recipe_category') ?? $recipe->recipe_category) == 'appetizer' ? 'selected' : '' }}>Appetizer</option>
                    <option value="snack" {{ (old('recipe_category') ?? $recipe->recipe_category) == 'snack' ? 'selected' : '' }}>Snack</option>
                    <option value="soup" {{ old('recipe_category') == 'soup' ? 'selected' : '' }}>Soup</option>
                    <option value="beverage" {{ old('recipe_category') == 'beverage' ? 'selected' : '' }}>Beverage</option>
                    <option value="bread" {{ old('recipe_category') == 'bread' ? 'selected' : '' }}>Bread</option> 
                    <option value="ice_cream" {{ old('recipe_category') == 'ice_cream' ? 'selected' : '' }}>Ice-Cream</option> 
                </select>
                @error('recipe_category')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Cuisine (text input) -->
            <div class="mb-3">
                <label for="cuisine" class="form-label fw-bold">Cuisine</label>
                <input 
                    type="text" 
                    id="cuisine" 
                    name="cuisine" 
                    class="form-control @error('cuisine') is-invalid @enderror" 
                    value="{{ old('cuisine', $recipe->cuisine) }}"
                    placeholder="e.g. Moroccan, Italian, Thai..."
                >
                @error('cuisine')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Occasion -->
            <div class="mb-3">
                <label class="form-label fw-bold">Occasion</label>
                <select name="occasion" class="form-select @error('occasion') is-invalid @enderror">
                    <option value="ramadan" {{ (old('occasion') ?? $recipe->occasion) == 'ramadan' ? 'selected' : '' }}>Ramadan</option>
                    <option value="eid" {{ (old('occasion') ?? $recipe->occasion) == 'eid' ? 'selected' : '' }}>Eid</option>
                    <option value="party" {{ (old('occasion') ?? $recipe->occasion) == 'party' ? 'selected' : '' }}>Party</option>
                    <option value="family" {{ old('occasion') == 'family' ? 'selected' : '' }}>Family</option>
                    <option value="special" {{ old('occasion') == 'special' ? 'selected' : '' }}>Special</option>
                    <option value="anniversary" {{ old('occasion') == 'anniversary' ? 'selected' : '' }}>Anniversary</option>
                    <option value="wedding" {{ old('occasion') == 'wedding' ? 'selected' : '' }}>Wedding</option>
                    <option value="everyday" {{ (old('occasion') ?? $recipe->occasion) == 'everyday' ? 'selected' : '' }}>Everyday</option>
                </select>
                @error('occasion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Dietary Preferences -->
            <div class="mb-3">
                <label class="form-label fw-bold">Dietary & Allergens</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_vegetarian" id="is_vegetarian" value="1" {{ (old('is_vegetarian') ?? $recipe->is_vegetarian) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_vegetarian">Vegetarian</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_vegan" id="is_vegan" value="1" {{ (old('is_vegan') ?? $recipe->is_vegan) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_vegan">Vegan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_halal" id="is_halal" value="1" {{ (old('is_halal') ?? $recipe->is_halal) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_halal">Halal</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_gluten_free" id="is_gluten_free" value="1" {{ (old('is_gluten_free') ?? $recipe->is_gluten_free) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_gluten_free">Gluten-Free</label>
                </div>
            </div>

            <!-- Prep Time -->
            <div class="mb-3">
                <label for="prep_time_minutes" class="form-label fw-bold">Prep Time (minutes)</label>
                <input 
                    type="number" 
                    id="prep_time_minutes" 
                    name="prep_time_minutes" 
                    class="form-control @error('prep_time_minutes') is-invalid @enderror" 
                    min="1"
                    max="300"
                    value="{{ old('prep_time_minutes', $recipe->prep_time_minutes) }}"
                >
                @error('prep_time_minutes')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Difficulty -->
            <div class="mb-3">
                <label class="form-label fw-bold">Difficulty</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="difficulty" id="diff_easy" value="easy" {{ (old('difficulty') ?? $recipe->difficulty) == 'easy' ? 'checked' : '' }}>
                        <label class="form-check-label" for="diff_easy">Easy</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="difficulty" id="diff_medium" value="medium" {{ (old('difficulty') ?? $recipe->difficulty) == 'medium' ? 'checked' : '' }}>
                        <label class="form-check-label" for="diff_medium">Medium</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="difficulty" id="diff_hard" value="hard" {{ (old('difficulty') ?? $recipe->difficulty) == 'hard' ? 'checked' : '' }}>
                        <label class="form-check-label" for="diff_hard">Hard</label>
                    </div>
                </div>
                @error('difficulty')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Photo -->
            <div class="mb-3">
                <label for="photo_path" class="form-label fw-bold">New Photo (Optional)</label>
                <input 
                    type="file" 
                    id="photo_path" 
                    name="photo_path" 
                    class="form-control @error('photo_path') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/gif,image/webp"
                >
                @error('photo_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if($recipe->photo_path)
                    <div class="mt-2">
                        <small class="text-muted">Current photo:</small><br>
                        <img src="{{ asset('storage/' . $recipe->photo_path) }}" 
                             alt="Current recipe photo" 
                             class="img-thumbnail mt-1" 
                             style="max-height: 150px; object-fit: cover;">
                    </div>
                @endif

                <div class="form-text text-muted">
                    Leave blank to keep current photo. Max 2MB.
                </div>
            </div>

            <!-- Actions -->
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update Recipe</button>
                <a href="{{ route('recipes.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>