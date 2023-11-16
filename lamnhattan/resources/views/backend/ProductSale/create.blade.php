@extends('layouts.admin')
@section('title', 'Thêm sản phẩm giảm giá')
@section('content')
    <form action="{{ route('productsale.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thêm sản phẩm giảm giá</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm sản phẩm giảm giá</li>
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
                        <h3 class="card-title">Thêm sản phẩm giảm giá</h3>

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
                                {{-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">{{ $idproduct->price }}</label>
                                    <input name="price" type="number" class="form-control"
                                        id="exampleFormControlInput1" readonly>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">% Sale</label>
                                    <input name="price_sale" type="number" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Số lượng</label>
                                    <textarea name="qty" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="product_id">Chọn sản phẩm</label>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">Chọn sản phẩm</option>
                                        @foreach ($idproduct as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="price">Giá sản phẩm</label>
                                    <input name="price" type="text" class="form-control" id="price" readonly>
                                </div>
                                
                                
                                
                                
                                
                            </div>
                            <div class="col-3">
                              <div class="mb-3">
                                <label for="start_date">Chọn ngày bắt đầu:</label>
                                <input type="date" id="start_date" name="start_date" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="mb-3">
                              <label for="end_date">Chọn ngày kết thúc:</label>
                              <?php
                              // Tính toán ngày hiện tại cộng thêm 7 ngày
                              $endDate = date('Y-m-d', strtotime('+7 days'));
                              ?>
                              <input type="date" id="end_date" name="end_date" value="<?php echo $endDate; ?>">
                          </div>
                          <div id="productImageContainer" ></div>

                            </div>
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
