
@extends('layouts.admin')
@section('title','Topic')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Topic</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Topic</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('topic.create') }}"><i class="fa fa-plus"></i></a>
            <a class=" btn btn-sm btn-danger" href="{{ route('topic.trash') }}"> <i class="fa fa-trash"></i></a>
          </div>
      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Topic</h3>

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
                <th>slug</th>
                <th>Id Cha</th>
                <th>Chức năng</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($list as $topic)
                  
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td>{{ $topic->id }}</td>
                <td>{{ $topic->name }}</td>
                <td>{{ $topic->slug }}</td>
                <td>{{ $topic->parent_id }}</td>

                <td>
                  @if ($topic->status == 1)
                                    <a href="{{ route('topic.status', ['topic' => $topic->id]) }}"
                                        {{-- đường dẫn khi nhấp vào edit có tdam số truyền vào nên phải có ->id  --}} class="btn btn-success">

                                        <i class="fa fa-toggle-on"></i>
                                    </a>
                                @else
                                    <a href="{{ route('topic.status', ['topic' => $topic->id]) }}"
                                        {{-- đường dẫn khi nhấp vào edit có tdam số truyền vào nên phải có ->id  --}} class="btn btn-danger">

                                        <i class="fa fa-toggle-off"></i>
                                    </a>
                                @endif
                  <a class="btn btn-info" href="{{ route('topic.show',['topic'=>$topic->id]) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-success" href="{{ route('topic.edit',['topic'=>$topic->id]) }}"><i class="fa fa-edit"></i></a>
                  <a href="{{ route('topic.delete', ['topic' => $topic->id]) }}"
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