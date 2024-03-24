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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullName')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('id_card')->nullable();
            $table->enum('role', ['bác sĩ', 'nhân viên', 'bệnh nhân'])->default('bệnh nhân');
            $table->string('certification')->nullable()->comment('Chứng chỉ bác sĩ');
            $table->string('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['fullName', 'avatar', 'address', 'gender', 'birth_date', 'id_card', 'role', 'certification', 'phone_number']);
        });
    }
};
