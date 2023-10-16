@extends('layouts.app')

@section('content')
<div class="container"></div>

            <div class="card">
                <div class="card-header" style="background-color: #141E46; color: white; ">
                <center>
                    <h3>
                        <b>
                            <font color= white>A D M I N @ K r a t o o h B y G r o u p 1</font>
                        </b>
                    </h3>
                </center>
                </div>

                <div class="card-body" style="background-color: #1F4172; color: white;"><b> 
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($message = Session::get('success'))  
                        <div class="alert alert-success alert-block">     
                            <strong>{{ $message }}</strong>
                        </div>  
                    @endif

                    <!-- {{ __('You are logged in!') }}

                    You are admin user. -->
                    <div class="card-header" align="center">
                        <a class='btn btn-secondary btn-md' style="background-color: #6499E9; width: 30%;color: white;" href="{{ route('home')}}"><b>User home</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class='btn btn-secondary btn-md' style="background-color: #A084E8; width: 30%;color: white;" href="{{ route('category.home')}}"><b>Categories</b></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class='btn btn-secondary btn-md' style="background-color: #33BBC5; width: 30%;color: white;" href="{{ route('admin.search')}}"><b>Search</b></a>
                    </div>
                    <?php $i=1;?>
                </b>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordereds">
                        <thead>
                            <tr>
                                <th style="text-align:center" scope="col" class="table-dark">#</th>
                                <th style="text-align:center" scope="col" class="table-dark">Pic Profile</th>
                                <th scope="col" class="table-dark">Username</th>
                                <th scope="col" class="table-dark">Name</th>
                                <th scope="col" class="table-dark">Email</th>
                                <th style="text-align:center" scope="col" class="table-dark">Create at</th>
                                <th style="text-align:center" scope="col" class="table-dark">Manage</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($users as $user)
                            <tr class="">
                            <th style="text-align:center" scope="row" width="40"><b>{{ $i++ }}</b></th>
                                <td style="text-align:center" width="20%"> <img src="{{ asset($user->path_pic_profile) }}"  style=" width: 15%; height: 15%; border: solid 1px #CCC" alt="Profile Picture" /></td>
                                <td><b>{{$user->name}}</b></td>
                                @if($user->first_name != null||$user->last_name != null)
                                    <td><b>{{$user->first_name}}&nbsp;{{$user->last_name}}</td>
                                @else
                                    <td><b>{{'ไม่มีชื่อ'}}</b></td>
                                @endif
                                <td><b>{{$user->email}}</b></td>
                                <td style="text-align:center"><b>{{$user->created_at}}</b></td>
                                <td style="text-align:center">
                                    <a class='btn btn-outline-primary btn-md' style="color: black; width: 100%;" href="{{ route('manage.profile', $user->id) }}"><b>Data</b></a>
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
@endsection
