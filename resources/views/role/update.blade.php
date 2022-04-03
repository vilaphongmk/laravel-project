@extends('layouts.app')
@section('content')

<div class="container">
    <div class="h3 mb-3 text-center">ແກ້ໄຂ ຂໍ້ມູນສະມາຊີກ</div>
    <form action="{{route('admin.role.update')}}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" value="{{$user->id}}" name="slug">
            <div class="col-md-6 mb-3">
                <label for="">Name</label>
                <input type="text" value="{{$user->name}}" class="form-control" name="name">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Phone</label>
                <input type="number" value="{{$user->phone}}" class="form-control" name="phone">
                @error('phone')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Status</label>
                <select name="status" id="" class="form-select">
                    <option {{ $user -> status ==='open'? 'selected' : ''}} value="open">open</option>
                    <option {{ $user -> status ==='close'? 'selected' : ''}} value="close">close</option>
                </select>
                @error('status')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Role</label>
                <select name="role" id="" class="form-select">
                    <option {{ $user -> role ==='admin'? 'selected' : ''}} value="Admin">Admin</option>
                    <option {{ $user -> role ==='member'? 'selected' : ''}} value="Member">Member</option>
                </select>
                @error('role')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary ">Update</button>
            </div>
        </div>
    </form>
</div>


@endsection