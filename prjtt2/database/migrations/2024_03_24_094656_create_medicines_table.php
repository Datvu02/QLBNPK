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
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('product_code');
            $table->string('name');
            $table->string('registration_number');
            $table->string('active_ingredient');
            $table->string('content_amount');
            $table->string('drug_group');
            $table->string('route_of_administration');
            $table->boolean('prescription');
            $table->string('unit');
            $table->string('manufacturer');
            $table->string('country_of_origin');
            $table->string('packaging_unit');
            $table->decimal('import_price', 10, 2);
            $table->decimal('selling_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
