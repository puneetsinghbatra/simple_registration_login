<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type',15);
            $table->string('profile_picture',100);
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email')->unique();
            $table->string('username',100)->unique();
            $table->string('password',100);
            $table->mediumText('address');
            $table->char('gender', 10);
            $table->string('date_of_birth',25);
            $table->text('hobbies');
            $table->string('remember_token',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
