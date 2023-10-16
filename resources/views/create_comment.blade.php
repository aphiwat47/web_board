@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <div class="card">
                    <div class="card-header" style="background-color: #73B9D7; color: white;" align="center" ><h3><b>{{ __('Create Comment') }}</b></h3></div>
                        <div class="container"  style="background-color: #9DE6E8;">
                            <form method='POST' action="{{ route('comment.store',$id) }}" enctype="multipart/form-data"><br>
                                @csrf
                                @error('comment')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div>
                                    <b>&nbsp;Express your opinion</b>
                                    <b style="color: red;">*</b>
                                </div>
                                <div class="form-floating mb-3 ">
                                    <input type="text" class="form-control w-100 " id="floatingInput" required name="comment" placeholder="">
                                    <label for="floatingInput">comment</label>
                                </div>
                                @error('image_comment')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <div>
                                    <b>&nbsp;Input Your Image.</b><br>
                                    <b>&nbsp;Ex. .jpeg, .jpg, .png, .gif</b>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="formFile" name="image_comment" >
            
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