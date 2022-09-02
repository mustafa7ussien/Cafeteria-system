<?php

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignIdFor(Orders::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Product::class)->constrained()->onDelete('cascade');
            $table->primary(['orders_id', 'product_id']);
            $table->integer('quantity');
            $table->index('orders_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
};
