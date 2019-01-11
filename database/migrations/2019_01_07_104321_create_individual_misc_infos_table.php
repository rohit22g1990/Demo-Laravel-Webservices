<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualMiscInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_misc_infos', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('individual_id', 36)->index('FK_individual');

            //Personal Information
            $table->date('dob')->nullable();
            $table->string('birth_place', 50)->nullable();
            $table->string('birth_name', 50)->nullable();
            $table->string('first_names', 50)->nullable();
            $table->enum('marital_status', ['Married', 'single', 'divorced', 'other'])
                ->nullable()->default('single');

            //Professional Information
            $table->string('function_type_id', 36)->index('FK_function_type_id')->nullable();
            $table->text('job_description')->nullable();
            $table->string('bic_code', 20)->nullable();
            $table->string('iban', 20)->nullable();
            $table->string('home_page', 20)->nullable();
            $table->string('id_scan_copy', 255)->nullable();//jpg and png images only

            //Nationality
            $table->string('nationality', 50)->nullable();
            $table->enum('id_type', ['Passport', 'Identity Card', 'Drivers Licence', 'Residence Document'])
                ->nullable()->default('Passport');
            $table->string('id_number', 50)->nullable();
            $table->timestamp('id_expiry_date')->nullable();

            //Insurance
            $table->string('national_insurance', 255)->nullable();
            $table->string('v_number', 10)->nullable();
            $table->string('salutation_id', 36)->index('FK_salutation_id')->nullable();
            $table->string('website', 255)->nullable();

            //Other
            $table->string('department', 100)->nullable();
            $table->string('relation_code', 100)->nullable();
            $table->timestamp('entry_date')->nullable();
            $table->enum('inactive', [0, 1])->default(0)->comment('1 is for inactive');
            $table->enum('no_mailing', [0, 1])->default(0)->comment('1 is for no mailing');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual_misc_infos');
    }
}
