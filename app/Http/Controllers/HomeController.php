<?php

namespace App\Http\Controllers;

use App\Models\mtc;
use App\Models\form;
use App\Models\location;
use App\Models\Mtcmodel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    //show list of mtcs

    public function index(){
        return view('home.index', [
            'mtcs' => mtc::latest()->filter(request(['search']))->get(), // Apply the filter scope
            'search' => request('search')
        ]);
        
    }

    //show list of forms
    public function show_form(){
        return view('home.forms', [
            'forms' => form::latest()->filter(request(['search']))->get()
        ]);
        
    }

    //show create form
    public function create(){
        $mtc = mtc::latest()->filter(request(['search']))->get();
        return view('home.create',[
            'mtcs' => $mtc
        ]);
    }

    


    //show edit 3 action
    public function property(mtc $mtc){
        return view('home.property', 
        ['mtc'=>$mtc,
        'mtcmodels'=> Mtcmodel::latest()->get()]);
    }

    //show seat location 
    public function show_seat(){
        $locations = Location::all()->groupBy('level');
        // $loc = location::latest()->get();

        return view('home.seat',
        [//
            'levels' => $locations,
            // 'locations' => $loc
        ]);
    }


    //update listing data
    public function update(Request $request, mtc $mtc){
        $formFields = $request->validate([
            'model'=>'required',
            'serialno'=>['required'],
            'mac'=>'required',
            'status'=>'required',
            // 'user'=>'required',
            // 'seatid'=>'required',
        ]);

        // if($request->hasFile('fpage')){
        //     $formFields['fpage']= $request->file('fpage')->store('fpages', 'public');
        // }


        $mtc->update($formFields);


        return redirect('/')->with('message', 'Listing updated bruh!'); 
    }

    //update listing data (mtc proeprty 3 action tu)
    public function update2(Request $request, mtc $mtc)
    {
        $formFields = $request->validate([
            'status' => 'required|in:store,deployed,loan',
            'seatid' => 'required',
            'user' => 'nullable|string',
        ]);

        // Update fields based on the status
        if ($request->status === 'store') {
            $formFields['seatid'] = null; // Ensure seatid is null when storing
            $formFields['user'] = null;  // Ensure user is null when storing
        } elseif($request->status === 'loan'){
            $formFields['seatid'] = null;

        }

        // Update the MTC record with the modified form fields
        $mtc->update($formFields);

        return redirect('/')->with('message', 'Listing updated bruh!');
    }

    //update indemniity formmm
    public function update_form(Request $request, form $form){
        $formFields = $request->validate([
            'userid' => 'required|string',
            'status' => 'required|in:pending,loan,returned',
            'serialno' => 'required',
            'mouse'  => 'boolean',
            'cable'  => 'boolean',
            'bag'    => 'boolean',
            'adapter'=> 'boolean',
        ]);

        // Update the indemnity form record with the modified form fields
        $form->update($formFields);

        return redirect('/forms')->with('message', 'Listing updated bruh!');
    }


    //store location data
    public function store_loc(Request $request){
        $formFields = $request->validate([
            'seatid'=>'required',
            'level'=>'required',
            'seat'=>'required',

        ]);

        location::create($formFields);

        return redirect('/add_loc')->with('message', 'Listing created bruh!'); 
    }

    //store mtc data
    public function store(Request $request){
        $formFields = $request->validate([
            'model'=>'required',
            'serialno'=>'required',
            'mac'=>'required',
            'status'=>'required',
            'user'=>'nullable',

        ]);

        mtc::create($formFields);

        return redirect('/')->with('message', 'MTC added bruh!'); 
    }


    //store formdata
    // Store indemnity form data
    public function store_form(Request $request)
    {
        $formFields = $request->validate([
            'userid' => 'required|string',
            'status' => 'required|in:pending,approved,loan',
            'serialno' => 'required|string',
            'mouse'  => 'boolean',
            'cable'  => 'boolean',
            'bag'    => 'boolean',
            'adapter'=> 'boolean',
        ]);

        if ($request->hasFile('proof')) {
            $formFields['proof'] = $request->file('proof')->store('proofs', 'public');
        }

        $mtc = Mtc::where('serialno', $request->input('serialno'))->first();

        if (!$mtc) {
            return back()->withErrors(['serialno' => 'The specified MTC does not exist.'])->withInput();
        }

        // Update the MTC status to 'loan'
        $mtc->update([
            'status' => 'loan', // Change the status to 'loan'
            'userid' => $formFields['userid'], // Update the user ID in the MTC table
            
        ]);
        
        // Assign the MTC ID as the foreign key
        $formFields['serialno'] = $mtc->id;

        // Store the form data in the forms table
        Form::create($formFields);

        return redirect('/forms')->with('message', 'Form created and MTC status updated to loan!');
    }


    //store model data
    public function store_model(Request $request){
        $formFields = $request->validate([
            'name'=>'required',

        ]);

        Mtcmodel::create($formFields);

        return redirect('/home/create')->with('message', 'New MTC Model created bruh!'); 
    }



    //test try
    public function showBySerialNo($serialno)
    {
        $mtc = mtc::where('serialno', $serialno)->firstOrFail(); // Find the mtc by serialno or fail
        
        return view('home.mtc', [
            'mtc' => $mtc, // Pass the found mtc object to the view
        ]);
    }

    // public function show(mtc $mtc){
    //     return view('home.mtc',[
    //         'mtc'=>$mtc
    //     ]);
    // }
}
