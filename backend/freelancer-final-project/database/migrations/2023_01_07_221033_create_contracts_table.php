<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('freelancer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->foreignId('proposal_id')->unique()->constrained('proposals');
            $table->enum('type', ['fixed', 'hourly']);
            $table->unsignedFloat('cost');
            $table->unsignedFloat('hours')->nullable()->default(0); // depend on type
            $table->enum('status', ['active', 'completed', 'terminated'])->default('active');
            $table->date('start_on');
            $table->date('end_on');
            $table->date('completed_on')->nullable();
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
        Schema::dropIfExists('contracts');
    }
};
