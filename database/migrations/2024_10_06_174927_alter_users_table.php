<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'firstName');
            $table->string('lastName')->nullable()->after('firstName');
            $table->date('birthdate')->nullable();
            $table->enum('gender', ['Male', 'Female']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('birthdate');
            $table->dropColumn('lastName');
            $table->renameColumn('firstName', 'name');
        });

    }
};
