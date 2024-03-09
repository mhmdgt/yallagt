<?php

namespace App\Http\Controllers\Gt_manager\carsSystem;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use Buglinjo\LaravelWebp\Facades\Webp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class CarBrandController extends Controller
{
    // -------------------- Show All Brands Method -------------------- //
    public function AllCarBrands()
    {
        $brands = CarBrand::orderBy('brand_name', 'asc')->get();
        return view('gt-manager.cars_assets.all_brands', compact('brands'));
    }

    // -------------------- Store Brand Method v2 -------------------- //
    public function StoreCarBrand(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'logo' => 'required|image|mimes:png', // Adjust allowed extensions
        ]);

        $webp = Webp::make($request->file('logo'));

        $hexName = $request->input('name_en') . md5(time()) . '.webp';

        if ($webp->save(public_path('gt_manager/media/car_brands_logo/' . $hexName))) {

            // File is saved successfully
            CarBrand::create([
                'brand_name' => $request->input('name_ar'),
                'slug' => $request->input('name_en'),
                'logo' => $hexName,
            ]);
        }
        toast('Your Brand as been added!', 'success');
        return back();
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
