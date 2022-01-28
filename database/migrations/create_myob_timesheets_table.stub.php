<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyobTimesheetsTable extends Migration
{
    public function up()
    {
        Schema::create('myob_timesheets', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('myobtimeable');
            $table->string('myob_timesheet_guid', 50)->nullable()->comment('The identifier provided by MYOB');
            $table->string('myob_employee_id', 50)->nullable()->comment('Just saves having to do a lookup all the time');
            $table->string('status', 50)->default('DRAFT')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('hours', 8, 2)->default(0);
            $table->timestamp('synced_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xero_timesheets');
    }
}
