@extends('layouts.admin')
@section('title','Thêm banner')
@section('content')
<form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Add banner</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Thêm banner</li>
                </ol>

              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>

                    <div class="col-md-6 text-right">
                      <button type="submit" class="btn bg-success">
                        <i class="fa-solid fa-save"></i> Lưu [Thêm] </button>
                      <a href="{{ route('banner.index') }}" class="btn bg-success">
                        <i class="fa-solid fa-arrow-left"></i> Quay về danh sách </a>

                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="name">Tên banner</label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control" placeholder="Nhập tên danh mục">
                            @if ($errors->any())
                                <div class="text-danger">
                                    {{$errors->first('name')}}
                                </div>

                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="link">Liên kết</label>
                            <textarea  name="link" id="link" class="form-control"placeholder="Liên kết"></textarea>
                            @if ($errors->any())
                                <div class="text-danger">
                                    {{$errors->first('link')}}
                                </div>

                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="description">Chi tiết</label>
                            <textarea  name="description" id="metadesc" class="form-control" placeholder="Chi tiết">{{old('description')}}</textarea>
                            @if ($errors->any())
                                <div class="text-danger">
                                    {{$errors->first('description')}}
                                </div>

                            @endif

                        </div>
                    </div>
                    <div class="col-md-3">
                        
                        <div class="mb-3">
                            <label for="position">Vị trí</label>
                            <select name="position" id="position" class="form-control">
                                <option value="0">--Vị trí-</option>
                                <option value="1">Home</option>
                                <option value="2">DesProduct</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình ảnh</label>
                            <input type="file" name="image" value="{{old('image')}}" id="image" class="form-control">

                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Xuất bản</option>
                                <option value="0">Chưa xuất bản</option>


                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Footer
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
</form>


@endsection
