@extends('layouts.top-layout')

@section('content')

   @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            Request for new password
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.password.email') }}">
                {{ csrf_field() }}
                <div class="form-group">

                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
