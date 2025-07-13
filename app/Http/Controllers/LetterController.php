<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;

class LetterController extends Controller
{
    // عرض قائمة الخطابات
    public function index()
    {
        $letters = Letter::orderBy('created_at', 'desc')->get();
        return view('letters.index', compact('letters'));
    }

    // عرض نموذج إنشاء خطاب جديد
    public function create()
    {
        return view('letters.create');
    }

    // حفظ الخطاب الجديد
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'letter_number' => 'required|string|max:255',
            'recipient' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'signature' => 'required|string|max:255',
        ]);

        $letter = Letter::create($request->except('_token'));
        
        return redirect()->route('letters.show', $letter->id)
                        ->with('success', 'تم إنشاء الخطاب بنجاح');
    }

    // عرض الخطاب
    public function show($id)
    {
        $letter = Letter::findOrFail($id);
        return view('letters.show', compact('letter'));
    }

    // طباعة الخطاب
    public function print($id)
    {
        $letter = Letter::findOrFail($id);
        return view('letters.print', compact('letter'));
    }

    // تحرير الخطاب
    public function edit($id)
    {
        $letter = Letter::findOrFail($id);
        return view('letters.edit', compact('letter'));
    }

    // تحديث الخطاب
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'letter_number' => 'required|string|max:255',
            'recipient' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'signature' => 'required|string|max:255',
        ]);

        $letter = Letter::findOrFail($id);
        $letter->update($request->except('_token'));
        
        return redirect()->route('letters.show', $letter->id)
                        ->with('success', 'تم تحديث الخطاب بنجاح');
    }

    // حذف الخطاب
    public function destroy($id)
    {
        $letter = Letter::findOrFail($id);
        $letter->delete();
        
        return redirect()->route('letters.index')
                        ->with('success', 'تم حذف الخطاب بنجاح');
    }
}
