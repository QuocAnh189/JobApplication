<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Job;
use Src\Job\Infrastructure\EloquentModels\JobEloquentModel;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('salary');
            $table->string('location');
            $table->enum('category', JobEloquentModel::$categories);
            $table->enum('experience', JobEloquentModel::$experiences);
            $table->foreignUuid('employer_id')->constrained('employers')->onDelete('cascade');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
