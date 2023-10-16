@extends('layouts.app')

@section('content')
<div class="container"></div>
            <div class="card"> 
                <div class="card-body" style="background-color: #4F709C; color: white;"><b> 
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
                    
                    <?php $i=1;?>
                </b>
                <div align="right">
                    <a class='btn btn-dark btn-md' style="background-color: #001C30;" href = "{{ route('category.create') }}"><b>
                    Create New Category
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </b></a>
                    <br>
                    <br>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-hover table-bordereds">
                        <thead>
                            <tr>
                                <th style="text-align:center" scope="col" class="table-dark">#</th>
                                <th style="text-align:center" scope="col" class="table-dark">Category</th>
                                <th style="text-align:center" scope="col" class="table-dark">Manage</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="">
                            <th style="text-align:center" scope="row" width="40"><b>{{ $i++ }}</b></th> 
                            <td style="text-align:center"><b>{{$category->name_category}}</b></td>
                            <td style="text-align:center;">
                                <a class='btn btn-outline-info btn-md' style="width: 100%; color: black;" href="{{ route('category.edit', $category->id_category) }}">
                                    <b>Edit</b>
                                </a>
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
