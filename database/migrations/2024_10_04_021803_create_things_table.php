<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear las tablas sin claves foráneas primero
        Schema::create('thing_location', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 150);
            $table->timestamps();
        });

        Schema::create('thing_status', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 150);
            $table->timestamps();
        });

        Schema::create('thing_type', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 150);
            $table->string('default_icon', 100)->nullable();
            $table->timestamps();
        });

        Schema::create('hub', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->ipAddress('ipv4_address');
            $table->macAddress('mac')->nullable();
            $table->string('mqtt_address', 100)->nullable();
            $table->string('mqtt_port', 100)->nullable();
            $table->ipAddress('ipv4_external_address')->nullable();
            $table->timestamps();
        });

        Schema::create('device_type', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 150);
            $table->timestamps();
        });

        Schema::create('device', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 150);
            $table->enum('status', ['enabled', 'disabled'])->default('enabled');
            $table->ipAddress('ip_address');
            $table->macAddress('mac_address');
            $table->string('firmware_version');
            $table->unsignedBigInteger('device_type_id');
            $table->timestamps();
        });

        Schema::create('thing', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('description', 150);
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('thing_type_id');
            $table->unsignedBigInteger('status_id');
            $table->string('icon');
            $table->timestamps();
        });

        Schema::create('thing_device', function (Blueprint $table) {
            $table->unsignedBigInteger('thing_id');
            $table->unsignedBigInteger('device_id');
            $table->primary(['thing_id', 'device_id']);
        });

        Schema::create('thing_hub', function (Blueprint $table) {
            $table->unsignedBigInteger('thing_id');
            $table->unsignedBigInteger('hub_id');
            $table->primary(['thing_id', 'hub_id']);
        });

        // Añadir las claves foráneas después de que todas las tablas estén creadas
        Schema::table('thing', function (Blueprint $table) {
            $table->foreign('location_id')->references('id')->on('thing_location');
            $table->foreign('thing_type_id')->references('id')->on('thing_type');
            $table->foreign('status_id')->references('id')->on('thing_status');
        });

        Schema::table('thing_device', function (Blueprint $table) {
            $table->foreign('thing_id')->references('id')->on('thing')->onDelete('cascade');
            $table->foreign('device_id')->references('id')->on('device')->onDelete('cascade');
        });

        Schema::table('thing_hub', function (Blueprint $table) {
            $table->foreign('thing_id')->references('id')->on('thing')->onDelete('cascade');
            $table->foreign('hub_id')->references('id')->on('hub')->onDelete('cascade');
        });

        Schema::table('device', function (Blueprint $table) {
            $table->foreign('device_type_id')->references('id')->on('device_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar las claves foráneas primero
        Schema::table('thing', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropForeign(['thing_type_id']);
            $table->dropForeign(['status_id']);
        });

        Schema::table('thing_device', function (Blueprint $table) {
            $table->dropForeign(['thing_id']);
            $table->dropForeign(['device_id']);
        });

        Schema::table('thing_hub', function (Blueprint $table) {
            $table->dropForeign(['thing_id']);
            $table->dropForeign(['hub_id']);
        });

        Schema::table('device', function (Blueprint $table) {
            $table->dropForeign(['device_type_id']);
        });

        // Eliminar las tablas
        Schema::dropIfExists('thing_device');
        Schema::dropIfExists('thing_hub');
        Schema::dropIfExists('thing');
        Schema::dropIfExists('hub');
        Schema::dropIfExists('device');
        Schema::dropIfExists('thing_location');
        Schema::dropIfExists('thing_status');
        Schema::dropIfExists('thing_type');
        Schema::dropIfExists('device_type');
    }
};
