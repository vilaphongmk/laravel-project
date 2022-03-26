@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="my-3 text-center h3">ເພີ່ມຂ່າວໃໝ່</div>
    @if(Session::has('success'))
    <div class="alert alert-success text-center">
        {{Session::get('success')}}
    </div>

    @endif
    <form action="{{route('Addnews')}}" method="post">
        <div class="row">
            <div class="col-12  mb-3">
                <label for="">Name</label>
                <input name="name" type="text" class="form-control">
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        @csrf
        <div class="col-12 mb-3">
            <label for="">Author</label>
            <input name="author" type="text" class="form-control">
            @error('author')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-12  mb-3">
            <label for="">Content</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="10"> </textarea>
            @error('content')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-12  mb-3">'
            <button type="submit" class="btn btn-primary">ເພີ່ມຂ່າວ</button>
        </div>

    </form>
</div>


@endsection