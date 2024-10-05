<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seats= seat::orderBy('created_at','DESC')->get();
        return view('dashboard.seats.index',[
            'seats'=>$seats
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.seats.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all()); 
    //     $rules=[
    //         'seatCode'=>'required',
    //         'isBooked'=>'required',
    //         'underMaintainance'=>'required',
        
    //     ];

    // $validator= validator::make($request->all(), $rules);

    // if ($validator->fails()) {
    //     return redirect()->route('seats.create')->withInput()->withErrors($validator);
    //     # code...
    // }

    // $request->validate([
    //         'seatCode'=>'required',
    //         'isBooked'=>'required',
    //         'underMaintainance'=>'required',
        
    //         // "image" => "required|image|mimes:png,jpg|max:1024",
    //         // 'author_id' => "required|exists:authors,id",
    //     ], [
    //         'isBooked.required' => "the field  is Req.",
    //         'underMaintainance.required' => "the field  is Req.",

    //     ]);

    // Define validation rules
    $rules = [
        'seatCode' => 'required',
        'isBooked' => 'required',
        'under_maintainance' => 'required',
    ];

    // Custom error messages
    $messages = [
        'isBooked.required' => 'The Is Booked field is required.',
        'under_maintainance.required' => 'The Under Maintenance field is required.',
    ];

    // Custom field names for more readable error messages
    $attributes = [
        'seatCode' => 'Seat Code',
        'isBooked' => 'Is Booked',
        'under_maintainance' => 'Under Maintenance',
    ];

    // Perform validation
    $validator = Validator::make($request->all(), $rules, $messages);
    $validator->setAttributeNames($attributes);

    if ($validator->fails()) {
        return redirect()->route('seats.create')->withErrors($validator)->withInput();
    }

    $seat= new seat();

    $seat->seat_code = $request->seatCode; 
    $seat->is_booked = $request->isBooked; 
    $seat->under_maintainance = $request->under_maintainance; 
    $seat->save(); 

    return redirect()->route('seats.index')->with('success','seat added succesfully');

}

    /**
     * Display the specified resource.
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seat= Seat::findOrFail($id);
        return view('dashboard.seats.edit', [
            'seat'=>$seat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $seat= Seat::findOrFail($id);
        $rules = [
            'seatCode' => 'required',
            'isBooked' => 'required',
            'under_maintainance' => 'required',
        ];
    
        // Custom error messages
        $messages = [
            'isBooked.required' => 'The Is Booked field is required.',
            'under_maintainance.required' => 'The Under Maintenance field is required.',
        ];
    
        // Custom field names for more readable error messages
        $attributes = [
            'seatCode' => 'Seat Code',
            'isBooked' => 'Is Booked',
            'under_maintainance' => 'Under Maintenance',
        ];
    
        // Perform validation
        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->setAttributeNames($attributes);
    
        if ($validator->fails()) {
            return redirect()->route('seats.edit', $seat->id)->withErrors($validator)->withInput();
        }
    
        $seat= new seat();
    
        $seat->seat_code = $request->seatCode; 
        $seat->is_booked = $request->isBooked; 
        $seat->under_maintainance = $request->under_maintainance; 
        $seat->save(); 
    
        return redirect()->route('seats.index')->with('success','seat Updated succesfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $seat= Seat::findOrFail($id);
        $seat->delete();
        return redirect()->route('seats.index')->with('success','seat deleted succesfully');
    
    }
    
}
