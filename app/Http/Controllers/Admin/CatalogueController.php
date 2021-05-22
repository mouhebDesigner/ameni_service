<?php

namespace App\Http\Controllers\Admin;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogueRequest;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogues = Catalogue::paginate(10);

        return view('admin.catalogues.index', compact('catalogues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalogues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request    
     * @return \Illuminate\Http\Response
     */
    public function store(CatalogueRequest $request)
    {
        $catalogue = new Catalogue();

        $catalogue->nom = $request->nom;
        if($request->hasFile('image')){

            $catalogue->image = $request->image->store('images');
        }
        
        $catalogue->save();

        return redirect('admin/catalogues')->with('added', 'Le catalogue a été ajouté avec succés');
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
        $catalogue = Catalogue::find($id);

        return view('admin.catalogues.edit', compact('catalogue'));
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

        $request->validate([
            'nom' => 'required',
        ]);
        $catalogue =  Catalogue::find($id);

        $catalogue->nom = $request->nom;
        if($request->hasFile('image')){

            $catalogue->image = $request->image->store('images');
        }

        $catalogue->save();

        return redirect('admin/catalogues')->with('updated', 'Le catalogue a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catalogue::find($id)->delete();
        return redirect('admin/catalogues')->with('deleted', 'Le catalogue a été supprimer avec succés');
        
    }
}
