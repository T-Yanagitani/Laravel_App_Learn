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
        Schema::table('reports', function (Blueprint $table) {
            $table->string('tags')->nullable()->default('');
            $table->integer('importance')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
	public function down(): void
	{
		Schema::table('reports', function () {
			$table->dropColumn('tags');
			$table->dropColumn('importance');
		});
	}
};
