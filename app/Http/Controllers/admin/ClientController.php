<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Client;
use App\Admin;
use App\UserRoles;
use App\AreaSetup;

class ClientController extends Controller
{
    public function index()
    {
    	$title = "Client Setup";

    	$clients = Client::orderBy('name','asc')->get();

    	return view('admin.client.index')->with(compact('title','clients'));
    }

    public function add()
    {
    	$title = "Add Client";
    	$formLink = "client.save";
    	$buttonName = "Save";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();
        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

    	return view('admin.client.add')->with(compact('title','formLink','buttonName','userRoles','area_list'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        if ($request->dob)
        {
            $dob = date('Y-m-d',strtotime($request->dob));
        }
        else
        {
            $dob = "";
        }

        Client::create([
            'user_role_id' => 4,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'address' => $request->address,
            'birth_date' => $dob,
            'area' => $request->area,
            'password' => bcrypt($request->password),
            'created_by' => $this->userId,
        ]);

        return redirect(route('client.index'))->with('msg','Client Added Successfully');
    }

    public function edit($clientId)
    {
    	$title = "Edit Client";
    	$formLink = "client.update";
    	$buttonName = "Update";

        $currentRole = UserRoles::where('id',$this->userRole)->first();
        $userRoles = UserRoles::where('level','>=',$currentRole->level)->orderBy('level','ASC')->get();
        $area_list = AreaSetup::where('status',1)->orderBy('name','asc')->get();

    	$client = Client::where('id',$clientId)->first();

    	return view('admin.client.edit')->with(compact('title','formLink','buttonName','client','userRoles','area_list'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

        if ($request->dob)
        {
            $dob = date('Y-m-d',strtotime($request->dob));
        }
        else
        {
            $dob = "";
        }

    	$client = Client::find($request->clientId);

        $client->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'nid' => $request->nid,
            'address' => $request->address,
            'area' => $request->area,
            'birth_date' => $dob,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('client.index'))->with('msg','Client Updated Successfully');
    }

    public function delete(Request $request)
    {
        $client = Client::find($request->clientId);

        Admin::where('id',$client->user_id)->delete();

    	Client::where('id',$client->id)->delete();
    }

    public function status(Request $request)
    {
        $client = Client::find($request->clientId);

        if ($client->status == 1)
        {
            $client->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $client->update( [               
                'status' => 1                
            ]);
        }
    }
}
