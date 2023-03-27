<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
     * Список подкатегорий выбранной категории
     *
     * @param $categorySlug
     * @return Application|Factory|View
     */
    public function actionGetSubCategoryList($categorySlug)
    {
        /**
         * @var Category $category
         */
        $category = (new Category)->newQuery()
            ->where('slug', $categorySlug)
            ->first();

        $categories = (new Category)->newQuery()
            ->where('parent_id', $category->id)
            ->where('published', 1)
            ->get()
            ->all();

        return view('pages.categories', [
            'categories' => $categories,
            'headCategory' => $category
        ]);
    }

    /**
     * Список услуг выбранной категории
     *
     * @param $subCategory
     * @return Application|Factory|View
     */
    public function actionGetServiceList($subCategory)
    {
        /**
         * @var Category $category
         */
        $category = (new Category)->newQuery()
            ->where('slug', $subCategory)
            ->first();

        $headCategory = (new Category)->newQuery()
            ->where('id', $category->parent_id)
            ->first();

        $services = (new Service)->newQuery()
            ->where('category_id', $category->id)
            ->where('published', 1)
            ->get()
            ->all();

        return view('pages.services', [
            'services' => $services,
            'num' => 1,
            'category' => $category,
            'headCategory' => $headCategory,
        ]);
    }

    /**
     * Страница услуги
     *
     * @param $subCategory
     * @param $serviceSlug
     * @return Application|Factory|View
     */
    public function actionGetServiceItem($subCategory, $serviceSlug)
    {
        /**
         * @var Category $category
         */
        $category = (new Category())->newQuery()
            ->where('slug', $subCategory)
            ->first();

        $headCategory = (new Category)->newQuery()
            ->where('id', $category->parent_id)
            ->first();

        /**
         * @var Service $service
         */
        $service = (new Service)->newQuery()
            ->where('slug', $serviceSlug)
            ->first();

        return view('pages.service-single', [
            'service' => $service,
            'category' => $category,
            'headCategory' => $headCategory,
            'last_services' => Service::lastServices(4),
        ]);
    }
}
