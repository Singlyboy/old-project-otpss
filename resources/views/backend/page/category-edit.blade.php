@extends('backend.master')


@section('content')


<form action="{{route('category.update',$allCategory->id)}}" method="post">
@csrf
  <div class="form-group">
    <label for="name">Enter Category Name</label>
    <input value="{{$allCategory->name}}" name="cat_name" required type="text" class="form-control" id="name" placeholder="Enter Category Name">
  </div>

  <div class="form-group" style="margin-top: 10px;">
    <label for="name">Enter Description</label>
   <textarea class="form-control" name="cat_description" id="" placeholder="Enter Description"></textarea>
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection