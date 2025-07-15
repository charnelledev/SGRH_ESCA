<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Http\Requests\RegionRequest;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $regions = Region::when($search, function ($query, $search) {
            $query->where('nom', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.regions.index', compact('regions'));
    }

    public function create()
    {
           $regions = Region::paginate(10); // ou n’importe quel nombre

        return view('admin.regions.create',compact('regions'));
    }

    public function store(RegionRequest $request)
    {
        Region::create($request->validated());
        return redirect()->route('admin.regions.index')->with('success', 'Région ajoutée avec succès.');
    }

    public function show(Region $region)
    {
        return view('admin.regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }

    public function update(RegionRequest $request, Region $region)
    {
        $region->update($request->validated());
        return redirect()->route('admin.regions.index')->with('success', 'Région mise à jour avec succès.');
    }

    public function destroy(Region $region)
    {
        $region->delete();
        return redirect()->route('admin.regions.index')->with('success', 'Région supprimée avec succès.');
    }
}
