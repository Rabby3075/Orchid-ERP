<?php

namespace App\Http\Controllers;

use App\Models\Account\AccountChart;
use App\Models\CRM\Leeds;
use App\Models\CRM\Meeting;
use App\Models\UserManagement\MenuPermission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menuPermissions = MenuPermission::all();
        // $clients = Leeds::where('isSuccess', 1)->count();
        // dd($menuPermissions);
        return view('master.dashboard', compact('menuPermissions'));
    }
    public function log(Request $request)
    {
        $charts = AccountChart::all();
        $menuPermissions = MenuPermission::all();
        $clients = Leeds::where('isSuccess', 1)->count();
        $meetings = Meeting::with('leeds')->orderBy('meetingDateAndTime', 'DESC')->get();
        $today = Carbon::now()->format('d M y');
        $logs = AccountChart::join('account_types', 'account_types.id', '=', 'account_charts.AccountType')->orderBy('account_types.id', 'DESC')->get();
        $fcharts = $logs->whereIn('AccountType', ["Income", "Expenses","Cost of Good Sold"]);

        $Incomes = $logs->where('AccountType',"Income");
        foreach($Incomes as $income){
            $income['label'] = $income->AccountName;
            $income['value'] = $income->Balance;
            $income['color'] = '#f8bd19';
            $incomedata[] = $income;

        }

        $Expenses = $logs->where('AccountType',"Expenses");
        foreach($Expenses as $Expense){
            $Expense['label'] = $Expense->AccountName;
            $Expense['value'] = $Expense->Balance;
            $Expense['color'] = '#33ccff';
            $expensedata[] = $Expense;
        }
        // return $expensedata;

        $costs = $logs->where('AccountType',"Cost of Good Sold");
        foreach($costs as $cost){
            $cost['label'] = $cost->AccountName;
            $cost['value'] = $cost->Balance;
            $cost['color'] = '#ffcccc';
            $costdata[] = $cost;
        }

        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);
        return view('master.dashboard', compact('menuPermissions','incomedata','expensedata','costdata','today', 'charts', 'fcharts', 'meetings', 'clients', 'chart1'));
    }
}
