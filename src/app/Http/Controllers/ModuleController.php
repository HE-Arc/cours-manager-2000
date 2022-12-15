<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->admin) {
            return view('modules.index', ['modules' => Module::all()]);
        } else {
            return view('modules.index', ['modules' => $user->modules]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:5|max:50",
            "minimal_avg" => "required|gt:0|lt:6",
            "id" => "required|unique:modules",
        ]);
        $module = new Module();
        $module->name = $request->name;
        $module->minimal_avg = $request->minimal_avg;
        $module->id = $request->id;
        $module->save();
        return redirect()
            ->route("modules.index")
            ->with("success", "Création du module réussie !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('modules.edit', ['module' => $module]);
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
        Module::findOrFail($id)->update($request->all());
        return redirect()
            ->route("modules.index")
            ->with("success", "Modification du module réussie !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Module::findOrFail($id)->delete();
        return redirect()
            ->route("modules.index")
            ->with("success", "Suppression du module réussie !");
    }

    public function subscription()
    {
        $modules = Module::all();

        return view('modules.subscription', ['modules' => $modules]);
    }

    public function subscribe($id)
    {
        $user = Auth::user();
        $user->modules()->attach($id);

        return redirect()
            ->route("modules.subscription")
            ->with("success", "Abonnement à un module réussi !");
    }

    public function unsubscribe($id)
    {
        $user = Auth::user();
        $user->modules()->detach($id);

        return redirect()
            ->route("modules.subscription")
            ->with("success", "Désabonnement à un module réussi !");
    }
}
