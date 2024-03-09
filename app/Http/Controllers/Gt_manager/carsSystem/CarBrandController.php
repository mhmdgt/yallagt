<?php

namespace App\Http\Controllers\Gt_manager\carsSystem;

use App\Models\CarBrand;
use App\Traits\ImageTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Buglinjo\LaravelWebp\Facades\Webp;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\GtManager\CarBrand\StoreCarBrandRequest;
use App\Http\Requests\GtManager\CarBrand\UpdateCarBrandRequest;

class CarBrandController extends Controller
{
    use ImageTrait;
    public function index()
    {
        
        
        $brands = CarBrand::latest()->get();

        return view('gt-manager.carsSystem.all_brands', compact('brands'));
    }

    public function store(StoreCarBrandRequest $request)
    {

        
            CarBrand::create([

                'name' => [
                    'en' => $request->name_en,
                    'ar' => $request->name_ar
                ],
                'slug' => Str::slug($request->name_en),
                'logo' => $this->uploadImage($request->logo, 'car_brands_logo'),
            ]);
        
        Alert::success('Success Message', 'Data processed successfully!');
        return  response()->json(['success', 'success']);
    }

    public function update(UpdateCarBrandRequest $request, CarBrand $carBrand)
    {

        $hexName = $request->logo ? $this->uploadImage($request->logo, 'car_brands_logo', $carBrand->logo) : $carBrand->logo;
        $carBrand->update([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ],
            'slug' => Str::slug($request->name_en),
            'logo' => $hexName,
        ]);
        Alert::success('success', 'Your brand has been Updated');
        return response()->json(['success' => "success"]);
    }

    public function destroy(CarBrand $carBrand)
    {
        $logo=$carBrand->logo;
      
       if( $carBrand->delete()){
        $this->deleteImage($logo,'car_brands_logo');
       
       }
        Alert::success('Successfully', 'Your brand has been deleted');
        return redirect()->route('car-brand.index');
    }
}
