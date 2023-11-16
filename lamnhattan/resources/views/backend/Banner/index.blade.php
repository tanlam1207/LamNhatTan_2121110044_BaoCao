
@extends('layouts.admin')
@section('title','Banner')
@section('content')
<form method="post" enctype="multipart/form-data">
  @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Banner</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('banner.create') }}"><i class="fa fa-plus"></i>Thêm</a>
            <a class=" btn btn-sm btn-danger" href="{{ route('banner.trash') }}"> <i class="fa fa-trash"></i>Thùng rác</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Banner</h3>

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
          <table class="table table-bordered" id="myTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Hình ảnh</th>
                <th>Tên Banner</th>
                <th>Link</th>
                <th>Chi tiết</th>
                <th>Vị trí</th>
                <th>Id</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($banner as $banner)
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td style="width:100px"> <img width="100%"  src="{{ asset('images/banner/' . $banner->image) }}" alt=""> </td>
                <td>{{ $banner->name }}</td>
                <td>{{ $banner->link }}</td>
                <td>{{ $banner->description }}</td>
                <td>{{ $banner->position }}</td>
                <td>{{ $banner->id }}</td>
                <td>
                  @if ($banner->status == 1)
                                    <a href="{{ route('banner.status', ['banner' => $banner->id]) }}"class="btn btn-success">
                                        <i class="fa fa-toggle-on"></i>
                                    </a>
                                @else
                                    <a href="{{ route('banner.status', ['banner' => $banner->id]) }}"class="btn btn-danger">  
                                        <i class="fa fa-toggle-off"></i>
                                    </a>
                                @endif
                  <a class="btn btn-info" href="{{ route('banner.show',['banner'=>$banner->id]) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-success" href="{{ route('banner.edit',['banner'=>$banner->id]) }}"><i class="fa fa-edit"></i></a>
                  <a href="{{ route('banner.delete', ['banner' => $banner->id]) }}"
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
    </form>
    </section>
    <!-- /.content -->
  </div>
@endsection