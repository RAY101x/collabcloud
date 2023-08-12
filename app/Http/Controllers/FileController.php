<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
<<<<<<< Updated upstream
        
        
        return view('files');
=======
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $object = Obj::query()
            ->with([
                'children.objectable',
                'ancestorsAndSelf.objectable'
            ])
            ->forCurrentTeam()
            ->where('uuid', $request->get('uuid', Obj::forCurrentTeam()->whereNull('parent_id')->first()->uuid))
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
>>>>>>> Stashed changes
    }
}
