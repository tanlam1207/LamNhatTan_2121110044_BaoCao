
@extends('layouts.admin')
@section('title','Danh Sách Sản Phẩm Sale')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Danh Sách Sản Phẩm Sale</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Danh Sách Sản Phẩm Sale</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('productsale.create') }}"><i class="fa fa-plus"></i>Thêm</a>
          </div>
      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh Sách Sản Phẩm Sale</h3>

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
                <th>Id</th>
                <th>Id Sản phẩm</th>
                <th>Giá Sale</th>
                <th>Số lượng</th>
                <th>Ngày bắt đầu áp dụng</th>
                <th>Ngày kết thúc khuyến mãi</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $productsale)
                  
       
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td>{{ $productsale->id }}</td>
                <td>{{ $productsale->product_id }}</td>
                <td>{{ $productsale->price_sale }}</td>
                <td>{{ $productsale->qty }}</td>
                <td>{{ \Carbon\Carbon::parse($productsale->start_date)->format('Y-m-d H:i') }}</td>
<td>{{ \Carbon\Carbon::parse($productsale->end_date)->format('Y-m-d H:i') }}</td>

                <td>
<a class="btn btn-success" href="{{ route('productsale.edit',['productsale'=>$productsale->id]) }}"><i class="fa fa-edit"></i></a>
<a href="{{ route('productsale.destroys', ['productsale' => $productsale->id]) }}"
  class="btn btn-danger" title="delete">
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