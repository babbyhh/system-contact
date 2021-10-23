<div class="row">
    <div class="col-xs-10 col-sm-12 col-md-12">
        <i class="fas fa-user fa-x5 col-sx-2"></i>&nbsp;<label>Nome: </label> {!! $contato->Name !!}
    </div>
    <div class="col-xs-10 col-sm-12 col-md-12">
        <i class="fas fa-phone fa-x5 col-sx-2"></i>&nbsp;<label>Contato: </label>&nbsp; {!! $contato->contact !!}
    </div>
    <div class="col-xs-10 col-sm-12 col-md-12">
        <i class="fas fa-envelope-open-text fa-x5 col-sx-2"></i>&nbsp;<label>Email </label>&nbsp; {!! $contato->Email !!}
    </div>
    <div class="col-xs-10 col-sm-12 col-md-12 mt-3 text-right">
        <a href="{{ route('contact_edit', $contato->ID) }}" title="Editar" class="edit" ><i class="fas fa-edit text-primary"></i> Editar</a>    
        <a href="{{route('contact_destroy', $contato->ID) }}" title="Excluir" class="excluir" ><i class="fas fa-times text-danger"> Excluir</i></a>
        </div>
</div>