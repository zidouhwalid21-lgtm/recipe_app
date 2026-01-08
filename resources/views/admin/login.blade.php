<x-admin>
    <h2>login</h2>
    <form action="{{route('post.login')}}" method="POST">
        @csrf

        <h2>Admin Login to your account</h2>
        <label for="email">Email:</label>
        <input type="email" name="email" required value="{{old('email')}}">
        <label for="password">Password:</label>
        <input type="password" name="password" require>
        <button type="submit">Log In</button>

        <!-- Validation errors -->
         @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-admin>