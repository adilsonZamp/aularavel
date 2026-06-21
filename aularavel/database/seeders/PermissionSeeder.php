<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // PROFESSOR - DISCIPLINA
            ["role_id" => 1, "resource_id" => 6, "permission" => true],
            ["role_id" => 1, "resource_id" => 7, "permission" => true],
            ["role_id" => 1, "resource_id" => 8, "permission" => true],
            ["role_id" => 1, "resource_id" => 9, "permission" => true],
            // COORDENADOR - CURSO
            ["role_id" => 2, "resource_id" => 1, "permission" => true],
            ["role_id" => 2, "resource_id" => 2, "permission" => true],
            ["role_id" => 2, "resource_id" => 3, "permission" => true],
            ["role_id" => 2, "resource_id" => 4, "permission" => true],
            ["role_id" => 2, "resource_id" => 5, "permission" => true],
            // COORDENADOR - DISCIPLINA
            ["role_id" => 2, "resource_id" => 6, "permission" => true],
            ["role_id" => 2, "resource_id" => 7, "permission" => true],
            ["role_id" => 2, "resource_id" => 8, "permission" => true],
            ["role_id" => 2, "resource_id" => 9, "permission" => true],
            ["role_id" => 2, "resource_id" => 10, "permission" => true],  
            // PROFESSOR - MATRICULA
            ["role_id" => 1, "resource_id" => 16, "permission" => true],// "matricula.index"], // 16
            ["role_id" => 1, "resource_id" => 17, "permission" => true],// "matricula.create"], // 17
            ["role_id" => 1, "resource_id" => 18, "permission" => false],// "matricula.show"], // 18
            ["role_id" => 1, "resource_id" => 19, "permission" => false],// "matricula.edit"], // 19
            ["role_id" => 1, "resource_id" => 20, "permission" => false],// "matricula.delete"], // 20
            // PROFESSOR - ALUNO
            ["role_id" => 1, "resource_id" => 11, "permission" => true],//["name" => "aluno.index"], // 11
            ["role_id" => 1, "resource_id" => 12, "permission" => true],//["name" => "aluno.create"], // 12
            ["role_id" => 1, "resource_id" => 13, "permission" => true],//["name" => "aluno.show"], // 13
            ["role_id" => 1, "resource_id" => 14, "permission" => true],//["name" => "aluno.edit"], // 14
            ["role_id" => 1, "resource_id" => 15, "permission" => true],//["name" => "aluno.delete"], // 15
            // COORDENADOR - MATRICULA
            ["role_id" => 2, "resource_id" => 16, "permission" => true],// "matricula.index"], // 16
            ["role_id" => 2, "resource_id" => 17, "permission" => true],// "matricula.create"], // 17
            ["role_id" => 2, "resource_id" => 18, "permission" => true],// "matricula.show"], // 18
            ["role_id" => 2, "resource_id" => 19, "permission" => true],// "matricula.edit"], // 19
            ["role_id" => 2, "resource_id" => 20, "permission" => true],// "matricula.delete"], // 20
            // COORDENADOR - ALUNO
            ["role_id" => 2, "resource_id" => 11, "permission" => true],//["name" => "aluno.index"], // 11
            ["role_id" => 2, "resource_id" => 12, "permission" => false],//["name" => "aluno.create"], // 12
            ["role_id" => 2, "resource_id" => 13, "permission" => true],//["name" => "aluno.show"], // 13
            ["role_id" => 2, "resource_id" => 14, "permission" => false],//["name" => "aluno.edit"], // 14
            ["role_id" => 2, "resource_id" => 15, "permission" => false],//["name" => "aluno.delete"], // 15
        ];
        DB::table('permissions')->insert($data);
    }
}
