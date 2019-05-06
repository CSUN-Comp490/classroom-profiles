<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Migration auto-generated by Sequel Pro Laravel Export (1.5.0)
 * @see https://github.com/cviebrock/sequel-pro-laravel-export
 */
class CreateEquipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equip', function (Blueprint $table) {
            $table->string('College', 16)->nullable();
            $table->string('Building_Room', 16)->nullable();
            $table->string('Bldg', 2)->nullable();
            $table->integer('Room')->nullable();
            $table->string('Station_Count', 3)->nullable();
            $table->string('Large_Lecture_Hall_or_Classroom', 9)->nullable();
            $table->integer('Support_Contact_Number')->nullable();
            $table->string('Media_Equipment_Location_Black_Box_lectern', 8)->nullable();
            $table->integer('Number_of_Projectors')->nullable();
            $table->string('Projector_Model', 9)->nullable();
            $table->string('Projector_Serial', 42)->nullable();
            $table->string('AirTame_Y_N', 2)->nullable();
            $table->string('Instructor_Monitor_Y_N', 3)->nullable();
            $table->string('Monitor_Make_and_Model', 24)->nullable();
            $table->integer('Number_of_Screens')->nullable();
            $table->string('Projector_Screen_Type_Manual_Motorized', 10)->nullable();
            $table->string('Check_Screen_Rate_1_5_1_Bad_Rating_done_in_Summer_2018', 18)->nullable();
            $table->string('Screen_Size_4_3_16_9', 4)->nullable();
            $table->string('Internal_DVD_player_located_in_PC', 3)->nullable();
            $table->string('Airserver_Y_N', 3)->nullable();
            $table->string('HDMI_Y_N', 3)->nullable();
            $table->string('Apple_TV_Y_N', 3)->nullable();
            $table->string('Lecture_Capture_Y_N', 3)->nullable();
            $table->string('Document_Camera_Y_N', 22)->nullable();
            $table->integer('Doc_Cam_Serial_No')->nullable();
            $table->string('Accommodate_Add_l_Microphones_How_Many', 7)->nullable();
            $table->string('Microphone_Y_N', 4)->nullable();
            $table->integer('MLC_Default_PC_Verification')->nullable();
            $table->string('Mount_Key', 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equip');
    }
}