@extends('layouts.app')
@section('title','Update')
@section('content')
<div class="container">



<form method="post" action="{{route('product.update',$product['id'])}}" style="width: 50%">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="type">Select type:</label>
        <select class="form-control" id="type" name="type">
          <option value="book" {{ $product['type'] == 'book' ?  'selected'  : ' ' }}>Book</option>
          <option value="cd" {{ $product['type'] == 'cd' ?  'selected'  : ' ' }}>CD</option>
        </select>
        </div>

        <div class="form-group" >
          <label>Title:</label>
        <input type="text" class="form-control" name="title" value="{{$product['title']}}">
        </div>
        <div class="form-group">
          <label>First Name:</label>
          <input type="text" class="form-control" name="fname" value="{{$product['firstname']}}">
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" class="form-control" name="sname" value="{{$product['mainname']}}">
          </div>
          <div class="form-group">

            @if($product['type'] == 'book')
            <label>Page:</label>
            <input type="number" class="form-control" name="page" value="{{$product['numpages']}}">
            @endif
            @if ($product['type'] == 'cd')
            <label>Duration:</label>
            <input type="number" class="form-control" name="page" value="{{$product['playlength']}}">
            @endif

          </div>
          <div class="form-group">
            <label>Price:</label>
            <input type="number" class="form-control" name="price" value="{{$product['price']}}">
          </div>
        <button type="submit" class="btn btn-success" name="submit">Update</button>
      </form>

    </div>

@endsection
