<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
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
        $service = Service::find($id);
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
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
