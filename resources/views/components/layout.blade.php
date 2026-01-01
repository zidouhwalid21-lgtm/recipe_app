<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Recipe App' }}</title>

    <!-- Bootstrap 5 CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optional: Add custom CSS later here -->
    <style>
        body { padding-top: 20px; }
    </style>
</head>
<body>
    <header class="container mb-4">
        <h2><a href="{{ route('home') }}" style="color:black ; text-decoration: none;">Welcome on board</a></h2>
        <nav>
            @guest  
                <a href="{{ route('show.register') }}" class="btn btn-link">Register</a>
                <a href="{{ route('show.login') }}" class="btn btn-link">Login</a>
            @endguest
                        

            @auth 
                <div class="mb-2">
                    <strong>Name:</strong> {{ Auth::user()->name }}<br>
                    <strong>Email:</strong> {{ Auth::user()->email }}
                </div>
                <div>
                    <strong><a href="{{ route('recipes.create') }}"> Create Recipe</a></strong>
                    <strong><a href="{{ route('recipes.index') }}"> User Interface</a></strong>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm">Log out</button>
                </form>
            @endauth
        </nav>
        <hr/>
    </header>

    <main class="container">
        {{ $slot }}
    </main>

    <!-- Optional: Bootstrap JS (needed only if you use modals, dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>