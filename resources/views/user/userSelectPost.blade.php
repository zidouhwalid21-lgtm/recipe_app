{{-- <x-layout>
    <h3>Title {{ $recipe['title'] }}</h3>
    <a href="{{ route('recipes.index') }}">Return</a>
    <div>
        <img src="{{ asset('storage/'. $recipe->photo_path) }}" alt="recipe-image" width="150px" height="150px">
        <p>{{ $recipe['ingredients'] }}</p>
    </div>
</x-layout> --}}

<x-layout title="{{ $recipe->title }} Recipe">

    <div class="container py-4">
        <h1>{{ $recipe->title }}</h1>
        <a href="{{ route('recipes.index') }}" class="btn btn-sm btn-outline-secondary mb-4">← Back to Recipes</a>

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
                <h5>Ingredients</h5>
                <p class="mb-0">{{ $recipe->ingredients }}</p>
                <p><strong>Author:</strong> {{ $recipe->user->name }}</p>
            </div>
        </div>
    </div>
</x-layout>