<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManageGallery;
use App\Models\ManageTag;
use App\Http\Traits\Upload;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class ManageGalleryController extends Controller
{
    use Upload;

    public function tagManage()
    {
        $manageTags = ManageTag::all();
        return view('admin.gallery.tag', compact('manageTags'));
    }

    public function storeTag(Request $request)
    {
        $reqData = Purify::clean($request->except('_token', '_method'));
        $request->validate([
            'name' => 'required|string'
        ], [
            'name.required' => 'Name is required'
        ]);
        $data = new ManageTag;
        $data->name = $reqData['name'];
        $data->save();
        return back()->with('success', 'Tag Added Successfully.');
    }

    public function updateTag(Request $request, $id)
    {
        $reqData = Purify::clean($request->except('_token', '_method'));
        $request->validate([
            'name' => 'required|string',
        ], [
            'name.required' => 'Name is required',
        ]);

        $data = ManageTag::findOrFail($id);
        $data->name = $reqData['name'];
        $data->save();
        return back()->with('success', 'Tag Update Successfully.');
    }

    public function tagDelete($id)
    {
        $tag = ManageTag::findOrFail($id);
        $tag->delete();
        return back()->with('success', 'Tag has been deleted');
    }




    public function galleryList()
    {
        $manageGalleries = ManageGallery::with('tag')->latest()->get();
        return view('admin.gallery.list', compact('manageGalleries'));
    }

    public function galleryCreate()
    {
        $manageTag = ManageTag::latest()->get();
        return view('admin.gallery.create', compact('manageTag'));
    }

    public function galleryStore(Request $request)
    {
        $reqData = Purify::clean($request->except('_token', '_method'));
        $request->validate([
            'tag_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $data = new ManageGallery();
        $data->tag_id = $reqData['tag_id'];

        if ($request->hasFile('image')) {
            try {
                $data->image = $this->uploadImage($request->image, config('location.gallery.path'));
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }

        $data->save();

        return redirect()->route('admin.galleryList')->with('success', 'Gallery has been added successfully');
    }


    public function galleryEdit($id)
    {
        $gallery = ManageGallery::findOrFail($id);
        $tags = ManageTag::latest()->get();
        return view('admin.gallery.edit', compact('gallery','tags'));
    }

    public function galleryUpdate(Request $request, $id)
    {
        $data = ManageGallery::findOrFail($id);

        $request->validate([
            'tag_id' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);

        $reqData = Purify::clean($request->except('_token', '_method'));

        $data->tag_id = $reqData['tag_id'];

        if ($request->hasFile('image')) {

            try {
                $old = $data->image ? : null;
                $image = $this->uploadImage($request->image, config('location.gallery.path'), null, $old, null, null);
                $data->image = $image ? : $data->image;
            } catch (\Exception $exp) {
                return back()->with('error', 'Image could not be uploaded.');
            }
        }

        $data->save();

        return back()->with('success', 'Gallery has been Updated');
    }

    public function galleryDelete($id){
        $galleryData = ManageGallery::findOrFail($id);
        $old_image = $galleryData->image;
        $location = config('location.gallery.path');

        if (!empty($old_image)) {
            @unlink($location . '/' . $old_image);
        }

        $galleryData->delete();
        return back()->with('success', 'Gallery has been deleted');
    }

}
