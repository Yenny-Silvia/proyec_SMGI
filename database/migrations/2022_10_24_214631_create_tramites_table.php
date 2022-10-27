<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramitesTable extends Migration
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

        Schema::create($tableNames['tramites'], function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dependencias');
            $table->string('referencias',150);
            $table->integer('fojas');
            $table->timestamps();

            $table->foreign('id_dependencias')
                ->references('id')
                ->on($tableNames['dependencias'])
                ->onDelete('cascade');

            $table->primary(['id_dependencias'], 'tramites_tramite_id_id_dependencias_primary');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($tableNames['tramites']);
    }
}
