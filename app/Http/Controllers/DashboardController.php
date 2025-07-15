<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Emploi;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\HistoriqueEmploye;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $regions_count = Region::count();

        // Données pour les graphiques de salaire (metric-group-01 et metric-group-02)
        $salary_data = [];
        $total_salary = 0;
        $average_salary = User::with('emploi')->get()->avg('emploi.salary_min') ?? 0;
        $salary_increase = 10; // Valeur fictive, à calculer avec des données historiques

        $regions = Region::withCount('users')->get();
        foreach ($regions as $region) {
            $users = User::with('emploi')->whereHas('region', function ($query) use ($region) {
                $query->where('id', $region->id);
            })->get();
            $avg_salary = $users->avg('emploi.salary_min') ?? 0;
            $salary_data[] = [
                'region' => $region->name ?? 'Région ' . $region->id,
                'salary_min' => $users->min('emploi.salary_min') ?? 0,
                'salary_max' => $users->max('emploi.salary_max') ?? 0,
                'average_salary' => $avg_salary,
            ];
            $total_salary += $users->sum('emploi.salary_min') ?? 0;
        }

        // Données pour la démographie des régions (map-01)
        $region_data = [];
        $total_users = $users_count ?: 1; // Éviter la division par zéro
        foreach ($regions as $region) {
            $user_count = $region->users_count ?? 0;
            $percentage = round(($user_count / $total_users) * 100);
            $region_data[] = [
                'name' => $region->name ?? 'Région ' . $region->id,
                'user_count' => $user_count,
                'percentage' => $percentage,
            ];
        }

        // Données pour les employés récents (recent-employees)
        $recent_employees = User::with(['region', 'emploi.grade'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Données pour les employés actifs (active-employees)
        $active_employees = User::with(['region', 'emploi.grade'])
            ->whereNotNull('emploi_id')
            ->whereNotNull('region_id')
            ->whereNotNull('grade_id')

            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // ➕ Données pour le graphe chartThree (overview, sales, revenue)
        $months = [];
        $overviewValues = [];
        $salesValues = [];
        $revenueValues = [];

        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = ucfirst($month->isoFormat('MMM'));

            $overviewValues[] = User::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $salesValues[] = Emploi::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();

            $revenueValues[] = HistoriqueEmploye::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }

        return view('pages.dashboard', compact(
            'users_count',
            'regions_count',
            'salary_data',
            'average_salary',
            'total_salary',
            'salary_increase',
            'region_data',
            'recent_employees',
            'active_employees',
            'months',
            'overviewValues',
            'salesValues',
            'revenueValues'
        ));
    }




    //     return view('pages.dashboard', compact('users_count', 'regions_count', 'salary_data', 'average_salary', 'total_salary', 'salary_increase', 'region_data', 'recent_employees', 'active_employees'));
    // }
    public function filter(Request $request)
    {
        $status = $request->query('status', 'Tous');
        $query = User::with(['region', 'emploi.grade'])->orderBy('created_at', 'desc')->take(5);

        if ($status !== 'Tous') {
            $query->where('status', $status);
        }

        $active_employees = $query->get();

        return response()->json(['active_employees' => $active_employees]);
    }
}
