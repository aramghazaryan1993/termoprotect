<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactSeo;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{

    private ContactRepository $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function edit()
    {
        $contacts = ContactSeo::with(['localizations'])->first();
        return view('admin.contact-seo.edit',compact('contacts'));
    }

    public function contactUpdate(request $request)
    {
        $this->contactRepository->update($request->all());
        return Redirect::back()->with('success', 'Success');
    }
}
