<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use LaraDev\Models\Property;
use Illuminate\Support\Facades\DB;


class PropertyController extends Controller
{
    public function index()
    {
        //$properties = DB::select("SELECT * FROM properties ");
        $properties = Property::all();
     
        return view('property.index')->with('properties', $properties);
    }

    public function show($name_url)
    {

       // $property = DB::select("SELECT * FROM properties where name_url = ?", [$name_url]);
        $property = Property::where('name_url', $name_url)->get();


        if(!empty($property)){
            return view('property.show')->with('property', $property);
        } else {
            return redirect()->action([PropertyController::class, 'index']);
        }

    }

    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {

        $propertySlug = $this->setName($request->title);



 /*
        $property = [
            $request->title,
            $propertySlug,
            $request->descriptions, 
            $request->rental_price,
            $request->sale_price
        ];

        DB::insert("INSERT INTO properties (title, name_url, descriptions, rental_price, sale_price) VALUES 
                  (?, ?, ?, ?, ?)", $property); */

                  $property = [
                    'title'=>$request->title,
                    'name_url'=>$propertySlug,
                     'descriptions'=>$request->descriptions, 
                     'rental_price'=>$request->rental_price,
                     'sale_price'=>$request->sale_price
                  ];

                  Property::create($property);

                  return redirect()->action([PropertyController::class, 'index']);
    }


    public function edit($name_url)
    {
      //  $property = DB::select("SELECT * FROM properties where name_url = ?", [$name_url]);

        $property = Property::where('name_url', $name_url)->get();

        if(!empty($property)){
            return view('property.edit')->with('property', $property);
        } else {
            return redirect()->action([PropertyController::class, 'index']);
        }


    }


    
    public function update(Request $request, $id)
    {


        $propertySlug = $this->setName($request->title);


/*        $property = [
            $request->title,
            $propertySlug,
            $request->descriptions, 
            $request->rental_price,
            $request->sale_price,
            $id
        ];

        DB::update("UPDATE properties set title = ?, name_url = ?, descriptions = ?, rental_price = ?, sale_price = ? WHERE id = ?", $property);
        return redirect()->action([PropertyController::class, 'index']); */

        $property = Property::find($id);

echo '<pre>';
var_dump($property);
echo '</pre>';
exit;
        $property->title = $request->title;
        $property->name_url = $propertySlug;
        $property->descriptions = $request->descriptions;
        $property->rental_price = $request->rental_price;
        $property->sale_price = $request->sale_price;
        $property->title = $request->title;

        $property->save();
        
        return redirect()->action([PropertyController::class, 'index']);


        
    }



        public function destroy($name_url)
        {

           // $property = DB::select("SELECT * FROM properties where name_url = ?", [$name_url]);

            $property = Property::where('name_url', $name_url)->get();

            if(!empty($property)){
                DB::delete("DELETE FROM properties where name_url = ?", [$name_url]);
            }
            return redirect()->action([PropertyController::class, 'index']);

        }


















    private function setName($title)
    {

        $propertySlug = Str::slug($title);

    //        $properties = DB::select("SELECT * FROM properties");
        $properties = Property::all();
        $t = 0;
        foreach($properties as $property){
            if(Str::slug($property->title) === $propertySlug){
                $t++;
            }
        }

        if($t > 0){
            $propertySlug = $propertySlug . "-" . $t;
        }

        return $propertySlug;


    }


   




















}
