<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class ProjectSeeder extends Seeder
{

    public function run()
    {
        $user = User::create([
            'name' => 'Carlos',
            'email' => 'carlos@example.com',
            'password' => bcrypt('Senha@123'),
        ]);
        
        $projects = [
            [
                'user_id' => 1,
                'name' => 'Gestão Financeira',
                'description' => 'Controle de gastos e receitas da empresa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Site Institucional',
                'description' => 'Desenvolvimento do site institucional da empresa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'App Mobile',
                'description' => 'Aplicativo para clientes acessarem seus serviços.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'name' => 'Intranet',
                'description' => 'Portal interno para colaboradores.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Project::insert($projects);

        $tasks = [
            // Projeto 1: Gestão Financeira
            [
                'project_id' => 1,
                'title' => 'Cadastrar contas bancárias',
                'description' => 'Inserir dados das contas utilizadas pela empresa.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(2)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 1,
                'title' => 'Gerar relatório de despesas',
                'description' => 'Relatório mensal das despesas fixas.',
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(4)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 1,
                'title' => 'Auditoria anual',
                'description' => 'Preparar documentos para auditoria.',
                'status' => 'in_progress',
                'priority' => 'high',
                'due_date' => now()->addDays(10)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 1,
                'title' => 'Enviar balancete',
                'description' => 'Encaminhar balancete ao contador.',
                'status' => 'completed',
                'priority' => 'low',
                'due_date' => now()->addDays(12)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Projeto 2: Site Institucional
            [
                'project_id' => 2,
                'title' => 'Criar página Sobre',
                'description' => 'Desenvolver página com informações da empresa.',
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(3)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 2,
                'title' => 'Otimizar imagens',
                'description' => 'Reduzir tamanho das imagens para melhorar SEO.',
                'status' => 'in_progress',
                'priority' => 'low',
                'due_date' => now()->addDays(6)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 2,
                'title' => 'Adicionar formulário de contato',
                'description' => 'Formulário para receber mensagens dos visitantes.',
                'status' => 'completed',
                'priority' => 'high',
                'due_date' => now()->addDays(1)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 2,
                'title' => 'Publicar site',
                'description' => 'Subir o site no servidor de produção.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(8)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Projeto 3: App Mobile
            [
                'project_id' => 3,
                'title' => 'Desenvolver tela de login',
                'description' => 'Implementar autenticação de usuários.',
                'status' => 'pending',
                'priority' => 'high',
                'due_date' => now()->addDays(2)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 3,
                'title' => 'Integração com API',
                'description' => 'Conectar o app com a API do sistema.',
                'status' => 'in_progress',
                'priority' => 'medium',
                'due_date' => now()->addDays(6)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 3,
                'title' => 'Testes em dispositivos reais',
                'description' => 'Realizar testes no Android e iOS.',
                'status' => 'pending',
                'priority' => 'low',
                'due_date' => now()->addDays(10)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 3,
                'title' => 'Publicar na loja',
                'description' => 'Enviar o aplicativo para a Google Play e App Store.',
                'status' => 'completed',
                'priority' => 'high',
                'due_date' => now()->addDays(14)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Projeto 4: Intranet
            [
                'project_id' => 4,
                'title' => 'Configurar permissões',
                'description' => 'Definir acessos para cada tipo de usuário.',
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(1)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 4,
                'title' => 'Criar mural de avisos',
                'description' => 'Espaço para comunicação interna.',
                'status' => 'completed',
                'priority' => 'high',
                'due_date' => now()->addDays(5)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 4,
                'title' => 'Relatórios de uso',
                'description' => 'Dashboard para acompanhamento de acessos.',
                'status' => 'in_progress',
                'priority' => 'low',
                'due_date' => now()->addDays(8)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'project_id' => 4,
                'title' => 'Treinamento de usuários',
                'description' => 'Agendar treinamento com novos funcionários.',
                'status' => 'pending',
                'priority' => 'medium',
                'due_date' => now()->addDays(12)->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Task::insert($tasks);
    }
}
