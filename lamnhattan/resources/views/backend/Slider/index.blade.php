
@extends('layouts.admin')
@section('title','Slider')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Slider</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('slider.create') }}"><i class="fa fa-plus"></i></a>
            <a class=" btn btn-sm btn-danger" href="{{ route('slider.trash') }}"> <i class="fa fa-trash"></i></a>
          </div>
      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Slider</h3>

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
                <th>Vị trí</th>
                <th>Ngày tạo</th>
                <th>Chức năng</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($list as $slider)
                  
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->link }}</td>
                <td>{{ $slider->position }}</td>
                <td>{{ $slider->created_at }}</td>
                <td>
                  @if ($slider->status == 1)
                  <a href="{{ route('slider.status', ['slider' => $slider->id]) }}"
                      {{-- đường dẫn khi nhấp vào edit có tdam số truyền vào nên phải có ->id  --}} class="btn btn-success">

                      <i class="fa fa-toggle-on"></i>
                  </a>
              @else
                  <a href="{{ route('slider.status', ['slider' => $slider->id]) }}"
                      {{-- đường dẫn khi nhấp vào edit có tdam số truyền vào nên phải có ->id  --}} class="btn btn-danger">

                      <i class="fa fa-toggle-off"></i>
                  </a>
              @endif
<a class="btn btn-info" href="{{ route('slider.show',['slider'=>$slider->id]) }}"><i class="fa fa-eye"></i></a>
<a class="btn btn-success" href="{{ route('slider.edit',['slider'=>$slider->id]) }}"><i class="fa fa-edit"></i></a>
<a href="{{ route('slider.delete', ['slider' => $slider->id]) }}"
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