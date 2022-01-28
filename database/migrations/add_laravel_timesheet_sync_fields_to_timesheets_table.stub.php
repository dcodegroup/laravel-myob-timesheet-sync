<?php

use Dcodegroup\LaravelMyobTimesheetSync\Models\MyobTimesheet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLaravelTimesheetSyncFieldsToTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            $table->after('stop', function ($table) {
                $table->boolean('can_include_in_myob_sync')->default(false);
                $table->double('units', 8, 2);
                $table->foreignIdFor(MyobTimesheet::class)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('timesheets', function (Blueprint $table) {
            $table->dropColumn([
                'can_include_in_myob_sync',
                'units',
                'myob_timesheet_id',
            ]);
        });
    }
}
