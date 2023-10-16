@extends('layouts.app')

@section('content')
<div class="container">
            <div class="card">
                <div class="card-header" style="background-color: #974EC3; color: white; " align="center" ><h5><b>{{ __('Admin search ') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                        <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                        <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                    </svg></b></h5>
                </div>
                <div class="card">
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

                    <div class="card">
                        <div class="card-header" style="background-color: #9D76C1; color: white; " align="left" >
                        <p align="center"><b> Search through the topic name</b></p><hr>
                        <p align="center"><b> Search through the creator name</b></p><hr>
                        <p align="center"><b> Search through the categories name or user name</b></p><hr>
                        <p align="center"><b> Search through the user email</b></p><hr>
                        <p align="center"><b> Search through the user id</b></p><hr>
                            <form action="{{ route('admin.search') }}" method="GET" align="center">
                                <input type="search" name="search" placeholder="Search Kratooh ....." class="form-control w-100">
                                <button class="btn btn-dark mt-2 " type="submit"><b>Search</b></button>
                            </form> 

                @if(isset($users))
                    <hr>
                    <center><h2><b>User</b></h2></center>
                    @if($users != '[]')  
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
                                    <?php $i=1;?>
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
                                            <a class='btn btn-outline-primary btn-md' style="color: black;" href="{{ route('manage.profile', $user->id) }}"><b>Data</b></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div align="center"style="background-color: ; width: 100%; height: 100%; text-align:center; color: white;">
                            <h5><b>User Not Found.</b></h5>
                        </div>
                    @endif
                            
                @endif
            
                @if(isset($posts))
                    <hr>
                       <center><h3><b>Kratooh</b></h3></center>
                    @if($posts != '[]')
                        <br>
                        @foreach($posts as $post)
                        <div class="card">
                            <div class="position-relative">
                                <div class="">
                                    <div class="card-header" style="background-color: #E5BEEC;" align="left" >
                                        <h5><img src="{{ asset($post->path_pic_profile) }}"  style=" width: 100px; height: 100px; border: solid 1px #CCC" alt="Profile Picture"/></h5>
                                    </div>
                                </div>
                                
                                <div class="position-absolute top-0 end-0">
                                    <div class="card-header" style="background-color: #917FB3; color: white;">
                                        <b>Creater : </b> {{ $post->name}} <br> 
                                        <b>Create On : </b>  {{ $post->time_update}} <br>  
                                        <b>Category : </b> {{ $post->name_category}}
                                    </div>
                                </div>

                                <div class="">
                                    <div class="card-body" style="background-color: #FDE2F3;" >
                                        <h5> <b>Title : </b> {{ $post->title }}</h5>
                                        <hr>
                                        <h5> <b>Content : </b> {{  $post->content }}</h5>
                                        <hr>
                                        <div align='center'>
                                        <?php if ($post->path_image != '') { ?>
                                                <img src="<?php echo asset($post->path_image); ?>"  style="width: 30%; height: 30%; border: solid 1px #CCC;" alt="Post Picture">
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                <a class='btn btn-primary btn-md' style=" width: 100%; color: white;" href = "{{ route ('ad.manage.comm',$post->id_post) }}">
                                    <b>Manage Comment</b>
                                </a>
                                </div>
                            </div>
                        </div>
                        <br>                    
                        @endforeach
                    @else
                        <div align="center"style="background-color: ; width: 100%; height: 100%; text-align:center; color: white;">
                            <h5><b>No Information Found.</b></h5>
                        </div>
                    @endif
                    
                @else

                @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
