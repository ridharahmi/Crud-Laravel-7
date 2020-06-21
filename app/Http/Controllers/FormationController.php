<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formation;
use Auth;

class FormationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formations = Formation::orderBy('created_at', 'Desc')->paginate(10);
        return view('formation.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|max:150',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            if (isset($data['image'])) {
                $data['image'] = $this->uploadImage($data['image']);
            }
            $formation = Formation::create($data);
            if ($formation) {
                return redirect('formations')->with('success', 'Formation created successfully!');
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formation = Formation::findOrFail($id);
        return view('formation.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation = Formation::findOrFail($id);
        return view('formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $image = $data['photo'];
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
            unlink($image);
        } else {
            $data['image'] = $image;
        }
        //dd($data['image']);
        $formation = Formation::findOrFail($id)->update($data);
        if ($formation) {
            return redirect()->back()->with('success', 'Formation Updated successfully!');;
        }
    }

    /**
     * upload image
     */
    public function uploadImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s') . "_" . $sha1 . "." . $extension;
        $path = public_path('images/formations/');
        $file->move($path, $filename);
        return 'images/formations/' . $filename;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = Formation::findOrFail($id);
        $img = $formation['image'];
        $formation->delete();
        unlink($img);
        return redirect()->back()->with('info', 'Formation deleted successfully!');
    }
}
