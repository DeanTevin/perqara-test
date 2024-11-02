<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Log_Level Migration Class
 * 
 * This class introduces a table where logging levels are stored. These logging levels are referenced
 * using [RFC-5424](https://datatracker.ietf.org/doc/html/rfc5424) Section 6, Page 10: Table 2. Syslog Message Severities
 * 
 * @extends Migration
 */
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_level', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('severity');
            $table->string('description',200);
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_level');
    }
};
