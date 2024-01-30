<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'PHP',
            'slug' => 'php',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'JavaScript',
            'slug' => 'javascript',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Linux',
            'slug' => 'linux',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Drupal',
            'slug' => 'drupal',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Xiaomi',
            'slug' => 'xiaomi',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'MySQL',
            'slug' => 'mysql',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'TypeScript',
            'slug' => 'typescript',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Angular',
            'slug' => 'angular',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Git',
            'slug' => 'git',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'MongoDB',
            'slug' => 'mongodb',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'NodeJS',
            'slug' => 'nodejs',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'HTML5',
            'slug' => 'html5',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'jQuery',
            'slug' => 'jquery',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Debian',
            'slug' => 'debian',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'CSS',
            'slug' => 'css',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'NPM',
            'slug' => 'npm',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'VPS',
            'slug' => 'vps',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'SQL',
            'slug' => 'sql',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'HTTP',
            'slug' => 'http',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Socket',
            'slug' => 'socket',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Java',
            'slug' => 'java',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Apache',
            'slug' => 'apache',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Android',
            'slug' => 'android',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'React',
            'slug' => 'react',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Vue',
            'slug' => 'vue',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Biedit',
            'slug' => 'biedit',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Windows',
            'slug' => 'windows',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Fedora',
            'slug' => 'fedora',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'IDE',
            'slug' => 'ide',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'SQLite',
            'slug' => 'sqlite',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Composer',
            'slug' => 'composer',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);
        Tag::create([
            'name' => 'Youtube',
            'slug' => 'youtube',
            'status' => 'PUBLISHED',
            'user_id' => 1
        ]);

        //COPIAMOS TODOS LOS DATOS A LA NUEVA COLUMNA AÑADIDA (PARA EVITAR CONFLICTOS CON ENUM AL INTENTAR CAMBIAR EL TIPO DE DATO).
        //HEMOS AÑADIDO LA COLUMNA STATUSSTR DE TIPO INTEGER Y COPIAMOS TODOS LOS VALORES ALMACENADOS EN STATUS.
        //LA FORMA DE COPIAR ES LA SIGUIENTE: 
        //AL HACER LA MIGRACIÓN SE ESTABLECE "0" POR DEFECTO,EN LA SIGUIENTE CONSULTA SOLO CAMBIAMOS A 1 LOS CAMPOS QUE SE ENCUENTRAN
        //EN PUBLISHED (YA QUE SOLO EXISTEN 2 VALORES(DRAFT O PUBLISHED))
        
        DB::statement("UPDATE tags SET statusint = 1 WHERE status = 'PUBLISHED'");
        DB::statement("UPDATE categories SET statusint = 1 WHERE status = 'PUBLISHED'");

    }
}
