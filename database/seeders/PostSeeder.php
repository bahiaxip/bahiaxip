<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Post::create([
            'title' =>'Formatear USB',
            'body_main' => 'Como formatear un dispositivo usb desde una terminal en linux.',
            'body_plus' => '<p>Revisamos las particiones del usb mediante el comando fdisk</p>
<pre class="prettyprint linenums prettyprinted" style=""><p><code class="language-py"><span class="pln">sudo fdisk</span><span class="pun">-</span><span class="pln">l</span></code></p>
</pre>
<p>Este comando nos muestra los distintos dispositivos conectados(discos duros, usb,etc...):</p>
<p><img src="//bahiaxip.com/image/post/dWAA7i3wgNfdisk.png" data-filename="fdisk.png" style="font-size: 1rem; width: 50%;"></p>
<p><span style="color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;="" font-size:="" 1rem;"="">Una vez detectado nuestro usb podemos usar el comando mkfs:</span></p>
<pre class="prettyprint linenums prettyprinted" style=""><p><code class="language-py"><span class="pln">mkfs</span><span class="pun">.[</span><span class="pln">tipo de formato</span><span class="pun">]</span><span class="pln"> </span><span class="pun">[</span><span class="pln">otras opciones</span><span class="pun">(</span><span class="pln">opcional</span><span class="pun">)]</span><span class="pln"> </span><span class="pun">[</span><span class="pln">dispositivo o partici</span><span class="pun">ó</span><span class="pln">n a formatear</span><span class="pun">]</span></code></p>
</pre>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""><span style="font-size: 1rem;">Ejemplo con tipo de formato ext4 (linux):</span><br></p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""></p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""><img src="//bahiaxip.com/image/post/ey3vTdeBpqmkfs_ext4.png" data-filename="mkfs_ext4.png" style="width: 621px;"></p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="">Ejemplo con tipo de formato fat (windows)</p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""><img src="//bahiaxip.com/image/post/9gZITqu8nhmkfs_fat.png" data-filename="mkfs_fat.png" style="width: 363px;"></p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="">Ejemplo con tipo de formato fat añadiendo opciones:</p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="">(Mediante la opción -F asignamos el tipo de formato fat32 y mediante la opción -n asignamos un nombre al dispositivo).</p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""><img src="//bahiaxip.com/image/post/wx7J5xAPPEmkfs_fat_opciones.png" data-filename="mkfs_fat_opciones.png" style="width: 551px;"></p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="">Nota: En el caso de que el dispositivo se encuentre protegido contra escritura existe la opción -l que nos permite sobrescribir:</p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="">Si el dispositivo estuviera montado al ejecutar el comando mkfs la terminal nos muestra un mensaje de aviso y se detiene la ejecución:</p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""><img src="//bahiaxip.com/image/post/rqhc8tGMUFsistema_montado.png" data-filename="sistema_montado.png" style="width: 491px;"></p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"="">Solo debemos desmontar el dispositivo y volver a ejecutar el comando:</p>
<p style="box-sizing: inherit; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: " libre="" franklin",="" "helvetica="" neue",="" helvetica,="" arial,="" sans-serif;"=""><img src="//bahiaxip.com/image/post/hUOTR4Mkpmdesmontar_dispositivo.png" data-filename="desmontar_dispositivo.png" style="width: 537px;"><br></p>',
            'category_id' => 1,
            'user_id' => 1,
            'slug' => 'formatear-usb',
            'status' => 'PUBLISHED',
            'file' => '/image/post/main/m9mgmjOlqR74zJ7tSBMoN2MTdfJn3LVXUWIGJ5Kj.jpeg'
        ]);
        Post::create([
            'title' =>'Crear un USB de arranque para Linux',
            'body_main' => 'Como crear un usb booteable en Linux con dd',
            'body_plus' => '<p>Linux dispone del comando dd para crear imágenes de distribuciones linux y poder instalarlas en nuestro PC de forma sencilla y rápida.<br></p><p>Para hacer uso del comando dd es recomendable formatear y desmontar la partición.</p><p>Añadimos la ruta de la imagen iso&nbsp; y la ruta del dispositivo:</p><pre class="prettyprint linenums prettyprinted" style=""><p><code class="language-py"><span class="pln">dd </span><span class="kwd">if</span><span class="pun">=[</span><span class="pln">imagen</span><span class="pun">.</span><span class="pln">iso</span><span class="pun">]</span><span class="pln"> of</span><span class="pun">=[</span><span class="pln">dispositivo</span><span class="pun">]</span></code></p></pre><p>Ejemplo de instalación de una distribución debian en un usb:</p><p><img src="//bahiaxip.com/image/post/GUczKDT5Gvdd.png" data-filename="dd.png" style="width: 626px;"><br></p>',
            'category_id' => 1,
            'user_id' => 1,
            'slug' => 'crear-un-usb-de-arranque-para-linux',
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/HLHC2NQH6hP4GE0vP4NNlV7RZKdQzB40EyR3MxGe.jpeg'
        ]);
        Post::create([
            'title' =>'Crear un USB de arranque para Linux',
            'body_main' => 'Como crear un usb booteable en Linux con dd',
            'body_plus' => '<p>Linux dispone del comando dd para crear imágenes de distribuciones linux y poder instalarlas en nuestro PC de forma sencilla y rápida.<br></p><p>Para hacer uso del comando dd es recomendable formatear y desmontar la partición.</p><p>Añadimos la ruta de la imagen iso&nbsp; y la ruta del dispositivo:</p><pre class="prettyprint linenums prettyprinted" style=""><p><code class="language-py"><span class="pln">dd </span><span class="kwd">if</span><span class="pun">=[</span><span class="pln">imagen</span><span class="pun">.</span><span class="pln">iso</span><span class="pun">]</span><span class="pln"> of</span><span class="pun">=[</span><span class="pln">dispositivo</span><span class="pun">]</span></code></p></pre><p>Ejemplo de instalación de una distribución debian en un usb:</p><p><img src="//bahiaxip.com/image/post/GUczKDT5Gvdd.png" data-filename="dd.png" style="width: 626px;"><br></p>',
            'category_id' => 1,
            'user_id' => 1,
            'slug' => 'crear-un-usb-de-arranque-para-linux',
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/HLHC2NQH6hP4GE0vP4NNlV7RZKdQzB40EyR3MxGe.jpeg'
        ]);
        */
    }
}
