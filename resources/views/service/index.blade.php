@extends('home')

@section('content')  
<div class="container">
<h3 class="card-title">Services</h3>
<a href="{{ url('service/create')}}"> Add new service</a>
    @if($services[0]!='0')
        <table>
        <tr>
            <th>Name</th>
            <th>Status</th>
        </tr>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->name }}</td>
                <td>{{ $service->status }}</td>
                <td><a href="{{ url('service/'.$service->id.'/edit')}}"> Edit</a></td>
                <td>
                    <form style="display: inline" method="POST" action="{{ route('service.destroy', $service->id) }}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}  
                    <button class="btn btn-primary" type="submit">Delete</button>
                    </form>
                </td> 
            </tr>
        @endforeach
        </table>
   
       
    @endif
    
</div>
@endsection