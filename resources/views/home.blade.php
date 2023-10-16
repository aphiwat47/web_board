@extends('layouts.app')

@section('content')

<div class="container">
    <div align='right'>
        <a class='btn btn-dark' href = "{{ route ('home.search') }}" style=" width: 35%; color: white;"><b>
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
          <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
          <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
        </svg>
        Search Kratooh
        </b>
        </a>
    </div>
    <div class="card">
         <!-- <div class="card-header" style="background-color: #4B527E; color: white; " align="center" ><h3><b>{{ __('Kratooh By Group-1') }}</b></h3> -->
         <div class="card-header" style="background-color: #F1B4BB; " align="center" >
         <h3><b>
            <font color= white>K r a t o o h B y G r o u p 1</font>
        </b></h3>

         </div>
            <div class="card-body" style="background-color: #FDF0F0; color: white; "><b>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if ($message = Session::get('errorpath'))
                    <div  style="color:red;" align="center" class="alert-alert-error alert-block">
                        <strong>{{$message }}</strong>
                    </div>
                @endif  
                @if ($message = Session::get('success'))  
                    <div class="alert alert-success alert-block">  
                        <strong>{{ $message }}</strong>  
                    </div>  
                @endif

                @if(isset($error))
                    <h3 style="color:red;"><b>*** Please add complete personal information on the Profile page. ***
                        <a class="btn btn-danger" style="color:white;" href="{{ route('profile.show',Auth::user()->id) }}" ><b>Click Here</b><a/>
                    </h3>
                @endif
                
                @if ($message = Session::get('error'))
                    <div  style="color:red;" align="center" class="alert-alert-error alert-block">
                        <strong>{{$message }}</strong>
                    </div>
                @endif  

                <!-- {{ __('You are logged in!') }}

                You are nomal user. -->
               
                
                </b>
                <div align="right">
                    <a class='btn btn-dark btn-md' style="background-color: #001C30;" href = "{{ route('post.create') }}"><b>
                    Create New Kratooh
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </b></a>
                    <br>
                    <br>
                </div>
                
                @foreach($new_post as $post)
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
                            <div class="card-body" style="background-color: #FDE2F3;">
                                <h5> <b>Title : </b> {{ $post->title }}</h5>
                                <hr>
                                <h5> <b>Content : </b> {{  $post->content }}</h5>
                                <hr>
                                <div align='center'>
                                <?php if($post->path_image != ''){
                                    echo "<img src='$post->path_image' style=' width: 30%; height: 30%; border: solid 1px #CCC' alt='Post Picture'/>";  
                                } ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card-header" style="background-color: #419197;" align="left" > -->
                        <!-- <div class="position-absolute bottom-0 end-0" > -->
                        <div>
                        <i class="bi bi-body-text">
                            <a class='btn btn-dark' style=" width: 100%; height: 100%; text-align:center; color: white;" href = "{{ route ('comment.index',$post->id_post) }}"><b>
                            Comment
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-square-dots-fill" viewBox="0 0 16 16">
                              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            </b>
                            </a>
                        </i>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
