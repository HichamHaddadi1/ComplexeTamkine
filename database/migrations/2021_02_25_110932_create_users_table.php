<?php





use Illuminate\Database\Migrations\Migration;


use Illuminate\Database\Schema\Blueprint;


use Illuminate\Support\Facades\Schema;





class CreateUsersTable extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tel')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions');
            $table->enum('role', ['admin', 'orientateur', 'participant']);  //admin - orientateur - participant
            $table->rememberToken();
            $table->timestamps();
        });

    }





    /**


     * Reverse the migrations.


     *


     * @return void


     */


    public function down()


    {


        Schema::dropIfExists('users');


    }


}


