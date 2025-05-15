<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('logo')->nullable();
            $table->string('secteur');
            $table->string('taille');
            $table->string('pays_siege');
            $table->string('regions_afrique')->nullable();
            $table->string('site_web')->nullable();
            $table->boolean('twitter')->default(false);
            $table->boolean('linkedin')->default(false);
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('email_contact');
            $table->string('telephone');
            $table->string('contact_rse')->nullable();
            $table->text('politique_inclusion')->nullable();
            $table->text('programmes_integration')->nullable();
            $table->integer('postes_stages_annuels')->default(0);
            $table->text('dispositifs_formation')->nullable();
            $table->text('partenariats_osc')->nullable();
            $table->text('initiatives_mecenat')->nullable();
            $table->string('competences_pro_bono')->nullable();
            $table->text('profils_recherches')->nullable();
            $table->string('regions_recrutement')->nullable();
            $table->text('processus_integration')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
