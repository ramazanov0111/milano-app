<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.create', [
            'category'   => [],
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $file = $request->file('preview');
        $filename = $request->file('preview')->getClientOriginalName() ?? '';
        $file->move(public_path() . '/img/categories', $filename);
        $previewPath['filename'] = $filename;

        /**
         * @var Media $preview
         */
        $preview = Media::query()->create($previewPath);

        $params = $request->all();
        $params['image'] = $preview->id;

        Category::query()->create($params);

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category'   => $category,
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $file = $request->file('preview');
        $filename = $file ? $file->getClientOriginalName() : null;

        if (($filename !== null) && ($filename !== '')) {
            if (($category->preview && ($filename !== $category->preview->filename)) || ($category->preview === null)) {
                $file->move(public_path() . '/img/categories', $filename);
                $imagePath['filename'] = $filename;
                /**
                 * @var Media $image
                 */
                $image = Media::query()->create($imagePath);
                $category->image = $image->id;
            }
        }

        $category->update($request->except('created_by'));

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
