@extends('layout.app')

@section('title', 'استمارة تقييم حالة اضطرابات النطق واللغة')

@section('content')
<x-print-button />
<div class="container">
    <h3 style="text-align:center;">استمارة تقييم حالة اضطرابات النطق واللغة</h3>
    <!-- <a href="{{ route('case-evaluations.index') }}" class="btn btn-primary mb-3">
        عرض كل تقييمات الحالات
    </a> -->

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

    <form action="{{ route('case-evaluations.store') }}" method="POST">
        @csrf

        <!-- 1: التعريف بالحالة -->
        <h5>1: التعريف بالحالة</h5>
        <div class="mb-3">
    <label for="evaluator_name">اسم المقيم</label>
    <select name="evaluator_name" id="evaluator_name" class="form-control" required>
        <option value="">اختر المقيم</option>
        @foreach($users as $user)
            <option value="{{ $user->name }}">{{ $user->name }}</option>
        @endforeach
    </select>
</div>
        <div class="row">
        <div class="mb-3">
            <label for="child_id">اختر الطفل</label>
            <select name="child_id" id="child_id" class="form-control" required>
                <option value="">اختر الطفل</option>
                @foreach($children as $child)
                    <option value="{{ $child->id }}">{{ $child->name }}</option>
                @endforeach
            </select>
        </div>
            <div class="col-md-4 mb-2">
                <label>تاريخ الميلاد</label>
                <input type="date" name="birth_date" class="form-control" value="{{ $child->birth_date }}" readonly>
            </div>
            <div class="col-md-4 mb-2">
                <label>النوع</label>
                <input type="text" name="gender" class="form-control" value="{{ $child->gender }}" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>العنوان</label>
                <input type="text" name="address" class="form-control">
            </div>
            <div class="col-md-6 mb-2">
                <label>رقم الهاتف</label>
                <input type="text" name="phone" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>الفصل</label>
                <select name="class" class="form-control">
                    <option value="فصل 1">التدخل المبكر</option>
                    <option value="فصل 2">صعوبات</option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label>عمل الأب</label>
                <input type="text" name="father_job" class="form-control">
            </div>
            <div class="col-md-4 mb-2">
                <label>دراسة الأب</label>
                <input type="text" name="father_education" class="form-control">
            </div>
            <div class="col-md-4 mb-2">
                <label>عمر الأب</label>
                <input type="number" name="father_age" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>عمل الأم</label>
                <input type="text" name="mother_job" class="form-control">
            </div>
            <div class="col-md-4 mb-2">
                <label>دراسة الأم</label>
                <input type="text" name="mother_education" class="form-control">
            </div>
            <div class="col-md-4 mb-2">
                <label>عمر الأم</label>
                <input type="number" name="mother_age" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>اسم مقدم المعلومات</label>
                <input type="text" name="info_provider" class="form-control">
            </div>
            <div class="col-md-6 mb-2">
                <label>صلته بالطفل</label>
                <input type="text" name="relation_to_child" class="form-control">
            </div>
        </div>
        <div class="mb-2">
            <label>الطفل يعيش مع</label>
            <select name="living_with" class="form-control">
                <option value="الأب و الأم">الأب و الأم</option>
                <option value="أحد الوالدين">أحد الوالدين</option>
                <option value="الجد أو الجدة">الجد أو الجدة</option>
                <option value="آخرين">آخرين</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>الوضع الاقتصادي للأسرة</label>
                <select name="economic_status" class="form-control">
                    <option value="جيد">جيد</option>
                    <option value="متوسط">متوسط</option>
                    <option value="ضعيف">ضعيف</option>
                </select>
            </div>
            <div class="col-md-4 mb-2">
                <label>عدد الأولاد</label>
                <input type="number" name="siblings_count" class="form-control">
            </div>
            <div class="col-md-4 mb-2">
                <label>ترتيب الطفل بينهم</label>
                <input type="number" name="child_order" class="form-control">
            </div>
        </div>
        <div class="mb-2">
            <label>هل الطفل مدلل الى حد ما في المنزل؟</label>
            <select name="is_spoiled" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>هل هناك لغة أخرى غير العربية يتم التحدث بها في المنزل؟</label>
            <input type="text" name="other_language" class="form-control">
        </div>
        <div class="mb-2">
            <label>هل تحدثها او فهمها الطفل؟</label>
            <select name="child_understands_other_language" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>

        <hr>

        <!-- 2: تاريخ المشكلة -->
        <h5>2: تاريخ المشكلة</h5>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label>تاريخ المشكلة</label>
                <input type="date" name="problem_date" class="form-control">
            </div>
        </div>
        <div class="mb-2">
            <label>الشكوى الأساسية</label>
            <textarea name="main_complaint" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>متى بدأت؟ كيف تعاملت معها الأسرة؟</label>
            <textarea name="problem_history" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>تطور الحالة بمرور الزمن</label>
            <select name="problem_progress" class="form-control">
                <option value="الأحسن">الأحسن</option>
                <option value="الأسوء">الأسوء</option>
            </select>
        </div>
        <div class="mb-2">
            <label>هل هناك مشكلات مشابهة في العائلة؟ وما صلة القرابة بالطفل؟</label>
            <textarea name="family_similar_problems" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالنطق أو اللغة؟</label>
            <select name="speech_language_issues" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="speech_language_issues_desc" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالسمع؟</label>
            <select name="hearing_issues" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="hearing_issues_desc" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالانتباه والتركيز أو التواصل؟</label>
            <select name="attention_issues" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="attention_issues_desc" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل تشعر أن طفلك لديه مشاكل بالقدرات المعرفية والإدراكية؟</label>
            <select name="cognitive_issues" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="cognitive_issues_desc" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل أجرى اختبار ذكاء؟</label>
            <input type="text" name="iq_test" class="form-control">
        </div>
        <div class="mb-2">
            <label>هل تلقى الطفل أي نوع من التقييم أو الفحص أو التشخيص؟</label>
            <input type="text" name="previous_evaluations" class="form-control">
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، أين تم التقييم ومتى؟ وماذا كانت النتيجة؟</label>
            <textarea name="evaluation_details" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل تلقى طفلك أي نوع من العلاجات الدوائية أو البرامج التدريبية؟</label>
            <input type="text" name="treatments" class="form-control">
        </div>
        <div class="mb-2">
            <label>إذا كانت الإجابة نعم، من فضلك حددها</label>
            <textarea name="treatments_details" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل يمكنك تحديد مشاكل طفلك في المنزل؟</label>
            <textarea name="home_problems" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل يمكنك أن تحدد مشاكل طفلك في المدرسة أو خارج المنزل؟</label>
            <textarea name="school_problems" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>مرحلة الولادة: هل كان هناك أي شيء غير طبيعي أثناء فترة الولادة أو الحمل؟</label>
            <textarea name="birth_abnormalities" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>كم كان عمر الأم عند إنجاب الطفل؟</label>
            <input type="number" name="mother_age_at_birth" class="form-control">
        </div>
        <div class="mb-2">
            <label>كم كانت فترة الحمل؟</label>
            <input type="text" name="pregnancy_duration" class="form-control">
        </div>
        <div class="mb-2">
            <label>هل عانت الأم من ضغوط نفسية أو أمراض أثناء فترة الحمل؟</label>
            <textarea name="mother_pregnancy_issues" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل مكث طفلك في المستشفى بعد الولادة؟ لماذا؟ وما طول هذه الفترة؟</label>
            <textarea name="hospital_stay" class="form-control"></textarea>
        </div>

        <hr>

        <!-- 3: التاريخ الطبي -->
        <h5>3: التاريخ الطبي</h5>
        <div class="mb-2">
            <label>هل يوجد لدى طفلك أي من المشكلات التالية؟</label>
            <textarea name="medical_issues" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>هل تمت مراجعة الطفل عند أي طبيب؟ إذا كانت الإجابة نعم، من فضلك أوصف المشكلة</label>
            <textarea name="doctor_visits" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>من فضلك اكتب أي وصفات طبية تلقاها طفلك</label>
            <textarea name="medications" class="form-control"></textarea>
        </div>

        <hr>

        <!-- 4: التاريخ التطوري -->
        <h5>4: التاريخ التطوري</h5>
        <div class="mb-2">
            <label>اكتب العمر التقريبي لطفلك عندما لاحظت هذه المظاهر عليه</label>
            <textarea name="developmental_milestones" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label>يختنق من الطعام أو السوائل؟</label>
            <select name="choking" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>يضع الأشياء في فمه؟</label>
            <select name="puts_things_in_mouth" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>غسل أسنانه أو سمح بغسلها له؟</label>
            <select name="teeth_brushing" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>

        <hr>

        <!-- 5: التطور اللغوي -->
        <h5>5: التطور اللغوي</h5>
        <div class="mb-2">
            <label>كرر الأصوات والكلمات والجمل؟</label>
            <select name="repeats_words" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>يفهم ويستوعب ماذا تقول؟</label>
            <select name="understands_speech" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>يشير إلى الأشياء الشائعة عند طلب ذلك منه</label>
            <select name="points_to_objects" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>ينفذ التوجيهات البسيطة</label>
            <select name="follows_simple_instructions" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>يجيب بصورة صحيحة عن الأسئلة التي إجابتها نعم/لا</label>
            <select name="answers_yes_no" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>يجيب بصورة صحيحة عن الأسئلة التي تبدأ بـ (من، أين، متى، لماذا)</label>
            <select name="answers_wh_questions" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>هل يتواصل اجتماعياً مع الآخرين؟</label>
            <select name="social_communication" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>طريقة نطقه للكلمات غير صحيحة؟</label>
            <select name="incorrect_pronunciation" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>حاليًا طفلك يتواصل باستخدام:</label>
            <input type="text" name="current_communication" class="form-control">
        </div>
        <div class="mb-2">
            <label>حدد مظاهر طفلك السلوكية</label>
            <textarea name="behavioral_features" class="form-control"></textarea>
        </div>

        <hr>

        <!-- 6: التطور الدراسي -->
        <h5>6: التطور الدراسي</h5>
        <div class="mb-2">
            <label>اسم المدرسة والمرحلة الدراسية</label>
            <input type="text" name="school_name" class="form-control">
        </div>
        <div class="mb-2">
            <label>هل رسب في سنة دراسية ما؟</label>
            <select name="failed_year" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>ما هي المواد الدراسية التي يفضلها طفلك؟</label>
            <input type="text" name="favorite_subjects" class="form-control">
        </div>
        <div class="mb-2">
            <label>هل واجه الطفل أي صعوبة في أي مادة دراسية؟</label>
            <select name="subject_difficulties" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>هل تلقى طفلك أي مساعدة في مادة دراسية؟</label>
            <select name="received_help" class="form-control">
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>
        <div class="mb-2">
            <label>ملاحظات إضافية</label>
            <textarea name="additional_notes" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3 no-print">حفظ التقييم</button>
    </form>
</div>
@endsection
