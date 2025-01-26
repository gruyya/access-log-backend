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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id'); 
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->string('jmbg')->unique();            
            $table->string('barcode_in')->unique();
            $table->string('barcode_out')->unique(); 
            $table->string('rank'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
