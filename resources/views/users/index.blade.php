@extends('layouts.app');

@section('content')

<div class="card card-default">
    <div class="card-header">
        User
    </div>
    <div class="card-body">
        @if ($users->count()>0)


        <table class="table table-bordered">
            <thead>
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
            </thead>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if (!$user->isAdmin())
                    <form action="{{route('users.makeadmin',$user->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Make Admin</button>
                    </form>
                    @endif
                </td>
            </tr>

            @endforeach
        </table>
        @else
        <h3>No users</h3>
        @endif
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete-form').on('submit',function(){
            if(confirm("ต้องการจะลบหรือไม่")){
                return true;
            }else{
                return false;
            }
        })
    })

</script>
@endsection
