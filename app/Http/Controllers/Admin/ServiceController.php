<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new service();

        $service->titre = $request->titre;
        $service->mode = $request->mode;
        $service->unité = $request->unité;
        $service->prix = $request->prix;
        $service->description = $request->description;
        if(isset($request->voiture))
            $service->voiture = 'oui';

        
        if($request->hasFile('image')){

            $service->image = $request->image->store('images');
        }
        $service->catalogue_id = $request->catalogue_id;

        $service->save();

        return redirect('admin/services')->with('added', 'Le service a été ajouté avec succés');
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
        $service = Service::find($id);

        return view('admin.services.edit', compact('service'));
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
            "titre" => "required",
            "mode" => "required",
            "unité" => "required",
            "prix" => "required",
            "catalogue_id" => "required"
        ]);
        $service =  Service::find($id);

        $service->titre = $request->titre;
        $service->mode = $request->mode;
        $service->unité = $request->unité;
        $service->prix = $request->prix;
        $service->description = $request->description;
        if(isset($request->voiture))
            $service->voiture = 'oui';

        
        if($request->hasFile('image')){

            $service->image = $request->image->store('images');
        }
        $service->catalogue_id = $request->catalogue_id;

        $service->save();

        return redirect('admin/services')->with('updated', 'Le service a été modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::find($id)->delete();
        return redirect('admin/services')->with('deleted', 'Le service a été supprimer avec succés');
        
    }
}
