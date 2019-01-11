<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableIndividualMiscInfosAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('individual_misc_infos', function (Blueprint $table) {
            $table->foreign('salutation_id', 'FK_salutation')->references('id')->on('salutation')->onDelete('RESTRICT');
            $table->foreign('individual_id', 'FK_individual')->references('id')->on('individuals')->onDelete('RESTRICT');
            $table->foreign('function_type_id', 'FK_function_type_id')->references('id')->on('function_types')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('individual_misc_infos', function (Blueprint $table) {
            $table->dropForeign('FK_salutation');
            $table->dropForeign('FK_individual');
            $table->dropForeign('FK_function_type_id');
        });
    }
}
