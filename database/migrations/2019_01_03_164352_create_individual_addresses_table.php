<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_addresses', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('address_type_id', 36)->index('FK_address_type_id');
            $table->string('address_field1', 255);
            $table->string('address_field2', 255)->nullable()->default(null);
            $table->string('house_number', 10)->nullable()->default(null);
            $table->string('post_code', 10);
            $table->string('country', 30);
            $table->string('city', 30);
            $table->string('company_name', 100)->nullable()->default(null);
            $table->string('copy_company_id', 36)->nullable()->default(null);
            $table->timestamp('effective_by')->nullable()->default(null);
            $table->enum('automatic_transfer', [0, 1])->default(0)->comment('1 for automatic transferred');
            $table->string('phone', 30)->nullable()->default(null);
            $table->string('fax', 30)->nullable()->default(null);
            $table->string('individual_id', 36)->index('FK_individual_address');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('individual_id', 'FK_individual_address')->references('id')->on('individuals')->onDelete('RESTRICT');
            $table->foreign('address_type_id', 'FK_address_type_id')->references('id')->on('address_types')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_addresses');
    }
}
