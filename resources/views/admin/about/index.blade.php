@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Hello Home Page</h1>
    <a href="{{route('admin.about.form')}}">Add</a>
    <a href="{{route('admin.about.book')}}">Add Book</a>

    @if(Session::has('success'))
    <div class="alert alert-success text-center">
        {{Session::get('success')}}
    </div>

    @endif

    <table class='table'>
        <thead class='table-dark'>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>lname</th>
                <th>content</th>
                <th>created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{($row->id)}}</td>
                <td>{{($row->name)}}</td>
                <td>{{($row->lname)}}</td>
                <td>{{($row->content)}}</td>
                <td>{{($row->created_at)}}</td>
                <td>
                    <a class="btn btn-warning px-1" href="">ແກ້ໄຂ</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" onclick="removes('$row->id')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ລົບ
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal -->
    <form action="" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ລົບຂໍ້ມູນໜັງສື</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-danger text-center h3">ທ່ານຕ້ອງການລົບຂໍ້ມູນແທ້ບໍ່?</div>
                        <input type="text" disabled class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ຍົກເລີກ</button>
                        <button type="submit" class="btn btn-danger">ລົບ</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>



@endsection