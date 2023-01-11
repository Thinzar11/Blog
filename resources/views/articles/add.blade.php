@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('info'))
    <h6 class="alert alert-info">{{session('info')}}</h6>
    @endif

    @if ($errors->any())
    <div class="alert alert-warning">
        <ol>
        @foreach ($errors->all() as $err)
            <li>{{$err}}</li>
        @endforeach
        </ol>
    </div>

    @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
       <div class="mb-3">
        <label for="">Title</label>
        <input type="text" name="title" class="form-control">
       </div>

       <div class="mb-3">
        <label for="">Body</label>
        <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
       </div>

       <div class="mb-3">
        <label for="">Photo</label>
        <input type="file" name="photo" class="form-control">
       </div>

       <div class="mb-3">
        <label for="">Category</label>
        <select name="category_id"  class="form-control">
            @foreach ($category as $cat )
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
       </div>

       <div class="mb-3">
        <label for="">User</label>
        <select name="user_id" class="form-control">
            @foreach ($user as $ur)
            <option value="{{$ur->id}}">{{$ur->name}}</option>
            @endforeach
        </select>
       </div>

       <input type="submit" value="Create Blog" class="btn btn-primary">
    </form>
</div>
@endsection
