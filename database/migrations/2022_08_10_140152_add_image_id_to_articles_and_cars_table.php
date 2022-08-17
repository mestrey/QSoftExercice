<?php

use App\Models\Image;
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
        Schema::table('articles', function (Blueprint $table) {
            $table->foreignIdFor(Image::class)->unique();
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->foreignIdFor(Image::class)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('image_id');
        });

        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('image_id');
        });
    }
};
