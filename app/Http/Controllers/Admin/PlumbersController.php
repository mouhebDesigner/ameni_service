<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Plumber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PlumberRequest;

class PlumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plumbers = Plumber::paginate(10);

        return view('admin.plumbers.index', compact('plumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plumbers.create');
    }
    public function store(PlumberRequest $request)
    {
        $plumber = new Plumber();

        $plumber->name = $request->name;
        $plumber->email = $request->email;
        $plumber->phone_number = $request->phone_number;
        if($request->hasFile('photo')){
            $plumber->photo = $request->photo;
        }
        $plumber->save();

        return redirect('admin/plumbers')->with('added', 'plumber added successfully');
    }
    public function update(PlumberRequest $request, $id)
    {

        $plumber = User::find($id);

        $plumber->name = $request->name;
        $plumber->email = $request->email;
        $plumber->password = Hash::make($request->password);
        $plumber->phone_number = $request->phone_number;
        if($request->hasFile('photo')){
            $plumber->photo = $request->photo;
        }


        $plumber->save();

        return redirect('admin/plumbers')->with('added', 'plumber modified successfully');
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
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('admin/clients')->with('deleted', 'La client a été supprimer avec succés');
        
    }
}
