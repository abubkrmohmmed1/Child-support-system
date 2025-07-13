<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خطاب رسمي - {{ $letter->letter_number }}</title>
    <link href="{{ asset('bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
            .page-break { page-break-before: always; }
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .letter-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: white;
        }
        
        .letter-header {
            text-align: center;
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        
        .letter-header img {
            height: 80px;
            margin-bottom: 10px;
        }
        
        .basmala {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        
        .institution-name {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        
        .letter-info {
            margin-bottom: 30px;
        }
        
        .letter-info table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .letter-info td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        
        .letter-body {
            margin: 30px 0;
            padding: 20px;
            background: #f8f9fa;
            border-right: 4px solid #007bff;
            min-height: 200px;
        }
        
        .letter-footer {
            margin-top: 50px;
            text-align: center;
            border-top: 2px solid #007bff;
            padding-top: 20px;
        }
        
        .signature-section {
            text-align: left;
            margin-top: 40px;
        }
        
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="btn btn-primary print-button no-print">
        <i class="bi bi-printer"></i> طباعة
    </button>
    
    <div class="letter-container">
        <!-- رأس الخطاب -->
        <div class="letter-header">
            <img src="{{ asset('assets/images/logo.png') }}" alt="شعار المؤسسة">
            <div class="basmala">بسم الله الرحمن الرحيم</div>
            <div class="institution-name">مركز علقم لتأهيل الإعاقة الذهنية</div>
            <div style="font-size: 14px; color: #666;">مؤسسة خيرية متخصصة في تأهيل ذوي الإعاقة الذهنية</div>
        </div>
        
        <!-- معلومات الخطاب -->
        <div class="letter-info">
            <table>
                <tr>
                    <td style="background: #f8f9fa; font-weight: bold; width: 20%;">التاريخ:</td>
                    <td>{{ $letter->date }}</td>
                    <td style="background: #f8f9fa; font-weight: bold; width: 20%;">رقم الخطاب:</td>
                    <td>{{ $letter->letter_number }}</td>
                </tr>
                <tr>
                    <td style="background: #f8f9fa; font-weight: bold;">إلى:</td>
                    <td colspan="3">{{ $letter->recipient }}</td>
                </tr>
                <tr>
                    <td style="background: #f8f9fa; font-weight: bold;">الموضوع:</td>
                    <td colspan="3">{{ $letter->subject }}</td>
                </tr>
            </table>
        </div>
        
        <!-- نص الخطاب -->
        <div class="letter-body">
            <div style="margin-bottom: 15px; font-weight: bold;">السلام عليكم ورحمة الله وبركاته،</div>
            <div style="text-align: justify; line-height: 2;">
                {!! nl2br(e($letter->body)) !!}
            </div>
            <div style="margin-top: 15px;">وتفضلوا بقبول فائق الاحترام والتقدير.</div>
        </div>
        
        <!-- التوقيع -->
        <div class="signature-section">
            <div style="margin-bottom: 50px;">
                <strong>مدير المركز</strong><br>
                {{ $letter->signature }}
            </div>
            <div style="border-top: 1px solid #333; width: 200px; margin-top: 10px;"></div>
            <div style="font-size: 12px; color: #666; margin-top: 5px;">التوقيع</div>
        </div>
        
        <!-- تذييل الخطاب -->
        <div class="letter-footer">
            <div style="font-size: 12px; color: #666;">
                <strong>بيانات الاتصال:</strong><br>
                القضارف - حي الدناقلة – جوار مدرسة ديم بكر الثانوية – شرق حوش السمك
                	 0965136389 – 0916482566<br>
                
            </div>
        </div>
    </div>
    
    <script>
        // طباعة تلقائية عند فتح الصفحة (اختياري)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>