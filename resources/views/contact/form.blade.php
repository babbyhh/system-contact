@php 
    if( !isset($nome) ) {$nome = '';}
    if( !isset($contatos) ) {$contatos = '';}
    if( !isset($email) ) {$email = '';}
    if( !isset($id) ) {$id = '';}
    if( $action == 'create') {
        $url = route('contact_store');
    } else {
        $url = route('contact_update', $id);
    }
@endphp
<div class="row">
    <form id="contatos" action="{{ $url }}">
        @csrf
        <input type="hidden" id="action" name="action" value="{{$action}}"/>
        <input type="hidden" id="id" name="id" value="{{$id}}"/>
        <div class="col-xs-10 col-sm-12 col-md-12">
            <i class="fas fa-user fa-x5 col-sx-2"></i>&nbsp;<label>Nome </label>&nbsp;<i style="color:red;  font-size:10px; " class="fas fa-asterisk fa-1x "></i>
            <input class="form-control" id="nome" name="name" value="{!! $nome !!}" />
        </div>
        <div class="col-xs-10 col-sm-12 col-md-12">
            <i class="fas fa-phone fa-x5 col-sx-2"></i>&nbsp;<label>Contato </label>&nbsp;<i style="color:red;  font-size:10px; " class="fas fa-asterisk fa-1x "></i>
            <input class="form-control" id="contato" name="contact" value="{!! $contatos !!}" />
        </div>
        <div class="col-xs-10 col-sm-12 col-md-12">
            <i class="fas fa-envelope-open-text fa-x5 col-sx-2"></i>&nbsp;<label>Email </label>&nbsp;<i style="color:red;  font-size:10px; " class="fas fa-asterisk fa-1x "></i>
            <input class="form-control" id="email" name="email" value="{!! $email !!}" />
        </div>
    </form>
</div>