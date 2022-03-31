@extends('layouts.admin')
@section('content')
{{ Illuminate\Foundation\Application::VERSION }}
<div class="container">
    <h1 class="text-center">Hello Admin index Page</h1>
    <a href="{{route('admin.about.form')}}" class="btn btn-primary">Add</a>

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
                    <button type="button" class="btn btn-danger btn_remove" data_id="{{($row->id)}}" data_name="{{($row->name)}}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ລົບ
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal -->
    <form action="{{route('admin.about.remove')}}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ລົບຂໍ້ມູນໜັງສື</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-danger text-center h3">ທ່ານຕ້ອງການລົບຂໍ້ມູນແທ້ບໍ່?</div>
                        <input type="hidden" name="id" id="form_id" class="form-control">
                        <input type="text" disabled id="form_name" class="form-control">
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

@section('script')
<script>
    $('.btn_remove').click(function() {
        //get value
        let id = $(this).attr('data_id');
        let name = $(this).attr('data_name');
        //set value
        $('#form_id').val(id);
        $('#form_name').val(name);

    })
</script>

@endsection