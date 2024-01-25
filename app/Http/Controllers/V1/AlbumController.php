<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\V1\AlbumResource;
use App\Models\Album;

class AlbumController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
        return AlbumResource::collection(Album::paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request) {
        $album = Album::create($request->all());
        return new AlbumResource($album);
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album) {
        //
        return new AlbumResource($album);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album) {
        //
        $album->update($request->all());
        return new AlbumResource($album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album) {
        $album->delete();
        return response('', 204);
    }
}
