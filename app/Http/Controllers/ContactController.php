<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactService;
    public  function __construct()
    {
        $this->middleware('permission:Read Contact')->only('index','show');
        $this->middleware('permission:Update Contact')->only('show');
        $this->contactService=new ContactService();
    }

    /**
     * @return ContactService
     */
    public function getContactService(): ContactService
    {
        return $this->contactService;
    }


    public function index()
    {
        $contacts=$this->getContactService()->getContacts();
        return view('backend.contact.index')->with([
            'contacts'=>$contacts,
        ]);
    }

    public  function show($contact_id){
    $contact =$this->getContactService()->getContactService($contact_id);

    return view('backend.contact.show')->with([
        'contact'=>$contact
    ]);
   }

   public function destroy(Contact $contact)
    {
        //
    }
}
