@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
  <div class="col-md-6">
    <ul class="breadcrumb">
      <li><a href="{{route('inicio')}}"><i class="fa fa-home"></i> Início</a></li>
      <li class="active">Usuários</li>
    </ul>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">
        <div class="panel-title">
          <h5>Usuários</h5>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12 form-group">
            <a class="btn btn-primary" href="{{route('usuarios-cadastrar')}}">Cadastrar usuário</a>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>WhatsApp</th>
              <th>Situação</th>
              <th width="130px">Opções</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>WhatsApp</th>
              <th>Situação</th>
              <th width="130px">Opções</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($usuarios as $usuario)
            <tr>
              <td>{{$usuario->nome}}</td>
              <td>{{$usuario->email}}</td>
              <td>{{$usuario->telefone}}</td>
              <td>{{$usuario->whatsapp}}</td>            
              <td>{{$usuario->status=='1'?'Ativo':'Inativo'}}</td>             
              <td style="display: flex; justify-content: space-between">       
                <a class="btn btn-primary" href="{{route('usuarios-alterar-visualizar')}}?usuarios={{$usuario->id_usuario}}&alterar" title="Alterar"><i class="fa fa-pencil" style="margin: 0"></i></a>
                <a class="btn bg-black" href="{{route('usuarios-visualizar')}}?usuarios={{$usuario->id_usuario}}&visualizar" title="Visualizar"><i class="fa fa-eye" style="margin: 0"></i></a>
                <a class="btn btn-danger" title="Excluir/Inativar" onclick="modal_excluir('{{$usuario->nome}}', '{{$usuario->id_usuario}}')"><i class="fa fa-trash" style="margin: 0"></i></a>
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
              </td>
            </tr>
            
            @endforeach
          </tbody>
        </table>

        <div id="modal">
        </div>
        
        <div class="modal fade" id="modal-excluir" tabindex="-1" role="dialog" aria-labelledby="modalVoltarLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="modalVoltarLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
                  </div>
                  <div class="modal-body">
                      <p id="modal-resposta-texto"></p>
                  </div>
                  <div class="modal-footer">
                      <div class="btn-group" role="group">
                          <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                          <a href="" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-arrow-left"></i>Excluir</a>
                      </div>
                      <!-- /.btn-group -->
                  </div>
              </div>
          </div>
        </div>

        <div class="modal fade" id="modal-resposta" tabindex="-1" role="dialog" aria-labelledby="modaRespostaLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="modalRespostaLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
              </div>
              <div class="modal-body">
                <p id="modal-resposta-texto"></p>
              </div>
              <div class="modal-footer">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                </div>
                <!-- /.btn-group -->
              </div>
            </div>
          </div>
        </div>
        <!-- ========== JS ========== -->
        <script type="text/javascript">
          $(document).ready(function() {
            $('#example').DataTable();
          });      
                 
          function excluir(id_usuario) {

            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: "{{route('usuarios-excluir')}}",
              method: 'post',
              data: {
                'id_usuario': id_usuario,
              },
              success: function(response) {

                if (response.resposta == 'excluido') {
                  modal_texto.innerHTML = '';
                  modal_texto.innerHTML = 'Usuário excluído com sucesso!';                  
                  setTimeout(function(){ window.location.href = "{{route('usuarios')}}"; }, 200);
                 
                }
              },
              error: function(response) {
                modal_texto.innerHTML = '';
                modal_texto.innerHTML = 'Erro: ' + response.responseJSON.message;
                $('#modal-resposta').modal({
                  show: true
                });
              }
            });

          }

          function modal_excluir(usuario, id_usuario) {
            var modal_excluir = '\
            <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <h4 class="modal-title" id="myModalLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                        </div>\
                        <div class="modal-body">\
                            Você tem certeza que deseja excluir o usuário ' + usuario + '\
                        </div>\
                        <div class="modal-footer">\
                            <div class="btn-group" role="group">\
                                <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>\
                                <button type="button" class="btn bg-danger btn-wide btn-rounded" onclick="excluir(\'' + id_usuario + '\')"><i class="fa fa-trash"></i>Excluir</button>\
                            </div>\
                            <!-- /.btn-group -->\
                        </div>\
                    </div>\
                </div>\
            </div>\
            ';
            var modal = document.getElementById('modal');
            modal.innerHTML = "";
            modal.innerHTML = modal_excluir;
            $('#modal_excluir').modal({
              show: true
            });
          }
        </script>

      </div>
    </div>
  </div>
</div>
@stop