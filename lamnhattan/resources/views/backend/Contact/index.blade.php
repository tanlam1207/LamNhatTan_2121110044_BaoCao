
@extends('layouts.admin')
@section('title','Liên hệ')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Liên Hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Liên Hệ</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('contact.create') }}"><i class="fa fa-plus"></i>Thêm</a>
            <a class=" btn btn-sm btn-danger" href="{{ route('contact.trash') }}"> <i class="fa fa-trash"></i>Thùng rác</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liên Hệ</h3>

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
          <table class="table table-bcontacted">
            <thead>
              <tr>
                <th>#</th>
                <th>Id</th>
                <th>ID người dùng</th>
                <th>Tên</th>
                <th>email</th>
                <th>SĐT</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
              {{-- @foreach ($list as $contact)
                  
             
              <tr>
                   <td scope="row">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                      <label class="form-check-label" for="flexCheckIndeterminate">
                      </label>
                  </div>
                </td>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->user_id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                  @if ($contact->status == 1)
                  <a href="{{ route('contact.status', ['contact' => $contact->id]) }}" class="btn btn-success">

                      <i class="fa fa-toggle-on"></i>
                  </a>
              @else
                  <a href="{{ route('contact.status', ['contact' => $contact->id]) }}"class="btn btn-danger">

                      <i class="fa fa-toggle-off"></i>
                  </a>
              @endif
<a class="btn btn-info" href="{{ route('contact.show',['contact'=>$contact->id]) }}"><i class="fa fa-eye"></i></a>
<a class="btn btn-success" href="{{ route('contact.edit',['contact'=>$contact->id]) }}"><i class="fa fa-edit"></i></a>
<a href="{{ route('contact.delete', ['contact' => $contact->id]) }}"
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