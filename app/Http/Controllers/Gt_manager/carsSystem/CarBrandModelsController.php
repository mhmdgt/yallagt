<?php

namespace App\Http\Controllers\Gt_manager\carsSystem;

use App\Models\CarBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarBrandModel;

class CarBrandModelsController extends Controller
{
        // -------------------- Show Brand Models Method -------------------- //
        public function AllBrandModels ($id)
        {
            confirmDelete('Delete Brand!', 'Are you sure you want to delete?');

            $car_brand = CarBrand::with('models')->find($id);
            return view('gt-manager.cars_assets.brand_models', compact('car_brand'));
        }

        // -------------------- Store Brand Models Method -------------------- //
        public function StoreBrandModel(Request $request, $id)
        {

            $request->validate([
                'name_ar' => 'required|string',
                'name_en' => 'required|string',
            ]);

            CarBrandModel::create([
                'car_brand_id' => $id,
                'model_name' => $request->input('name_ar'),
                'slug' => $request->input('name_en'),
            ]);

            toast('Your Brand as been added!', 'success');
            return back();
        }

        // -------------------- Update Brand Models Method -------------------- //











        // -------------------- Delete Brand Models Method -------------------- //






        // test for another future ctrl 'ModelSpecs' //
        public function allSpcesPage ()
        {
            return view('gt-manager.cars_assets.model_specs');
        } 

    } // End Class


