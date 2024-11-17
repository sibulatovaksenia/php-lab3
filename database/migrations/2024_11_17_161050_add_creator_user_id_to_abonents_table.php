<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatorUserIdToAbonentsTable extends Migration
{
    public function up()
    {
        Schema::table('abonents', function (Blueprint $table) {
            $table->foreignId('creator_user_id')->nullable()->constrained('users');
        });
    }

    public function down()
    {
        Schema::table('abonents', function (Blueprint $table) {
            $table->dropColumn('creator_user_id');
        });
    }
}
