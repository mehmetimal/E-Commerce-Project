<?php


namespace App\Services;


use App\Models\Contact;

class ContactService
{

    public  function getContacts(){
       return  Contact::all();
    }
    public  function getContactService($contact_id){
            return Contact::findOrFail($contact_id);
    }

}
