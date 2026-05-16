<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f8f9fa; color: #333; padding: 20px; }
        .card { background: #fff; max-width: 600px; margin: 0 auto; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); border-top: 4px solid #fd7792; padding: 30px; }
        h2 { color: #fd7792; }
        .details { background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .details ul { list-style: none; padding: 0; }
        .details li { margin-bottom: 10px; }
        .footer { margin-top: 30px; text-align: center; font-size: 12px; color: #777; }
    </style>
</head>
<body>
    <div class="card">
        <h2>مرحباً {{ $booking->name }}،</h2>
        <p>نشكرك على اختيارك <strong>فندق داماس (Damas Hotel)</strong> لإقامتك القادمة. يسعدنا جداً استضافتك، ونود إعلامك بأن حجزك قد تم تأكيده بنجاح.</p>
        
        <div class="details">
            <h3>📋 تفاصيل الحجز:</h3>
            <ul>
                <li><strong>رقم الحجز:</strong> #{{ $booking->id }}</li>
                <li><strong>الفندق:</strong> {{ $booking->hotel->name }}</li>
                <li><strong>الغرفة:</strong> {{ $booking->room->name }}</li>
                <li><strong>تاريخ الوصول:</strong> {{ $booking->check_in->format('Y-m-d') }}</li>
                <li><strong>تاريخ المغادرة:</strong> {{ $booking->check_out->format('Y-m-d') }}</li>
                <li><strong>عدد الأيام:</strong> {{ $booking->duration_days }} ليالي</li>
                <li><strong>إجمالي السعر:</strong> ${{ number_format($booking->price, 2) }}</li>
            </ul>
        </div>

        <p>نتمنى لك إقامة سعيدة ومريحة في فندق داماس!</p>
        
        <div class="footer">
            <p>فريق خدمة العملاء | Damas Hotel</p>
            <p>info@damashotel.com</p>
        </div>
    </div>
</body>
</html>