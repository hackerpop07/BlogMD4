<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShareLinkPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('share_link_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_send');
            $table->string('post_id');
            $table->string('user_get');
            $table->string('link_post');
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
        Schema::dropIfExists('share_link_posts');
    }
}
