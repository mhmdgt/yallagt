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
            $title = 'Delete User!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);

            $car_brand = CarBrand::with('models')->find($id);
            return view('gt-manager.carsSystem.brand_models', compact('car_brand'));
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










        // test //

        // public function AllStockCars()
        // {

        //     return view('gt-manager.carsSystem.stock_cars');
        // }
        public function AllStockCars()
        {

            return view('gt-manager.carsSystem.stock_cars');
        }


    } // End Class



            // $id = $request->input('id');
            // $brandData = json_decode($id, true); // true makes it an associative array

            // $brandID = $brandData['id'];

            // dd($brandID);

            // $id = $request->input('id');
            // dd($id);
