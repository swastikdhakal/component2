@extends('layouts.app')
@section('title','Product Entry Form')
@section('content')
<div class="container">

<form method="POST" action="{{route('product.store')}}" style="width: 50%">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="type">Select type:</label>
    <select class="form-control" id="type" name="type">
      <option value="book">Book</option>
      <option value="cd">CD</option>
    </select>
    </div>

    <div class="form-group" >
      <label>Title</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label>First Name</label>
      <input type="text" class="form-control" name="fname">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" class="form-control" name="sname">
      </div>
      <div class="form-group">
        <label>Page/Duration</label>
        <input type="number" class="form-control" name="page">
      </div>
      <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="price">
      </div>
    <button type="submit" class="btn btn-primary" name="submit">Save</button>
  </form>
</div>
@endsection
