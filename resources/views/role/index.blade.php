@extends('layouts.app')
@section('content')

<h1 class='text-center'>ລະບົບຈັດການສະມາຊີກ</h1>
<div class="container">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nmae</th>
                <th scope="col">Role</th>
                <th scope="col">created</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $key =>$val)
            <tr>
                <th scope="row">{{$val->id}}</th>
                <td>{{$val->name}}</td>
                <td>{{$val->role}}</td>
                <td>{{$val->created_at}}</td>
                <td>
                    <button class="btn btn-primary" href="{'/admin/role/update/'.$val->id}">ແກ້ໄຂ</button>
                    <button class=" btn btn-warning">ລົບ</button>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection