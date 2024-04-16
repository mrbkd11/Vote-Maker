@extends('app')
@section('content')
@auth
<p>Welcome<b>{{ Auth::user()->name }} </b></p>
<a href="{{route('password')}}">change Password</a>
<a class="btn btn-danger" href="{{route('logout')}}">logout</a>

@endauth
@guest
<a class="btn btn-primary" href="{{route('login')}}">Login</a>
<a class="btn btn-info" href="{{route('register')}}">Register</a>
@endguest
@endsection
 