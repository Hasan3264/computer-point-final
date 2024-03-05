<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class AllProductReturnController extends Controller
{
    public function Accessories(Request $request){
        $product = product::where('category_id', 5)->paginate(40);
        $pageTitle='Computer Point/Accessories';
        return view('Frontend.Product.Accessorice.all_accessorice',[
            'product' => $product,
            'pageTitle' => $pageTitle
        ]);
    }
    private function filterAndPaginateProducts($query, Request $request,$viewName, $pageTitle)
    {     
        // Apply common filters
        $brands = $request->brands;
        $min = $request->min;
        $max = $request->max;
        $sort = $request->sort;
        // Apply filters
        if (!empty($brands)) {
             $query->where('brands', $brands);
        }

        if (!empty($min) || !empty($max)) {
            $query->whereBetween('after_discount', [$min, $max]);
        }

        // Add more conditions for other filters...
        if (!empty($sort)) {
            $query->orderBy('after_discount', $sort == 2 ? 'desc' : 'asc');
        }

        // Paginate the results
        $product = $query->paginate(40);

        return view($viewName, [
            'product' => $product,
            'pageTitle' => $pageTitle
        ]);
    }

    public function Motherboard(Request $request)
    {
        $query = product::where('subcategory_id', 10);

        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.matherbord', 'Computer Point/Motherboard');
    }

    public function Webcam(Request $request)
    {
        $query = product::where('subcategory_id', 6);

        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Webcam', 'Computer Point/Webcam');
    }
    public function Ram(Request $request)
    {
        $query = product::where('subcategory_id', 9);

        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Ram', 'Computer Point/Ram');
    }
    public function Harddisk(Request $request)
    {
        $query = product::where('subcategory_id', 13);

        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Harddisk', 'Computer Point/Harddisk');
    }
    public function Pad(Request $request)
    {
        $query = product::where('subcategory_id', 3);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Pad', 'Computer Point/Pad');
    }
    public function Monitor(Request $request)
    {
        $query = product::where('category_id', 1);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Monitor', 'Computer Point/Monitor');
    }
    public function Multiplug(Request $request)
    {
        $query = product::where('subcategory_id', 5);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Multiplug', 'Computer Point/Multiplug');
    }
    public function Pendrive(Request $request)
    {
        $query = product::where('subcategory_id', 4);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Pendrive', 'Computer Point/Pendrive');
    }
    public function Mouse(Request $request)
    {
        $query = product::where('subcategory_id', 7);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Mouse', 'Computer Point/Mouse');
    }
    public function PSU(Request $request)
    {
        $query = product::where('subcategory_id', 11);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.PSU', 'Computer Point/PSU');
    }
    public function SSD(Request $request)
    {
        $query = product::where('subcategory_id', 12);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.SSD', 'Computer Point/SSD');
    }
    public function Processor(Request $request)
    {
        $query = product::where('subcategory_id', 14);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Processor', 'Computer Point/Processor');
    }
    public function Adapter(Request $request)
    {
        $query = product::where('subcategory_id', 17);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Adapter', 'Computer Point/Adapter');
    }
    public function Keyboard(Request $request)
    {
        $query = product::where('subcategory_id', 19);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Keyboard', 'Computer Point/Keyboard');
    }
    public function UPS(Request $request)
    {
        $query = product::where('subcategory_id', 20);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.UPS', 'Computer Point/UPS');
    }
    public function Cooler(Request $request)
    {
        $query = product::where('subcategory_id', 30);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Cooler', 'Computer Point/Cooler');
    }
    public function Casing(Request $request)
    {
        $query = product::where('subcategory_id', 31);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Accessorice.Casing', 'Computer Point/Casing');
    }
    //desktop product access
    public function Desktop(Request $request)
    {
        $query = product::where('category_id', 2);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.desktop.Desktop', 'Computer Point/Desktop');
    }
    public function Laptop(Request $request)
    {
        $query = product::where('category_id', 4);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Laptop.all_laptop', 'Computer Point/Laptop');
    }
    public function printer(Request $request)
    {
        $query = product::where('category_id', 10);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.printer.printer', 'Computer Point/printer');
    }
    public function Scanner(Request $request)
    {
        $query = product::where('category_id', 11);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Scanner.Scanner', 'Computer Point/Scanner');
    }
    public function Router(Request $request)
    {
        $query = product::where('category_id', 3);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Router.Router', 'Computer Point/Router');
    }
    public function Tablets(Request $request)
    {
        $query = product::where('category_id', 15);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.mobile.Tablets', 'Computer Point/Tablets');
    }
    public function Sound_System(Request $request)
    {
        $query = product::where('category_id', 13);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.soundSystem.all', 'Computer Point/SoundSystem');
    }
    public function Head_phone(Request $request)
    {
        $query = product::where('category_id', 6);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.component.headphone', 'Computer Point/Headphone');
    }
    public function DockingStation(Request $request)
    {
        $query = product::where('category_id', 14);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.component.DockingStation', 'Computer Point/DockingStation');
    }
    public function Server(Request $request)
    {
        $query = product::where('category_id', 16);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Server.Server', 'Computer Point/Server');
    }
    public function Projector(Request $request)
    {
        $query = product::where('category_id', 12);
        return $this->filterAndPaginateProducts($query, $request,'Frontend.Product.Projector.Projector', 'Computer Point/Projector');
    }
}
