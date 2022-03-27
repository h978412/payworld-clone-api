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
        Schema::create('personal_profiles', function (Blueprint $table) {
            $table->string('personal_profile_id');
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('marital_status', ['married', 'unmarried', 'divorced','widow/widower'])->nullable();
            $table->string('education')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_profiles');
    }
};
