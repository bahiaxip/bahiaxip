<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

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
            'slug' => 'php'
        ]);
        Tag::create([
            'name' => 'JavaScript',
            'slug' => 'javascript'
        ]);
        Tag::create([
            'name' => 'Linux',
            'slug' => 'linux'
        ]);
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel'
        ]);
        Tag::create([
            'name' => 'Drupal',
            'slug' => 'drupal'
        ]);
        Tag::create([
            'name' => 'Xiaomi',
            'slug' => 'xiaomi'
        ]);
        Tag::create([
            'name' => 'MySQL',
            'slug' => 'mysql'
        ]);
        Tag::create([
            'name' => 'TypeScript',
            'slug' => 'typescript'
        ]);
        Tag::create([
            'name' => 'Angular',
            'slug' => 'angular'
        ]);
        Tag::create([
            'name' => 'Git',
            'slug' => 'git'
        ]);
        Tag::create([
            'name' => 'MongoDB',
            'slug' => 'mongodb'
        ]);
        Tag::create([
            'name' => 'NodeJS',
            'slug' => 'nodejs'
        ]);
        Tag::create([
            'name' => 'HTML5',
            'slug' => 'html5'
        ]);
        Tag::create([
            'name' => 'jQuery',
            'slug' => 'jquery'
        ]);
        Tag::create([
            'name' => 'Debian',
            'slug' => 'debian'
        ]);
        Tag::create([
            'name' => 'CSS',
            'slug' => 'css'
        ]);
        Tag::create([
            'name' => 'NPM',
            'slug' => 'npm'
        ]);
        Tag::create([
            'name' => 'VPS',
            'slug' => 'vps'
        ]);
        Tag::create([
            'name' => 'SQL',
            'slug' => 'sql'
        ]);
        Tag::create([
            'name' => 'HTTP',
            'slug' => 'http'
        ]);
        Tag::create([
            'name' => 'Socket',
            'slug' => 'socket'
        ]);
        Tag::create([
            'name' => 'Java',
            'slug' => 'java'
        ]);
        Tag::create([
            'name' => 'Apache',
            'slug' => 'apache'
        ]);
        Tag::create([
            'name' => 'Android',
            'slug' => 'android'
        ]);
        Tag::create([
            'name' => 'React',
            'slug' => 'react'
        ]);
        Tag::create([
            'name' => 'Vue',
            'slug' => 'vue'
        ]);
        Tag::create([
            'name' => 'Biedit',
            'slug' => 'biedit'
        ]);
        Tag::create([
            'name' => 'Windows',
            'slug' => 'windows'
        ]);
        Tag::create([
            'name' => 'Fedora',
            'slug' => 'fedora'
        ]);




    }
}
