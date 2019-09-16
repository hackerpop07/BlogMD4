<?php


namespace App\Services\Services;


use App\Repositories\Contracts\ImageAlbumRepositoryInterface;
use App\Services\Contracts\ImageAlbumServiceInterFace;
use Illuminate\Support\Facades\Auth;

class ImageAlbumService extends Service implements ImageAlbumServiceInterFace
{
    public function __construct(ImageAlbumRepositoryInterface $imageAlbumRepository)
    {
        $this->setRepository($imageAlbumRepository);
    }

    public function create($request)
    {
        if ($request->hasFile('image')) {
            foreach ($request->image as $image) {
                $image->store('/image', 'public');
                $array = [
                    'status' => $request->status,
                    'path' => $image->hashName(),
                    'user_id' => Auth::user()->id
                ];
                $this->repository->create($array);
            }
        }
    }

    public function detailImagesOfUserLogin()
    {
        return $this->repository->detailImagesOfUserLogin();
    }
}
