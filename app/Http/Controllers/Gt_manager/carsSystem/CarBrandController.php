<?php

namespace App\Http\Controllers\Gt_manager\carsSystem;

use App\Models\CarBrand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Buglinjo\LaravelWebp\Facades\Webp;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\GtManager\CarBrand\StoreCarBrandRequest;

class CarBrandController extends Controller
{
    // -------------------- Show All Brands Method -------------------- //
    public function AllCarBrands()
    {
        $brands = CarBrand::latest()->get(['id','name','slug']);
        return view('gt-manager.carsSystem.all_brands', compact('brands'));
    }

    // -------------------- Store Brand Method v2 -------------------- //
    public function StoreCarBrand(StoreCarBrandRequest $request)
    {
    //    dd($request->all());
        // $request->validate([
        //     'name_ar' => 'required|string',
        //     'name_en' => 'required|string',
        //     'logo' => 'required|image|mimes:png', // Adjust allowed extensions
        // ]);

        $webp = Webp::make($request->file('logo'));

        $hexName = $request->input('name_en') . md5(time()) . '.webp';

        if ($webp->save(public_path('gt_manager/media/car_brands_logo/' . $hexName))) {

            // File is saved successfully
            CarBrand::create([
               
                'name' => $request->name_en,
                'slug' => Str::slug($request->name_en),
                'logo' => $hexName,
            ]);
        }
        toast('Your Brand as been added!', 'success');
        return response()->json(['success'=>"stored"]);
    }

    // -------------------- Update Brand Method -------------------- //
    public function UpdateCarBrand(Request $request)
    {
        $request->validate([
            'name_ar' => 'unique|string',
            'name_en' => 'unique|string',
            'logo' => 'image|mimes:png', // Adjust allowed extensions
        ]);

        $webp = Webp::make($request->file('logo'));

        $hexName = $request->input('name_en') . md5(time()) . '.webp';

        if ($webp->save(public_path('gt_manager/media/car_brands_logo/' . $hexName))) {
            CarBrand::insert([
                'brand_name' => $request->input('name_ar'),
                'slug' => $request->input('name_en'),
                'logo' => $hexName,
            ]);
        }

        Alert::success('Successfully', 'Your brand has been Updated');
        return redirect()->route('show-all-car-brands');
    }

    // -------------------- Delete Brand Method -------------------- //
    public function DeleteCarBrand($id)
    {
        CarBrand::findOrFail($id)->delete();
        Alert::success('Successfully', 'Your brand has been deleted');
        return redirect()->route('show-all-car-brands');
    }
} /////////////////////////  End Page /////////////////////////
