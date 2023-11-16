
@extends('layouts.admin')
@section('title','Menu')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <a class=" btn btn-sm btn-primary"  href="{{ route('menu.create') }}"><i class="fa fa-plus"></i></a>
            <a class=" btn btn-sm btn-danger" href="{{ route('menu.trash') }}"> <i class="fa fa-trash"></i></a>
      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Menu</h3>

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
                <th>Tên</th>
                <th>link</th>
                <th>Id bảng</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($list as $menu)
                  
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td>{{ $menu->id }}</td>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->link }}</td>
                <td>{{ $menu->table_id }}</td>

                <td>
                  @if ($menu->status == 1)
                  <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"class="btn btn-success">

                      <i class="fa fa-toggle-on"></i>
                  </a>
              @else
                  <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"class="btn btn-danger">

                      <i class="fa fa-toggle-off"></i>
                  </a>
              @endif
<a class="btn btn-info" href="{{ route('menu.show',['menu'=>$menu->id]) }}"><i class="fa fa-eye"></i></a>
<a class="btn btn-success" href="{{ route('menu.edit',['menu'=>$menu->id]) }}"><i class="fa fa-edit"></i></a>
<a href="{{ route('menu.delete', ['menu' => $menu->id]) }}"
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