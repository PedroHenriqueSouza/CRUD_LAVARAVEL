@extends('base/layout')

@section('conteudo')

    <link rel="stylesheet" href="../template/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../template/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="../template/css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="../template/css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="../template/css/prism/prism.css" media="screen"> 
    <link rel="stylesheet" href="../template/css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="../template/css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="../template/css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="../template/css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="../template/css/bootstrap-tour/bootstrap-tour.css">
    <link rel="stylesheet" type="text/css" href="../template/js/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="../template/css/main.css" media="screen">
    <script src="../template/js/modernizr/modernizr.min.js"></script>

<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="{{route('inicio')}}"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="{{route('usuarios')}}">Usuários</a></li>
            <li class="active">Visualizar usuário</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Visualizar usuário</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($usuarios as $usuario)
                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-usuario">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input disabled type="hidden" id="url_form" name="url_form" value="{{route('usuarios-cadastrar')}}">

                    <div id="campos-cadastro">
                        <h5 class="underline mt-n">Informações pessoais</h5>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="nome">Nome </label>
                                    <input disabled type="text" class="form-control" id="nome" name="nome" value="{{$usuario->nome}}">
                                    <input disabled type="hidden" id="tipo_pessoa" name="tipo_pessoa">
                                </div>
                            </div>                       

                           
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input disabled type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}">
                                </div>
                            </div>
                        </div>

                        <h5 class="underline mt-30">Informações de contato</h5>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP </label>
                                    <input disabled type="text" class="form-control" id="cep" name="cep" value="{{$usuario->cep}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="endereco">Endereço </label>
                                    <input disabled type="text" class="form-control" id="endereco" name="endereco" value="{{$usuario->endereco}}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="numero">Número </label>
                                <input disabled type="number" min="0" class="form-control" id="numero" name="numero" value="{{$usuario->numero}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input disabled type="text" class="form-control" id="complemento" name="complemento" value="{{$usuario->complemento}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bairro">Bairro </label>
                                    <input disabled type="text" class="form-control" id="bairro" name="bairro" value="{{$usuario->bairro}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidade">Cidade </label>
                                    <input disabled type="text" class="form-control" id="cidade" name="cidade" readonly value="{{$usuario->cidade}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado">Estado </label>
                                    <input disabled type="text" class="form-control" id="estado" name="estado" readonly value="{{$usuario->estado}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input disabled type="text" class="form-control" id="telefone" name="telefone" value="{{$usuario->telefone}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input disabled type="text" class="form-control" id="celular" name="celular" value="{{$usuario->celular}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="whatsapp">WhatsApp</label>
                                    <input disabled type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$usuario->whatsapp}}">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="{{route('usuarios')}}" class="btn bg-black btn-wide"><i class="fa fa-arrow-left"></i>Voltar</a>
                                    <a href="{{route('usuarios-visualizar')}}?usuarios={{$usuario->id_usuario}}&alterar" class="btn btn-primary btn-wide" id="btn-cadastrar">
                                        <i class="fa fa-arrow-right"></i>Alterar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- ========== COMMON JS FILES ========== -->
<script src="../template/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="../template/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="../template/js/bootstrap/bootstrap.min.js"></script>
    <script src="../template/js/pace/pace.min.js"></script>
    <script src="../template/js/lobipanel/lobipanel.min.js"></script>
    <script src="../template/js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="../template/js/prism/prism.js"></script>
    <script src="../template/js/waypoint/waypoints.min.js"></script>
    <script src="../template/js/counterUp/jquery.counterup.min.js"></script>
    <script src="../template/js/amcharts/amcharts.js"></script>
    <script src="../template/js/amcharts/serial.js"></script>
    <script src="../template/js/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="../template/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="../template/js/amcharts/themes/light.js"></script>
    <script src="../template/js/toastr/toastr.min.js"></script>
    <script src="../template/js/icheck/icheck.min.js"></script>
    <script src="../template/js/bootstrap-tour/bootstrap-tour.js"></script>
    <script src="../template/js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="../template/js/main.js"></script>
    <script src="../template/js/production-chart.js"></script>
    <script src="../template/js/traffic-chart.js"></script>
    <script src="../template/js/task-list.js"></script>
@stop