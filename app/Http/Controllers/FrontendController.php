<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FrontEndMenu;
use App\ContactUs;

class FrontendController extends Controller
{
    public function index()
    {
    	// return view('frontend.home.index')->with(compact()); 
    	return view('frontend.home.index'); 
    }

    public function aboutUs()
    {
    	$pageTitle = "About Us";
    	return view('frontend.aboutUs.about')->with(compact('pageTitle'));
    }

    public function contactUs()
    {
    	$pageTitle = "Contact Us";

    	$allContacts = ContactUs::where('status','=',1)->orderBy('order_by','asc')->get();

    	return view('frontend.contactUs.contact')->with(compact('pageTitle','allContacts'));
    }

    public function parcelDelivery()
    {
    	$pageTitle = "Parcel Delivery";

    	return view('frontend.ourServices.service')->with(compact('pageTitle'));
    }

    public function documentDelivery()
    {
    	$pageTitle = "Document Delivery";

    	return view('frontend.ourServices.service')->with(compact('pageTitle'));
    }

    public function foodDelivery()
    {
    	$pageTitle = "Food Delivery";

    	return view('frontend.ourServices.service')->with(compact('pageTitle'));
    }

    public function groceryDelivery()
    {
    	$pageTitle = "Grocery Item";

    	return view('frontend.ourServices.service')->with(compact('pageTitle'));
    }
}
