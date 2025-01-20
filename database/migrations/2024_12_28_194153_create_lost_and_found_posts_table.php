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
        Schema::create('lost_and_found_posts', function (Blueprint $table) {
            $table->id();
            $table->string('lost_and_found_title', 256);
            $table->string('lost_and_found_slug', 256);
            $table->text('lost_and_found_description');
            $table->bigInteger('lost_and_found_country_id')->unsigned();
            $table->bigInteger('lost_and_found_category_id')->unsigned();
            $table->string('lost_and_found_location', 256);
            $table->string('lost_and_found_latitude', 256)->nullable();
            $table->string('lost_and_found_longitude', 256)->nullable();
            $table->string('lost_and_found_contact_email', 256);
            $table->string('lost_and_found_contact_mobile', 256)->nullable();
            $table->string('lost_and_found_contact_telephone', 256)->nullable();
            $table->string('lost_and_found_contact_address', 256)->nullable();
            $table->enum('lost_and_found_type', ['Lost', 'Found']);
            $table->enum('lost_and_found_status', ['Open', 'Resolved'])->default('Open');
            $table->date('lost_and_found_date');
            $table->time('lost_and_found_time');
            $table->string('lost_and_found_cover', 256);
            $table->tinyInteger('is_active')->unsigned()->default(0);
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_and_found_posts');
    }
};
