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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId("inspector_id")->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('file_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('property_code');
            $table->date('report_date');
            $table->string('property_description');
            $table->string('property_location_description');
            $table->string('instrument_number');
            $table->date('instrument_date');
            $table->string('property_type');
            $table->boolean('infrastructure')->default(false); // البنية التحتية (Yes/No)
            $table->boolean('water')->default(false); // المياه service
            $table->boolean('electricity')->default(false); // الكهرباء service
            $table->boolean('phone')->default(false); // هاتف service
            $table->boolean('sewage')->default(false); // صرف service
            $table->integer('property_age')->nullable(); // عمر العقار
            $table->enum('usage_status', ['ready', 'under_construction', 'vacant'])->nullable(); // جاهز للاستخدام
            $table->string('number')->nullable(); // رقم
            $table->string('plot_number')->nullable(); // رقم القطعة
            $table->string('source')->nullable(); // المصدر
            $table->string('registration_type')->nullable(); // نوع القيد
            $table->integer('distance')->nullable(); // المسافة
            $table->string('north_boundary')->nullable(); // حدود العقار شمال
            $table->string('south_boundary')->nullable(); // حدود العقار جنوب
            $table->string('east_boundary')->nullable(); // حدود العقار شرق
            $table->string('west_boundary')->nullable(); // حدود العقار غرب
            $table->string('inside_scope')->nullable(); // داخل النطاق
            $table->string('forbidden')->nullable(); // الممنوع
            $table->string('professional_status')->nullable(); // حالة المهن
            $table->string('general_description_of_installation')->nullable(); // وصف عام التنصيب
            $table->integer('number_of_floors')->nullable(); // عدد الادوار
            $table->string('land_evaluation')->nullable(); // تقييم الارض
            $table->string('building_evaluation')->nullable(); // تقييم المباني
            $table->decimal('total_real_estate_value', 10, 2)->nullable();  // إجمال تكاليف العقار
            $table->decimal('Marketing value', 10, 2)->nullable();  // إجمال تكاليف العقار
            $table->text('real_estate_details')->nullable(); // Real estate details
            $table->text('best_in_case_of_conflicting_interests')->nullable(); // الأفضل في حالة تنازع المصالح
            $table->string('Measurement')->nullable();
            $table->string('inspection')->nullable();
            $table->text('general_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
