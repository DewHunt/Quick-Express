<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\AreaSetup;
use App\HubSetup;

class AreaSetupController extends Controller
{
    public function index()
    {
    	$title = "Area Setup";

        $hubs = HubSetup::orderBy('name')->get();

        $totalArea = AreaSetup::count();

        $limit = floor($totalArea / 4);
        $lastLimit = $totalArea - $limit * 3;

    	$areas_01 = AreaSetup::skip(0)->take($limit)->orderBy('name')->get();
        $areas_02 = AreaSetup::skip($limit)->take($limit)->orderBy('name')->get();
        $areas_03 = AreaSetup::skip($limit*2)->take($limit)->orderBy('name')->get();
        $areas_04 = AreaSetup::skip($limit*3)->take($lastLimit)->orderBy('name')->get();

    	return view('admin.areaSetup.index')->with(compact('title','areas_01','areas_02','areas_03','areas_04','hubs'));
    }

    public function add()
    {
    	$title = "Add Area";
    	$formLink = "areaSetup.save";
    	$buttonName = "Save";

        $hubs = HubSetup::orderBy('name')->get();

    	return view('admin.areaSetup.add')->with(compact('title','formLink','buttonName','hubs'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        AreaSetup::create([
            'hub_id' => $request->hub,
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('areaSetup.index'))->with('msg','Area Added Successfully');
    }

    public function edit($areaId)
    {
    	$title = "Edit Hub Setup";
    	$formLink = "areaSetup.update";
    	$buttonName = "Update";

        $hubs = HubSetup::orderBy('name')->get();
    	$area = AreaSetup::where('id',$areaId)->first();

    	return view('admin.areaSetup.edit')->with(compact('title','formLink','buttonName','area','hubs'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$area = AreaSetup::find($request->areaId);

        $area->update([
            'hub_id' => $request->hub,
            'name' => $request->name,
            'description' => $request->description,
            'order_by' => $request->orderBy,
            'updated_by' => $this->userId,
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

    public function getAreaInfo(Request $request)
    {
        $sl = 1;
        $output = '';

        if ($request->hubId)
        {
            $areas = AreaSetup::where('hub_id',$request->hubId)->orderBy('name')->get();

            $output .= '<table class="table table-bordered table-striped areaTable0"  name="areaTable">';
            $output .= '<thead class="thead-light">';
            $output .= '<tr>';
            $output .= '<th width="20px">SL</th>';
            $output .= '<th>Name</th>';
            $output .= '<th width="60px" style="text-align: center;">Action</th>';
            $output .= '</tr>';
            $output .= '</thead>';
            $output .= '<tbody id="">';
            foreach ($areas as $area)
            {
                $a = \App\Link::action($area->id);
                $output .= '<tr class="row_'.$area->id.'">';
                $output .= '<td>'.$sl++.'</td>';
                $output .= '<td>'.$area->name.'</td>';
                $output .= '<td class="text-center">';
                $output .= '<a href="'.route('areaSetup.edit',$area->id).'" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a> <a id="cancel_'.$area->id.'" href="javascript:void(0)" data-toggle="tooltip" data-original-title="Delete" data-id="'.$area->id.'"  data-token="{{ csrf_token() }}"> <i class="fa fa-trash text-danger"></i> </a>';
                $output .= '</td>';
                $output .= '</tr>';
            }
            $output .= '</tbody>';
            $output .= '</table>';
        }
        else
        {
            $output .= '<table class="table table-bordered table-striped areaTable0"  name="areaTable">';
            $output .= '<tbody id="">';
            $output .= '<tr><td class="text-center">Please Select A Hub.</td></tr>';
            $output .= '</tbody>';
            $output .= '</table>';
        }

        echo $output;        
    }
}
