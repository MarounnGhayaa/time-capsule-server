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
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->string("title");
            $table->text("message");
            $table->string("mood");
            $table->string("privacy");
            $table->string('unlisted_token')->nullable();
            $table->decimal("longitude", 10, 7)->nullable();
            $table->decimal("latitude", 10, 7)->nullable();
            $table->string("ip_address")->nullable();
            $table->string("country")->nullable();
            $table->string('emoji')->nullable();
            $table->string('image_path')->nullable();
            $table->string('audio_path')->nullable();
            $table->string('cover_image')->nullable();
            $table->dateTime('reveal_at')->nullable();
            $table->string("color")->nullable();
            $table->boolean("is_surprise")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capsules');
    }
};
