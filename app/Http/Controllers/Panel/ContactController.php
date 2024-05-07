<?php

namespace App\Http\Controllers\Panel;


use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index(){
        $Contacts = Contact::all();
        return view('panel.pages.contact.index',['Contacts' => $Contacts]);
    }
    public function show($id){
        if(empty($Contact = Contact::find($id))) abort(404);
        return view('panel.pages.contact.show',['Contact' =>$Contact]);
    }
    public  function destroy($id){
        if(empty($Contact = Contact::find($id))) abort(404);
        $Contact->delete();

        return Redirect::route('panel.contact.index')->with('success', __('Message deleted successfully'));
    }
}
