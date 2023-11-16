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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('full_name',1000);
            $table->string('username',1000);
            $table->string('email',1000);
            $table->string('phone',30);
            $table->string('gender',50);
            $table->unsignedInteger('buy_qty');
            $table->string('type_customer',255);
            $table->unsignedInteger('created_by')->default(1);
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->unsignedTinyInteger('status')->default(2)->comment("0:Rác-1:Hiện-2:Ẩn");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
