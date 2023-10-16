@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <div class="card">
                <!--<div class="card-header">{{ __('Create Post') }}</div>-->
                    <div class="container" style="background-color: #FFADAD; color: white;" align="center" >
                        <h3><b>Admin Edit Kratooh</b></h3>
                    </div>
                        <div class="container">
                        @foreach($post as $post1)
                        @endforeach
                            <form method='POST' action="{{ route('ad.update.post',$post1->id_post) }}" enctype="multipart/form-data"><br>
                                @csrf
                                @error('category')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <!-- <label for="formFile" class="form-label"><b>&nbsp;Categories</label> -->
                                <div>
                                    <b>&nbsp;Categories</b>
                                    <b style="color: red;">*</b>
                                <div>
                                <div class="col-3">
                                    <select class="form-select" name="category" style="width: 400%">
                                        <option value="{{ $post1->id_category }}" align="center" selected >{{ $post1->name_category  }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id_category }}" align="center">{{ $category->name_category  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                @method("PUT")
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
                                    <input type="text" class="form-control w-100 " id="floatingInput"  name="title" value="{{$post1->title}}" placeholder="">
                                    <label for="floatingInput">title</label>
                                </div>
                                @error('content')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                <!-- <label for="formFile" class="form-label"><b>Details of your Kratoo</b></label> -->
                                <div>
                                    <b>&nbsp;Details of your Kratoo</b>
                                    <b style="color: red;">*</b>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="" id="floatingTextarea2" name="content" style="height: 100px" required autocomplete="content" autofocus>{{ old('content', $post1->content) }}</textarea>
                                    <label for="floatingTextarea2">Content</label>
                                </div>
                                @error('category')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
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
                                    <!-- <label for="formFile" class="form-label">&nbsp;Input Your Image.</label> -->
                                    <input class="form-control" type="file" id="formFile" name="image_post" >
                                    <div align="center">
                                    <br>
                                    <?php if ($post1->path_image == '') { ?>
                                            <p>No pictures in post</p>
                                    <?php }else{ ?>
                                        <img src="<?php echo asset($post1->path_image); ?>" style="width: 30%; height: 30%; border: solid 1px #CCC;" alt="Post Picture">
                                    <?php }?>
                                    </div>
                                </div>
                                <!-- <button class="btn btn-danger" type='reset'>ยกเลิก</button>&nbsp;&nbsp;<button class="btn btn-success" type='บันทึก'>ยกเลิก</button>-->
                                <div align="center">
                                    <input class="btn btn-danger btn-ls " type='reset' value="ยกเลิก">&nbsp;&nbsp;
                                    <input class="btn btn-success btn-ls " type='submit' value="บันทึก">
                                </div>
                            </form>
                    </div> 
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection