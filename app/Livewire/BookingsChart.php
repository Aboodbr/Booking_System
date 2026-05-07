<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class BookingsChart extends ChartWidget
{
    protected ?string $heading = 'Bookings Trend (This Year)';

    // جعله يأخذ مساحة أكبر في الشاشة
    protected int|string|array $columnSpan = 'full';

    protected ?string $pollingInterval = '60s';

    protected function getData(): array
    {
        // للحصول على بيانات حقيقية يمكنك استخدام حزمة مثل flowframe/laravel-trend
        // أو استخدام قيم تقريبية للعرض حالياً
        return [
            'datasets' => [
                [
                    'label' => 'Bookings Created',
                    'data' => [12, 19, 15, 25, 22, 30, 45], // يمكنك ربطها لاحقاً بالداتابيز
                    'backgroundColor' => '#fd7792',
                    'borderColor' => '#fd7792',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        ];
    }

    protected function getType(): string
    {
        return 'line'; // نوع الرسم البياني (خط)
    }
}
