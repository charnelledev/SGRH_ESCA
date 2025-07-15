<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            if (!Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name')->nullable()->after('name');
            }

            if (!Schema::hasColumn('users', 'telephone')) {
                $table->string('telephone')->nullable()->after('email');
            }

            if (!Schema::hasColumn('users', 'emploi_id')) {
                $table->foreignId('emploi_id')->nullable()
                    ->constrained('emplois')
                    ->nullOnDelete()
                    ->after('telephone');
            }

            if (!Schema::hasColumn('users', 'grade_id')) {
                $table->foreignId('grade_id')->nullable()
                    ->constrained('grades')
                    ->nullOnDelete()
                    ->after('emploi_id');
            }

            if (!Schema::hasColumn('users', 'region_id')) {
                $table->foreignId('region_id')->nullable()
                    ->constrained('regions')
                    ->nullOnDelete()
                    ->after('grade_id');
            }

            if (!Schema::hasColumn('users', 'salary_min')) {
                $table->decimal('salary_min', 10, 2)->nullable()->after('region_id');
            }

            if (!Schema::hasColumn('users', 'salary_max')) {
                $table->decimal('salary_max', 10, 2)->nullable()->after('salary_min');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['emploi_id']);
            $table->dropForeign(['grade_id']);
            $table->dropForeign(['region_id']);

            $table->dropColumn([
                'last_name',
                'telephone',
                'emploi_id',
                'grade_id',
                'region_id',
                'salary_min',
                'salary_max',
            ]);
        });
    }
};
