<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Agent;
use App\Admin;
use App\UserRoles;
use App\Warehouse;
use App\AreaSetup;

class AgentController extends Controller
{
    public function index()
    {
    	$title = "Agent Setup";

    	$agents = Agent::orderBy('name','asc')->get();

    	return view('admin.agent.index')->with(compact('title','agents'));
    }

    public function add()
    {
    	$title = "Add Agent";
    	$formLink = "agent.save";
    	$buttonName = "Save";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('id',8)->get();
        $warehouse_list = Warehouse::orderBy('name','asc')->where('status',1)->get();
        $area_list = AreaSetup::where('status',1)
                    ->orderBy('name','asc')
                    ->get();

    	return view('admin.agent.add')->with(compact('title','formLink','buttonName','userRoles','warehouse_list','area_list'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        if($request->area){
            $request->area = implode(',', $request->area);
        }

        $user = Admin::create( [           
            'role' => $request->role,     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,           
            'password' => bcrypt($request->password),                      
        ]);

        Agent::create([
            'user_id' => $user->id ,
            'user_role_id' => $request->role,
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'supporting_warehouse' => $request->supporting_warehouse,
            'address' => $request->address,
            'area' => $request->area,
            'created_by' => $this->userId,
        ]);

        return redirect(route('agent.index'))->with('msg','Agent Added Successfully');
    }

    public function edit($agentId)
    {
    	$title = "Edit Agent";
    	$formLink = "agent.update";
    	$buttonName = "Update";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();
        $warehouse_list = Warehouse::orderBy('name','asc')->where('status',1)->get();
        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

    	$agent = Agent::where('id',$agentId)->first();
        $user = Admin::where('id',$agent->user_id)->first();

    	return view('admin.agent.edit')->with(compact('title','formLink','buttonName','agent','userRoles','user','warehouse_list','area_list'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$agent = Agent::find($request->agentId);
        $user = Admin::find($request->userId);

        $user->update([           
            'role' => $request->role,     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,                     
        ]);

        if($request->area){
            $request->area = implode(',', $request->area);
        }

        $agent->update([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'supporting_warehouse' => $request->supporting_warehouse,
            'address' => $request->address,
            'area' => $request->area,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('agent.index'))->with('msg','Agent Updated Successfully');
    }

    public function delete(Request $request)
    {
    	Agent::where('id',$request->agentId)->delete();
    }

    public function status(Request $request)
    {
        $agent = Agent::find($request->agentId);

        if ($agent->status == 1)
        {
            $agent->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $agent->update( [               
                'status' => 1                
            ]);
        }
    }
}
