<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['key', 'value'];

    static function getMenu()
    {
        return [
            'general' => [__('اعدادات عامة'), 'index'],
        ];
    }

    static function getTabs($key = 'general')
    {
        $pages = [
            'general' => [
                'general_tb' => __('اعدادات عامة'),
                'social_tb' => __('الحسابات الاجتماعية'),
                'email_tb' => __('رسائل البريد الإلكتروني'),
            ],


//                'index'=>'اعدادات الصفحة الرئيسة',
//                'about_us'=>'اعدادات صفحة من نحن',
        ];

        return $pages[$key] ?? [];
    }


    static function getParam($tab)
    {
        switch ($tab) {
            case 'general_tb':
                return [
                    ['logo', 'image', settings('logo'), __('شعار الموقع'), '', '', 'col-md-4'],
                    ['icon', 'image', settings('icon'), __('ايقونة الموقع'), '', '', 'col-md-6'],
                    ['share_photo', 'image', settings('share_photo'), __('صورة المشاركة على السوشيال'), '', '', 'sharePhoto col-md-6'],
                    ['title', 'text', settings('title'), __('عنوان الموقع'), ''],
                    ['description', 'textarea', settings('description'), __('نبذه عن الموقع'), ''],
                    ['keyword', 'tags', settings('keyword'), __('كلمات مفتاحية'), 'keyword'],

                    ['email', 'text', settings('email'), __('البريد الالكتروني'), ''],

                    ['copyright', 'text', settings('copyright'), __('نص الحقوق'), ''],
                ];

            case  'social_tb' :
                return [
                    ['facebook', 'text', settings('facebook'), __('فيس بوك'), ''],
                    ['twitter', 'text', settings('twitter'), __('تويتر'), ''],
                    ['instagram', 'text', settings('instagram'), __('انستقرام'), ''],
                    ['youtube', 'text', settings('youtube'), __('يوتيوب'), ''],
                    ['whatsapp', 'text', settings('whatsapp'), __('واتس اب'), ''],
                ];

            case "email_tb":
                return [
                    ['email_activate_text', 'textarea', settings('email_activate_text'), __('نص ترحيبي للبريد الإلكتروني'), ''],
                    ['email_activate_text_ar', 'textarea', settings('email_activate_text_ar'), __('نص ترحيبي للبريد الإلكتروني').' ' .__('عربي'), ''],
//                    ['email_reset_text', 'textarea', settings('email_reset_text'), __('نص رسالة اعادة تعين كلمة المرور'), ''],
//                    ['email_reset_text', 'textarea', settings('email_reset_text'), __('نص رسالة اعادة تعين كلمة المرور'), ''],
                ];
            default:
                return [];


        }
    }
}
