<x-layout title="Recipe Blog">
    <!-- Optional: Include Bootstrap CSS if not already in your layout -->
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <div class="container py-5">
        <!-- Hero Banner -->
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold text-primary">Discover Delicious Recipes</h1>
            <p class="lead text-muted mt-3">
                Homemade meals, chef-inspired dishes, and quick fixes for busy days — all in one place.
            </p>
            <div class="mt-4">
                @guest
                <a href="/login" class="btn btn-outline-primary me-2">Browse All Recipes</a>
                
                    <a href="/register" class="btn btn-primary">Join to Save Favorites</a>
                @endguest
                @auth
                <a href="/fullRecipes-user" class="btn btn-outline-primary me-2">Browse All Recipes</a>

                @endauth
            </div>
        </div>

        <!-- Featured Recipes -->
        <section class="mb-5">
            <h2 class="text-center mb-4 fw-bold">Featured Recipes</h2>
            <p class="text-center text-muted">Loved by our community this week</p>

            <div class="row g-4">
               {{-- @foreach($recipes as $recipe)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <!-- Recipe Image -->
                            @if($recipe->photo_path)
                                <img 
                                    src="{{ asset('storage/' . $recipe->photo_path) }}" 
                                    class="card-img-top" 
                                    alt="{{ $recipe->title }}"
                                    style="height: 180px; object-fit: cover;"
                                >
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                                    <span class="text-muted">No image</span>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $recipe->title }}</h5>
                                

                                <div class="mt-auto">
                                    <a href="{{ route('recipes.show', $recipe['id']) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    {{-- @auth
                                    <a href="{{ route('recipes.edit', $recipe['id']) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                                    <form 
                                        action="{{ route('recipes.delete', $recipe['id']) }}" 
                                        method="POST" 
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this recipe?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    @endauth --}}
                               {{-- </div>
                            </div>
                        </div>
                    </div>
                @endforeach --}}
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
                
                {{-- Short description with ... if truncated --}}
                @if($recipe->description)
                    <p class="text-muted small mb-2">
                        {{ Str::limit($recipe->description, 80) }}
                    </p>
                @endif

                {{-- Author name --}}
                <p class="text-muted small mb-2">
                    <strong>By:</strong> <a href="{{ route('showUserProfile', $recipe['user_id']) }}">{{ $recipe->user->name ?? 'Anonymous' }}</a>
                </p>

                {{-- Your existing ingredients parsing (kept as comment or logic) --}}
                {{-- 
                <ul>
                    @php
                        $raw = trim($recipe->ingredients);
                        $items = preg_split('/[\n,;]+/', $raw);
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
                --}}

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

            
        </section>

        <!-- Call to Action -->
        <div class="text-center p-4 bg-light rounded">
            <p class="mb-0">
                🍳 <strong>Create an account</strong> to save your favorite recipes, rate dishes, and share your own creations!
            </p>
        </div>
    </div>

    <!-- Optional: Bootstrap JS (only if you use dropdowns/modals later) -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @endpush
</x-layout>