@extends('layout.parent')
@section('title','Trường Đại Học Thăng Long')

@section('content')

<div class="container">
    <div class="card" style="margin:20px;">
        <div class="card-header">Create New Users</div>
        <div class="card-body">

            <form action="{{url('/users')}}" method="post">
                {!! csrf_field()!!}
                <label>Name</label>
                <input type="text" name="name" id="name" class="form-control"></br>
                <label for="">Email</label>
                <input type="text" name="email" id="email" class="form-control"></br>
                <label for="">Age</label>
                <input type="text" name="age" id="age" class="form-control"></br>
                <label for="">Password</label>
                <input type="password" name="password" id="password" class="form-control"></br>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
</div>
@endsection
