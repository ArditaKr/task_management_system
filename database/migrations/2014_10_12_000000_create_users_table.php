<?php

use App\Team;
use App\User;
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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['m', 'f'])->default('m');
            $table->string('password');
            // $table->string('type')->default('developer');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('team_id')->references('id')->on((new Team)->getTable())->onDelete('set null')->onUpdate('cascade');
            $table->foreign('role_id')->references('id')->on((new Role)->getTable())->onDelete('set null')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on((new User)->getTable())->onDelete('set null')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on((new User)->getTable())->onDelete('set null')->onUpdate('cascade');
        
        });
        User::create([
            'name' => 'Mr. Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'admin'
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
