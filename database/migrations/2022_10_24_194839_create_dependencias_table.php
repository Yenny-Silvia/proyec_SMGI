<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('tramite.table_names');
        
        if (empty($tableNames)) {
            throw new \Exception('Error: config/tramite.php not loaded. Run [php artisan config:clear] and try again.');
        }

        Schema::create($tableNames['dependencias'], function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->string('sigla',150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependencias');
    }
}
