
@extends('layouts.admin')
@section('title','Nhập Hàng')
@section('content')
<form method="post" enctype="multipart/form-data">
  @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nhập Hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nhập Hàng</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('import.create') }}"><i class="fa fa-plus"></i>Thêm</a>
            <a class=" btn btn-sm btn-danger" href="{{ route('import.trash') }}"> <i class="fa fa-trash"></i>Thùng rác</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Nhập Hàng</h3>

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
          <table class="table table-bordered" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Tổng giá</th>
                <th>Ngày đặt hàng</th>
                <th>Tên nhà cung cấp</th>
                <th>Địa chỉ nhà cung cấp</th>
                <th>Id</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($list as $import)
                  
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td style="width:100px"> <img width="100%"  src="{{ asset('images/import/' . $import->image) }}" alt=""> </td>
                <td>{{ $import->link }}</td>
                <td>{{ $import->id }}</td>
                <td>
                  @if ($import->status == 1)
                                    <a href="{{ route('import.status', ['import' => $import->id]) }}"
                               class="btn btn-success">

                                        <i class="fa fa-toggle-on"></i>
                                    </a>
                                @else
                                    <a href="{{ route('import.status', ['import' => $import->id]) }}"
                              class="btn btn-danger">

                                        <i class="fa fa-toggle-off"></i>
                                    </a>
                                @endif
                  <a class="btn btn-info" href="{{ route('import.show',['import'=>$import->id]) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-success" href="{{ route('import.edit',['import'=>$import->id]) }}"><i class="fa fa-edit"></i></a>
                  <a href="{{ route('import.delete', ['import' => $import->id]) }}"
                    class="btn btn-danger" title="delete">
                    <i class="fa fa-trash"></i>
                </a>
</td>
              </tr>
              @endforeach  --}}
            </tbody>
        </table>
        </div>
      </div>
      <!-- /.card -->
    </form>
    </section>
    <!-- /.content -->
  </div>
@endsection