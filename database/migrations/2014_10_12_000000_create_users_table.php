<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role_id',[1,2]);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
                    'password'=> '$2y$10$tULr2UbGnCMWuixL8/SKyenZinWASxMStxuT424eo0Q9GUb95s/ky',
                    'email'=> 'admin@test.com',
                    'name' => 'Admin',
                    'role_id'=> '1'
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
