<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Aluno;
use Carbon\Carbon;
use App\Models\PerfilEstudante;
use App\Http\Controllers\MonitoramentoAtividadeController;

class PerfilEstudanteIndependenteController extends Controller
{
    // Cópia fiel dos métodos originais
    // ... (todos os métodos serão copiados aqui)
    
    public function index()
    {
        // Busca apenas alunos das turmas do professor logado
        $professor = auth('funcionario')->user();
        $funcId = $professor->func_id;
        $alunos = \App\Models\Aluno::porProfessor($funcId)
            ->orderBy('alu_nome', 'asc')
            ->get();

        return view('alunos.perfil_estudante_aluno', [
            'alunos' => $alunos,
            'titulo' => 'Alunos Matriculados',
            'rota_inventario' => 'perfil_estudante.independente.index_inventario',
            'flag_teste' => true,
            'professor_nome' => $professor->func_nome ?? '',
        ]);
    }
    
    // ... (outros métodos serão copiados aqui)
}
