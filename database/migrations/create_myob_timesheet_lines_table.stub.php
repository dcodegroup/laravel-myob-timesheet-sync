<?php

use Dcodegroup\LaravelMyobTimesheetSync\Models\MyobTimesheet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyobTimesheetLinesTable extends Migration
{
    public function up()
    {
        Schema::create('myob_timesheet_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MyobTimesheet::class);
            $table->string('earnings_rate_configuration_key');
            $table->string('myob_earnings_rate_id', 50);
            $table->string('myob_tracking_item_id', 50)->nullable()->comment('rarely used but just in case its needed');
            $table->date('date');
            $table->double('units', 8, 2);
            $table->double('units_override', 8, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('myob_timesheet_lines');
    }
}
