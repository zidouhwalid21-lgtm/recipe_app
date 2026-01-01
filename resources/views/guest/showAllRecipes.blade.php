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
            </form>
        </div>

        <div class="row">
            <!-- Sidebar Filters (optional: collapse on mobile) -->
            <div class="col-lg-3 mb-4 mb-lg-0">
                <div class="bg-light rounded p-3 h-100">
                    <h5 class="mb-3">Filters</h5>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="filter1">
                        <label class="form-check-label" for="filter1">Vegetarian</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="filter2">
                        <label class="form-check-label" for="filter2">Dessert</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="filter3">
                        <label class="form-check-label" for="filter3">Under 30 min</label>
                    </div>
                    <!-- Add more filters as needed -->
                    <button class="btn btn-sm btn-outline-primary mt-2 w-100">Apply Filters</button>
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
                                            By <strong>{{ $recipe->user->name ?? 'Anonymous' }}</strong>
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