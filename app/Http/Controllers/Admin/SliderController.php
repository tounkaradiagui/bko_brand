<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(SliderFormRequest $request)
    {
        $validateData = $request->validated(); 

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filenname =time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/slider'), $filenname);
        }


        $validateData['status'] = $request->status == true ? '1' : '0';

        Slider::create([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'image' => $filenname,
            'status' => $validateData['status']
        ]);

        return redirect('admin/sliders')->with('message', 'Slider ajouté avec succès');
    }

    public function edit($slider)
    {
        $slider = Slider::findOrFail($slider);
        return view('admin.slider.edit', compact('slider'));
    }


    public function update(SliderFormRequest $request, Slider $slider)
    {
        // return $slider;

        $validateData = $request->validated(); 

        if($request->hasFile('image')){

            $destination = ('uploads/slider/');
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filenname =time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/slider/'), $filenname);
        }


        $validateData['status'] = $request->status == true ? '1' : '0';
        $destination = ('uploads/slider/');

        Slider::where('id', $slider->id)->update([
            'title' => $validateData['title'],
            'description' => $validateData['description'],
            'image' => $filenname ?? $destination,
            'status' => $validateData['status']
        ]);

        return redirect('admin/sliders')->with('message', 'Slider modifié avec succès');

    }

    public function destroy(Slider $slider)
    {
        if($slider->count() > 0)
        {
            $destination = ('uploads/slider');
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $slider->delete();
        }

        return redirect('admin/sliders')->with('message', 'Slider supprimé avec succès');
    }

}
