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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('document');
            $table->string('key', 44)->unique();
            $table->string('emitter_document');
            $table->string('emitter_name');
            $table->string('emitter_city');
            $table->string('emitter_state', 2);
            $table->string('receiver_document');
            $table->string('receiver_name');
            $table->string('receiver_city');
            $table->string('receiver_state', 2);
            $table->string('carrier_document')->nullable();
            $table->string('carrier_name')->nullable();
            $table->string('carrier_city')->nullable();
            $table->string('carrier_state', 2)->nullable();
            $table->timestamp('issue_date');
            //api
            $table->string('internal_number');
            //retorno b3
            $table->boolean('status')->default(true);

            $table->string('hash')->nullable();
            $table->string('instituicao_financeira')->nullable();
            $table->timestamp('timestamp_event')->nullable();

            $table->boolean('is_running_job')->default(false);
            $table->string('running_job_name')->nullable();

            $table->text('error_message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
