
@extends('layouts.admin')
@section('title','Thêm trang')
@section('content')
<form action="{{ route("slider.store")}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm trang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm trang</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <button type="submit">Lưu</button>
          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thêm trang</h3>

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
                        <label for="exampleFormControlInput1" class="form-label">Tên trang</label>
                        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                    <div class="mb-3">
                      <label for="image">Link</label>
                      <input type="file" name="image" value="{{old('link')}}" id="image" class="form-control" placeholder="Thêm hình ảnh">

                  </div>
                </div>
                <div class="col-3">
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea2" class="form-label">Sắp Xếp</label>
                    <select name="sort_order" class="form-control" id="select1" aria-label="Default select example">
            <option value="1">
                chọn vị trí sắp xếp   
            </option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea2" class="form-label">Vị Trí</label>
                  <select name="position" class="form-select" id="select1" aria-label="Default select example">
                      <div>
                          <option selected></option>
                          <option value="slideshow">slideshow</option>
                          <option value="slidefooter">slidefooter</option>
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