{{-- <x-layout>
    <h2>User Interface</h2>
    <p>User see their posts here!</p>
    <hr>
    <div>
        @foreach ($recipes as $recipe )
        <figure>
            <img src="{{ asset('storage/'. $recipe->photo_path) }}" alt="recipe-image" width="150px" height="150px">
            <figcaption>
                <strong>Title {{ $recipe['title'] }}</strong>
                <strong><a href="userSelectPost-recipes/{{ $recipe['id'] }}">View Details</a></strong>
            </figcaption>
            <a href="userEditPost-recipes/{{ $recipe['id'] }}">Edit</a>
            <form action="{{ route('recipes.delete', $recipe->id) }}" method="post">
                @csrf
                @method('DELETE')
            <button type="submit">
                Delete
            </button>
            </form>
        </figure>
        @endforeach
    </div>
</x-layout> --}}
<x-layout title="My Recipes">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>My Recipes</h2>
            <a href="{{ route('recipes.create') }}" class="btn btn-primary">+ Add New Recipe</a>
        </div>
        <p class="text-muted">Manage your personal recipes here.</p>
        <hr>

        @if($recipes->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted">You haven't created any recipes yet.</p>
                <a href="{{ route('recipes.create') }}" class="btn btn-outline-primary">Create Your First Recipe</a>
            </div>
        @else
            <div class="row g-4">
                @foreach($recipes as $recipe)
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
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>