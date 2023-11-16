
@extends('layouts.admin')
@section('title','Thùng rác Liên hệ')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thùng rác Liên hệ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thùng rác Liên hệ</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('contact.index') }}"><i class="fas fa-undo-alt"></i>Trở lại</a>

          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thùng rác contact</h3>

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
    @foreach ($list as $contact)
        
   
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
                <td>
                  <a class="btn btn-info" href="{{ route('contact.show',['contact'=>$contact->id]) }}"><i class="fa fa-eye"></i></a>
                  <a class="btn btn-primary" href="{{ route('contact.restore',['contact'=>$contact->id]) }}"><i class="fa fa-undo-alt"></i></a>
                  <a href="{{ route('contact.destroys', ['contact' => $contact->id]) }}"
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