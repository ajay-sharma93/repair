<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $image = Storage::disk('local')->put('public/services', $request->image);
        $imageLocation = Storage::url($image);
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => 'http://localhost:8000' . $imageLocation

        ]);


        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'http://localhost:8000' . $imageLocation


        ]);

        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect('/admin/service')->with('success', 'You have successfully created a new service');
    }



    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $image = Storage::disk('local')->put('public/services', $request->image);
        $imageLocation = Storage::url($image);


        $service = Service::find($id);
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image ? $imageLocation : $service->image // if($request->image) $image = $imageLocation; else $image = $service->image;
        ]);

        return redirect('/admin/service')->with('success', 'You have successfully updated your data');
    }



    public function delete($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect('/admin/service')->with('success', 'You have successfully deleted a service.');
    }
}
