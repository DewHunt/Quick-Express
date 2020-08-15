<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Agent;
use App\Admin;
use App\UserRoles;
use App\Warehouse;
use App\AreaSetup;
use App\HubSetup;

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

        // $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

        $hubs = HubSetup::select('tbl_hubs.*')
            ->leftJoin('tbl_agents','tbl_agents.hub_id','=','tbl_hubs.id')
            ->whereNull('tbl_agents.hub_id')
            ->get();

    	return view('admin.agent.add')->with(compact('title','formLink','buttonName','userRoles','warehouse_list','hubs'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        // if($request->area)
        // {
        //     $area = implode(',', $request->area);
        // }
        // else
        // {
        //     $area = '';
        // }

        $user = Admin::create( [           
            'role' => '8',     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,           
            'password' => bcrypt($request->password),                      
        ]);

        Agent::create([
            'user_id' => $user->id ,
            'user_role_id' => '8',
            'hub_id' => $request->hub,
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'supporting_warehouse' => $request->supporting_warehouse,
            'address' => $request->address,
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
        // $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

        $agent = Agent::where('id',$agentId)->first();

        $hubs = HubSetup::select('tbl_hubs.*')
            ->leftJoin('tbl_agents','tbl_agents.hub_id','=','tbl_hubs.id')
            ->where('tbl_agents.hub_id',$agent->hub_id)
            ->oRWhereNull('tbl_agents.hub_id')
            ->get();

        $user = Admin::where('id',$agent->user_id)->first();

    	return view('admin.agent.edit')->with(compact('title','formLink','buttonName','agent','userRoles','user','warehouse_list','hubs'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$agent = Agent::find($request->agentId);
        $user = Admin::find($request->userId);

        $user->update([           
            'role' => '8',     
            'name' => $request->name,           
            'username' => $request->username,          
            'email' => $request->email,                     
        ]);

        // if($request->area)
        // {
        //     $area = implode(',', $request->area);
        // }
        // else
        // {
        //     $area = '';
        // }

        $agent->update([
            'hub_id' => $request->hub,
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'supporting_warehouse' => $request->supporting_warehouse,
            'address' => $request->address,
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
