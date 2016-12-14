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
            $table->uuid('id');
            $table->smallInteger('student_id')->unique();;
            $table->string('first');
            $table->string('last');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('agreed', ['Y', 'N'])->default('N');
            $table->enum('type', ['teacher', 'admin', 'student'])->default('student');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');
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
