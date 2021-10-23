<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        $action = 'create';
        return view('contact.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:contact|max:100',
            'contact' => 'required|string|unique:contact|min:9',
        ]);
        if($request->ajax()) {
            $action = $request->action;
            $contato = new Contact();
            $contato->Name = $request->name;
            $contato->Contact = str_replace(' ', '',$request->contact);
            $contato->Email = $request->email;
            
            try {
                $valid = $contato->save();
                $success = 1;
                $msg = 'Contato inserido com sucesso!';
            }   catch(\Throwable $th) {
                $success = 2;
                print_r($th);exit;
                $msg = 'Contato não foi inserido.';
            }
              
           return ['success' => $success, 'msg' => $msg];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato =  Contact::where('ID', '=',$id)->first();
        
        return view('contact.details', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato =  Contact::find($id);
        
        $action = 'update';
        $nome = $contato['Name'];
        $id = $contato['ID'];
        $contatos = $contato['Contact'];
 
        $email = $contato['Email'];
        return view('contact.form', compact('nome', 'id', 'contatos', 'email', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'email' => 'required|email|max:150',
            'contato' => 'required|string',
        ]);
        if($request->ajax()) {
            
            $data = [
                'Name' => $request->nome,
                'Contact' => str_replace(' ', '',$request->contato),
                'Email' => $request->email
            ];
           
            try {
                $valid = Contact::where('ID','=',$id)->update($data);
                $success = 3;
                $msg = 'Contato atualizado com sucesso!';
            }   catch(\Throwable $th) {
                $success = 2;
                $msg = 'Contato não foi atualizado.';
            }
           return ['success' => $success, 'msg' => $msg];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    { 
        if($request->ajax()) {
            try {
                $valid = Contact::where('ID','=',$id)->delete();
                $success = 1;
                $msg = 'Contato removido com sucesso!';
            }   catch(\Throwable $th) {
                $success = 2;
                $msg = 'Contato não foi removido.';
            }
        return ['success' => $success, 'msg' => $msg];
        }
    }
    
}
