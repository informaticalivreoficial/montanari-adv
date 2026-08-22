<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Carbon\Carbon;

class Dashboard extends Component
{
    // Analytics data
    public $hasAnalytics = false;
    public $analyticsLabels = [];
    public $analyticsVisitors = [];
    public $analyticsPageViews = [];
    public $analyticsTotalVisitors = 0;
    public $analyticsTotalPageViews = 0;

    public $deviceLabels = [];
    public $deviceValues = [];

    public function mount()
    {
        $this->loadAnalytics();
    }

    protected function loadAnalytics()
    {
        try {
            $period = Period::months(6);

            // Visitors by date
            $visitorsData = Analytics::fetchTotalVisitorsAndPageViews($period, 200);

            foreach ($visitorsData as $item) {
                $date = $item['date'] instanceof Carbon
                    ? $item['date']->format('d/m')
                    : Carbon::parse($item['date'])->format('d/m');

                $this->analyticsLabels[] = $date;
                $this->analyticsVisitors[] = $item['activeUsers'] ?? 0;
                $this->analyticsPageViews[] = $item['screenPageViews'] ?? 0;
                $this->analyticsTotalVisitors += $item['activeUsers'] ?? 0;
                $this->analyticsTotalPageViews += $item['screenPageViews'] ?? 0;
            }

            // Device Category
            $deviceData = Analytics::get(
                $period,
                ['activeUsers'],
                ['deviceCategory'],
                5,
                [\Spatie\Analytics\OrderBy::metric('activeUsers', true)]
            );

            foreach ($deviceData as $item) {
                $device = $item['deviceCategory'] ?? 'unknown';
                $this->deviceLabels[] = match(strtolower($device)) {
                    'desktop' => 'Desktop',
                    'mobile' => 'Mobile',
                    'tablet' => 'Tablet',
                    default => ucfirst($device),
                };
                $this->deviceValues[] = $item['activeUsers'] ?? 0;
            }

            $this->hasAnalytics = true;

        } catch (\Exception $e) {
            $this->hasAnalytics = false;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.index')->layout('layouts.admin', ['title' => 'Dashboard']);
    }
}
