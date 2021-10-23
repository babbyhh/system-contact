@extends('layouts.app');

@section('content')
@include('contact.modal');
    <div class="container-fluid mt-5 px-5">
            <div class="card card-cascade wider reverse my-8 " >
                <div class="card-body text-center wow fadeIn" Style = "padding: 0.3rem 0 0 !important; ">
                     <div style="background-color:#0d47a1;"class="view narrower py-0 mx-1 mb-1 d-flex justify-content-between align-items-center">
                       <p class=" mx-4 text-center">
                            <h3 class= "white-text">Contatos</h3>
                        </p>
                </div>
            </div>
        </div>
        @if(Auth::check())
            <div class="m-3 p-3 " align="right">
                <a uri="{{ route('get-contact_create')}}" id="incluirContato" class="btn btn-primary">Incluir Contato</a>
            </div>
        @endif
        <div class="container-fluid">
            <div class="card card-cascade wider reverse my-8 px-5">
                <!--Card content-->
                <div class="card-body text-left wow fadeIn">
                <div class="col-12">
                        <label></label>
                    </div>
                <hr class="my-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Contato</th>
                            <th>Email</th>
                            <th>
                                @if(Auth::check()) 
                                    Ações
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->ID }}</td>
                            <td>{{ $contact->Name }}</td>
                            <td>{{ $contact->Contact }}</td>
                            <td>{{ $contact->Email }}</td>
                            <td>
                                @if(Auth::check())
                                    <a href="{{ route('contact_edit', $contact->ID) }}" title="Editar" class="edit" ><i class="fas fa-edit text-primary"></i></a>    
                                    <a href="{{route('contact_destroy', $contact->ID) }}" title="Excluir" class="excluir" ><i class="fas fa-times text-danger"></i></a>
                                    <a href="{{route('contact_show', $contact->ID) }}" title="Detalhes" class="detalhes" ><i class="fas fa-eye text-default"></i></i></a>
                                    
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection