<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLanguage;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.languages.index',['languages'=>$languages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguage $request)
    {
        
        if ($request->hasFile('flag')) {
            $anio = date("Y");
            $file = $request->file('flag');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move(public_path('content/'.$anio,'/'),$fileName);
            $path = 'content/'.$anio.'/'.$fileName;
        }


        Language::create([
            'abbr'=>$request->abbr,
            'name'=>$request->name,
            'flag'=>$path,
        ]);
        
        return redirect()->route('admin.languages.index')->with('status','Lenguaje creado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
    
        return view('admin.languages.edit',['language'=>$language]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
    }
}
