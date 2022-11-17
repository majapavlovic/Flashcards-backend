<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Image::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = $request->file('file')->store('uploadedImages');

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'description' => 'string|max:255',
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $image = Image::create([
            'name' => $request->name,
            'description' => $request->description,
            'file_path' => $res

        ]);
        return response()->json(['success'=>true , 'message'=>'Image created successfully.', 'image'=>new ImageResource($image)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image_id)
    {
        $image = Image::find($image_id);
        if (is_null($image))
            return response()->json('Data not found', 404);
        return response()->json(new ImageResource($image));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'string|max:255',
        //     'description' => 'required|string|max:255',
        //     'file_path' => 'required|string|url'
        // ]);

        // if ($validator->fails())
        //     return response()->json($validator->errors());

        // $image->name = $request->name;
        // $image->description = $request->description;
        // $image->file_path = $request->file_path;
    
        // $image->save();

        // return response()->json(['Image is updated successfully.', new ImageResource($image)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();

        return response()->json('Image is deleted successfully.');
    }
}
