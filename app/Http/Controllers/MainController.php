<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MainController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Список проектов
     *
     * @return Application|Factory|View
     */
    public function actionGetProjectList()
    {
        $projects = (new Project)->newQuery()->get()->all();

        return view('pages.projects', ['projects' => $projects]);
    }

    /**
     * Страница проекта
     *
     * @param $projectSlug
     * @return Application|Factory|View
     */
    public function actionGetProjectItem($projectSlug)
    {
        /**
         * @var Project|null $project
         */
        $project = (new Project)->newQuery()
            ->where('slug', $projectSlug)
            ->first();

        return view('pages.project-single', [
            'project' => $project,
            'last_projects' => Project::lastProjects(4),
        ]);
    }

    /**
     * Список услуг
     *
     * @return Application|Factory|View
     */
    public function actionGetServiceList()
    {
        $services = (new Service)->newQuery()->get()->all();

        return view('pages.services', ['services' => $services]);
    }

    /**
     * Страница услуги
     *
     * @param $serviceSlug
     * @return Application|Factory|View
     */
    public function actionGetServiceItem($serviceSlug)
    {
        /**
         * @var Service|null $service
         */
        $service = (new Service)->newQuery()
            ->where('slug', $serviceSlug)
            ->first();

        return view('pages.service-single', [
            'service' => $service,
            'last_services' => Service::lastServices(4),
        ]);
    }
}
