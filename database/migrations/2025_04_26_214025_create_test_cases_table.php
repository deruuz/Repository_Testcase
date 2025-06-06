<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_cases', function (Blueprint $table) {
            $table->id('test_case_id');
            $table->integer('position')->nullable();
            $table->integer('nomor');

            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('type_id');

            $table->string('nama_test_case');
            $table->text('steps');
            $table->text('test_data')->nullable();
            $table->text('expected_result');

            // new field
            $table->enum('case_type', ['positive', 'negative'])->default('positive');
            $table->enum('admin_status', ['created', 'updated'])->default('created');
            $table->enum('priority', ['critical', 'urgent', 'high', 'medium', 'low'])->default('medium');
            $table->timestamps();

            // Tambah foreign key constraints
            $table->foreign('kategori_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
            $table->json('tags')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_cases');
    }
};