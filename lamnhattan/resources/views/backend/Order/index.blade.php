
@extends('layouts.admin')
@section('title','Danh Mục Sản Phẩm')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Đơn hàng</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('order.create') }}"><i class="fa fa-plus"></i>Thêm</a>
            <a class=" btn btn-sm btn-danger" href="{{ route('order.trash') }}"> <i class="fa fa-trash"></i>Thùng rác</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Đơn Hàng</h3>

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
          {{-- @if (session('message'))
          @php
          $message=session('message');
        @endphp
<div class="alert alert-{{ $message['type'] }}">
{{ $message['mgs'] }}
</div>
@endif --}}
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Id</th>
                <th>ID User</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>email</th>
                <th>SĐT</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($list as $order)
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->phone }}</td>
                <td>
                  @if ($order->status == 1)
                  <a href="{{ route('order.status', ['order' => $order->id]) }}" class="btn btn-success">

                      <i class="fa fa-toggle-on"></i>
                  </a>
              @else
                  <a href="{{ route('order.status', ['order' => $order->id]) }}"class="btn btn-danger">

                      <i class="fa fa-toggle-off"></i>
                  </a>
              @endif
<a class="btn btn-info" href="{{ route('order.show',['order'=>$order->id]) }}"><i class="fa fa-eye"></i></a>
<a class="btn btn-success" href="{{ route('order.edit',['order'=>$order->id]) }}"><i class="fa fa-edit"></i></a>
<a href="{{ route('order.delete', ['order' => $order->id]) }}"
  class="btn btn-danger" title="delete">
  <i class="fa fa-trash"></i>
</a>
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