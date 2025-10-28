<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;
use DB;

class AdminController extends Controller
{
    public function AdminCP()
    {
        $now = Carbon::now();
        $start30 = $now->copy()->subDays(30);
        $prevStart30 = $now->copy()->subDays(60);
        $prevEnd30 = $now->copy()->subDays(30);

        // Helper closure to avoid errors if a table isn't created yet
        $safeCount = function (string $table, ?\Closure $scope = null) {
            if (!Schema::hasTable($table)) return 0;
            $query = DB::table($table);
            if ($scope) $query = $scope($query);
            return $query->count();
        };

        // Core school metrics (expand as your schema grows)
        $studentsCount   = $safeCount('students');             // 0 if table not present
        $teachersCount   = $safeCount('teachers');             // 0 if table not present
        $classesCount    = $safeCount('classes');              // 0 if table not present
        $admissionsCount = $safeCount('admissions');           // 0 if table not present
        $guardiansCount  = $safeCount('guardians');            // 0 if table not present

        // Content & community (present in your DB dump)
        $blogsCount        = $safeCount('blogs');
        $galleriesCount    = $safeCount('galleries');
        $whyUsPoints       = $safeCount('whies');
        $staffUsersCount   = $safeCount('users');              // admin/staff accounts
        $activeSliders     = $safeCount('sliders', fn($q) => $q->where('status', '1'));

        // Growth (last 30 days vs previous 30)
        $blogs30     = $safeCount('blogs', fn($q) => $q->whereBetween('created_at', [$start30, $now]));
        $blogsPrev30 = $safeCount('blogs', fn($q) => $q->whereBetween('created_at', [$prevStart30, $prevEnd30]));
        $gals30      = $safeCount('galleries', fn($q) => $q->whereBetween('created_at', [$start30, $now]));
        $galsPrev30  = $safeCount('galleries', fn($q) => $q->whereBetween('created_at', [$prevStart30, $prevEnd30]));

        $pct = function ($curr, $prev) {
            if ($prev === 0) return $curr > 0 ? 100 : 0;
            return round((($curr - $prev) / max(1, $prev)) * 100);
        };

        $data = [
            'Page'           => 'stats',
            'Title'          => 'Dashboard',
            // School core
            'StudentsCount'  => $studentsCount,
            'TeachersCount'  => $teachersCount,
            'ClassesCount'   => $classesCount,
            'AdmissionsCount'=> $admissionsCount,
            'GuardiansCount' => $guardiansCount,
            // Content/community
            'BlogsCount'     => $blogsCount,
            'GalleriesCount' => $galleriesCount,
            'WhyUsPoints'    => $whyUsPoints,
            'StaffUsersCount'=> $staffUsersCount,
            'ActiveSliders'  => $activeSliders,
            // Growth
            'Blogs30'        => $blogs30,
            'BlogsPrev30'    => $blogsPrev30,
            'BlogsGrowthPct' => $pct($blogs30, $blogsPrev30),
            'Gals30'         => $gals30,
            'GalsPrev30'     => $galsPrev30,
            'GalsGrowthPct'  => $pct($gals30, $galsPrev30),
        ];

        return view('index', $data);
    }


}
