<?php

namespace App\Http\Controllers;

use App\Models\Service;

use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['provider', 'serviceType'])->paginate(10);
        return view('service.index', compact('services'));
    }

    public function create()
    {
        return view('service.create');
    }

    public function store(ServiceRequest $request)
    {
        $imagePaths = null;

        if ($request->hasFile('images')) {

            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('services', $fileName, 'public'); // Guarda en storage/app/public/services
                $imagePaths[] = $path;
            }
        }

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->coordenadas = $request->coordenadas;
        $service->images = $imagePaths ? json_encode($imagePaths) : null;
        $service->status = $request->status;
        $service->provider_id = $request->provider_id;
        $service->service_type_id = $request->service_type_id;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Servicio creado con éxito.');;
    }

    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $currentImages = $service->images ? json_decode($service->images, true) : [];

        if ($request->hasFile('images')) {

            $imagePaths = [];

            foreach ($request->file('images') as $image) {
                $path = $image->store('services', 'public'); // Guarda en storage/app/public/services
                $currentImages[] = $path;
            }
        }

        $service->name = $request->name;
        $service->description = $request->description;
        $service->coordenadas = $request->coordenadas;
        $service->images = !empty($currentImages) ? json_encode($currentImages) : null;;
        $service->status = $request->status;
        $service->service_type_id = $request->service_type_id;
        $service->save();
        return redirect()->route('service.index')->with('success', 'Servicio editado con éxito.');
    }
    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('service.index')->with('danger', 'Servicio eliminado con éxito.');;
    }
}
