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
        Schema::create('chits', function (Blueprint $table) {
            $table->id();
            $table->uuid();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->morphs('chitable'); // Morphs Rel [Can be 'User, SaveMessage, Group']

            $table->text('message')->nullable();

            $table->boolean('edited');
            $table->timestamp('edited_at');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chits');
    }
};
