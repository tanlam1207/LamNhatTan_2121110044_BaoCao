
@extends('layouts.admin')
@section('title','Cập nhật đơn hàng')
@section('content')
<form action="{{ route("order.update",['order'=>$order->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cập nhật đơn hàng</li>
            </ol>
          </div>
        </div>
        <div class="d-flex justify-content-end">
          <div class="">
            <button type="submit">Lưu</button>  
               <a href="{{ route('order.index') }}" class="btn bg-success">
                        <i class="fas fa-undo-alt"></i> Quay về danh sách </a>

          </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Cập nhật đơn hàng</h3>

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
                      <label for="exampleFormControlInput1" class="form-label">Tên đơn hàng</label>
                      <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{ old('name',$order->name) }}">
                      @if ($errors->any())
                        <div class="text-danger">
                            {{$errors->first('name')}}
                        </div>

                    @endif
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">email</label>
                    <input name="email" type="email" class="form-control" id="exampleFormControlInput1" value="{{ old('name',$order->email) }}">
                    @if ($errors->any())
                        <div class="text-danger">
                            {{$errors->first('email')}}
                        </div>

                    @endif
                </div> 
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                  <input name="phone" type="tel" class="form-control" id="exampleFormControlInput1" value="{{ old('name',$order->phone) }}">
                  @if ($errors->any())
                        <div class="text-danger">
                            {{$errors->first('phone')}}
                        </div>

                    @endif
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Địa chỉ nhận</label>
                <input name="address" type="text" class="form-control" id="exampleFormControlInput1" value="{{ old('name',$order->address) }}">
                @if ($errors->any())
                        <div class="text-danger">
                            {{$errors->first('address')}}
                        </div>

                    @endif
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Ghi chú</label>
              <input name="note" type="text" class="form-control" id="exampleFormControlInput1" value="{{ old('name',$order->note) }}">
          </div>
              
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="exampleFormControlTextarea2" class="form-label">User Id</label>
                  <select name="user_id" class="form-control" id="select1" aria-label="Default select example">
                    <option selected></option>
                    @foreach ($iduser as $item)
                    <option value="{{$item->id  }}">
                      {{$item->name  }}
                  </option>
                    @endforeach

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