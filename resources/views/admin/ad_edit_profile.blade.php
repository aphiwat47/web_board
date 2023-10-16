@extends('layouts.app')

@section('content')

<div class="container">
    <!-- <div class="row justify-content-center">
        <div class="col-md-8"> -->
            <div class="card">
                <!--<div class="card-header">{{ __('Create Post') }}</div>-->
                    <div class="container" style="background-color: #FFADAD; color: white;" align="center" >
                        <h3><b>Admin Edit Profile</b></h3>
                    </div>
                    <div class="container">
                    <div class="row justify-content-center">
                        <div class="card">
                        @foreach($data as $data1)
                        @endforeach
                            <form method='POST' action="{{route('ad.update.profile',$data1->id)}}"  enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <br>
                                @error('image_profile')
                                    <div class="my-2" >
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                
                                <div align="center">
                                    <div class="circle" >
                                        <img src="{{ asset($data1->path_pic_profile) }}"  style=" width: 100%; height:100%; border: solid 1px #CCC" alt="Profile Picture"/>
                                    </div>
                                </div>
                                <br>
                                @error('name')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="name" placeholder="" value="{{$data1->name}}">
                                    <label for="floatingInput">Alias / Username <b style="color: red;">*</b></label>
                                </div>
                                @error('fname')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="fname" placeholder="" value="{{$data1->first_name}}">
                                    <label for="floatingInput">Firstname <b style="color: red;">*</b></label>
                                </div>
                                @error('lname')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="lname" placeholder="" value="{{$data1->last_name}}">
                                    <label for="floatingInput">Lastname <b style="color: red;">*</b></label>
                                </div>
                                @error('date_of_birth')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-floating mb-3 ">
                                    <input type="date" class="form-control w-100 " id="floatingInput"  name="date_of_birth" placeholder="" value="{{$data1->date_of_birth}}">
                                    <label for="floatingInput">Date of birth <b style="color: red;">*</b></label>
                                </div>

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">&nbsp;Input Your Image Profile.</label>
                                    <input class="form-control" type="file" id="formFile" name="image_profile" >
                                </div>

                                <div align="center">
                                <br>
                                <input class="btn btn-danger btn-md " type='reset' value="ยกเลิก">&nbsp;&nbsp;
                                <input class="btn btn-success btn-md " type='submit' value="บันทึก">
                                </div>
                            </form>
                            <br>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection