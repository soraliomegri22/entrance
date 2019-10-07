<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeelingBackupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeling_backup', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->integer('men_id')->comment('男性ID')->nullable();
            $table->string('men_name', 20)->comment('男性名前')->nullable();
            $table->integer('women_id')->comment('女性ID')->nullable();
            $table->string('women_name', 20)->comment('女性名前')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('登録日時');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'))->comment('更新日時');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feeling_backup');
    }
}
