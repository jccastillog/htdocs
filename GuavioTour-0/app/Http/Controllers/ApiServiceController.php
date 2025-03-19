<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service as ApiService;
use App\Http\Requests\ApiServiceRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ApiServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiServiceController extends Controller
{

    public function index(): JsonResource
    {
        $services = ApiService::all();
        //return response()->json($services,200);
        return ApiServiceResource::collection($services);
    }


    public function store(ApiServiceRequest $request): JsonResponse
    {
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('services', 'public'); // Guarda en storage/app/public/services
                $imagePaths[] = $path;
            }
        }

        $service = new ApiService();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->coordenadas = $request->coordenadas;
        $service->images = json_encode($imagePaths);
        $service->status = $request->status;
        $service->provider_id = $request->provider_id;
        $service->save();
        return response()->json(['
            Success' => 'Servicio creado con éxito.',
            'service' => new ApiServiceResource($service)
        ],201);
    }



    public function show($id): JsonResource
    {
        $service = ApiService::find($id);
        //return response()->json( $service,200);
        return new ApiServiceResource($service);
    }


    public function update(ApiServiceRequest $request,$id): JsonResponse
    {
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('services', 'public'); // Guarda en storage/app/public/services
                $imagePaths[] = $path;
            }
        }

        $service = ApiService::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->coordenadas = $request->coordenadas;
        $service->images =json_encode($imagePaths);
        $service->status = $request->status;
        $service->save();

        return response()->json(['
            Success' => 'Servicio actualizado con éxito.',
            'service' => new ApiServiceResource($service)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        ApiService::find($id)->delete();

        return response()->json(['
            Success' => 'Servicio eliminado con éxito.',
        ],200);

    }
}
