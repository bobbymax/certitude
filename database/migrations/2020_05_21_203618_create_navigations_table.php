<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');

            $table->string('name');
            $table->string('label')->unique();

            $table->string('icon_class')->nullable();
            $table->string('url')->nullable();
            $table->string('route')->nullable();
            $table->bigInteger('parent_id')->default(0);

            $table->string('section')->default('admin');
            $table->bigInteger('visited')->default(0);
            $table->string('target')->default('_self');

            $table->bigInteger('order')->default(0);

            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('navigations');
    }
}
