@extends('layouts.admin')
@section('content')
<h1>Hello Home Page</h1>
<a href="{{route('admin.about.form')}}">Add</a>
<a href="{{route('admin.about.book')}}">Add Book</a>

@endsection