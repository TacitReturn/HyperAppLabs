<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsPremiumToPostsTable extends Migration
{
    public function up()
    {
        Schema::table("posts", function (Blueprint $table) {
            $table->boolean("is_premium")->default(false);
        });
    }

    public function down()
    {
        Schema::table("posts", function (Blueprint $table) {
            Schema::dropColumns("is_premium");
        });
    }
}
