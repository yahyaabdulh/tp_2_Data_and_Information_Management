<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
		{
            $table->bigInteger('role_id')->unsigned()->nullable();
            $table->string('telephone', 25);
            $table->boolean('is_active');
            $table->timestamp('last_login')->nullable();
            $table->text('address')->nullable();
            $table->string('employe_no', 25);
			$table->foreign('role_id')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id');
            $table->dropColumn('telephone');
            $table->dropColumn('is_active');
            $table->dropColumn('last_login');
            $table->dropColumn('address');
            $table->dropColumn('employe_no');
		});
    }
}
