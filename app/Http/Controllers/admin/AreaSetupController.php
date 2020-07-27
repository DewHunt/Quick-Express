<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\AreaSetup;

class AreaSetupController extends Controller
{
    public function index()
    {
    	$title = "Area Setup";

        $totalArea = AreaSetup::count();

        $limit = floor($totalArea / 3);
        $lastLimit = $totalArea - $limit * 2;

    	$areas_00 = AreaSetup::skip(0)->take($limit)->get();
        $areas_01 = AreaSetup::skip($limit)->take($limit)->get();
        $areas_02 = AreaSetup::skip($limit*2)->take($lastLimit)->get();

    	return view('admin.areaSetup.index')->with(compact('title','areas_00','areas_01','areas_02'));
    }

    public function add()
    {
    	$title = "Add Area";
    	$formLink = "areaSetup.save";
    	$buttonName = "Save";

    	return view('admin.areaSetup.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        AreaSetup::create([
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('areaSetup.index'))->with('msg','Area Added Successfully');
    }

    public function edit($areaId)
    {
    	$title = "Edit Area Setup";
    	$formLink = "areaSetup.update";
    	$buttonName = "Update";

    	$area = AreaSetup::where('id',$areaId)->first();

    	return view('admin.areaSetup.edit')->with(compact('title','formLink','buttonName','area'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$area = AreaSetup::find($request->areaId);

        $area->update([
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('areaSetup.index'))->with('msg','Area Updated Successfully');
    }

    public function delete(Request $request)
    {
    	AreaSetup::where('id',$request->areaId)->delete();
    }

    public function status(Request $request)
    {
        $area = AreaSetup::find($request->areaId);

        if ($area->status == 1)
        {
            $area->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $area->update( [               
                'status' => 1                
            ]);
        }
    }
}
