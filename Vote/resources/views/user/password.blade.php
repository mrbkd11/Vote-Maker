@extends('app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
            @endif
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <form method="POST" action="{{ route('password.action')}}">
                @csrf
                <div class="mb-3">
                    <label>Old password<span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="old_password" />
                </div>
                <div class="mb-3">
                    <label>New password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="new_password"/>
                </div>
                <div class="mb-3">
                    <label>New password confirmation<span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="new_password_confirmation" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">change</button>
                    <a  class="btn btn-danger" href="{{ route('home')}}">back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
