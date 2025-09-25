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
        //
		Schema::table('comments', function (Blueprint $table) {
			$table->renameColumn('parent_id', 'report_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
		Schema::table('comments', function () {
			$table->renameColumn('report_id', 'parent_id')->change();
		});
    }
};
