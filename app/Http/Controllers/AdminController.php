<?php

namespace App\Http\Controllers;

use App\Models\mtc;
use App\Models\form;
use App\Models\Mtcmodel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function index(){
        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){
                return view('admin.index',[
                    'mtcs' => mtc::latest()->get()
                ]);
            }

            else if($user_type == 'user'){
                return view('home.index',[
                    'mtcs' => mtc::latest()->get()
                ]);
            }
        }

        else{
            return redirect()->back();
        }
    }

    //show create form
    public function create(){
        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){

                return view('admin.create',[
                    'mtcs' => mtc::latest()->get(),
                    'mtcmodels'=> Mtcmodel::latest()->get()
                ]);
            }

            else if($user_type == 'user'){
                return redirect('/')->with('message', 'Sorry you dont have the authority!');

            }
        }

        else{
            return redirect()->back();
        }
    }

    //show create location setat
    public function addloc(){
        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){
                return view('admin.addloc',[
                    'mtcs' => mtc::latest()->get()
                ]);
            }

            else if($user_type == 'user'){
                return redirect('/')->with('message', 'Sorry you are not sigma!');
            }
        }

        else{
            return redirect()->back();
        }
    }

    //show create indemnityform
    public function createform(){
        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){
                
                return view('admin.createform',[
                    'forms' => form::latest()->get(),
                    'mtcs' => mtc::latest()->filter(request(['search']))->get(),
                ]);
            }

            else if($user_type == 'user'){
                return redirect('/')->with('message', 'Sorry you are not sigma!');
            }
        }

        else{
            return redirect()->back();
        }
    }

    //show edit indemnity form
    public function editform(form $form){
        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){
                
                return view('admin.editindemnity', 
                    ['form'=>$form,
                    'mtcs'=> mtc::latest()->get()]);
            }

            else if($user_type == 'user'){
                return redirect('/')->with('message', 'Sorry you are not sigma!');
            }
        }

        else{
            return redirect()->back();
        }
    }


    public function test2()
    {
        $mtcCount = mtc::count(); // Get the count of mtcs

        

        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){
                
                return view('admin.test', [
                    'forms' => form::latest()->get(),
                    'mtc' => $mtcCount, // Pass the count of mtcs to the view
                ]);
            }

            else if($user_type == 'user'){
                return redirect('/')->with('message', 'Sorry you are not sigma!');
            }
        }
    }

    //show edit form
    public function edit(mtc $mtc){
        

        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){
                
                return view('home.edit', 
                    ['mtc'=>$mtc,
                    'mtcmodels'=> Mtcmodel::latest()->get()]);
            }

            else if($user_type == 'user'){
                return redirect('/')->with('message', 'Sorry you are not sigma!');
            }
        }
    }

    public function destroy($mtc){
        

        if(Auth::id()){
            $user_type = Auth::user()->usertype;   
            
            if($user_type == 'admin'){
                $data = mtc::find($mtc);
                $data->delete();

                return redirect()->back();
            }

            else if($user_type == 'user'){
                return redirect('/')->with('message', 'Sorry you are not sigma!');
            }
        }
    }
}
