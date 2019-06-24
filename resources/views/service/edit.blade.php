@extends('home')

@section('content')  
<div class="container">
<h3 class="card-title">Edit Service</h3>
    
    <form method="POST" action="{{ route('service.update', $service->id) }}">
        @include('service.form')
        @method('PATCH')
        <button type="submit" class="btn btn-primary">Update</button>
        @csrf
    </form>
</div>
@endsection