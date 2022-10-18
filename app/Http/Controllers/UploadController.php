<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allUploads =  Upload::query();

        $search = null;
        $sort_by = null;

        if ($request->search != null) {
            $search = $request->search;
            $allUploads->where('file_original_name', 'like', '%' . $request->search . '%');
        }

        $sort_by = $request->sort;
        switch ($request->sort) {
            case 'newest':
                $allUploads->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $allUploads->orderBy('created_at', 'asc');
                break;
            case 'smallest':
                $allUploads->orderBy('file_size', 'asc');
                break;
            case 'largest':
                $allUploads->orderBy('file_size', 'desc');
                break;
            default:
                $allUploads->orderBy('created_at', 'desc');
                break;
        }

        $allUploads = $allUploads->paginate(60)->appends(request()->query());

        return view('backend.uploadedFiles.index', compact('allUploads', 'search', 'sort_by'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.uploadedFiles.create');
    }



    /**
     * Upload a newly created resource in storage
     *
     * @param Request request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $type = [
            'jpg' => 'image',
            'jpeg' => 'image',
            'png' => 'image',
        ];

        if ($request->hasFile('file')) {
            $extension = strtolower($request->file('file')->getClientOriginalExtension());

            if (array_key_exists($extension, $type)) {
                $array = explode('.', $request->file('file')->getClientOriginalName());

                $path = $request->file('file')->store('uploads/all', 'public');

                Upload::create([
                    'file_extension' => $extension,
                    'file_original_name' => $array[0],
                    'file_name' => $path,
                    'file_size' => $request->file('file')->getSize(),
                    'file_type' => $type[$extension]
                ]);

                return response()->json([
                    'satus' => 1,
                    'message' => 'Téléchargement terminé',
                ]);
            }

            return response()->json([
                'satus' => 0,
                'message' => 'Un problème est survenu lors du téléchargement du fichier. Veuillez réessayer',
            ]);
        }

        return response()->json([
            'satus' => 0,
            'message' => 'Un problème est survenu lors du téléchargement du fichier. Veuillez réessayer',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = Upload::findOrFail($id);

        Storage::disk('public')->delete($upload->file_name);
        $upload->delete();
        flash('Le fichier a été supprimé avec succès')->success();

        return back();
    }


    /**
     * getUploadedFiles
     *
     * @param Request request
     */
    public function getUploadedFiles(Request $request)
    {
        $uploads = Upload::query();

        if ($request->search != null) {
            $uploads->where('file_original_name', 'like', '%' . $request->search . '%');
        }

        if ($request->sort != null) {
            switch ($request->sort) {
                case 'newest':
                    $uploads->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $uploads->orderBy('created_at', 'asc');
                    break;
                case 'smallest':
                    $uploads->orderBy('file_size', 'asc');
                    break;
                case 'largest':
                    $uploads->orderBy('file_size', 'desc');
                    break;
                default:
                    $uploads->orderBy('created_at', 'desc');
                    break;
            }
        }

        return $uploads->paginate(60)->appends(request()->query());
    }

    /**
     * fileInfo
     *
     * @param Request request
     */
    public function fileInfo(Request $request)
    {
        $file = Upload::select('uploads.*')
            ->where('uploads.id', $request->id)
            ->first();

        if ($file !== null) {
            return view('backend.uploadedFiles.info', compact('file'));
        }

        return abort(404);
    }

    /**
     * showUploader
     *
     * @return \Illuminate\Http\Response
     */
    public function showUploader()
    {
        return view('uploader.uploader');
    }

    /**
     * getPreviewFiles
     *
     * @param Request request
     */
    public function getPreviewFiles(Request $request)
    {
        $ids = explode(',', $request->ids);
        $files = Upload::whereIn('id', $ids)->get();

        return $files;
    }
}
