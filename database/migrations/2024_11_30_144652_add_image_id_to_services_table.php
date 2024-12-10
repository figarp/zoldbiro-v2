<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('image_id')->nullable()->after('price');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropColumn('image_id');
        });
    }
};
