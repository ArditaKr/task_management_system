<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('level', ['low', 'medium', 'urgent'])->default('low');
            $table->enum('status', ['toDo', 'doing', 'done'])->default('toDo');
            $table->date('starting_date')->nullable();
            $table->date('ending_date')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('assigned_to')->references('id')->on((new User)->getTable())->onDelete('set null')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on((new Project)->getTable())->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('tasks');
    }
}
