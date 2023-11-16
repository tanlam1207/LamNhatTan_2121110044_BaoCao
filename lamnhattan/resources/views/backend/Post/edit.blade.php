
@extends('layouts.admin')
@section('title','Cập nhật Bài viết')
@section('content')
<form action="{{ route("post.update",['post'=>$post->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật Bài viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cập nhật Bài viết</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <button type="submit">Lưu</button>  
               <a href="{{ route('post.index') }}" class="btn bg-success">
                        <i class="fas fa-undo-alt"></i> Quay về danh sách </a>

          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cập nhật Bài viết</h3>

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
                    <label for="exampleFormControlInput1" class="form-label">tiêu đề bài viết</label>
                    <input name="title" type="text" class="form-control" id="exampleFormControlInput1"  placeholder="Nhập vào tên bài viết" value="{{ old('title',$post->title) }}">
                    @if ($errors->any())
                    <div class="text-danger">
                        {{$errors->first('title')}}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Chi tiết bài viết</label>
                  <input name="detail" type="text" class="form-control" id="exampleFormControlInput1"  placeholder="Nhập vào chi tiết bài viết" value="{{ old('detail',$post->detail) }}" >
                  @if ($errors->any())
                  <div class="text-danger">
                      {{$errors->first('detail')}}
                  </div>
                  @endif
              </div>
                  <div class="mb-3">
                      <label for="exampleFormControlTextarea1" class="form-label">Từ Khóa</label>
                      <input name="metakey" class="form-control" id="exampleFormControlTextarea1"  placeholder="Nhập vào từ khóa" value="{{ old('metakey',$post->metakey) }}"
                          rows="3">
                          @if ($errors->any())
                          <div class="text-danger">
                              {{$errors->first('metakey')}}
                          </div>
  
                      @endif
                  </div>
                  <div class="mb-3">
                      <label for="exampleFormControlTextarea2" class="form-label">Mô Tả</label>
                      <input name="metadesc" class="form-control" id="exampleFormControlTextarea2" placeholder="Nhập vào mô tả" value="{{ old('metadesc',$post->metadesc) }}"
                          rows="3" >
                          @if ($errors->any())
                          <div class="text-danger">
                              {{$errors->first('metadesc')}}
                          </div>
  
                      @endif
                  </div>
              </div>
              <div class="col-3">
                 
                  <div class="mb-3">
                      <label for="exampleFormControlTextarea2" class="form-label">Kiểu</label>
                      <select name="type" class="form-control" id="select1" aria-label="Default select example">
                        <option selected></option>
                        <option value="postHome">postHome</option>
                        <option value="postPage">postPage</option>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea2" class="form-label">Topic Id</label>
                    <select name="topic_id" class="form-control" id="select1" aria-label="Default select example">
                      <option selected></option>
                      @foreach ($listtopic as $item)
                      <option value="{{$item->id  }}">
                        {{$item->name  }}
                    </option>
                      @endforeach
  
                    </select>
                </div>
                  <div class="input-group mb-3">
                      <input name="image" type="file" class="form-control-file" id="inputGroupFile02">
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