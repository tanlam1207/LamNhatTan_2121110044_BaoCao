
@extends('layouts.admin')
@section('title','Cập nhật menu')
@section('content')
<form action="{{ route("menu.update",['menu'=>$menu->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cập nhật menu</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <button type="submit">Lưu</button>  
               <a href="{{ route('menu.index') }}" class="btn bg-success">
                        <i class="fas fa-undo-alt"></i> Quay về danh sách </a>

          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cập nhật menu</h3>

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
          <div class="row">
              <div class="col-9">
                  <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Tên menu</label>
                      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ old('name',$menu->name) }}" >
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">link</label>
                      <textarea name="link" class="form-control" id="exampleFormControlTextarea1"
                          rows="3"></textarea>
                  </div>
                 
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="exampleFormControlTextarea2" class="form-label">Id Cha</label>
                  <select name="table_id" class="form-control" id="select1" aria-label="Default select example">
                    <option selected value="0">Không Có</option>
                    @foreach ($idmenu as $item2)
                    <option value="{{$item2->id  }}">
                      {{$item2->name  }}
                  </option>
                    @endforeach

                  </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea2" class="form-label">kiểu</label>
                <select name="type" class="form-control" id="select1" aria-label="Default select example">
                  <div>
                    <option selected value="0"></option>
                    <option value="mainmenu">mainmenu</option>
                    <option value="MenuSub">MenuSub</option>
                </div>
                </select>
            </div>
                  <div class="mb-3">
                      <label for="exampleFormControlTextarea2" class="form-label">Trạng thái</label>
                      <select name="status" class="form-select" id="select1" aria-label="Default select example">
                          <div>
                              <option selected></option>
                              <option value="1">Hien</option>
                              <option value="2">tat</option>
                          </div>
                      </select>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
</form>
@endsection