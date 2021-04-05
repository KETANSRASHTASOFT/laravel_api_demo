<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('employees_id');
            $table->integer('company')->unsigned();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',100)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('address',100)->nullable();
            $table->timestamps();
            $table->foreign('company')->references('companies_id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
