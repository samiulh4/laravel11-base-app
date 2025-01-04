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
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('area_name', 255);
            $table->string('area_name_local', 255)->nullable();
            $table->string('area_type_code', 50);
            $table->bigInteger('area_parent_id')->unsigned()->nullable();
            $table->string('area_code', 50)->comment('ISO code or custom code');
            $table->string('area_iso2', 2)->nullable();
            $table->string('area_iso3', 3)->nullable();
            $table->string('area_latitude', 50)->nullable();
            $table->string('area_longitude', 50)->nullable();
            $table->string('area_image', 255)->nullable();
            $table->tinyInteger('is_active')->unsigned()->default(0);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
