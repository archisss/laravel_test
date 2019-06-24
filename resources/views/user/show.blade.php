@extends('home')

@section('content') 
<div class="container">
<h3 class="card-title">users</h3>
    @if($users[0]!='0')
        <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Service</th>
            <th>Status</th>
            <th>Change status</th>
        </tr>
        
        @foreach ($users as $user)
            @foreach($user->Services as $service_user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $service_user->name }}</td>
                    <td>{{ $user->status }}</td>
                    <td>
                        <form style="display: inline" method="POST" action="{{ route('user.update', $user->id) }}">
                        {!! csrf_field() !!}
                        {!! method_field('PATCH') !!}  
                        <input type="hidden" name="status" id="status" value="{{ $user->status }}" />
                        <button class="btn btn-primary" type="submit">Change Status</button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        @endforeach
        </table>       
    @endif
    
</div>
@endsection