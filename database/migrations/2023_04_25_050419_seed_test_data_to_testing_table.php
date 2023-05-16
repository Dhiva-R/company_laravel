<?php

use App\Models\Testing;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTestDataToTestingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Testing::create([
                'name'=>'experi',
                'place'=>'laravel',
            ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testing', function (Blueprint $table) {
            //
        });
    }
}
