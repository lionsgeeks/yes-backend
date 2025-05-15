<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->integer('creation_year');
            $table->string('legal_status');
            $table->string('other_legal_status')->nullable();
            $table->string('country')->nullable(); 
            $table->string('regions')->nullable();
            $table->string('website')->nullable();
            $table->boolean('social_facebook')->default(false);
            $table->boolean('social_twitter')->default(false);
            $table->boolean('social_linkedin')->default(false);
            $table->boolean('social_instagram')->default(false);
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('main_email');
            $table->string('phone');
            $table->text('postal_address')->nullable();
            $table->string('contact_name');
            $table->string('contact_function');
            $table->string('contact_email');
            $table->json('intervention_areas')->nullable();
            $table->text('target_groups');
            $table->integer('annual_beneficiaries')->nullable();
            $table->string('program_title')->nullable();
            $table->text('program_description')->nullable();
            $table->text('methodological_approach')->nullable();
            $table->string('result1')->nullable();
            $table->string('result2')->nullable();
            $table->string('result3')->nullable();
            $table->text('technical_partners')->nullable();
            $table->text('financial_partners')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->boolean('is_approved')->default(false);
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }

    
};
