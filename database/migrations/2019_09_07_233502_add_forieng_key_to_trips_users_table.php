<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForiengKeyToTripsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_users', function (Blueprint $table) {
            $table->foreign('trip_id')
            ->references('id')->on('trips')
            ->onDelete('cascade');

             $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

            
            });

           
            

           
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips_users', function (Blueprint $table) {
            //
        });
    }
}
