@extends('layout.app')

@section('content')
<div class="container">
    <h4>تفاصيل تقييم الحالة للطفل: {{ $evaluation->child->name }}</h4>
    <x-print-button />

    <div class="card mt-3">
        <div class="card-body">
            <p><strong>اسم المُقيّم:</strong> {{ $evaluation->evaluator_name }}</p>
            <p><strong>تاريخ الميلاد:</strong> {{ $evaluation->birth_date }}</p>
            <p><strong>النوع:</strong> {{ $evaluation->gender }}</p>
            <p><strong>العنوان:</strong> {{ $evaluation->address }}</p>
            <p><strong>رقم الهاتف:</strong> {{ $evaluation->phone }}</p>
            <p><strong>الفصل:</strong> {{ $evaluation->class }}</p>
            <p><strong>عمل الأب:</strong> {{ $evaluation->father_job }}</p>
            <p><strong>دراسة الأب:</strong> {{ $evaluation->father_education }}</p>
            <p><strong>عمر الأب:</strong> {{ $evaluation->father_age }}</p>
            <p><strong>عمل الأم:</strong> {{ $evaluation->mother_job }}</p>
            <p><strong>دراسة الأم:</strong> {{ $evaluation->mother_education }}</p>
            <p><strong>عمر الأم:</strong> {{ $evaluation->mother_age }}</p>
            <p><strong>اسم مقدم المعلومات:</strong> {{ $evaluation->info_provider }}</p>
            <p><strong>صلته بالطفل:</strong> {{ $evaluation->relation_to_child }}</p>
            <p><strong>الطفل يعيش مع:</strong> {{ $evaluation->living_with }}</p>
            <p><strong>الوضع الاقتصادي للأسرة:</strong> {{ $evaluation->economic_status }}</p>
            <p><strong>عدد الأولاد:</strong> {{ $evaluation->siblings_count }}</p>
            <p><strong>ترتيب الطفل بينهم:</strong> {{ $evaluation->child_order }}</p>
            <p><strong>هل الطفل مدلل الى حد ما في المنزل؟:</strong> {{ $evaluation->is_spoiled ? 'نعم' : 'لا' }}</p>
            <p><strong>هل هناك لغة أخرى غير العربية يتم التحدث بها في المنزل؟:</strong> {{ $evaluation->other_language }}</p>
            <p><strong>هل تحدثها او فهمها الطفل؟:</strong> {{ $evaluation->child_understands_other_language ? 'نعم' : 'لا' }}</p>
            <p><strong>تاريخ التقييم:</strong> {{ $evaluation->evaluation_date }}</p>
            <p><strong>الحالة الجسدية:</strong> {{ $evaluation->physical_condition }}</p>
            <p><strong>الحالة النفسية:</strong> {{ $evaluation->psychological_state }}</p>
            <p><strong>الوضع الأسري:</strong> {{ $evaluation->family_status }}</p>
            <p><strong>الخلفية التعليمية:</strong> {{ $evaluation->educational_background }}</p>
            <p><strong>التوصيات:</strong> {{ $evaluation->recommendations }}</p>
            <!-- Add other fields here -->
        </div>
    </div>

    <a href="{{ route('children.index') }}" class="btn btn-secondary mt-3">رجوع</a>
</div>
@endsection
