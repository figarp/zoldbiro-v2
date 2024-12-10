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
            'image_id' => 'nullable|exists:images,id', // Az image_id csak akkor érvényes, ha az létezik az images táblában
            'visible' => 'boolean',
        ]);

        // Új szolgáltatás létrehozása
        $service = Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'image_id' => $validated['image_id'], // Az image_id az inputból jön
            'visible' => $validated['visible'] ?? true,
        ]);

        // Naplózás
        $log = [
            "type" => 'Szolgáltatás',
            "change" => 'Új szolgáltatás lett létrehozva: ' . $request->get("name"),
        ];
        Changelog::create($log);

        return redirect()->route('dashboard.services')->with('success', 'Szolgáltatás sikeresen létrehozva!');
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

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        // Állítsuk be a 'visible' értéket false-ra
        $service->update(['visible' => false]);

        return redirect()->route('dashboard.services');
    }

    public function restore($id)
    {
        $service = Service::findOrFail($id);
        // Állítsuk vissza a 'visible' értéket true-ra
        $service->update(['visible' => true]);

        return redirect()->route('dashboard.services');
    }
}
