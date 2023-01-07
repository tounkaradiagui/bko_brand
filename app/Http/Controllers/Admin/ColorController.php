<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $couleurs = Color::all();
        return view('admin.colors.index', compact('couleurs'));
    }

    public function create()
    {
        
        return view('admin.colors.create');
    }


    public function store(ColorFormRequest $request)
    {
      $Data = $request->validated();
      $Data['status'] = $request->status == true ? '1':'0';

      Color::create($Data);

      return redirect('admin/colors')->with('message', 'La couleur a été ajouté avec succès');


    }


    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, $color_id)
    {
        $Data = $request->validated();
        $Data['status'] = $request->status == true ? '1':'0';
        Color::find($color_id)->update($Data);

      return redirect('admin/colors')->with('message', 'La couleur a été modifiée avec succès');

    }

    public function destroy($color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message', 'La couleur a été supprimée avec succès');
    }
}
