<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$providers = Provider::all();
        $providers = Provider::with(['services'])->paginate(10);
        return view('provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $provider = new Provider();
        $provider->type_legal_id = $request->type_legal_id;
        $provider->legal_id = $request->legal_id;
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->social_media = $request->social_media;
        $provider->status = $request->status;
        $provider->score = $request->score;
        $provider->save();
        return redirect()->route('provider.index')->with('success', 'Prestador creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        $provider = Provider::with('services')->findOrFail($provider->id);
        return view('provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
        return view('provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->type_legal_id = $request->type_legal_id;
        $provider->legal_id = $request->legal_id;
        $provider->name = $request->name;
        $provider->email = $request->email;
        $provider->phone = $request->phone;
        $provider->address = $request->address;
        $provider->social_media = $request->social_media;
        $provider->status = $request->status;
        $provider->score = $request->score;
        $provider->save();
        return redirect()->route('provider.index')->with('success', 'Prestador editado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('provider.index')->with('success', 'Prestador eliminado con éxito.');
    }
}
