<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_contacts', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('value', 255);
            $table->string('contact_type_id', 36)->index('FK_contact_type_id');
            $table->string('individual_id', 36)->index('FK_individual_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contact_type_id', 'FK_contact_type_id')->references('id')->on('contact_types')->onDelete('RESTRICT');
            $table->foreign('individual_id', 'FK_individual_id')->references('id')->on('individuals')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_contacts');
    }
}
