<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->string('numero_tarjeta', 16)->unique();
            $table->enum('tipo_tarjeta', ['credito', 'debito']);
            $table->date('fecha_expiracion');
            $table->string('cvv', 4);
            // $table->decimal('limite_credito', 15, 2)->nullable(); TARJETAS DE CREDITO
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
