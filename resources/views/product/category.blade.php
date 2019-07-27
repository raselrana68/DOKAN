@extends('layouts/app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header bg-success text-light">
                    Product Category
                </div>
                <div class="card-body">
                    
                    @if (session('delete'))
                    <div class="alert alert-danger">
                        {{ session('delete')}}
                    </div>
                    @endif
                    
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">created at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>   
                                    <td>{{ $category->category_name }}</td>   
                                    <td>{{ $category->created_at }}</td>   
                                </tr>
                                @empty
                                <tr class="text-center text-danger">
                                    <td colspan="3"> No categories available </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-4">
            <div class="card">
                <div class="card-header bg-info text-light">
                    <label class="offset-3" for="">Add Category <label>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status')}}
                        </div>
                        @endif
                        
                        @if($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{url('add/category/insert')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" class="form-control" placeholder="Enter category name" name="category_name">
                            </div>
                            <div >
                                <button  type="submit" class="btn btn-primary offset-4">Save Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection