<x-layout>
    <div class="container py-4">
        <h2 class="mb-4">Create a New Recipe</h2>
        <hr class="mb-4">

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    class="form-control @error('title') is-invalid @enderror" 
                    required
                    placeholder="e.g. Garlic Butter Shrimp"
                >
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label fw-bold">Ingredients</label>
                <textarea 
                    name="ingredients" 
                    id="ingredients" 
                    class="form-control @error('ingredients') is-invalid @enderror" 
                    rows="4"
                    placeholder="List ingredients, one per line or separated by commas"
                ></textarea>
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="photo_path" class="form-label fw-bold">Photo (Optional)</label>
                <input 
                    type="file" 
                    id="photo_path" 
                    name="photo_path" 
                    class="form-control @error('photo_path') is-invalid @enderror"
                    accept="image/jpeg,image/png,image/gif"
                >
                @error('photo_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text text-muted">
                    Supported: JPG, PNG, GIF (max 2MB)
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Recipe</button>
                <a href="{{ route('recipes.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>