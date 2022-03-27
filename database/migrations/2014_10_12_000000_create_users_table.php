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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('referedBy')->nullable()->default(NULL);
            $table->boolean('isAutherised')->default(FALSE);
            $table->string('password');
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 1000000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
