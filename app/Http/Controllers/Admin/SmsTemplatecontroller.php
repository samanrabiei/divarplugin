<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\SmsTemplate;
use App\Http\Controllers\Controller;

class SmsTemplateController extends Controller
{
    // لیست قالب‌ها
    public function index()
    {
        $templates = SmsTemplate::latest()->get();
        return view('admin.sms.index', compact('templates'));
    }

    // فرم ایجاد
    public function create()
    {
        return view('admin.sms.create');
    }

    // ذخیره قالب جدید
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'key' => 'required|string|unique:sms_templates,key',
            'content_theme' => 'required|string',
        ]);

        SmsTemplate::create([
            'title' => $request->title,
            'key' => $request->key,
            'content' => $request->content_theme,
            'is_active' => $request->has('is_active'),
            'type' => $request->type,
        ]);
        session()->flash('toast', [
            'type' => 'success', // success, error, info, warning
            'title' => 'موفقیت آمیز!',
            'message' => 'قالب پیامک ایجاد شد',
            'time' => '5000'
        ]);

        return redirect()
            ->route('sms-templates.index');
    }

    // فرم ویرایش
    public function edit(SmsTemplate $smsTemplate)
    {

        return view('admin.sms.edit', compact('smsTemplate'));
    }

    // بروزرسانی قالب
    public function update(Request $request, SmsTemplate $smsTemplate)
    {

        $request->validate([
            'title' => 'required|string',
            'key' => 'required|string|unique:sms_templates,key,' . $smsTemplate->id,
            'content_theme' => 'required|string',
        ]);

        $smsTemplate->update([
            'title' => $request->title,
            'key' => $request->key,
            'content' => $request->content_theme,
            'is_active' => $request->is_active,
            'type' => $request->type,
        ]);

        session()->flash('toast', [
            'type' => 'success', // success, error, info, warning
            'title' => 'موفقیت آمیز!',
            'message' => 'قالب پیامک به روزرسانی  شد.',
            'time' => '5000'
        ]);

        return redirect()
            ->route('sms-templates.index');
    }

    // حذف قالب
    public function destroy(SmsTemplate $smsTemplate)
    {
        $smsTemplate->delete();

        session()->flash('toast', [
            'type' => 'success', // success, error, info, warning
            'title' => 'موفقیت آمیز!',
            'message' => 'قالب پیامک حذف شد.',
            'time' => '5000'
        ]);
        return redirect()
            ->route('sms-templates.index');
    }
}
