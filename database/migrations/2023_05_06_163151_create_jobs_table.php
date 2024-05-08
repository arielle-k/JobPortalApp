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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            //$table->string('company_id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');

            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('roles');
           // $table->integer('category_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('position');
            $table->string('address');
            $table->string('type');
            $table->integer('status');
            $table->string('salary');
            $table->date('last_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('jobs',function(Blueprint $table){
            $table->dropConstrainedForeignId('user_id');
            $table->dropConstrainedForeignId('company_id');
            $table->dropConstrainedForeignId('category_id');
        });

        Schema::dropIfExists('jobs');
    }
};
