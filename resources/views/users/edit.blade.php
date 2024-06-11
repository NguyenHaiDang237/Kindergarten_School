@extends('layout.parent')
@section('content')

    <div class="card" style="margin: 20px">
        <div class="card-header">Edit Student</div>
        <div class="card-body">

            <form action="{{url('users/'.$users->id)}}" method="post">
                {!! csrf_field()!!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$users->id}}">
                <label>Name</label>
                <input type="text" name="name" id="name" value="{{$users->name}}" class="form-control"></br>
                <label for="">Email</label>
                <input type="text" name="email" id="email" value="{{$users->email}}" class="form-control"></br>
                <label for="">Age</label>
                <input type="text" name="age" id="age" value="{{$users->age}}" class="form-control"></br>
                <label for="">Password</label>
                <input type="password" name="password" id="password" value="{{$users->password}}" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>
        </div>
    </div>

@stop
