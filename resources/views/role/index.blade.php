@extends('layouts.app')
@section('content')


<div class="container">
    <h1 class='text-center'>ລະບົບຈັດການສະມາຊີກ</h1>
    @if(Session::get('success'))
    <div class="alert alert-success">{{(Session::get('success'))}}</div>
    @endif
    @if(Session::get('error'))
    <div class="alert alert-success">{{(Session::get('error'))}}</div>
    @endif
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
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
                    <a class="btn btn-primary" href="{{url('/role/update/'.$val->id)}}">ແກ້ໄຂ</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn_delete" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="{{$val->id}}" data-name="{{$val->name}}">
                        ລົບ
                    </button>

                    <button type="button" class="btn btn-danger btn_sweet" data-id="{{$val->id}}" data-name="{{$val->name}}">sweet delete</button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Modal -->
<form action="{{route('admin.delete.user')}}" method="post">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">ທ່ານຕ້ອງການລົບແທ້ບໍ່?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" disabled value="" id="ShowName" class="form-control">
                    <input type="hidden" name="id" value="" id="ShowId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


@section('script')
<script>
    $(document).ready(function() {
        // $('.btn_delete').click(function() {
        //     let id = $(this).attr('data-id');
        //     let name = $(this).attr('data-name');

        //     $('#ShowName').val(name);
        //     $('#ShowId').val(id);

        // })

        $('.btn_sweet').click(function() {

            let id = $(this).attr('data-id');
            let name = $(this).attr('data-name');
            // console.log(id, name);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be delete !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('admin.delete.user.ajax') }}",
                        method: "post",
                        data: {
                            id: id
                        },
                        success: function(res) {

                            let arr = res.trim().split('|')
                            let status = arr[0];
                            let text = arr[1];
                            Notice(status, text);
                            if (status === 'success') {
                                location.reload()
                            }
                            // console.log(status);
                        }
                    });
                }
            })
        })

        function Notice(icon, text) {
            Swal.fire({
                icon: icon,
                title: text,
                timer: 1500
            })
        }


    });
</script>


@endsection