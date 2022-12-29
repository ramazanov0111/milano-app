<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProjectImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return Response
     */
    public function index(Project $project)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Project $project
     * @return Response
     */
    public function create(Project $project)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Project $project
     * @return Response
     */
    public function store(Request $request, Project $project)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function show(Project $project, ProjectImage $projectImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function edit(Project $project, ProjectImage $projectImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Project $project
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function update(Request $request, Project $project, ProjectImage $projectImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param Media $image
     * @return RedirectResponse
     */
    public function destroy(Project $project, Media $image): RedirectResponse
    {
//        dd(123);
        ProjectImage::query()
            ->where('image_id', $image->id)
            ->where('project_id', $project->id)
            ->delete();

        unlink(public_path() . '/img/projects', $image->filename);
        if ($image->delete()) {
            return redirect()->back();
//                return response()->json(true);
        }

        return redirect()->back();
//        return response()->json(false);
    }
}
