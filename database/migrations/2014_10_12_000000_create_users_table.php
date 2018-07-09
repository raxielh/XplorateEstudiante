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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Super Root',
            'email' => 'rodrigo@gmail.com',
            'password' => '$2y$10$ji6WSbe4u3hx0wwiiVUBcuj/52syF7Wln272IT8wEX4c/GzMJQNLu'
        ]);

        DB::table('users')->insert([
            'name' => 'Cristian',
            'email' => 'caho@gmail.com',
            'password' => '$2y$10$ji6WSbe4u3hx0wwiiVUBcuj/52syF7Wln272IT8wEX4c/GzMJQNLu'
        ]);
        
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
