<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    /** İlişkisel veri tablosunda,ilişki kurulacak olan sütunun veri tipini unsigned olarak kullan  */
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('image');
            $table->longText('content');
            $table->integer('hit')->default(0);
            $table->integer('status')->default(0)->comment('0:passive 1:active');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');
                  
        
        });
    }

/** categories tablosundaki id ile beraber articles tablosundaki category_id ile ilişkilendirme yapıldı ve iki tablo arasında ilişkilendirme yapıldı. */
/** Category tablosu silinir ise , ilişkiye ait tabloda silinir  */
/** eğer fun kategorisi tablosu silinirse o kategoriye ait yazılarda silinir*/
/**->onDelete('cascade');  kategori ile artıcles tablosu birbirine bağlı */


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
