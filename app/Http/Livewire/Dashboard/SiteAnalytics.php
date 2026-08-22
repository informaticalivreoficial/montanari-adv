<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Spatie\Analytics\OrderBy;
use Carbon\Carbon;

class SiteAnalytics extends Component
{
    public $period = 6;
    public $totalVisitors = 0;
    public $totalPageViews = 0;

    public $visitorsByDate = [];
    public $pageViewsByDate = [];
    public $labels = [];

    public $deviceCategory = [];
    public $topBrowsers = [];
    public $topPages = [];
    public $topCountries = [];
    public $userTypes = [];

    public $hasAnalytics = false;
    public $errorMessage = '';

    public function mount()
    {
        $this->loadData();
    }

    public function setPeriod($months)
    {
        $this->period = $months;
        $this->loadData();
    }

    protected function loadData()
    {
        try {
            $period = Period::months($this->period);

            // Visitors and page views by date
            $visitorsData = Analytics::fetchTotalVisitorsAndPageViews($period, 200);

            $this->labels = [];
            $this->visitorsByDate = [];
            $this->pageViewsByDate = [];
            $this->totalVisitors = 0;
            $this->totalPageViews = 0;

            foreach ($visitorsData as $item) {
                $date = $item['date'] instanceof Carbon
                    ? $item['date']->format('d/m')
                    : Carbon::parse($item['date'])->format('d/m');

                $this->labels[] = $date;
                $this->visitorsByDate[] = $item['activeUsers'] ?? 0;
                $this->pageViewsByDate[] = $item['screenPageViews'] ?? 0;
                $this->totalVisitors += $item['activeUsers'] ?? 0;
                $this->totalPageViews += $item['screenPageViews'] ?? 0;
            }

            // Device Category - using the facade's generic get() method
            $this->deviceCategory = $this->fetchDeviceCategory($period);

            // Top Browsers
            $browsers = Analytics::fetchTopBrowsers($period, 10);
            $this->topBrowsers = $browsers->map(fn($item) => [
                'name' => $item['browser'] ?? 'Desconhecido',
                'value' => $item['screenPageViews'] ?? 0,
            ])->toArray();

            // Most Visited Pages
            $pages = Analytics::fetchMostVisitedPages($period, 10);
            $this->topPages = $pages->map(fn($item) => [
                'title' => $item['pageTitle'] ?? 'Sem título',
                'url' => $item['fullPageUrl'] ?? '',
                'views' => $item['screenPageViews'] ?? 0,
            ])->toArray();

            // Top Countries
            $countries = Analytics::fetchTopCountries($period, 10);
            $this->topCountries = $countries->map(fn($item) => [
                'name' => $item['country'] ?? 'Desconhecido',
                'value' => $item['screenPageViews'] ?? 0,
            ])->toArray();

            // User Types (new vs returning)
            $userTypes = Analytics::fetchUserTypes($period);
            $this->userTypes = $userTypes->map(fn($item) => [
                'type' => $item['newVsReturning'] ?? 'Desconhecido',
                'value' => $item['activeUsers'] ?? 0,
            ])->toArray();

            $this->hasAnalytics = true;
            $this->errorMessage = '';

        } catch (\Exception $e) {
            $this->hasAnalytics = false;
            $this->errorMessage = $e->getMessage();
        }
    }

    /**
     * Fetch device category using the Analytics facade's get() method
     */
    protected function fetchDeviceCategory(Period $period): array
    {
        try {
            $data = Analytics::get(
                $period,
                ['activeUsers'],
                ['deviceCategory'],
                10,
                [OrderBy::metric('activeUsers', true)]
            );

            $results = $data->map(fn($item) => [
                'device' => $this->translateDevice($item['deviceCategory'] ?? 'unknown'),
                'value' => $item['activeUsers'] ?? 0,
            ])->toArray();

            // Ensure we always return data even if empty
            if (empty($results)) {
                return [
                    ['device' => 'Desktop', 'value' => 0],
                    ['device' => 'Mobile', 'value' => 0],
                    ['device' => 'Tablet', 'value' => 0],
                ];
            }

            return $results;
        } catch (\Exception $e) {
            return [
                ['device' => 'Desktop', 'value' => 0],
                ['device' => 'Mobile', 'value' => 0],
                ['device' => 'Tablet', 'value' => 0],
            ];
        }
    }

    protected function translateDevice(string $device): string
    {
        return match(strtolower($device)) {
            'desktop' => 'Desktop',
            'mobile' => 'Mobile',
            'tablet' => 'Tablet',
            default => ucfirst($device),
        };
    }

    public function getChartDataProperty(): array
    {
        return [
            'labels' => $this->labels,
            'visitors' => $this->visitorsByDate,
            'pageViews' => $this->pageViewsByDate,
            'deviceCategory' => $this->deviceCategory,
            'topBrowsers' => $this->topBrowsers,
            'userTypes' => $this->userTypes,
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.analytics')
            ->layout('layouts.admin', ['title' => 'Analytics']);
    }
}
