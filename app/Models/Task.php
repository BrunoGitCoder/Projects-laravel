<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date'
    ];

    public function projects(){
        $this->belongsTo(Project::class);
    }

     public function getStatusNameAttribute() {
        return match($this->status) {
            'pending' => 'Pendente',
            'in_progress' => 'Em andamento',
            'completed' => 'Concluída'
        };
    }

    public function getPriorityNameAttribute() {
        return match($this->priority) {
            'low' => 'Baixa',
            'medium' => 'Média',
            'high' => 'Alta'
        };
    }
}
