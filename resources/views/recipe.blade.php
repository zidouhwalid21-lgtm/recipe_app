<x-layout>
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
                <a href="/recipes" class="btn btn-outline-primary me-2">Browse All Recipes</a>
                @guest
                    <a href="/register" class="btn btn-primary">Join to Save Favorites</a>
                @endguest
            </div>
        </div>

        <!-- Featured Recipes -->
        <section class="mb-5">
            <h2 class="text-center mb-4 fw-bold">Featured Recipes</h2>
            <p class="text-center text-muted">Loved by our community this week</p>

            <div class="row g-4">
                <!-- Recipe 1 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                            <span class="text-muted">Garlic Butter Shrimp</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Garlic Butter Shrimp</h5>
                            <p class="card-text text-muted">Ready in 15 minutes — perfect with pasta or rice.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-auto">View Recipe</a>
                        </div>
                    </div>
                </div>

                <!-- Recipe 2 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                            <span class="text-muted">Vegetable Stir Fry</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Vegetable Stir Fry</h5>
                            <p class="card-text text-muted">Colorful, healthy, and ready in under 20 minutes.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-auto">View Recipe</a>
                        </div>
                    </div>
                </div>

                <!-- Recipe 3 -->
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                            <span class="text-muted">Classic Chocolate Cake</span>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Classic Chocolate Cake</h5>
                            <p class="card-text text-muted">Rich, moist, and perfect for celebrations.</p>
                            <a href="#" class="btn btn-sm btn-outline-primary mt-auto">View Recipe</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="/recipes" class="text-primary text-decoration-none">See all recipes →</a>
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