<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNapfaDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('schools', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('description');
          $table->timestamps();
      });

      Schema::create('napfa_dates', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('school_id');
          //$table->foreign('school_id')->references('id')->on('schools');
          $table->date('regOpenDate');
          $table->date('regCloseDate');
          $table->date('testDate');
          $table->string('venue');
          $table->integer('regMax');
          $table->integer('bidNumStart');
          $table->string('stations');
          $table->timestamps();
      });

      Schema::create('users', function (Blueprint $table) {
          $table->increments('id');
          $table->boolean('enabled');
          $table->string('loginId');
          $table->string('name');
          $table->string('systemrole');
          $table->string('email');
          $table->string('remember_token');
          $table->string('contact');
          $table->timestamps();
      });

      Schema::create('moe_ages', function (Blueprint $table) {
          $table->increments('id');
          $table->string('age');
          $table->timestamps();
      });

      Schema::create('mindef_ages', function (Blueprint $table) {
          $table->increments('id');
          $table->string('age');
          $table->timestamps();
      });

      Schema::create('moe_criterias', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('moeage_id');
          //$table->foreign('moeage_id')->references('id')->on('moe_ages');
          $table->string('gender');
          $table->string('stations');
          $table->string('pGrade');
          $table->string('pBand');
          $table->integer('moePoint');
          $table->string('maxValue');
          $table->string('gauging');
          $table->string('minValue');
          $table->timestamps();
      });

      Schema::create('mindef_criterias', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('mindefage_id');
          //$table->foreign('mindefage_id')->references('id')->on('mindef_ages');
          $table->string('gender');
          $table->string('stations');
          $table->integer('mindefPoint');
          $table->string('maxValue');
          $table->string('gauging');
          $table->string('minValue');
          $table->timestamps();
      });

<<<<<<< HEAD
      Schema::create('book_tests', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('napfa_date_id');
          //$table->foreign('napfa_date_id')->references('id')->on('napfa_dates');
          $table->string('gender');
          $table->string('dateOfBirth');
          $table->string('email');
          $table->integer('bidnum');
          $table->timestamps();
      });
=======
        Schema::create('book_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('napfa_date_id');
            $table->foreign('napfa_date_id')->references('id')->on('napfadates');
            $table->string('gender');
            $table->string('dateOfBirth');
            $table->string('email');
            $table->integer('bidNum');
            $table->timestamps();
        });
>>>>>>> origin/master

      Schema::create('supports', function (Blueprint $table) {
          $table->increments('id');
          $table->string('description');
          $table->timestamps();
      });

<<<<<<< HEAD
      Schema::create('view_registers', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('book_test_id');
          //$table->foreign('book_test_id')->references('id')->on('book_tests');
          $table->string('date');
          $table->string('school');
          $table->string('adminNum');
          $table->string('name');
          $table->integer('age');
          $table->string('dateOfBirth');
          $table->string('gender');
          $table->string('email');
          $table->string('message');
          $table->timestamps();
      });
=======
        Schema::create('view_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('napfa_date_id');
            $table->foreign('napfa_date_id')->references('id')->on('napfadates');
            $table->integer('book_test_id');
            $table->foreign('book_test_id')->references('id')->on('booktests');
            $table->string('date');
            $table->string('school');
            $table->string('adminNum');
            $table->string('name');
            $table->integer('age');
            $table->string('dateOfBirth');
            $table->string('gender');
            $table->string('email');
            $table->string('message');
            $table->timestamps();
        });

        Schema::create('display_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pBand');
            $table->string('pGrade');
            $table->string('moePoint');
            $table->string('mindefPoint');
            $table->timestamps();
        });
>>>>>>> origin/master
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('NapfaDates');
        Schema::drop('Schools');
        Schema::drop('Stations');
        Schema::drop('SysUsers');
        Schema::drop('MoeAges');
        Schema::drop('MindefAges');
        Schema::drop('MoeCriterias');
        Schema::drop('MindefCriterias');
        Schema::drop('BookTests');
        Schema::drop('Supports');
        Schema::drop('ViewRegisters');
        Schema::drop('DisplaySections');
    }
}
