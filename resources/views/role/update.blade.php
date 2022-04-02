@extends('layouts.app')
@section('content')
<p class='text-center'>Update Role</p>
<div class="container">
    <div class="h3 mb-3">ແກ້ໄຂ ຂໍ້ມູນສະມາຊີກ</div>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="">name</label>
                <input type="text" value="{{$user->name}}" class="form-controller">
            </div>
        </div>
    </form>
</div>


@endsection