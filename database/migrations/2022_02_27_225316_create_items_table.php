<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('product_code');
            $table->string('item_name')->index();
            $table->string('item_type')->nullable()->index();
            $table->string('material')->nullable();
            $table->string('variant')->nullable();
            $table->string('connection_type')->nullable();
            $table->string('country_origin')->nullable();
            $table->string('brand')->nullable();
            $table->string('inches')->nullable();
            $table->string('mm')->nullable();
            $table->string('thickness')->nullable();
            $table->integer('stock')->nullable();
            $table->double('price')->nullable();
            $table->string('discount')->nullable();
            $table->double('discounted_price')->nullable();
            $table->double('min_competitor_price')->nullable();
            $table->double('max_competitor_price')->nullable();
            $table->double('average_competitor_price')->nullable();
            $table->double('unit_cost')->nullable();
            $table->string('mill_cert_link')->nullable();
            $table->string('catalog')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
