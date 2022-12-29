<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.services.index', [
            'services' => Service::query()->orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.services.create', [
            'service'    => [],
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreServiceRequest $request
     * @return RedirectResponse
     */
    public function store(StoreServiceRequest $request): RedirectResponse
    {
        $file = $request->file('image');
        $filename = $request->file('image')->getClientOriginalName() ?? '';
        $file->move(public_path() . '/img/services', $filename);
        $imagePath['filename'] = $filename;

        /**
         * @var Media $image
         */
        $image = Media::query()->create($imagePath);

        $params = $request->all();
        $params['image_id'] = $image->id;

        Service::query()->create($params);

        return redirect()->route('admin.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', [
            'service' => $service,
            'categories' => Category::with('children')->where('parent_id', 0)->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
    {
        $file = $request->file('image');
        $filename = $file ? $file->getClientOriginalName() : null;

        if (($filename !== $service->image->filename) && ($filename !== null)) {
            $file->move(public_path() . '/img/services', $filename);
            $imagePath['filename'] = $filename;
            /**
             * @var Media $image
             */
            $image = Media::query()->create($imagePath);
            $service->image_id = $image->id;
        }

        $service->update($request->except('slug'));

        return redirect()->route('admin.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.service.index');
    }
}
