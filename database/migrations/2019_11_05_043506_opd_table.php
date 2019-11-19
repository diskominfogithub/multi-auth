<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OpdTable extends Migration
{
    
    public function up(){
        Schema::create("opd",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->string("nama_opd")
                ->nullable(false);
        });
    }

    
    public function down(){
        Schema::dropIfExists("opd");
    }
}
                                                            