<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
    	$title = "Contact Us";

    	$allContacts = ContactUs::orderBy('order_by','asc')->get();

    	return view('admin.contactUs.index')->with(compact('title','allContacts'));
    }

    public function add()
    {
    	$title = "Add Contact Information";
    	$formLink = "contactUs.save";
    	$buttonName = "Save";

    	return view('admin.contactUs.add')->with(compact('title','formLink','buttonName'));
    }

    public function save(Request $request)
    {
    	// dd($request->all());

        ContactUs::create([
            'name' => $request->name,
            'contact_person' => $request->contactPerson,
            'phone_one' => $request->phoneOne,
            'phone_two' => $request->phoneTwo,
            'phone_three' => $request->phoneThree,
            'phone_four' => $request->phoneFour,
            'email_one' => $request->emailOne,
            'email_two' => $request->emailTwo,
            'email_three' => $request->emailThree,
            'email_four' => $request->emailFour,
            'address' => $request->address,
            'order_by' => $request->orderBy,
            'created_by' => $this->userId,
        ]);

        return redirect(route('contactUs.index'))->with('msg','Contact Added Successfully');
    }

    public function edit($contactId)
    {
    	$title = "Edit Contact Information";
    	$formLink = "contactUs.update";
    	$buttonName = "Update";

    	$contactInfo = ContactUs::where('id',$contactId)->first();

    	return view('admin.contactUs.edit')->with(compact('title','formLink','buttonName','contactInfo'));
    }

    public function update(Request $request)
    {
    	// dd($request->all());

    	$contactInfo = ContactUs::find($request->contactId);

        $contactInfo->update([
            'name' => $request->name,
            'contact_person' => $request->contactPerson,
            'phone_one' => $request->phoneOne,
            'phone_two' => $request->phoneTwo,
            'phone_three' => $request->phoneThree,
            'phone_four' => $request->phoneFour,
            'email_one' => $request->emailOne,
            'email_two' => $request->emailTwo,
            'email_three' => $request->emailThree,
            'email_four' => $request->emailFour,
            'address' => $request->address,
            'order_by' => $request->orderBy,
            'updated_by' => $this->userId,
        ]);

        return redirect(route('contactUs.index'))->with('msg','Contact Updated Successfully');
    }

    public function delete(Request $request)
    {
    	ContactUs::where('id',$request->contactId)->delete();
    }

    public function status(Request $request)
    {
        $contact = ContactUs::find($request->contactId);

        if ($contact->status == 1)
        {
            $contact->update( [               
                'status' => 0                
            ]);
        }
        else
        {
            $contact->update( [               
                'status' => 1                
            ]);
        }
    }
}
