<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrequentClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('frequent_clients', function (Blueprint $table) {
            $table->id(); // id auto incrementable
            $table->foreignId('clientId')->constrained('clients')->onDelete('cascade'); // Referencia a la tabla clients
            $table->foreignId('productId')->constrained('products')->onDelete('cascade'); // Referencia a la tabla products
            $table->integer('numberOfPurchases'); // Número de compras
            $table->boolean('status')->default(true); // Estado: si el cliente es frecuente o no
            $table->timestamps(); // timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('frequent_clients');
    }
}
