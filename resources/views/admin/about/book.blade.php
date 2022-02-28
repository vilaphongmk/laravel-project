@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="my-3 text-center h3">Add books</div>
    <form action="{{route('admin.about.bookstore')}}" method="post">
        <div class="row">
            <div class="col-12  mb-3">
                <label for="">Name</label>
                <input name="name" value="{{old('name')}}" type="text" class="form-control">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        @csrf
        <div class="col-12 mb-3">
            <label for="">Author</label>
            <input name="Author" value="{{old('Author')}}" type="text" class="form-control">
            @error('Author')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-12  mb-3">
            <label for="">Content</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="10">{{old('content')}}</textarea>
            @error('content')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-12  mb-3">'
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>


@endsection