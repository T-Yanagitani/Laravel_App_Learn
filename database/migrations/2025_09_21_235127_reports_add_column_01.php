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
            $table->string('name');
            $table->text('article');
			$table->integer('code', false, true);
        });
    }

    /**
     * Reverse the migrations.
     */
	public function down(): void
	{
		Schema::table('reports', function () {
			$table->dropColumn('name');
			$table->dropColumn('article');
			$table->dropColumn('code');
		});
	}
};
