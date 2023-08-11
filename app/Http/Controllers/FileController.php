<?php

namespace App\Http\Controllers;

use App\Models\Obj;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $object = Obj::where('team_id', $request->user()->currentTeam->id)->where(
            'uuid', $request->get('uuid', Obj::where('team_id', $request->user()
            ->currentTeam->id)->whereNull('parent_id')->first()->uuid)
            )
            ->firstOrFail();

        return view('files', [
            'object' => $object,
            'ancestors' => $object->ancestorsAndSelf()->breadthFirst()->get()
        ]);
    }

    public function download(File $file)
    {
        $this->authorize('download', $file);

        return Storage::disk('local')->download($file->path, $file->name);
    }
}
