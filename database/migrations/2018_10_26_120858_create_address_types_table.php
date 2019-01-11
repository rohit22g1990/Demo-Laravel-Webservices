<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_types', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('type', 100)->unique();
            $table->string('created_by', 36);
            $table->enum('is_default', ['0', '1'])->default(0)->comment('1 for default address type');
            $table->enum('type_of', ['home', 'company', 'mailing', 'future', 'other'])
                ->default('other')->comment('other for default contact type');
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
        Schema::dropIfExists('address_types');
    }
}
