{{-- <x-layout>
    <h3>Title {{ $recipe['title'] }}</h3>
    <a href="{{ route('recipes.index') }}">Return</a>
    <div>
        <img src="{{ asset('storage/'. $recipe->photo_path) }}" alt="recipe-image" width="150px" height="150px">
        <p>{{ $recipe['ingredients'] }}</p>
    </div>
</x-layout> --}}

{{-- <x-layout title="{{ $recipe->title }} Recipe">

    <div class="container py-4">
        <h1>{{ $recipe->title }}</h1>
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary mb-4">← Back to Recipes</a>
         @if($recipe->user_id == Auth::user()->id)
        <a href="{{ route('recipes.edit', $recipe['id']) }}" class="btn btn-primary">Edit</a>
        @endif
        <div class="d-flex flex-column flex-md-row gap-4">
            <!-- Image -->
            @if($recipe->photo_path)
                <img 
                    src="{{ asset('storage/' . $recipe->photo_path) }}" 
                    alt="{{ $recipe->title }}" 
                    class="img-thumbnail" 
                    style="width: 150px; height: 150px; object-fit: cover;"
                >
            @else
                <div class="bg-light d-flex align-items-center justify-content-center" style="width:150px; height:150px;">
                    <span class="text-muted">No image</span>
                </div>
            @endif

            <!-- Ingredients -->
            <div>
                
                {{-- <p class="mb-0">{{ $recipe->ingredients }}</p> --}}
                {{-- <h5>Ingredients</h5>
<ul>
    @php
        // Get raw ingredients and clean it
        $raw = trim($recipe->ingredients);
        
        // Split by: commas, semicolons, newlines, or "and"
        $items = preg_split('/[\n,;]+/', $raw);
        
        // Clean each item: remove extra spaces, empty lines
        $items = array_filter(array_map('trim', $items), function($item) {
            return !empty($item);
        });
    @endphp

    @if(count($items))
        @foreach($items as $item)
            <li>{{ $item }}</li>
        @endforeach
    @else
        <li>No ingredients listed.</li>
    @endif
</ul>
                <p><strong>Author:</strong> {{ $recipe->user->name }}</p>
            </div>
        </div>
    </div>
</x-layout> --}} 

<x-layout title="{{ $recipe->title }} Recipe">
    <div class="container py-4">
        <!-- Back & Edit Buttons -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-outline-secondary">
                ← Back to Recipes
            </a>
            @if($recipe->user_id == Auth::id())
                <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil me-1"></i>Edit Recipe
                </a>
            @endif
        </div>

        <!-- Title -->
        <h1 class="mb-3">{{ $recipe->title }}</h1>

        <!-- Author & Metadata Bar -->
        <div class="d-flex flex-wrap gap-3 mb-4 text-muted small">
            <span>By <strong><a href="{{ route('showUserProfile', $recipe['user_id']) }}">{{ $recipe->user->name ?? 'Anonymous' }}</a></strong></span>
            <span>•</span>
            <span>{{ ucfirst($recipe->recipe_category) }}</span>
            <span>•</span>
            <span>{{ $recipe->cuisine }}</span>
            @if($recipe->prep_time_minutes)
                <span>•</span>
                <span>{{ $recipe->prep_time_minutes }} min</span>
            @endif
            <span>•</span>
            <span class="text-capitalize">{{ $recipe->difficulty }}</span>
        </div>

        <div class="row g-4">
            <!-- Large Recipe Image -->
            <div class="col-lg-6">
                @if($recipe->photo_path)
                    <img 
                        src="{{ asset('storage/' . $recipe->photo_path) }}" 
                        alt="{{ $recipe->title }}" 
                        class="w-100 rounded shadow-sm"
                        style="max-height: 400px; object-fit: cover;"
                    >
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded shadow-sm" style="height: 300px;">
                        <span class="text-muted">No image available</span>
                    </div>
                @endif
            </div>

            <!-- Recipe Details -->
            <div class="col-lg-6">
                <!-- Description -->
                @if($recipe->description)
                    <h5 class="mb-3">About This Recipe</h5>
                    <p class="text-muted">{{ $recipe->description }}</p>
                @endif

                <!-- Ingredients -->
                <h5 class="mb-3">Ingredients</h5>
                <ul class="list-group mb-4">
                    @php
                        $items = array_filter(array_map('trim', preg_split('/[\n,;]+/', trim($recipe->ingredients))));
                    @endphp
                    @if($items)
                        @foreach($items as $item)
                            <li class="list-group-item py-2">{{ $item }}</li>
                        @endforeach
                    @else
                        <li class="list-group-item text-muted">No ingredients listed.</li>
                    @endif
                </ul>

                <!-- Dietary & Occasion Badges -->
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @if($recipe->is_vegetarian)
                        <span class="badge bg-success">Vegetarian</span>
                    @endif
                    @if($recipe->is_vegan)
                        <span class="badge bg-success">Vegan</span>
                    @endif
                    @if($recipe->is_halal)
                        <span class="badge bg-info">Halal</span>
                    @endif
                    @if($recipe->is_gluten_free)
                        <span class="badge bg-warning text-dark">Gluten-Free</span>
                    @endif
                    <span class="badge bg-secondary">{{ ucfirst(str_replace('_', ' ', $recipe->occasion)) }}</span>
                </div>
            </div>
        </div>

        <!-- Optional: Instructions section (if you add it later) -->
        <!-- <div class="mt-5">
            <h5>Instructions</h5>
            <p>{{ $recipe->instructions ?? 'No instructions provided.' }}</p>
        </div> -->
    </div>
</x-layout>