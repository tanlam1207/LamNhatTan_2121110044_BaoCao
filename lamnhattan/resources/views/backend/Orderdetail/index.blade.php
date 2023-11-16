
@extends('layouts.admin')
@section('title','chi tiết đơn hàng')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chi tiết đơn hàng</h3>

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
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Id</th>
                <th>ID Đơn Hàng</th>
                <th>ID sản phẩm</th>
                <th>Giá</th>
                <th>số lượng</th>
                <th>Chứ năng</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($list as $orderdetaildetail)
                  
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td>{{ $orderdetaildetail->id }}</td>
                <td>{{ $orderdetaildetail->order_id }}</td>
                <td>{{ $orderdetaildetail->product_id }}</td>
                <td>{{ $orderdetaildetail->price }}</td>
                <td>{{ $orderdetaildetail->qty }}</td>
                <td>
<a class="btn btn-info" href="{{ route('orderdetail.show',['orderdetail'=>$orderdetaildetail->id]) }}"><i class="fa fa-eye"></i></a>
<a class="btn btn-success" href="{{ route('orderdetail.edit',['orderdetail'=>$orderdetaildetail->id]) }}"><i class="fa fa-edit"></i></a>
</td>
              </tr>
              @endforeach --}}
            </tbody>
        </table>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection