@extends('layouts.app')

@section('content')
<div class="container">
    <!-- <div class="row justify-content-center"> -->
        <!-- <div class="col-md-8"> -->
            <div class="card">
                    <div class="card-header" style="background-color: #73B9D7; color: white;" align="center" ><h3><b>{{ __('Admin Create Category') }}</b></h3></div>
                        <div class="container"  style="background-color: #9DE6E8;">
                <form method='POST' action="{{ route('category.store') }}" ><br>
                    @csrf
                    @error('category')
                        <div class="my-2">
                            <span class="text-danger">{{$message}}</span>
                        </div>
                    @enderror
                    <div>
                        <b>&nbsp;New Category</b>
                        <b style="color: red;">*</b>
                    </div>
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control w-100 " id="floatingInput" required name="category" placeholder="">
                        <label for="floatingInput">Category</label>
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