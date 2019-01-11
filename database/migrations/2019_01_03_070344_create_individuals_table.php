<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('title', 100)->nullable()->default(null);
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('initial', 10);
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->string('profile_pic', 255)->nullable()->default(null);
            $table->string('created_by', 36);
            $table->string('relation_type_id', 36)->index('FK_relation_type_id');
            $table->string('account_manager_id', 36)->index('FK_account_manager_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('relation_type_id', 'FK_relation_type_id')->references('id')->on('relation_types')->onDelete('RESTRICT');
            $table->foreign('account_manager_id', 'FK_account_manager_id')->references('id')->on('account_managers')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individuals');
    }
}
