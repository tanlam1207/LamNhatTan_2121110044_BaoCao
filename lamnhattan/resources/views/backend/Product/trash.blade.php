
@extends('layouts.admin')
@section('title','Thùng rác sản phẩm')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thùng rác sản phẩm</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thùng rác sản phẩm</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('product.index') }}"><i class="fas fa-undo-alt"></i>Trở lại</a>

          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thùng rác sản phẩm</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          @if (session('message'))
          @php
          $message=session('message');
        @endphp
<div class="alert alert-{{ $message['type'] }}">
{{ $message['mgs'] }}
</div>
@endif
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Hình ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Id</th>
      <th>Id danh mục</th>
      <th>Id thương hiệu</th>
      <th>price</th>
      <th>Chức năng</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($list as $product)
        

    <tr>
         <td scope="row">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
            <label class="form-check-label" for="flexCheckIndeterminate">
            </label>
        </div>
      </td>
      <td><img width="50px" height="50px" src="{{ asset('images/product/' . $product->image) }}" alt=""></td> 
      <td>{{ $product->name }}</td>
      <td>{{ $product->id }}</td>
      <td>{{ $product->category_id }}</td>
      <td>{{ $product->brand_id }}</td>
      <td>{{ $product->price }}</td>

      <td>
                <td>
                  <a class="btn btn-info" href="{{ route('product.show',['product'=>$product->id]) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-primary" href="{{ route('product.restore',['product'=>$product->id]) }}"><i class="fa fa-undo-alt"></i></a>
                  <a href="{{ route('product.destroys', ['product' => $product->id]) }}"
                    class="btn btn-danger" title="Xóa Khỏi CSDL">
                    <i class="fa fa-trash"></i>
                </a>
</td>
              </tr>
              @endforeach 
            </tbody>
        </table>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection