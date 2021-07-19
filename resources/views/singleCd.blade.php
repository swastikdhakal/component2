@extends('layouts.app')
@section('title','Single_CD')
@section('content')
<div class="container">
    <h2>CD</h2>
    <table class="table">
        <thead>

          <tr>
              <th>ID</th>
              <th>Author</th>
              <th>Title</th>
              <th>Price</th>
              <th>PlayLength</th>
              <th>Update</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($id as $product)
            <tr>
              {{--  {{dd($product)}} --}}
                    <td>{{$product->getId()}} </td>
                    <td>{{$product->getFirstName()}} {{$product->getMainName()}}</td>
                    <td>{{$product->getTitle()}}</td>
                    <td>{{$product->getPrice()}} </td>
                    <td>{{$product->getPlayLength()}} </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update/'. $product->getId())}}"> Update</a>
                    </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection


