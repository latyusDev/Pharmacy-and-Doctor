<?php

namespace App\Http\Controllers\Pharmacy;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use App\Http\Requests\StoreDrugRequest;
use App\Http\Requests\UpdateDrugRequest;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['pharmacy','pharmacyStatus'])
             ->except(['login','register']);
    }

    public function index()
    {   
        $drugs = auth('pharmacy')->user()->drugs()->latest()
                 ->filter(request('search'))->simplePaginate(10);
        return view('pharmacy.index',[
            'drugs'=>$drugs
        ]);
    }
    
    public function create()
    {   
        return view('pharmacy.create');
    }
    
    public function store(StoreDrugRequest $request)
    {
        $drugs = $request->validated();
        $drugs['pharmacy_id'] = auth('pharmacy')->user()->id;
        $drug = Drug::firstOrNew($drugs); 
        if($drug->id){
            return back()->withErrors(['name'=>$drug->name.' already exist']);
        }
        else{
            $drug->save();
        }
        return redirect()->route('pharmacy.index');
    }
    
    public function show(Drug $drug)
    {   
        return view('pharmacy.show',[
            'drug'=>$drug
        ]);
    }

    public function edit(Drug $drug)
    {   
        Auth::shouldUse('pharmacy');
        $this->authorize('view', $drug);
        return view('pharmacy.edit',[
            'drug'=>$drug
       ]);
    }
    
    public function update(UpdateDrugRequest $request, Drug $drug)
    {   
        $drug->update($request->all());
        return redirect()->route('pharmacy.show',['drug'=>$drug->id
               ])->with('msg',$drug->name.' update successfully');
    }
    
    
    public function destroy(Drug $drug)
    {   
        Auth::shouldUse('pharmacy');
        $this->authorize('delete', $drug);
        $drug->delete();
        return redirect()->route('pharmacy.index')
                         ->with('msg','deleted successfully');
    }
}
