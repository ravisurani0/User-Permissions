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
        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->bigInteger('permission_table_id')->unsigned()->index();
            $table->foreign('permission_table_id')->references('id')->on('permission_tables')->onDelete('cascade');

            $table->string('permission_key')->nullable(true);

            $table->boolean('index')->default(false);
            $table->boolean('show')->default(false);
            $table->boolean('store')->default(false);
            $table->boolean('create')->default(false);
            $table->boolean('update')->default(false);
            $table->boolean('edit')->default(false);
            $table->boolean('destroy')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_has_permissions');
    }
};
