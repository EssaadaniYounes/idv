<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('reference')->nullable();
            $table->integer('category_id')->default(1);
            $table->integer('branch_id')->default(1);
            $table->string('description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('main_img')->nullable();
            $table->json('extra_imgs')->nullable();
            $table->json('functionalities')->nullable();

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
        Schema::dropIfExists('products');
    }
}
