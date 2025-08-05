<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('penghulu_id')->nullable()->constrained('penghulus')->onDelete('set null');
            $table->string('bride_name');
            $table->string('groom_name');
            $table->date('wedding_date');
            $table->date('confirmed_date')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, rejected
            $table->timestamps();
        });
    }

    public function down(): void
{
    Schema::table('registrations', function (Blueprint $table) {
        $table->dropForeign(['user_id']); // Hapus foreign key user_id
        $table->dropForeign(['penghulu_id']); // Hapus foreign key penghulu_id
    });
    Schema::dropIfExists('registrations');
}
};