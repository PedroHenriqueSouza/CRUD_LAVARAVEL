<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class usuariosModel extends Model
{
    use HasFactory;

    private $id_usuario;
    private $nome;
    private $telefone;
    private $celular;
    private $whatsapp;
    private $email;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $status;
    private $senha;
    private $resposta;


    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }    

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }


    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getResposta()
    {
        return $this->resposta;
    }

    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

   
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function cadastrar()
    {               
        if (!empty($this->getNome()) &&  !empty($this->getCep()) && !empty($this->getEndereco()) && !empty($this->getNumero()) && !empty($this->getBairro()) && !empty($this->getCidade()) && !empty($this->getEstado())) {
            $verifica_usuario = DB::table('usuarios')->where('email', '=', $_POST['email'])->select('id_usuario')->count();
            if ($verifica_usuario <= 0) {
                DB::table('usuarios')->insert([
                    'nome' => $this->getNome(),
                    'telefone' => $this->getTelefone(),
                    'celular' => $this->getCelular(),
                    'whatsapp' => $this->getWhatsapp(),
                    'email' => $this->getEmail(),
                    'cep' => $this->getCep(),
                    'endereco' => $this->getEndereco(),
                    'numero' => $this->getNumero(),
                    'complemento' => $this->getComplemento(),
                    'bairro' => $this->getBairro(),
                    'cidade' => $this->getCidade(),
                    'estado' => $this->getEstado(),
                    'senha' => $this->getSenha(),
                    'status' => $this->getStatus(),
                ]);
                $this->setResposta('cadastrado');
            } else {
                $this->setResposta('usuario_cadastrado');
            }
        } else {
            $this->setResposta('vazio');
        }                   
    }

    public function alterar()
    {                       
        if (!empty($this->getNome())  && !empty($this->getCep()) && !empty($this->getEndereco()) && !empty($this->getNumero()) && !empty($this->getBairro()) && !empty($this->getCidade()) && !empty($this->getEstado())) {
            $verifica_usuario = DB::table('usuarios')->select('id_usuario')->where('email', '=', $_POST['email']);
            if ($verifica_usuario->get()->contains('id_usuario', $this->getId_usuario()) || $verifica_usuario->count() == 0) {
                DB::table('usuarios')->where('id_usuario', '=', $this->getId_usuario())->update([
                    'nome' => $this->getNome(),
                    'telefone' => $this->getTelefone(),
                    'celular' => $this->getCelular(),
                    'whatsapp' => $this->getWhatsapp(),
                    'email' => $this->getEmail(),
                    'cep' => $this->getCep(),
                    'endereco' => $this->getEndereco(),
                    'numero' => $this->getNumero(),
                    'complemento' => $this->getComplemento(),
                    'bairro' => $this->getBairro(),
                    'cidade' => $this->getCidade(),
                    'estado' => $this->getEstado(),
                    'senha' => $this->getSenha(),
                    'status' => $this->getStatus(),
                ]);
                $this->setResposta('alterado');
            } else {
                $this->setResposta('usuario_cadastrado');
            }
        } else {
            $this->setResposta('vazio');
        }                    
    }

    public function verificarusuarios()
    {
        require(public_path('template/php/validaCPF.php'));

        if (!empty($this->getCpf())) {
            if (strlen($this->getCpf()) <= 14) {
                if (valida_cpf($this->getCpf())) {
                    $verifica_usuario = DB::table('usuarios')->where('cpf', '=', $_POST['cpf'])->select('id_usuario')->count();
                    if ($verifica_usuario >= 1) {
                        $this->setResposta('usuario_cadastrado');
                    } else {
                        $this->setResposta('usuario_nao_cadastrado');
                    }
                } else {
                    $this->setResposta('cpf_invalido');
                }
            }
        } else {
            $this->setResposta('vazio');
        }
    }

  

    public function excluir()
    {
        if (!empty($this->getId_usuario())) {
            DB::table('usuarios')->where('id_usuario', '=', $this->getId_usuario())->delete();
            $this->setResposta('excluido');
        }
    }

    public function login()
    {
        if (!empty($this->getEmail()) && !empty($this->getSenha())) {
            $usuario = DB::table('usuarios')->select('id_usuario', 'nome', 'email', 'senha', 'funcao_id', 'status')->where('email', '=', $this->getEmail())->get();
            foreach ($usuario as $user) {
                $senha = $user->senha;
            }
            if ($this->getSenha()== $senha) {
                $usuario = DB::table('usuarios')->where('email', '=', $this->getEmail())->first();
                $this->setId_usuario($usuario->id_usuario);
                $this->setNome($usuario->nome);
                $this->setFuncao_id($usuario->funcao_id);
                $this->setStatus($usuario->status);

                if ($this->getStatus() == '1') {
                    session([
                        'usuario_id' => $this->getId_usuario(),
                        'usuario_nome' => $this->getNome(),
                        'usuario_funcao_id' => $this->getFuncao_id(),
                        'usuario_status' => $this->getStatus()
                    ]);
                    $this->setResposta('liberado');
                } else {
                    $this->setResposta('bloqueado');
                }
            } else {
                $this->setResposta('login_invalido');
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function logout()
    {
    }
}
