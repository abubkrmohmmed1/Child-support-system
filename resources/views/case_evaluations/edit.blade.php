@extends('layout.app')

@section('title', 'تعديل تقييم الحالة')

@section('content')
<div class="container">
    <h3 style="text-align:center;">تعديل تقييم الحالة</h3>

    <!-- Error Handling Section -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('case-evaluations.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Evaluator Name -->
        <div class="mb-3">
            <label for="evaluator_name">اسم المقيم</label>
            <select name="evaluator_name" id="evaluator_name" class="form-control" required>
                <option value="">اختر المقيم</option>
                @foreach($users as $user)
                    <option value="{{ $user->name }}" {{ $evaluation->evaluator_name == $user->name ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Child Selection -->
        <div class="mb-3">
            <label for="child_id">اختر الطفل</label>
            <select name="child_id" id="child_id" class="form-control" required>
                <option value="">اختر الطفل</option>
                @foreach($children as $child)
                    <option value="{{ $child->id }}" {{ $evaluation->child_id == $child->id ? 'selected' : '' }}>{{ $child->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add other fields here, pre-filled with $evaluation data -->
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>تاريخ الميلاد</label>
                <input type="date" name="birth_date" class="form-control" value="{{ $evaluation->birth_date }}" readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label>النوع</label>
                <input type="text" name="gender" class="form-control" value="{{ $evaluation->gender }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>العنوان</label>
                <input type="text" name="address" class="form-control" value="{{ $evaluation->address }}">
            </div>
            <div class="col-md-6 mb-2">
                <label>رقم الهاتف</label>
                <input type="text" name="phone" class="form-control" value="{{ $evaluation->phone }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>الفصل</label>
                <select name="class" class="form-control">
                    <option value="فصل 1" {{ $evaluation->class == 'فصل 1' ? 'selected' : '' }}>التدخل المبكر</option>
                    <option value="فصل 2" {{ $evaluation->class == 'فصل 2' ? 'selected' : '' }}>صعوبات</option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label>عمل الأب</label>
                <input type="text" name="father_job" class="form-control" value="{{ $evaluation->father_job }}">
            </div>
            <div class="col-md-4 mb-2">
                <label>دراسة الأب</label>
                <input type="text" name="father_education" class="form-control" value="{{ $evaluation->father_education }}">
            </div>
            <div class="col-md-4 mb-2">
                <label>عمر الأب</label>
                <input type="number" name="father_age" class="form-control" value="{{ $evaluation->father_age }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>عمل الأم</label>
                <input type="text" name="mother_job" class="form-control" value="{{ $evaluation->mother_job }}">
            </div>
            <div class="col-md-4 mb-2">
                <label>دراسة الأم</label>
                <input type="text" name="mother_education" class="form-control" value="{{ $evaluation->mother_education }}">
            </div>
            <div class="col-md-4 mb-2">
                <label>عمر الأم</label>
                <input type="number" name="mother_age" class="form-control" value="{{ $evaluation->mother_age }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>اسم مقدم المعلومات</label>
                <input type="text" name="info_provider" class="form-control" value="{{ $evaluation->info_provider }}">
            </div>
            <div class="col-md-6 mb-2">
                <label>صلته بالطفل</label>
                <input type="text" name="relation_to_child" class="form-control" value="{{ $evaluation->relation_to_child }}">
            </div>
        </div>
        <div class="mb-2">
            <label>الطفل يعيش مع</label>
            <select name="living_with" class="form-control">
                <option value="الأب و الأم" {{ $evaluation->living_with == 'الأب و الأم' ? 'selected' : '' }}>الأب و الأم</option>
                <option value="أحد الوالدين" {{ $evaluation->living_with == 'أحد الوالدين' ? 'selected' : '' }}>أحد الوالدين</option>
                <option value="الجد أو الجدة" {{ $evaluation->living_with == 'الجد أو الجدة' ? 'selected' : '' }}>الجد أو الجدة</option>
                <option value="آخرين" {{ $evaluation->living_with == 'آخرين' ? 'selected' : '' }}>آخرين</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>الوضع الاقتصادي للأسرة</label>
                <select name="economic_status" class="form-control">
                    <option value="جيد" {{ $evaluation->economic_status == 'جيد' ? 'selected' : '' }}>جيد</option>
                    <option value="متوسط" {{ $evaluation->economic_status == 'متوسط' ? 'selected' : '' }}>متوسط</option>
                    <option value="ضعيف" {{ $evaluation->economic_status == 'ضعيف' ? 'selected' : '' }}>ضعيف</option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label>عدد الأولاد</label>
                <input type="number" name="siblings_count" class="form-control" value="{{ $evaluation->siblings_count }}">
            </div>
            <div class="col-md-4 mb-2">
                <label>ترتيب الطفل بينهم</label>
                <input type="number" name="child_order" class="form-control" value="{{ $evaluation->child_order }}">
            </div>
        </div>
        <div class="mb-2">
            <label>هل الطفل مدلل الى حد ما في المنزل؟</label>
            <select name="is_spoiled" class="form-control">
                <option value="1" {{ $evaluation->is_spoiled ? 'selected' : '' }}>نعم</option>
                <option value="0" {{ !$evaluation->is_spoiled ? 'selected' : '' }}>لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>هل هناك لغة أخرى غير العربية يتم التحدث بها في المنزل؟</label>
            <input type="text" name="other_language" class="form-control" value="{{ $evaluation->other_language }}">
        </div>
        <div class="mb-2">
            <label>هل تحدثها او فهمها الطفل؟</label>
            <select name="child_understands_other_language" class="form-control">
                <option value="1" {{ $evaluation->child_understands_other_language ? 'selected' : '' }}>نعم</option>
                <option value="0" {{ !$evaluation->child_understands_other_language ? 'selected' : '' }}>لا</option>
            </select>
        </div>

        <div class="mb-2">
            <label>تاريخ المشكلة</label>
            <input type="date" name="problem_date" class="form-control" value="{{ $evaluation->problem_date }}">
        </div>
        <div class="mb-2">
            <label>الشكوى الأساسية</label>
            <textarea name="main_complaint" class="form-control">{{ $evaluation->main_complaint }}</textarea>
        </div>
        <div class="mb-2">
            <label>متى بدأت؟ كيف تعاملت معها الأسرة؟</label>
            <textarea name="problem_history" class="form-control">{{ $evaluation->problem_history }}</textarea>
        </div>
        <div class="mb-2">
            <label>تطور الحالة بمرور الزمن</label>
            <select name="problem_progress" class="form-control">
                <option value="الأحسن" {{ $evaluation->problem_progress == 'الأحسن' ? 'selected' : '' }}>الأحسن</option>
                <option value="الأسوء" {{ $evaluation->problem_progress == 'الأسوء' ? 'selected' : '' }}>الأسوء</option>
            </select>
        </div>
        <div class="mb-2">
            <label>هل هناك مشكلات مشابهة في العائلة؟ وما صلة القرابة بالطفل؟</label>
            <textarea name="family_similar_problems" class="form-control">{{ $evaluation->family_similar_problems }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالنطق أو اللغة؟</label>
            <select name="speech_language_issues" class="form-control">
                <option value="1" {{ $evaluation->speech_language_issues ? 'selected' : '' }}>نعم</option>
                <option value="0" {{ !$evaluation->speech_language_issues ? 'selected' : '' }}>لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="speech_language_issues_desc" class="form-control">{{ $evaluation->speech_language_issues_desc }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالسمع؟</label>
            <select name="hearing_issues" class="form-control">
                <option value="1" {{ $evaluation->hearing_issues ? 'selected' : '' }}>نعم</option>
                <option value="0" {{ !$evaluation->hearing_issues ? 'selected' : '' }}>لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="hearing_issues_desc" class="form-control">{{ $evaluation->hearing_issues_desc }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالانتباه والتركيز أو التواصل؟</label>
            <select name="attention_issues" class="form-control">
                <option value="1" {{ $evaluation->attention_issues ? 'selected' : '' }}>نعم</option>
                <option value="0" {{ !$evaluation->attention_issues ? 'selected' : '' }}>لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="attention_issues_desc" class="form-control">{{ $evaluation->attention_issues_desc }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالقدرات المعرفية والإدراكية؟</label>
            <select name="cognitive_issues" class="form-control">
                <option value="1" {{ $evaluation->cognitive_issues ? 'selected' : '' }}>نعم</option>
                <option value="0" {{ !$evaluation->cognitive_issues ? 'selected' : '' }}>لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="cognitive_issues_desc" class="form-control">{{ $evaluation->cognitive_issues_desc }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل أجرى اختبار ذكاء؟</label>
            <input type="text" name="iq_test" class="form-control" value="{{ $evaluation->iq_test }}">
        </div>
        <div class="mb-2">
            <label>هل تلقى الطفل أي نوع من التقييم أو الفحص أو التشخيص؟</label>
            <input type="text" name="previous_evaluations" class="form-control" value="{{ $evaluation->previous_evaluations }}">
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، أين تم التقييم ومتى؟ وماذا كانت النتيجة؟</label>
            <textarea name="evaluation_details" class="form-control">{{ $evaluation->evaluation_details }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل تلقى طفلك أي نوع من العلاجات الدوائية أو البرامج التدريبية؟</label>
            <input type="text" name="treatments" class="form-control" value="{{ $evaluation->treatments }}">
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك حددها</label>
            <textarea name="treatments_details" class="form-control">{{ $evaluation->treatments_details }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل يمكنك تحديد مشاكل طفلك في المنزل؟</label>
            <textarea name="home_problems" class="form-control">{{ $evaluation->home_problems }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل يمكنك أن تحدد مشاكل طفلك في المدرسة أو خارج المنزل؟</label>
            <textarea name="school_problems" class="form-control">{{ $evaluation->school_problems }}</textarea>
        </div>
        <div class="mb-2">
            <label>مرحلة الولادة: هل كان هناك أي شيء غير طبيعي أثناء فترة الولادة أو الحمل؟</label>
            <textarea name="birth_abnormalities" class="form-control">{{ $evaluation->birth_abnormalities }}</textarea>
        </div>
        <div class="mb-2">
            <label>كم كان عمر الأم عند إنجاب الطفل؟</label>
            <input type="number" name="mother_age_at_birth" class="form-control" value="{{ $evaluation->mother_age_at_birth }}">
        </div>
        <div class="mb-2">
            <label>كم كانت فترة الحمل؟</label>
            <input type="text" name="pregnancy_duration" class="form-control" value="{{ $evaluation->pregnancy_duration }}">
        </div>
        <div class="mb-2">
            <label>هل عانت الأم من ضغوط نفسية أو أمراض أثناء فترة الحمل؟</label>
            <textarea name="mother_pregnancy_issues" class="form-control">{{ $evaluation->mother_pregnancy_issues }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل مكث طفلك في المستشفى بعد الولادة؟ لماذا؟ وما طول هذه الفترة؟</label>
            <textarea name="hospital_stay" class="form-control">{{ $evaluation->hospital_stay }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل يعاني طفلك من مشاكل طبية؟</label>
            <textarea name="medical_issues" class="form-control">{{ $evaluation->medical_issues }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل يزور طفلك الطبيب بانتظام؟</label>
            <textarea name="doctor_visits" class="form-control">{{ $evaluation->doctor_visits }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل يتناول طفلك أي أدوية؟</label>
            <textarea name="medications" class="form-control">{{ $evaluation->medications }}</textarea>
        </div>
        <div class="mb-2">
            <label>هل هناك أي ملاحظات إضافية؟</label>
            <textarea name="additional_notes" class="form-control">{{ $evaluation->additional_notes }}</textarea>
        </div>
        <!-- Continue with other fields similarly -->

        <button type="submit" class="btn btn-primary">تحديث</button>
    </form>
</div>
@endsection