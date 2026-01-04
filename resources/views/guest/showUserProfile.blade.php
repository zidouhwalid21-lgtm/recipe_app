<x-layout title="{{ $user->name }} Profile">
     <div class="row g-4">
                @foreach($data as $recipe)
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
                                    @auth
                                    @if($recipe->user->id == Auth::id())
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
                                    @endif
                                    @endauth
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
</x-layout>