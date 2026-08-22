<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function test()
    {
        $reports = app()->tagged('reports');

        return collect($reports)
            ->map(fn ($report) => $report->generate())
            ->values()
            ->all();
    }
}
