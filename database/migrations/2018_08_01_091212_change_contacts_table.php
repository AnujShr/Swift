<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('subject')->after('id');
            $table->string('lname')->after('id');
            $table->string('fname')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->dropColumn('fname');
            $table->dropColumn('lname');
            $table->dropColumn('subject');
        });
    }
}
