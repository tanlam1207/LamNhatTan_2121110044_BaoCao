
@extends('layouts.admin')
@section('title','Thùng rác Danh mục')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thùng rác Danh mục</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thùng rác Danh mục</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('category.index') }}"><i class="fas fa-undo-alt"></i>Trở lại</a>

          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thùng rác Danh mục</h3>

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
                <th>Tên Danh mục</th>
                <th>Id</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $category)
                  
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td> <img width="50px" height="50px" src="{{ $category->image }}" alt=""> </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->id }}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('category.restore',['category'=>$category->id]) }}"><i class="fa fa-undo-alt"></i></a>
                  <a href="{{ route('category.destroys', ['category' => $category->id]) }}"
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