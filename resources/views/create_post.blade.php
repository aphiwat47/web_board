@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <div class="card">
                <!--<div class="card-header">{{ __('Create Post') }}</div>-->
                    <div class="card-header" style="background-color: #73B9D7; color: white;" align="center" >
                        <h3><b>{{ __('Create Kratooh') }}</b></h3>
                    </div>
                        <div class="container"  style="background-color: #9DE6E8;">
                            <form method='POST' action="{{ route('post.store') }}" enctype="multipart/form-data"><br>
                                @csrf
                                @error('category')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div>
                                    <b>&nbsp;Categories</b>
                                    <b style="color: red;">*</b>
                                <div>
                                <div class="col-3" >
                                    <select class="form-select" name="category" style="width: 400%" >
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id_category }}" align="center">{{ $category->name_category  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                @error('title')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror                         
                                <div>
                                    <b>&nbsp;Specify the name of your topic, for example, when was the Faculty of Information Science founded? Who knows?</b>
                                    <b style="color: red;">*</b>
                                </div>
                                <div class="form-floating mb-3 ">   
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="title" placeholder="">
                                    <label for="floatingInput">title</label>
                                </div>
                                @error('content')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div>
                                    <b>&nbsp;Details of your Kratoo</b>
                                    <b style="color: red;">*</b>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="" id="floatingTextarea2" name="content" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Content</label>
                                </div>
                                @error('image_post')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div>
                                    <b>&nbsp;Input Your Image.</b><br>
                                    <b>&nbsp;Ex. .jpeg, .jpg, .png, .gif</b>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile" name="image_post" >
            
                                </div>
                                <!-- <button class="btn btn-danger" type='reset'>ยกเลิก</button>&nbsp;&nbsp;<button class="btn btn-success" type='บันทึก'>ยกเลิก</button>-->
                                <div align="center">
                                    <input class="btn btn-danger btn-ls " type='reset' value="ยกเลิก">&nbsp;&nbsp;
                                    <input class="btn btn-success btn-ls " type='submit' value="บันทึก">
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