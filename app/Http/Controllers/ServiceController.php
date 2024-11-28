<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ChangelogController;
use App\Models\Changelog;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Index oldal, amely kilistázza a visible szolgáltatásokat
    public function index()
    {
        $services = Service::where('visible', true)->get();
        return view('services.index', compact('services'));
    }

    // Admin oldal
    public function admin()
    {
        $services = Service::all();
        return view('dashboard.services.index', compact('services'));
    }

    // Show oldal (opcionális, részletes nézet)
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    // Új szolgáltatás hozzáadása
    public function create()
    {
        return view('dashboard.services.create');
    }

    // Szolgáltatás mentése
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image_url' => 'nullable|url',
            'visible' => 'boolean',
        ]);

        Service::create($validated);

        $log = [
            "type" => 'Szolgáltatás',
            "change" => 'Új szolgáltatás lett létrehozva: ' . $request->get("name")
        ];
        Changelog::create($log);

        return redirect()->route('dashboard.services');
    }

    // Szolgáltatás szerkesztése
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('dashboard.services.edit', compact('service'));
    }

    // Szolgáltatás frissítése
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image_url' => 'nullable|url',
            'visible' => 'boolean',
        ]);

        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect()->route('dashboard.services');
    }

    // Szolgáltatás törlése
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('dashboard.services');
    }
}