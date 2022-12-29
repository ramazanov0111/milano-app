<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProjectGalleryController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param int $projectId
     * @param int $mediaId
     * @return JsonResponse
     */
    public function removeGalleryItem(int $projectId, int $mediaId): JsonResponse
    {
        ProjectImage::query()
            ->where('image_id', $mediaId)
            ->where('project_id', $projectId)
            ->delete();

        $media = Media::query()
            ->where('id', $mediaId)
            ->first();

        if ($media) {
            $media->delete();
            unlink(public_path() . '/img/projects/' . $media->filename);
        }

        return JsonResponse::create(null, ResponseAlias::HTTP_NO_CONTENT);
    }

}
