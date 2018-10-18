@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align: center;">
                    <div style="height: 100px; width: 100px; border-radius: 100px; background: #e6e7e8; margin-left: auto;margin-right: auto;"></div>
                    <h1>Indicadores --  <a href="{{ route('Indicadores_Ver', ['id' => '-1','ruta' => 'crear'])}}" >Agregar</a></h1>
                </div>

                <div class="panel-body">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                <table class="table table-border">
                  <thead>
                    <tr>
                      <th>Proceso</th>
                      <th>Editar</th>
                      <th>Visualizar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($elementos as $elemento)
                  <tr>
                    <td>{{$elemento->indicador}}</td>
                    <td><a href="{{ route('Indicadores_Ver', ['id' => $elemento->id, 'ruta' => 'actualizar'])}}" class="btn btn-primary"><span class="glyphicon glyphicon-cog" aria-hidden="true"></a></span></td>
                    <td><a href="{{ route('Indicadores_Ver', ['id' => $elemento->id,'ruta' => 'Ver'])}}" class="btn btn-success"> <span class="glyphicon glyphicon-zoom-in " aria-hidden="true"></a></span></td>
                    <td><a id="delete_elemento" data-id="{{$elemento->id}}" href="{{ route('Indicadores_Ver', ['id' => $elemento->id,'ruta' => 'Ver'])}}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash r" aria-hidden="true"></a></span></td>

                  </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="delete_items" action="{{ route('Indicadores_delete') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                                <input id="id_delete" type="hidden" name="id" value="">
                                            
                     </form>

<div id="dialog-confirm" title="Advertencia">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>¿Al eliminar un proceso se Borran Todos sus demas datos relacionados al mismo?</p>
</div>

@endsection

@section('script')
<script >
    $(document).ready(function($) {
      $("a#delete_elemento").on("click", function(e){
       e.preventDefault();  
       var id=$(this).attr("data-id");
        $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Eliminar": function() {
          $("#id_delete").val(id);
          $("#delete_items").submit();
          $( this ).dialog( "close" );
        },
        Cancelar: function() {
          e.preventDefault();
          $( this ).dialog( "close" );
        }
      }
    });
        

      });
    });
</script>
@endsection
