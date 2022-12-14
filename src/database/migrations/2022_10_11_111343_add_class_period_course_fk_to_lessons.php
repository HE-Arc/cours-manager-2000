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
        Schema::table('lessons', function (Blueprint $table) {
            $table->foreignId('class_id')
                ->nullable();


            $table->foreignId('period_id')
                ->nullable();


            $table->foreignId('course_id')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['class_id', 'period_id', 'course_id']);
            $table->dropColumn(['class_id', 'period_id', 'course_id']);
        });
    }
};
