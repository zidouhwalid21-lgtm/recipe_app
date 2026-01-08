<x-layout>
    <h2>
        register
    </h2>
    <form action="{{route('register')}}" method="POST">
        @csrf

        <h2>Register for an account</h2>
        <label for="name">Name:</label>
        <input type="text" name="name" required value="{{old('name')}}">
        <label for="email">Email:</label>
        <input type="email" name="email" required value="{{old('email')}}">
        <label for="password">Password:</label>
        <input type="password" name="password" require>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" require>
        <button type="submit">Register </button>
        <!-- Validation errors -->
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
</x-layout> 