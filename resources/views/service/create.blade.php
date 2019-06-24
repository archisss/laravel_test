@extends('home')

@section('content')  
<div class="container">
<h3 class="card-title">Create new Service</h3>

    <form method="POST" action="{{ route('service.store') }}">
        @include('service.form')
        <button type="submit" class="btn btn-primary">Create new Service</button>
        @csrf
    </form>
</div>
@endsection