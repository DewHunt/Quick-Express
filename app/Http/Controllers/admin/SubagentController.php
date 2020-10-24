<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Subagent;
use App\Agent;
use App\Admin;
use App\UserRoles;
use App\HelperClass;

class SubagentController extends Controller
{
    public function index()
    {
    	$title = "Subagent Setup";

    	$subagents = Subagent::select('tbl_subagents.*','tbl_agents.name as agentName')
    		->leftJoin('tbl_agents','tbl_agents.id','=','tbl_subagents.agent_id')
    		->orderBy('tbl_subagents.name','asc')
    		->get();

    	return view('admin.subagent.index')->with(compact('title','subagents'));
    }

    public function add()
    {
    	$title = "Add Subagent";
    	$formLink = "subagent.save";
    	$buttonName = "Save";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();

    	$agents = Agent::orderBy('name','asc')->get();

    	return view('admin.subagent.add')->with(compact('title','formLink','buttonName','agents','userRoles'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        $isEmailExists = HelperClass::checkEmail('admins','email',$request->userId,$request->email);

        if ($isEmailExists == null)
        {
            $user = Admin::create( [           
                'role' => '10',     
                'name' => $request->name,           
                'username' => $request->username,          
                'email' => $request->email,           
                'password' => bcrypt($request->password),                      
            ]);

            Subagent::create([
                'user_id' => $user->id ,
                'user_role_id' => '10',
                'agent_id' => $request->agentId,
                'name' => $request->name,
                'contact_person' => $request->contactPerson,
                'phone' => $request->phone,
                'email' => $request->email,
                'nid' => $request->nid,
                'address' => $request->address,
                'created_by' => $this->userId,
            ]);

            return redirect(route('subagent.index'))->with('msg','SUbagent Added Successfully');
        }
        else
        {
            return redirect(route('subagent.add'))->with('error','This Email "'.$request->email.'" Already Exists');
        }
    }

    public function edit($subagentId)
    {
    	$title = "Edit Subagent";
    	$formLink = "subagent.update";
    	$buttonName = "Update";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();

    	$agents = Agent::orderBy('name','asc')->get();
    	$subagent = Subagent::where('id',$subagentId)->first();

        $user = Admin::where('id',$subagent->user_id)->first();

    	return view('admin.subagent.edit')->with(compact('title','formLink','buttonName','agents','subagent','userRoles','user'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

        $isEmailExists = HelperClass::checkEmail('admins','email',$request->userId,$request->email);

        if ($isEmailExists == null)
        {
            $subagent = Subagent::find($request->subagentId);
            $user = Admin::find($request->userId);

            $user->update([           
                'role' => '10',     
                'name' => $request->name,           
                'username' => $request->username,          
                'email' => $request->email,                     
            ]);

            $subagent->update([
                'agent_id' => $request->agentId,
                'name' => $request->name,
                'contact_person' => $request->contactPerson,
                'phone' => $request->phone,
                'email' => $request->email,
                'nid' => $request->nid,
                'address' => $request->address,
                'updated_by' => $this->userId,
            ]);

            return redirect(route('subagent.index'))->with('msg','Subagent Updated Successfully');
        }
        else
        {
            return redirect(route('subagent.edit',$request->subagentId))->with('error','This Email "'.$request->email.'" Already Exists');
        }

    }

    public function delete(Request $request)
    {
        $subagent = Subagent::find($request->subagentId);

        Admin::where('id',$subagent->user_id)->delete();

    	Subagent::where('id',$request->subagentId)->delete();
    }

    public function status(Request $request)
    {
        $subagent = Subagent::find($request->subagentId);

        if ($subagent->status == 1)
        {
            $subagent->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $subagent->update( [               
                'status' => 1                
            ]);
        }
    }
}
