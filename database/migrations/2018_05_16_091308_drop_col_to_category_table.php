<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColToCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category', function (Blueprint $table) {
            //
            //$table->dropColumn('category_intro');
            //$table->dropColumn('category_module');
            //$table->dropColumn('category_seo_title');
            //$table->dropColumn('category_seo_keywords');
            //$table->dropColumn('category_seo_description');
            //$table->dropColumn('category_ismenu');
            //$table->dropColumn('catparent_id');
            $table->dropColumn('language_id');
            $table->dropColumn('category_layout');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category', function (Blueprint $table) {
            //
        });
    }
}
