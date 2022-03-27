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
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->string('business_profile_id');
            $table->string('shop_name')->nullable();
            $table->string('shop_category')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('GSTIN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_profiles');
    }
};
