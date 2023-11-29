<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit_number');
            $table->date('year');
            $table->text('notes');
            $table->auditableDateTimes();
            $table->auditableDateTimeSoftDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
