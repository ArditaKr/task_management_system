<?php

use App\User;
use App\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on((new Project)->getTable())->onDelete('set null')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on((new User)->getTable())->onDelete('set null')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on((new User)->getTable())->onDelete('set null')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on((new User)->getTable())->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_users');
    }
}
