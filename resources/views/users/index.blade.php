{{-- 
@foreach ($users as $user) 
   <p> {{$user->name}}</p>
@endforeach --}}

{{-- Kế thừa trong Laravel --}}
@extends('layout.parent')
@section('title','Trường Đại Học Thăng Long')

@section('content')
   <div class="container">
      <div class="row" style="margin: 20px">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <h2>CRUD</h2>
               </div>
               <div class="card-body">
                  <a href="{{url('/users/create')}}" class="btn btn-success btn-sm" title="Add new User">
                     Add New
                  </a>
                  </br>
                  </br>
                  <div class="table-responsive">
                     <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           @foreach($users as $user)
                          <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->age}}</td>
                         <td>
                                 <a href="{{url('/users/'.$user->id)}}" title="View User"><button type="button" class="btn btn-info">Info</button></a>
                                 <a href="{{url('/users/' .$user->id .'/edit')}}" title="Edit User"><button type="button" class="btn btn-primary">Edit</button></a>
                                 <form action="" method="post" accept-charset="UTF-8"style="display:inline">
                                    <a href="" title="Delete User"><button type="button" title="Delete User" class="btn btn-danger">Delete</button></a>
                                 </form>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection