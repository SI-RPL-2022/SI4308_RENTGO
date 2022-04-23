<?php

namespace App\Http\Controllers;

use App\Charts\AgeChart;
use App\Charts\EngagementChart;
use App\Charts\ExpenseChart;
use App\Charts\GenderChart;
use App\Charts\MonthlyProductChart;
use App\Charts\MonthlyStoreChart;
use App\Charts\MonthlyUsersChart;
use App\Charts\TransactionChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GenderChart $chartStore, AgeChart $chartProduct, EngagementChart $chartEngagement, ExpenseChart $chartExpense, TransactionChart $chartTransaction)
    {
        //
        $chartTransaction = $chartTransaction->build();
        $chartExpense = $chartExpense->build();
        $chartArea = $chartEngagement->build();
        $chartDonut = $chartStore->build();
        $chartBar = $chartProduct->build();
        return view('cms.dashboard.dashboard', compact('chartDonut', 'chartBar', 'chartArea', 'chartExpense', 'chartTransaction'));
    }
}
