@extends('layouts.app')
@section('title', 'PRODUCTS')
@section('content')
<div class="container">
    <h2 style="text-align:center">Products</h2>
<div class="row">
    <div class="col-md-6" style="background-color: #fff;">
    <h2 style="text-align: center">Books</h2>
  <table class="table">
    <thead>

      <tr>
          <th>Auther</th>
          <th>Title</th>
          <th>Pages</th>
          <th>Price</th>
          <th>Action</th>
          <th>View</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
          {{--  {{dd($product)}} --}}
         @if ($product['type']=='book')
                <td>{{$product['firstname']}} {{$product['mainname']}}</td>
                <td>{{$product['title']}}</td>
                <td>{{$product['numpages']}} </td>
                <td>{{$product['price']}} </td>
                <td>
                    <form method="post" action="{{route('product.delete',$product['id'])}}">
                        @csrf
                        @method('delete')
                            <button class="btn btn-danger" type="submit"> Delete </button>
                    </form>
                </td>
                <td>
                    <a href="{{route('bookProduct.edit',$product['id'])}}" class="btn btn-success">Edit</a>
                </td>
         @endif
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

{{-- cd producst --}}
<div class="col-md-6" style="background-color: #fff;">
    <h2 style="text-align: center">CD</h2>
  <table class="table">
    <thead>

      <tr>
          <th>Auther</th>
          <th>Title</th>
          <th>Pages</th>
          <th>Price</th>
          <th>Action</th>
          <th>View</th>
        </tr>

    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
          {{--  {{dd($product)}} --}}
         @if ($product['type']=='cd')
                <td>{{$product['firstname']}} {{$product['mainname']}}</td>
                <td>{{$product['title']}}</td>
                <td>{{$product['playlength']}} </td>
                <td>{{$product['price']}} </td>
                <td>
                    <form method="post" action="{{route('product.delete',$product['id'])}}">
                        @csrf
                        @method('delete')
                            <button class="btn btn-danger" type="submit"> Delete </button>
                    </form>
                </td>
                <td>
                    <a href="{{route('bookProduct.edit',$product['id'])}}" class="btn btn-success">Edit</a>
                </td>
         @endif
        </tr>
        @endforeach
    </tbody>
  </table>

</div>
</div>
</div>
@endsection


{{--
    using yield and pushing it into index page
 --}}
