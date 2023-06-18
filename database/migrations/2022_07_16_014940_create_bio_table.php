<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateBioTable extends Migration
    {
        public function up()
        {
            Schema::create('bio', function (Blueprint $table) {
                $table->id();
                $table->text('bio');
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('bio');
        }
    }
