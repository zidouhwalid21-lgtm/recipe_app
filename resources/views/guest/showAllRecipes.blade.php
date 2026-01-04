<x-layout title="All Recipes">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>All Recipes</h2>
            <a href="{{ route('recipes.create') }}" class="btn btn-primary">+ Add Recipe</a>
        </div>

        <p class="text-muted">Discover recipes shared by the community.</p>
        <hr>

        <!-- Search Bar -->
        <div class="mb-4">
            <form method="GET" action="{{ request()->url() }}" class="d-flex">
                <input
                    type="text"
                    name="search"
                    class="form-control me-2"
                    placeholder="Search by recipe name..."
                    value="{{ request('search') }}"
                >
                <button type="submit" class="btn btn-outline-secondary">Search</button>
           
        </div>
        @if ($search)
            <p>Found <strong>{{ $countSearch }}</strong> items for : <strong>{{ $search }}</strong></p>
            
        @endif
        <div class="row">
            <!-- Sidebar Filters (optional: collapse on mobile) -->
            <!-- Sidebar Filters -->
<div class="col-lg-3 mb-4 mb-lg-0">
    <div class="bg-light rounded p-3 h-100">
        {{-- <form action="{{ request()->url() }}" method="GET"> --}}
            @php
                $category = (array) request('category', []);
                $dietary = (array) request('dietary', []);
                $occasion = (array) request('occasion', []);
                $duration = request('duration');
                $level = (array) request('level',[]);
            @endphp

            <h5 class="mb-3">Filters</h5>
            <aside>
                <!-- Category Filter -->
                <details class="mb-3" open>
                    <summary class="fw-bold">Category</summary>
                    <div class="mt-2">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="dessert" id="cat_dessert" {{ in_array('dessert', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_dessert">Dessert</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="breakfast" id="cat_breakfast" {{ in_array('breakfast', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_breakfast">Breakfast</label>
                        </div>
                        <!-- Repeat for other categories -->
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="main" id="cat_main" {{ in_array('main', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_main">Main Course</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="appetizer" id="cat_appetizer" {{ in_array('appetizer', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_appetizer">Appetizer</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="soup" id="cat_soup" {{ in_array('soup', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_soup">Soup</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="snack" id="cat_snack" {{ in_array('snack', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_snack">Snack</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="beverage" id="cat_beverage" {{ in_array('beverage', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_beverage">Beverage</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="ice_cream" id="ice_cream" {{ in_array('ice_cream', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_ice_cream">Ice_Cream</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="category[]" value="bread" id="cat_bread" {{ in_array('bread', $category) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cat_bread">Bread</label>
                        </div>
                    </div>
                </details>

                <!-- Dietary Filter -->
                <details class="mb-3" >
                    <summary class="fw-bold">Dietary</summary>
                    <div class="mt-2">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="dietary[]" value="vegetarian" id="diet_veg" {{ in_array('vegetarian', $dietary) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_veg">Vegetarian</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="dietary[]" value="vegan" id="diet_vegan" {{ in_array('vegan', $dietary) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_vegan">Vegan</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="dietary[]" value="halal" id="diet_halal" {{ in_array('halal', $dietary) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_halal">Halal</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="dietary[]" value="gluten_free" id="diet_gf" {{ in_array('gluten_free', $dietary) ? 'checked' : '' }}>
                            <label class="form-check-label" for="diet_gf">Gluten-Free</label>
                        </div>
                    </div>
                </details>

                <!-- Occasion Filter -->
                <details class="mb-3">
                    <summary class="fw-bold">Occasion</summary>
                    <div class="mt-2">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="ramadan" id="occ_ramadan" {{ in_array('ramadan', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_ramadan">Ramadan</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="eid" id="occ_eid" {{ in_array('eid', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_eid">Eid</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="party" id="occ_party" {{ in_array('party-', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_party">Party</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="family" id="occ_family" {{ in_array('family', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_family">Family</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="special" id="occ_special" {{ in_array('special', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_special">Special</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="anniversary" id="occ_anniversary" {{ in_array('anniversary', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_anniversary">anniversary</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="wedding" id="occ_wedding" {{ in_array('wedding', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_wedding">Wedding</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" name="occasion[]" value="everyday" id="occ_everyday" {{ in_array('everyday', $occasion) ? 'checked' : '' }}>
                            <label class="form-check-label" for="occ_everyday">Everyday</label>
                        </div>
                    </div>
                </details>
            </aside>
            <details class="mb-3">
                <summary class="fw-bold">Duration & Hardship</summary>
                <div class="mt-2">
                    <div class="form-check mb2">
                        <input class="form-check-input" type="radio" name="duration" value="over30" id="over30" {{ $duration ==='over30' ? 'checked' : '' }}>
                        <label class="form-check-label" for="over30">Over 30min</label>
                    </div>
                    <div class="form-check mb2">
                        <input class="form-check-input" type="radio" name="duration" value="less30" id="less30" {{ $duration ==='less30' ? 'checked' : '' }}>
                        <label class="form-check-label" for="less30">Less 30min</label>
                    </div>
                    <div class="form-check mb2">
                        <input class="form-check-input" type="checkbox" name="level[]" value="easy" id="easy" {{ in_array('easy', $level) ? 'checked' : '' }}>
                        <label class="form-check-label" for="easy">Easy/Medium</label>
                    </div>
                </div>
            </details>

            <button type="submit" class="btn btn-sm btn-outline-primary mt-2 w-100">Apply Filters</button>
            
            <!-- Optional: Clear Filters Button -->
            @if(request()->anyFilled(['search', 'category', 'dietary', 'occasion','duration','level']))
                <a href="{{route('showAllRecipes.auth') }}" class="btn btn-sm btn-outline-secondary mt-2 w-100">
                    Clear All Filters
                </a>
            @endif
        </form>
    </div>
</div>

            <!-- Recipe Cards -->
            <div class="col-lg-9">
                @if($recipes->isEmpty())
                    <div class="text-center py-5">
                        <p class="text-muted">No recipes found. Try adjusting your search.</p>
                    </div>
                @else
                    <div class="row g-4">
                        @foreach($recipes as $recipe)
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 shadow-sm">
                                    @if($recipe->photo_path)
                                        <img
                                            src="{{ asset('storage/' . $recipe->photo_path) }}"
                                            alt="{{ $recipe->title }}"
                                            class="card-img-top"
                                            style="height: 160px; object-fit: cover;"
                                        >
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" style="height:160px;">
                                            <span class="text-muted">No image</span>
                                        </div>
                                    @endif
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title">{{ Str::limit($recipe->title, 30) }}</h5>
                                        <p class="text-muted small mb-2">
                                            By <strong><a href="{{ route('showUserProfile', $recipe['user_id']) }}">{{ $recipe->user->name ?? 'Anonymous' }}</a></strong>
                                        </p>
                                        <div class="mt-auto">
                                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-sm btn-outline-primary w-100">
                                                View Recipe
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $recipes->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>