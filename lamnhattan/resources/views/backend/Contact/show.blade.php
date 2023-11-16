{{-- <table class="table table-bordered">
    <thead>
        <tr class="text-bg-success">
       
            <th class="text-center text-danger">Tên Trường</th>
            <th class="text-center text-danger">Giá Trị</th>
        </tr>
    </thead>
        <tr>

            <td class="fw-bold text-danger">ID</td>
            <td>ádad</td>
        </tr>
        <tr>
        <td class="fw-bold text-danger">Tên Liên Hệ</td>
            <td>dfr</td>
        </tr>
        <td class="fw-bold text-danger">Slug Liên Hệ </td>
            <td>sfsd</td>
        </tr>
        <td class="fw-bold text-danger">Thứ Tự</td>
            <td>sdfs</td> 
        </tr>
        <td class="fw-bold text-danger">Hình Ảnh</td>
            <td>sdfsd</td>
        </tr>
        <td class="fw-bold text-danger">Từ Khóa SEO</td>
            <td>sdfsd</td>
        </tr>
        <td class="fw-bold text-danger">Mô Tả SEO</td>
            <td>ọi</td>
        </tr>
        <td class="fw-bold text-danger">Ngày Tạo</td>
            <td>DÁ</td>
        </tr>
        <td class="fw-bold text-danger">Người Tạo</td>
            <td>áda</td>
        </tr>
        <td class="fw-bold text-danger">Ngày Chỉnh sửa</td>
            <td>ádas</td>
        </tr>
        <td class="fw-bold text-danger">Người Chỉnh sửa</td>
            <td>ádas</td>
        </tr>
        <td class="fw-bold text-danger">Trạng Thái</td>
            <td>ádasd</td>
        </tr>
</table> --}}

@extends('layouts.admin')
@section('title','Chi tiết Liên hệ')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chi tiết contact</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Chi tiết contact</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <a class=" btn btn-sm btn-primary"  href="{{ route('contact.index') }}"><i class="fas fa-undo-alt"></i>Trở Lại</a>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chi tiết Liên Hệ</h3>

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
        <tr class="text-bg-success">
            <th class="text-center text-danger">Tên Trường</th>
            <th class="text-center text-danger">Giá Trị</th>
        </tr>
    </thead>
        <tr>

            <td class="fw-bold text-danger">ID</td>
            <td>{{ $contact->id }}</td>
        </tr>
        <tr>
        <td class="fw-bold text-danger">Tên Liên Hệ</td>
            <td>{{ $contact->name }}</td>
        </tr>
        <td class="fw-bold text-danger">email</td>
        <td>{{ $contact->email }}</td>
    </tr>
    <td class="fw-bold text-danger">phone</td>
    <td>{{ $contact->phone }}</td>
</tr>
<td class="fw-bold text-danger">title</td>
<td>{{ $contact->title }}</td>
</tr>
<td class="fw-bold text-danger">Nội dung</td>
<td>{{ $contact->content }}</td>
</tr>
        <td class="fw-bold text-danger">Id replay</td>
            <td>{{ $contact->replay_id }}</td> 
        </tr>
        <td class="fw-bold text-danger">Ngày Tạo</td>
            <td>{{ $contact->created_at }}</td>
        </tr>
        <td class="fw-bold text-danger">Người Tạo</td>
            <td>{{ $contact->created_by }}</td>
        </tr>
        <td class="fw-bold text-danger">Ngày Chỉnh sửa</td>
            <td>{{ $contact->updated_at }}</td>
        </tr>
        <td class="fw-bold text-danger">Người Chỉnh sửa</td>
            <td>{{ $contact->updated_by }}</td>
        </tr>
        <td class="fw-bold text-danger">Trạng Thái</td>
            <td>{{ $contact->status }}</td>
        </tr>
</table>
        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection