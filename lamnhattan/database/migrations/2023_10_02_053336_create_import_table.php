<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('import', function (Blueprint $table) {
            $table->id(); // Trường ID tự động tạo
            $table->string('product_name'); // Tên sản phẩm
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->float('unit_price');
            $table->float('total_amount');
            $table->date('order_date'); // Ngày đặt hàng
            $table->string('supplier_name'); // Tên nhà cung cấp
            $table->text('supplier_address'); // Địa chỉ nhà cung cấp
            $table->timestamps(); // Trường thời gian tự động tạo
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import');
    }
};
