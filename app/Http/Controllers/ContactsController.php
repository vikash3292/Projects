<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Company;

class ContactsController extends Controller
{
   public function index()
	{
		//$activeContact = Contact::active()->get();
		//$inactiveContact = Contact::inactive()->get();
		$contact = Contact::all();

		return view('contact.index', compact('contact'));
	}
	
	
	public function create()
	
	{
		$companies = Company::all();
		
		return view('contact.create', compact('companies'));
	}
	
		
	
	public function store()
	{
		$data = request()->validate([
			'name' => 'required',
			'lastname' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'message' => 'required',
			'pincode' => 'required',
			'active' => 'required',
			'company_id' => 'required',
		
		]);
		
			Contact::create($data);
		return  redirect('contact');
	}
	
	public function show(Contact $contacts)
	{
		//$contacts = Contact::where('id', $contact)->firstOrFail();
		
		return view('contact.show', compact('contacts'));
	}
	
	public function edit(Contact $contacts)
	{
		//$contacts = Contact::where('id', $contact)->firstOrFail();
		
		return view('contact.edit', compact('contacts'));
	}
	
		public function update(Contact $contacts)
	{
		$data = request()->validate([
			'name' => 'required',
			'lastname' => 'required',
			'email' => 'required|email',
		
		]);
		
		$contacts->update($data);
		
		return redirect('contact/'.$contacts->id);
	}
	
	public function destroy(Contact $contacts)
	{
		$contacts->delete();
		
		return redirect('contact');
	}
}
