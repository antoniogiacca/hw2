<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerPrefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
                CREATE TRIGGER gia_preferito BEFORE INSERT ON preferiti FOR EACH ROW 
                BEGIN
                if exists(select * from PREFERITI where user=new.user and veicoli=new.veicoli)
                then
                signal sqlstate "45000" set message_text="Già aggiunto ai preferiti";
                end if; 
                end
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "gia_preferito"');
    }
}
