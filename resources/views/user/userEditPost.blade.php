<x-layout title="Edit my Recipe">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit Recipe</h2>
            <a href="{{ route('recipes.index') }}" class="btn btn-sm btn-outline-secondary">← Back to Recipes</a>
        </div>
        <hr>

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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

                <!-- Show current image if exists -->
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
                    Supported: JPG, PNG, GIF (max 2MB). Leave blank to keep current photo.
                </div>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update Recipe</button>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>