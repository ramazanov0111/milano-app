<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::query()->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.projects.create', [
            'project'    => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProjectRequest $request): RedirectResponse
    {
        $file = $request->file('image');
        $filename = $file->getClientOriginalName() ?? '';
        $file->move(public_path() . '/img/projects', $filename);
        $imagePath['filename'] = $filename;

        /**
         * @var Media $image
         */
        $image = Media::query()->create($imagePath);

        $params = $request->all();
        $params['image_id'] = $image->id;

        /**
         * @var Project $project
         */
        $project = Project::query()->create($params);

        $gallery = $request->file('gallery');
        foreach ($gallery as $item) {
            $itemFileName = $item->getClientOriginalName() ?? '';
            $item->move(public_path() . '/img/projects', $itemFileName);

            /**
             * @var Media $galleryImage
             */
            $galleryImage = Media::query()->create([
                'filename' => $itemFileName,
            ]);

            ProjectImage::query()->create([
                'project_id' => $project->id,
                'image_id' => $galleryImage->id,
            ]);
        }

        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return Application|Factory|View
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return RedirectResponse
     */
    public function update(UpdateProjectRequest $request, Project $project): RedirectResponse
    {
        $file = $request->file('image');
        $filename = $file ? $file->getClientOriginalName() : null;

        if (($filename !== $project->image->filename) && ($filename !== null)) {
            $file->move(public_path() . '/img/projects', $filename);
            $imagePath['filename'] = $filename;
            /**
             * @var Media $image
             */
            $image = Media::query()->create($imagePath);
            $project->image_id = $image->id;
        }

        $gallery = $request->file('gallery');

        $projectGallery = [];
        foreach ($project->gallery as $galleryItem) {
            $projectGallery[] = $galleryItem->filename;
        }

        if ($gallery) {
            foreach ($gallery as $item) {

                $itemFileName = $item->getClientOriginalName();

                if (!in_array($filename, $projectGallery, true)) {
                    $item->move(public_path() . '/img/projects', $itemFileName);

                    /**
                     * @var Media $galleryImage
                     */
                    $galleryImage = Media::query()->create([
                        'filename' => $itemFileName,
                    ]);

                    ProjectImage::query()->create([
                        'project_id' => $project->id,
                        'image_id' => $galleryImage->id,
                    ]);
                }
            }
        }

        $project->update($request->except('slug'));

        return redirect()->route('admin.project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return RedirectResponse
     */
    public function destroy(Project $project): RedirectResponse
    {
        ProjectImage::query()
            ->where('project_id', $project->id)
            ->delete();

        $project->delete();

        return redirect()->route('admin.project.index');
    }
}
