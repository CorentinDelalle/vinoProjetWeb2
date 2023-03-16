<?php

namespace App\Http\Controllers;

use App\Models\Cellier;
use Illuminate\Http\Request;
use App\Models\CelliersHasBouteilles;
use Illuminate\Support\Facades\DB;

class CelliersHasBouteillesController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return response()->json(CelliersHasBouteilles::all());
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

  public function getQuantiteParCellier()
  {
      $celliers = Cellier::select('celliers.*', DB::raw('SUM(celliers_has_bouteilles.quantite) as total'))
          ->join('celliers_has_bouteilles', 'celliers.id', '=', 'celliers_has_bouteilles.cellier_id')
          ->groupBy('celliers.id')
          ->get();
  
      return response()->json($celliers);
  }
  
  
  
  
}
