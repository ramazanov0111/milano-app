<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'categories' => Category::lastCategories(3),
            'projects' => Project::lastProjects(5),
            'services' => Service::lastServices(5),
            'count_projects' => Project::count(),
        ]);
    }

}
