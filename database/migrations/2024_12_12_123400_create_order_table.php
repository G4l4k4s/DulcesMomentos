<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id auto incrementable
            $table->foreignId('clientId')->constrained('clients')->onDelete('cascade'); // Referencia a la tabla clients
            $table->foreignId('employeId')->constrained('employes')->onDelete('cascade'); // Referencia a la tabla employes
            $table->foreignId('productId')->constrained('products')->onDelete('cascade'); // Referencia a la tabla products
            $table->integer('quantity'); // Cantidad
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
        Schema::dropIfExists('orders');
    }
}
