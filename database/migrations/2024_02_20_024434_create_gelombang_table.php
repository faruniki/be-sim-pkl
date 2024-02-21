<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gelombang', function (Blueprint $table) {
            $table->id();
            $table->integer('nis')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('rayon');
            $table->string('rombel');
            $table->string('pt');        
            $table->enum('priode',['1', '2']);
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
        Schema::dropIfExists('gelombang');
    }
};
