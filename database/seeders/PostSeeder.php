<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts;
use Illuminate\Support\Facades\DB;
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

        //1
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Formatear USB',
            'slug' => 'formatear-usb',
            'body_main' => 'Como formatear un dispositivo usb desde una terminal en linux.',
            'body_plus' => '<p><strong><span style="font-size:16px">El proceso que se muestra a continuaci&oacute;n es aplicable a cualquier partici&oacute;n, ya sea usb o disco.</span></strong></p>

<p><span style="font-size:16px"><strong>Revisamos las particiones del usb mediante el comando fdisk</strong></span></p>

<pre>
<code class="language-bash">sudo fdisk-l
</code></pre>

<p><span style="font-size:16px"><strong>Este comando nos muestra los distintos dispositivos conectados(discos duros, usb,etc...):</strong></span></p>

<p><span style="font-size:16px"><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955190.png" style="height:421px; width:694px" /></span></p>

<p><span style="font-size:16px"><strong>Una vez detectado nuestro usb podemos usar el comando mkfs:</strong></span></p>

<pre>
<code class="language-bash">mkfs.[tipo de formato] [otras opciones(opcional)] [dispositivo o partición a formatear]
</code></pre>

<p><span style="font-size:16px">Ejemplo con tipo de formato ext4 (linux):</span></p>

<p><br />
<span style="font-size:16px"><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955323.png" style="height:85px; width:621px" /></span></p>

<p><span style="font-size:16px">Ejemplo con tipo de formato fat (Windows)</span></p>

<p><span style="font-size:16px"><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955400.png" style="height:77px; width:363px" /></span></p>

<p><span style="font-size:16px">Ejemplo con tipo de formato fat a&ntilde;adiendo opciones:</span></p>

<p><span style="font-size:16px">(Mediante la opci&oacute;n -F asignamos el tipo de formato fat32 y mediante la opci&oacute;n -n asignamos un nombre al dispositivo).</span></p>

<p><span style="font-size:16px"><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955486.png" style="height:86px; width:551px" /></span></p>

<p><span style="font-size:16px">Nota: En el caso de que el dispositivo se encuentre protegido contra escritura existe la opci&oacute;n -l que nos permite sobrescribir:</span></p>

<p><span style="font-size:16px"><strong>Si el dispositivo estuviera montado al ejecutar el comando mkfs la terminal nos muestra un mensaje de aviso y se detiene la ejecuci&oacute;n:</strong></span></p>

<p><span style="font-size:16px"><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955538.png" style="height:90px; width:491px" /></span></p>

<p><span style="font-size:16px"><strong>Solo debemos desmontar el dispositivo y volver a ejecutar el comando:</strong></span></p>

<p><span style="font-size:16px"><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955575.png" style="height:155px; width:537px" /></span></p>

<p>&nbsp;</p>
',
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => '/image/post/main/m9mgmjOlqR74zJ7tSBMoN2MTdfJn3LVXUWIGJ5Kj.jpeg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //2
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Crear un USB de arranque para Linux',
            'slug' => 'crear-un-usb-de-arranque-para-linux',
            'body_main' => 'Como crear un usb de arranque en linux desde la terminal.',
            'body_plus' => '<p>Linux dispone del comando dd para crear im&aacute;genes de distribuciones linux y poder instalarlas en nuestro PC de forma sencilla y r&aacute;pida.</p>

<p>Para hacer uso del comando dd es recomendable formatear y desmontar la partici&oacute;n.</p>

<p>A&ntilde;adimos la ruta de la imagen iso&nbsp; y la ruta del dispositivo:</p>

<pre>
<code class="language-bash">dd if=[imagen.iso] of=[dispositivo]
</code></pre>

<p>Ejemplo de instalaci&oacute;n de una distribuci&oacute;n debian en un usb:</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955715.png" style="height:106px; width:626px" /></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/1TUkhCjbtlci2ekhJOQpO2wrkZzgq3bhMEStdVAo.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //3
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Error trusted_host_patterns en Drupal',
            'slug' => 'error-trusted-host-patterns-en-drupal',
            'body_main' => 'Solución al error trusted-host-patterns',
            'body_plus' => '<p>Al instalar por primera vez Drupal en nuestro servidor podemos tener complicaciones de configuraci&oacute;n como&nbsp; tambi&eacute;n sucede con cualquier otro CMS. Por suerte Drupal, desde algunas versiones te comunica de forma expl&iacute;cita del error. Unos de estos errores es el error trusted_host_patterns.</p>

<p>Para solucionar este error necesitamos editar el archivo settings.php situado en el directorio sitio/sites/default</p>

<p>Al final del archivo a&ntilde;adimos la l&iacute;nea siguiente en el caso de trabajar en un servidor local</p>

<pre>
<code class="language-php">$settings[«trusted_host_patterns»][] = «^localhost$»;
</code></pre>

<p>en el caso de un dominio externo</p>

<pre>
<code class="language-php">$settings[«trusted host patterns»][] = array(«^www.\.dominio\.com$»);
</code></pre>

<p>Fuente:&nbsp;//drupalalsur.org/videos/solucionar-la-advertencia-trusted-host-patterns-en-drupal-8Fuente:&nbsp;//drupalalsur.org/videos/solucionar-la-advertencia-trusted-host-patterns-en-drupal-8</p>

',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/v6m5p6R7ZGf2Qg734wnxZIAT8xEOtDYuIcoRdMpZ.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 5
        ]);

        //4
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Menú de arranque (GRUB)',
            'slug' => 'menu-de-arranque-grub',
            'body_main' => 'Modificar el menú de arranque en Linux.',
            'body_plus' => '
<p>Para poder modificar la opci&oacute;n del men&uacute; de arranque que se instala cuando instalamos Linux y seleccionar la opci&oacute;n por defecto a nuestra elección debemos editar el archivo grub.cfg que se encuentra en el directorio /boot/grub.</p>

<p>Para ello hacemos uso de alg&uacute;n editor de texto con permisos de administrador</p>

<pre>
<code class="language-bash">sudo gedit /boot/grub/grub.cfg</code></pre>

<p>Y cambiamos el n&uacute;mero de la l&iacute;nea &laquo;set default&raquo; por el de nuestra elección. Por defecto se encuentra en valor 0.</p>

<p>Nota: Si tenemos varias distribuciones Linux debemos editar el &uacute;ltimo grub instalado.</p>

<ul>
</ul>

',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/vyHaCwNi8DZPtkwyEglMHZMuMmIgWREGybO3lNaE.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //5
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Error de inicio en Linux',
            'slug' => 'error-de-inicio-en-linux',
            'body_main' => 'Como solucionar el error "a start job is running for dev-disk-by..." en Linux',
            'body_plus' => '
<p>En ocasiones despu&eacute;s de una nueva instalaci&oacute;n de Linux en otra partici&oacute;n se crea conflicto en el archivo de configuraci&oacute;n fstab con la incomodidad de tener que esperar&nbsp; un minuto y medio extra en cada inicio.</p>

<p>Para solucionarlo es necesario editar el archivo fstab que se encuentra en el directorio /etc y comentar la l&iacute;nea en cuesti&oacute;n con una almohadilla:</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665956002.png" style="height:72px; width:316px" /></p>

<p>En mi caso el conflicto se produc&iacute;a con la partici&oacute;n swap, ha sido suficiente colocar la almohadilla delante para comentar la l&iacute;nea .</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665956040.png" style="height:245px; width:871px" /></p>

<p>En otros casos es necesario cambiar la l&iacute;nea entera con la UUID correcta,&nbsp; para ello podemos conocer la direcci&oacute;n de nuestras particiones haciendo uso del comando blkid, tambi&eacute;n el comando lsblk nos informa de las particiones de las que disponemos desde la terminal de forma r&aacute;pida</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665956072.png" style="height:283px; width:726px" /></p>

',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/yOslS6Y7o4QAp8MxuA1HiuphJsX1E9RJlMQPrpBu.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //6
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Permisos subiendo archivos en Apache',
            'slug' => 'permisos-subiendo-archivos-en-apache',
            'body_main' => 'Conceder permisos de escritura a los archivos subidos en local con Apache',
            'body_plus' => '
<p>El servidor apache en Linux crea permisos propios a los archivos subidos desde nuestro PC solo con la opci&oacute;n de lectura habilitada al usuario. Para poder acceder a ellos es suficiente darle permisos al directorio, pero si queremos escribir en ellos es necesario cambiar los permisos manualmente que trae por defecto (www-data).</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665956221.png" style="height:494px; width:515px" /></p>

<p>El problema se agrava&nbsp; cuando se requiere acceder el archivo y escribir en él. Para ello debemos acceder al archivo de configuraci&oacute;n envvars que se encuentra en el directorio /etc/apache2. Solo tenemos que comentar las l&iacute;neas siguientes colocando el símbolo de almohadilla delante:</p>

<pre>
<code class="language-bash">#export APACHE_RUN_USER=www-data

#export APACHE_RUN_GROUP=www-data</code></pre>

<p>Y crear&nbsp; unas l&iacute;neas iguales con nuestro nombre de usuario y nuestro grupo:</p>

<pre>
<code class="language-bash">#export APACHE_RUN_USER=nombre_propietario

#export APACHE_RUN_GROUP=nombre_grupo</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/RfWhQcTGe16fpEIgSIuoX8zwzy9GmosCabfNNcgu.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 23
        ]);

        //7
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Añadir fuentes en linux',
            'slug' => 'anadir-fuentes-en-linux',
            'body_main' => 'Como añadir fuentes nuevas en Linux',
            'body_plus' => '
<p>Para a&ntilde;adir nuevas fuentes en Linux es suficiente con crear el directorio .fonts en nuestro directorio de usuario y a&ntilde;adir las fuentes nuevas, una vez acabado ejecutamos en terminal :</p>

<pre>
<code class="language-bash">sudo fc-cache -vf
</code></pre>

<p>&nbsp;</p>

',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/nAcGHWLZ5DLTG5tb3RjgPMT7bZ8GpkgwjzSB5giS.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //8
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Añadir user a mysql',
            'slug' => 'anadir-user-a-mysql',
            'body_main' => 'Añadir un nuevo usuario en MySQL',
            'body_plus' => '
<p>En ocasiones necesitamos crear un usuario nuevo o concederle permisos espec&iacute;ficos a un usuario que ya existe, en ese caso necesitamos acceder a la consola mysql. Para acceder a mysql en modo consola solo tenemos que ejecutar mysql desde la terminal:</p>

<pre>
<code class="language-bash">sudo mysql</code></pre>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665956588.png" style="height:190px; width:711px" /></p>

<p>En este caso (Debian) aparece MariaDB,[(none)]&gt;, en Ubuntu aparece mysql&gt;</p>

<p>Una vez que hemos accedido podemos dar permisos, eliminar permisos, crear bases de datos o eliminarlas.&nbsp;</p>

<p>Para crear un nuevo usuario:</p>

<pre>
<code class="language-bash">use mysql;
</code></pre>

<pre>
<code class="language-bash">CREATE USER ‘nombre de usuario’@’localhost’ IDENTIFIED BY ‘contraseña’;</code></pre>

<p>El usuario creado no dispones de permisos as&iacute; que se los podemos dar todos:</p>

<pre>
<code class="language-bash">GRANT ALL PRIVILEGES ON *.* TO "nombre de usuario"@’localhost’;
</code></pre>

<p>Con <strong>ALL</strong> le estamos dando privilegios&nbsp; a todas las bases de datos al usuario, pero para que pueda disponer de ellos es necesario actualizar:</p>

<pre>
<code class="language-bash">FLUSH PRIVILEGES;
</code></pre>

<p>Para poder solo darle uno o varios permisos podemos especificarlo:</p>

<p><strong>CREATE</strong>: permite crear bases y tablas.</p>

<p><strong>DROP</strong>: permite eliminar bases y tablas.</p>

<p><strong>DELETE</strong>: permite eliminar registros.</p>

<p><strong>INSERT</strong>: permite insertar registros.</p>

<p><strong>SELECT</strong>: permite leer registros</p>

<p><strong>UPDATE</strong>: permite actualizar registros seleccionados.</p>

<p><strong>GRANT OPTION</strong>: m&aacute;xima opci&oacute;n, permite modificar privilegios de usuarios.</p>

<p>Estructura:</p>

<pre>
<code class="language-bash">GRANT permiso ON mi_base_de_datos.mitabla TO ‘nombre de usuario’@’localhost’;
</code></pre>

<p><strong>Para eliminar permisos:</strong></p>

<pre>
<code class="language-bash">REVOKE permiso ON mi_base_de_datos.mitabla FROM ‘nombre de usuario’@’localhost’;
</code></pre>

<p><strong>Para poder asignar la todos los permisos:</strong></p>

<pre>
<code class="language-bash">GRANT ALL PRIVILEGES ON *.* TO »nombre_ de_usuario@’localhost’ IDENTIFIED BY ‘contraseña’ WITH GRANT OPTION;</code></pre>

<p><strong>Privilegios de mysql</strong>:</p>

<p>ALL PRIVILEGES, ALTER, ALTER ROUTINE, CREATE TABLE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE USER, CREATE VIEW, DELETE, DROP, EXECUTE, FILE, INDEX, INSERT, LOCK TABLES, PROCESS, RELOAD, REPLICATION CLIENT, REPLICATION SLAVE, SELECT, SHOW DATABASES, SHOW VIEW, SHUTDOWN, SUPER, UPDATE, USAGE, GRANT OPTION.</p>

<p><strong>Para mostrar los privilegios de un usuario:</strong></p>

<pre>
<code class="language-bash">SHOW GRANTS for ‘usuario’@’localhost’;
</code></pre>

<p><strong>Para salir de consola basta con escribir en la consola mysql:</strong></p>

<pre>
<code class="language-bash">exit</code></pre>

<p>Nota: Para iniciar, parar y reiniciar mysql:</p>

<pre>
<code>service mysql start
service mysql stop
service mysql restart

/etc/init.d/mysql start
/etc/init.d/mysql stop
/etc/init.d/mysql restart</code></pre>

sudo systemctl start mysql
sudo systemctl stop mysql
sudo systemctl restart mysql

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/Bw48ViSplHDDtIvMW21HpqlyfGWIWLOcxxfHwJ4E.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //9
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Buscar paquetes en Linux',
            'slug' => 'buscar-paquetes-en-linux',
            'body_main' => 'Como saber si un paquete se encuentra disponible en los repositorios o está instalado.',
            'body_plus' => '
<p>En ocasiones necesitamos saber si tenemos un paquete instalado o si disponemos de ellos en los repositorios, para ello tenemos 2 comandos.</p>

<p>Si necesitamos buscar un paquete en los repositorios:</p>

<pre>
<code class="language-bash">apt-cache search [paquete a buscar]</code></pre>

<p>Si necesitamos buscar un paquete instalado:</p>

<pre>
<code class="language-bash">dpkg -l | grep [paquete a buscar]
</code></pre>

<p>&nbsp;</p>

',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/jTcUycMmAQvs4BjRz1ISQpFApwd77EkWqVsGCRMd.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //10
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Geoip en Debian',
            'slug' => 'geoip-en-debian',
            'body_main' => 'Instalación del módulo Geoip de PHP en Linux',
            'body_plus' => '
<p>PHP dispone de una extensi&oacute;n de geolocalizaci&oacute;n llamada GeoIP que nos permite a trav&eacute;s del nombre de dominio o IP obtener informaci&oacute;n del servidor.</p>

<p>Para instalar la librer&iacute;a de Geolocalizaci&oacute;n de PHP en Debian basta con instalarlo desde los repositorios:</p>

<pre>
<code class="language-bash">apt install php-geoip</code></pre>

<p>Para algunas opciones como geoip_record_by_name que nos proporcionan la regi&oacute;n, es necesario instalar adem&aacute;s la librer&iacute;a GeoLiteCity.dat. Para ello nos ubicamos en el directorio /usr/share/GeoIP y descargamos la librer&iacute;a:</p>

<pre>
<code class="language-bash">sudo wget http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz</code></pre>

<p>Descomprimimos:</p>

<pre>
<code class="language-bash">sudo gunzip GeoLiteCity.dat.gz</code></pre>

<p>y por &uacute;ltimo cambiamos el nombre del archivo al que apache2 nos exige:</p>

<pre>
<code class="language-bash">sudo mv GeoLiteCity.dat GeoIPCity.dat
</code></pre>

<p>Reiniciamos apache:</p>

<pre>
<code class="language-bash">sudo service apache2 restart
</code></pre>

<p>Algunos ejemplos:</p>

<pre>
<code class="language-bash">geoip_country_code3_by_name(«DOMINIO O IP»);
</code></pre>

<p>Devuelve las 3 iniciales del pa&iacute;s.</p>

<pre>
<code class="language-bash">geoip_country_code_by_name(«DOMINIO O IP»); 
</code></pre>

<p>Devuelve las 2 iniciales del pa&iacute;s.</p>

<pre>
<code class="language-bash">geoip_country_name_by_name(«DOMINIO O IP»);
</code></pre>

<p>Devuelve el nombre completo del pa&iacute;s</p>

<ul>
</ul>


',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/1S4NXjhoBTFKNuhpy1HcENhUG2HqzjuOnqRAAy0b.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 15
        ]);
        //11
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Constantes $_SERVER',
            'slug' => 'constantes-server',
            'body_main' => 'Constantes $_SERVER más útiles de PHP',
            'body_plus' => '
<p>constantes de seguridad en PHP:</p>

<pre>
<code class="language-bash">$_SERVER["HTTP_USER_AGENT"]; 
</code></pre>

<p>Devuelve los datos del navegador.</p>

<pre>
<code class="language-bash">$_SERVER["REMOTE_ADDR"];  
</code></pre>

<p>Devuelve la IP.</p>

<pre>
<code class="language-bash">$_SERVER["REQUEST_TIME"];
</code></pre>

<p>Devuelve la fecha Unix de la &uacute;ltima petici&oacute;n.</p>

<ul>
</ul>

',          
            'user_id' => 1,
            'status' => 'DRAFT',
            'file' => 'image/post/main/qpzYJ6hHHtmIdMnD8Il1zeBDe9eWQYwphTfnexMR.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);

        //12
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar Laravel en Debian 9',
            'slug' => 'instalar-laravel-en-debian-9',
            'body_main' => 'Instalación de Composer y creación de un proyecto Laravel en Debian Stretch',
            'body_plus' => '
<p><strong>Paquetes necesarios para la instalaci&oacute;n</strong></p>

<p>&nbsp;</p>

<p>Para realizar la instalaci&oacute;n de Laravel en Linux es necesario tener ya instalados&nbsp;Apache, PHP, Mysql (server)&nbsp; y el gestor de paquetes Composer.&nbsp;En el caso de no tenerlos instalados se procede a instalarlos:</p>

<p><strong>Apache</strong></p>

<pre>
<code class="language-bash">apt install apache2 libapache2-mod-php
</code></pre>

<p><strong>MySQL</strong></p>

<pre>
<code class="language-bash">apt install mysql-server
</code></pre>

<p><strong>PHP</strong></p>

<pre>
<code class="language-bash">apt install php7
apt install php-mysql php-xml php-mbstring
</code></pre>

<p>Para la instalaci&oacute;n de Composer es necesario situarse en el directorio donde se desea instalar, un lugar recomendable es el directorio de ejecutables local de administrador (/usr/local/bin). En ocasiones es necesario establecer permisos en el directorio bin.</p>

<p><strong>Instalaci&oacute;n de Composer</strong></p>

<pre>
<code class="language-bash">curl -sS https://getcomposer.org/installer | php
</code></pre>

<p><strong>Creaci&oacute;n de un proyecto Laravel</strong></p>

<pre>
<code class="language-bash">composer.phar create-project laravel/laravel [nombre de proyecto] --prefer-dist
</code></pre>

<p>&nbsp;</p>

',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/IFemNTeEpueZCIjALZOLFoNQjydpsdtkXjbJy0Di.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //13
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Composer - LaravelCollective',
            'slug' => 'composer-laravelcollective',
            'body_main' => 'Actualización de composer, instalación de LaravelCollective',
            'body_plus' => '
<p><strong>Composer﻿</strong></p>

<p>Composer dispone de un comando para actualizar y de otro comando para refrescar los archivos autoload, es decir, crear de nuevo los archivos que incluyen la lista de las clases necesarias para el proyecto.</p>

<p><strong>Refrescar autoload</strong></p>

<pre>
<code class="language-bash">composer.phar dump-autoload
</code></pre>

<p><strong>Actualizar Composer</strong></p>

<pre>
<code class="language-bash">composer.phar update
</code></pre>

<p><strong>El comando php artisan dispone de una amplia lista de opciones &uacute;tiles en el desarrollo del proyecto. Algunas de ellas se muestran a continuaci&oacute;n.&nbsp; &nbsp;</strong></p>

<p><strong>Comprobar versi&oacute;n:</strong></p>

<pre>
<code class="language-bash">php artisan –-version 
</code></pre>

<p><strong>Mostrar paquetes instalados:</strong></p>

<pre>
<code class="language-bash">php artisan package:discover
</code></pre>

<p><strong>Borrar cach&eacute; de las vistas:</strong></p>

<pre>
<code class="language-bash">php artisan view:clear
</code></pre>

<p><strong>Borrar cach&eacute;:</strong></p>

<pre>
<code class="language-bash">php artisan cache:clear
</code></pre>

<p><strong>Almacenar la configuraci&oacute;n de laravel en un solo archivo:</strong></p>

<pre>
<code class="language-bash">php artisan config:cache
</code></pre>

<p><strong>Actualizar la cach&eacute; de configuraci&oacute;n:</strong></p>

<pre>
<code class="language-bash">php artisan config:clear
</code></pre>

<p><strong>Almacenar en cach&eacute; el archivo routes.php:</strong></p>

<pre>
<code class="language-bash">php artisan route:cache
</code></pre>

<p><strong>Mostrar lista de opciones</strong></p>

<pre>
<code class="language-bash">php artisan
</code></pre>

<p>Nota:&nbsp;Para ejecutar artisan es necesario situarse en el directorio del proyecto.</p>

<p><strong>Laravel/Collective</strong></p>

<p>Laravel Collective es un paquete de herramientas que permiten la creaci&oacute;n y el manejo de formularios de una forma muy sencilla y adem&aacute;s es muy f&aacute;cil de implementar en un proyecto Laravel.</p>

<p><strong>Instalar Laravel/Collective desde la terminal:</strong></p>

<pre>
<code class="language-bash">composer.phar require "laravelcollective/html"
</code></pre>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665957631.png" style="height:94px; width:648px" /></p>

<p>Al ejecutar el require comprobar la versi&oacute;n instalada, en este caso 5.5 y actualizar composer:</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665957662.png" style="height:252px; width:707px" /></p>

<p><strong>Implementar Laravel/Collective</strong></p>

<p>&nbsp;</p>

<p>Para cargar Laravel/Collective es necesario a&ntilde;adirlo en el archivo de la ra&iacute;z del proyecto composer.json con la siguiente l&iacute;nea en la secci&oacute;n &quot;require&quot;:</p>

<pre>
<code class="language-bash"> "laravelcollective/html": "^5.5"
</code></pre>

<p>Tambi&eacute;n es necesario a&ntilde;adir en el archivo config/app.php la siguiente l&iacute;nea en el array &quot;providers&quot;:</p>

<pre>
<code class="language-php">Collective\Html\HtmlServiceProvider::class
</code></pre>

<p>Y las dos siguientes l&iacute;neas en el array &quot;aliases&quot;:</p>

<pre>
<code class="language-php">"Form" =&gt; Collective\Html\FormFacade::class,
"Html" =&gt; Collective\Html\HtmlFacade::class</code></pre>

<p>Nota:Recuerda revisar el archivo .env para configurar la ra&iacute;z del proyecto, la base de datos, los datos de correo electr&oacute;nico,etc..</p>

<ul>
</ul>

',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/IFemNTeEpueZCIjALZOLFoNQjydpsdtkXjbJy0Di.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);
        //14
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Migrations en Laravel',
            'slug' => 'migrations-en-laravel',
            'body_main' => 'Migraciones en Laravel',
            'body_plus' => '<p>Las migraciones son un mecanismo que nos provee Laravel con el que podemos tener un control en la estructura de nuestra base de datos y con el que se puede también diseñar la estructura independientemente del motor de base de datos a usar. Laravel en su versión 5.5  incluye 2 archivos en el directorio de migraciones /database/migrations

Estructura de un migration:</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/AucX6ai5XLQs9WuueiKzl0BZJFwo84467NA9E3ek.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //15
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Crear migrations en Laravel',
            'slug' => 'crear-migrations-en-laravel',
            'body_main' => 'Crear migraciones en Laravel',
            'body_plus' => '<p>Laravel recomienda a&ntilde;adir al nombre del migration el prefijo create_ y el sufijo _table. Es decir que un migration con nombre professions pasa a ser create_professions_table como se muestra a continuaci&oacute;n.</p>

<p><strong>Crear migration</strong></p>

<pre>
<code class="language-bash">php artisan make:migration create_[migration]_table
</code></pre>

<p>Ejemplo de migration professions</p>

<pre>
<code class="language-bash">php artisan make:migration create_professions_table
</code></pre>

<p>Con el comando anterior se origina una archivo con el c&oacute;digo que se muestra debajo.De esta forma Laravel crea el siguiente archivo:</p>

<pre>
<code class="language-perl">&lt;?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProfessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("professions", function (Blueprint $table) {
            $table-&gt;increments("id");
            $table-&gt;timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("professions");
    }
}</code></pre>

<p>Otra forma muy &uacute;til de crear un migration es muy similar a la anterior pero se a&ntilde;ade la opci&oacute;n create y se indica el nombre de la tabla:</p>

<pre>
<code class="language-bash">php artisan make:migration new_professions_table --create=professions
</code></pre>

<p>En caso de error generando migraciones al comenzar el proyecto similares a:</p>

<pre>
<code class="language-bash">SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too   
  long;max key length is 767 bytes (SQL: alter table `users` add unique `users_ 
 email_unique`(`email`))</code></pre>

<pre>
<code class="language-bash">SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too   
  long; max key length is 767 bytes</code></pre>

<p>A&ntilde;adir la siguiente l&iacute;nea en el archivo AppServiceProvider.php del directorio app/Providers:</p>

<pre>
<code class="language-php">use Illuminate\Support\Facades\Schema;
public function boot()
    {        
        Schema::defaultStringLength(191);
    }</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/EuyWXjsvzAuDoet2KXuibBspKklVntpt2395kUvs.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //16
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Eliminar Migrations',
            'slug' => 'eliminar-migrations',
            'body_main' => 'Eliminar migrations en Laravel',
            'body_plus' => '<p>Para eliminar un migration lo eliminamos desde el directorio database/migrations y eliminamos el registro de la base de datos en la tabla migrations y finalizamos desde la terminal:</p>

<pre>
<code class="language-bash">composer.phar dump-autoload
</code></pre>

<p>Tambi&eacute;n podemos eliminar todas las tablas y volver a realizar el migration:</p>

<pre>
<code class="language-bash">php artisan migrate:fresh
</code></pre>

<p>Para este tipo de ordenes que pueden ser fatales Laravel dispone de una opci&oacute;n de seguridad sustituyendo la palabra local por production en la l&iacute;nea 2 de nuestro archivo oculto .env en la ra&iacute;z de nuestro proyecto:</p>

<pre>
<code class="language-php">APP_NAME=Nombre
APP_ENV=local
APP_KEY=base64:5diFpD2WvpKmZ/txui+vB3CKE3XOXJTSX
APP_DEBUG=true</code></pre>

<p>De esta forma indicamos que nos encontramos en etapa de producci&oacute;n, en consecuencia Laravel nos realiza una confirmaci&oacute;n antes de realizar la operaci&oacute;n.</p>

<pre>
<code class="language-bash">Do you really wish to run this command? (yes/no) [no]:
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/799zyZVg4rTpWRphshDXbeBbq4c5Oz0yM0T0XRL1.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //17
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Asociar Migrations en Laravel',
            'slug' => 'asociar-migrations-en-laravel',
            'body_main' => 'Tablas relacionales en Laravel',
            'body_plus' => '<p>Asociar migraciones es la forma de relacionar tablas en Laravel, ya sea a&ntilde;adiendo nuevas migraciones o modificando las existentes.&nbsp; La elecci&oacute;n de una opci&oacute;n u otra depender&aacute; de la fase del proyecto y de los datos que contengan las tablas.</p>

<p>Una opci&oacute;n es a&ntilde;adir a la base de datos un campo id extra para hacer referencia a la tabla correspondiente.</p>

<pre>
<code class="language-php">&lt;?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{    
    public function up()
    {
        Schema::create("users", function (Blueprint $table) {
            $table-&gt;increments("id");        
            
            $table-&gt;unsignedInteger("profession_id");
            //restriccion de llave foránea
            $table-&gt;foreign("profession_id")-&gt;references("id")-&gt;on("professions");
            $table-&gt;string("name");
            $table-&gt;string("email")-&gt;unique();//clausura no puede haber un registro igual
            $table-&gt;string("password");
            $table-&gt;rememberToken();
            $table-&gt;timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists("users");
    }
}</code></pre>

<p>Con el m&eacute;todo unsignedInteger se est&aacute; a&ntilde;adiendo un campo entero que solamente acepta valores positivos y con&nbsp;el m&eacute;todo foreign se est&aacute; haciendo referencia al&nbsp; id de la tabla professions con una clausura con la cu&aacute;l no podr&aacute; a&ntilde;adirse un registro en profession_id que no exista en la tabla professions.</p>

<p>Nota: En ocasiones se producen errores con las relaciones entre tablas porque algunas tablas requieren datos de otras que aun no se han creado (en el ejemplo de arriba requiere de la tabla professions. Si se ejecuta el comando migrate devolver&aacute; un error, ya que necesita que antes se haya creado la tabla professions).</p>

<p>Para este tipo de errores es posible cambiar el nombre del migration sustituyendo la fecha para poder cambiar el orden de los archivos y de esta manera poder efectuar el migrate correctamente.</p>

<p>Otra opci&oacute;n es crear la relaci&oacute;n de tablas desde otro migration&nbsp; creando los campos necesarios sin alterar los otros:</p>

<pre>
<code class="language-php">&lt;?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{    
    public function up()
    {
        Schema::create("users", function (Blueprint $table) {
            $table-&gt;increments("id");
            $table-&gt;string("name");
            $table-&gt;string("email")-&gt;unique();//clausura no puede haber un registro igual
            $table-&gt;string("password");
            $table-&gt;rememberToken();
            $table-&gt;timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists("users");
    }
}</code></pre>

<pre>
<code class="language-php">&lt;?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProfessionsTable extends Migration
{   
    public function up()
    {
        Schema::create("professions", function (Blueprint $table) {
            $table-&gt;increments("id");            
            $table-&gt;string("title",100)-&gt;unique();
            $table-&gt;timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists("professions");
    }
}</code></pre>

<pre>
<code class="language-php">php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddProfessionIdToUsers extends Migration
{   
    public function up()
    {
        Schema::table("users",function(Blueprint $table)
        {
            $table-&gt;unsignedInteger("profession_id");
            $table-&gt;foreign("profession_id")-&gt;references("id")-&gt;on("professions");
        });
    }
    public function down()
    {
        Schema::table("users",function(Blueprint $table)
        {
        $table-&gt;dropForeign(["profession_id"]);   
        $table-&gt;dropColumn("profession_id");           
        });
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/P2pLr2fN4YTBkyiU7gfdb5Z3Img3zXSg0s3XxvOp.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //18
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Seeders en Laravel',
            'slug' => 'seeders-en-laravel',
            'body_main' => 'Crear Seeders en Laravel',
            'body_plus' => '<p>Los Seeders son componentes de Laravel que permiten comunicarse con la base de datos de una forma m&aacute;s eficiente y optimizada.</p>

<p>Estructura de un seeder:</p>

<pre>
<code class="language-php">use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{    
    public function run()
    {
        DB::table("users")-&gt;insert([
            "name" =&gt; manuel            
        ]);
    }
}</code></pre>

<p>Para llamar a varios seeders se puede hacer la llamada desde el DatabaseSeeder (que Laravel incluye por defecto) a otros seeders.</p>

<p><strong>Creaci&oacute;n un seeder</strong></p>

<pre>
<code class="language-bash">php artisan make:seeder NuevoSeeder
</code></pre>

<p>Estructura del&nbsp; DatabaseSeeder haciendo la llamada a otros Seeder :</p>

<pre>
<code class="language-php">use Illuminate\Database\Seeder; 
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this-&gt;call([
        NuevoSeeder::class,
        Nuevo2Seeder::class,
        Nuevo3Seeder::class,
        ]);
    }
}</code></pre>

<p>Estructura de un nuevo seeder:</p>

<pre>
<code class="language-php">&lt;?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
class NuevoSeeder extends Seeder
{   
    public function run()
    {
        DB::table("nombre_tabla")-&gt;insert([
            "name"=&gt;"manuel"
        ]);
    }
}</code></pre>

<p><strong>Ejecutar seeders</strong></p>

<pre>
<code class="language-bash">php artisan db:seed
</code></pre>

<p>En ocasiones el comando db:seed devuelve un error, que se soluciona con el comando dump-autoload y volviendo a realizar el comando anterior</p>

<pre>
<code class="language-bash">composer.phar dump-autoload
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/GVWMDUPyMmbSFmhOqi3UfgopGcUryzVNuKIdTXLn.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //19
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Consultas en Laravel',
            'slug' => 'consultas-en-laravel',
            'body_main' => 'Crear consultas a la base de datos en Laravel',
            'body_plus' => '<p>Laravel dispone de ditintos&nbsp; m&eacute;todos para realizar consultas con bases de datos SQL:</p>

<p><strong>Ejemplos de consultas a tabla en Laravel con Query Builder:</strong></p>

<pre>
<code class="language-php">DB::table()-&gt;insert();
DB::table()-&gt;delete();
DB::table()-&gt;update();
DB::table()-&gt;select()</code></pre>

<p><strong>Ejemplos de consultas mysql en Laravel con QueryBuilder:</strong></p>

<pre>
<code class="language-php">DB::insert("inser into user (name) values($name)");
DB::select("select id from users where name=$name");</code></pre>

<pre>
<code class="language-php">DB::insert("insert into user (name) values(?)",[$name]);
DB::insert("insert into user (name) values(:name)",["name"=&gt;$name]);
DB::select("select  id from users where name=?",[$name]);</code></pre>

<pre>
<code class="language-php">$query = DB::table("user")-&gt;select("id")-&gt;take(1)-&gt;get(); 

print_r($query-&gt;first());</code></pre>

<pre>
<code class="language-php">DB::table("user")-&gt;select("id","name")-&gt;where("user","Manuel")-&gt;first();
DB::table("user")-&gt;where("user","Manuel")-&gt;first();
DB::table("user")-&gt;where("user"=&gt;"Manuel")-&gt;first();
DB::table("user")-&gt;where("user"=&gt;"Manuel")-&gt;value(id);
DB::table("user")-&gt;whereName("Manuel")-&gt;first();</code></pre>

<p><strong>Ejemplos de consultas con Eloquent en Laravel:</strong></p>

<pre>
<code class="language-php">\App\Models\User::create([   
    "name"=&gt;"Xip",
    "email"=&gt;"mundaxip@gmail.com",
    "password"=&gt;bcrypt("laravel"),
]);</code></pre>

<p>Para consultas con Query Builder es necesario incluir el namespace en el controlador ( Illuminate\Support\Facades\DB), mientras que con Eloquent es necesario incluir el modelo correspondiente (App\[ruta_modelo]).&nbsp;</p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/Nyw122zFZx5G1PMcmLQxW6pIYR0NnAF0eFmGA9bk.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //20
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Rutas en Laravel',
            'slug' => 'rutas-en-laravel',
            'body_main' => 'Manejo de rutas en Laravel',
            'body_plus' => '<p>Laravel dispone de un archivo donde se pueden controlar todas las rutas que vienen desde el navegador. Este archivo se encuentra en el directorio Routes y&nbsp; es nombrado web.php</p>

<p>Estructura de una ruta (route) en Laravel:</p>

<pre>
<code class="language-php">Route::get("/", function () {
    return view("welcome");
});</code></pre>

<p>En el ejemplo anterior, el primer par&aacute;metro (&quot;/&quot;) indica la ra&iacute;z del poyecto y el segundo par&aacute;metro es una funci&oacute;n an&oacute;nima que devuelve la vista &laquo;welcome&raquo;.</p>

<p>Para asignar m&eacute;todos se indica el nombre del controlador , una arroba (@),&nbsp; y a continuaci&oacute;n el nombre del m&eacute;todo:</p>

<pre>
<code class="language-php">Route::get("/usuarios","UserController@user");
</code></pre>

<p>Los par&aacute;metros que se necesitan pasar a la vista se a&ntilde;aden a continuaci&oacute;n de la ruta separada por una barra (&quot;/&quot;) :</p>

<pre>
<code class="language-php">Route::get("usuarios/info","UserController@info");
Route::get("/usuarios/{id}","UserController@show");</code></pre>

<p>Es posible especificar el tipo de par&aacute;metro indic&aacute;ndolo con otro m&eacute;todo:</p>

<pre>
<code class="language-php">Route::get("/usuarios/{id}","UserController@show")
        -&gt;where("id","[0-9]+");</code></pre>

<p>Se puede indicar que un par&aacute;metro pueda ser opcional a&ntilde;adiendo un interrogante (?) a continuaci&oacute;n del par&aacute;metro:</p>

<pre>
<code class="language-php">Route::get("usuarios/{id}/{id?}", "ProfileController");
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/PQsC57sN80j5hh3JFl7SGuU5wlMuKRNBTeiRLfBJ.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //21
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Controllers en Laravel',
            'slug' => 'controllers-en-laravel',
            'body_main' => 'Estructura de un controlador en Laravel',
            'body_plus' => '<p>Los controladores son archivos que gestionan y controlan la interacci&oacute;n del usuario sobre las vistas y enlazan los modelos con &eacute;stas.&nbsp; Estos controladores no dejan de ser clases que incluyen m&eacute;todos que sirven para realizar una serie de acciones.</p>

<p>En Laravel los controladores se alojan en el directorio app/Http/Controllers y contienen el sufijoController y la extensi&oacute;n .php.</p>

<p>Se recomienda para una mejor organizaci&oacute;n ordenar aloj&aacute;ndolos en subdirectorios.</p>

<p><strong>Crear un controller</strong></p>

<pre>
<code class="language-bash">php artisan make:controller nombredelcontroladorController
</code></pre>

<p><strong>Crear un controller con m&eacute;todos por defecto</strong></p>

<pre>
<code class="language-bash">php artisan make:controller [nombre_controlador]Controller --resource
</code></pre>

<p><strong>Estructura de un controller</strong></p>

<pre>
<code class="language-php">&lt;?php
namespace App\Http\Controllers;
use App\models\Noticias;
class TestController extends Controller
{
    protected $layout;
    public function getPaginacion()
    {
        $datos=Noticias::paginate(3);
        return $this-&gt;layout=view("test.paginacion", compact("datos"));
    }
    
    public function getAdd()
    {
        return $this-&gt;layout=view("test.add");
    }
    
    public function postAdd()
    {
        $file=Input::file("archivo");
    }    
}</code></pre>

<p>metodo invoke()</p>

<pre>
<code class="language-php">php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
class TestController extends Controller
{
    public function __invoke()
    {           
            return view("index");
    }
}</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/kIfOGcJAZtCKuvpYPXfNwI78AkVYl2sLN2cQvwv7.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //22
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Blade y views en Laravel',
            'slug' => 'blade-y-views-en-laravel',
            'body_main' => 'Estructura de una vista en Laravel',
            'body_plus' => '<p>Las vistas son consideradas el contenido de un proyecto que es mostrado al usuario donde el usuario puede interactuar y desde donde puede realizar acciones.&nbsp;En Laravel se alojan en el directorio resources/views y contienen un sufijo .blade.</p>

<p>Laravel dispone de un sistema de plantillas llamado blade similar al de otros frameworks que permite dar m&aacute;s flexibidad a la composici&oacute;n de las vistas y&nbsp; dotan de caracter&iacute;sticas propias que proporcionan seguridad al proyecto. Con este sistema es posible crear plantillas&nbsp; y despu&eacute;s integrar estas plantillas&nbsp;a las vistas asignando o modificando secciones de dicha plantilla. De esta forma se evita repetici&oacute;n de c&oacute;digo utilizando la misma plantilla o plantillas para varias vistas.</p>

<p>Estructura de una plantilla:</p>

<pre>
<code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
  &lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"&gt;
    &lt;meta name="description" content=""&gt;
    &lt;meta name="author" content=""&gt;
    &lt;link rel="icon" href="favicon.ico"&gt;
    &lt;title&gt;@yield("title")&lt;/title&gt;
    &lt;!-- Bootstrap core CSS --&gt;
    &lt;link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"&gt;
    
    &lt;!-- Custom styles for this template --&gt;
    &lt;link href="{{ asset("css/style.css")}}" rel="stylesheet"&gt;
  &lt;/head&gt;
  &lt;body&gt;
&lt;div class="row mt-3"&gt;
        &lt;div class="col-8"&gt;
             @yield("content")
        &lt;/div&gt;
        &lt;div class="col-4"&gt;
            @section("sidebar")
                &lt;h2&gt;Barra Lateral&lt;/h2&gt;
            @show
        &lt;/div&gt;
    &lt;/div&gt;
      
    &lt;/main&gt;
    &lt;footer class="footer"&gt;
      &lt;div class="container"&gt;
        &lt;span class="text-muted"&gt;Place sticky footer content here.&lt;/span&gt;
      &lt;/div&gt;
    &lt;/footer&gt;
    &lt;!-- Bootstrap core JavaScript
    ================================================== --&gt;
    &lt;!-- Placed at the end of the document so the pages load faster --&gt;
    &lt;script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"&gt;&lt;/script&gt;
    &lt;script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"&gt;&lt;/script&gt;
    &lt;script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"&gt;&lt;/script&gt;
    
    
    
    
  &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Estructura de una vista que extiende de una plantilla:</p>

<pre>
<code class="language-php">@extends("layout")
@section("title","Usuario $id")
@section("content")
        Mostrando detalle del usuario: {{$id}} 
@endsection</code></pre>

<p>Laravel permite mostrar los datos con m&eacute;todos propios de laravel pero tambi&eacute;n permite con puro php :</p>

<pre>
<code class="language-php">echo $datos;
</code></pre>

<p>Laravel dispone de opciones que act&uacute;an como filtro aumentando la seguridad en el flujo de datos que PHP :</p>

<pre>
<code class="language-php">echo e($datos);

</code></pre>

<pre>
<code class="language-bash">{{ $datos }} </code></pre>

<p>Para realizar un include se hace de forma similar a como se har&iacute;a en PHP pero incluyendo la @ al comienzo y prescindiendo de la extensi&oacute;n .php:</p>

<pre>
<code class="language-php">@include("nombre_de_archivo")
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/dYn1rnp95TESvqKKKVTb850Oua82LSEW48AE9JXg.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //23
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Models en Laravel',
            'slug' => 'models-en-laravel',
            'body_main' => 'Crear modelos con artisan',
            'body_plus' => '<p>Laravel hace uso de modelos por medio de su ORM (Object-Relational mapping) llamado Eloquent .</p>

<p><strong>Crear un modelo:</strong></p>

<pre>
<code class="language-bash">php artisan make:model User
</code></pre>

<p>A&ntilde;adiendo un subdirectorio, Laravel lo crea autom&aacute;ticamente:</p>

<pre>
<code class="language-bash">php artisan make:model Models/User
</code></pre>

<p>Los models permiten realizar acciones en la base de datos, en el caso de Eloquent va algo m&aacute;s all&aacute;, facilitando el trabajo en tareas repetitivas como puede ser el UpperCamelCase especificando el nombre de la tabla por medio de underscore y asignando el plural. Por ejemplo si tenemos una tabla usuarios, el model&nbsp; debe ser nombrado Usuario y si el nombre de la tabla contiene m&aacute;s palabras intercalando gui&oacute;n bajo, usuario_compras el model debe ser UsuarioCompra. En cualquier caso es posible definir la tabla al comienzo de la clase con $table:</p>

<pre>
<code class="language-php">&lt;?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Users extends Model
{
    protected $table=usuarios;
}</code></pre>

<p>Existe una opci&oacute;n en la creaci&oacute;n de modelos que es la opci&oacute;n -a que permite crear un modelo, un factory, una migraci&oacute;n y un controlador</p>

<pre>
<code class="language-bash">php artisan make:model Animal -a
</code></pre>

<p>En el caso de solo necesitar una migraci&oacute;n&nbsp;</p>

<pre>
<code class="language-bash">php artisan make:model Animal -m
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/1qQVYm1fCCNMqZRkzn5QQ735gcWFW4Pae25AeMg5.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //24
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'MySQL',
            'slug' => 'mysql',
            'body_main' => 'Instalar MySQL en Linux',
            'body_plus' => '<p><strong>MySQL</strong>&nbsp;es un gestor de base de datos relacional de c&oacute;digo abierto basado en lenguaje SQL que permite el acceso y almacenamiento seguro de informaci&oacute;n. Fue creado por MySQLAB, una empresa sueca que fue adquirida por Sun Microsystems en 2008 y Sun, a su vez, fue adquirida 2 a&ntilde;os despu&eacute;s por Oracle. En 2009 un conjunto de desarrolladores crearon un proyecto paralelo llamado MariaDB que actualmente se distribuye en algunas distribuciones Linux.</p>

<p>La instalaci&oacute;n de MySQL puede hacerse de forma individual o desde paquetes que incluyen MySQL. Algunos de estos paquetes son XAMPP, MAMP, LAMP (para Linux), WAMP ( para Windows).</p>

<p><strong>INSTALAR MySQL:</strong></p>

<pre>
<code class="language-bash">sudo apt install mysql-server
</code></pre>

<p><strong>INSTALAR MariaDB</strong></p>

<pre>
<code class="language-bash">sudo apt install mariadb-server
</code></pre>

<p><strong>ACCEDER A CONSOLA</strong></p>

<pre>
<code class="language-bash">sudo mysql
</code></pre>

<p><strong>ACCEDER A CONSOLA INDICANDO USUARIO</strong></p>

<pre>
<code class="language-bash">mysql -u [usuario] -p
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/i3CSA9JNPKlEMdgd19HgBvLmbftuKBvu9YniY6Lo.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);


        //25
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Columnas y Datos MySQL',
            'slug' => 'columnas-y-datos-mysql',
            'body_main' => 'Tipos de columnas y tipos de datos en MySQL',
            'body_plus' => '<p>Los tipos de columna en MySQL son definidos al crear la tabla y especifican que tipo de dato contiene cada columna de dicha tabla. MySQL ofrece tipos de columnas que permiten manejar cualquier tipo de dato. Seleccionar el tipo de columna id&oacute;nea, influye en el uso de recursos y el tiempo de respuesta, determinante en bases de datos que manejan gran cantidad de datos.</p>

<p><strong>TIPOS DE COLUMNA</strong></p>

<p><strong>ENTERO</strong>&nbsp;(Para definir que no tiene signo es necesario a&ntilde;adir el atributo UNSIGNED)</p>

<ul>
    <li>TINYINT<strong>&nbsp;</strong>: 1 byte, de 0 a 255 (con signo de -128 a 127)</li>
    <li>SMALLINT: 2 bytes, de 0 a 65535 (con signo de -32768 a 32767)</li>
    <li>MEDIUNMINT: 3 bytes, de 0 a 1677215 (con signo de -8388608 a 8388607)</li>
    <li>INT: 4 bytes, de 0 a 4.294.967.295 (con signo de -2.147.683.648 a 2.147683647)</li>
    <li>BIGINT: 8 bytes, de 0 a 18.446.744.073.709.551.615 (con signo de -9223372036854775808 a 9223372036854775807)</li>
</ul>

<p>Nota: El atributo ZEROFILL rellena la parte izquierda en 0.</p>

<p><strong>DECIMAL</strong>&nbsp;(Siempre pueden ser positivos y negativos)</p>

<ul>
    <li>FLOAT: 4 bytes, +-1.175494351E-38</li>
    <li>DOUBLE: 8 bytes, +-2.2250738585072014E-308</li>
    <li>DECIMAL (M,D): M + 2 bytes&nbsp;</li>
</ul>

<p>Ejemplo de decimal:</p>

<ul>
    <li>DECIMAL(4,1) [4 enteros y 1 decimal] :&nbsp; -999.9 a 9999.9</li>
    <li>DECIMAL(5,1) [5 enteros y 1 decimal]: -9999.9 a 99999.9</li>
    <li>DECIMAL(6,2) [6 enteros y 2 decimales]: -9999.99 a 99999.99</li>
</ul>

<p><strong>CADENA</strong></p>

<ul>
    <li>CHAR(M) : M bytes</li>
    <li>VARCHAR(M): M + 1 bytes</li>
    <li>TINYLOB(M): M + 1 bytes (m&aacute;x: 255bytes)</li>
    <li>TINYTEXT(M): M + 1 bytes&nbsp;(m&aacute;x: 255bytes)</li>
    <li>BLOB,TEXT(M): M+2 bytes&nbsp;(m&aacute;x: 65535bytes)</li>
    <li>MEDIUMBLOB(M): M + 3 bytes&nbsp;(m&aacute;x: 16 megas)</li>
    <li>MEDIUMTEXT(M): M +3 bytes&nbsp;(m&aacute;x: 16 megas)</li>
    <li>LONGBLOB(M): M +4 bytes&nbsp;(m&aacute;x: 16 megas)</li>
    <li>LONGTEXT(M): M + 4 bytes&nbsp;(m&aacute;x: 16 megas)</li>
    <li>ENUM: Enumeraci&oacute;nes, solo pueden ser un valor de una lista definida.</li>
    <li>SET: Conjuntos, pueden tener uno o varios valores.</li>
</ul>

<p>ENUM y SET&nbsp;no se encuentran en otras bases de datos as&iacute; que puede haber incompatibiliades a la hora de trasladar.</p>

<p>CHAR y VARCHAR&nbsp;son las m&aacute;s utilizadas. CHAR tiene una longitud fija mientras que VARCHAR tiene una longitud variable. Si el campo que necesitamos no va a variar de longitud de forma considerable siempre es recomendable usar CHAR ya que ahorra un byte y la respuesta es m&aacute;s r&aacute;pida.</p>

<p>Nota: Si una tabla contiene campos CHAR y VARCHAR todos los campos CHAR con longitud mayor a 4 se convierten en VARCHAR.&nbsp;</p>

<p><strong>FECHA Y HORA</strong></p>

<ul>
    <li>DATE: 3 bytes. Formato: YYYY-MM-DD (de 1000-01-01 a 9999-12-31)</li>
    <li>TIME: 3 bytes. Formato HH::MM::SS (de -838:59:59 a 838:59:59</li>
    <li>DATETIME: 8 bytes. Formato: YYYY-MM-DD hh:mm:ss (de 1000-01-01 00:00:00 a 9999-12-31 23:59:59)</li>
    <li>TIMESTAMP: 4 bytes. Formato: YYYYMMDDhhmmss</li>
    <li>YEAR: 1 byte Formato: YYYY</li>
</ul>

<p>Nota: Si se introduce un valor incorrecto MySQL lo convierte a ceros.</p>

<p><strong>TIPOS DE DATOS DE UN CAMPO EN MYSQL</strong></p>

<p><strong>INTEGER</strong>: N&uacute;mero entero con rango de -2.147.483.648 y 2.147.483.647</p>

<p><strong>VARCHAR</strong>: Cadena con un m&aacute;ximo de 255 caracteres y longitud variable que se pasa por par&aacute;metro.</p>

<p><strong>TEXT</strong>: Campo de texto con un m&aacute;ximo de 65.535 caracteres.</p>

<p><strong>MEDIUMTEXT</strong>: Campo de texto con un m&aacute;ximo de 16.777.215 caracteres.</p>

<p><strong>DATETIME</strong>: Fecha con formato YYYDDMMHHMMSS</p>

<p><strong>TIMESTAMP</strong>: Fecha actual con formato YYYYDDMMHHMMSS</p>

<p>Cada campo puede tener uno o m&aacute;s&nbsp;<strong>atributos</strong>:</p>

<p><strong>NULL/NOT NULL:</strong>&nbsp;Indica si el campo puede ser vac&iacute;o o nulo (NULL) o no puede ser vac&iacute;o o nulo(NOT NULL)</p>

<p><strong>DEFAULT</strong>: Indica el dato por defecto en caso de venir vac&iacute;o.</p>

<p><strong>AUTO INCREMENT</strong>: Se asigna la suma de uno al valor m&aacute;s alto de ese campo que ya exista en la tabla.</p>

<p><strong>PRIMARY KEY</strong>: Es la llave principal de la tabla, no permite asignar valores duplicados o nulos. Es recomendable disponer de una primary key por lo menos en cada tabla.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/CIazJ8bosJ9n7G8pdtHCzXsOy8VkyxFpW9Tc6czO.jpg'

        ]);
       
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);

        //26
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Bases de datos y tablas en MySQL',
            'slug' => 'bases-de-datos-y-tablas-en-mysql',
            'body_main' => 'Manejo de bases de datos, tablas y registros en MySQL',
            'body_plus' => '<p>En MySQL se pueden crear varias bases de datos y dentro de &eacute;stas se pueden crear varias tablas. A su vez estas tablas pueden contener multitud de datos que pueden ser creados, eliminados, modificados o consultados de m&uacute;ltiples formas. Esta entrada trata de forma resumida el manejo de bases de datos, tablas y registros mediante instrucciones de c&oacute;digo desde una consola mysql.</p>

<p>En las siguientes l&iacute;neas se muestra la estructura de como crear, eliminar y mostrar bases de datos, como tambi&eacute;n importar y exportar desde la consola mysql.</p>

<p><strong>BASES DE DATOS</strong></p>

<p><strong>CREAR BASE DE DATOS</strong></p>

<pre>
<code class="language-sql">CREATE DATABASE [nombre de base de datos]
</code></pre>

<p>CREAR BASE DE DATOS&nbsp;especificando formato de caracteres (cotejamiento):</p>

<pre>
<code class="language-sql">CREATE DATABASE [nombre de base de datos]
CHARACTER SET utf8 COLLATE utf8_general_ci</code></pre>

<p><strong>ELIMINAR BASE DE DATOS</strong></p>

<pre>
<code class="language-sql">DROP DATABASE [nombre]
</code></pre>

<p><strong>MOSTRAR BASE DE DATOS</strong></p>

<pre>
<code class="language-sql">SHOW DATABASES
</code></pre>

<p><strong>SELECCIONAR BASE DE DATOS</strong></p>

<pre>
<code class="language-sql">USE [nombre de base de datos]
</code></pre>

<p><strong>IMPORTAR BASE DE DATOS</strong></p>

<pre>
<code class="language-sql">mysql -u [usuario] -p [basededatos] &lt; [archivo.sql]
</code></pre>

<pre>
<code class="language-sql">mysql -u [usuario] -p [contraseña] [base de datos] &lt; [archivo.sql]
</code></pre>

<p><strong>EXPORTAR BASE DE DATOS</strong></p>

<pre>
<code class="language-sql">mysqldump -u [usuario] -p [basededatos] &gt; [archivoaexportar.sql]
</code></pre>

<p><strong>TABLAS</strong></p>

<p>A continuaci&oacute;n se muestra la estructura de como crear, eliminar, mostrar y vaciar una tabla.&nbsp;</p>

<p><strong>CREAR TABLA</strong></p>

<pre>
<code class="language-sql">CREATE TABLE [nombre](
    [nombre campo] [tipo] [opciones]
);
</code></pre>

<p>Ejemplo de tabla:</p>

<pre>
<code class="language-sql">CREATE TABLE productos(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(50) NOT NULL,
    fechaCaducidad DATE
);
</code></pre>

<p><strong>BORRAR TABLA</strong></p>

<pre>
<code class="language-sql">DROP TABLE [nombredelatabla]
</code></pre>

<p><strong>MOSTRAR TABLAS</strong></p>

<pre>
<code class="language-sql">SHOW tables;
</code></pre>

<p><strong>MOSTRAR ESTRUCTURA DE TABLA</strong></p>

<pre>
<code class="language-sql">DESC [nombre_tabla];
</code></pre>

<pre>
<code class="language-sql">DESCRIBE [nombre_tabla];
</code></pre>

<p><strong>VACIAR TABLA</strong></p>

<pre>
<code class="language-sql">TRUNCATE TABLE [nombredelatabla]
</code></pre>

<p><strong>REGISTROS</strong></p>

<p>Los registros son los datos o valores asignados en una fila de una tabla. A continuaci&oacute;n se muestra la estructura y algunos ejemplos de como insertar, eliminar, actualizar registros en una tabla y realizar consultas a una tabla.&nbsp;&nbsp;</p>

<p><strong>INSERTAR DATOS EN TABLA</strong></p>

<pre>
<code class="language-sql">INSERT INTO tabla (columnas)
VALUES (valores);</code></pre>

<p>Ejemplos de insertar registros&nbsp; en tabla:</p>

<pre>
<code class="language-sql">INSERT INTO productos (producto,fechaCaducidad)
VALUES ( procesador, "2022-01-01");</code></pre>

<pre>
<code class="language-sql">INSERT INTO productos VALUES ( 0,procesador, "2022-01-01");
</code></pre>

<p><strong>ACTUALIZAR REGISTRO</strong></p>

<pre>
<code class="language-sql">UPDATE [LOW_PRIORITY] [tabla]
SET campo = valor</code></pre>

<p><strong>ACTUALIZAR REGISTRO CON CONDICI&Oacute;N Y L&Iacute;MITE</strong></p>

<pre>
<code class="language-sql">UPDATE [LOW_PRIORITY] [tabla]
SET campo = valor
WHERE campo2 = valor2
LIMIT [int]</code></pre>

<p>LOW_PRIORITY: opci&oacute;n que retrasa la actualizaci&oacute;n hasta que la tabla no est&eacute; trabajando</p>

<p>Ejemplos actualizar registros:</p>

<pre>
<code class="language-sql">UPDATE productos SET fechaCaducidad="2010-12-12" 
WHERE producto = "procesador"</code></pre>

<p>Nota: La sentencia UPDATE sin la cl&aacute;usula WHERE actualiza todos los registros de la tabla.</p>

<p><strong>CONSULTA A UNA TABLA</strong></p>

<pre>
<code class="language-sql">SELECT [campo]
FROM [tabla]
WHERE [campo2]= [valor2]</code></pre>

<p>Ejemplo consulta a tabla:</p>

<pre>
<code class="language-sql">SELECT count(*)
FROM productos
WHERE producto = "procesador"</code></pre>

<p><strong>ELIMINAR TABLA</strong></p>

<pre>
<code class="language-sql">DELETE FROM [tabla];
</code></pre>

<p><strong>ELIMINAR REGISTRO DE UNA TABLA</strong></p>

<pre>
<code class="language-sql">DELETE FROM [tabla] WHERE [campo]=[valor];
</code></pre>

<p>Mysql dispone de una instrucci&oacute;n que permite cargar datos desde un archivo externo con un conjunto de opciones que permiten configurar la inserci&oacute;n.</p>

<p><strong>INSERTAR DATOS DESDE UN ARCHIVO EXTERNO</strong></p>

<pre>
<code class="language-sql">LOAD DATA [LOW_PRIORITY] [LOCAL] INFILE "archivo"
[IGNORE | REPLACE]
INTO TABLE [nombretabla]
[FIELDS
    [TERMINATED BY "cadena"]
    [OPTIONALLY] ENCLOSED BY "caracter"]
    [ESCAPED BY "caracter"]]
[LINES TERMINATED BY "cadena"]
[IGNORE n LINES]
[(lista_columnas)]</code></pre>

<p>La lista siguiente indica las distintas opciones permitidas en la carga de archivos.</p>

<ul>
    <li>LOW_PRIORITY: Retrasa la sentencia hasta que ning&uacute;n cliente est&eacute; leyendo la tabla.</li>
    <li>LOCAL: El archivo se lee desde el equipo cliente.</li>
    <li>IGNORE: No carga las columnas que tengan la llave principal duplicada.</li>
    <li>REPLACE: Reemplaza los registros con llaves duplicadas.</li>
    <li>TERMINATED BY: Caracater o caracteres que delimitan valores. (usando FIELDS)</li>
    <li>ENCLOSED BY: Especifica una caracter entrecomillado que se quita al final del campo de valores.(usando OPTIONALLY)</li>
    <li>ESCAPED BY: Indica el caracter de escape de los caracteres especiales.</li>
    <li>FIELDS: Siempre debe preceder a LINES.</li>
    <li>LINES TERMINATED BY: Caracter o caracteres que indican el final de la l&iacute;nea.</li>
</ul>

<p>A continuaci&oacute;n se muestran los valores por defecto si no se indica FIELDS ni LINES</p>

<ul>
    <li>FIELDS</li>
    <li>TERMINATED BY &#39; \t&#39;</li>
    <li>ENCLOSED BY &#39; &#39;</li>
    <li>ESCAPED BY &#39;\\&#39;</li>
    <li>LINES TEMINATED BY &#39;\n&#39;</li>
</ul>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/Ebge9MAvozCnrmmMONNSFqPJ1KiDHBJB09mEAn5h.jpg'

        ]);
        
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);

        //27
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'SELECT y REPLACE en MySQL',
            'slug' => 'select-y-replace-en-mysql',
            'body_main' => 'Sentencia SELECT en MySQL en distintas tablas',
            'body_plus' => '<p>La sentencia&nbsp;SELECT&nbsp;permite realizar consultas,&nbsp;ya sea en una o m&aacute;s tablas,&nbsp;en una base de datos basada en SQL. Estas consultas&nbsp;permiten calcular y obtener resultados de datos mediante&nbsp;un conjunto de cl&aacute;usulas que se a&ntilde;aden a continuaci&oacute;n del SELECT.</p>

<p>El siguiente c&oacute;digo muestra la estructura y un ejemplo de una consulta b&aacute;sica.&nbsp;</p>

<pre>
<code class="language-sql">SELECT * FROM [tabla]
</code></pre>

<p>El par&aacute;metro * es equivalente a todos, por tanto, en el ejemplo siguiente el resultado que devolver&aacute; la consulta ser&aacute;n todos los registros de la tabla productos.</p>

<pre>
<code class="language-sql">SELECT * FROM productos
</code></pre>

<p>En lugar de * es posible indicar uno o varios campos. La siguiente plantilla y el ejemplo siguiente de consulta muestra distintas cl&aacute;usulas a&ntilde;adidas al SELECT que permiten reducir el tiempo de consulta y la devoluci&oacute;n de un resultado m&aacute;s espec&iacute;fico.</p>

<pre>
<code class="language-sql">SELECT [campo1],[campo2]
FROM [tabla]
WHERE [campo2]
BETWEEN [integer]
AND [integer]
ORDER BY [tabla] [asc|desc]</code></pre>

<pre>
<code class="language-sql">SELECT producto,peso
FROM productos
WHERE peso 
BETWEEN 3
AND 5
ORDER BY producto DESC</code></pre>

<p>Para hacer consultas con distintas tablas y evitar errores, debemos especificar la tabla y el campo:</p>

<pre>
<code class="language-sql">SELECT [tabla1.campo1], [tabla1.campo2], [tabla1.campo3],[tabla2.campo2],[tabla3.campo1]
FROM [tabla1],[tabla2],[tabla3]
WHERE [tabla2.campo1] = [tabla3.campo3]
AND [tabla1.campo1] = [tabla3.campo1]||[valor]
</code></pre>

<p>Ejemplo de consulta en distintas tablas:</p>

<pre>
<code class="language-sql">SELECT productos.id,productos.producto,productos.tipo,usuario.edad,comprador.user_id
FROM productos,usuario,comprador
WHERE usuario.id = comprador.user_id
AND usuario.edad = 18</code></pre>

<p>Ejemplo de consulta SELECT con ORDER BY:</p>

<pre>
<code class="language-sql">SELECT * FROM productos WHERE tipo = "electronica"
ORDER BY precio DESC, tipo,fechaCaducidad</code></pre>

<p><strong>ORDER BY&nbsp;</strong>permite asignar los campos o columnas de forma n&uacute;merica.</p>

<p>Ejemplo de consulta SELECT con&nbsp;<strong>GROUP BY</strong>:</p>

<pre>
<code class="language-sql">SELECT peso FROM productos
GROUP BY peso
ORDER BY peso DESC </code></pre>

<p>Ejemplo de consulta SELECT con&nbsp;<strong>HAVING</strong>:</p>

<pre>
<code class="language-sql">SELECT producto FROM productos
GROUP BY producto
HAVING peso  &gt; 5
ORDER BY peso DESC </code></pre>

<p>Ejemplo de consulta SELECT con&nbsp;<strong>LIMIT</strong>:</p>

<pre>
<code class="language-sql">SELECT producto FROM productos 
LIMIT 10</code></pre>

<p>Si LIMIT lleva dos par&aacute;metros el primer par&aacute;metro el inicio del primer resultado y el segundo el n&uacute;mero de registros a devolver.</p>

<pre>
<code class="language-sql">SELECT id,producto FROM productos 
LIMIT 10, 5</code></pre>

<p>Ejemplo de consulta con Alias:</p>

<pre>
<code class="language-sql">SELECT p.id,p.producto, compras.id
FROM productos as p, compras as c
WHERE p.id=c.id</code></pre>

<p>Ejemplo de consulta con&nbsp;<strong>IN</strong>&nbsp;y&nbsp;<strong>NOT IN</strong>:</p>

<pre>
<code class="language-sql">SELECT producto,peso
FROM productos
WHERE producto IN ("procesador", "placa")
ORDER BY peso DESC</code></pre>

<p>Ejemplo de consulta con&nbsp;<strong>BETWEEN</strong>&nbsp;y&nbsp;<strong>NOT BETWEEN:</strong></p>

<pre>
<code class="language-sql">SELECT producto,peso
FROM productos
WHERE peso 
NOT BETWEEN 3
AND 5
ORDER BY producto DESC
</code></pre>

<p>Ejemplo de consulta con&nbsp;<strong>LIKE</strong>&nbsp;y&nbsp;<strong>NOT LIKE</strong>:</p>

<pre>
<code class="language-sql">SELECT producto,peso
FROM productos
WHERE producto LIKE "pro%"</code></pre>

<pre>
<code class="language-sql">SELECT producto,peso
FROM productos
WHERE producto NOT LIKE "%ces%"
</code></pre>

<p><strong>REPLACE</strong></p>

<p>El m&eacute;todo replace permite reemplazar una cadena o parte de una cadena mediante sentencias en MySQL.</p>

<pre>
<code class="language-sql">update [tabla] set [columna] = REPLACE([columna],[cadena1],[cadena2] WHERE ID = [ID]
</code></pre>

<p><strong>cadena1</strong>&nbsp;:&nbsp;Cadena o subcadena a buscar</p>

<p><strong>cadena2</strong>:&nbsp;Cadena de reemplazo</p>

<p>Ejemplo&nbsp;</p>

<pre>
<code class="language-sql">UPDATE posts SET body=REPLACE(body,"http://", "//") WHERE ID= 274;
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/kaMCpUfFP18HDOIqHtbKFR8GizMQEU2ElxlpzGF5.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);

        //28
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Funciones agregadas MySQL',
            'slug' => 'funciones-agregadas-mysql',
            'body_main' => 'Funciones de agregado en MySQL',
            'body_plus' => '<p><strong>FUNCIONES DE AGREGADO B&Aacute;SICAS</strong></p>

<p>&nbsp;</p>
<p>Las funciones de agregado realizan cálculos de un conjunto de resultados devolviendo un solo valor. Con ellas podemos obtener mínimos,máximos, promedios,etc...</p>
<p><strong>COUNT</strong></p>

<p>&nbsp;Retorna el total de resultados de la consulta. Con Count los null son incluidos</p>

<pre>
<code class="language-sql">SELECT COUNT(*)
FROM usuarios
WHERE name="manuel"</code></pre>

<p><strong>AVG</strong></p>

<p>Retorna el promedio, solo en campos num&eacute;ricos.</p>

<pre>
<code class="language-sql">SELECT AVG (promedio)  AS media
FROM usuarios</code></pre>

<p><strong>MAX</strong></p>

<p>Retorna el valor m&aacute;ximo</p>

<p><strong>MIN</strong></p>

<p>Retorna el valor m&iacute;nimo</p>

<pre>
<code class="language-sql">SELECT MAX (edad) maximo, MIN(edad) minimo
FROM usuarios</code></pre>

<p><strong>SUM</strong></p>

<p>Retorna la suma, solo campo num&eacute;rico</p>

<pre>
<code class="language-sql">SELECT SUM(edad)
FROM usuarios</code></pre>

<p><strong>STDDEV</strong></p>

<p>Retorna la desviaci&oacute;n est&aacute;ndar (frecuencia)</p>

<pre>
<code class="language-sql">SELECT STDDEV(edad)
FROM usuarios</code></pre>

<p><strong>MID</strong></p>

<p>Retorna un n&uacute;mero determinado de caracteres que comienza en el caracter indicado</p>

<pre>
<code class="language-sql">SELECT MID(nombre, 3, 3)
FROM usuarios</code></pre>

<p><strong>LENGTH</strong></p>

<p>Retorna la longitud de la cadena</p>

<pre>
<code class="language-sql">SELECT LENGTH(name) longitud FROM usuarios
</code></pre>

<p><strong>UCASE</strong></p>

<p>Retorna la cadena en may&uacute;sculas</p>

<pre>
<code class="language-sql">SELECT UCASE(MID(nombre,3,3))
FROM usuarios</code></pre>

<p><strong>LCASE</strong></p>

<p>Retorna la cadena en min&uacute;sculas</p>

<pre>
<code class="language-sql">SELECT LCASE(MID(nombre,3,3))
FROM usuarios</code></pre>

<p><strong>CONCAT</strong>(cadena1,cadena2)</p>

<p>Une cadenas.(Si alguno de los campos es null lo toma como null)</p>

<pre>
<code class="language-sql">SELECT CONCAT(provincia,",",pais) procedencia
FROM perfil</code></pre>

<p><strong>CONCAT_WS</strong>(separador,cadena)</p>

<p>Une cadenas incluyendo un separador</p>

<pre>
<code class="language-sql">SELECT CONCAT_WS(", ",name, surnames) procedencia FROM perfil
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/IJZ3pY8C26GjoDaAQ9Qrz4c20XdRK38BE8pIamkw.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);

        //29
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Fechas en MySQL',
            'slug' => 'fechas-en-mysql',
            'body_main' => 'Manejar fecha y hora en MySQL',
            'body_plus' => '<p><strong>MySQL</strong>&nbsp;dispone de funciones para obtener la fecha y hora actuales y extraer una de las secciones de dicha fecha y hora.</p>

<p>La funci&oacute;n&nbsp;<strong>NOW()</strong>&nbsp;de MySQL permite obtener la hora y fecha actual en formato de cadena. Para obtener solamente la fecha o solamente la hora existen las funciones&nbsp;<strong>CURDATE()</strong>&nbsp;y&nbsp;<strong>CURTIME()</strong>. Por otro lado&nbsp;el m&eacute;todo&nbsp;<strong>DATE()</strong>&nbsp;y el m&eacute;todo&nbsp;<strong>TIME()</strong>&nbsp;permiten extraer la fecha y la hora respectivamente de una cadena en formato de fecha, por tanto, si en lugar de una cadena como par&aacute;metro&nbsp;se a&ntilde;ade la funci&oacute;n&nbsp;<strong>NOW()</strong>&nbsp;el resultado obtenido es el mismo que&nbsp;<strong>CURDATE()</strong>&nbsp;Y&nbsp;<strong>CURTIME()</strong>, es decir la fecha actual y la hora actual.</p>

<p>Obtener fecha:</p>

<pre>
<code class="language-sql">SELECT DATE(NOW()) AS fecha, CURDATE() AS fecha2
</code></pre>

<p>Obtener hora:</p>

<pre>
<code class="language-sql">SELECT TIME(NOW()) hora, CURTIME() hora2
</code></pre>

<p>Para extraer d&iacute;a, mes,a&ntilde;o, hora, minuto o segundo de un campo de fecha y hora est&aacute; disponible la funci&oacute;n&nbsp;<strong>EXTRACT()</strong>&nbsp; que permite obtenerlo con la ayuda de un alias.</p>

<p>Obtener d&iacute;a, a&ntilde;o o mes de una fecha:</p>

<pre>
<code class="language-sql">SELECT EXTRACT(DAY FROM fecha) AS dia
FROM noticias</code></pre>

<pre>
<code class="language-sql">SELECT EXTRACT(MONTH FROM fecha) AS mes
FROM noticias</code></pre>

<pre>
<code class="language-sql">SELECT EXTRACT(YEAR FROM fecha) AS año,
EXTRACT(MONTH FROM fecha) AS mes
FROM noticias</code></pre>

<p>Obtener hora, minuto, segundo y microsegundo de una hora:</p>

<pre>
<code class="language-sql">SELECT EXTRACT(HOUR from fecha) AS hora
EXTRACT(MINUTE from fecha) AS minuto
FROM noticias</code></pre>

<pre>
<code class="language-sql">SELECT EXTRACT(SECOND from fecha) AS segundo
EXTRACT(MICROSECOND from fecha) AS microsegundo
FROM noticias</code></pre>

<p>Tambi&eacute;n es posible aumentar o disminuir un intervalo de tiempo a una fecha, para ello es necesario indicar la unidad con la que se va a manejar ese intervalo. A continuaci&oacute;n se muestra la lista de las unidades disponibles por MySQL.</p>

<p>Aumentar o disminuir tiempo de fecha y hora:</p>

<pre>
<code class="language-sql">DATE_ADD([campo date], INTERVAL [valor] [unidad])
</code></pre>

<pre>
<code class="language-sql">DATE_SUB([campo date], INTERVAL [valor] [unidad])
</code></pre>

<p>Unidades:</p>

<ul>
    <li>MICROSECOND</li>
    <li>SECOND</li>
    <li>MINUTE</li>
    <li>HOUR</li>
    <li>DAY</li>
    <li>WEEK</li>
    <li>MONTH</li>
    <li>QUARTER</li>
    <li>YEAR</li>
    <li>SECOND_MICROSECOND</li>
    <li>MINUTE_MICROSECOND</li>
    <li>MINUTE_SECOND</li>
    <li>HOUR_MICROSECOND</li>
    <li>HOUR_SECOND</li>
    <li>HOUR_MINUTE</li>
    <li>DAY_MICROSECOND</li>
    <li>DAY_SECOND</li>
    <li>DAY_MINUTE</li>
    <li>DAY_HOUR</li>
    <li>YEAR_MONTH</li>
</ul>

<pre>
<code class="language-sql">SELECT DATE_ADD("2018-04-12", INTERVAL 10 DAY) AS fecha
</code></pre>

<pre>
<code class="language-sql">SELECT fecha DATE_ADD(fecha, INTERVAL 10 DAY)
FROM noticias</code></pre>

<pre>
<code class="language-sql">SELECT DATE_ADD("2018-04-12", INTERVAL 1 QUARTER) AS fecha
</code></pre>

<pre>
<code class="language-sql">SELECT DATE_ADD(fecha, INTERVAL "1-3" YEAR_MONTH) AS fecha
FROM noticias;</code></pre>

<p>Nota: Recuerda no olvidar las comillas, ya que no da error pero realiza la operaci&oacute;n de resta. En el ejemplo anterior (sin las comillas) obtendr&iacute;a -2 y restar&iacute;a 2 meses a la fecha seleccionada.</p>

<pre>
<code class="language-sql">SELECT DATE_SUB(fecha, INTERVAL "1 3" DAY_HOUR) AS fecha
FROM noticias;</code></pre>

<p>&nbsp;Se puede simplificar sustituyendo el DATE_ADD o DATE_SUB por un signo:</p>

<pre>
<code class="language-sql">SELECT [campo date] + INTERVAL [valor] [unidad]
</code></pre>

<pre>
<code class="language-sql">SELECT fecha - INTERVAL "1 5" YEAR_MONTH) as fecha
FROM noticias
</code></pre>

<p>Obtener diferencia de d&iacute;as entre 2 fechas :</p>

<pre>
<code class="language-sql">SELECT DATEDIFF(now(),fecha) as tiempo
FROM noticias</code></pre>

<p>Formatear fecha:</p>

<pre>
<code class="language-sql">SELECT DATE_FORMAT(NOW(), "%d-%m-%Y %h:%m:%S %p")
</code></pre>

<p>Opciones:</p>

<ul>
    <li>%a&nbsp; -&nbsp; D&iacute;a de semana abreviado (ingl&eacute;s)</li>
    <li>%b&nbsp; -&nbsp; Nombre del mes abreviado (ingl&eacute;s)</li>
    <li>%c&nbsp; &nbsp;-&nbsp; Mes num&eacute;rico (0-12)</li>
    <li>%d&nbsp; &nbsp;-&nbsp; D&iacute;a del mes num&eacute;rico (00-31)</li>
    <li>%D&nbsp; -&nbsp; D&iacute;a del mes con sufijo (ingl&eacute;s)</li>
    <li>%e&nbsp; &nbsp;-&nbsp; D&iacute;a del mes num&eacute;rico (0-31)</li>
    <li>%f&nbsp; &nbsp; -&nbsp; Microsegundos (000000-999999)</li>
    <li>%h&nbsp; &nbsp;-&nbsp; Hora(01-12)</li>
    <li>%H&nbsp; -&nbsp; Hora (00-23)</li>
    <li>%i&nbsp; &nbsp; -&nbsp; Minutos num&eacute;rico (00-59)</li>
    <li>%I&nbsp; &nbsp; -&nbsp; Hora (01-12)</li>
    <li>%j&nbsp; &nbsp; -&nbsp; D&iacute;a del a&ntilde;o(001-366)</li>
    <li>%k&nbsp; &nbsp;-&nbsp; Hora (0-23)</li>
    <li>%l&nbsp; &nbsp;-&nbsp; Hora(1-12)</li>
    <li>%m -&nbsp; Mes num&eacute;rico (00-12)</li>
    <li>%M -&nbsp; Nombre del mes (ingl&eacute;s)</li>
    <li>%p&nbsp; -&nbsp; AM o PM</li>
    <li>%r&nbsp; &nbsp;-&nbsp; Tiempo 12 horas (AM-PM)</li>
    <li>%s&nbsp; &nbsp;-&nbsp; Segundos (00-59)</li>
    <li>%S&nbsp; &nbsp;-&nbsp; Segundos (00-59)</li>
    <li>%T&nbsp; &nbsp;-&nbsp; Tiempo 24 horas&nbsp;</li>
    <li>%u&nbsp; -&nbsp; Semana (00-53) (lunes primer d&iacute;a de semana)</li>
    <li>%U&nbsp; -&nbsp; Semana (00-53) (domingo primer d&iacute;a de semana)</li>
    <li>%v&nbsp; &nbsp;-&nbsp; Semana (01-53) (lunes primer d&iacute;a de semana)</li>
    <li>%V&nbsp; -&nbsp; Semana (01-53) (domingo primer d&iacute;a de semana)</li>
    <li>%w&nbsp; -&nbsp; D&iacute;a de la semana (0=Sunday-6=Saturday)</li>
    <li>%W -&nbsp; Nombre del d&iacute;a (ingl&eacute;s)</li>
    <li>%x&nbsp; &nbsp;-&nbsp; A&ntilde;o, num&eacute;rico con 4 d&iacute;gitos&nbsp;(lunes primer d&iacute;a de semana)</li>
    <li>%X&nbsp; &nbsp;-&nbsp; A&ntilde;o, num&eacute;rico con 4 d&iacute;gitos (domingo primer d&iacute;a de semana)</li>
    <li>%y&nbsp; &nbsp;-&nbsp; A&ntilde;o, num&eacute;rico con 2 d&iacute;gitos</li>
    <li>%Y&nbsp; &nbsp;-&nbsp; A&ntilde;o, num&eacute;rico con 4 d&iacute;gitos</li>
    <li>%%&nbsp; -&nbsp; %</li>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/uotgmNSF95vSqE65208gchJ3gzUrHjNUvz529yYN.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //30
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'JOIN en MySQL',
            'slug' => 'join-en-mysql',
            'body_main' => 'Sentencias JOIN en MySQL',
            'body_plus' => '<p>Las funciones&nbsp;<strong>JOIN</strong>&nbsp;son cl&aacute;usulas que permiten obtener datos de dos o m&aacute;s tablas relacionales al mismo tiempo mediante los comandos SELECT, DELETE, UPDATE. E</p>

<p><strong>INNER JOIN</strong></p>

<p>Retorna los registros de las tablas que coinciden:</p>

<pre>
<code class="language-sql">SELECT [campo] FROM [tabla1]
INNER JOIN [tabla2]
ON tabla1.campo = tabla2.campo</code></pre>

<pre>
<code class="language-sql">SELECT nombre, perfil.nombre AS perfilNombre,
noticias.detalle AS detalle
FROM usuarios
INNER JOIN perfil, noticias
ON usuarios.id=noticias.user_id</code></pre>

<pre>
<code class="language-sql">SELECT nombre, perfil.nombre AS perfilNombre,
noticias.detalle AS detalle
FROM usuarios
INNER JOIN perfil, noticias
WHERE usuarios.id=noticias.user_id
AND perfil.user_id=usuarios.id</code></pre>

<p><strong>LEFT JOIN</strong></p>

<p>Retorna los registros la tabla1(junto al FROM) y los que coinciden con la tabla2,tabla3,etc...</p>

<pre>
<code class="language-sql">SELECT [campo] FROM [tabla1]
LEFT JOIN tabla2
ON tabla1.campo = tabla2.campo</code></pre>

<pre>
<code class="language-sql">SELECT u.nombre,p.edad,p.apellidos
FROM usuarios AS u
LEFT JOIN perfil AS p
ON u.id=p.user_id</code></pre>

<p><strong>RIGHT JOIN</strong></p>

<p>Retorna los registros de la tabla2 y los que coinciden con la tabla1(junto al FROM). Si en alg&uacute;n campo no coincide ese campo se convierte a NULL.</p>

<pre>
<code class="language-sql">SELECT nombre, p.edad AS edad
FROM usuarios
RIGHT JOIN perfil
ON usuarios.id = perfil.user_id</code></pre>

<p>Nota: Si a&ntilde;adimos otra condici&oacute;n(AND) debemos sustituir ON por WHERE</p>

<p><strong>UNION</strong></p>

<p>Retorna la combinaci&oacute;n de dos o m&aacute;s SELECT. Todos los SELECT deben tener el mismo n&uacute;mero de campos, del mismo tipo y en el mismo orden.</p>

<pre>
<code class="language-sql">SELECT nombre, edad
FROM usuarios
WHERE nombre = "Juan"
UNION
SELECT nombre,edad
FROM usuarios
WHERE nombre = "Manolo"</code></pre>

<p><strong>FULL OUTER JOIN&nbsp;(Cl&aacute;usula no disponible en MySQL)</strong></p>

<p>Retorna todos los registros de tabla1 y tabla2</p>

<pre>
<code class="language-sql">SELECT * FROM [tabla1]
LEFT JOIN [tabla2] ON [tabla1.campo]=[tabla2.campo]
UNION
SELECT * FROM [tabla1]
RIGHT JOIN [tabla2] ON [tabla1.campo] = [tabla2.campo]</code></pre>

<p>A continuaci&oacute;n un ejemplo b&aacute;sico m&aacute;s pr&aacute;ctico con dos tablas para entender mejor la diferencia.</p>

<p><strong>Tabla usuarios</strong></p>

<pre>
<code class="language-sql">ID          nombre
-------------------
1            Juan
2            Javier
3            Rubén
4            Iván</code></pre>

<p><strong>Tabla destinatarios</strong></p>

<pre>
<code class="language-sql">ID          nombre
-------------------
1            Rubén
2            Iván
3            Mónica
4            Vanesa</code></pre>

<ul>
    <li><strong>INNER JOIN&nbsp;</strong></li>
</ul>

<pre>
<code class="language-sql">SELECT * FROM usuarios
INNER JOIN destinatarios
ON usuarios.nombre = destinatarios.nombre;</code></pre>

<ul>
    <li>El resultado ser&iacute;an&nbsp;los valores en comunes entre las dos tablas</li>
</ul>

<pre>
<code class="language-sql">usuarios           destinatarios
(campo nombre)     (campo nombre)
-----------------------------------------
Rubén                  Rubén
Iván                   Iván</code></pre>

<ul>
    <li><strong>LEFT JOIN&nbsp;</strong></li>
</ul>

<pre>
<code class="language-sql">SELECT * FROM usuarios
LEFT JOIN destinatarios
ON usuarios.nombre = destinatarios.nombre</code></pre>

<ul>
    <li>El resultado ser&iacute;a&nbsp;todos los valores de la tabla usuarios y los valores comunes de la tabla destinatarios.</li>
</ul>

<pre>
<code class="language-sql">usuarios         destinatarios
(campo nombre)   (campo nombre)
--------------------------------
Juan               null 
Javier             null
Rubén              Rubén
Iván               Iván</code></pre>

<ul>
    <li><strong>RIGHT JOIN</strong>&nbsp;</li>
</ul>

<pre>
<code class="language-sql">SELECT * FROM usuarios
RIGHT JOIN destinatarios
ON usuarios.nombre = destinatarios.nombre;</code></pre>

<ul>
    <li>El resultado ser&iacute;a todos los valores de la tabla destinatarios y los valores en com&uacute;n de la tabla usuarios</li>
</ul>

<pre>
<code class="language-sql">usuarios          destinatarios
(campo nombre)    (campo nombre)
-------------------------------
Rubén              Rubén
Iván               Iván
null               Mónica               
Javier             Vanesa</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ntpvOpRhckpw09qAjLlW0YVwdnAhNsNBxGpqTZCj.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //2
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'ALTER TABLE en MySQL',
            'slug' => 'alter-table-en-mysql',
            'body_main' => 'Sentencia ALTER TABLE en MySQL',
            'body_plus' => '<p><strong>ALTER TABLE</strong>&nbsp;es una instrucci&oacute;n de MySQL que nos permite cambiar la estructura de una tabla. Con ALTER TABLE podemos a&ntilde;adir, modificar y eliminar los campos de una tabla, como modificar el nombre, tipo de dato, restricciones PRIMARY KEY, FOREIGN KEY, UNIQUE, CHECK, DEFAULT y cambiar el nombre de la misma tabla.</p>

<p><strong>ALTER TABLE</strong>&nbsp;dispone de distintas cl&aacute;usulas para realizar las diferentes modificaciones a la tabla.</p>

<p><strong>CHANGE</strong></p>

<p>Permite modificar el nombre de una tabla y su tipo de dato</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] CHANGE
[campo_actual] [campo_nuevo] [tipo de dato]</code></pre>

<pre>
<code class="language-sql">ALTER TABLE usuarios CHANGE
nombre name VARCHAR(50)</code></pre>

<p><strong>ADD</strong></p>

<p>A&ntilde;ade un campo nuevo con la opci&oacute;n de incluir FIRST o AFTER que permite ubicar el nuevo campo en la tabla.</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] 
ADD [campo_nuevo] [tipo_de_dato] [opciones]</code></pre>

<pre>
<code class="language-sql">ALTER TABLE usuarios
ADD sexo VARCHAR(50) NOT NULL
AFTER edad
</code></pre>

<p><strong>DROP</strong></p>

<p>Sentencia que permite eliminar un campo. Si el campo pertenece a un &iacute;ndice se elimina del &iacute;ndice.</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] DROP COLUMN [campo]
</code></pre>

<pre>
<code class="language-sql">ALTER TABLE usuarios
DROP COLUMN sexo
</code></pre>

<p>Nota: No se puede recuperar la informaci&oacute;n eliminada con DROP.</p>

<p><strong>RENAME</strong></p>

<p>Permite cambiar el nombre de la tabla.</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] RENAME AS [nuevo_nombre_tabla]
</code></pre>

<pre>
<code class="language-sql">ALTER TABLE usuarios
RENAME AS users</code></pre>

<p><strong>EXPLAIN</strong>&nbsp;o&nbsp;<strong>SHOW COLUMNS</strong></p>

<p>Visualizaci&oacute;n de la estructura de la tabla</p>

<pre>
<code class="language-sql">EXPLAIN [tabla]
</code></pre>

<pre>
<code class="language-sql">SHOW COLUMNS FROM [tabla]
</code></pre>

<p><strong>ALTER SET DEFAULT</strong>&nbsp;Y&nbsp;<strong>ALTER DROP DEFAULT</strong></p>

<p>Establece un valor por defecto y elimina el valor por defecto respectivamente</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ALTER [campo]
SET DEFAULT [valor]</code></pre>

<p>Nota: Si el campo tiene un valor lo sustituye por el DEFAULT</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ALTER [campo]
DROP DEFAULT </code></pre>

<p>Nota: DROP DEFAULT no modifica los valores</p>

<p><strong>ADD INDEX</strong>&nbsp;y&nbsp;<strong>ADD UNIQUE</strong></p>

<p>A&ntilde;aden un &iacute;ndice a la tabla. ADD UNIQUE adem&aacute;s no permite duplicidad.</p>

<p>Si no se indica el valor, MySQL copia el nombre del primer campo,</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ADD INDEX
[tabla] [nombre_indice]([campo/s])</code></pre>

<p>(A&ntilde;adiendo &iacute;ndice &uacute;nico multicampo):</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] 
ADD UNIQUE INDEX [nombre_indice] [campo1, campo2]</code></pre>

<p>Nota: &Iacute;ndices tipo BLOB o TEXT deben contener el n&uacute;mero de caracteres.</p>

<p><strong>DROP INDEX</strong></p>

<p>Elimina un &iacute;ndice de una tabla</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] DROP INDEX [campo_indice]
</code></pre>

<p><strong>ADD PRIMARY KEY</strong></p>

<p>A&ntilde;ade una llave o clave primaria que identifica de forma &uacute;nica cada registro en la tabla.&nbsp;</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ADD PRIMARY KEY [][campo]
</code></pre>

<p>Nota: Una tabla solo puede tener una clave primaria, pero puede disponer de uno o varios campos. A trav&eacute;s de ALTER TABLE es necesario que el campo sea NOT NULL.</p>

<p><strong>DROP PRIMARY KEY</strong></p>

<p>Elimina una clave primaria de una tabla.</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] DROP PRIMARY KEY
</code></pre>

<p>Nota: Si la tabla no tiene clave primaria pero tiene m&aacute;s de un &iacute;ndice UNIQUE se elimina el primero que fue creado</p>

<p><strong>MODIFY</strong></p>

<p>Permite modificar el tipo de dato y las restricciones de un campo</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] MODIFY [campo] [tipo_de_dato] [restriccion]
</code></pre>

<pre>
<code class="language-sql">ALTER TABLE usuarios MODIFY nombre VARCHAR(100) NOT NULL
</code></pre>

<p><strong>ENGINE</strong></p>

<p>Permite cambiar de motor MySQL</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ENGINE = InnoDB
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/IUTpDdMJMGspnqD6Pqd4oSN0JN5GPzr4C7xE1eJs.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //31
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Optimización en MySQL',
            'slug' => 'optimizacion-en-mysql',
            'body_main' => 'Optimización, bloqueo y desbloqueo en una tabla con MySQL',
            'body_plus' => '<p><strong>MySQL</strong>&nbsp;permite optimizar una tabla reduciendo espacio de almacenamiento y aumentando la eficiencia de acceso a los datos. Es recomendable optimizar las tablas de forma peri&oacute;dica.</p>

<p><strong>OPTIMIZAR TABLA</strong></p>

<pre>
<code class="language-sql">OPTIMIZE TABLE [tabla]
</code></pre>

<p>BLOQUEAR Y DESBLOQUEAR TABLA</p>

<pre>
<code class="language-sql">LOCK TABLES [tabla] READ|WRITE 
</code></pre>

<pre>
<code class="language-sql">LOCK TABLES usuarios LOW_PRIORITY WRITE
</code></pre>

<pre>
<code class="language-sql">LOCK TABLES usuarios READ
</code></pre>

<pre>
<code class="language-sql">UNLOCK TABLES
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ekahgrRsc9CwM7MAHzLZanb2n9upK2g8EVY3cjdQ.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //32
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Índices en MySQL',
            'slug' => 'indices-en-mysql',
            'body_main' => 'Manejo de índices en MySQL',
            'body_plus' => '<p>Los &iacute;ndices en MySQL son referencias en forma de listas ordenadas que devuelven resultados de una consulta a una tabla de forma eficiente. Permiten devolver resultados de forma m&aacute;s r&aacute;pida, pero conllevan un espacio adicional en disco y un mayor tiempo de ejecuci&oacute;n con los comandos INSERT, UPDATE y DELETE, ya que tiene que actualizarse el registro de los &iacute;ndices.</p>

<p><strong>PRIMARY KEY</strong></p>

<p>Clave o llave primaria. Identifica de forma &uacute;nica la&nbsp; fila de una tabla. El valor tiene que ser &uacute;nico (como UNIQUE) pero solo puede existir una sola clave primaria en una tabla y no permite valores NULL.</p>

<p>Creando la tabla:</p>

<pre>
<code class="language-sql">CREATE TABLE [tabla](campo1,campo2...)
PRIMARY KEY ([campo1],[campo2]);</code></pre>

<p>Actualizando la tabla:</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ADD PRIMARY KEY ([campo1], [campo2])
</code></pre>

<p><strong>UNIQUE</strong></p>

<p>El tipo de &iacute;ndice unique es similar al &iacute;ndice normal pero a diferencia del normal es que su valor tiene que ser &uacute;nico (no permite duplicados).</p>

<p>Creando la tabla:</p>

<pre>
<code class="language-sql">CREATE TABLE [tabla]([campo1],[campo2]..)
UNIQUE [nombre_indice] (campo1,campo2...)</code></pre>

<p>Actualizando la tabla:</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ADD UNIQUE [nombre_indice] ([campo1],[campo2])
</code></pre>

<p><strong>INDEX</strong></p>

<p>El &iacute;ndice normal o no &uacute;nico permite crear &iacute;ndices(llaves)&nbsp; en una o varias columnas y su valor no tiene porque ser &uacute;nico.</p>

<p>&nbsp;</p>

<p>Creando la tabla:</p>

<pre>
<code class="language-sql">CREATE TABLE [tabla]([campo1],[campo2]..)
INDEX [nombre_indice] (campo1,campo2...)</code></pre>

<pre>
<code class="language-sql">CREATE UNIQUE INDEX [nombre_indice] ON [tabla]([campo1],[campo2])
</code></pre>

<p>Actualizando la tabla:</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ADD INDEX [nombre_indice] ([campo1],[campo2])
</code></pre>

<p><strong>FULL TEXT</strong></p>

<p>&Iacute;ndices espec&iacute;ficos para b&uacute;squedas de cadenas pero solo pueden realizarse en campos CHAR,VARCHAR Y TEXT.&nbsp;</p>

<pre>
<code class="language-sql">CREATE TABLE [tabla]([campo1],[campo2]..)
FULL TEXT [nombre_indice] (campo1,campo2...)</code></pre>

<pre>
<code class="language-sql">CREATE FULL TEXT INDEX [nombre_indice] ON [tabla](campo1,campo2...)
</code></pre>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ADD FULL TEXT [nombre_indice] ([campo1],[campo2])
</code></pre>

<p><strong>SPATIAL</strong></p>

<p>&Iacute;ndices espec&iacute;ficos para b&uacute;squedas de datos geom&eacute;tricos relacionados con el espacio(spatial).</p>

<p>Nota: FULL TEXT Y SPATIAL son solo soportados por InnoDB y MyISAM en MySQL 5.7</p>

<p><strong>PARCIALES</strong>:&nbsp;</p>

<p>&Iacute;ndices que usan parte de un campo CHAR O VARCHAR. Al usar menos caracteres los INSERT y UPDATE son m&aacute;s r&aacute;pidos.</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] ADD INDEX 
[nombre_indice](campo1(20), campo2(20))
</code></pre>

<p>Eliminar o cambiar &iacute;ndice: Para eliminar un INDEX, UNIQUE O FULL TEXT debemos indicar el nombre del &iacute;ndice.<br />
&nbsp;</p>

<pre>
<code class="language-sql">ALTER TABLE [tabla] DROP PRIMARY KEY
</code></pre>

<pre>
<code class="language-sql">ALTER TABLE [tabla] DROP INDEX [nombre_indice]
</code></pre>

<pre>
<code class="language-sql">DROP INDEX [nombre_indice] ON [tabla]
</code></pre>

<p>Mostrar &iacute;ndices de una tabla:</p>

<pre>
<code class="language-sql">SHOW KEYS FROM [tabla]
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/p1GcCI9ACXfRqpXxBFD3noZvfPJVkigimf70rimS.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //33
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Privilegios y Usuarios en MySQL',
            'slug' => 'privilegios-y-usuarios-en-mysql',
            'body_main' => 'Creación, edición y eliminación de usuarios y sus privilegios',
            'body_plus' => '<p>Los privilegios son permisos que determinan el tipo (alcance) de acceso de un usuario a las bases de datos (y su contenido).&nbsp; A continuaci&oacute;n se muestran los distintos tipos de privilegios.</p>

<p>&nbsp;</p>

<p>Tipos de privilegios:</p>

<p><strong>Globales</strong>:&nbsp;Se aplica a todas las bases de datos del servidor.&nbsp;</p>

<pre>
<code class="language-sql">ON *.*
</code></pre>

<p><strong>Base de datos</strong>:&nbsp;Se aplica a bases de datos.</p>

<pre>
<code class="language-sql">ON [basededatos].*
</code></pre>

<p><strong>Tabla</strong>: Se aplica a tablas.</p>

<pre>
<code class="language-sql">ON [basededatos].[tabla]
</code></pre>

<p><strong>Columna</strong>: Se aplica a columnas.</p>

<pre>
<code class="language-sql">[privilegio]([campo])
</code></pre>

<p><strong>Rutina</strong>: Se aplica a procedimientos almacenados.</p>

<p><strong>USUARIO</strong></p>

<p>Para crear un usuario es necesario crearlo mediante el comando&nbsp;<strong>CREATE USER</strong>&nbsp;para despu&eacute;s asignar privilegios al usuario.</p>

<p><strong>CREAR USUARIO</strong></p>

<pre>
<code class="language-sql">CREATE USER [usuario]@"localhost" IDENTIFIED BY "[contraseña]"
</code></pre>

<p><strong>MODIFICAR CONTRASE&Ntilde;A DE USUARIO</strong></p>

<pre>
<code class="language-sql">SET PASSWORD FOR [nombre_usuario] = PASSWORD("[nuevo contraseña]")
</code></pre>

<p><strong>ELIMINAR USUARIO</strong></p>

<p>Para eliminar un usuario MySQL dispone del comando&nbsp;<strong>DROP USER</strong>.</p>

<pre>
<code class="language-sql">DROP USER [usuario]
</code></pre>

<p>Nota: Es recomendable revocar los privilegios del usuario antes de eliminar el usuario.</p>

<p><strong>PRIVILEGIOS</strong></p>

<ul>
    <li>ALL: Todos los privilegios</li>
    <li>CREATE:&nbsp; &nbsp;Crear tablas.</li>
    <li>DELETE: Eliminar registros.</li>
    <li>DROP: Eliminar tablas.</li>
    <li>INSERT: Insertar registros.</li>
    <li>UPDATE: Actualizar registros.</li>
    <li>SELECT: Realizar consultas a las tablas.</li>
</ul>

<p>Nota: Los nombres de usuario est&aacute;n limitados a 16 caracteres, a diferencia de la contrase&ntilde;a que no tiene ning&uacute;n l&iacute;mite.</p>

<p><strong>MOSTRAR PRIVILEGIOS</strong></p>

<p>Mostrar los privilegios de un usuario</p>

<pre>
<code class="language-sql">SHOW GRANTS
</code></pre>

<p><strong>ASIGNAR PRIVILEGIOS A USUARIO:</strong></p>

<pre>
<code class="language-sql">GRANT [privilegio] (campo)
[privilegio] (campo)
ON [tabla]|*|*.*|[base_de_datos.*],
TO [usuario] IDENTIFIED BY ["contraseña"]
[usuario] IDENTIFIED BY ["contraseña"]
</code></pre>

<p><strong>ACTUALIZAR PRIVILEGIOS</strong></p>

<pre>
<code class="language-sql">FLUSH PRIVILEGES
</code></pre>

<p>Ejemplo asignando todos los privilegios:</p>

<pre>
<code class="language-sql">GRANT ALL PRIVILEGES ON [tabla]|*|*.*|[base_de_datos.*] TO "[usuario]"@"localhost"
</code></pre>

<p>Ejemplo asignando un privilegio determinado:</p>

<pre>
<code class="language-sql">GRANT SELECT ON usuarios TO manel
</code></pre>

<p><strong>REVOCAR PRIVILEGIOS</strong></p>

<p>Para poder revocar un privilegio asignado hacemos uso del comando&nbsp;REVOKE</p>

<pre>
<code class="language-sql">REVOKE [privilegio]([campo])
[privilegio]([campo])
ON [tabla|*|*.*|[basededatos.*],
FROM [usuario],[usuario2]</code></pre>

<p>Ejemplo&nbsp; de revoque de privilegios INSERT Y UPDATE en todas las tablas de la base de datos blogdb para el usuario manel.</p>

<pre>
<code class="language-sql">REVOKE INSERT,UPDATE ON 
blogdb.* FROM manel</code></pre>

<p><strong>L&Iacute;MITES AL USUARIO</strong></p>

<p>MySQL dispone de varias opciones para poder limitar acciones al usuario</p>

<ul>
    <li>MAX QUERIES PER HOUR</li>
    <li>MAX UPDATES PER HOUR</li>
    <li>MAX CONNECTIONS PER HOUR</li>
    <li>MAX USER_CONNECTIONS</li>
</ul>

<pre>
<code class="language-sql">GRANT ALL ON [basedatos.*] TO [usuario]@"localhost"
IDENTIFIED BY "contraseña"
WITH MAX_QUERIES_PER_HOUR 100
MAX_UPDATE_PER_HOUR 50
MAX_CONNECTIONES_PER_HOUR 20
MAX_USER_CONNECTIONES 5</code></pre>

<p>Para poder modificar l&iacute;mites ya establecidos:</p>

<pre>
<code class="language-sql">GRANT USAGE ON [basedatos.*] TO [usuario]@"localhost"
WITH MAX_QUERIES_PER_HOUR 50
MAX_UPDATE_PER_HOUR 30
MAX_CONNECTIONES_PER_HOUR 10
MAX_USER_CONNECTIONES 3</code></pre>

<p>Para reiniciar los distintos l&iacute;mites:</p>

<pre>
<code class="language-sql">GRANT USAGE ON [basedatos.*] TO [usuario]@"localhost"
WITH MAX_QUERIES_PER_HOUR 10</code></pre>

<p>Para reinciar todos los l&iacute;mites(2 comandos):</p>

<pre>
<code class="language-sql">FLUSH USER_RESOURCES
</code></pre>

<p>O recargando los privilegios de las tablas</p>

<pre>
<code class="language-sql">FLUSH PRIVILEGES
</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/qpXR07v2WfZo5kzVkdOCHSuGILgctNW2Arkh34fA.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //34
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Procedimientos almacenados en MySQL',
            'slug' => 'procedimientos-almacenados-en-mysql',
            'body_main' => 'Creación de procedimientos almacenados en MySQL',
            'body_plus' => '<p>Los procedimientos almacenados son programas que se almacenan en una tabla dentro del sistema de base de datos, con un lenguaje compilado. Realizan todas las comprobaciones de seguridad y devuelven los datos necesarios. De esta forma MySQL puede ser m&aacute;s r&aacute;pido que ning&uacute;n lenguaje del servidor y permite realizar las comprobaciones sin tener que volver a realizar otra conexi&oacute;n. Se recomienda hacer uso de procedimientos almacenados en aplicaciones que manejan un gran n&uacute;mero de peticiones.</p>

<p>Para acceder a los procedimientos almacenados&nbsp; en versiones anteriores de apache es necesario activar la librer&iacute;a php_mysqli.dll. Para ello se edita php.ini y se descomenta la l&iacute;nea correspondiente a la extensi&oacute;n eliminando el &quot;;&quot; al comienzo:</p>

<pre>
<code class="language-bash">;extension=php_exif.dll      ; Must be after mbstring as it depends on it
extension=php_mysqli.dll
;extension=php_oci8_12c.dll  ; Use with Oracle Database 12c Instant Clien</code></pre>

<p><strong>PROCEDIMIENTOS ALMACENADOS</strong></p>

<pre>
<code class="language-sql">CREATE PROCEDURE listar_usuarios()
BEGIN
SELECT * FROM usuarios;
END;</code></pre>

<pre>
<code class="language-sql">CREATE PROCEDURE listar_usuarios()
SELECT * FROM usuarios;
</code></pre>

<p>Nota: En PhpMyAdmin con MARIADB pueden existir incompatibilidades con BEGIN y END.</p>

<pre>
<code class="language-sql">CREATE PROCEDURE insertar_usuario(IN nombre varchar (100), IN edad varchar (10))
BEGIN
if edad &lt; 18 then
    insert into ninos
    values (null, nombre,edad);
else
    insert into mayores
    values(null,nombre,edad);
end if;
END;</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/3Fk9Lim12hgeb5rlpfMbbR06Qjw7sewCxCmvyEQl.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //35
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Callbacks',
            'slug' => 'callbacks',
            'body_main' => 'Funcionamiento básico de los callbacks o retrollamadas en Javascript',
            'body_plus' => '<p>Los callbacks&nbsp; son funciones que se pasan como par&aacute;metro a otra funci&oacute;n y se ejecutan dentro de &eacute;sta &uacute;ltima. Pueden ser muy &uacute;tiles para evitar la repetici&oacute;n de c&oacute;digo y el manejo de funciones de manera s&iacute;ncrona.</p>

<p>Ejemplo de un callback b&aacute;sico:</p>

<pre>
<code class="language-javascript">function suma(num1,num2)
{
    return num1 + num2;
}
function resta(num1,num2)
{
    return num1 - num2;
}
function multiplicacion(num1,num2)
{
    return num1 * num2;
}
function division(num1,num2)
{
    return num1 / num2;
}

function calculadora(cuenta,num1,num2)
{
    return cuenta(num1,num2);
}</code></pre>

<p>El c&oacute;digo de arriba est&aacute; compuesto por varios m&eacute;todos que realizan una operaci&oacute;n aritm&eacute;tica. La funci&oacute;n calculadora representa la funci&oacute;n principal mientras que los otros cuatro m&eacute;todos representan los callbacks. Sustituyendo el par&aacute;metro&nbsp;<strong>cuenta</strong>&nbsp;de la funci&oacute;n calculadora por alguno de los callbacks realizar&aacute; la operaci&oacute;n correspondiente al callback indicado.</p>

<pre>
<code class="language-javascript">calculadora(suma,3,5);
//8
calculadora(resta,5,3);
//2
calculadora(multiplicacion,3,5)
//15
calculadora(division,15,3)
//5</code></pre>

<p>La funci&oacute;n que se realiza en un evento tambi&eacute;n es un callback.</p>

<p>Ejemplo de callback en un evento clic:</p>

<pre>
<code class="language-javascript">var boton= document.getElementById("boton");
boton.addEventListener("click", function(event)
{
    console.log(" Callback ");
});</code></pre>

<p><strong>SUCESI&Oacute;N DE CALLBACKS</strong></p>

<p>Los callbacks permiten ejecutar funciones de forma s&iacute;ncrona. A continuaci&oacute;n se muestra un ejemplo de una sucesi&oacute;n de callbacks manejada de forma s&iacute;ncrona.</p>

<p>index.html</p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0"&gt;
    &lt;title&gt;Callbacks&lt;/title&gt;
    
    &lt;/head&gt;
    &lt;body&gt;
        &lt;div id="myContent"&gt;&lt;/div&gt;
        &lt;button id="btn"&gt;Ejecutar&lt;/button&gt;
        &lt;script src="callback.js"&gt;&lt;/script&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>callbacks.js</p>

<pre>
<code class="language-javascript">const setText = data =&gt; {
    myContent.textContent = data;
}
const getData = callback =&gt; {
    setText("Solicitando autorización");
    setTimeout(() =&gt; {
        callback(true); 
    },2000);
}
const showData = callback =&gt; {
    setText("Esperando a mostrar la información");
    setTimeout(() =&gt; {
        callback({name:"Carol"});   
    },2000);
}
btn.addEventListener("click", () =&gt;{
    getData(authorization =&gt; {
        if(authorization) {
            showData(user =&gt; {
                setText(user.name);
            })
        }
    });
});</code></pre>

<p><strong>PROMESAS</strong></p>

<p>Javascript de forma nativa realiza llamadas de forma as&iacute;ncrona. Esto puede generar errores a la hora de realizar varios m&eacute;todos, ya que es posible que el resultado de los m&eacute;todos se obtenga de forma desordenada, es decir, que el resultado de un m&eacute;todo sea devuelto antes que un m&eacute;todo llamado anteriormente. Las promesas evitan este tipo de errores y permiten realizar una serie de funciones de forma s&iacute;ncrona, como tambi&eacute;n cierta dependencia entre ellas. Esta dependencia es realmente &uacute;til cuando en una sucesi&oacute;n de m&eacute;todos uno de ellos necesita el resultado de un m&eacute;todo anterior.</p>

<p>El objeto&nbsp;<strong>Promise</strong>&nbsp;trae una funci&oacute;n con dos par&aacute;metros ( resolve y reject), estos dos par&aacute;metros representan la resoluci&oacute;n o el fracaso de dicha promesa. Si la promesa es resuelta satisfactoriamente continuar&aacute; con el proceso, por el contrario si la promesa no es resuelta se detendr&aacute;.</p>

<pre>
<code class="language-javascript">new Promise( function(resolve,reject){
});</code></pre>

<p>Continuando con los ejemplos anteriores de callbacks se puede observar en el c&oacute;digo siguiente como se a&ntilde;ade la promesa y se sustituyen los callbacks.&nbsp;</p>

<p>promesas.js</p>

<pre>
<code class="language-javascript">const setText = data =&gt; {
    myContent.textContent = data;
}
const getData = () =&gt; {
    return new Promise((resolve,reject) =&gt;{
        setText("Solicitando autorización");
        setTimeout(() =&gt; {
            resolve(true);  
        },2000);
    });
}
const showData = () =&gt; {
    return new Promise((resolve,reject) =&gt; {
        setText("Esperando a mostrar la información");
        setTimeout(() =&gt; {
            resolve({name:"Carol"});    
        },2000);
    });
}
btn.addEventListener("click", () =&gt;{
    getData().then(authorization =&gt; {
        if(authorization) {
            showData().then(user =&gt; {
                setText(user.name);
            });
        }
    });
});</code></pre>

<p>Tanto el m&eacute;todo getData como el m&eacute;todo showData ahora devuelven un objeto Promise. Por tanto, al activarse el evento del bot&oacute;n, las llamadas a estos m&eacute;todos cuando devuelven este objeto Promise trae consigo el m&eacute;todo&nbsp;<strong>then</strong>&nbsp;que permite continuar con el proceso o con otra promesa si &eacute;sta es resuelta. Para poder aprovechar al m&aacute;ximo el objeto Promise y plasmar un c&oacute;digo mucho m&aacute;s f&aacute;cil de leer se puede simplificar aprovechando que el m&eacute;todo invocado devuelve una promesa y mediante&nbsp;<strong>return</strong>&nbsp;y&nbsp;<strong>then</strong>&nbsp;poder subir un nivel&nbsp; y continuar con el proceso. A pesar de la sencillez y de que solo son dos concatenaciones la comparaci&oacute;n del c&oacute;digo siguiente con el de m&aacute;s arriba muestra un c&oacute;digo m&aacute;s limpio y m&aacute;s legible.</p>

<pre>
<code class="language-javascript">btn.addEventListener("click", () =&gt;{
    getData().then(authorization =&gt; {
        if(authorization) {
            return showData()
    }
    }).then(user =&gt; {
        setText(user.name);
    });
});</code></pre>

<p><strong>ASYNC Y AWAIT</strong></p>

<p>Con&nbsp;<strong>Async</strong>&nbsp;y&nbsp;<strong>Await</strong>&nbsp;es posible mejorar todav&iacute;a m&aacute;s el c&oacute;digo en una sucesi&oacute;n de promesas. Permiten prescindir del m&eacute;todo then y obtener un c&oacute;digo al mismo nivel. Es necesario a&ntilde;adir la palabra reservada async antes de la funci&oacute;n y justo antes de cada promesa a&ntilde;adir la palabra reservada await.</p>

<pre>
<code class="language-javascript">btn.addEventListener("click", async () =&gt;{
    let user =null;
    const authorization = await getData();
        if(authorization) {
            user= await showData();  
    }
        setText(user.name);
});</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/N2hkoHvcZvBKwjAcXutflU9OEClxRiOle7znFDAj.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        //36
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'TypeScript',
            'slug' => 'typescript',
            'body_main' => 'TypeScript el superset de Javascript',
            'body_plus' => '<p><strong>TypeScript</strong>&nbsp;es un lenguaje tipado, open-source y desarrollado y mantenido por Microsoft.&nbsp;Denominado como&nbsp;un superset de Javascript, ya que est&aacute; basado en Javascript (la mayor parte es Javascript), necesita ser compilado y dispone de las &uacute;ltimas actualizaciones de Javascript. Est&aacute; soportado por cualquier navegador, cualquier host y cualquier sistema operativo. Los archivos&nbsp;<strong>TypeScript</strong>&nbsp;se identifican por la extensi&oacute;n&nbsp;.ts.</p>

<p>Para la instalaci&oacute;n de&nbsp;<strong>TypeScript</strong>&nbsp;es necesario tener instalado node.js&nbsp;y npm. Para instalar node.js es posible instalarlo desde los repositorios o descargar el paquete desde&nbsp;//nodejs.org/es/.</p>

<p><strong>INSTALAR NPM Y NODEJS</strong></p>

<pre>
<code class="language-bash">apt install npm
apt install node.js</code></pre>

<p><strong>INSTALAR TYPESCRIPT</strong></p>

<pre>
<code class="language-bash">npm install -g typescript
</code></pre>

<p><strong>MOSTRAR VERSION DE TYPESCRIPT</strong></p>

<pre>
<code class="language-bash">tsc --version
</code></pre>

<p><strong>CREAR PROYECTO TYPESCRIPT</strong></p>

<p>Para crear un proyecto&nbsp;<strong>Typescript</strong>&nbsp;es necesario generar un directorio con el nombre del proyecto y desde dentro del directorio se hace la llamada al comando tsc seguido de la opci&oacute;n init</p>

<pre>
<code class="language-bash">mkdir [nombre proyecto]
cd [nombre proyecto]
tsc --init</code></pre>

<p>Con esta opci&oacute;n se origina el archivo de configuraci&oacute;n del proyecto &quot;tsconfig.json&quot;.&nbsp;</p>

<pre>
<code class="language-javascript">{
  "compilerOptions": {
    /* Basic Options */
    "target": "es5",                          /* Specify ECMAScript target version: "ES3" (default), "ES5", "ES2015", "ES2016", "ES2017","ES2018" or "ESNEXT". */
    "module": "commonjs",                     /* Specify module code generation: "none", "commonjs", "amd", "system", "umd", "es2015", or "ESNext". */   
    "strict": true,                           /* Enable all strict type-checking options. */   
  }  
}</code></pre>

<p><strong>COMPILAR ARCHIVO TYPESCRIPT</strong></p>

<pre>
<code class="language-bash">tsc [ruta/archivo.ts]
</code></pre>

<p>Tambi&eacute;n es posible compilar m&uacute;ltiples archivos incluyendo la ruta de los archivos en el archivo de configuraci&oacute;n tsconfig.json.</p>

<pre>
<code class="language-javascript">{
  "compilerOptions": {
    /* Basic Options */
    "target": "es5",                          /* Specify ECMAScript target version: "ES3" (default), "ES5", "ES2015", "ES2016", "ES2017","ES2018" or "ESNEXT". */
    "module": "commonjs",                     /* Specify module code generation: "none", "commonjs", "amd", "system", "umd", "es2015", or "ESNext". */   
    "strict": true,                           /* Enable all strict type-checking options. */       
    "outDir":"./dist",
  },
  "include":[
    "./src/**/*.ts"
  ]
}</code></pre>

<p>Para compilar&nbsp; varios archivos, tal como se puede observar en el c&oacute;digo de arriba se a&ntilde;ade un &quot;include&quot; al final del archivo y los archivos que se requieren incluir. En el ejemplo se ha a&ntilde;adido (mediante asteriscos) todos los archivos typescript que se encuentren en alg&uacute;n subdirectorio del directorio src (creado para tal fin). Adem&aacute;s se ha a&ntilde;adido la ruta de salida con la propiedad outDir que es donde typescript crea un archivo con extensi&oacute;n js con el resultado de la compilaci&oacute;n.</p>

<p><strong>VARIABLES EN TYPESCRIPT</strong></p>

<p><strong>TypeScript</strong>,&nbsp; a diferencia de Javascript&nbsp; es un lenguaje tipado. Al declarar una variable se debe o se recomienda indicar el tipo de dato de esa variable.</p>

<pre>
<code class="language-javascript">let usuario:string = "Manolo";
let edad:number= 33;
</code></pre>

<p>Para almacenar cadenas multil&iacute;nea, (una funci&oacute;n implementada en ES6 llamada plantilla de cadenas de texto) que no son otra cosa que cadenas con varias l&iacute;neas de texto que permiten a&ntilde;adir expresiones incrustadas, mediante el uso de los backticks (comillas en forma de tilde invertida).</p>

<pre>
<code class="language-javascript">let linea:string = "línea3"; 

let cadena:string = `
    Cadena línea1
   Cadena línea2
Cadena ${linea}  //expresión incrustada
`;</code></pre>

<p>En&nbsp;<strong>TypeScript</strong>&nbsp;existe un tipo de dato llamado any que permite almacenar cualquier tipo de dato, aunque se considera una pr&aacute;ctica poco recomendable</p>

<pre>
<code class="language-javascript">let usuario:any = "Javier";
let edad:any = 55;
let moderador:any = false;</code></pre>

<p>Adem&aacute;s de let y var, al igual que Javascript, TypeScript tambi&eacute;n utiliza la constante const, la cual no es modificable</p>

<pre>
<code class="language-javascript">const edad = 69;
edad = 65;    //error, no se puede modificar el valor de una constante</code></pre>

<p><strong>ARRAYS EN TYPESCRIPT</strong></p>

<p>Definir un array en&nbsp;<strong>TypeScript</strong>&nbsp;es posible, como en otros lenguajes,&nbsp;a&ntilde;adiendo corchetes,&nbsp; sin embargo, existe otra alternativa a&ntilde;adiendo la palabra reservada Array seguida del tipo de dato encerrada entre guiones</p>

<pre>
<code class="language-javascript">let lista:number[] = [1,5,10,15,20];
let lista2:string[] = [1,5,10,15,20];
let lista3:Array&lt;string&gt;= ["pan", "naranja", "espinacas"];</code></pre>

<p><strong>ENUM</strong></p>

<pre>
<code class="language-javascript">enum DiaOcupado {SABADO, DOMINGO};
enum DiaDisponible {LUNES, MARTES, MIERCOLES, JUEVES, VIERNES};
let trabajo: DiaDisponible;
trabajo = DiaDisponible.LUNES;
console.log(trabajo);           //0
console.log(DiaDisponible[0]);  //LUNES</code></pre>

<p><strong>OBJETOS</strong></p>

<p>Los objetos en TypeScript, al igual que las variables, disponen del tipo de dato any que permite asignarle cualquier valor, como tambi&eacute;n es posible crear objetos constantes.</p>

<pre>
<code class="language-javascript">let usuario:any = 
{
    nombre: "Oriol",
    edad: 35,
    sexo: "H"
}</code></pre>

<p>Por convenci&oacute;n el nombre de las constantes deben ir en may&uacute;sculas</p>

<pre>
<code class="language-javascript">const USUARIO:any
{
    nombre: "Oriol",
    edad: 35,
    sexo: "H"
}</code></pre>

<p>No es posible cambiar el valor del objeto constante creando un nuevo objeto</p>

<pre>
<code class="language-javascript">const USUARIO:any;
USUARIO:
{
    nombre: "Oriol",
    edad: 35,
    sexo: "H"
}
USUARIO:
{
    nombre: "Manuel",
    edad: 33
    sexo: "H"
}
//error</code></pre>

<p>En cambio si es posible cambiar el valor modificando las propiedades al objeto.</p>

<pre>
<code class="language-javascript">const USUARIO:any;
USUARIO:
{
    nombre: "Oriol",
    edad: 35,
    sexo: "H"
}
USUARIO.nombre= "Manuel";
USUARIO.edad = 33;</code></pre>

<p><strong>FUNCIONES</strong></p>

<p>Las funciones en&nbsp;<strong>TypeScript</strong>&nbsp;son iguales que las de Javascript, pero como en el caso de las variables se debe especificar el tipo de dato de los par&aacute;metros y si la funci&oacute;n devuelve o no un resultado y en el caso de que la funci&oacute;n devuelva resultado se debe indicar el tipo de dato que devuelve.</p>

<pre>
<code class="language-javascript">function bienvenido(data:string):void
{
    console.log("bienvenido: ", data);
}</code></pre>

<p>La funci&oacute;n bienvenido va acompa&ntilde;ada de la palabra reservada void que indica que no devuelve ning&uacute;n resultado (procedimiento).</p>

<p><strong>ACTUALIZAR TYPESCRIPT</strong></p>

<pre>
<code class="language-bash">npm update -g typescript@latest
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/1NToYtDLVPVbUXIhBCrkjjkTRUNsGgyol4vXyBKA.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        //37
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Diferencia entre función, procedimiento, clase y método',
            'slug' => 'diferencia-entre-funcion-procedimiento-clase-y-metodo',
            'body_main' => 'Diferencia entre función, procedimiento, clase y método',
            'body_plus' => '<p>Procedimiento: Es un conjunto de instrucciones que cumplen una tarea</p>

<p>Funci&oacute;n: Como un procedimiento pero retorna un valor</p>

<p>Clase: Concepto de programaci&oacute;n orientada a objetos, es una forma de encapsular funcionalidad, contiene campos y m&eacute;todos.</p>

<p>M&eacute;todo: Puede ser un procedimiento o una funci&oacute;n, la diferencia es que le pertenece a una clase.</p>

<p>fuente:&nbsp;//es.stackoverflow.com/questions/7403/diferencias-entre-m%C3%A9todos-procedimiento-funci%C3%B3n-para-que-sirven-cada-uno-y-co</p>
',          
            'user_id' => 1,
            'status' => 'DRAFT',
            'file' => 'NULL'

        ]);
        
        //38
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Angular y Angular CLI',
            'slug' => 'angular-y-angular-cli',
            'body_main' => 'Framework basado en TypeScript',
            'body_plus' => '<p>Angular&nbsp;es un potente&nbsp;framework,&nbsp;basado en el lenguaje TypeScript, mantenido por Google y modificado desde una versi&oacute;n anterior nombrada AngularJS. Se basa en m&oacute;dulos y componentes que junto al sistema de imports (importaci&oacute;n de m&oacute;dulos) permite crear proyectos con una estructura ordenada y limpia evitando el conocido &quot;c&oacute;digo espagueti&quot;. Orientado en el modelo MVC (modelo-vista-controlador) permite distinguir de forma clara el Front-End del Back-End. Angular es un proyecto escalable, flexible y de c&oacute;digo abierto y se ha convertido en uno de los frameworks m&aacute;s populares de los &uacute;ltimos tiempos.</p>

<p><strong>ANGULAR CLI</strong></p>

<p><strong>Angular CLI</strong>&nbsp; (Command Line Interface) es una herramienta del propio Angular que permite&nbsp; crear el &aacute;rbol de directorios y archivos necesarios&nbsp;(scaffolding)&nbsp;para un nuevo proyecto Angular, esto se hace a trav&eacute;s de una linea de comandos.&nbsp;</p>

<p>En caso de no disponer de NodeJS es necesario instalarlo</p>

<p><strong>INSTALAR NODEJS</strong></p>

<pre>
<code class="language-bash">apt install nodejs
</code></pre>

<p><strong>INSTALAR ANGULAR CLI</strong></p>

<pre>
<code class="language-bash">npm install -g @angular/cli
</code></pre>

<p><strong>DESINSTALAR ANGULAR CLI</strong></p>

<pre>
<code class="language-bash">npm uninstall -g @angular/cli
</code></pre>

<pre>
<code class="language-bash">npm cache clear --force
</code></pre>

<p><strong>CREAR PROYECTO ANGULAR</strong></p>

<pre>
<code class="language-bash">ng new [nombre_proyecto] --[opcion]
</code></pre>

<p>Ver opciones:&nbsp;</p>

<pre>
<code class="language-bash">ng --help
</code></pre>

<pre>
<code class="language-bash">ng new --help
</code></pre>

<p>Ejemplo de creaci&oacute;n de un proyecto</p>

<pre>
<code class="language-bash">ng new preproyecto-angular --prefix pre --style scss --skip-install
</code></pre>

<p><strong>PREVIEW (Modo Desarrollo)</strong></p>

<pre>
<code class="language-bash">ng serve
</code></pre>

<p>El comando ng serve de Angular crea un servidor local que permite mostrar la aplicaci&oacute;n en modo de prueba.</p>

<pre>
<code class="language-bash">ng serve -o
</code></pre>

<pre>
<code class="language-bash">ng serve --port 4500
</code></pre>

<pre>
<code class="language-bash">ng serve --prod
</code></pre>

<p>La opci&oacute;n &quot;-o&quot; o &quot;--open&quot; ejecuta la aplicaci&oacute;n en modo de prueba autom&aacute;ticamente en el navegador predeterminado del sistema, con el &quot;--port&quot; permite especificar el puerto del servidor local. La opci&oacute;n &quot;--prod&quot; optimiza el c&oacute;digo del proyecto.</p>

<p><strong>CONSTRUCCI&Oacute;N DE UN PROYECTO ANGULAR</strong></p>

<pre>
<code class="language-bash">ng build
</code></pre>

<p>Para desplegar el proyecto al usuario final se puede hacer uso de &quot;build&quot; que crea un directorio en la ra&iacute;z nombrado &quot;dist/nombre_del_proyecto/&quot;&nbsp; que contiene todos los archivos necesarios para poder ejecutar la aplicaci&oacute;n en un servidor.</p>

<pre>
<code class="language-bash">ng build --prod
</code></pre>

<p>La opci&oacute;n &quot;prod&quot; optimiza el c&oacute;digo eliminando espacios y acortando variables y el llamado &quot;tree shaking&quot; que excluye import y export est&aacute;ticos de m&oacute;dulos EcmaScript que no necesita el proyecto.</p>

<p><strong>PROYECTO ANGULAR EN APACHE</strong></p>

<p>Una vez construido el proyecto con build es posible comprobar la aplicaci&oacute;n final en apache en el puerto 8080</p>

<pre>
<code class="language-bash">http-server dist/nombreproyecto
</code></pre>

<p><strong>PRUEBAS CON KARMA (UNIT TESTS Y E2E TESTS)</strong></p>

<p>Angular provee de una herramienta basada en Javascript llamada Karma.js. Karma permite ejecutar en el navegador tests del proyecto y mantenerlos activos para realizar comprobaciones cada vez que se actualiza el proyecto.</p>

<p><strong>UNIT TESTS</strong></p>

<p>Las pruebas unitarias comprueban peque&ntilde;os m&oacute;dulos de forma independiente que permiten encontrar f&aacute;cilmente las l&iacute;neas de error, son muy r&aacute;pidas y funcionan siempre.</p>

<pre>
<code class="language-bash">ng test
</code></pre>

<p><strong>E2E TESTS (END TO END)</strong></p>

<p>&nbsp;</p>

<p>Las pruebas extremo a extremo son &uacute;tiles para ciertos tipos de errores pero no identifica las l&iacute;neas de c&oacute;digo err&oacute;neas, son m&aacute;s lentas ya que necesitan recorrer todo el c&oacute;digo y fallan en caso de cualquier fallo.( por ejemplo el caso de un componente externo).</p>

<pre>
<code class="language-bash">ng e2e
</code></pre>

<p>Nota:&nbsp; Es necesario tener node.js instalado para disponer de Karma.&nbsp;</p>

<p><strong>CREAR UN BLOQUE ANGULAR</strong></p>

<p>Angular Cli permite crear una serie de bloques &quot;Angular&quot; ya predefinidos (m&oacute;dulos, interfaces, componentes,etc...)</p>

<pre>
<code class="language-bash">ng generate [bloque] [nombre_bloque] [--opciones] 
</code></pre>

<p>Ejemplo de creaci&oacute;n de un componente</p>

<pre>
<code class="language-bash">ng generate component /users/user --module app
</code></pre>

<p>Mismo ejemplo de forma abreviada</p>

<pre>
<code class="language-bash">ng g c /users/user --module app
</code></pre>

<p>Bloques disponibles en Angular Cli:</p>

<ul>
    <li>appShell</li>
    <li>application</li>
    <li>class</li>
    <li>component</li>
    <li>directive</li>
    <li>enum</li>
    <li>guard</li>
    <li>interface</li>
    <li>library</li>
    <li>module</li>
    <li>pipe</li>
    <li>service</li>
    <li>serviceWorker</li>
    <li>universal</li>
</ul>

<p><strong>CREAR M&Oacute;DULO ANGULAR</strong></p>

<pre>
<code class="language-bash">ng generate module material --module app
</code></pre>

<p><strong>CREAR COMPONENTE ANGULAR</strong></p>

<pre>
<code class="language-bash">ng generate component material/compprueba --module material
</code></pre>

<p>Al crear un m&oacute;dulo, Angular crea un directorio con el nombre indicado y dentro un archivo typescript (extensi&oacute;n .ts) con el sufijo &quot;.module&quot; La opci&oacute;n &quot;--module&quot; relaciona el m&oacute;dulo a crear (nombrado material) con el m&oacute;dulo principal (app). En el caso de un componente, Angular crea un directorio con el nombre indicado y dentro cuatro archivos con el sufijo &quot;.component&quot; y su extensi&oacute;n html, css, ts, spec.ts respectivamente. Se puede indicar el lugar a crear a&ntilde;adiendo la ruta al nombre. La opci&oacute;n &quot;--module&quot; relaciona el componente a crear(compprueba) con el m&oacute;dulo indicado (material).</p>

<p>Para que el anterior componente sea din&aacute;mico en Angular, es suficiente con a&ntilde;adir las siguientes l&iacute;neas al archivo app-routing.module.ts</p>

<pre>
<code class="language-javascript">import { ComppruebaComponent } from "./material/compprueba/compprueba.component";
const routes: Routes = [
  {
    path: "compprueba",
    component: ComppruebaComponent,
  }
];</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/gAAiuq4HV2ZXVth3xalTJKLr9M1XEP9onolxVBan.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //39
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Errores Angular',
            'slug' => 'errores-angular',
            'body_main' => 'Distintos errores en Angular',
            'body_plus' => '<p><strong>ERROR TS1005</strong></p>

<pre>
<code class="language-bash">ERROR in node_modules/rxjs/internal/types.d.ts(81,44): error TS1005: ;
</code></pre>

<p>El error TS1005 es posible solventarlo actualizando Angular.</p>

<p><strong>ACTUALIZAR ANGULAR A NIVEL GLOBAL</strong></p>

<pre>
<code class="language-bash">npm install -g @angular/cli
</code></pre>

<p><strong>ACTUALIZAR ANGULAR-CLI Y ANGULAR-CORE</strong></p>

<pre>
<code class="language-bash">ng update @angular/cli 
ng update @angular/core</code></pre>

<p><strong>ACTUALIZAR DEPENDENCIAS</strong></p>

<pre>
<code class="language-bash">ng update
</code></pre>

<p><strong>ERROR VERSI&Oacute;N ANGULAR-CLI</strong></p>

<pre>
<code class="language-bash">Your global Angular CLI version (7.3.9) is greater than your local
version (6.0.8). The local Angular CLI version is used.</code></pre>

<p>El error de versi&oacute;n de Angular indica que la versi&oacute;n de Angular CLI del sistema es m&aacute;s moderna que la versi&oacute;n local. Para solucionarlo se actualiza Angular de forma local.</p>

<p><strong>INSTALAR LA &Uacute;LTIMA VERSI&Oacute;N ANGULAR-CLI</strong></p>

<pre>
<code class="language-bash">npm install --save-dev @angular/cli@latest
</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/mRUleZ1P8XyPFScYAn20xLJNK35vu4vkbgTQGiMW.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);

        //40
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Angular Material',
            'slug' => 'angular-material',
            'body_main' => 'Angular Material',
            'body_plus' => '<p>Angular Material&nbsp;es un conjunto de m&oacute;dulos y componentes que facilita el desarrollo de un proyecto Angular. Proporciona distintos tipos de componentes testeados y desarrollados por el equipo de Angular y dispone de componentes y m&oacute;dulos que, una vez implementados facilitan la reutilizaci&oacute;n de c&oacute;digo y se comportan correctamente en las distintas resoluciones. Para la instalaci&oacute;n de Angular Material es necesario instalar las dependencias, importar el m&oacute;dulo BrowserAnimationsModule y a&ntilde;adir los estilos.</p>

<p><strong>INSTALAR ANGULAR MATERIAL</strong></p>

<pre>
<code class="language-bash">npm install @angular/material @angular/cdk --save
npm install @angular/animations --save
</code></pre>

<p>Importar m&oacute;dulo BrowserAnimationsModule en app.module.ts</p>

<pre>
<code class="language-javascript">import { BrowserModule } from "@angular/platform-browser";
import { NgModule } from "@angular/core";
import {BrowserAnimationsModule} from "@angular/platform-browser/animations";
import { AppComponent } from "./app.component";

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }</code></pre>

<p>A&ntilde;adir estilos de iconos con Angular Material&nbsp;</p>

<p>A&ntilde;adiendo enlace externo de estilos en index.html de Material Icons</p>

<pre>
<code class="language-html">&lt;!doctype html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="utf-8"&gt;
  &lt;title&gt;Edproyecto&lt;/title&gt;
  &lt;base href="/"&gt;
  &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
  &lt;link rel="icon" type="image/x-icon" href="favicon.ico"&gt;
  &lt;link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;ed-root&gt;&lt;/ed-root&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Edproyecto</p>

<p>A&ntilde;adir tema en styles.css</p>

<pre>
<code class="language-javascript">/*@import "~@angular/material/prebuilt-themes/indigo-pink.css";*/
@import "~@angular/material/prebuilt-themes/deeppurple-amber.css";</code></pre>

<p>A continuaci&oacute;n se definen distintos m&oacute;dulos de Angular Material.</p>

<p><strong>MATTOOLBAR</strong></p>

<p>El m&oacute;dulo MatToolbar es un m&oacute;dulo Angular que permite insertar una barra de herramientas con un conjunto de caracter&iacute;sticas que ofrece Angular Material. Para poder disponer del m&oacute;dulo solo es necesario importar el m&oacute;dulo correspondiente, tal como se muestra en el siguiente c&oacute;digo.</p>

<pre>
<code class="language-javascript">import  {MatToolbarModule } from "@angular/material";
@NgModule({
  imports: [    MatToolbarModule ],
  declarations: [  ],
  exports: [ MatToolbarModule ]
})
export class MaterialModule { }</code></pre>

<p>Para poder instanciar un MatToolbar es necesario indicar el selector correspondiente desde el componente Angular.</p>

<p>Ejemplo: material.module.ts</p>

<pre>
<code class="language-javascript">import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import {BrowserModule} from "@angular/platform-browser";
import  {MatToolbarModule } from "@angular/material";
@NgModule({
  imports: [
    CommonModule,MatToolbarModule
  ],
 declarations: [  ],
  exports: [MatToolbarModule ]
})
export class MaterialModule { }</code></pre>

<p>Ejemplo: app.component.html</p>

<pre>
<code class="language-html">&lt;mat-toolbar color="primary"&gt;  
  &lt;span&gt;Angular&lt;/span&gt;
&lt;/mat-toolbar&gt;
&lt;router-outlet&gt;&lt;/router-outlet&gt;</code></pre>

<p><strong>MATBUTTON Y MATICON</strong></p>

<p>MatButton y MatIcon son m&oacute;dulos Angular, uno para botones y otro para iconos. De la misma manera que MatToolbar, es necesario a&ntilde;adir al m&oacute;dulo las lineas correspondientes de dichos m&oacute;dulos para disponer de ellos.</p>

<pre>
<code class="language-javascript">import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import {BrowserModule} from "@angular/platform-browser";
import  {MatToolbarModule, MatButtonModule,MatIconModule } from "@angular/material";
import { MaterialDemoComponent } from "./material-demo/material-demo.component";
@NgModule({
  imports: [
    CommonModule,
    MatToolbarModule,MatButtonModule,MatIconModule
  ],
  declarations: [ MaterialDemoComponent ],
  exports: [MatToolbarModule,MatButtonModule,MatIconModule ]
})
export class MaterialModule { }
</code></pre>

<p>Desde el componente html a&ntilde;adimos los selectores</p>

<pre>
<code class="language-html">&lt;mat-toolbar color="primary"&gt;
  &lt;button mat-icon-button type="button"&gt;
    &lt;a href="/"&gt;&lt;mat-icon&gt;restaurant_menu&lt;/mat-icon&gt;&lt;/a&gt;
  &lt;/button&gt;
  &lt;span&gt;Angular&lt;/span&gt;
&lt;/mat-toolbar&gt;
&lt;nav&gt;
  &lt;a href="material-demo" &gt;
    &lt;button type="" mat-button color="primary"&gt;
      Home
    &lt;/button&gt;
  &lt;/a&gt;
&lt;/nav&gt;
&lt;router-outlet&gt;&lt;/router-outlet&gt;</code></pre>

<p><code class="language-html">Home </code></p>

<p>Angular Material ofrece al usuario una gran variedad de iconos desde&nbsp;Material Design Icons</p>

<p><strong>RUTAS B&Aacute;SICAS EN ANGULAR</strong></p>

<p>Las rutas se manejan en el archivo&nbsp;app-routing.module.ts. En este archivo debemos importar los componentes&nbsp; necesarios al inicio del archivo y a&ntilde;adirlos en la constante &quot;routes&quot;. De esta forma desde cualquier enlace o bot&oacute;n es posible acceder a otro componente.</p>

<pre>
<code class="language-javascript">import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { MaterialDemoComponent } from "./material/material-demo/material-demo.component";
//import { NuevoComponent } from "rutaNuevoComponent";
const routes: Routes = [
  {
    path: "material-demo",
    component: MaterialDemoComponent,
  }
/*,{
    path:selector NuevoComponent,
    component: NuevoComponent
}*/
];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }</code></pre>

<p>Para poder redireccionar y evitar la duplicidad del componente&nbsp; es necesario sustituir la propiedad &quot;redirectTo&quot; junto &quot;pathMatch&quot; en lugar de la propiedad component.</p>

<pre>
<code class="language-javascript">import { NgModule } from "@angular/core";
import { Routes, RouterModule } from "@angular/router";
import { MaterialDemoComponent } from "./material/material-demo/material-demo.component";
//import { NuevoComponent } from "rutaNuevoComponent";
const routes: Routes = [
 {
    path:"",  //raíz del proyecto
    redirectTo: "material-demo",
    pathMatch: "full"
  },
  {
    path: "material-demo",
    component: MaterialDemoComponent,
  }
/*,{
    path: selector NuevoComponent,
    component: NuevoComponent
}*/
];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }</code></pre>

<p>Todas estas rutas con accesibles desde cualquier componente mediante la propiedad [routerLink] que permite redireccionar a la ruta asignada.</p>

<pre>
<code class="language-html">&lt;button [routerLink] = "home"&gt;Home&lt;/button&gt;</code></pre>

<p><strong>EXPANSION PANEL</strong></p>

<p>Expansion Panel&nbsp;es un componente &quot;Angular Material&quot; que act&uacute;a como un contenedor expansible y que est&aacute; compuesto por un header y opcionalmente por un actionbar.&nbsp; Es necesario importar desde el m&oacute;dulo&nbsp; correspondiente(archivo typescript) , el m&oacute;dulo de Expansion Panel y a&ntilde;adirlo dentro del NgModule en la secci&oacute;n imports y, en caso necesario, en la secci&oacute;n exports.</p>

<pre>
<code class="language-javascript">import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import {BrowserModule} from "@angular/platform-browser";
import  {MatToolbarModule, MatButtonModule,MatIconModule,MatExpansionModule } from "@angular/material";
import { MaterialDemoComponent } from "./material-demo/material-demo.component";
@NgModule({
  imports: [
    CommonModule,
    MatToolbarModule,MatButtonModule,MatIconModule,MatExpansionModule
  ],
  declarations: [ MaterialDemoComponent ],
  exports: [MatToolbarModule,MatButtonModule,MatIconModule,MatExpansionModule]
})
export class MaterialModule { }</code></pre>

<p>Ejemplo de selectores con Expansion Panel en el html.</p>

<pre>
<code class="language-html">&lt;mat-expansion-panel&gt;
  &lt;mat-expansion-panel-header&gt;
    &lt;mat-panel-title&gt;
        Título
    &lt;/mat-panel-title&gt;
  &lt;/mat-expansion-panel-header&gt; 
&lt;/mat-expansion-panel&gt;</code></pre>

<p><strong>BUTTONS&nbsp;</strong></p>

<p>Angular Material dispone de varios tipos de botones predefinidos. Estos botones se obtienen a&ntilde;adiendo&nbsp; alguno de los atributos que Angular Material proporciona y que se pueden revisar en la documentaci&oacute;n:&nbsp;Botones Angular Material. En el caso de los iconos Angular Material dispone de un componente (mat-icon)que permite a&ntilde;adir iconos de forma r&aacute;pida desde&nbsp;Iconos Material Design&nbsp;, para ello es necesario incluir el m&oacute;dulo Material Icon de la misma forma que Expansion Panel detallado anteriormente.</p>

<p><strong>BOTONES EST&Aacute;NDAR</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-button&gt;Normal&lt;/button&gt;
    &lt;button mat-button color="primary"&gt;Normal Primario&lt;/button&gt;
&lt;/div&gt;</code></pre>

<pre>
<strong>BOTONES ELEVADOS</strong></pre>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-raised-button&gt;Elevado&lt;/button&gt;
    &lt;button mat-raised-button color="primary"&gt;Elevado 
Primario&lt;/button&gt;
&lt;/div&gt;</code></pre>

<pre>
<strong>BOTONES CON ICONOS</strong></pre>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-icon-button&gt;
        &lt;mat-icon&gt;grade&lt;/mat-icon&gt;
    &lt;/button&gt;
    &lt;button mat-icon-button color="primary"&gt;
        &lt;mat-icon&gt;grade&lt;/mat-icon&gt;
    &lt;/button&gt;
&lt;/div&gt;</code></pre>

<pre>
<strong>BOTONES FLOTANTES CON ICONOS (FAB)</strong></pre>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-fab&gt;
         &lt;mat-icon&gt;grade&lt;/mat-icon&gt;
    &lt;/button&gt;
    &lt;button mat-fab color="primary"&gt;
        &lt;mat-icon&gt;add&lt;/mat-icon&gt;
    &lt;/button&gt;
&lt;/div&gt;</code></pre>

<p><strong>INPUTS</strong></p>

<p>Al igual que los botones, Angular Material dispone de distintos tipos de campos de texto que permite cambiar el estilo haciendo uso del componente (mat-form-field) y a&ntilde;adiendo alguna de las directivas de Angular Material en el input. Es necesario incluir el m&oacute;dulo Input como los anteriores m&oacute;dulos.</p>

<p><strong>INPUT EST&Aacute;NDAR</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;mat-form-field&gt;
        &lt;input matInput type="text" placeholder="Nombre"&gt;
    &lt;/mat-form-field&gt;
&lt;/div&gt;</code></pre>

<pre>
<strong>INPUT CON PREFIJO Y SUFIJO</strong></pre>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;mat-form-field&gt;
        &lt;span matPrefix&gt;+34 &lt;/span&gt;
        &lt;input matInput type="text" placeholder="Teléfono"&gt;
        &lt;span matSuffix&gt;:-)&lt;/span&gt;
    &lt;/mat-form-field&gt;
&lt;/div&gt;</code></pre>

<pre>
<strong>INPUT CON INDICACI&Oacute;N</strong></pre>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;mat-form-field&gt;        
        &lt;input matInput type="text" placeholder="Dirección"&gt;
        &lt;mat-hint&gt;Calle y Número&lt;/mat-hint&gt;
    &lt;/mat-form-field&gt;
&lt;/div&gt;</code></pre>

<pre>
<strong>LISTS</strong></pre>

<p>Otro de los componentes disponibles en Angular Material son las listas (mat-list) y los elementos de lista (mat-list-item). Recomendable uso de directiva (mat-line o matLine) sobre list-item de m&uacute;ltiples l&iacute;neas. Como el resto de componentes es necesario importar m&oacute;dulo List desde el archivo typescript.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/VPCQWgx8sl6aUUSrJ199FjxGvW1ppDsi4mB50g0X.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //41
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Componentes Angular Material',
            'slug' => 'componentes-angular-material',
            'body_main' => 'Componentes predefinidos del módulo Material',
            'body_plus' => '<p><strong>EXPANSION PANEL</strong></p>

<p><strong>Expansion Panel</strong>&nbsp;es un componente &quot;Angular Material&quot; que act&uacute;a como un contenedor expansible y que est&aacute; compuesto por un header y opcionalmente por un actionbar.&nbsp; Es necesario importar desde el m&oacute;dulo&nbsp; correspondiente(archivo typescript) , el m&oacute;dulo de Expansion Panel y a&ntilde;adirlo dentro del NgModule en la secci&oacute;n imports y, en caso necesario, en la secci&oacute;n exports.</p>

<pre>
<code class="language-javascript">import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import {BrowserModule} from "@angular/platform-browser";
import  {MatToolbarModule, MatButtonModule,MatIconModule,MatExpansionModule } from "@angular/material";
import { MaterialDemoComponent } from "./material-demo/material-demo.component";
@NgModule({
  imports: [
    CommonModule,
    MatToolbarModule,MatButtonModule,MatIconModule,MatExpansionModule
  ],
  declarations: [ MaterialDemoComponent ],
  exports: [MatToolbarModule,MatButtonModule,MatIconModule,MatExpansionModule]
})
export class MaterialModule { }</code></pre>

<pre>
<code class="language-html">&lt;mat-expansion-panel&gt;
  &lt;mat-expansion-panel-header&gt;
    &lt;mat-panel-title&gt;
        Título
    &lt;/mat-panel-title&gt;
  &lt;/mat-expansion-panel-header&gt; 
&lt;/mat-expansion-panel&gt;
</code></pre>

<p><strong>BUTTONS</strong>&nbsp;</p>

<p>Angular Material dispone de varios tipos de botones predefinidos. Estos botones se obtienen a&ntilde;adiendo&nbsp; alguno de los atributos que Angular Material proporciona y que se pueden revisar en la documentaci&oacute;n:&nbsp;Botones Angular Material. En el caso de los iconos Angular Material dispone de un componente (mat-icon)que permite a&ntilde;adir iconos de forma r&aacute;pida desde&nbsp;Iconos Material Design&nbsp;, para ello es necesario incluir el m&oacute;dulo Material Icon de la misma forma que Expansion Panel detallado anteriormente.</p>

<p><strong>BOTONES EST&Aacute;NDAR</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-button&gt;Normal&lt;/button&gt;
    &lt;button mat-button color="primary"&gt;Normal Primario&lt;/button&gt;
&lt;/div&gt;</code></pre>

<p><strong>BOTONES ELEVADOS</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-raised-button&gt;Elevado&lt;/button&gt;
    &lt;button mat-raised-button color="primary"&gt;Elevado 
Primario&lt;/button&gt;
&lt;/div&gt;</code></pre>

<p><strong>BOTONES CON ICONOS</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-icon-button&gt;
        &lt;mat-icon&gt;grade&lt;/mat-icon&gt;
    &lt;/button&gt;
    &lt;button mat-icon-button color="primary"&gt;
        &lt;mat-icon&gt;grade&lt;/mat-icon&gt;
    &lt;/button&gt;
&lt;/div&gt;</code></pre>

<pre>
<strong>BOTONES FLOTANTES CON ICONOS (FAB)</strong></pre>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;button mat-fab&gt;
         &lt;mat-icon&gt;grade&lt;/mat-icon&gt;
    &lt;/button&gt;
    &lt;button mat-fab color="primary"&gt;
        &lt;mat-icon&gt;add&lt;/mat-icon&gt;
    &lt;/button&gt;
&lt;/div&gt;</code></pre>

<p><strong>INPUTS</strong></p>

<p>Al igual que los botones, Angular Material dispone de distintos tipos de campos de texto que permite cambiar el estilo haciendo uso del componente (mat-form-field) y a&ntilde;adiendo alguna de las directivas de Angular Material en el input. Es necesario incluir el m&oacute;dulo Input como los anteriores m&oacute;dulos.</p>

<p><strong>INPUT EST&Aacute;NDAR</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;mat-form-field&gt;
        &lt;input matInput type="text" placeholder="Nombre"&gt;
    &lt;/mat-form-field&gt;
&lt;/div&gt;</code></pre>

<p><strong>INPUT CON PREFIJO Y SUFIJO</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;mat-form-field&gt;
        &lt;span matPrefix&gt;+34 &lt;/span&gt;
        &lt;input matInput type="text" placeholder="Teléfono"&gt;
        &lt;span matSuffix&gt;:-)&lt;/span&gt;
    &lt;/mat-form-field&gt;
&lt;/div&gt;</code></pre>

<p><strong>INPUT CON INDICACI&Oacute;N</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;mat-form-field&gt;        
        &lt;input matInput type="text" placeholder="Dirección"&gt;
        &lt;mat-hint&gt;Calle y Número&lt;/mat-hint&gt;
    &lt;/mat-form-field&gt;
&lt;/div&gt;</code></pre>

<p><strong>LISTS</strong></p>

<p>Otro de los componentes disponibles en Angular Material son las listas (mat-list) y los elementos de lista (mat-list-item). Recomendable uso de directiva (mat-line o matLine) sobre list-item de m&uacute;ltiples l&iacute;neas. Como el resto de componentes es necesario importar m&oacute;dulo List desde el archivo typescript.</p>

<pre>
<code class="language-html">&lt;mat-list&gt;
  &lt;mat-list-item&gt;
    &lt;img matLine mat-list-avatar src="//lakewangaryschool.sa.edu.au/wp-content/uploads/2017/11/placeholder-profile-sq.jpg"&gt;
    &lt;span matLine&gt;Mónica Cañero&lt;/span&gt;
    &lt;span mat-line&gt;Málaga&lt;/span&gt;
  &lt;/mat-list-item&gt;
  &lt;mat-list-item&gt;
    &lt;img mat-line mat-list-avatar src="//lakewangaryschool.sa.edu.au/wp-content/uploads/2017/11/placeholder-profile-sq.jpg"&gt;
    &lt;span mat-line&gt;Susana Beltrán&lt;/span&gt;
    &lt;span mat-line&gt;Barcelona&lt;/span&gt;
  &lt;/mat-list-item&gt;
  &lt;mat-list-item&gt;
    &lt;img mat-line mat-list-avatar src="//lakewangaryschool.sa.edu.au/wp-content/uploads/2017/11/placeholder-profile-sq.jpg"&gt;
    &lt;span mat-line&gt;Vanesa Pantoja&lt;/span&gt;
    &lt;span mat-line&gt;Asturias&lt;/span&gt;
  &lt;/mat-list-item&gt;
&lt;/mat-list&gt;</code></pre>

<p><strong>MODELOS DE DATOS</strong></p>

<p>Los modelos de datos determinan la estructura y facilitan el acceso e intercambio de datos.&nbsp;Es recomendable crear un modelo de datos en un archivo separado y exportable en el cual declarar los tipos de datos para despu&eacute;s importar desde&nbsp;cualquier lugar del proyecto. La ruta recomendada para la creaci&oacute;n de los modelos es el directorio &quot;/shared/model/&quot;, de esta forma, Angular pretende mantener una estructura ordenada del proyecto.&nbsp;Para definir estos tipos es necesaria la creaci&oacute;n de una clase o una interface. Las clases son las m&aacute;s comunes en distintos lenguajes y permiten apoyarse en su m&eacute;todo constructor, sin embargo en TypeScript las interfaces son ideales si algunos datos son proporcionados, por ejemplo, mediante web services por peticiones ajax.&nbsp;</p>

<p><strong>INTERFACES</strong></p>

<p>&nbsp;Las interfaces son conjuntos de atributos y m&eacute;todos que, implementados desde una clase, determinan las caracter&iacute;sticas y el funcionamiento a esa clase. Las clases que implementan una o varias interfaces deben obligatoriamente a&ntilde;adir todos los atributos y todos los m&eacute;todos de tales interfaces.La diferencia principal entre una clase y una interface es que en la interface los atributos no tienen valores y los m&eacute;todos no contienen c&oacute;digo, solamente pueden definir el tipo de dato y el tipo de retorno. Las interfaces, en Angular, tambi&eacute;n se definen como un contrato que exige su cumplimiento (definir todos los atributos y m&eacute;todos de esa interface) y en caso de que no se cumpla, el compilador TypeScript marcar&aacute; un error.</p>

<p>&nbsp;</p>

<p><strong>Crear interface:</strong></p>

<pre>
<code class="language-bash">ng generate shared/model/[nombreModelo]
</code></pre>

<p><strong>De forma abreviada:</strong></p>

<pre>
<code class="language-bash">ng g i shared/model/estudiante
</code></pre>

<p><strong>Declaraci&oacute;n de tipos de datos:</strong></p>

<pre>
<code class="language-javascript">export interface Estudiante{
    id:number;
    nombre: string;
    ciudad: string;
    fotoURL?: string;  // parámetro ? permite que sea opcional
}</code></pre>

<p>Una vez creada la interface y declarados los tipos es posible declarar objetos desde el m&oacute;dulo TypeScript correspondiente.</p>

<pre>
<code class="language-javascript">import { Component, OnInit } from "@angular/core2;
import { Estudiante } from "../../shared/model/estudiante";
@Component({
  selector: "ed-material-list",
  templateUrl: "./material-list.component.html",
  styleUrls: ["./material-list.component.css"]
})
export class MaterialListComponent implements OnInit {
  estudiante1: Estudiante;
  estudiante2: Estudiante;
  estudiante3: Estudiante;
  constructor() { }
  ngOnInit() {
    console.log("Inicializando el componente MaterialList");
    this.estudiante1 = {
      id:1,
      nombre: "Mónica Cañero",
      ciudad: "Málaga",
      fotoURL: "//mipagina.com/foto.jpg"
    };
    this.estudiante2 = {
      id:2,
      nombre: "Susana Beltrán",
      ciudad: "Barcelona",
    };
    this.estudiante3 = {
      id:3,
      nombre: "Vanesa Pantoja",
      ciudad: "Asturias"
    };    
  }
}</code></pre>

<p><strong>INTERPOLACI&Oacute;N</strong></p>

<p>La interpolaci&oacute;n es un mecanismo de sustituci&oacute;n de expresiones por valores de tipo cadena en una vista. Angular analiza las expresiones entre dobles llaves &quot;{{...}}&quot; y permite acceder a propiedades de un modelo de datos.&nbsp;</p>

<pre>
<code class="language-html">&lt;mat-list&gt;
  &lt;mat-list-item&gt;
    &lt;img matLine mat-list-avatar src="//lakewangaryschool.sa.edu.au/wp-content/uploads/2017/11/placeholder-profile-sq.jpg"&gt;
    &lt;span matLine&gt;{{ estudiante1.nombre }}&lt;/span&gt;
    &lt;span mat-line&gt;{{ estudiante1.ciudad }}&lt;/span&gt;
  &lt;/mat-list-item&gt;
  &lt;mat-list-item&gt;
    &lt;img mat-line mat-list-avatar src="//lakewangaryschool.sa.edu.au/wp-content/uploads/2017/11/placeholder-profile-sq.jpg"&gt;
    &lt;span mat-line&gt;{{ estudiante2.nombre }}&lt;/span&gt;
    &lt;span mat-line&gt;{{ estudiante2.ciudad }}&lt;/span&gt;
  &lt;/mat-list-item&gt;
  &lt;mat-list-item&gt;
    &lt;img mat-line mat-list-avatar src="//lakewangaryschool.sa.edu.au/wp-content/uploads/2017/11/placeholder-profile-sq.jpg"&gt;
    &lt;span mat-line&gt;{{ estudiante3.nombre }}&lt;/span&gt;
    &lt;span mat-line&gt;{{ estudiante3.ciudad }}&lt;/span&gt;
  &lt;/mat-list-item&gt;
&lt;/mat-list&gt;</code></pre>

<p>Nota:&nbsp;Si el valor no es una cadena Angular intenta leerlo como tal.</p>

<pre>
<code class="language-javascript">import { Component, OnInit } from "@angular/core";
import { Estudiante } from "../../shared/model/estudiante";

@Component({
  selector: "ed-material-list",
  templateUrl: "./material-list.component.html",
  styleUrls: ["./material-list.component.css"]
})
export class MaterialListComponent implements OnInit {
  estudiante1: Estudiante;
  estudiante2: Estudiante;
  estudiante3: Estudiante;
  constructor() { }
  ngOnInit() {
    console.log("Inicializando el componente MaterialList");
    this.estudiante1 = {
      id:1,
      nombre: "Mónica Cañero",
      ciudad: "Málaga",
      fotoURL: "//mipagina.com/foto.jpg"
    };
    this.estudiante2 = {
      id:2,
      nombre: "Susana Beltrán",
      ciudad: "Barcelona",
    };
    this.estudiante3 = {
      id:3,
      nombre: "Vanesa Pantoja",
      ciudad: "Asturias"
    };
    setTimeout(() =&gt; {
      this.estudiante3 = {
        id:4,
        nombre: "José Becerra",
        ciudad: "Sant Joan Despí"
      }
    }, 3000);
  }
}</code></pre>

<p>Una de la caracter&iacute;sticas de la interpolaci&oacute;n es que permite mantener los datos actualizados. El c&oacute;digo de arriba incluye la funci&oacute;n setTimeout con la que permite mostrar la actualizaci&oacute;n constante de la vista. Angular utiliza el mecanismo Change Detect Strategy que detecta cualquier cambio. En este caso, Angular renderiza la vista con los cambios efectuados al detectar el cambio del nombre y de la ciudad de estudiante3 a los 3 segundos.</p>

<p>Seg&uacute;n la complejidad es preferible definir una clase&nbsp; en lugar de una interface. La clase dispone del m&eacute;todo constructor y es m&aacute;s pr&aacute;ctica si se requieren m&eacute;todos que manejen esos datos, si al contrario s&oacute;lo es necesario el tipo de dato es m&aacute;s pr&aacute;ctica una interface.</p>

<pre>
<code class="language-bash">ng generate class shared/model/class-estudiante
</code></pre>

<pre>
<code class="language-javascript">export class ClassEstudiante {
  constructor(public id:number,public nombre:string,public ciudad:string){
  }
  getEdad():number{
    return 0;
  }
}</code></pre>

<pre>
<code class="language-javascript">import { Component, OnInit } from "@angular/core";
import { Estudiante } from "../../shared/model/estudiante";
import { ClassEstudiante } from "../../shared/model/class-estudiante";
@Component({
  selector: "ed-material-list",
  templateUrl: "./material-list.component.html",
  styleUrls: ["./material-list.component.css"]
})
export class MaterialListComponent implements OnInit {
  estudiante1: ClassEstudiante;
  estudiante2: Estudiante;
  estudiante3: Estudiante;
  constructor() { }
  ngOnInit() {
    console.log("Inicializando el componente MaterialList");
    /*this.estudiante1 = {
      id:1,
      nombre: "Mónica Cañero",
      ciudad: "Málaga",
      fotoURL: "//mipagina.com/foto.jpg"
    };*/
    this.estudiante1 = new ClassEstudiante(1,"Mónica Cañero", "Málaga");
    console.log("edad de estudiante: "+this.estudiante1.getEdad());
    this.estudiante2 = {
      id:2,
      nombre: "Susana Beltrán",
      ciudad: "Barcelona",
    };
    this.estudiante3 = {
      id:3,
      nombre: "Vanesa Pantoja",
      ciudad: "Asturias"
    };
    setTimeout(() =&gt; {
      this.estudiante3 = {
        id:4,
        nombre: "José Becerra",
        ciudad: "Sant Joan Despí"
      }
    }, 3000);
  }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/CisMRkjyHpe07i13EDHBT0K2eIOcD1LPHLZzWQds.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //42
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Data Binding Angular',
            'slug' => 'data-binding-angular',
            'body_main' => 'Data Binding en Angular',
            'body_plus' => '<p><strong>Data Binding</strong>&nbsp;en Angular se define como la sincronizaci&oacute;n de los datos entre el componente y la vista y es una de sus caracter&iacute;sticas m&aacute;s populares.</p>

<p><strong>PROPERTY BINDING</strong></p>

<p><strong>Property Binding</strong>&nbsp;es un mecanismo que consiste en la transferencia desde el componente hacia la vista, es decir, desde el componente se est&aacute;n pasando datos que configuran un elemento de la vista. Este enlace de propiedades permite definir propiedades a un elemento HTML, a un componente o a una directiva mediante expresiones y se pueden manejar estos valores y cambiarlos en caso de ser necesario.</p>

<p>Nota: Preciso recordar que no es lo mismo atributos que propiedades, mejor explicado en&nbsp;//www.pensemosweb.com/enlazado-propiedades-property-binding-angular/</p>

<p>En el ejemplo siguiente se puede observar como el atributo disabled envuelto entre corchetes tiene asignado el objeto boton y su propiedad test, definidas en el archivo typescript del componente. El uso de setTimeout permite cambiar la propiedad y realizar la sincronizaci&oacute;n&nbsp;autom&aacute;tica&nbsp;de la vista.</p>

<p><strong>component.ts</strong></p>

<pre>
<code class="language-javascript">export class NuevoComponent implements OnInit {
  boton={
    test: true
  };
  constructor() { }
  ngOnInit() {
    setTimeout(() =&gt; {
      this.boton.test=false;
    },3000);
  }
}</code></pre>

<p><strong>component.html</strong></p>

<pre>
<code class="language-html">&lt;button mat-button disabled = "true"&gt;Botón Normal&lt;/button&gt;
&lt;button mat-button [disabled] = "!boton.test"&gt;Botón Property&lt;/button&gt;</code></pre>

<p><strong>DIRECTIVAS ESTRUCTURALES</strong></p>

<p>Las directivas son atributos asignables a un componente y que permiten manejar el DOM y a&ntilde;adir propiedades a elementos HTML en la vista del componente.</p>

<p><strong>DIRECTIVAS *ngIf &amp; *ngFor</strong></p>

<p>Las directivas&nbsp;<strong>*ngIf</strong>&nbsp;&amp;&nbsp;<strong>*ngFor</strong>&nbsp;se denominan directivas estructurales, ya que, permiten manipular la estructura del DOM. Estas directivas son atributos que se a&ntilde;aden a un elemento HTML y que nos permiten generar un condicional y un bucle respectivamente. La directiva *ngIf permite ocultar el elemento o mostrarlo seg&uacute;n la condici&oacute;n y la directiva *ngFor permite generar un bucle que repite el elemento el n&uacute;mero de veces que se cumpla.</p>

<p><strong>*ngIf</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;img *ngIf="usuario.imaprofile" [src]="usuario.imaprofile"&gt;
    &lt;span&gt;{{ usuario.nombre }}&lt;/span&gt;
    &lt;span&gt;{{ usuario.pais }}&lt;/span&gt;
&lt;/div&gt;</code></pre>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;img *ngIf="usuario.imaprofile" [src]="usuario.imaprofile"&gt;
    &lt;img *ngIf="!usuario.imaprofile" [src]="profiledefault"&gt;
    &lt;span&gt;{{ usuario.nombre }}&lt;/span&gt;
    &lt;span&gt;{{ usuario.pais }}&lt;/span&gt;
&lt;/div&gt;</code></pre>

<p><strong>*ngif (if - else)</strong></p>

<pre>
<code class="language-html">&lt;div *ngIf=usuario;then datosValidos; else sinDatos&gt;        
&lt;/div&gt;
&lt;ng-template #datosValidos&gt;
    &lt;span&gt;{{ usuario.nombre }}&lt;/span&gt;
    &lt;span&gt;{{ usuarios.pais }}&lt;/span&gt;
&lt;/ng-template&gt;
&lt;ng-template #sinDatos&gt;
    &lt;span&gt;No existe usuario&lt;/span&gt;
&lt;/ng-template&gt;</code></pre>

<p><strong>*ngFor</strong></p>

<pre>
<code class="language-html">&lt;div *ngFor="let usuario of arrayUsuarios"&gt;
    &lt;img *ngIf="usuario.imaprofile"  [src]="usuario.imaprofile"&gt;
    &lt;img *ngIf="!usuario.imaprofile" [src]="DEFAULT_PICTURE"&gt;
    &lt;span&gt;{{ usuario.nombre }}&lt;/span&gt;
    &lt;span&gt;{{ usuario.pais }}&lt;/span&gt;
&lt;/div&gt;</code></pre>

<p><strong>*ngSwitch</strong></p>

<pre>
<code class="language-html">&lt;ul [ngSwitch]="color"&gt;
    &lt;li *ngSwitchCase=" "yellow" "&gt;
        El color es el amarillo
    &lt;/li&gt;
     &lt;li  *ngSwitchCase="red"&gt;
        El color es el rojo
    &lt;/li&gt;
&lt;/ul&gt;</code></pre>

<p><strong>DIRECTIVAS DE ATRIBUTO</strong></p>

<p><strong>ngClass</strong></p>

<p>Permite asignar una clase a un elemento con la opci&oacute;n&nbsp; de a&ntilde;adirla si se cumple una condici&oacute;n.</p>

<pre>
<code class="language-html">&lt;span [class.oferta] = "coche.precio &lt;= 1000"&gt;{{ coche.precio }}€ &lt;/span&gt;
</code></pre>

<pre>
<code class="language-html">&lt;span [ngClass] = \"{ "oferta" : coche.precio &lt;=1000 }\"&gt;{{ coche.precio }} &lt;/span&gt;
</code></pre>

<p><strong>EVENT BINDING</strong></p>

<p>El<strong>&nbsp;Event Binding</strong>&nbsp;es la transferencia que usa Angular para manejar los eventos, esta transferencia va desde la vista hacia el componente. De la misma forma que Javascript, se a&ntilde;ade un atributo al elemento HTML y se le asigna una funci&oacute;n con sus par&aacute;metros (si los hay). Pero en Angular este atributo va cerrado entre par&eacute;ntesis y para lanzar un evento, Angular dispone de la palabra reservada $event que lanza un evento de tipo Angular y desde el archivo typescript del componente podr&aacute; ser capturado.</p>

<pre>
<code class="language-html">&lt;button (click) = "onClick($event)"&gt;
  Botón
&lt;/button&gt;
&lt;input (keyup) = "onKeyUp($event)"&gt;</code></pre>

<pre>
<code class="language-javascript">export class BotonComponent implements OnInit { 
  constructor() { }
  ngOnInit() {
    
  }
  onClick($event){
      console.log("Event Click",$event);
  }
  onKeyUp($event){
      console.log("Event Tecla presionada",$event);
  }
}</code></pre>

<p><strong>DIRECTIVAS PERSONALIZADAS</strong></p>

<p>Crear directiva</p>

<pre>
<code class="language-bash">ng generate directive fondo
</code></pre>

<p>Ejemplo de directiva personalizada</p>

<pre>
<code class="language-javascript">import { Directive, ElementRef } from "@angular/core";
@Directive({
  selector: "[edFondo]"
})
export class FondoDirective {
  constructor(public elemento: ElementRef) {
  }
  
ngOnInit(){
    var fondo = this.elemento.nativeElement;
    fondo.style.color= "white";
    fondo.style.background = "orange";
    console.log(fondo.innerText);
  }
}</code></pre>

<pre>
<code class="language-html">&lt;div class="container"&gt;
  &lt;p edFondo&gt;hola que tal&lt;/p&gt;
&lt;/div&gt;</code></pre>

<p><strong>COMUNICACI&Oacute;N ENTRE COMPONENTES</strong></p>

<p><strong>INPUT DIN&Aacute;MICO (@INPUT)</strong></p>

<p>Este decorador permite&nbsp; que la propiedad de un componente padre est&eacute; disponible en un componente hijo mediante el uso de atributos.</p>

<p>En el c&oacute;digo de ejemplo siguiente se ha creado una lista de usuarios del tipo Usuario en el componente padre.</p>

<pre>
<code class="language-javascript">import { Component, OnInit } from "@angular/core";
import { Usuario } from "../../shared/model/usuario";
@Component({
  selector: "pre-lista-padre",
  templateUrl: "./lista-padre.component.html",
  styleUrls: ["./lista-padre.component.css"]
})
export class ListaPadreComponent implements OnInit {
  usuario1: Usuario;
  usuario2: Usuario;
  usuario3: Usuario;
  listaUsuarios : Usuario[];  
  constructor() { }
  ngOnInit() {
    this.usuario1 = {
      id:1,
      nombre: "Mónica Cañero",
      pais: "Bolivia",
    };
    this.usuario2 = {
      id:2,
      nombre: "Susana Beltrán",
      pais: "España"
    };
    this.usuario3 = {
      id:3,
      nombre: "Vanesa Pantoja",
      pais: "Venezuela"
    };
    this.listaUsuarios = [ this.usuario1,this.usuario2,this.usuario3 ];
  }
}</code></pre>

<p>En la plantilla del componente padre a&ntilde;adimos el selector del componente hijo y la directiva de atributo asignando los datos.</p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;pre-lista-hijo *ngFor="let user of listaUsuarios" [usuario] = "user"&gt;&lt;/pre-lista-hijo&gt;
&lt;/div&gt;</code></pre>

<p>En el componente hijo importamos el modelo de&nbsp; Usuario y se a&ntilde;ade el decorador @Input() y a continuaci&oacute;n el atributo usuario de tipo Usuario. Este decorador es el que permite que desde la plantilla o vista del componente hijo sea posible el acceso a los datos (usuario).</p>

<pre>
<code class="language-javascript">import { Component, OnInit, Input } from "@angular/core";
import { Usuario } from "../../../shared/model/usuario";
@Component({
  selector: "pre-lista-hijo",
  templateUrl: "./lista-hijo.component.html",
  styleUrls: ["./lista-hijo.component.css"]
})
export class ListaHijoComponent implements OnInit {
  @Input()
  usuario: Usuario;
  constructor() { }
  ngOnInit() {
  }
}
</code></pre>

<p>En la vista del componente hijo ya es posible mostrar los valores obteni&eacute;ndolos del componente padre.</p>

<pre>
<code class="language-html">&lt;div&gt;    
    &lt;span&gt;{{ usuario.nombre }}&lt;/span&gt;
    &lt;span&gt;{{ usuario.pais }}&lt;/span&gt;
&lt;/div&gt;</code></pre>

<p><strong>OUTPUT DIN&Aacute;MICO (@OUTPUT)</strong></p>

<p>Este decorador junto con EventEmitter permite que un evento de un componente hijo est&eacute; disponible en un componente padre.</p>

<p>Manteniendo el c&oacute;digo del ejemplo anterior la plantilla del componente hijo solo es necesario a&ntilde;adir un evento Angular y asignarle la funci&oacute;n que emitir&aacute; los datos.</p>

<pre>
<code class="language-html">&lt;div (click) = "capturarEvento(usuario)"&gt;    
    &lt;span&gt;{{ usuario.nombre }}&lt;/span&gt;
    &lt;span&gt;{{ usuario.pais }}&lt;/span&gt;
&lt;/div&gt;</code></pre>

<p><strong>Tipos de evento m&aacute;s comunes en Angular</strong></p>

<ul>
    <li>(click), (dblclick), (keyup), (keypress), (keydown), (focus), (blur), (submit), (scroll), (submit), (drag),(dragover),(drop), (cut), (copy), (paste).</li>
</ul>

<p>Desde el componente hijo es necesario&nbsp;importar el Output y el EventMitter, para poder a&ntilde;adir el decorador @Output y a continuaci&oacute;n crear un objeto EventEmitter. Al final de la clase se crea el m&eacute;todo (que es el asignado anteriormente en la plantilla), incluyendo el tipo de objeto como par&aacute;metro. Este m&eacute;todo llama al m&eacute;todo emit() de la clase EventMitter que es el que propaga los datos.</p>

<pre>
<code class="language-javascript">import { Component, OnInit, Input,Output, EventEmitter } from 2@angular/core";
import { Usuario } from "../../../shared/model/usuario";
@Component({
  selector: "pre-lista-hijo",
  templateUrl: "./lista-hijo.component.html",
  styleUrls: ["./lista-hijo.component.css"]
})
export class ListaHijoComponent implements OnInit {
  @Input()
  usuario: Usuario;
  @Output()
  propagarDatos = new EventEmitter&lt;Usuario&gt;();
  constructor() { }
  ngOnInit() {
  }
capturarEvento(ev: Usuario){
    this.propagarDatos.emit(ev);
  }
}</code></pre>

<p>Desde la vista del componente padre se a&ntilde;ade como atributo&nbsp; el objeto anteriormente creado (propagarDatos) cerrado entre par&eacute;ntesis y se le asigna una funci&oacute;n (mostrarDato)pasando como par&aacute;metros el &quot;$event&quot; que es una palabra reservada de Angular.</p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;pre-lista-hijo *ngFor="let user of listaUsuarios" [usuario] = "user" (propagarDatos)="mostrarDatos($event)"&gt;&lt;/pre-lista-hijo&gt;
&lt;/div&gt;</code></pre>

<p>Al final de la clase se crea el m&eacute;todo que ser&aacute; el que maneje los datos a trav&eacute;s del par&aacute;metro $event.</p>

<pre>
<code class="language-javascript">import { Component, OnInit } from "@angular/core";
import { Usuario } from "../../shared/model/usuario";
@Component({
  selector: "pre-lista-padre",
  templateUrl: "./lista-padre.component.html",
  styleUrls: ["./lista-padre.component.css"]
})
export class ListaPadreComponent implements OnInit {
  usuario1: Usuario;
  usuario2: Usuario;
  usuario3: Usuario;
  listaUsuarios : Usuario[];  
  constructor() { }
  ngOnInit() {
    this.usuario1 = {
      id:1,
      nombre: "Mónica Cañero",
      pais: "Bolivia",
    };
    this.usuario2 = {
      id:2,
      nombre: "Susana Beltrán",
      pais: "España"
    };
    this.usuario3 = {
      id:3,
      nombre: "Vanesa Pantoja",
      pais: "Venezuela"
    };
    this.listaUsuarios = [ this.usuario1,this.usuario2,this.usuario3 ];
  }
mostrarDatos($event){    
    console.log("Nombre del registro pulsado: ",$event.nombre);
  }
}</code></pre>

<p><strong>PIPES O FILTROS</strong></p>

<p>Los pipes son funciones de Angular que permiten modificar datos (que a menudo son rutinarios o repetitivos) en la vista, como pueden ser formatear la fecha, modificar el texto...</p>

<pre>
<code class="language-javascript">export class ExternoComponent implements OnInit {
    
    public fecha: Date;
ngOnInit()
{
    this.fecha=new Date();  
}</code></pre>

<pre>
<code class="language-html">&lt;hr&gt;
&lt;p&gt;{{ fecha | date: "dd/MM/y" }}&lt;/p&gt;
&lt;hr&gt;</code></pre>

<pre>
<code class="language-html">&lt;hr&gt;
    &lt;p&gt;{{ fecha | date: "fullDate" }}&lt;/p&gt;&lt;br&gt;
    &lt;p&gt;{{ "texto en mayúsculas con PIPES" | uppercase }}&lt;/p&gt;
    &lt;hr&gt;</code></pre>

<p><strong>PIPES PERSONALIZADOS</strong></p>

<p><strong>module.ts</strong></p>

<pre>
<code class="language-javascript">import { CalculadoraPipe } from "./pipes/calculadora.pipe";
declarations:[ CalculadoraPipe ]</code></pre>

<p><strong>component.ts</strong></p>

<pre>
<code class="language-javascript">import { Pipe, PipeTransform } from "@angular/core";
@Pipe({
    name: "calculadora"
})
export class CalculadoraPipe implements PipeTransform{
    //dato | calculadora: dato2
    //param1            param2
    transform(value1:any,value2:any){
        let operaciones =`
            Suma: ${value1+value2} - 
            Resta: ${value1-value2} - 
            Multiplicación: ${value1*value2} - 
            División: ${value1/value2}
            `;
        return operaciones;
    }
}</code></pre>

<p><strong>component.html</strong></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;p&gt;{{ 4 | calculadora: 2 }}&lt;/p&gt;
&lt;/div&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/aRc6DS9DqVJYTNJw3D7uO4RESlyByvFlzYVswOD1.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //43
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Inyección de Dependencias',
            'slug' => 'inyeccion-de-dependencias',
            'body_main' => 'Inyección de Dependencias (Dependency Injection) en Angular',
            'body_plus' => '<p><strong>INYECCI&Oacute;N DE DEPENDENCIAS</strong></p>

<p>Es un patr&oacute;n de dise&ntilde;o orientado a objetos que permite el manejo de objetos entre componentes y que crea las instancias de la clase o clases autom&aacute;ticamente desde un servicio externo mediante el decorador @Injectable().</p>

<p>SERVICIOS</p>

<p>Los servicios son clases destinadas a la reutilizaci&oacute;n de c&oacute;digo y mantener los datos de forma organizada (los datos no se encuentran en el mismo componente).</p>

<p><strong>Creaci&oacute;n de un servicio Angular</strong></p>

<pre>
<code class="language-bash">ng generate service shared/services/datos --module app
</code></pre>

<p>Este servicio permite alojar los datos y mediante el decorador @Injectable permite crear instancias autom&aacute;ticas del objeto en el componente. En el ejemplo siguiente se crea un atributo con el modificador de acceso private y la propiedad readonly que es muy similar a una constante. Al atributo DATOS se le asigna un objeto de tipo User y el m&eacute;todo getUser devuelve el resultado. Es necesario tanto en el atributo como en el m&eacute;todo getUser especificar el tipo de objeto.</p>

<p>Ejemplo de un servicio implementando inyecci&oacute;n de dependencias:</p>

<pre>
<code class="language-javascript">import { Injectable } from "@angular/core";
import { User } from "../model/user";
@Injectable({
  providedIn: "root"
})
export class DatosService {
  private readonly DATOS: User = {
    nombre: "Mónica",
    apellidos: "Cañero",
    pais: "España",
    ciudad: "Málaga"  
    };
  constructor() { }
  getUser(): User {
    return this.DATOS;
  }
}</code></pre>

<p>Interface para los tipos de dato.</p>

<pre>
<code class="language-java">export interface User{
    nombre: string;
    apellidos: string;
    pais: string;
    ciudad: string;
}</code></pre>

<p>Solo declarando los par&aacute;metros (modificador de acceso, atributo, objeto) el componente crea la instancia autom&aacute;ticamente. En el ejemplo se crea un atributo tipo User y en el m&eacute;todo de inicializaci&oacute;n se llama al m&eacute;todo getUser del servicio creado anteriormente.</p>

<pre>
<code class="language-javascript">import { Component, OnInit } from "@angular/core";
import { User } from "../shared/model/apod";
import { DatosService } from "../shared/services/datos.service";
@Component({
  selector: "ed-home",
  templateUrl: "./home.component.html",
  styleUrls: ["./home.component.css"]
})
export class HomeComponent implements OnInit {
  user: User;
  constructor(private datos: DatosService) { }
  ngOnInit() {
    this.user = this.datos.getUser();
  }
}</code></pre>

<p>De esta forma Angular permite alojar los datos y/o m&eacute;todos para manejar esos datos desde un servicio externo.</p>

<p>Nota: Desde angular 6 no es necesario importar los m&oacute;dulos al componente principal ya que Angular lo hace autom&aacute;ticamente al crear un servicio desde Angular CLI, a&ntilde;adi&eacute;ndo&nbsp;providedIn: &#39;root&#39;&nbsp;al decorador @Injectable.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/KeZbqXia4We7PoS9EkPmqCDZ1HJccTdkId6qzLqm.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //44
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Programación Reactiva en Angular',
            'slug' => 'programacion-reactiva-en-angular',
            'body_main' => 'Programación Reactiva (RxJS) en Angular',
            'body_plus' => '<p>RxJS es una implementaci&oacute;n para Javascript de la librer&iacute;a&nbsp;ReactiveX&nbsp;que viene incluida en Angular-CLI. Esta librer&iacute;a permite manejar flujos de datos de forma as&iacute;ncrona&nbsp; mediante el uso de &quot;Observables&quot; y opcionalmente un conjunto de&nbsp;operadores. Estos Observables o secuencias observables representan un flujo de datos como pueden ser un array de n&uacute;meros, la secuencia de coordenadas de un evento del mouse, mensajes de correo,etc... Sea la secuencia que sea RxJS siempre manejar&aacute; las secuencias de datos como un flujo de datos(Observables).&nbsp;Lo interesante de la librer&iacute;a RxJS es que permite mantener una relaci&oacute;n entre un Observable y un Observer.</p>

<p>Documentaci&oacute;n de ReactiveX:</p>

<ul>
    <li>Observable: Representa la idea de una invocable colecci&oacute;n de futuros valores o eventos.</li>
    <li>Observer: Es una colecci&oacute;n de callbacks que saben recibir datos entregados por un Observable.</li>
</ul>

<p>&nbsp;</p>

<p>Para entenderlo con un ejemplo simple, equivaldr&iacute;a a la suscripci&oacute;n de un usuario a un blog, canal de video,tienda online..., donde un usuario si lo desea puede suscribirse para recibir alg&uacute;n tipo de notificaci&oacute;n cuando un post se ha actualizado, se ha publicado un nuevo video o la tienda promociona un nuevo producto, de la misma forma un&nbsp;<strong>Observer</strong>&nbsp;(o consumidor) puede adjuntarse mediante una&nbsp;<strong>Suscripci&oacute;n</strong>&nbsp;a un&nbsp;<strong>Observable</strong>.&nbsp;</p>

<p><strong>CREAR UN OBSERVABLE</strong></p>

<pre>
<code class="language-javascript">const observable=new Observable(subscriber =&gt; {
      subscriber.next(50);
      subscriber.next(["TV","MP3","smartphone","Tarjeta SD"]);
      subscriber.next({
        cadena:"bien",
        lista:["coma","punto","comilla"],
        numero:1,
        objeto1:{
          ropa:["camisa","jersey","pantalon"],
          musica:["Queen","ACDC","Extremoduro"]
        }
      });
    });
    observable.subscribe(x =&gt;{console.log(x)});</code></pre>

<p><strong>CREAR UN OBSERVER</strong></p>

<pre>
<code class="language-javascript">let observer = {
        next:data =&gt; console.log("Datos recibidos: ",data),
        complete: data =&gt;console.log("Completado"),
      };</code></pre>

<p><strong>CREAR UN SUBSCRIPTION</strong></p>

<pre>
<code class="language-javascript">let subscription = observable.subscribe(observer);
</code></pre>

<p><strong>Tambi&eacute;n es posible crear y manejar Observables mediante&nbsp;operadores:</strong></p>

<p>El operador&nbsp;Create&nbsp;permite crear un Observable pas&aacute;ndole un Observer como par&aacute;metro.</p>

<pre>
<code class="language-javascript">let objeto=Observable.create((observer) =&gt;{
        observer.next("un nuevo valor");
      });</code></pre>

<p>El operador&nbsp;From&nbsp;convierte un array o iteraci&oacute;n en Observable</p>

<pre>
<code class="language-javascript">Observable.from(["plátano","naranja","manzana", "piña"])
    .take(3)
    .map(function(d) { "La fruta es : " +d })
    .subscribe(function (d) { console.log(d)});</code></pre>

<p>El operador&nbsp;FromEvent&nbsp;permite obtener un Observable pas&aacute;ndole un elemento y el nombre del evento</p>

<pre>
<code class="language-javascript">Observable.fromEvent("boton","click")
    .interval(1000)
    .subscribe()=&gt; console.log("botón pulsado");</code></pre>

<p><strong>SOLICITUDES HTTP&nbsp;</strong></p>

<p>Angular puede realizar llamadas http con flujos de datos mediante la clase HttpClient. La clase HttpClient dispone de un conjunto de m&eacute;todos(get,post,put,delete,patch...)</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Esta funci&oacute;n subscribe() dispone de 3 m&eacute;todos:</p>

<p>onNext:&nbsp;Es llamado cuando el Observable emite nuevos datos. Pasa como par&aacute;metro los datos emitidos.</p>

<p>onError: Es llamado cuando se genera un error.</p>

<p>onCompleted: Es llamado al final si el m&eacute;todo onNext no genera ning&uacute;n tipo de error.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ptvJm5eVPMNP6iT7016FFIEMjZKuEqN2uFPZAIYm.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //45
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Git',
            'slug' => 'git',
            'body_main' => 'Git. El sistema de control de versiones libre y de código abierto.',
            'body_plus' => '<p><strong>Git</strong>&nbsp;es un VCS (Version Control System) dise&ntilde;ado por Linus Torvalds en el a&ntilde;o 2005 para almacenar el n&uacute;cleo de Linux. Git es un software sencillo, distribuido, multiplataforma y capaz de almacenar grandes proyectos.</p>

<p><strong>Git</strong>&nbsp;se compone de 3 estados:</p>

<ul>
    <li><strong>working directory</strong></li>
    <li><strong>staging area</strong></li>
    <li><strong>git directory(repository)</strong></li>
</ul>

<p>&nbsp;</p>

<p><strong>INSTALAR GIT</strong></p>

<p>Linux&nbsp;(apt)</p>

<pre>
<code class="language-bash">sudo apt-get install git
</code></pre>

<p>Linux&nbsp;(yum):</p>

<pre>
<code class="language-bash">sudo yum install git
</code></pre>

<p>Windows y Mac</p>

<p>Descargar instalador desde la p&aacute;gina oficial de&nbsp;Git.</p>

<p><strong>CONFIGURACI&Oacute;N</strong></p>

<pre>
<code class="language-bash">git config --global user.name [nombre]
git config --global user.email [correo]
git config --global color.ui true</code></pre>

<p><strong>CONFIGURAR EDITOR</strong></p>

<p>Sublime&nbsp;</p>

<pre>
<code class="language-bash">git config --global core.editor "subl -n -w"
</code></pre>

<p>Gedit</p>

<pre>
<code class="language-bash">git config --global core.editor gedit
</code></pre>

<p>Vim</p>

<pre>
<code class="language-bash">git config --global core.editor vim
</code></pre>

<p>Los archivos creados en el repositorio se mantienen en el primer estado (working directory). Una vez creados es posible a&ntilde;adirlos con el comando add pasando al segundo estado (staging area) con la opci&oacute;n de devolverlo al primer estado mediante la opci&oacute;n cached. Finalmente con el comando commit se incluyen los archivos al repositorio en el tercer y &uacute;ltimo paso (git directory).</p>

<p>A continuaci&oacute;n se muestran las opciones m&aacute;s utilizadas en Git</p>

<p><strong>CREAR REPOSITORIO</strong></p>

<pre>
<code class="language-bash">git init [repositorio]
</code></pre>

<p>&nbsp;</p>

<pre>
<code class="language-bash">mkdir [repositorio]
cd [repositorio]
git init</code></pre>

<p><strong>ELIMINAR REPOSITORIO</strong></p>

<pre>
<code class="language-bash">rm -rf .git
</code></pre>

<pre>
<code class="language-bash">rm -rf [repositorio]
</code></pre>

<p><strong>CREAR ARCHIVO</strong></p>

<pre>
<code class="language-bash">touch [archivo]
</code></pre>

<p><strong>COMPROBAR ESTADO DE REPOSITORIO</strong></p>

<pre>
<code class="language-bash">git status
</code></pre>

<p><strong>COMPROBAR ARCHIVO</strong></p>

<pre>
<code class="language-bash">git add -n [archivo]
</code></pre>

<p><strong>A&Ntilde;ADIR ARCHIVO AL STAGING AREA</strong></p>

<pre>
<code class="language-bash">git add [archivo]
</code></pre>

<p><strong>DESHACER LA ACCI&Oacute;N ADD</strong></p>

<pre>
<code class="language-bash">git reset
</code></pre>

<p><strong>A&Ntilde;ADIR TODOS LOS ARCHIVOS&nbsp;AL STAGING AREA</strong></p>

<pre>
<code class="language-bash">git add -A
</code></pre>

<p><strong>DESHACER A&Ntilde;ADIDO DE ARCHIVO EN&nbsp;STAGING AREA</strong></p>

<pre>
<code class="language-bash">git rm --cached [archivo]
</code></pre>

<p><strong>ELIMINAR ARCHIVO</strong></p>

<pre>
<code class="language-bash">git rm [archivo]
</code></pre>

<p><strong>&nbsp;ELIMINAR ARCHIVO FORZADO</strong></p>

<pre>
<code class="language-bash">git rm -f [archivo]
</code></pre>

<p><strong>A&Ntilde;ADIR ARCHIVOS A REPOSITORIO</strong></p>

<pre>
<code class="language-bash">git commit -m "[texto]"
</code></pre>

<p><strong>A&Ntilde;ADIR ARCHIVOS A UN COMMIT ANTERIOR</strong></p>

<pre>
<code class="language-bash">git commit --amend 
git commit --amend "[nuevoTextoacommitanterior]"</code></pre>

<p>Ejemplo de un commit de:</p>

<p>Se crea el directorio y se accede a &eacute;l.</p>

<pre>
<code class="language-bash">mkdir proyecto1
cd proyecto1</code></pre>

<p>Se crean los archivos</p>

<pre>
<code class="language-bash">touch index.html
touch index.css</code></pre>

<p>Se a&ntilde;aden al estado de preparaci&oacute;n</p>

<pre>
<code class="language-bash">git add -A
</code></pre>

<p>Se a&ntilde;aden al repositorio&nbsp;</p>

<pre>
<code class="language-bash">git commit -m "primer commit"
</code></pre>

<p>Se a&ntilde;ade una imagen al index.html</p>

<pre>
<code class="language-bash">git add index.html
git add help.png
git commit -m "segundo commit con imagen"</code></pre>

<p><strong>ETIQUETAS LIGERAS</strong></p>

<pre>
<code class="language-bash">git tag "[númeroversión]"
</code></pre>

<pre>
<code class="language-bash">git tag 0.5
</code></pre>

<p><strong>ETIQUETAS ANOTADAS</strong></p>

<pre>
<code class="language-bash">git tag -a [numeroversión] -m "texto"
</code></pre>

<pre>
<code class="language-bash">git tag -a 0.5 -m "versión estable"
</code></pre>

<pre>
<code class="language-bash">git tag -a [numeroversión] -m [SHA]
</code></pre>

<pre>
<code class="language-bash">git tag -a 0.5 -m git 623d56c27e080bef75e3760bf0b869969f4b2bad
</code></pre>

<p><strong>COMPROBAR VERSI&Oacute;N DE PROYECTO (HISTORIA)</strong></p>

<pre>
<code class="language-bash">git log
</code></pre>

<pre>
<code class="language-bash">git tag -l
</code></pre>

<pre>
<code class="language-bash">git log --oneline
</code></pre>

<pre>
<code class="language-bash">git --oneline --graph
</code></pre>

<pre>
<code class="language-bash">git log -2
</code></pre>

<p><strong>COMPROBAR DIFERENCIAS ENTRE VERSIONES</strong></p>

<pre>
<code class="language-bash">git diff [SHA]
</code></pre>

<pre>
<code class="language-bash">git diff [SHA1] [SHA2]
</code></pre>

<p><strong>RESETEAR</strong></p>

<pre>
<code class="language-bash">git reset --soft [SHA]
</code></pre>

<pre>
<code class="language-bash">git reset --mixed [SHA]
</code></pre>

<pre>
<code class="language-bash">git reset --hard 623d56c27e080bef75e3760bf0b869969f4b2bad
</code></pre>

<p>Soft: Devuelve al commit indicado mediante el par&aacute;metro SHA pero mantiene los archivos en staging area.</p>

<p>Mixed: Devuelve al commit indicado mediante SHA y los archivos los devuelve a working directory.</p>

<p>Hard: Devuelve al commit indicado mediante SHA&nbsp; y no mantiene los archivos en ning&uacute;n estado. En caso de error si se almacena el c&oacute;digo SHA eliminado es posible recuperar los datos volviendo a ejecutar el reset --hard indicado dicho c&oacute;digo SHA.</p>

<p><strong>Git</strong>&nbsp;recomienda crear otras ramas y no apoyarse &uacute;nicamente en la rama principal que es creada por defecto (master) mediante el primer commit. Git permite, mediante las ramas, desarrollar distintas&nbsp;secciones del proyecto por separado o solucionar errores, para despu&eacute;s, poder mezclar todas esas ramas.</p>

<p><strong>CREAR RAMA</strong></p>

<pre>
<code class="language-bash">git branch [nombre_de_rama]
</code></pre>

<p><strong>ELIMINAR RAMA</strong></p>

<pre>
<code class="language-bash">git branch -d [nombre_de_rama]
</code></pre>

<p><strong>ELIMINAR RAMA FORZADA</strong></p>

<pre>
<code class="language-bash">git branch -D [nombre_de_rama]
</code></pre>

<p><strong>RENOMBRAR RAMA</strong></p>

<pre>
<code class="language-bash">git branch -m [rama_actual] [nueva_rama]
</code></pre>

<p><strong>REVISAR LISTA DE RAMAS</strong></p>

<pre>
<code class="language-bash">git branch -l
</code></pre>

<p><strong>CAMBIARSE DE RAMA</strong></p>

<pre>
<code class="language-bash">git checkout [rama]
</code></pre>

<p><strong>CREAR Y MOVERSE A UNA RAMA</strong></p>

<pre>
<code class="language-bash">git checkout -b [nombre_de_rama]
</code></pre>

<p><strong>MEZCLAR RAMAS</strong></p>

<pre>
<code class="language-bash">git merge [rama_a_mezclar]
</code></pre>

<p><strong>REESCRIBIR PROYECTO</strong></p>

<pre>
<code class="language-bash">git rebase [rama]
</code></pre>

<p><strong>STASHING</strong></p>

<p><strong>Git</strong>&nbsp;dispone de un estado intermedio entre el staging area y el git directory llamado stashing. Este estado permite a git guardar cambios de forma temporal que pueden ser &uacute;tiles en caso de que no sea conveniente hacer un commit y sea necesario cambiar de rama y mantener temporalmente los cambios aparcados.</p>

<pre>
<code class="language-bash">git stash
</code></pre>

<pre>
<code class="language-bash">git stash list
</code></pre>

<pre>
<code class="language-bash">git stash apply stash@{[numerostash]}
</code></pre>

<p><strong>CHERRY PICK</strong></p>

<p>Cherry pick permite extraer un commit y establecerlo en otro lugar.</p>

<pre>
<code class="language-bash">git checkout [rama_destino]
</code></pre>

<pre>
<code class="language-bash">git cherry-pick [sha_commit]
</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/Awgz27IEAbM1Xrtyf1jgmhdDOHL9Dlo3gCMpKgwT.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 10
        ]);
        
        //46
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'GitHub',
            'slug' => 'github',
            'body_main' => 'La red social de desarrolladores de Git.',
            'body_plus' => '<p><strong>GitHub</strong>&nbsp;es un plataforma web que permite crear repositorios donde almacenar c&oacute;digo y administrarlo de forma sencilla y remota, pudiendo acceder desde cualquier dispositivo mediante el sistema Git. Con GitHub es posible compartir&nbsp;proyectos&nbsp;entre millones de usuarios que comparten sus repositorios, adem&aacute;s&nbsp;dispone de servicios de pago enfocados al entorno de empresa.</p>

<p>Crear un repositorio&nbsp; es realmente r&aacute;pido y sencillo. Solamente es necesario acceder a la plataforma, buscar la opci&oacute;n nuevo repositorio(New repository), que se encuentra en la secci&oacute;n de usuario en la barra de navegaci&oacute;n superior(men&uacute; desplegable).</p>

<p>Nota:&nbsp;Para acceder a la secci&oacute;n de usuario en la plataforma de GitHub es necesario disponer de una cuenta en&nbsp;GitHub.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666036472.png" style="height:249px; width:274px" /></p>

<p>Una vez pulsado el enlace de nuevo repositorio la plataforma redirige a un formulario, el cual, el &uacute;nico requisito necesario es a&ntilde;adir el nombre del repositorio.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666036554.png" style="height:84px; width:274px" /></p>

<p>Al pulsar el bot&oacute;n de Crear repositorio se crear&aacute; autom&aacute;ticamente el repositorio y aparecer&aacute; en la lista de repositorios de&nbsp;<strong>GitHub</strong>.</p>

<p><strong>CLONAR REPOSITORIO</strong></p>

<p>Git dispone del comando clone que permite clonar un repositorio externo al propio sistema, para ello, es requisito necesario a&ntilde;adir la ruta del repositorio.&nbsp;</p>

<pre>
<code class="language-bash">git clone [ruta_repositorio]
</code></pre>

<p>Los repositorios en&nbsp;<strong>GitHub</strong>&nbsp;incluyen un bot&oacute;n verde que al dar clic sobre &eacute;l despliega una ventana que proporciona tanto la ruta como la descarga del repositorio.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666036621.png" style="height:260px; width:431px" /></p>

<p>Existe la posibilidad de clonar un repositorio externo a nuestra cuenta, para ello GitHub dispone del bot&oacute;n Fork situado bajo la barra de navegaci&oacute;n superior.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666036672.png" style="height:81px; width:414px" /></p>

<p><strong>A&Ntilde;ADIR LLAVE SSH</strong></p>

<p>&nbsp;</p>

<p>Las llaves&nbsp;<strong>SSH</strong>&nbsp;se utilizan para poder identificar a un usuario que desea realizar cambios en sus repositorios. Mediante el comando&nbsp;<strong>ssh-keygen</strong>&nbsp;es posible generar una llave p&uacute;blica para despu&eacute;s a&ntilde;adirla a la lista de llaves en nuestra cuenta de GitHub. Para generar la llave es necesario a&ntilde;adir un correo electr&oacute;nico v&aacute;lido y para finalizar es necesario validar varias opciones. Estas opciones est&aacute;n relacionadas con la ruta de la llave, a&ntilde;adir una contrase&ntilde;a u omitirla,...</p>

<pre>
<code class="language-bash">ssh-keygen -t rsa -b 4096 -C "[correo_electrónico]"
</code></pre>

<p>Una vez generada la llave, solo queda a&ntilde;adirla&nbsp;a la lista de llaves de nuestra cuenta GitHub. Para poder&nbsp;copiarla se hace uso del comando cat (muestra el c&oacute;digo de la llave en pantalla) que permite copiar el c&oacute;digo manualmente, esto es, seleccionando con el mouse el c&oacute;digo y realizando la acci&oacute;n de copia (mediante &quot;Ctrl + C&quot; o &quot;clic derecho y copiar&quot;).</p>

<pre>
<code class="language-bash">cat ~/.ssh/id_rsa.pub
</code></pre>

<p>Con la llave copiada en el portapapeles solo queda a&ntilde;adirla al formulario de creaci&oacute;n de la nueva llave&nbsp;<strong>SSH</strong>. Para ello es necesario dirigirse a la&nbsp;secci&oacute;n de ajustes &quot;SSH and GPG keys&quot; que se puede llegar desde&nbsp;el men&uacute; desplegable del perfil de usuario y pulsando sobre&nbsp;ajustes(settings).</p>

<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666036772.png" style="height:563px; width:248px" /><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666036758.png" style="height:399px; width:184px" /></p>

<p>El bot&oacute;n de color verde &quot;New SSH key&quot; redirige al formulario de creaci&oacute;n de la nueva llave.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666037022.png" style="height:58px; width:767px" /></p>

<p>A continuaci&oacute;n se le asigna un t&iacute;tulo a la nueva llave&nbsp; y se pega el contenido de la llave copiada sobre el &aacute;rea de texto.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666037073.png" style="height:435px; width:761px" /></p>

<p><strong>CREAR ENLACE</strong></p>

<p>Mediante&nbsp;<strong>remote add</strong>&nbsp; es posible crear un enlace a un repositorio externo, para ello es necesario un nombre (por convenci&oacute;n origin) y la ruta tomada del repositorio.</p>

<pre>
<code class="language-bash">git remote add origin [ruta_repositorio]
</code></pre>

<p><strong>REVISAR LISTA</strong></p>

<pre>
<code class="language-bash">git remote -v
</code></pre>

<p><strong>ELIMINAR ENLACE</strong></p>

<pre>
<code class="language-bash">git remote remove origin
</code></pre>

<p><strong>OBTENER DATOS DE REPOSITORIO EXTERNO</strong></p>

<p>El comando&nbsp;<strong>fetch</strong>&nbsp;(adjuntando el nombre del enlace y la rama) pone a disposici&oacute;n los datos del repositorio. Para poder mezclarlos, al igual que en Git, se realiza mediante el comando&nbsp;<strong>merge</strong>.</p>

<pre>
<code class="language-bash">git fetch origin master
</code></pre>

<pre>
<code class="language-bash">git merge origin/master 
</code></pre>

<p>Nota: En caso de fatal:refusing to merge unrealted histories a&ntilde;adir la siguiente opci&oacute;n</p>

<pre>
<code class="language-bash">git merge origin/master --allow-unrelated-histories
</code></pre>

<p>El comando&nbsp;<strong>pull</strong>&nbsp;es equivalente a los comandos fetch y merge al mismo tiempo.</p>

<pre>
<code class="language-bash">git pull origin master
</code></pre>

<p><strong>ENVIAR DATOS A REPOSITORIO EXTERNO</strong></p>

<p>El comando&nbsp;<strong>push</strong>&nbsp;envia datos al repositorio externo.</p>

<p>Ejemplo enviando las versiones.</p>

<pre>
<code class="language-bash">git push origin master --tags
</code></pre>

<p>Ejemplo enviando una rama</p>

<pre>
<code class="language-bash">git push origin rama3
</code></pre>

<p>En ocasiones se cometen errores y al enviar un commit al repositorio de Github con push se quiere deshacer. Localmente es sencillo, se realiza un git reset con alguna de sus opciones y listo, pero al realizar un nuevo git push la consola devuelve un error, para ello existe la opci&oacute;n forzada.</p>

<pre>
<code class="language-bash">git push -f
</code></pre>

<p><strong>ISSUES Y PULL REQUESTS</strong></p>

<p>Los issues son informes&nbsp; que indican alg&uacute;n tipo de fallo del repositorio de GitHub. Los pull requests permiten realizar nuevos cambios de forma remota al repositorio. Tanto para issues como para pull requests es recomendable la creaci&oacute;n de plantillas que faciliten la creaci&oacute;n de nuevos issues y nuevos pull requests. Para ello es necesario crear un archivo con nombre issue_template.md y otro archivo con nombre pull_request_template.md. Se pueden crear desde la interface de GitHub.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666037333.png" style="height:83px; width:460px" /></p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666037343.png" style="height:54px; width:298px" /></p>

<pre>
<code class="language-bash">## Exposición del problema
Explicación paso a paso
## Tipo de navegador y versión
En caso de distintos navegadores especificar el navegador y su versión en el cual da fallo.</code></pre>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666037384.png" style="height:54px; width:299px" /></p>

<pre>
<code class="language-bash">#Descripción
¿Qué ha cambiado?
- [ ] Frontend
- [ ] Backend
- [ ] Configuración del server
#¿Cómo puedo probar los cambios?</code></pre>

<p>De esta forma al crear un nuevo issue o un nuevo pull request la plantilla se integra autom&aacute;ticamente.</p>

<p><strong>IGNORAR ARCHIVOS</strong></p>

<p>A menudo es necesario realizar cambios y a la vez ignorar archivos de nuestro repositorio para que no se muestren en el repositorio externo. Git dispone de una forma de ignorar estos archivos mediante la creaci&oacute;n del archivo .gitignore, incluyendo en &eacute;ste, los archivos a ignorar.</p>

<p><strong>PULL REQUEST</strong></p>

<p>Pull request es el proceso de revisi&oacute;n&nbsp;y aprobaci&oacute;n por parte del colaborador o colaboradores&nbsp;de los cambios en una rama alternativa&nbsp; antes de que se mezcle a la rama principal, teniendo en cuenta, que &eacute;sta debe estar protegida.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/aA3x79AjX6yYqhhvWPZ089SPRC1jJ6BQMNmKvY4t.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 10
        ]);

        //47
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Componentes Angular',
            'slug' => 'componentes-angular',
            'body_main' => 'Componentes de Angular',
            'body_plus' => '<p><strong>FORMULARIOS EN ANGULAR</strong></p>

<p>Los formularios Angular son formularios html con un conjunto de funcionalidades a&ntilde;adidas por Angular.</p>

<p>Para crear un formulario Angular es necesario asignarle un nombre al formulario(en este caso formUsuario) a continuaci&oacute;n de una almohadilla o hashtag(#) y a continuaci&oacute;n, indic&aacute;ndole que es un tipo de formulario de tipo Angular (&quot;ngForm&quot;), dentro de la etiqueta form.</p>

<p>Ejemplo de formulario&nbsp;</p>

<pre>
<code class="language-html">&lt;form #formUsuario= "ngForm"&gt;
     &lt;label for = "user"&gt;Nombre&lt;/label&gt;&lt;br&gt;
    &lt;input type="text" name="nombre"&gt;
    &lt;input type="submit" value="Enviar"&gt;
&lt;/form&gt;</code></pre>

<p>Capturar un evento en un formulario Angular es muy sencillo mediante la directiva (ngSubmit). Se a&ntilde;ade la directiva y se le asigna un m&eacute;todo desde la clase del componente (&quot;onSubmit&quot;) donde se maneja la captura del evento submit.</p>

<pre>
<code class="language-javascript">&lt;form #formUsuario= "ngForm" (ngSubmit) = "onSubmit()"&gt;
         &lt;label for = "user"&gt;Nombre&lt;/label&gt;&lt;br&gt;
        &lt;input type="text" name="nombre"&gt;
        &lt;input type="submit" value="Enviar"&gt;
    &lt;/form&gt;</code></pre>

<pre>
<code class="language-javascript">import { Component, OnInit } from "@angular/core";
import { User } from "usuario/user.component";
@Component({
  selector: "ed-usuario",
  templateUrl: "./usuario.component.html",
  styleUrls: ["./usuario.component.css"]
})
export class UsuarioComponent implements OnInit {
    public usuario:User;
  
  constructor() {
    this.usuario= new User(" "," "," "," ");
   }
  ngOnInit() {
  }
  onSubmit(form){
    console.log("Evento capturado");
  }
}</code></pre>

<p>De igual forma que el formulario los campos se convierten a campos de tipo Angular identificando con un nombre el campo y asign&aacute;ndole&nbsp;<strong>ngModel</strong>. Tambi&eacute;n es posible aplicar a los campos la funcionalidad de Angular denominada two data-binding&nbsp;a&ntilde;adiendo la directiva [(ngModel)] y asign&aacute;ndole el dato que viene del componente( en el ejemplo el dato es la propiedad nombre del objeto usuario).</p>

<pre>
<code class="language-html">&lt;form #formUsuario= "ngForm" (ngSubmit) = "onSubmit()"&gt;
             &lt;label for = "user"&gt;Nombre&lt;/label&gt;&lt;br&gt;
            &lt;input type="text" name="nombre" #nombre="ngModel" [(ngModel)] = "usuario.nombre"&gt;
            &lt;input type="submit" value="Enviar"&gt;
        &lt;/form&gt;
</code></pre>

<p><strong>VALIDACI&Oacute;N</strong></p>

<p>La validaci&oacute;n de un campo en Angular se puede obtener a&ntilde;adiendo una directiva&nbsp;<strong>ngIf</strong>&nbsp;a un nuevo elemento. Este elemento que se encarga de mostrar el mensaje de validaci&oacute;n se puede coordinar mediante los atributos&nbsp;<strong>required</strong>&nbsp;y&nbsp;<strong>pattern</strong>&nbsp;(atributos nativos de html) del campo a validar.</p>

<pre>
<code class="language-html">&lt;form #formUsuario= "ngForm" (ngSubmit) = "onSubmit()"&gt;
    &lt;label for = "user"&gt;Nombre&lt;/label&gt;&lt;br&gt;
    &lt;input type="text" name="nombre" #nombre="ngModel" [(ngModel)] = "usuario.nombre" required pattern="[a-zA-Z]+"&gt;
    &lt;span *ngIf = "nombre.touched &amp;&amp; !nombre.valid"&gt;
        Debe escribir un nombre
    &lt;/span&gt;
    &lt;input type="submit" value="Enviar"&gt;
&lt;/form&gt;</code></pre>

<p>Con Angular es posible a&ntilde;adir funcionalidades al formulario como desactivar temporalmente el bot&oacute;n de submit mediante la directiva&nbsp;[disabled]&nbsp;o resetear el formulario mediante la inclusi&oacute;n del par&aacute;metro identificativo del formulario en el m&eacute;todo onSubmit().</p>

<p>En el ejemplo siguiente se puede observar como el identificador del formulario&nbsp;formUsuario&nbsp;es pasado como par&aacute;metro en el m&eacute;todo onSubmit, esto exige a&ntilde;adir un par&aacute;metro en el m&eacute;todo declarado en el componente.</p>

<pre>
<code class="language-html">&lt;form #formUsuario= "ngForm" (ngSubmit) = "onSubmit(formUsuario)"&gt;
        &lt;label for = "user"&gt;Nombre&lt;/label&gt;&lt;br&gt;
        &lt;input type="text" name="nombre" #nombre="ngModel" [(ngModel)] = "usuario.nombre" required pattern="[a-zA-Z]+"&gt;
        &lt;span *ngIf = "nombre.touched &amp;&amp; !nombre.valid"&gt;
            Debe escribir un nombre
        &lt;/span&gt;
        &lt;input type="submit" value="Enviar" [disabled] = "!formUsuario.form.valid"&gt;
    &lt;/form&gt;</code></pre>

<p>ViewChild()</p>

<p>ViewChild&nbsp;es un decorador de propiedades de Angular. Con este decorador es posible obtener valores o ejecutar m&eacute;todos entre componentes (padre e hijo), acceso a directivas y acceso a propiedades de elementos html.</p>

<p>Ejemplo de acceso a elemento html</p>

<pre>
<code class="language-javascript">import { Component, OnInit, ViewChild } from "@angular/core";
        @Component({
          selector: "ed-page",
          templateUrl: "./pagecomponent.html",
          styleUrls: ["./page.component.css"]
        })
        export class PageComponent implements OnInit {
            @ViewChild("div_prueba") prueba_viewchild;
          constructor() {    
          }
          ngOnInit() {
            var con_javascript = console.log(document.getElementById("id_con_javascript").innerHTML);
            console.log(this.prueba_viewchild.nativeElement.innerText);
            console.log(this.prueba_viewchild.nativeElement.innerHTML);
          }
        }</code></pre>

<pre>
<code class="language-html">&lt;div&gt;
      &lt;div id="id_con_javascript" #div_prueba&gt;
        &lt;p&gt;Texto exclusivo para prueba de ViewChild&lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/eoSaZ6VtrLAg4lhI1fI6eBzFU24eUvydmoku5d4P.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //48
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'MongoDB',
            'slug' => 'mongodb',
            'body_main' => 'MongoDB uno de los grandes sistemas de bases de datos NOSQL.',
            'body_plus' => '<p><strong>MongoDB</strong>&nbsp;es un sistema de base de datos basado en colecciones de documentos y uno de los sistemas de bases de datos NOSQL m&aacute;s utilizados. La estructura de MongoDB se basa en BSON (Binary JSON) que es un tipo de documento similar a JSON (al que se le ha a&ntilde;adido nuevos tipos de datos) que ofrecen un mejor rendimiento en bases de datos. A diferencia de los sistemas SQL, MongoDB no dispone de una estructura fija, tablas relacionales y tampoco emplea el lenguaje SQL si no que utiliza Javascript y ordena los datos en colecciones, que pueden contener documentos (objetos BSON) con un esquema variable, es decir, que dentro de una colecci&oacute;n puede haber documentos que contengan campos distintos.&nbsp;</p>

<p>A continuaci&oacute;n se muestra un ejemplo de una tabla en MySQL y un ejemplo de una colecci&oacute;n en MongoDB.</p>

<p>Ejemplo de tabla Usuarios en MySQL</p>

<pre>
<code class="language-bash">+---------------------------+-------------------------------+
| name                      | email                         |
+---------------------------+-------------------------------+
| Frederique Jacobson I     | scremin@example.net           |
| Mr. Buck Brakus           | swolf@example.org             |
| Ms. Tia Wintheiser        | cblanda@example.com           |
| Dr. Vincent Feeney Sr.    | langworth.stacy@example.com   |
| Rebeca Dietrich           | kasey06@example.net           |</code></pre>

<p>Ejemplo de tabla Usuarios en MongoDB</p>

<pre>
<code class="language-bash">Usuarios:
{   
    name: "Frederique Jacobson I",
    email: "scremin@example.net"
},
{   
    name: "Mr. Buck Brakus",
    email: "swolf@example.org"
},
{   
    name: "Ms. Tia Wintheiser",
    email: "cblanda@example.com"
},
{   
    name: "Dr. Vincent Feeney Sr.",
    email: "langworth.stacy@example.com"
},
{   
    name: "Rebeca Dietrich",
    email: "kasey06@example.net"
}</code></pre>

<p><strong>INSTALAR MONGODB</strong></p>

<p><strong>Instalaci&oacute;n en Linux mediante repositorios (Debian)</strong></p>

<ul>
    <li>Agregar llave p&uacute;blica</li>
</ul>

<pre>
<code class="language-bash">wget -qO - https://www.mongodb.org/static/pgp/server-4.4.asc | sudo apt-key add -
</code></pre>

<ul>
    <li>Crear el archivo&nbsp;<strong>/etc/apt/sources.list.d/mongodb-org-4.4.list&nbsp;</strong>a&ntilde;adiendo el c&oacute;digo correspondiente a la distribuci&oacute;n de Debian</li>
</ul>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Debian 9</p>

<pre>
<code class="language-bash">echo "deb http://repo.mongodb.org/apt/debian stretch/mongodb-org/4.4 main" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.4.list
</code></pre>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Debian 10</p>

<pre>
<code class="language-bash">echo "deb http://repo.mongodb.org/apt/debian buster/mongodb-org/4.4 main" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.4.list
</code></pre>

<ul>
    <li>Actualizar repositorios</li>
</ul>

<pre>
<code class="language-bash">apt update
</code></pre>

<ul>
    <li>Instalar MongoDB</li>
</ul>

<pre>
<code class="language-bash">sudo apt install -y mongodb-org
</code></pre>

<p>(versiones anteriores)</p>

<pre>
<code class="language-bash">sudo apt install mongodb
</code></pre>

<p>Para m&aacute;s informaci&oacute;n sobre la instalaci&oacute;n en las distintas plataformas y distribuciones, la p&aacute;gina&nbsp;oficial de MongoDB&nbsp;dispone de documentaci&oacute;n detallada.</p>

<p><strong>Instalaci&oacute;n en Linux mediante paquete de instalaci&oacute;n</strong></p>

<p>Descargar el paquete desde la&nbsp;p&aacute;gina oficial de MongoDB</p>

<p>En Debian y Ubuntu MongoDB crea&nbsp;el archivo de configuraci&oacute;n&nbsp;<strong>/etc/mongod.conf&nbsp;</strong>y&nbsp;almacena los datos y registros en&nbsp;<strong>/var/lib/mongodb</strong>&nbsp;y&nbsp;<strong>/var/log/mongodb</strong>&nbsp;respectivamente.</p>

<p>Nota: Si existe una versi&oacute;n instalada es recomendable desinstalarla antes de instalar MongoDB.&nbsp;Adem&aacute;s del paquete server es recomendable el paquete shell para disponer de la consola de MongoDB.</p>

<p><strong>Instalaci&oacute;n en Windows mediante paquete de instalaci&oacute;n</strong></p>

<p>Descargar el paquete desde la p&aacute;gina oficial de&nbsp;MongoDB.&nbsp;La instalaci&oacute;n ofrece la opci&oacute;n personalizada (Custom) que permite modificar la ruta y desactivar la opci&oacute;n de instalar como servicio (marcada por defecto) que conlleva que el demonio de MongoDB se encuentre arrancado cada vez que se inicia el sistema.</p>

<p><strong>INICIAR MONGODB</strong></p>

<p>Para iniciar&nbsp;<strong>MongoDB</strong>&nbsp;es necesario ejecutar desde la carpeta de instalaci&oacute;n el archivo mongod mientras que para iniciar la consola de MongoDB es necesario ejecutar el archivo mongo.</p>

<p>Iniciar demonio en Linux</p>

<pre>
<code class="language-bash">mongod
</code></pre>

<p>Con el servicio de MongoDB iniciado es posible acceder a su consola desde otra terminal</p>

<pre>
<code class="language-bash">mongo
</code></pre>

<p>Es posible que al arrancar el demonio, se encuentre ya iniciado devolviendo alguna l&iacute;nea de error similar a la siguiente:</p>

<pre>
<code class="language-bash">NETWORK  [initandlisten]   addr already in use
</code></pre>

<p>La l&iacute;nea anterior indica que MongoDB ya est&aacute; iniciado, para solucionarlo detenemos el servicio.</p>

<pre>
<code class="language-bash">sudo systemctl stop mongodb
</code></pre>

<p>Y lo volvemos a iniciar.</p>

<pre>
<code class="language-bash">mongod
</code></pre>

<p>Nota:&nbsp;En algunas versiones de MongoDB es necesaria la creaci&oacute;n del directorio /data/db en la ra&iacute;z del sistema</p>

<p>Iniciar demonio en Windows</p>

<p>Ejecutar el archivo&nbsp;mongod.exe&nbsp;para arrancar el demonio y&nbsp;mongo.exe&nbsp;para la consola, ubicados en la ruta asignada durante la instalaci&oacute;n que por defecto es&nbsp;C:/Archivos de programa/MongoDB/Server/[versi&oacute;n]/bin/</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/VzSAHcNc3R2BZ78OUT8tMzSs9YbTJcT85kLNbkW2.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 11
        ]);
        //49
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'NodeJS y NPM',
            'slug' => 'nodejs-y-npm',
            'body_main' => 'NodeJS, Javascript del lado del servidor.',
            'body_plus' => '<p><strong>NodeJS</strong>&nbsp;es un entorno de programaci&oacute;n en tiempo de ejecuci&oacute;n, multiplataforma, basado en lenguaje Javascript y en el motor Chrome v8. Gestionado mediante eventos, permite realizar aplicaciones web&nbsp; a trav&eacute;s de peticiones as&iacute;ncronas y a diferencia de otras librer&iacute;as similares destaca por su gran rendimiento con la ayuda del motor de Javascript (v8) creado por Google.&nbsp;</p>

<p>A continuaci&oacute;n se indica como realizar la instalaci&oacute;n de NodeJS como tambi&eacute;n la instalaci&oacute;n de dependencias b&aacute;sicas de NodeJS.</p>

<p><strong>INSTALAR NODE</strong></p>

<p><strong>Linux</strong></p>

<ul>
    <li>Instalaci&oacute;n en Debian (con acceso root)</li>
</ul>

<pre>
<code class="language-bash">curl -sL https://deb.nodesource.com/[version] | bash -
apt-get install -y nodejs</code></pre>

<ul>
    <li>Instalaci&oacute;n en Debian con wget (con acceso root)</li>
</ul>

<pre>
<code class="language-bash">wget -qO- https://deb.nodesource.com/setup_14.x | bash -
apt-get install -y nodejs
</code></pre>

<ul>
    <li>Instalaci&oacute;n en Ubuntu</li>
</ul>

<pre>
<code class="language-bash">curl -sL https://deb.nodesource.com/[version] | sudo -E bash -
sudo apt-get install -y nodej</code></pre>

<p>Instrucciones de instalaci&oacute;n de las distintas versiones&nbsp;aqu&iacute;.</p>

<p><strong>Windows</strong>&nbsp;</p>

<p>Descargar instalador desde la secci&oacute;n de descargas de la p&aacute;gina de&nbsp;NodeJS</p>

<p><strong>Versi&oacute;n</strong></p>

<pre>
<code class="language-bash">node -v
</code></pre>

<p><strong>ACTUALIZAR NODE&nbsp;</strong></p>

<ul>
    <li>Con npm&nbsp;(con acceso root)</li>
</ul>

<pre>
<code class="language-bash">npm cache clean -f
npm install -g n</code></pre>

<p><strong>Versi&oacute;n a actualizar</strong></p>

<ul>
    <li>&Uacute;ltima versi&oacute;n estable</li>
</ul>

<pre>
<code class="language-bash">n stable
</code></pre>

<ul>
    <li>&Uacute;ltima versi&oacute;n</li>
</ul>

<pre>
<code class="language-bash">n latest
</code></pre>

<ul>
    <li>Espec&iacute;fica</li>
</ul>

<pre>
<code class="language-bash">n [x.x]
</code></pre>

<p><strong>CONSOLA DE NODEJS</strong></p>

<p>Para acceder a la consola es suficiente con introducir la palabra node desde la terminal.</p>

<pre>
<code class="language-bash">node
</code></pre>

<p><strong>NPM</strong>&nbsp;</p>

<p>Es el gestor de paquetes de NodeJS y viene incluido en el paquete instalador de NodeJS. NPM permite la instalaci&oacute;n de m&oacute;dulos, los cuales se pueden buscar desde el buscador de&nbsp;NPM.</p>

<p><strong>COMPROBAR VERSI&Oacute;N NPM</strong></p>

<pre>
<code class="language-bash">npm -v
</code></pre>

<p><strong>CREAR PROYECTO</strong></p>

<pre>
<code class="language-bash">npm init
</code></pre>

<p>El comando init genera el archivo&nbsp;package.json&nbsp;con un contenido&nbsp;similar al que se muestra en la siguiente ventana de c&oacute;digo.</p>

<pre>
<code class="language-bash">{
  "name": "proyecto_prueba",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" &amp;&amp; exit 1"
  },
  "author": "",
  "license": "MIT"
}</code></pre>

<p><strong>Comprobar versi&oacute;n de NPM</strong></p>

<pre>
<code class="language-bash">npm -v
</code></pre>

<p><strong>Actualizar a la &uacute;ltima versi&oacute;n estable de NPM</strong></p>

<pre>
<code class="language-bash">npm install -g npm@latest

</code></pre>

<p><strong>Actualizar a la &uacute;ltima versi&oacute;n de npm</strong></p>

<pre>
<code class="language-bash">npm install -g npm@next
</code></pre>

<p><strong>Actualizar a una versi&oacute;n espec&iacute;fica</strong></p>

<pre>
<code class="language-bash">npm install -g npm@[X.X]
</code></pre>

<p><strong>Limpiar cach&eacute;</strong>&nbsp;(recomendado en la instalaci&oacute;n de paquetes)</p>

<pre>
<code class="language-bash">npm cache clean -f
</code></pre>

<p><strong>Desactivar auditor&iacute;as de NPM</strong></p>

<pre>
<code class="language-bash">npm set audit false
</code></pre>

<p><strong>INSTALACI&Oacute;N DE DEPENDENCIAS B&Aacute;SICAS PARA NODEJS</strong></p>

<p>La instalaci&oacute;n de dependencias se realiza mediante el gestor NPM y a&ntilde;adiendo el comando install seguido del nombre de la dependencia. En versiones anteriores es necesaria la opci&oacute;n&nbsp;--save&nbsp;o&nbsp;-s,&nbsp;sin embargo en las &uacute;ltimas versiones esta opci&oacute;n no es necesaria.</p>

<p><strong>INSTALAR EXPRESS</strong></p>

<pre>
<code class="language-bash">npm install express --save
</code></pre>

<p>La instalaci&oacute;n de Express permite trabajar con el protocolo http, permite definir rutas, etc...</p>

<p><strong>INSTALAR BODY-PARSER</strong></p>

<pre>
<code class="language-bash">npm install body-parser --save
</code></pre>

<p><strong>Body-parser&nbsp;</strong>permite convertir peticiones a objetos JSON</p>

<p><strong>INSTALAR CONNECT-MULTIPARTY</strong></p>

<pre>
<code class="language-bash">npm install connect-multiparty --save
</code></pre>

<p><strong>Connect-multiparty</strong>&nbsp;permite manejar archivos para subirlos al servidor</p>

<p><strong>INSTALAR MONGOOSE</strong></p>

<pre>
<code class="language-bash">npm install mongoose --save
</code></pre>

<p><strong>Mongoose&nbsp;</strong>dispone de una serie de m&eacute;todos que facilitan el intercambio de datos con MongoDB.</p>

<p><strong>INSTALAR NODEMON</strong></p>

<pre>
<code class="language-bash">npm install nodemon --save-dev
</code></pre>

<p><strong>Nodemon</strong>&nbsp;detecta cambios en el c&oacute;digo y en consecuencia reinicia el servidor para actualizar los cambios. Es necesario a&ntilde;adirlo&nbsp;a la propiedad start&nbsp;del objeto scripts en el archivo package.json</p>

<pre>
<code class="language-bash">"scripts": {
    "test": "echo \"Error: no test specified\" &amp;&amp; exit 1",
    "start": "nodemon index.js"</code></pre>

<p><strong>INSTALAR MOMENT</strong></p>

<pre>
<code class="language-bash">npm install moment
</code></pre>

<p>Moment permite crear fechas y formatearlas en distintos formatos.</p>

<p><strong>DESINSTALAR DEPENDENCIAS</strong></p>

<p>Desinstalar una dependencia es similar a instalar, basta con sustituir el comando install por&nbsp;uninstall.</p>

<p><strong>DESINSTALAR EXPRESS</strong></p>

<pre>
<code class="language-bash">npm uninstall express
</code></pre>

<p><strong>AUTOMATIZACI&Oacute;N DE TAREAS</strong></p>

<p>NPM permite automatizar tareas desde el archivo package.json. Para ello es necesario a&ntilde;adir dicha tarea o tareas en la secci&oacute;n de scripts. A continuaci&oacute;n un ejemplo que a&ntilde;ade dos tareas.</p>

<pre>
<code class="language-bash">{
  "name": "proyecto_prueba",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" &amp;&amp; exit 1",
    "tarea" : "npm audit &amp;&amp; node index.js"
  },
  "author": "",
  "license": "MIT"
}</code></pre>

<p>Para realizar la tarea o tareas es necesario incluir el comando run seguido del nombre de la propiedad asignada</p>

<pre>
<code class="language-bash">npm run tarea
</code></pre>

<p><strong>OBJETOS ESPECIALES DEL ENTORNO DE NODE</strong></p>

<p><strong>Buffer</strong></p>

<p>Permite manejar archivos binarios</p>

<pre>
<code class="language-javascript">console.log(Buffer(10));
</code></pre>

<p><strong>Process</strong></p>

<p>Muestra informaci&oacute;n del proceso de Node que se est&aacute; ejecutando, informaci&oacute;n del sistema, recursos,...&nbsp;</p>

<pre>
<code class="language-javascript">console.log(process.platform);
console.log(process.execPath);
console.log(process.env);
process.env.colorFavorito = "rojo";
console.log(process.env.colorFavorito);</code></pre>

<p><strong>IMPORTAR PAQUETES EXTERNOS</strong></p>

<p>Importar un paquete externo suele ser una tarea rutinaria en el entorno Node. Para importar un paquete es necesario instalarlo desde la terminal con&nbsp;NPM&nbsp;y desde el archivo JS realizar la llamada o require al archivo.&nbsp;&nbsp;</p>

<p><strong>Instalar paquete</strong></p>

<pre>
<code class="language-bash">npm install express
</code></pre>

<p><strong>Importar paquete</strong></p>

<pre>
<code class="language-javascript">var express = require("express");
</code></pre>

<p>En caso de error es posible comprobar si el paquete est&aacute; correctamente instalado o si el nombre es el mismo que se est&aacute; importando. Para ello se despliega la carpeta node_modules y en su interior se revisa&nbsp; si existe la carpeta o si &eacute;sta tiene un nombre distinto.&nbsp;</p>

<p><strong>IMPORTAR PAQUETES LOCALES</strong></p>

<p>Importar un paquete del propio proyecto es pr&aacute;cticamente igual que un paquete externo, la &uacute;nica diferencia es la ruta, ya que si solamente se indica el nombre del m&oacute;dulo o paquete, Node autom&aacute;ticamente buscar&aacute; en el directorio de dependencias&nbsp;<strong>node_modules</strong>, por tanto, es necesario especificar la ruta exacta del m&oacute;dulo. A continuaci&oacute;n un ejemplo de un m&oacute;dulo b&aacute;sico que se encuentra en la ra&iacute;z del proyecto y un archivo desde donde se llama al m&oacute;dulo que tambi&eacute;n se encuentra en la ra&iacute;z.&nbsp;</p>

<p><strong>modulo.js</strong></p>

<pre>
<code class="language-javascript">var modulo = {
    saludar: function(nombre){
        console.log("Bienvenido " + nombre);
    },
    despedir: function(nombre){
        console.log("Adiós " + nombre);
    }
}
module.exports = modulo;</code></pre>

<p><strong>app.js</strong></p>

<pre>
<code class="language-javascript">var modulo = require("./modulo");
modulo.saludar(Jose);</code></pre>

<p>De esta forma Node permite importar los m&oacute;dulos de una forma realmente sencilla, tal como incluye la l&iacute;nea final del c&oacute;digo anterior (del archivo de ejemplo&nbsp;<strong>modulo.js),</strong>&nbsp;es imprescindible asignar el m&oacute;dulo y en caso de ser m&aacute;s de uno indicarlo como un objeto.</p>

<pre>
<code class="language-javascript">module.exports = {
    modulo,
    moduloDos,
    moduloTres,
}</code></pre>

<p><strong>PAQUETES PREINSTALADOS DE NODE</strong></p>

<p>Node dispone de algunas dependencias ya preinstaladas que suelen ser las m&aacute;s comunes y &uacute;tiles en un proyecto. M&oacute;dulos como&nbsp;<strong>http</strong>&nbsp;y&nbsp;<strong>url&nbsp;</strong>para&nbsp;archivos externos,&nbsp;<strong>path&nbsp;</strong>y&nbsp;<strong>fs&nbsp;</strong>para archivos internos<strong>, util&nbsp;</strong>que permite comprobar tipos de datos o module que permite exportar m&oacute;dulos locales, se pueden consultar los m&oacute;dulos desde la p&aacute;gina oficial de&nbsp;NodeJS.</p>

<p><strong>CONEXI&Oacute;N CON BASE DE DATOS</strong></p>

<p>La conexi&oacute;n con la base de datos se realiza con&nbsp;Mongoose&nbsp;mediante su m&eacute;todo connect.</p>

<p>Ejemplo de prueba de conexi&oacute;n con base de datos con Mongoose en forma de promesa.</p>

<pre>
<code class="language-javascript">"use strict"
var mongoose = require("mongoose");
mongoose.Promise = global.Promise;
mongoose.connect("mongodb://localhost:27017/[base_datos]")
    .then(() =&gt; {
        console.log("Conexión a la base de datos establecida satisfactoriamente");
    })
    .catch(err =&gt; console.log(err));</code></pre>

<p>Para comenzar la ejecuci&oacute;n de un proyecto NodeJS y comprobar la correcta conexi&oacute;n es posible mediante&nbsp;ng serve</p>

<pre>
<code class="language-bash">ng serve
</code></pre>

<p>O si se est&aacute; en la fase de desarrollo&nbsp;usando nodemon&nbsp;es posible mediante&nbsp;npm start&nbsp;</p>

<pre>
<code class="language-bash">npm start
</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/vrK3jQwQGMx8UgGQpoUILQXa0qtSt8P7kByJKM4R.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 12
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 17
        ]);
        //50
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'LocalStorage y SessionStorage',
            'slug' => 'localstorage-y-sessionstorage',
            'body_main' => 'LocalStorage y SessionStorage (Las cookies de Html5)',
            'body_plus' => '<p><strong>LOCALSTORAGE Y SESSIONSTORAGE</strong></p>

<p>La API de Almacenamiento Web (WebStorage) es una librer&iacute;a de almacenamiento web que ofrece dos propiedades (<strong>LocalStorage</strong>&nbsp;y&nbsp;<strong>SessionStorage</strong>) que permiten almacenar datos en el navegador del cliente llegando a superar los 5MB. LocalStorage mantiene los datos por tiempo indefinido mientras que SessionStorage elimina los datos cuando se cierra la p&aacute;gina o pesta&ntilde;a. Los datos, que se almacenan en formato tipo clave-valor, deben siempre ser almacenados en cadenas de texto (en el caso de objetos JSON ser&aacute; necesario convertirlos a string). Una de las diferencias a destacar respecto a las cookies es, que al residir en el navegador del cliente, &eacute;stas no necesitan realizar peticiones al servidor.&nbsp;</p>

<p>Nota: Es recomendable, por temas de compatibilidad (IE6, IE7,...) en navegadores anteriores, crear una condici&oacute;n para comprobar si el navegador del cliente soporta LocalStorage.</p>

<p>En el siguiente ejemplo se muestra la comprobaci&oacute;n de LocalStorage en el navegador y distintos m&eacute;todos de LocalStorage que permiten almacenar, obtener y eliminar.</p>

<pre>
<code class="language-javascript">//comprobación de compatibilidad
if(typeof(Storage) === "undefined"){
    alert("El navegador no soporta LocalStorage");
    return false;
}
//almacenando datos
localStorage.setItem("nombre", "Alejandro");
//obteniendo datos
document.getElementById("name").innerHTML = localStorage.getItem("nombre");
//eliminando datos
localStorage.removeItem("nombre");
//eliminando todos los datos
localStorage.clear();</code></pre>

<p>El c&oacute;digo de abajo muestra el mismo proceso pero manejando objetos.</p>

<pre>
<code class="language-javascript">var coche = { 
    color: "Rojo",
    puertas: "5",
    modelo: "Sport"
}
//Convirtiendo objeto a string
var cocheConvertido = JSON.stringify(coche);
//almacenando objeto
localStorage.setItem("coche", cocheConvertido);
//Convirtiendo string a objeto
var cocheRecuperado = JSON.parse(localStorage.getItem("coche");
//Obteniendo propiedad del objeto
document.getElementById("div").innerHTML = "Color: "+ cocheRecuperado.color;
</code></pre>

<p>componente html</p>

<pre>
<code class="language-html">&lt;!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Curso Javascript&lt;/title&gt;
        &lt;script type="text/javascript" src="localstorage.js"&gt;&lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;div id="div"&gt;&lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/KTSE2rtymP1oKHKZvLTxocdb44Ts2wbOG1vthRnN.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        //51
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'JQuery',
            'slug' => 'jquery',
            'body_main' => 'JQuery la librería multiplataforma de Javascript.',
            'body_plus' => '<p><strong>JQuery</strong>&nbsp;es una librer&iacute;a basada en Javascript que simplifica y facilita la programaci&oacute;n de c&oacute;digo de Javascript. JQuery permite manejar el DOM, lanzar y capturar eventos, realizar animaciones, peticiones Ajax, etc... de una forma m&aacute;s simplificada que en Javascript. JQuery fue lanzada en 2006 y es la librer&iacute;a m&aacute;s utilizada y popular de Javascript. Dispone de miles de plugins de todo tipo, creados por desarrolladores independientes y f&aacute;ciles de implementar en cualquier web.</p>

<p><strong>A&Ntilde;ADIR JQUERY</strong></p>

<p>Existen varias opciones para a&ntilde;adir JQuery a un proyecto. Una de ellas es descargar la &uacute;ltima versi&oacute;n desde la web de&nbsp;JQuery&nbsp;y&nbsp;almacenarla en el proyecto.Tambi&eacute;n es posible&nbsp;descargar una versi&oacute;n anterior desde&nbsp;JQuery.</p>

<pre>
<code class="language-html">&lt;!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale= 1.0"&gt;
        &lt;title&gt;JQuery&lt;/title&gt;       
        &lt;script type="text/javascript" src="js/jquery-3.4.1.min.js"&gt;&lt;/script&gt;       
    &lt;/head&gt;
    &lt;body&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Otra opci&oacute;n es mediante&nbsp;CDN</p>

<pre>
<code class="language-html">&lt;!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale= 1.0"&gt;
        &lt;title&gt;JQuery&lt;/title&gt;       
        &lt;script
              src="//code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"&gt;               
        &lt;/script&gt;
        &lt;script type="text/javascript" src="js/jquery-3.4.1.min.js"&gt;&lt;/script&gt;       
    &lt;/head&gt;
    &lt;body&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Otra opci&oacute;n es mediante&nbsp;gestores de paquetes como&nbsp;Npm&nbsp;o&nbsp;Bower</p>

<pre>
<code class="language-bash">npm install jquery
</code></pre>

<pre>
<code class="language-bash">bower install jquery
</code></pre>

<p><strong>SELECTORES</strong></p>

<p>Los selectores son mecanismos de JQuery que permiten acceder y manejar elementos del DOM mediante distintos tipos de referencias como pueden ser el nombre de identificador, el nombre de la clase, el nombre del elemento, etc... Existen varios tipos de selectores que se diferencian por el tipo de referencia indicado.<br />
&nbsp;</p>

<ul>
    <li>Selectores de Identificador&nbsp;</li>
</ul>

<p>Los selectores de idenficador&nbsp;(ID) acceden a los elementos mediante el atributo de identificador como referencia ( al igual que en CSS ), a&ntilde;adi&eacute;ndole una almohadilla al comienzo.</p>

<pre>
<code class="language-html">&lt;div id="contenedor"&gt;
    Mi contenedor
&lt;/div&gt;
&lt;script&gt;
    var texto = $("#contenedor").text();
    console.log(contenedor);
&lt;/script&gt;</code></pre>

<ul>
    <li>Selectores de clase</li>
</ul>

<p>Los selectores de clase acceden a los elementos mediante el atributo de clase como referencia ( al igual que en CSS ) a&ntilde;adi&eacute;ndole un punto al comienzo.</p>

<pre>
<code class="language-html">&lt;div class="contenedor"&gt;
    Mi contenedor es verde
&lt;/div&gt;
&lt;script&gt;
    var contenedor =$(".contenedor").css("background","green");
&lt;/script&gt;</code></pre>

<ul>
    <li>Selectores de etiqueta</li>
</ul>

<p>Los selectores de etiqueta acceden a los elementos mediante el nombre de la etiqueta (tag) como referencia.</p>

<pre>
<code class="language-html">&lt;p id= "rojo"&gt;Ejercicios de JQuery&lt;/p&gt;
&lt;p id="amarillo" class="zebra"&gt;Practicando&lt;/p&gt;
&lt;p id = "verde" class="otro"&gt;Verde&lt;/p&gt;  
&lt;p class="zebra " &gt;Soy un párrafo blanco&lt;/p&gt;
&lt;script&gt;
    var parrafos = $("p");
    parrafos.click(function(){
        $(this).removeClass("zebra");
    });
&lt;/script&gt;
</code></pre>

<ul>
    <li>Selectores de atributos</li>
</ul>

<p>Los selectores de atributos acceden a los elementos mediante un atributo de un elemento</p>

<p>Junto a los selectores anteriores existen opciones que permiten seleccionar la posici&oacute;n del elemento a manejar.</p>

<pre>
<code class="language-html">&lt;ul&gt;
    &lt;li&gt;&lt;a href="//www.eltiempo.es" title = "Tiempo"&gt;El Tiempo&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="//www.elpais.com" title="ElPaís"&gt;Ir a El País&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="//www.jquery.com" title="JQuery" manolo="inventado"&gt;Ir a JQuery&lt;/a&gt;&lt;/li&gt;       
&lt;/ul&gt;
&lt;div&gt;Div de prueba&lt;/div&gt;
&lt;script&gt;
    $("a:first").css("color","red");
    $("ul li:eq(3)").css("background","yellow");
    $("ul div").addClass("fondoazul");
&lt;/script&gt;
</code></pre>

<p>Nota: Recomendable visitar el blog&nbsp;ANER_BARRENA&nbsp;donde se muestran muchas opciones como&nbsp;selectores para input tipo file, tipo submit, selectores para seleccionar el elemento padre o el hijo, elementos img,etc...</p>

<p><strong>M&eacute;todo find</strong></p>

<p>El m&eacute;todo find permite realizar una b&uacute;squeda en un selector mediante el par&aacute;metro indicado</p>

<pre>
<code class="language-html">&lt;ul&gt;
    &lt;li&gt;&lt;a href="//www.eltiempo.es" title = "Tiempo"&gt;El Tiempo&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="//www.elpais.com" title="ElPais"&gt;Ir a El País&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="//www.jquery.com" title="JQuery" manolo="inventado"&gt;Ir a JQuery&lt;/a&gt;&lt;/li&gt;       
&lt;/ul&gt;
&lt;div&gt;Div de prueba&lt;/div&gt;
&lt;script&gt;
    $("ul").find("[title = "ElPais"]");
&lt;/script&gt;</code></pre>

<p><strong>M&eacute;todo parent</strong></p>

<p>El m&eacute;todo parent permite saltar al elemento padre del selector</p>

<pre>
<code class="language-html">&lt;ul&gt;
    &lt;li&gt;&lt;a href="//www.eltiempo.es" title = "Tiempo"&gt;El Tiempo&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="//www.elpais.com" title="ElPaís"&gt;Ir a El País&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="//www.jquery.com" title="JQuery" manolo="inventado"&gt;Ir a JQuery&lt;/a&gt;&lt;/li&gt;       
&lt;/ul&gt;
&lt;div&gt;Div de prueba&lt;/div&gt;
&lt;script&gt;
    $("li").parent().find("a");
&lt;/script&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/zH5xcUjIHHTphIt6kRvgibR5xuSS0z42VbS5scoM.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 14
        ]);
        //52
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Eventos JQuery',
            'slug' => 'eventos-jquery',
            'body_main' => 'Eventos en JQuery',
            'body_plus' => '<p><strong>JQuery</strong>&nbsp;dispone de un conjunto de m&eacute;todos que permiten realizar eventos. Un evento es una acci&oacute;n que puede ser&nbsp; provocada y detectada y que puede tener origen desde el navegador o desde del usuario. Los eventos pueden ser pulsar un bot&oacute;n, arrastrar una imagen, presionar una tecla o conectar un dispositivo. Los ejemplos siguientes muestran algunos de los eventos m&aacute;s utilizados.</p>

<p><strong>MOUSEOVER Y MOUSEOUT</strong></p>

<p>Mouseover detecta el cursor del rat&oacute;n pasar sobre un elemento mientras que mouseout detecta la salida del cursor de un elemento.</p>

<pre>
<code class="language-html">&lt;div id="contenedor"&gt;
    La ventana cambia de color
&lt;/div&gt;
&lt;script&gt;
$(document).ready(function(){
    var caja = $("#contenedor");
    caja.mouseover(function(){
    $(this).css("background","red");
    });
    caja.mouseout(function(){
    $(this).css("background","yellow");
    });
});
&lt;/script&gt;</code></pre>

<p><strong>HOVER</strong></p>

<p>El evento hover maneja la detecci&oacute;n sobre el elemento y la salida del elemento volviendo al estado original,&nbsp;&nbsp;</p>

<pre>
<code class="language-html">&lt;div id="contenedor"&gt;
    La ventana cambia de borde
&lt;/div&gt;
&lt;script&gt;
$(document).ready(function(){
    var caja = $("#contenedor");
    function borde1(){
        $(this).css("border","orange 5px solid");
    };
    function borde2(){
        $(this).css("border","blue 5px dashed");
    };
    caja.hover(borde1,borde2);
});
&lt;/script&gt;</code></pre>

<p><strong>CLICK Y DBCLICK</strong></p>

<p>Tal como el nombre indica detectan un clic y un doble clic del rat&oacute;n sobre un elemento</p>

<pre>
<code class="language-html">&lt;div id="contenedor"&gt;
    La ventana cambia de sombra
&lt;/div&gt;
&lt;script&gt;
$(document).ready(function(){
    var caja = $("#contenedor");
    caja.click(function(){
        $(this).css("box-shadow","15px 10px 10px blue");
    });
    caja.dblclick(function(){
        $(this).css("box-shadow","10px 10px 5px pink");
    }); 
});
&lt;/script&gt;</code></pre>

<p><strong>FOCUS Y BLUR</strong></p>

<p>El evento focus detecta el foco sobre un elemento mientras que blur detecta el cambio de foco.</p>

<pre>
<code class="language-html">&lt;form&gt;
    &lt;input type="text" id="usuario"&gt;
&lt;/form&gt;
&lt;script&gt;
$(document).ready(function(){
    $("#usuario").focus(function(){
    $(this).attr("placeholder","Has entrado en el foco");
    });
    $("#usuario").blur(function(){
    $(this).attr("placeholder","Has salido del foco");
    });    
});
&lt;/script&gt;</code></pre>

<p><strong>MOUSEMOVE</strong></p>

<p>El evento mousemove se activa al detectar un movimiento del rat&oacute;n.</p>

<pre>
<code class="language-html">&lt;script&gt;
$(document).ready(function(){
    $(document).mousemove(function(e){
    console.log("ClientX: " + e.clientX);
    console.log("ClientY: " + e.clientY);
    });  
});
&lt;/script&gt;</code></pre>

<p>Se pueden revisar todos los eventos de JQuery desde la documentaci&oacute;n oficial&nbsp;Lista de eventos de JQuery</p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/m7Fg8iQb7lrpvGgVsqYyjwULgz1qQoW6ywjzigrq.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 14
        ]);
        //53
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Efectos JQuery',
            'slug' => 'efectos-jquery',
            'body_main' => 'Animaciones con JQuery',
            'body_plus' => '<p><strong>JQuery</strong>&nbsp;dispone de un conjunto de m&eacute;todos que permiten crear efectos de una manera muy r&aacute;pida y sencilla. A continuaci&oacute;n se muestran una serie de ejemplos basados en dos botones que permiten mostrar y ocultar una ventana con distintos m&eacute;todos deJQuery.</p>

<pre>
<code class="language-html">&lt;style&gt;
    #caja{
        width:300px;
    height:50px;
    border: 5px dashed black;
    background: #ccc;
        text-align:center;
}
&lt;/style&gt;
&lt;button id="mostrar"&gt;
    Mostrar
&lt;/button&gt;
&lt;button id="ocultar"&gt;
    Ocultar
&lt;/button&gt;
&lt;div id="caja"&gt;
    Caja de prueba
&lt;/div&gt;
</code></pre>

<p><strong>SHOW - HIDE</strong></p>

<pre>
<code class="language-javascript">$("#mostrar").click(function(){
    $(this).hide();
    $("#ocultar").show("normal");
    $("#caja").show("fast");
});
$("#ocultar").click(function(){
    $(this).hide();
    $("#mostrar").show("normal");
    $("#caja").hide("fast");    
});</code></pre>

<p><strong>FADEIN - FADEOUT</strong></p>

<pre>
<code class="language-javascript">$("#mostrar").click(function(){
    $(this).hide();
    $("#ocultar").show("normal");
    $("#caja").fadeIn("slow");
});
$("#ocultar").click(function(){
    $(this).hide();
    $("#mostrar").show("normal");
    $("#caja").fadeOut("slow"); 
});</code></pre>

<p><strong>FADETO</strong></p>

<pre>
<code class="language-javascript">$("#mostrar").click(function(){
    $(this).hide();
    $("#ocultar").show("normal");
    $("#caja").fadeTo("fast",1);
});
$("#ocultar").click(function(){
    $(this).hide();
    $("#mostrar").show("normal");
    $("#caja").fadeTo("slow",0);    
});
</code></pre>

<p><strong>SLIDEUP - SLIDEDOWN</strong></p>

<pre>
<code class="language-javascript">$("#mostrar").click(function(){
    $(this).hide();
    $("#ocultar").show("normal");
    $("#caja").slideDown("fast");
});
$("#ocultar").click(function(){
    $(this).hide();
    $("#mostrar").show("normal");
    $("#caja").slideUp("slow"); 
});</code></pre>

<p><strong>TOGGLE</strong></p>

<p>Los siguientes ejemplos de tipo &quot;toggle&quot;&nbsp; con un solo bot&oacute;n</p>

<pre>
<code class="language-html">&lt;button id="todoenuno"&gt;
    Todoenuno
&lt;/button&gt;
&lt;div id="caja"&gt;
    Master en Javascript
&lt;/div&gt;</code></pre>

<p>toggle (b&aacute;sico)</p>

<pre>
<code class="language-javascript">$("#todoenuno").click(function(){
    $("#caja").toggle("fast");    
});
</code></pre>

<p>fadeToggle</p>

<pre>
<code class="language-javascript">$("#todoenuno").click(function(){
    $("#caja").fadeToggle("fast");    
});</code></pre>

<p>slideToggle</p>

<pre>
<code class="language-javascript">$("#todoenuno").click(function(){
    $("#caja").slideToggle("slow");    
});</code></pre>

<p><strong>EFECTOS PERSONALIZADOS</strong></p>

<p>El m&eacute;todo animate de JQuery realiza autom&aacute;ticamente transiciones CSS solamente indicando las propiedades directamente.</p>

<pre>
<code class="language-html">&lt;button id="todoenuno"&gt;
    Todoenuno
&lt;/button&gt;
&lt;button id="animacion"&gt;
    Animación
&lt;/button&gt;
&lt;div id="caja"&gt;
    Master en Javascript
&lt;/div&gt;</code></pre>

<pre>
<code class="language-javascript">$("#todoenuno").click(function(){
    $("#caja").slideToggle("fast");
});
$("#animacion").click(function(){
    $("#caja")
    .animate({
        marginLeft: "500px",
        fontSize: "30px",
        height: "110px",
    },"slow")
    .animate({
        borderRadius: "150px",
        marginTop: "80px" 
    },"slow")
    .animate({
        borderRadius: "0px",
        marginLeft: "0px"
    },"slow");
});</code></pre>

<p>Los m&eacute;todos de animaci&oacute;n permiten a&ntilde;adir&nbsp;callbacks&nbsp;que ayudan en los casos en los que se necesita a&ntilde;adir otra acci&oacute;n una vez la animaci&oacute;n ha cargado completamente.</p>

<p>A&ntilde;adiendo callback manteniendo el ejemplo anterior:</p>

<pre>
<code class="language-javascript">$("#todoenuno").click(function(){
        //$("#caja").toggle("fast");
        //$("#caja").fadeToggle("fast");
        $("#caja").slideToggle("fast",function(){
            //se añade un callback si queremos que se ejecute justo una vez acabada la animación
            //$(this).text("Hello");
        });
    });
    $("#animacion").click(function(){
        $("#caja")
            .animate({
                marginLeft: "500px",
                fontSize: "30px",
                height: "110px",
            },"slow")
            .animate({
                borderRadius: "150px",
                marginTop: "80px" 
            },"slow")
            .animate({
                borderRadius: "0px",
                marginLeft: "0px"
            },"slow",function(){
                //se añade un callback si queremos que se ejecute justo una vez acabada la animación
                $(this).text("Animación completada");
            });
    });</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/6wqqkCCIvyrdF66dsOzhVFOCAlAnV0wh1ZrhCs1h.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 14
        ]);
        //54
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Peticiones JQuery',
            'slug' => 'peticiones-jquery',
            'body_main' => 'peticiones Ajax con JQuery',
            'body_plus' => '<p>La tecnolog&iacute;a Ajax (Asynchronous JavaScript And XML) es un mecanismo o t&eacute;cnica de desarrollo basada en JavaScript que permite realizar peticiones as&iacute;ncronas al servidor sin necesidad de recargar la p&aacute;gina completa. JQuery contiene distintos m&eacute;todos que facilitan el desarrollo de peticiones Ajax. A continuaci&oacute;n se muestran ejemplos de los distintos m&eacute;todos para realizar peticiones as&iacute;ncronas al servidor con JQuery.</p>

<pre>
<code class="language-html">&lt;!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;title&gt;&lt;/title&gt;
    &lt;script type="text/javascript" src="js/jquery-3.4.1.min.js"&gt;&lt;/script&gt;
    &lt;script type="text/javascript" src="js/ajax.js"&gt;&lt;/script&gt;
    &lt;style&gt;
        h1{ text-align:center; }
        #datos{
            margin:auto;
            border:black 1px solid;
            width:500px;
            height:500px;
            overflow:scroll;
        }
    &lt;/style&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;JQuery - AJAX&lt;/h1&gt;
        &lt;div id="div"&gt;&lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>LOAD</strong></p>

<pre>
<code class="language-javascript">$(document).ready(function(){
    
    $("#div").load("//api.nasa.gov/planetary/apod?api_key=DEMO_KEY");
});</code></pre>

<p><strong>GET</strong></p>

<pre>
<code class="language-javascript">$(document).ready(function(){
    
    $.get("//api.nasa.gov/planetary/apod?",{api_key: "DEMO_KEY",date:"2017-10-16"},function(response){  
        console.log(response);
        Object.keys(response).forEach(key =&gt; $("#div").append(key+":\n "+response[key]+"
"));      
    });
});</code></pre>

<p><strong>POST</strong></p>

<pre>
<code class="language-html">&lt;form action="//reqres.in/api/users" method="POST" id="formu"&gt;
    &lt;input type="text" name="name" id="name"&gt;
    &lt;input type="text" name="job" id="job"&gt;
    &lt;input type="submit" value="Enviar"&gt;
&lt;/form&gt;</code></pre>

<pre>
<code class="language-javascript">$(document).ready(function(){
    var user = {
    //name: $("#name").val(),
    name: $("input[name="name"]").val(),
    //job: $("#job").val()
    job: $("input[name=\'job\'").val()
    }
    
    $("#formu").submit(function(e){
    e.preventDefault();
    $.post($(this).attr("action"),user,function(response){
        $("#datos").append(response.name+"
"+response.job);
        console.log(response);
        }).done(function(){
            alert("Usuario añadido correctamente");
        });
    });    
});</code></pre>

<p><strong>AJAX</strong></p>

<pre>
<code class="language-html">&lt;form action="//reqres.in/api/users" method="POST" id="formu"&gt;
    &lt;input type="text" name="name" id="name"&gt;
    &lt;input type="text" name="job" id="job"&gt;
    &lt;input type="submit" value="Enviar"&gt;
&lt;/form&gt;</code></pre>

<pre>
<code class="language-javascript">$(document).ready(function(){

    var user = {
        //name: $("#name").val(),
        name: $("input[name="name"]").val(),
        //job: $("#job").val()
        job: $("input[name=\'job\'").val()
    }

    $("#formu").submit(function(event){
        event.preventDefault();
    $.ajax({
        type:"POST",
        //dataType: "json",
        //contentType: "application/json",
        url: $(this).attr("action"),
        data:user,
        beforeSend: function(){
            
        console.log("Enviando usuario...");
        },
            success: function(response){
        console.log(response);
        $("#datos").append(response.name+"
"+response.job);
        },
        error: function(){
        console.log("Ha ocurrido un error");
        },
        timeout:2000
    });
    });
});</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ALtdMkRBrksV7aLByoB5ygHAdMeBKw4IKlXjaP8K.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //55
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'JQuery UI',
            'slug' => 'jquery-ui',
            'body_main' => 'La interface de usuario de JQuery',
            'body_plus' => '<p><strong>JQueryUI</strong>&nbsp;es un conjunto de componentes basados en la librer&iacute;a JQuery que permiten a&ntilde;adir una serie de efectos y funcionalidades a un proyecto de manera muy sencilla. Con&nbsp;<strong>JQueryUI</strong>&nbsp;es posible crear efectos acorde&oacute;n, autocompletado, draggable, como tambi&eacute;n botones, campos de texto, ventanas, men&uacute;s desplegables,...&nbsp; con un dise&ntilde;o predefinido. Esta librer&iacute;a est&aacute; apoyada en&nbsp;<strong>JQuery</strong>, por tanto, es necesario disponer previamente de la librer&iacute;a&nbsp;<strong>JQuery</strong>&nbsp;para el correcto funcionamiento de &eacute;sta. Desde el men&uacute; de navegaci&oacute;n de la p&aacute;gina oficial de&nbsp;JQuery UI&nbsp;es posible visualizar una gran variedad de demos, opciones y dise&ntilde;os que muestran la gran popularidad y expansi&oacute;n de este set de plugins.&nbsp;</p>

<p><strong>A&Ntilde;ADIR JQuery UI</strong></p>

<p>Para a&ntilde;adir&nbsp;<strong>JQuery UI</strong>&nbsp;a un proyecto es necesario descargar la librer&iacute;a desde su&nbsp;p&aacute;gina oficial&nbsp;e incluirlo al proyecto. El archivo una vez descargado y descomprimido se compone de un directorio que incluye archivos JavaScript (extensi&oacute;n js) y archivos de estilos ( extensi&oacute;n css), adem&aacute;s de una carpeta con algunas im&aacute;genes. El archivo principal est&aacute; incluido en dos versiones distintas, una es la versi&oacute;n normal (jquery-ui.js) y la otra, la versi&oacute;n simplificada (jquery-ui.min.js).&nbsp; Adem&aacute;s de importar el archivo jquery-ui es necesario haber incluido la librer&iacute;a de JQuery previamente.</p>

<pre>
<code class="language-html">&lt;script type="text/javascript" src="js/jquery-3.4.1.min.js"&gt;&lt;/script&gt;
&lt;script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.js"&gt;&lt;/script&gt;</code></pre>

<p>La secci&oacute;n de descarga de&nbsp;<strong>JQuery-UI&nbsp;</strong>contiene distintas opciones, entre ellas permite elegir algunos de sus estilos predefinidos.&nbsp; Estos estilos est&aacute;n compuestos por uno o varios archivos de estilos que pueden variar seg&uacute;n las opciones marcadas. Al igual que el archivo jquery-ui.js los archivos de estilos vienen disponibles en dos versiones. Tan solo es necesario incluir el archivo o los archivos de estilos al proyecto para hacer uso de ellos.</p>

<pre>
<code class="language-html">&lt;link type="text/css" rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css"&gt;
&lt;link type="text/css" rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.structure.min.css"&gt;
&lt;link type="text/css" rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.theme.min.css"&gt;</code></pre>

<p>Una vez todo incluido en el archivo html correspondiente deber&iacute;a quedar algo similar al c&oacute;digo de abajo</p>

<pre>
<code class="language-html">&lt;!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;&lt;/title&gt;
        &lt;script type="text/javascript" src="js/jquery-3.4.1.min.js"&gt;&lt;/script&gt;
        &lt;link type="text/css" rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css"&gt;
        &lt;link type="text/css" rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.structure.min.css"&gt;
        &lt;link type="text/css" rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.theme.min.css"&gt;
        &lt;script type="text/javascript" src="js/jquery-ui-1.12.1/jquery-ui.js"&gt;&lt;/script&gt;
        &lt;script type="text/javascript" src="js/interface.js"&gt;&lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;JQuery-UI&lt;/h1&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>JQuery UI -&nbsp;M&Eacute;TODOS&nbsp;</strong></p>

<p>La secci&oacute;n de DEMO de la p&aacute;gina oficial de JQuery-UI muestra de forma detallada la implementaci&oacute;n de los distintos m&eacute;todos, aqu&iacute; algunos ejemplos de algunos de ellos.</p>

<pre>
<code class="language-html">&lt;div class="caja"&gt;
    Hola soy un elemento de la web
&lt;/div&gt;
&lt;div class="caja"&gt;
    Hola soy un elemento de la web
&lt;/div&gt;
&lt;div class="caja"&gt;
    Hola soy un elemento de la web
&lt;/div&gt;</code></pre>

<p><strong>Draggable</strong></p>

<pre>
<code class="language-javascript">$(document).ready(function(){
    $(".caja").draggable();
    
});</code></pre>

<p><strong>Resizable</strong></p>

<pre>
<code class="language-javascript">$(document).ready(function(){
    $(".caja").resizable(); 
});</code></pre>

<pre>
<code class="language-html">&lt;style&gt;
.lista{
    width:20%;
    padding:20px;
    list-style:none;
    border:black 1px solid;
    cursor:pointer;
}
.lista li{
    background:lightblue;
    border:black 1px dashed;
}
ul .ui-unselecting{
    background: red;
}
ul .ui-selecting{
    background-color:#000;
}
ul .ui-selected{
    background: orange;
}
&lt;/style&gt;
</code></pre>

<pre>
<code class="language-html">&lt;ul class="lista"&gt;
    &lt;li&gt;Elemento 1&lt;/li&gt;
    &lt;li&gt;Elemento 2&lt;/li&gt;
    &lt;li&gt;Elemento 3&lt;/li&gt;
    &lt;li&gt;Elemento 4&lt;/li&gt;
&lt;/ul&gt;</code></pre>

<p><strong>Selectable</strong></p>

<pre>
<code class="language-javascript">$(document).ready(function(){ 
    $(".lista").selectable();
});</code></pre>

<p><strong>Sortable</strong></p>

<pre>
<code class="language-javascript">$(document).ready(function(){ 
    $(".lista").sortable({
        update:function(event,ui){
            console.log("orden de lista modificado");
        }
    });
});</code></pre>

<p><strong>Draggable y Droppable</strong></p>

<pre>
<code class="language-html">&lt;div id="div"&gt;&lt;/div&gt;
&lt;div id="div2"&gt;&lt;/div&gt;
</code></pre>

<pre>
<code class="language-javascript">$("#div").draggable();
$("#div2").droppable({
    drop: function(){
        console.log("soltado dentro del div2");
    }
});</code></pre>

<p><strong>JQuery UI - WIDGETS</strong></p>

<p><strong>Tooltip</strong></p>

<pre>
<code class="language-html">&lt;a href="#" title="Este es un efecto básico de tooltip" id="div"&gt;Tooltip&lt;/a&gt;
&lt;a href="#" title="Este es un efecto slide de tooltip" id="div2"&gt;Tooltip slide&lt;/a&gt;</code></pre>

<pre>
<code class="language-javascript">$("#div").tooltip();
$("#div2").tooltip({
    show:{
        effect:"slideDown",
    delay: 250
    }
});</code></pre>

<p><strong>Dialog</strong></p>

<pre>
<code class="language-html">&lt;button id="boton-dialog"&gt;Mostrar ventana&lt;/button&gt;
&lt;div id="div" title="ventana"&gt;
    &lt;p&gt;
    Este en un mensaje de información en una ventana de diálogo
    &lt;/p&gt;
&lt;/div&gt;</code></pre>

<pre>
<code class="language-javascript">$("#boton-dialog").click(function(){
        $("#div").dialog();
    });</code></pre>

<p><strong>Datepicker</strong></p>

<pre>
<code class="language-html">&lt;input type="text" id="fecha"&gt;
</code></pre>

<pre>
<code class="language-javascript">$("#calendario").datepicker();
</code></pre>

<p><strong>Tabs</strong></p>

<pre>
<code class="language-html">&lt;div id="menu"&gt;
    &lt;ul&gt;
    &lt;li&gt;&lt;a href="#elemento-1"&gt;Tab 1&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#elemento-2"&gt;Tab 2&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#elemento-3"&gt;Tab 3&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#elemento-4"&gt;Tab 4&lt;/a&gt;&lt;/li&gt;
    &lt;/ul&gt;
    &lt;div id="elemento-1"&gt;
        Esta es la primera pestaña
    &lt;/div&gt;
    &lt;div id="elemento-2"&gt;
    Esta es la segunda pestaña
    &lt;/div&gt;
    &lt;div id="elemento-3"&gt;
    Esta es la tercera pestaña
    &lt;/div&gt;
    &lt;div id="elemento-4"&gt;
    Esta es la cuarta pestaña
    &lt;/div&gt;
&lt;/div&gt;</code></pre>

<pre>
<code class="language-javascript">$("#menu").tabs();
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/hgcdsebouXhypEEMEHRFGFarlIE0OtY3JsFegFEd.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 14
        ]);
        //56
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Hooks Angular',
            'slug' => 'hooks-angular',
            'body_main' => 'Lifecycle Hooks',
            'body_plus' => '<p>Los&nbsp;<strong>Lifecycle Hooks</strong>&nbsp;son un conjunto de m&eacute;todos predefinidos de Angular que se activan en un momento concreto del ciclo de vida de un componente. Estos&nbsp;<strong>Hooks</strong>&nbsp;pueden crear propiedades,detectar cambios de propiedades, etc...</p>

<p><strong>OnChanges</strong></p>

<p>El m&eacute;todo OnChanges detecta cambios en las propiedades del componente. Es necesario importar las interfaces OnChanges y SimpleChanges ( SimpleChanges especifica el cambio producido ) e implementar OnChanges a la clase del componente. Esta interface exige&nbsp; implementar el m&eacute;todo ngOnChanges que es el m&eacute;todo encargado de realizar acciones al detectar un cambio. OnChanges solo detecta las propiedades aplicadas con el decorador @Input, es decir, es necesaria la comunicaci&oacute;n entre componentes padre e hijo.</p>

<p>Hijo</p>

<p>componente ts</p>

<pre>
<code class="language-javascript">import { Component,Input,Output,EventEmitter, OnChanges, SimpleChanges } from "@angular/core";
@Component({
  selector: "prueba",
  templateUrl: "prueba.component.html",
  styleUrls: ["prueba.component.css"]
})
export class PruebaComponent implements OnChanges{
  @Input() public nombre:string;
  constructor(){ }
  ngOnChanges(changes: SimpleChanges){
    console.log(changes);    
  }
}</code></pre>

<p>componente html</p>

<pre>
<code class="language-html">&lt;h2&gt;{{nombre}}&lt;/h2&gt;
</code></pre>

<p>Padre</p>

<p>componente ts</p>

<pre>
<code class="language-javascript">import { Component } from "@angular/core";
@Component({
  selector: "pruebaPadre", 
  templateUrl: "pruebaPadre.component.html",
  styleUrls: ["pruebaPadre.component.css"]
})
export class PruebaPadreComponent {
  public titulo:string;
  public nuevoNombre:string;
  
  constructor(){
    this.titulo = "Esta es la tienda";
    }  
}</code></pre>

<p>componente html</p>

<pre>
<code class="language-html">&lt;h1&gt;{{titulo}}&lt;/h1&gt;  
    Nombre a cambiar:
    &lt;input type="text" [(ngModel)] = "nuevoNombre"&gt;
    &lt;p&gt;
        Resultado: {{ nuevoNombre }}
    &lt;/p&gt;</code></pre>

<p><strong>OnInit</strong></p>

<p>El m&eacute;todo&nbsp;<strong>OnInit</strong>&nbsp;se ejecuta a continuaci&oacute;n del constructor al cargar una directiva de un componente.&nbsp;Es necesario importar la interface OnInit e implementarla a su clase. La implementaci&oacute;n requiere del m&eacute;todo ngOnInit, que a diferencia del anterior se ejecuta solo una vez al cargar el componente.</p>

<pre>
<code class="language-javascript">import { Component,Input,Output,EventEmitter, OnChanges, SimpleChanges, OnInit } from "@angular/core";
@Component({
  selector: "prueba",
  templateUrl: "prueba.component.html",
  styleUrls: ["prueba.component.css"]
})
export class PruebaComponent implements OnChanges, OnInit{
  @Input() public nombre:string;
  constructor(){ }
  ngOnChanges(changes: SimpleChanges){
    console.log(changes);    
  }
  ngOnInit(){
    console.log("Método OnInit");
  }
}</code></pre>

<p><strong>DoCheck</strong></p>

<p>El m&eacute;todo&nbsp;<strong>DoCheck</strong>&nbsp;se ejecuta cuando hay alg&uacute;n cambio en el componente, ya sea un evento, p&eacute;rdida de foco,etc...&nbsp;Es necesario importar la interface DoCheck e implementarla a su clase. Esta implementaci&oacute;n exige a&ntilde;adir el m&eacute;todo DoCheck y el orden de ejecuci&oacute;n sucede a continuaci&oacute;n del m&eacute;todo ngOnInit. A diferencia de otros m&eacute;todos DoCheck detecta los cambios en otros componentes, por ejemplo, es posible implementar DoCheck en el app.component (componente principal por defecto) y detectar&aacute; los cambios antes que el DoCheck del propio componente.</p>

<pre>
<code class="language-javascript">import { Component,DoCheck } from "@angular/core";
@Component({
  selector: "app-root",
  templateUrl: "./app.component.html",
  styleUrls: ["./app.component.css"]
})
export class AppComponent implements DoCheck {
  title = "Curso de Angular4 avanzado";
  ngDoCheck(){
    console.log("El docheck desde app");
  }
}</code></pre>

<p><strong>OnDestroy</strong></p>

<p>El m&eacute;todo&nbsp;<strong>OnDestroy</strong>&nbsp;detecta la eliminaci&oacute;n de un componente.&nbsp;Es necesario importar la interface OnDestroy e implementarla a su clase. La implementaci&oacute;n de la interface obliga a a&ntilde;adir los m&eacute;todos y en este caso su m&eacute;todo es ngOnDestroy, el cual, se ejecuta justo antes de eliminar el componente.</p>

<pre>
<code class="language-javascript">import { Component,Input,Output,EventEmitter, OnChanges, SimpleChanges, OnInit, OnDestroy } from "@angular/core";
@Component({
  selector: "prueba",
  templateUrl: "prueba.component.html",
  styleUrls: ["prueba.component.css"]
})
export class PruebaComponent implements OnChanges, OnInit, OnDestroy{
  @Input() public nombre:string;
  constructor(){ }
  ngOnChanges(changes: SimpleChanges){
    console.log(changes);    
  }
  ngOnInit(){
    console.log("Método OnInit");
  }
  ngOnDestroy(){
      console.log("destroy");
   }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/H4u0oX9LtxmrkUeBYmZICvlGU8FHfSMXnXcLSihu.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);

        //57
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'IP en Linux',
            'slug' => 'ip-en-linux',
            'body_main' => 'Obtener la IP en Linux con los comandos IP y CURL',
            'body_plus' => '<p>En versiones anteriores de Linux era com&uacute;n utilizar los comandos ifconfig y iwconfig para obtener datos de la red. Linux ha incluido en las siguientes distribuciones el comando IP.</p>

<p>Para mostrar redes:</p>

<pre>
<code class="language-bash">ip link
</code></pre>

<pre>
<code class="language-bash">ip link show
</code></pre>

<p>Para mostrar la IP local:</p>

<pre>
<code class="language-bash">ip route
</code></pre>

<p>Para mostrar la IP p&uacute;blica: (necesario tener curl instalado)</p>

<pre>
<code class="language-bash">curl ifconfig.me
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/JRGQT9NrcQtlJTz476bbEpuVQRXQA264Rfptz3rM.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //58
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar Wine 4 en Debian 9',
            'slug' => 'instalar-wine-4-en-debian-9',
            'body_main' => 'Instalación de Wine 4 desde el gestor de paquetes apt',
            'body_plus' => '<p>Wine es un emulador de Windows que permite instalar programas nativos de Windows en un entorno Linux.&nbsp;</p>

<p>Para la instalaci&oacute;n de Wine antes es necesario activar la arquitectura 32 bits si el sistema es de 64 bits.</p>

<pre>
<code class="language-bash">sudo dpkg --add-architecture i386
wget -qO - https://dl.winehq.org/wine-builds/winehq.key | sudo apt-key add -</code></pre>

<p>El paso siguiente es a&ntilde;adir el paquete a los repositorios.</p>

<pre>
<code class="language-bash">sudo apt-add-repository https://dl.winehq.org/wine-builds/debian/
</code></pre>

<p>Finalmente se procede a la instalaci&oacute;n</p>

<pre>
<code class="language-bash">sudo apt-get update
sudo apt-get install --install-recommends winehq-stable</code></pre>

<p>Es recomendable generar un enlace al ejecutable ya que la instalaci&oacute;n se crea en el directorio /opt/wine-stable.</p>

<pre>
<code class="language-bash">export PATH=$PATH:/opt/wine-stable/bin
</code></pre>

<p>Ejecutar programa desde terminal</p>

<pre>
<code class="language-bash">wine [programa.exe]
</code></pre>

<p>Fuente:&nbsp;//tecadmin.net/install-wine-debian-9-stretch/</p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/u4FCED06fHrQFaYi0eGem50odkTnXNCwlYVMhpif.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        
        //59
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Gmagick e Imagick',
            'slug' => 'gmagick-e-imagick',
            'body_main' => 'Librería de imágenes',
            'body_plus' => '<p>Imagick (ImageMagick) y Gmagick (GraphicsMagick) son extensiones de php para el manejo de im&aacute;genes en una gran cantidad de formatos que permiten crear, leer y convertir im&aacute;genes. La extensi&oacute;n nativa de PHP&nbsp; Imagick se basa en la librer&iacute;a ImageMagick mientras que la extensi&oacute;n Gmagick se basa en GraphicsMagick. Estas dos librer&iacute;as incorporan un conjunto de efectos f&aacute;ciles implementar.</p>

<p><strong>GMAGICK</strong></p>

<p>Para la instalaci&oacute;n de&nbsp;Gmagick&nbsp;son necesarios algunas extensiones que se indican a continuaci&oacute;n.</p>

<p>Instalar php-pear</p>

<pre>
<code class="language-bash">sudo apt install php-pear
</code></pre>

<p>Instalar phpize</p>

<pre>
<code class="language-bash">sudo apt install php7.0-dev graphicsmagick libgraphicsmagick1-dev
</code></pre>

<p>Instalar extensi&oacute;n gmagick</p>

<pre>
<code class="language-bash">sudo pecl install gmagick-2.0.5RC1
</code></pre>

<p>A&ntilde;adir o descomentar extensi&oacute;n en php.ini</p>

<pre>
<code class="language-bash">extension=gmagick.so
</code></pre>

<p>Reiniciar Apache</p>

<pre>
<code class="language-bash">sudo service apache2 restart
</code></pre>

<p>Tambi&eacute;n es posible que sea necesario el paquete php-imagick desde la versi&oacute;n de PHP 7.0</p>

<pre>
<code class="language-bash">sudo apt update
sudo apt install php-imagick graphicsmagick</code></pre>

<p>Fuente:&nbsp;//askubuntu.com/questions/837142/ubuntu-16-w-php7-graphics-magick-class-gmagick-not-found</p>

<p>Ejemplo de uso de librer&iacute;a Gmagick de una imagen</p>

<pre>
<code class="language-php">&lt;?php
//instancia de la clase GmagickDraw
$draw = new GmagickDraw();
//color de borde
$draw-&gt;setStrokeColor("Black");
//color de relleno
$draw-&gt;setfillcolor("white");
//tamaño de la fuente
$draw-&gt;setfontsize(36);
//texto
$draw-&gt;annotate(200,200,"primer comentario");
//tamaño de la fuente
$draw-&gt;setfontsize(56);
//texto
$draw-&gt;annotate(500,500,"segundo comentario");
//instancia de la clase Gmagick
$ima=new Gmagick("imagen.jpg");
//establecer formato de imagen
$ima-&gt;setImageFormat("png");
//añadir dibujo a imagen
$ima-&gt;drawImage($draw);
//cabeceras necesarias para mostrar la imagen en pantalla
header("Content-Type : image/png");
//mostrar imagen
echo $ima-&gt;getImageBlob();
?&gt;</code></pre>

<p>En Laravel es necesario a&ntilde;adir los namespace</p>

<pre>
<code class="language-php">use Gmagick;
use GmagickDraw;
use GmagickPixel;
</code></pre>

<p><strong>IMAGICK</strong></p>

<p>Para la instalaci&oacute;n de&nbsp;<strong>Imagick</strong>&nbsp;es necesario asegurarse de disponer de algunos paquetes instalados.</p>

<p>Instalar paquetes necesarios</p>

<pre>
<code class="language-bash">sudo apt install php php-common gcc
</code></pre>

<p>Instalar Imagick</p>

<pre>
<code class="language-bash">sudo apt install imagemagick
</code></pre>

<p>Instalar extensi&oacute;n Imagick</p>

<pre>
<code class="language-bash">sudo apt install php-imagick
</code></pre>

<pre>
<code class="language-bash">pecl install imagick
</code></pre>

<p>Reiniciar servidor</p>

<pre>
<code class="language-bash">sudo systemctl restart apache2
</code></pre>

<p>Ejemplo de uso de la librer&iacute;a Imagick</p>

<pre>
<code class="language-php">&lt;?php
$imagen = new Imagick("imagen.jpg");
$imagen-&gt;swirlImage(90);
$imagen-&gt;writeImage("nuevaImagen.jpg");
header("Content-Type: image/jpeg");
echo $imagen;
?&gt;</code></pre>

<p>En Laravel es necesario a&ntilde;adir los namespace</p>

<pre>
<code class="language-php">use Imagick;
use ImagickDraw;
use ImagickPixel</code></pre>

<p>Nota: Al a&ntilde;adir la extensi&oacute;n de Gmagick antes de la extensi&oacute;n de Imagick en el archivo php.ini puede producir alg&uacute;n error, para solucionarlo es necesario intercambiar el orden y colocar la extensi&oacute;n Imagick antes de Gmagick.</p>

<pre>
<code class="language-bash">[Imagick]
extension=imagick.so
[Gmagick]
extension=gmagick.so</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/G354ZJ8HRFcCIJCpXfcIL6fomELyCrgBh8aLPHvs.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        //60
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Método auth en el constructor de Laravel',
            'slug' => 'metodo-auth-en-el-constructor-de-laravel',
            'body_main' => 'Disponer del método auth en todos los métodos de un controlador',
            'body_plus' => '<p>En versiones anteriores de Laravel era posible asignar el m&eacute;todo auth desde el m&eacute;todo constructor en un controlador. Desde la versi&oacute;n 5.3 Laravel impide utilizarlo desde el constructor pero no desde el resto de m&eacute;todos, esto implica repetir en cada m&eacute;todo del controlador la llamada al m&eacute;todo auth(). Para evitar esto es posible asignarlo desde el constructor mediante un middleware, incluyendo un callback y desde &eacute;ste, Laravel si que permite realizar la llamada al m&eacute;todo auth().</p>

<p>C&oacute;digo de ejemplo de llamada al m&eacute;todo auth desde el constructor de un controlador en Laravel 5.5</p>

<pre>
<code class="language-php">use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NuevoController extends Controller
{
  protected $user;
    public function __construct(){
        $this-&gt;middleware(function($request,$next) {
            $this-&gt;user=auth()-&gt;user();
            return $next($request);
        });
}</code></pre>

<p>Esto solo es posible hasta la versi&oacute;n 5.7 o 5.8, ya que Laravel prescinde de auth en las siguientes versiones. M&aacute;s info&nbsp;aqu&iacute;.</p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/W62Rbh4eB5H8nGj4C4hDCqBqM6C3TIzhVZA4bc26.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);
        //61
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Shinobi en Laravel',
            'slug' => 'shinobi-en-laravel',
            'body_main' => 'Instalación del paquete de roles (Shinobi) en Laravel',
            'body_plus' => '<p>El paquete&nbsp;<strong>Shinobi</strong>&nbsp;es un sistema de roles basado en permisos que permite restringir el acceso dependiendo del rol asignado. Este paquete crea modelos, m&eacute;todos y las tablas necesarias para un sistema de roles totalmente funcional.</p>

<p><strong>INSTALACI&Oacute;N DE SHINOBI</strong></p>

<pre>
<code class="language-bash">composer.phar require caffeinated/shinobi
</code></pre>

<p>A partir de la versi&oacute;n 4.0 es necesario PHP 7.1.3. En caso de disponer de una versi&oacute;n de PHP anterior instalar una versi&oacute;n inferior.</p>

<pre>
<code class="language-bash">composer.phar require caffeinated/shinobi:~3.3
</code></pre>

<p>Al instalar la versi&oacute;n 4 no es necesario nada m&aacute;s, pero si versi&oacute;n instalada es una versi&oacute;n anterior es necesario insertar la siguiente l&iacute;nea en la secci&oacute;n providers del archivo config/app.php</p>

<pre>
<code class="language-php">Caffeinated\Shinobi\ShinobiServiceProvider::class
</code></pre>

<p>A continuaci&oacute;n es necesario realizar un migrate</p>

<pre>
<code class="language-php">php artisan migrate
</code></pre>

<p>Nota: Si se muestra el error relacionado con la necesidad de la dependencia Doctrine/DBAL, revisar la versi&oacute;n de shinobi en el archivo composer.json si es soportada y revisar tambi&eacute;n las migraciones de shinobi (vendor/caffeinated/shinobi/migrations) y si existe una migraci&oacute;n que comienza por update eliminarla y volver a intentar realizar un migrate.</p>

<p>Fuente:&nbsp;<a href="//www.youtube.com/channel/UCRByhHailXC3HqWL2QrYw7w">www.youtube.com/channel/UCRByhHailXC3HqWL2QrYw7w</a></p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/a4D7F156vlQVKwYOT94rXP4hKXHZAHdZI0objk5D.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);
        //62
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Configuración de Shinobi',
            'slug' => 'configuracion-de-shinobi',
            'body_main' => 'Configuración del paquete de roles Shinobi en Laravel',
            'body_plus' => '<p><strong>CREAR PERMISOS CON EL PAQUETE SHINOBI</strong></p>

<p>Una vez instalado el paquete&nbsp;<strong>Shinobi</strong>&nbsp;como se muestra en la entrada Shinobi en Laravel&nbsp; y despu&eacute;s de haber comprobado que las tablas han sido creadas en la base de datos se puede comenzar a crear los permisos.</p>

<p>Los permisos se crean mediante un&nbsp;seeder:&nbsp;</p>

<pre>
<code class="language-php">&lt;?php
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
           "name"   =&gt; "Navegar usuarios",
            "slug"  =&gt; "users.index",
            "description" =&gt; "Lista y navega todos los usuarios del sistema",
        ]);
        Permission::create([
           "name"   =&gt; "Ver detalle de usuario",
            "slug"  =&gt; "users.show",
            "description" =&gt; "Ver en detalle cada usuario del sistema",
        ]);
        Permission::create([
           "name"   =&gt; "Edición de usuarios",
            "slug"  =&gt; "users.edit",
            "description" =&gt; "Editar cualquier dato de un usuario del sistema",
        ]);
        Permission::create([
           "name"   =&gt; "Eliminar usuario",
            "slug"  =&gt; "users.destroy",
            "description" =&gt; "Eliminar cualquier usuario del sistema",
        ]);
         //Roles
        Permission::create([
           "name"   =&gt; "Navegar roles",
            "slug"  =&gt; "roles.index",
            "description" =&gt; "Lista y navega todos los roles del sistema",
        ]);
        Permission::create([
           "name"   =&gt; "Ver detalle de rol",
            "slug"  =&gt; "roles.show",
            "description" =&gt; "Ver en detalle cada rol del sistema",
        ]);
        Permission::create([
           "name"   =&gt; "Creación de roles",
            "slug"  =&gt; "roles.create",
            "description" =&gt; "Ver en detalle cada rol del sistema",
        ]);
        Permission::create([
           "name"   =&gt; "Edición de roles",
            "slug"  =&gt; "roles.edit",
            "description" =&gt; "Editar cualquier dato de un rol del sistema",
        ]);
        Permission::create([
           "name"   =&gt; "Eliminar rol",
            "slug"  =&gt; "roles.destroy",
            "description" =&gt; "Eliminar cualquier rol del sistema",
        ]);
    }
}</code></pre>

<p>El c&oacute;digo anterior muestra un ejemplo de un&nbsp;seeder&nbsp;con la creaci&oacute;n de una serie de permisos donde cabe destacar que la informaci&oacute;n almacenada en el dato slug, es la m&aacute;s importante, puesto que es el que transmite el tipo de rol mientras que los otros dos campos solamente son descriptivos.</p>

<p>Una vez creados los permisos solo queda incorporarlo al m&eacute;todo&nbsp;run()&nbsp;de la clase&nbsp;DatabaseSeeder&nbsp;y a continuaci&oacute;n realizar una migraci&oacute;n.</p>

<pre>
<code class="language-php">&lt;?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{    
    public function run()
    {
        $this-&gt;call([            
            UserSeeder::class,            
            PermissionTableSeeder::class,
                ]);
    }
}</code></pre>

<p>Al haber realizado una migraci&oacute;n anteriormente es posible que sea necesario a&ntilde;adir la opci&oacute;n&nbsp;fresh&nbsp;o&nbsp;refresh.</p>

<pre>
<code class="language-bash">php artisan migrate:refresh
</code></pre>

<p>CREAR ROLES</p>

<p>El siguiente paso es la creaci&oacute;n de un UserSeeder y crear los roles que se necesiten para el proyecto. En caso de no tener claros los tipos de rol se debe a&ntilde;adir uno al menos para realizar las pruebas. En el c&oacute;digo de abajo se muestra la creaci&oacute;n de varios roles, el dato a destacar es que el rol&nbsp;admin&nbsp;de&nbsp;<strong>Shinobi</strong>&nbsp;es un tipo de rol especial que permite&nbsp; disponer de acceso total.</p>

<pre>
<code class="language-php">&lt;?php
use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,22)-&gt;create([]);
        Role::create([
            "name" =&gt; "Admin",
            "slug" =&gt; "admin",
            "special" =&gt; "all-access"
        ]);
        Role::create([
           "name" =&gt; "Editor",
            "slug" =&gt; "editor",
            "description" =&gt; "Navegar, ver, crear, editar y eliminar",            
        ]);
        Role::create([
           "name" =&gt; "Suscriptor",
            "slug" =&gt; "suscriptor",
            "description" =&gt; "Navegar y ver"
        ]);
    }
}
?&gt;</code></pre>

<p>Una vez creados roles y permisos es necesario disponer del m&oacute;dulo auth. En caso de no tenerlo se instala. Este paquete incluye los m&oacute;dulos de registro y login de usuario.</p>

<p><strong>INSTALAR AUTH</strong></p>

<pre>
<code class="language-bash">php artisan make:auth
</code></pre>

<p>REGISTRAR MIDDLEWARES</p>

<p>Lo siguiente es a&ntilde;adir las siguientes l&iacute;neas al archivo Kernel situado en app/Http/Kernel.php en el array $routeMiddleware. Con esto se registran los middlewares que se encuentran en el paquete Shinobi.</p>

<pre>
<code class="language-php">\'role\' =&gt; \Caffeinated\Shinobi\Middleware\UserHasRole::class,
\'permission\' =&gt; \Caffeinated\Shinobi\Middleware\UserHasPermission::class</code></pre>

<p>Con los middlewares registrados es posible completar el archivo de rutas a&ntilde;adiendo los mismos valores slug de los permisos creados en la clase PermissionTableSeeder.&nbsp;A continuaci&oacute;n se muestra una lista de rutas dentro del middleware&nbsp;<strong>auth.&nbsp;</strong>Las rutas a&ntilde;adidas dentro del middleware&nbsp;<strong>auth</strong>&nbsp;permiten el acceso solamente a usuarios logueados. Esta restricci&oacute;n de acceso es propia del m&oacute;dulo&nbsp;<strong>auth</strong>&nbsp;e independiente del paquete Shinobi. Para restringir mediante permisos es necesario adjuntar el m&eacute;todo middleware a continuaci&oacute;n de la ruta y pasando como argumento el permiso requerido, existe otra opci&oacute;n de implementar los middleware de&nbsp;<strong>Shinobi,&nbsp;</strong>que es pas&aacute;ndolos en el constructor del controlador tal como se muestra en la entrada personalizar Shinobi.&nbsp;</p>

<p>A&Ntilde;ADIR PERMISOS AL ARCHIVO DE RUTAS</p>

<p><strong>routes/web.php</strong></p>

<pre>
<code class="language-php">Route::middleware(["auth"])-&gt;group(function(){
      //Users
    Route::get("users","UserController@index")-&gt;name("users.index")
            -&gt;middleware("permission:users.index");
    Route::put("users/{user}","UserController@update")-&gt;name("users.update")
            -&gt;middleware("permission:users.edit");
    Route::get("users/{user}","UserController@show")-&gt;name("users.show")
            -&gt;middleware("permission:users.show");
    Route::delete("users/{user}","UserController@destroy")-&gt;name("users.destroy")
            -&gt;middleware("permission:users.destroy");
    Route::get("users/{user}/edit","UserController@edit")-&gt;name("users.edit")
            -&gt;middleware("permission:users.edit");
//Roles
    Route::post("roles/store","RoleController@store")-&gt;name("roles.store")
            -&gt;middleware("permission:roles.create");
    Route::get("roles","RoleController@index")-&gt;name("roles.index")
            -&gt;middleware("permission:roles.index");
    Route::get("roles/create","RoleController@create")-&gt;name("roles.create")
            -&gt;middleware("permission:roles.create");
    Route::put("roles/{role}","RoleController@update")-&gt;name("roles.update")
            -&gt;middleware("permission:roles.edit");
    Route::get("roles/{role}","RoleController@show")-&gt;name("roles.show")
            -&gt;middleware("permission:roles.show");
    Route::delete("roles/{role}","RoleController@destroy")-&gt;name("roles.destroy")
            -&gt;middleware("permission:roles.destroy");
    Route::get("roles/{role}/edit","RoleController@edit")-&gt;name("roles.edit")
            -&gt;middleware("permission:roles.edit");
});</code></pre>

<p>En el c&oacute;digo superior se han restringido todos los m&eacute;todos del crud de usuarios, es decir, que un usuario seg&uacute;n su rol asignado puede tener acceso a uno, varios o todos los permisos dependiendo del alcance de ese rol.&nbsp;&nbsp;</p>

<p>De esta forma se restringe el acceso desde las rutas, pero todav&iacute;a queda por restringir el acceso a las vistas. Para restringir de forma sencilla acceso a un bot&oacute;n, un enlace o una secci&oacute;n que el usuario no tiene acceso, Shinobi dispone de&nbsp;helpers&nbsp;que permiten restringir el acceso de forma visual.</p>

<pre>
<code class="language-php">@can("users.index")
    &lt;li &gt;
        &lt;a class="nav-link" href="{{ route(\'users.index\') }}"&gt;Usuarios&lt;/a&gt;
    &lt;/li&gt;
@endcan

</code></pre>

<p>Nota: Recuerda que en los par&eacute;ntesis se debe indicar el nombre del permiso y no de la ruta que pudiendo ser iguales puede llevar a confusi&oacute;n.&nbsp;Para entender mejor esta posible confusi&oacute;n es necesario observar m&aacute;s detenidamente el c&oacute;digo de arriba correspondiente al archivo de rutas (routes/web.php). Al analizar los permisos uno a uno se contempla que algunos permisos est&aacute;n duplicados, es decir, que el mismo permiso sirve para dos rutas distintas. En concreto el m&eacute;todo update y el m&eacute;todo edit requieren del permiso&nbsp;<strong>users.edit</strong>&nbsp;permitiendo&nbsp;el acceso a las dos rutas.&nbsp;</p>

<p><strong>CREAR CONTROLADOR DE USUARIOS</strong></p>

<p>Como el c&oacute;digo de ejemplo mostrado anteriormente est&aacute; dirigido a los m&eacute;todos para usuarios, es necesario para las pruebas de roles disponer de tres requisitos: un controlador para los usuarios, un usuario registrado y un rol asociado a ese usuario.</p>

<ul>
    <li>En caso de haber comenzado el proyecto y no haberlo creado anteriormente se crea el controlador.</li>
</ul>

<pre>
<code class="language-bash">php artisan make:controller UserController --resource
</code></pre>

<ul>
    <li>Para registrarse se puede navegar hacia la vista de bienvenida de Laravel&nbsp;<strong>welcome.php</strong>&nbsp;(que se accede navegando a la ra&iacute;z del proyecto), o extraer el m&oacute;dulo y a&ntilde;adirlo a otra vista. El c&oacute;digo de abajo muestra&nbsp;el fragmento de c&oacute;digo&nbsp;que incluye Laravel 5.5,&nbsp;ya que desde Laravel 6 el m&oacute;dulo auth&nbsp; no viene incluido por defecto.</li>
</ul>

<pre>
<code class="language-php">@if (Route::has\'login\'))
    &lt;div class="top-right links"&gt;
        @auth
            &lt;a href="{{ url(\'/home\') }}"&gt;Home&lt;/a&gt;
        @else
            &lt;a href="{{ route(\'login\') }}"&gt;Login&lt;/a&gt;
            &lt;a href="{{ route(\'register\') }}"&gt;Register&lt;/a&gt;
        @endauth
    &lt;/div&gt;
@endif</code></pre>

<ul>
    <li>Para asociar el rol al usuario para las pruebas es necesario hacerlo de forma manual con cualquier gestor de base de datos. Se toma el id del usuario registrado en el paso anterior y se accede a la tabla role_user para insertar un nuevo registro. Al campo role_id a&ntilde;adimos el n&uacute;mero 1 (rol&nbsp;<strong>Admin</strong>) y al campo user_id se a&ntilde;ade el id del usuario. Las siguientes im&aacute;genes&nbsp;muestran la inserci&oacute;n mediante los desplegables que incluye el gestor&nbsp;<strong>phpMyAdmin</strong>.</li>
</ul>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666128344.jpg" style="height:300px; width:620px" /></p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666128373.jpg" style="height:579px; width:625px" /></p>

<p>Con el rol&nbsp;Admin&nbsp;asignado al usuario registrado, este usuario es considerado administrador con acceso total, es decir, puede acceder a cualquier ruta, requiera o no requiera permisos. El rol&nbsp;<strong>Admin</strong>&nbsp;dispone de un campo especial que permite tres posibles valores: all-access, no-access y null. Si el valor pasa a null el usuario deja de ser especial y se comporta como cualquier otro usuario dependiendo de los roles asignados.</p>

<p>A&Ntilde;ADIR TRAIT</p>

<p>El m&oacute;dulo est&aacute; listo para asignarle los permisos a los usuarios, pero para que el sistema reconozca el sistema de roles es necesario a&ntilde;adir el archivo&nbsp;ShinobiTrait&nbsp;al modelo User&nbsp; como viene a&ntilde;adido en el siguiente fragmento de c&oacute;digo ( el c&oacute;digo de color fucsia representa las l&iacute;neas a&ntilde;adidas).&nbsp;</p>

<pre>
<code class="language-php">&lt;?php
namespace App;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable,ShinobiTrait;
    
    protected $fillable = [
        \'name\', \'email\', \'password\',
    ];
    
    protected $hidden = [
        \'password\', \'remember_token\',
    ];
}
</code></pre>

<p>&nbsp;Una vez configurado el sistema de roles junto al m&oacute;dulo auth&nbsp;es posible&nbsp; crear los controladores y las vistas para que el administrador pueda manejar tanto las listas de usuarios como la de roles y as&iacute; poder personalizar el sistema.</p>

<p>Fuente:&nbsp;<a href="https://www.youtube.com/channel/UCRByhHailXC3HqWL2QrYw7w">//www.youtube.com/channel/UCRByhHailXC3HqWL2QrYw7w</a></p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/dTDoOJb7rUyPaWkFyDeANxaarT8gWUSnqMo03O57.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);
        //63
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'ERROR 2002 MySQL en Linux',
            'slug' => 'error-2002-mysql-en-linux',
            'body_main' => 'Posible solución al error 2002 en MySQL en Linux',
            'body_plus' => '<p>En ocasiones aparecen errores al acceder a MySQL despu&eacute;s de actualizar, reiniciar el sistema o quedarse sin espacio en el disco. Para resolver el error es necesario comprobar los archivos de configuraci&oacute;n y el informe de errores de MySQL.</p>

<p>Los archivos de configuraci&oacute;n pueden variar seg&uacute;n la distribuci&oacute;n pero se suelen encontrar en el directorio /etc/my.cnf, en el direcotorio /etc/mysql/my.cnf o en /etc/mysql/mariadb.cnf, mientras que los&nbsp;archivos de error se encuentran en la ruta /var/lib/mysql/error.log.&nbsp;</p>

<p>En este caso el error lo caus&oacute; la falta de espacio</p>

<pre>
<code class="language-bash">2019-09-30  0:30:10 140450430494720 [Note] Recovering after a crash using tc.log
2019-09-30  0:30:10 140450430494720 [ERROR] Can`t init tc log
2019-09-30  0:30:10 140450430494720 [ERROR] Aborting</code></pre>

<p>La soluci&oacute;n a este error se resuelve eliminando el archivo tc.log tal como hace referencia el mensaje de error.log. Este archivo se encuentra en la ruta /var/lib/mysql/tc.log. Al eliminar el archivo el tc.log vuelve a recargarse y el error es resuelto.</p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/4DdTKtEFxMIawRop9D480SjGcY3SWZwep9qJ6LD5.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);
        //64
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Personalizar Shinobi',
            'slug' => 'personalizar-shinobi',
            'body_main' => 'Configuración de roles con el paquete Shinobi',
            'body_plus' => '<p>Continuando la entrada configuraci&oacute;n de Shinobi se procede a crear los controladores y las vistas del sistema de roles para poder gestionar desde el proyecto la asignaci&oacute;n de permisos a los usuarios.</p>

<p><strong>CONTROLADORES</strong></p>

<p>A continuaci&oacute;n se muestra el controlador de usuarios y de roles. Interesante destacar el m&eacute;todo constructor de los dos controladores, que contienen una lista de middleware que se encuentran comentados y que supone otra forma de a&ntilde;adir los middleware en lugar de a&ntilde;adirlos&nbsp;al final de cada ruta&nbsp;en el archivo de rutas como se explica en la entrada anterior.</p>

<p><strong>Controlador de usuarios</strong></p>

<pre>
<code class="language-php">&lt;?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Caffeinated\Shinobi\Models\Role;
class UserController extends Controller
{    
    public function __construct(){
        //los middleware se pueden implementar en el archivo de rutas 
        //o aquí en el constructor
        /*
        $this-&gt;middleware("permission:users.create")-&gt;only(["create","store"]);
        //$this-&gt;middleware("permission:users.index")-&gt;only("index");
        $this-&gt;middleware("permission:users.edit")-&gt;only("edit","update");
        $this-&gt;middleware("permission:users.show")-&gt;only("show");
        $this-&gt;middleware("permission:users.destroy")-&gt;only("destroy");
        */
    }
    public function index(Request $request)
    {
        $users=User::paginate();
        return view("users.index", compact("users"));
    }
    public function show(User $user)
    {
        return view ("users.show", compact("user"));
    }
    
    public function edit(User $user)
    {
        $roles=Role::get()-&gt;all();
        return view("users.edit",compact("user","roles"));
    }
    public function update(Request $request, User $user)
    {
        //actualizar usuario
        $user-&gt;update($request-&gt;all());
        //actualizar roles
        $user-&gt;roles()-&gt;sync($request-&gt;get("roles"));
        
        return redirect()-&gt;route("users.edit",$user-&gt;id)
                -&gt;with("info","Usuario actualizado con éxito");
    }
    public function destroy(User $user)
    {
        $user-&gt;delete();
        
        return back()-&gt;with("info", "Eliminado correctamente");
    }
}</code></pre>

<p><strong>Controlador de roles</strong></p>

<pre>
<code class="language-php">&lt;?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
class RoleController extends Controller
{
    public function __construct(){
        //los middleware se pueden implementar en el archivo de rutas 
        //o aquí en el constructor
        /*
        $this-&gt;middleware("permission:roles.create")-&gt;only(["create","store"]);
        $this-&gt;middleware("permission:roles.index")-&gt;only("index");
        $this-&gt;middleware("permission:roles.edit")-&gt;only("edit","update");
        $this-&gt;middleware("permission:roles.show")-&gt;only("show");
        $this-&gt;middleware("permission:roles.destroy")-&gt;only("destroy");
        */
    }
    public function index()
    {
        $roles=Role::paginate();
        return view("roles.index",compact("roles"));
    }
    public function create()
    {
        $permissions=Permission::get();
        return view("roles.create", compact("permissions"));
    }
    public function store(Request $request)
    {        
        $role=Role::create($request-&gt;all());        
        $role-&gt;permissions()-&gt;sync($request-&gt;get("permissions"));
        
        return redirect()-&gt;route("roles.edit", $role-&gt;id)
                -&gt;with("info", "Role guardado con éxito");
    }
    
    public function show(Role $role)
    {
        return view("roles.show",compact("role"));
    }
    
    public function edit(Role $role)
    {    
        $permissions=Permission::get();
        return view("roles.edit", compact("role", "permissions"));
    }
    
    public function update(Request $request, Role $role)
    {
        $role-&gt;update($request-&gt;all());        
        $role-&gt;permissions()-&gt;sync($request-&gt;get("permissions"));
        
        return redirect()-&gt;route("roles.edit", $role-&gt;id)
                -&gt;with("info", "Role actualizado con éxito");
    }
    
    public function destroy($id)
    {
        $role=Role::find($id)-&gt;delete();
        return back()-&gt;with("info", "El registro se ha eliminado correctamente");
    }
}</code></pre>

<p>VISTAS</p>

<p>Las vistas muestran el listado de usuarios y el listado de roles respectivamente mediante una tabla. Las llaves junto a los signos de admiraci&oacute;n pertenecen a un formulario de tipo&nbsp;LaravelCollective&nbsp;que se ha a&ntilde;adido en el campo de eliminar de las dos vistas.&nbsp;</p>

<p>Vista de usuarios (index)</p>

<pre>
<code class="language-html">@extends("layout/layout_blog")
@section("content")
&lt;div class="container "&gt;
    &lt;div class="row "&gt;
        &lt;div class="col-md-8 mt-3 flex-first "&gt;            
            &lt;div class="panel panel-default"&gt;
                &lt;div class="panel-heading text-center" &gt;
                    Usuarios
                &lt;/div&gt;            
                &lt;div class="panel-body"&gt;
                    &lt;table class="table table-striped table-hover"&gt;
                        &lt;thead&gt;
                            &lt;tr&gt;
                                &lt;th width="10px"&gt;ID&lt;/th&gt;
                                &lt;th&gt;Nombre&lt;/th&gt;
                                &lt;th colspan="3"&gt; &lt;/th&gt;
                            &lt;/tr&gt;
                        &lt;/thead&gt;
                        &lt;tbody&gt;
                            @foreach($users as $user)
                            &lt;tr&gt;
                                &lt;td&gt;{{ $user-&gt;id }}&lt;/td&gt;
                                &lt;td&gt;{{ $user-&gt;name }}&lt;/td&gt;
                                &lt;td width="10px"&gt;
                                    @can("users.show")
                                    &lt;a href="{{ route("users.show", $user-&gt;id) }}"
                                       class="btn btn-sm btn-default"&gt;
                                           Ver
                                    &lt;/a&gt;
                                    @endcan
                                &lt;/td&gt;
                                &lt;td width="10px"&gt;
                                    @can("users.edit")
                                    &lt;a href="{{ route("users.edit", $user-&gt;id) }}"
                                       class="btn btn-sm btn-default"&gt;
                                           Editar
                                    &lt;/a&gt;
                                    @endcan
                                &lt;/td&gt;
                                &lt;td width="10px"&gt;
                                    @can("users.destroy")
                                   &lt;!-- necesario Laravel/Collective --&gt;
                                    {!! Form::open(["route" =&gt; ["users.destroy", $user-&gt;id],
                                    "method" =&gt; "DELETE"]) !!}
                                    &lt;button class="btn btn-sm btn-danger"&gt;
                                        Eliminar
                                    &lt;/button&gt;
                                    {!! Form::close() !!}
                                    @endcan
                                &lt;/td&gt;
                            &lt;/tr&gt;
                            @endforeach
                        &lt;/tbody&gt;
                    &lt;/table&gt;
                    {{ $users-&gt;render() }}
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;    
    &lt;/div&gt;
&lt;/div&gt;
@endsection</code></pre>

<p>Vista de roles&nbsp;(index)</p>

<pre>
<code class="language-html">@extends("layout/layout_blog")
@section("content")
&lt;div class="container"&gt;
    &lt;div class="row"&gt;
        &lt;div class="col-md-8 col-md-offset-2 mt-3 "&gt;
            &lt;div class="panel panel-default"&gt;
                &lt;div class="panel-heading"  &gt;
                    Roles
                    @can("roles.create")
                    &lt;a href="{{ route("roles.create") }}" 
                        class="btn btn-sm btn-primary floatR"&gt;
                           Crear
                    &lt;/a&gt;
                    @endcan
                &lt;/div&gt;
                &lt;div class="panel-body"&gt;
                    &lt;table class="table table-striped table-hover"&gt;
                        &lt;thead&gt;
                            &lt;tr&gt;
                                &lt;th width="10px"&gt;ID&lt;/th&gt;
                                &lt;th&gt;Nombre&lt;/th&gt;
                                &lt;th colspan="3"&gt; &lt;/th&gt;
                            &lt;/tr&gt;
                        &lt;/thead&gt;
                        &lt;tbody&gt;
                            @foreach($roles as $role)
                            &lt;tr&gt;
                                &lt;td&gt;{{ $role-&gt;id }}&lt;/td&gt;
                                &lt;td&gt;{{ $role-&gt;name }}&lt;/td&gt;
                                &lt;td width="10px"&gt;
                                    @can("roles.index")
                                    &lt;a href="{{ route("roles.show", $role-&gt;id) }}"
                                       class="btn btn-sm btn-default"&gt;
                                           Ver
                                    &lt;/a&gt;
                                    @endcan
                                &lt;/td&gt;
                                &lt;td width="10px"&gt;
                                    @can("roles.edit")
                                    &lt;a href="{{ route("roles.edit", $role-&gt;id) }}"
                                       class="btn btn-sm btn-default"&gt;
                                           Editar
                                    &lt;/a&gt;
                                    @endcan
                                &lt;/td&gt;
                                &lt;td width="10px"&gt;
                                    @can("roles.destroy")
                                    {!! Form::open(["route" =&gt; ["roles.destroy", $role-&gt;id],
                                    "method" =&gt; "DELETE"]) !!}
                                    &lt;button class="btn btn-sm btn-danger"&gt;
                                        Eliminar
                                    &lt;/button&gt;
                                    {!! Form::close() !!}
                                    @endcan
                                &lt;/td&gt;
                            &lt;/tr&gt;
                            @endforeach
                        &lt;/tbody&gt;
                    &lt;/table&gt;
                    {{ $roles-&gt;render() }}
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
@endsection</code></pre>

<p>Solo queda a&ntilde;adir las vistas del detalle (show), el formulario de creaci&oacute;n (create) y el formulario de edici&oacute;n (edit).</p>

<p>Vista detalle de usuarios (show)</p>

<pre>
<code class="language-html">@extends("layout/layout_blog")
@section("content")
 
&lt;div class="container"&gt;
    &lt;div class="row"&gt;
        &lt;div class="col-md-8 col-md-offset-2 mt-3 "&gt;
            &lt;div class="panel panel-default"&gt;
                &lt;div class="panel-heading text-center" &gt;
                    Usuarios
                &lt;/div&gt;
                &lt;div class="panel-body"&gt;
                    &lt;p&gt;&lt;strong&gt;Nombre&lt;/strong&gt; {{ $user-&gt;name }}&lt;/p&gt;
                    &lt;p&gt;&lt;strong&gt;Email&lt;/strong&gt; {{ $user-&gt;email }}&lt;/p&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
@endsection</code></pre>

<p>Vista detalle de roles (show)</p>

<pre>
<code class="language-html">@extends("layout/layout_blog")
@section("content")
 
&lt;div class="container"&gt;
    &lt;div class="row"&gt;
        &lt;div class="col-md-8 col-md-offset-2 mt-3 "&gt;
            &lt;div class="panel panel-default"&gt;
                &lt;div class="panel-heading text-center" &gt;
                    Roles
                &lt;/div&gt;
                &lt;div class="panel-body"&gt;
                    &lt;p&gt;&lt;strong&gt;Nombre&lt;/strong&gt; {{ $role-&gt;name }}&lt;/p&gt;
                    &lt;p&gt;&lt;strong&gt;Slug&lt;/strong&gt; {{ $role-&gt;slug }}&lt;/p&gt;
                    &lt;p&gt;&lt;strong&gt;Descripción&lt;/strong&gt; {{ $role-&gt;description }}&lt;/p&gt;
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
</code></pre>

<p>El formulario de creaci&oacute;n y edici&oacute;n se puede optimizar con&nbsp;LaravelCollective&nbsp;haciendo uso de un &uacute;nico formulario y a&ntilde;adi&eacute;ndolo con un include.&nbsp; Para el caso de usuarios solo es necesaria la edici&oacute;n ya que el m&oacute;dulo&nbsp;auth&nbsp;ya contiene un formulario definido para la creaci&oacute;n de usuarios. Sin embargo se realiza el mismo mecanismo que en roles para mantener la misma estructura de c&oacute;digo.</p>

<p>Vista de formulario usuarios (form)</p>

<pre>
<code class="language-html">&lt;div class="form-group"&gt;
    {{ Form::label("name","Nombre") }}
    {{ Form::text("name",null,["class" =&gt; "form-control"])  }}
&lt;/div&gt;
&lt;hr&gt;
&lt;h3&gt;Lista de roles&lt;/h3&gt;
&lt;div class="form-group"&gt;
    &lt;ul class="list-unstyled"&gt;
        @foreach($roles as $role)
        &lt;li&gt;
            &lt;label&gt;
                {{ Form::checkbox("roles[]",$role-&gt;id,null) }}
                {{ $role-&gt;name }}
                &lt;em&gt;({{ $role-&gt;description ?: "N/A" }})&lt;/em&gt;
            &lt;/label&gt;
        &lt;/li&gt;
        @endforeach
    &lt;/ul&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;    
    {{ Form::submit("Guardar",["class" =&gt; "btn btn-sm btn-primary"])  }}
&lt;/div&gt;</code></pre>

<p>Vista de formulario roles (form)</p>

<pre>
<code class="language-html">&lt;div class="form-group"&gt;
    {{ Form::label("name","Nombre") }}
    {{ Form::text("name",null,["class" =&gt; "form-control"])  }}
&lt;/div&gt;
&lt;div class="form-group"&gt;
    {{ Form::label("slug","URL Amigable") }}
    {{ Form::text("slug",null,["class" =&gt; "form-control"])  }}
&lt;/div&gt;
&lt;div class="form-group"&gt;
    {{ Form::label("description","Descripción") }}
    {{ Form::text("description",null,["class" =&gt; "form-control"])  }}
&lt;/div&gt;
&lt;hr&gt;
&lt;h3&gt;Permiso especial&lt;/h3&gt;
&lt;div class="form-group"&gt;
    &lt;label&gt;{{ Form::radio("special", "all-access") }} Acceso Total&lt;/label&gt;
    &lt;label&gt;{{ Form::radio("special", "no-access") }} Ningún acceso&lt;/label&gt;
&lt;/div&gt;
&lt;h3&gt;Lista de roles&lt;/h3&gt;
&lt;div class="form-group"&gt;
    &lt;ul class="list-unstyled"&gt;
        @foreach($permissions as $permission)
        &lt;li&gt;
            &lt;label&gt;
                {{ Form::checkbox("permissions[]",$permission-&gt;id,null) }}
                {{ $permission-&gt;name }}
                &lt;em&gt;({{ $permission-&gt;description ?: "Sin descripción" }})&lt;/em&gt;
            &lt;/label&gt;
        &lt;/li&gt;
        @endforeach
    &lt;/ul&gt;
&lt;/div&gt;
&lt;div class="form-group"&gt;    
    {{ Form::submit("Guardar",["class" =&gt; "btn btn-sm btn-primary"])  }}
&lt;/div&gt;
</code></pre>

<p>A continuaci&oacute;n se muestra el c&oacute;digo de las vistas de creaci&oacute;n y edici&oacute;n que contienen los formularios anteriores a&ntilde;adidos con un include. La vista de edici&oacute;n de usuario es la vista que permite marcar o desmarcar de la lista de roles existentes al usuario editado.</p>

<p>Vista de edici&oacute;n de usuarios (edit)</p>

<pre>
<code class="language-html">@extends(\'layouts.app\')
@section(\'content\')
&lt;div class="container"&gt;
    &lt;div class="row"&gt;
        &lt;div class="col-md-8 col-md-offset-2"&gt;
            &lt;div class="panel panel-default"&gt;
                &lt;div class="panel-heading"&gt;Producto&lt;/div&gt;
                    
                &lt;div class="panel-body"&gt;
                    {!! Form::model($user, ["route" =&gt; ["users.update",$user-&gt;id],
                    "method" =&gt; "PUT" ]) !!}
                    
                        @include("users.partials.form")
                    
                    {!! Form::close() !!}
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
@endsection</code></pre>

<p>La vista de creaci&oacute;n est&aacute; compuesta por cajas de texto para introducir el nombre, la url amigable y la descripci&oacute;n, adem&aacute;s de toda la lista de permisos existentes que permiten asignar el permiso o los permisos definidos para el nuevo rol.</p>

<p>Vista de creaci&oacute;n de roles (create)</p>

<pre>
<code class="language-html">@extends(\'layout/layout_blog\')
@section(\'content\')
&lt;div class="container"&gt;
    &lt;div class="row"&gt;
        &lt;div class="col-md-8 col-md-offset-2"&gt;
            &lt;div class="panel panel-default"&gt;
                &lt;div class="panel-heading"&gt;
                    Role                    
                &lt;/div&gt;                    
                &lt;div class="panel-body"&gt;
                    {!! Form::open(["route" =&gt; "roles.store"]) !!}
                    
                        @include("roles.partials.form")
                    
                    {!! Form::close() !!}
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
@endsection
</code></pre>

<p>La vista de edici&oacute;n es igual que la de creaci&oacute;n pero con los datos mostrados</p>

<p>Vista de edici&oacute;n de roles (edit)</p>

<pre>
<code class="language-html">@extends(\'layout/layout_blog\')
@section(\'content\')
&lt;div class="container"&gt;
    &lt;div class="row"&gt;
        &lt;div class="col-md-8 col-md-offset-2"&gt;
            &lt;div class="panel panel-default"&gt;
                &lt;div class="panel-heading"&gt;Role&lt;/div&gt;
                    
                &lt;div class="panel-body"&gt;
                    {!! Form::model($role, ["route" =&gt; ["roles.update",$role-&gt;id],
                    "method" =&gt; "PUT" ]) !!}
                    
                        @include("roles.partials.form")
                    
                    {!! Form::close() !!}
                &lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
@endsection</code></pre>

<p>Fuente:&nbsp;<a href="https://www.youtube.com/channel/UCRByhHailXC3HqWL2QrYw7w">//www.youtube.com/channel/UCRByhHailXC3HqWL2QrYw7w</a></p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/IQH5RmphEJoCh1LfXgMOqGvP4nsoosUT4q4u4ED4.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);
        //65
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Exportar a Excel',
            'slug' => 'exportar-a-excel',
            'body_main' => 'Exportar a formato Excel en Laravel',
            'body_plus' => '<p>Exportar una tabla a un documento Excel es posible mediante la librer&iacute;a MaatWebsite. Para ello es necesario instalar la librer&iacute;a, crear una clase que contiene los datos y se crea el m&eacute;todo que permite enviarlos. Para instalar MaatWebsite, se realiza un require desde la terminal y desde el archivo&nbsp;config/app.php&nbsp;se registra el servicio en el array&nbsp;providers&nbsp;y el alias en el array&nbsp;aliases.</p>

<p><strong>INSTALAR MaatWebsite</strong></p>

<pre>
<code class="language-bash">composer.phar require maatwebsite/excel
</code></pre>

<p>Registrar Provider</p>

<pre>
<code class="language-php">Maatwebsite\Excel\ExcelServiceProvider::class,
</code></pre>

<p>Registrar alias</p>

<pre>
<code class="language-php">\'Excel\' =&gt; Maatwebsite\Excel\Facades\Excel::class,​
</code></pre>

<p><strong>CREAR CLASE</strong></p>

<p>Una vez instalado el paquete se crea una clase para personalizar los datos a exportar. En el ejemplo siguiente se crea la clase donde se indican los campos presentes en la tabla y se crea una colecci&oacute;n de la tabla seleccionando los campos.&nbsp;</p>

<pre>
<code class="language-php"><!--?php
namespace App\Exports;
use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            \'Id\',
            \'Nombre\',
            \'Email\',
        ];
    }
    public function collection()
    {
         $users = DB::table(\'Users\')---></code></pre>

<pre>
<code class="language-php">&lt;?php
namespace App\Exports;
use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        return [
            \'Id\',
            \'Nombre\',
            \'Email\',
        ];
    }
    public function collection()
    {
         $users = DB::table(\'Users\')-&gt;select(\'id\',\'name\', \'email\')-&gt;get();
         return $users;
        
    }
}</code></pre>

<p><strong>CREAR M&Eacute;TODO</strong></p>

<p>A continuaci&oacute;n desde un controlador se crea un m&eacute;todo que env&iacute;a los datos del Excel. El c&oacute;digo de ejemplo que sigue a continuaci&oacute;n muestra con el m&eacute;todo nombrado&nbsp;&nbsp;export,&nbsp;aunque puede tener cualquier otro nombre, realiza la llamada al m&eacute;todo&nbsp;download&nbsp;que contiene dos par&aacute;metros. El primer par&aacute;metro es la instancia de la clase creada anteriormente, en este caso llamada UsersExport&nbsp;y&nbsp;el segundo par&aacute;metro es el nombre que se&nbsp; le quiere dar al archivo que ser&aacute; descargado.</p>

<pre>
<code class="language-php">&lt;?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class HomeController extends Controller
{
    public function export(){
        return Excel::download(new UsersExport,"users.xlsx");
    }
}</code></pre>

<pre>
<code class="language-php"><!--?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
class HomeController extends Controller
{
    public function export(){
        return Excel::download(new UsersExport,"users.xlsx");
    }
}</code--></code></pre>

<p><strong><code class="language-php">CREAR RUTA</code></strong></p>

<p><code class="language-php">En el archivo de rutas se a&ntilde;ade la ruta del m&eacute;todo creado.</code></p>

<pre>
<code class="language-php">Route::get("/exportar","HomeController@export");</code></pre>

<pre>
<strong><span style="font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;">CREAR ENLACE DESDE LA VISTA</span>
</strong></pre>

<p><code class="language-php">Desde la vista se crea un enlace hacia la ruta</code></p>

<pre>
<code class="language-html">&lt;a href="/exportar"&gt;Exportar&lt;/a&gt;
</code></pre>

<pre>
<code class="language-php">Fuente: Extraido de&nbsp;<a href="https://www.nigmacode.com/laravel/Exportar-excel-en-Laravel" target="_blank">NIGMACode</a>&nbsp;y muy bien explicado por Jos&eacute; Lu&iacute;s Guisado</code></pre>

<p style="text-align: center;"><code class="language-php"><strong>EXPORTAR PASANDO DATOS</strong></code></p>

<p><code class="language-php">Existe tambi&eacute;n la posibilidad de exportar pasando datos desde la vista al controlador. Para ello es necesario a&ntilde;adir los par&aacute;metros en la vista y en la ruta para despu&eacute;s a&ntilde;adirlos en la llamada al m&eacute;todo download&nbsp; el controlador.&nbsp;</code></p>

<p><code class="language-php"><strong>CREAR VISTA</strong></code></p>

<p><code class="language-php">Se crea el enlace pasando el par&aacute;metro.</code></p>

<pre>
<code class="language-html">&lt;div&gt;
    &lt;a href ="{{route(\'exportar\',$factura-&gt;id)}}"&gt;Excel&lt;/button&gt;
&lt;/div&gt;</code></pre>

<p><strong>CREAR RUTA</strong></p>

<p>Se incluye el par&aacute;metro en la ruta desde el archivo de rutas.</p>

<pre>
<code class="language-php">Route::get(\'exportar/{id}\',"FacturasController@export")-&gt;name("exportar");
</code></pre>

<pre>
<strong>CREAR M&Eacute;TODO</strong></pre>

<p>El m&eacute;todo debe realizar la llamada al m&eacute;todo download con sus dos par&aacute;metros. El primer par&aacute;metro es la clase que es el que incluye los datos y el segundo par&aacute;metro es el nombre del archivo que ser&aacute; descargado.</p>

<pre>
<code class="language-php">public function export($id){        
        $productos_factura=Detalle_factura::where("id_factura",$id)-&gt;get();
        return Excel::download(new FacturasExport($productos_factura),"factura.xlsx");
} </code></pre>

<pre>
<strong>CREAR CLASE</strong></pre>

<p>La clase, a diferencia de la clase del ejemplo anterior (sin datos) no utiliza el m&eacute;todo collection, si no el m&eacute;todo&nbsp;<strong>view</strong>. Para ello se debe importar la interface&nbsp;<strong>View</strong>&nbsp;de Laravel e implementar&nbsp;<strong>FromView</strong>&nbsp;tal como se puede observar en el c&oacute;digo siguiente. Esto tambi&eacute;n es &uacute;til para una tabla que maneja datos relacionados con otras tablas.&nbsp;</p>

<pre>
<code class="language-php">namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class FacturasExport implements FromView {
  protected $productos;
  public function __construct($productos_factura=null)
  {
      $this-&gt;productos=$productos_factura;
  }
  public function view(): View {
      $productos_factura=$this-&gt;productos;
      return view("facturas.ajax-product",compact("productos_factura"));
  }
}</code></pre>

<p>fuente:&nbsp;<a href="https://styde.net/exportar-archivos-en-formato-excel-con-laravel-excel-3-x/" target="_blank">styde.net</a></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/Trn8uf9rDP9jvnfot1NfJamMR0bvOyV5jPBFo7Df.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //66
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Exportar PDF',
            'slug' => 'exportar-pdf',
            'body_main' => 'Exportar a PDF en Laravel',
            'body_plus' => '<p>Exportar un documento en formato PDF es posible mediante la librer&iacute;a&nbsp;<strong>DOMPDF</strong>. Para ello es necesario instalarla<strong>,&nbsp;</strong>registrar la clase en el array&nbsp;<strong>providers</strong>&nbsp;y registrar el alias en el array&nbsp;<strong>aliases</strong>&nbsp;del archivo&nbsp;<strong>config/app.php</strong>.</p>

<p>INSTALAR DOMPDF</p>

<pre>
<code class="language-bash">composer require barryvdh/laravel-dompdf
</code></pre>

<p><strong>REGISTRAR</strong></p>

<p><strong>Registrar providers</strong></p>

<pre>
<code class="language-php">Barryvdh\DomPDF\ServiceProvider::class,
</code></pre>

<p>Registrar aliases</p>

<pre>
<code class="language-php">\'PDF\' =&gt; Barryvdh\DomPDF\Facade::class,
</code></pre>

<p><strong>CREAR VISTA</strong></p>

<p>Con la librer&iacute;a instalada y registrada se puede ya crear la vista a&ntilde;adiendo los estilos si es necesario con la etiqueta&nbsp;style, ya que el PDF generado interpretar&aacute; todas las etiquetas&nbsp;html.</p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;Document&lt;/title&gt;
        &lt;style&gt;
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    &lt;/style&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Titulo de prueba&lt;/h1&gt;
        &lt;hr&gt;
        &lt;div class="contenido"&gt;
            &lt;p id="primero"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nihil illo odit aperiam alias rem voluptatem odio maiores doloribus facere recusandae suscipit animi quod voluptatibus, laudantium obcaecati quisquam minus modi.&lt;/p&gt;
            &lt;p id="segundo"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nihil illo odit aperiam alias rem voluptatem odio maiores doloribus facere recusandae suscipit animi quod voluptatibus, laudantium obcaecati quisquam minus modi.&lt;/p&gt;
            &lt;p id="tercero"&gt;Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore nihil illo odit aperiam alias rem voluptatem odio maiores doloribus facere recusandae suscipit animi quod voluptatibus, laudantium obcaecati quisquam minus modi.&lt;/p&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>CREAR RUTA</p>

<p>El siguiente paso ser&aacute; crear la ruta desde el archivo de rutas</p>

<pre>
<code class="language-php">Route::name(\'print\')-&gt;get(\'/imprimir\', \'GeneradorController@imprimir\');
</code></pre>

<p>CREAR M&Eacute;TODO</p>

<p>Por &uacute;ltimo se crea el m&eacute;todo desde el controlador que es el que&nbsp; realiza la llamada del m&eacute;todo&nbsp;loadView&nbsp;pasando como par&aacute;metro la vista que ser&aacute; cargada y a continuaci&oacute;n se realiza la llamada al m&eacute;todo&nbsp;download&nbsp;(pasando como par&aacute;metro el nombre) que quedar&aacute; asignado en la descarga del archivo.</p>

<pre>
<code class="language-php">public function imprimir(){
     $pdf = \PDF::loadView(\'ejemplo\');
     return $pdf-&gt;download(\'ejemplo.pdf\');
}</code></pre>

<p>Al igual que al exportar en formato Excel,&nbsp;<strong>DOMPDF</strong>&nbsp;permite pasar datos. As&iacute; pues, de la misma manera que si fuera una vista normal y corriente se pasan los datos desde el controlador.</p>

<pre>
<code class="language-php">public function imprimir(){
     $pdf = \PDF::loadView(\'ejemplo\',compact("datos");
     return $pdf-&gt;download(\'ejemplo.pdf\');
}</code></pre>

<p>Fuente: Extra&iacute;do de&nbsp;<a href="https://www.nigmacode.com/laravel/Generar-pdf-Dompdf-Laravel" target="_blank">NIGMACode</a>&nbsp;por Jos&eacute; Lu&iacute;s Guisado.</p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/94LB3Fy1zg3sxkzPlTVp3ZB3o6SjSSG5dlh4evEK.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //67
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Dotenv',
            'slug' => 'dotenv',
            'body_main' => 'Librería para manejar variables de entorno',
            'body_plus' => '<p>La librer&iacute;a Dotenv permite obtener y modificar variables de entorno, como por ejemplo, las variables del archivo .env. Por seguridad se recomienda alojar el archivo en la ra&iacute;z del proyecto y nunca en la carpeta publica(public,httdocs,html...). Esta librer&iacute;a es compatible con la mayor&iacute;a de versiones de PHP desde la versi&oacute;n 5.4.</p>

<p><strong>INSTALACI&Oacute;N</strong>&nbsp;</p>

<pre>
<code class="language-bash">composer.phar require vlucas/phpdotenv
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/b27v4emv5cKNlEbjQvUnrQ4LW4mJXgdFMkG1xASA.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);
        //68
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Añadir iconos mediante font awesome',
            'slug' => 'anadir-iconos-mediante-font-awesome',
            'body_main' => 'Insertar iconos fácilmente con fontawesome',
            'body_plus' => '<p style="text-align:left"><span style="font-size:18px"><span style="color:black"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="background-color:#ffffff"><strong>Font Awesome</strong>&nbsp;es un framework que permite insertar iconos de forma sencilla y r&aacute;pida a un proyecto.</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:black"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="background-color:#ffffff"><span style="color:#0000ff"><strong>INSTALAR FONT AWESOME</strong></span></span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:black"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="background-color:#ffffff">Fontawesome dispone de varios m&eacute;todos para poder a&ntilde;adir los iconos, uno de ellos es la&nbsp;<strong>descarga para web</strong>. Para ello es necesario dirigirse a la opci&oacute;n de descarga&nbsp;<span style="font-size:1rem">desde&nbsp;</span><a href="https://fontawesome.com/how-to-use/on-the-web/setup/hosting-font-awesome-yourself" target="_blank">fontawesome</a>.</span></span></span></span></p>

<p style="text-align:left">&nbsp;</p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:black"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="background-color:#ffffff">El archivo descargado contiene distintas carpetas una vez descomprimido,de los cuales para este ejemplo solamente es necesario el archivo&nbsp;<strong>all.css</strong>&nbsp;del directorio css y el directorio completo&nbsp;<strong>webfonts</strong>. Para el correcto funcionamiento de fontawesome es necesario situar la carpeta webfonts un nivel por encima del archivo all.css.&nbsp; Para ello se copia el directorio webfonts completo en el directorio<span style="font-size:1rem">&nbsp;destinado a estilos css y</span>&nbsp;<span style="font-size:1rem">se crea una nueva carpeta en la que</span><span style="font-size:1rem">&nbsp;se&nbsp;</span><span style="font-size:1rem">copia el archivo all.css.&nbsp;</span><span style="font-size:1rem">Ya solo queda registrar el archivo all.css en la cabecera del proyecto indicando la ruta completa.</span></span></span></span></span></p>

<pre>
<code class="language-html">&lt;link href="{{ asset(\'css/all.css\') }}" rel="stylesheet" type="text/css"&gt;
</code></pre>

<p><strong>VERSIONES DE ICONO</strong></p>

<p>Existen cinco versiones o tipos distintos de icono:</p>

<ul>
    <li>SOLID</li>
    <li>REGULAR</li>
    <li>LIGHT</li>
    <li>DUOTONE</li>
    <li>BRANDS</li>
</ul>

<p>Las versiones&nbsp;solid&nbsp;y&nbsp;brands&nbsp;son gratuitas mientras que el resto requieren de licencia Pro.</p>

<p><strong>A&Ntilde;ADIR ICONO</strong></p>

<p>A&ntilde;adir un icono es realmente sencillo, es suficiente con a&ntilde;adir un enlace:</p>

<pre>
<code class="language-html">&lt;i class="fas fa-camera"&gt;&lt;/i&gt;
</code></pre>

<p>El prefijo&nbsp;fas&nbsp;se refiere a la versi&oacute;n solid y el&nbsp;fa-camera&nbsp;indica el tipo de icono que se puede seleccionar desde la secci&oacute;n de iconos de&nbsp;<a href="https://fontawesome.com/icons?d=gallery" target="_blank">fontawesome</a>.</p>

<p>TIPOS DE ICONOS</p>

<p>Es preciso explicar que en versiones anteriores el prefijo&nbsp;era&nbsp;fa&nbsp;pero a partir de la&nbsp;versi&oacute;n 5&nbsp;cada tipo de icono dispone de un prefijo distinto.</p>

<p>Tal como indica la&nbsp;<a href="https://fontawesome.com/v5.0.13/how-to-use/on-the-web/referencing-icons/basic-use" target="_blank">documentaci&oacute;n</a>&nbsp;cada tipo de icono se identifica con un prefijo distinto.</p>

<ul>
    <li>SOLID -&gt; fas</li>
    <li>REGULAR -&gt; far</li>
    <li>LIGHT -&gt; fal</li>
    <li>BRANDS -&gt; fab</li>
</ul>

<p>ESTILOS&nbsp;</p>

<p>FontAwesome permite dar estilo a los iconos de igual forma que se le da estilo a una clase de cualquier elemento.&nbsp;</p>

<pre>
<code class="language-css">.fa-camera{
    color: #000;
}</code></pre>

<p>Como tambi&eacute;n dispone de distintos tama&ntilde;os a&ntilde;adiendo sufijos similares a las utilizadas&nbsp; en&nbsp; bootstrap (sm,md,lg,xl).</p>

<pre>
<code class="language-html">&lt;i class="fas fa-camera fa-lg"&gt;&lt;/i&gt;
</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/j9IwcGWo1lGnDrDGmivPlX9REuYB4XUmP7uQJUQl.jpg'

        ]);

        //69
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Actualizar Angular y NPM',
            'slug' => 'actualizar-angular-y-npm',
            'body_main' => 'Instalación o actualización de Angular en Linux',
            'body_plus' => '<p>Para instalar o actualizar Angular a su &uacute;ltima versi&oacute;n es necesario disponer de&nbsp;<strong>NodeJS</strong>&nbsp;y&nbsp;<strong>NPM</strong>&nbsp;en el sistema. A&nbsp; &nbsp;continuaci&oacute;n se muestran los pasos para descargar&nbsp;<strong>NodeJS</strong>&nbsp;que tambi&eacute;n se puede descargar&nbsp;desde su&nbsp;<a href="https://nodejs.org/es/" target="_blank">p&aacute;gina oficial</a>&nbsp;y de&nbsp;<strong>NPM</strong>.&nbsp;</p>

<p>INSTALAR NODE</p>

<p>Con apt:</p>

<pre>
<code class="language-bash">sudo apt install node
sudo apt install build-essential
</code></pre>

<p>Con curl: (&uacute;ltima versi&oacute;n)</p>

<pre>
<code class="language-bash">curl -sL https://deb.nodesource.com/setup_13.x | bash -
apt-get install -y nodejs</code></pre>

<p>COMPROBAR VERSI&Oacute;N</p>

<pre>
<code class="language-bash">node --version
</code></pre>

<p>INSTALAR NPM</p>

<pre>
<code class="language-bash">sudo apt install npm
</code></pre>

<p>COMPROBAR VERSI&Oacute;N</p>

<pre>
<code class="language-bash">npm --version
</code></pre>

<pre>
<code class="language-bash">npm -v
</code></pre>

<p>ACTUALIZAR NPM</p>

<pre>
<code class="language-bash">npm install -g npm@latest
</code></pre>

<p>ACTUALIZAR ANGULAR</p>

<p>En caso de actualizar Angular es necesario desinstalar la versi&oacute;n actual de angular cli y a continuaci&oacute;n eliminar la cach&eacute; y as&iacute; evitar errores con la nueva instalaci&oacute;n.</p>

<p>DESINSTALAR ANGULAR CLI</p>

<pre>
<code class="language-bash">npm uninstall -g @angular/cli
</code></pre>

<p><strong>DESINSTALAR VERSIONES ANTERIORES DE ANGULAR CLI</strong></p>

<pre>
<code class="language-bash">npm uninstall -g angular-cli
</code></pre>

<p>BORRAR CACHE</p>

<pre>
<code class="language-bash">npm cache verify
</code></pre>

<pre>
<code class="language-bash">npm cache clean --force
</code></pre>

<p>INSTALAR ANGULAR CLI</p>

<pre>
<code class="language-bash">npm install -g @angular/cli
</code></pre>

<p>INSTALAR &Uacute;LTIMA VERSI&Oacute;N ANGULAR CLI</p>

<pre>
<code class="language-bash">npm install -g @angular/cli@latest
</code></pre>

<p>COMPROBAR VERSI&Oacute;N</p>

<pre>
<code class="language-bash">ng --version
</code></pre>

<p>Para instalar un nuevo proyecto de Angular es necesario ubicarse en el directorio de proyectos que es donde se crear&aacute; una carpeta con todo el andamiaje de archivos necesarios (scaffolding) para un proyecto Angular</p>

<p>INSTALAR PROYECTO ANGULAR</p>

<pre>
<code class="language-bash">ng new MiProyecto
</code></pre>

<p>INSTALAR PROYECTO ANGULAR</p>

<pre>
<code class="language-bash">ng new
</code></pre>

<p>INSTALAR NVM&nbsp;(Gestor de versiones de Node)</p>

<pre>
<code class="language-bash">curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash
</code></pre>

<p>Nota: Recomendable desinstalar Nodejs si ya se encuentra instalado. Para que tome efecto la primera vez cerrar y abrir la terminal.</p>

<p>COMPROBAR VERSIONES INSTALADAS</p>

<pre>
<code class="language-bash">nvm ls
</code></pre>

<pre>
<code class="language-bash">nvm list
</code></pre>

<p>COMPROBAR VERSIONES DISPONIBLES</p>

<pre>
<code class="language-bash">nvm ls-remote
</code></pre>

<p>COMPROBAR VERSIONES DISPONIBLES ESTABLES (LTS)</p>

<pre>
<code class="language-bash">nvm ls-remote --lts
</code></pre>

<p>INSTALAR VERSI&Oacute;N DE NODE CON NVM</p>

<pre>
<code class="language-bash">nvm install vXX.XX.X
</code></pre>

<p>DESINSTALAR VERSI&Oacute;N DE NODE CON NVM</p>

<pre>
<code class="language-bash">nvm uninstall v.XX.XX.X
</code></pre>

<p>ACTIVAR UNA DE LAS VERSIONES INSTALADAS</p>

<pre>
<code class="language-bash">nvm use vXX.XX.X
</code></pre>

<p>Una caracter&iacute;stica &uacute;til de nvm es la de configurar cada proyecto con una versi&oacute;n espec&iacute;fica. Es posible configurar una versi&oacute;n fija, la &uacute;ltima versi&oacute;n estable o la versi&oacute;n m&aacute;s reciente de Node, esto se hace generando el archivo .nvmrc en la ra&iacute;z del proyecto y asignando la versi&oacute;n. Este archivo se puede crear desde el directorio ra&iacute;z del proyecto, ya sea con un editor de texto o directamente desde la terminal con el comando&nbsp;<strong>echo</strong>.</p>

<p>Ejemplo:</p>

<p>Editar el archivo .nvmrc</p>

<pre>
<code class="language-bash">nano .nvmrc
</code></pre>

<p>Contenido del archivo .nvmrc de una versi&oacute;n espec&iacute;fica</p>

<pre>
<code class="language-bash">14.17.0
</code></pre>

<p>Si necesitamos la &uacute;ltima versi&oacute;n</p>

<pre>
<code class="language-bash">node</code></pre>

<p>O si necesitamos la &uacute;ltima versi&oacute;n estable</p>

<pre>
<code class="language-bash">lts/*
</code></pre>

<p>O crearlo de la misma forma con el comando&nbsp;echo</p>

<pre>
<code class="language-bash">echo "14.17.0" &gt; .nvmrc
</code></pre>

<p>Con este archivo creado en la ra&iacute;z del proyecto podemos hacer uso del comando&nbsp;nvm use,&nbsp;nvm run&nbsp;y&nbsp;nvm which&nbsp;y nvm autom&aacute;ticamente comprobar&aacute; si existe el archivo y lo tomar&aacute; en cuenta antes de ejecutar el comando.</p>

<p>Si hemos tenido node instalado anteriormente es posible que nos aparezca un mensaje indicando que existe el archivo .npmrc con una versi&oacute;n de node espec&iacute;fica, para ello editamos el archivo y eliminamos manualmente o&nbsp; nvm permite eliminarlo con el siguiente comando:</p>

<pre>
<code class="language-bash">nvm use --delete-prefix vXX.XX.X
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/zV35oErkpV5zK01AxqPeUftsAI1C8tVIQ2XgdcC5.jpg'
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 17
        ]);
        //70
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Error vulnerabilities de NPM y Node',
            'slug' => 'error-vulnerabilities-de-npm-y-node',
            'body_main' => 'Solución al error de audiciones de seguridad de NPM',
            'body_plus' => '<p>El error de audiciones es com&uacute;n en la actualizaci&oacute;n de algunas versiones de Angular. Evitar este tipo de avisos es posible desactivando las audiciones ya sea mediante la instalaci&oacute;n de los paquetes o modificando la configuraci&oacute;n de NPM. A continuaci&oacute;n se muestran los pasos previos (actualizar y borrar cach&eacute;) y los comando de las dos opciones para desactivar las audiciones.</p>

<p><strong>ACTUALIZAR NPM</strong></p>

<pre>
<code class="language-bash">npm install -g npm@latest
</code></pre>

<p><strong>BORRAR LA CACH&Eacute;</strong></p>

<pre>
<code class="language-bash">npm cache clean --force
</code></pre>

<p><strong>DESACTIVAR LAS AUDICIONES MEDIANTE LA INSTALACI&Oacute;N DE PAQUETES</strong></p>

<pre>
<code class="language-bash">npm install paquete --no-audit
</code></pre>

<p><strong>DESACTIVAR LAS AUDICIONES MEDIANTE COMANDO SET</strong></p>

<pre>
<code class="language-bash">npm set audit false
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/oLYL0HoJvCK6fTCjWIXLTxHOMDdyci8ECkQJIHXv.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 12
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 17
        ]);
        //71
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Migrar proyecto Angular',
            'slug' => 'migrar-proyecto-angular',
            'body_main' => 'Migrar un proyecto Angular a la última versión',
            'body_plus' => '<p>En el proceso de migraci&oacute;n los proyectos de Angular pueden producir avisos y errores. Para ello es necesario actualizar el proyecto una nueva versi&oacute;n, pero en dicha actualizaci&oacute;n tambi&eacute;n se pueden producir nuevos errores. Para solucionar estos errores a la hora de actualizar, es necesario comprobar el tipo de error que muestra en pantalla e ir solucionando uno a uno mediante algunos comandos de los que Angular dispone. A continuaci&oacute;n se explican los pasos a realizar en una actualizaci&oacute;n de un proyecto Angular con una versi&oacute;n anterior.</p>

<p><strong>COPIA DE SEGURIDAD</strong></p>

<p>El primer paso para realizar una migraci&oacute;n de un proyecto Angular es una copia de seguridad.<br />
&nbsp;</p>

<p><strong>ACTUALIZAR PROYECTO ANGULAR</strong></p>

<pre>
<code class="language-bash">ng update
</code></pre>

<p><strong>ERROR DE VERSION</strong></p>

<pre>
<code class="language-bash">Your global Angular CLI versión (6.0.1) is greater than your local version (1.5.0). 
The local Angular CLI version is used.</code></pre>

<p>El c&oacute;digo de arriba es un ejemplo de un error com&uacute;n al actualizar&nbsp;con&nbsp;<strong>update</strong>&nbsp;un proyecto que contiene una versi&oacute;n de Angular CLI anterior, por tanto, es necesario instalar la nueva versi&oacute;n de Angular Cli dentro del proyecto.</p>

<p><strong>INSTALAR ANGULAR CLI&nbsp;</strong></p>

<pre>
<code class="language-bash">npm install @angular/cli@latest
</code></pre>

<p><strong>VOLVER A ACTUALIZAR</strong></p>

<p>Al volver a actualizar con&nbsp;<strong>update</strong>&nbsp;despu&eacute;s de haber instalado la &uacute;ltima versi&oacute;n de Angular CLI la consola devuelve informaci&oacute;n de los distintos paquetes que necesitan ser&nbsp; actualizados incluyendo el comando necesario para ello. Adem&aacute;s existe la opci&oacute;n --all que permite actualizar todos los paquetes.</p>

<pre>
<code class="language-bash">ng update
</code></pre>

<p><strong>ACTUALIZAR TODOS LOS PAQUETES</strong></p>

<pre>
<code class="language-bash">ng update --all
</code></pre>

<p>Es posible de que despu&eacute;s de actualizar la consola devuelva incompatibilidades en las versiones de los paquetes, por lo que se puede editar&nbsp; el archivo package.json sustituyendo la versi&oacute;n o las versiones manualmente y volver a actualizar con NPM y con Angular.</p>

<pre>
<code class="language-javascript">"dependencies": {
    "@angular/animations": "~7.2.0",
    "@angular/common": "~7.2.0",
    "@angular/compiler": "~7.2.0",
    "@angular/core": "~7.2.0",
    "@angular/forms": "~7.2.0",
    "@angular/platform-browser": "~7.2.0",
    "@angular/platform-browser-dynamic": "~7.2.0",
    "@angular/router": "~7.2.0",
    "angular2-moment": "^1.9.0",
    "core-js": "^2.5.4",
    "jquery": "1.12",
    "rxjs": "~6.3.3",
    "rxjs-compat": "^6.5.3",
    "tslib": "^1.9.0",
    "zone.js": "~0.8.26"
  },</code></pre>

<p>El m&eacute;todo update de NPM instala las dependencias que hayamos sustituido en el archivo package.json.</p>

<pre>
<code class="language-bash">npm update
</code></pre>

<p>De nuevo se vuelven a actualizar los paquetes.</p>

<pre>
<code class="language-bash">ng update
</code></pre>

<p>A&ntilde;adiendo las opciones&nbsp;all&nbsp;y&nbsp;force&nbsp;si es necesario</p>

<pre>
<code class="language-bash">ng update --all --force
</code></pre>

<p><strong>ERROR TYPESCRIPT</strong></p>

<p>En ocasiones el error devuelto lo origina la versi&oacute;n de&nbsp;TypeScript, en estos casos es preferible desinstalar typescript, borrar la cach&eacute; y volver a instalar TypeScript con la versi&oacute;n requerida. TypeScript es recomendable instalarlo como dependencia de desarrollo, para instalar paquetes para desarrollo es necesario el uso de la opci&oacute;n dev.</p>

<p><strong>DESINSTALAR TYPESCRIPT</strong></p>

<pre>
<code class="language-bash">npm uninstall --save typescript
</code></pre>

<p>BORRAR CACH&Eacute;</p>

<pre>
<code class="language-bash">npm cache clean --force
</code></pre>

<p><strong>INSTALAR TYPESCRIPT</strong></p>

<pre>
<code class="language-bash">npm install --save-dev typescript@3.2.2
</code></pre>

<p><strong>ERROR BOOTSTRAP</strong></p>

<p>El paquete de Bootstrap, a diferencia de otros, puede no mostrar ning&uacute;n error por consola pero al iniciar el proyecto no mostrarse correctamente debido a que Bootstrap desde la versi&oacute;n 4.0 ha eliminado algunas de las propiedades de versiones anteriores. Para ello se realiza la misma operaci&oacute;n que TypeScript, se desinstala y se vuelve a instalar la versi&oacute;n requerida.</p>

<p><strong>DESINSTALAR BOOTSTRAP</strong></p>

<pre>
<code class="language-bash">npm uninstall --save bootstrap
</code></pre>

<p><strong>INSTALAR VERSI&Oacute;N ESPEC&Iacute;FICA DE BOOTSTRAP</strong></p>

<pre>
<code class="language-bash">npm install --save bootstrap@3.3.6
</code></pre>

<p>Desde la consola de errores del navegador es posible encontrar errores por versiones distintas de alg&uacute;n paquete instalado.</p>

<pre>
<code class="language-bash">Bootstrap`s Javascript requires jQuery version 1.9.1 or higher, but lower than version 3
</code></pre>

<p>La soluci&oacute;n, al igual que las anteriores consiste en actualizar el paquete a la versi&oacute;n indicada.</p>

<p><strong>DESINSTALAR PAQUETE</strong></p>

<pre>
<code class="language-bash">npm uninstall --save jquery
</code></pre>

<p><strong>INSTALAR PAQUETE COMPATIBLE</strong></p>

<pre>
<code class="language-bash">npm install --save jquery@1.9.1
</code></pre>

<p>Nota: Revisar si al desinstalar y volver a instalar paquetes es necesario editar el archivo angular.json y modificar la ruta del paquete indicada, ya que de un paquete a otro puede variar la ubicaci&oacute;n del archivo en otro subdirectorio.</p>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/XLsjSSuR8jzSuryBewYg69538BpK5KyRIFtC8nlj.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //72
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Error RXJS',
            'slug' => 'error-rxjs',
            'body_main' => 'Solución al error del paquete RXJS de Angular',
            'body_plus' => '<p>Al realizar una actualizaci&oacute;n de Angular a un proyecto que ha sido creado en una versi&oacute;n anterior pueden aparecer errores relacionado con la librer&iacute;a&nbsp;<strong>rxjs</strong>. El error que devuelve la consola puede ser similar al c&oacute;digo siguiente:&nbsp;&nbsp;</p>

<pre>
<code class="language-bash">ERROR in node_modules/rxjs/Observable.d.ts(1.15): error TS2307: Cannot find module 
\'rxjs-compat/Observable\'.
src/app/services/myservice.service.ts(5,10): error TS2305: Module \'"C:/var/www/proyecto/node_modules/rxjs/
Observable"\' has no exported member \'Observable\'</code></pre>

<p><strong>SOLUCI&Oacute;N AL ERROR RXJS</strong></p>

<p>Existen dos m&eacute;todos para solucionar este error, uno es modificar la ruta de los archivos que contengan el&nbsp;<strong>import</strong>&nbsp;de la librer&iacute;a&nbsp;<strong>rxjs</strong>&nbsp;y otra es instalar un paquete distinto de&nbsp;<strong>rxjs&nbsp;</strong>manteniendo todas las rutas intactas.</p>

<p><strong>OPCI&Oacute;N 1</strong></p>

<p>Para la primera opci&oacute;n es necesario editar las l&iacute;neas que provocan el error y sustituir la ruta.&nbsp;</p>

<p>Modificar las l&iacute;neas con la siguiente ruta:</p>

<pre>
<code class="language-bash">import { Observable } from "rxjs/Observable";
</code></pre>

<p>Por esta otra:</p>

<pre>
<code class="language-bash">import { Observable } from "rxjs";
</code></pre>

<p><strong>OPCI&Oacute;N 2</strong></p>

<p>Para la segunda opci&oacute;n solamente es necesario instalar desde la terminal el paquete&nbsp;rxjs-compat&nbsp;sin necesidad de realizar ning&uacute;n otro cambio.</p>

<pre>
<code class="language-bash">npm install --save rxjs-compat
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/NziDGJVUnsxjzfWEbqIbM19shTLCUwtiLX14TUAc.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //73
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Angular en VPS',
            'slug' => 'angular-en-vps',
            'body_main' => 'Preparar proyecto Angular para alojar en un VPS',
            'body_plus' => '<p><strong>&iquest;Que es un VPS?</strong></p>

<p>Un&nbsp;<strong>Virtual Private Secure</strong>&nbsp;(servidor virtual privado) es una partici&oacute;n de un servidor privado que permite personalizarlo en espacio y recursos seg&uacute;n la necesidades o requerimientos del usuario. Es una opci&oacute;n m&aacute;s flexible que un hosting pero menos que un servidor dedicado completo, ya que, un&nbsp;<strong>VPS</strong>&nbsp;no es m&aacute;s que un servidor completo dividido en varias particiones y que cada partici&oacute;n(VPS)&nbsp;se distingue porque cada una de ellas dispone de su propio sistema operativo y su propia IP, adem&aacute;s&nbsp;permite contratar un conjunto de recursos que pueden modificarse, ya sea aumentar o disminuir si el usuario&nbsp; lo requiere.</p>

<p><strong>COPIA DE SEGURIDAD</strong></p>

<p>Para preparar un proyecto Angular y subirlo a un&nbsp;<strong>VPS</strong>&nbsp;el primer paso a realizares una copia de seguridad del proyecto.&nbsp;</p>

<p>COMPROBAR RUTAS Y PUERTOS</p>

<p>Antes de generar la producci&oacute;n es necesario asegurarse de que tanto el&nbsp;<strong>backend</strong>&nbsp;como el&nbsp;<strong>frontend</strong>&nbsp;coinciden en&nbsp;<strong>puerto</strong>&nbsp;y sustituir las&nbsp;<strong>rutas absolutas</strong>&nbsp; por la&nbsp;<strong>IP o dominio</strong>&nbsp;del servidor. Es tambi&eacute;n recomendable revisar si el VPS incluye alg&uacute;n&nbsp;<strong>firewall</strong>&nbsp;y que &eacute;ste permita el acceso a dicho puerto. En caso contrario ser&aacute; necesario modificar el puerto a otro distinto que se encuentre en la lista del firewall o, si es posible, incluirlo en la lista desde el&nbsp;<strong>panel de control</strong>&nbsp;del VPS contratado.</p>

<p>ESTRUCTURA DEL PROYECTO</p>

<p>A continuaci&oacute;n se copia todo el contenido del directorio&nbsp;<strong>backend</strong>, se pega en el directorio&nbsp;<strong>ra&iacute;z</strong>&nbsp;y se elimina el directorio que conten&iacute;a el&nbsp;<strong>backend</strong>&nbsp;puesto que ya no ser&aacute; necesario.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666208212.png" style="height:331px; width:470px" /></p>

<p>El siguiente paso es renombrar el directorio que contiene el&nbsp;<strong>frontend</strong>&nbsp;con el nombre&nbsp;<strong>client</strong>.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666208266.png" style="height:329px; width:462px" /></p>

<p>Por tanto, el directorio&nbsp;copia del client&nbsp; se renombra con otro nombre, como por ejemplo, client_pruebas y desde la terminal se accede a este directorio&nbsp; y se ejecuta el proceso de construcci&oacute;n destinado a producci&oacute;n:</p>

<pre>
<code class="language-bash">ng build --prod
</code></pre>

<p>Durante la ejecuci&oacute;n del proceso es probable que la terminal muestre errores y detenga el proceso, esto es debido a que el test de Angular es m&aacute;s exigente en la fase de producci&oacute;n que en la fase de desarrollo.</p>

<pre>
<code class="language-bash">ERROR in src/app/admin/components/add/add.component.html(28,10): : Property \'is_edit\' does 
not exist on type \'AddComponent\'.</code></pre>

<p>Suelen ser errores comunes como la presencia de variables en la vista que no han sido declaradas en el componente, como tambi&eacute;n la ausencia de alg&uacute;n par&aacute;metro en alguno de los m&eacute;todos. Deber&aacute;n ser solucionados y volver a repetir el proceso&nbsp;build.</p>

<p>Este proceso genera un directorio con nombre&nbsp;dist&nbsp;que contiene a su vez otro directorio (con el nombre del proyecto) que es el que contiene todos los directorios y todos los archivos.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666208346.png" style="height:218px; width:576px" /></p>

<p>A continuaci&oacute;n se elimina todo el contenido de la carpeta client, &quot;la original&quot; y se copian en ella todos estos archivos generados&nbsp;ya solo queda subir el proyecto completo al servidor, ya sea con un gestor o con GitHub.</p>

<p>MODIFICACIONES DESDE EL SERVIDOR</p>

<p>Una vez subido es necesario realizar algunos cambios desde el servidor.</p>

<p>Si durante el desarrollo se ha hecho uso de&nbsp;nodemon&nbsp;es indispensable acceder al archivo&nbsp;package.json&nbsp;que se encuentra en la ra&iacute;z.</p>

<pre>
<code class="language-javascript">"scripts": {
    "start": "nodemon index.js",
    "test": "echo \"Error: no test specified\" &amp;&amp; exit 1"
  },</code></pre>

<p>Y sustituir&nbsp;nodemon&nbsp;por&nbsp;node.</p>

<pre>
<code class="language-javascript">"scripts": {
    "start": "node index.js",
    "test": "echo \"Error: no test specified\" &amp;&amp; exit 1"
  },</code></pre>

<p>Si la&nbsp;subida de archivos se realiza mediante&nbsp;GitHub&nbsp;&eacute;ste no incluye el directorio&nbsp;node_modules&nbsp;que incluye las dependencias, en consecuencia ser&aacute; necesario actualizar las dependencias desde el servidor.</p>

<pre>
<code class="language-bash">npm update
</code></pre>

<p>Con todos los pasos anteriores realizados debe ser posible cargar el proyecto desde el servidor</p>

<pre>
<code class="language-bash">npm start
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/yUojyn8RCxgkdWCuumbbN3Uqg37E1vbfVALiV3Fx.jpg'
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);
        //74
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Rutas en Node',
            'slug' => 'rutas-en-node',
            'body_main' => 'Rutas y redirección con NodeJS',
            'body_plus' => '<p>Rutas</p>

<p>&nbsp;</p>

<p>La recarga o la redirecci&oacute;n de rutas en un proyecto creado en&nbsp;&nbsp;<strong>Angular</strong>&nbsp;y&nbsp;<strong>NodeJS</strong>&nbsp;puede devolver errores en un entorno de producci&oacute;n. Para ello existen distintas formas que permiten acceder a las rutas del frontend y tambi&eacute;n tener acceso a la api del proyecto. Una de estas formas es mediante&nbsp;<strong>urls amigables</strong>.&nbsp; Para crear estas urls amigables es necesario modificar el m&oacute;dulo app del backend a&ntilde;adi&eacute;ndole una ruta est&aacute;tica y un m&eacute;todo get que contiene un callback, situ&aacute;ndose al final de las rutas, evitando interferir en las rutas que acceden a la api.</p>

<p>ruta est&aacute;tica:</p>

<pre>
<code class="language-javascript">app.use("/",express.static("client",{redirect : false}));
</code></pre>

<p>m&eacute;todo get:</p>

<pre>
<code class="language-javascript">app.get(\'*\',function(req,res,next){
    res.sendFile(path.resolve(\'client/index.html\'));
});</code></pre>

<p>La ruta est&aacute;tica carga el contenido de client y con la propiedad redirect evitamos ning&uacute;n tipo de redirecci&oacute;n. El m&eacute;todo get es necesario incluirlo al final descartando que no coincide con ninguna de las anteriores, as&iacute; pues el c&oacute;digo de abajo muestra un ejemplo de la secci&oacute;n de rutas de un proyecto:</p>

<pre>
<code class="language-javascript">//carga de rutas
var users = require("./routes/users");
var roles = require("./routes/roles");
//rutas
app.use("/",express.static("client",{redirect : false}));
app.use("/api",users);
app.use("/api",roles);
app.get(\'*\',function(req,res,next){
    res.sendFile(path.resolve(\'client/index.html\'));
});</code></pre>

<p>De esta forma se mantiene intacto el acceso a las rutas anteriores al m&eacute;todo get y mediante el par&aacute;metro asterisco se indica que cualquier otra ruta que no se encuentre incluida antes, pasar&aacute; por el callback y cargar&aacute; las rutas correspondientes permitiendo recargar la p&aacute;gina sin devolver ning&uacute;n tipo de error. Por tanto, en el ejemplo de arriba, cualquier ruta que no venga precedida de api seguida de un usuario o seguida de un rol pasar&aacute; por el callback del m&eacute;todo get resolviendo la ruta.</p>

<ul>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/klGZqzQXTMCNAkQ57HDSNBfN2VqJ1l2usnod6tWm.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 12
        ]);
        //75
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Acceso por SSH',
            'slug' => 'acceso-por-ssh',
            'body_main' => 'Acceder a un servidor mediante el protocolo SSH',
            'body_plus' => '<p><strong>SSH</strong>&nbsp;(Secure SHell) es una tecnolog&iacute;a que permite intercambiar datos encriptados de forma remota mediante un mecanismo de autenticaci&oacute;n. SSH dispone de distintos m&eacute;todos de cifrado y realiza todo el intercambio de datos de forma encriptada dando como resultado un cierto nivel de seguridad.&nbsp; SSH usa por defecto el puerto 22, pero es posible sustituirlo por cualquier otro, modificando los archivos de configuraci&oacute;n de SSH.&nbsp;</p>

<p>Acceder desde&nbsp;<strong>Linux</strong>&nbsp;a otro equipo mediante ssh es muy sencillo. El primer paso necesario es instalar el paquete&nbsp;<strong>ssh</strong>&nbsp;en caso de no estar ya instalado y a continuaci&oacute;n acceder al equipo remoto mediante un solo comando.</p>

<p><strong>INSTALAR SSH</strong></p>

<pre>
<code class="language-bash">apt install ssh
</code></pre>

<p>&nbsp;ACCEDER A EQUIPO REMOTO</p>

<pre>
<code class="language-bash">ssh [user]@[IP o dominio]
</code></pre>

<p>Ejemplo de acceso a equipo remoto de usuario root y dominio dominio.com indicando el puerto 25 (siendo 22 por defecto).</p>

<pre>
<code class="language-bash">ssh root@dominio.com -p 25
</code></pre>

<p>Al ejecutar el anterior comando la terminal solicitar&aacute;&nbsp; la contrase&ntilde;a que una vez introducida permitir&aacute; el acceso al equipo remoto.&nbsp;&Eacute;ste es el m&eacute;todo b&aacute;sico de acceder a un equipo remoto mediante el protocolo SSH, pero tal como explica muy bien&nbsp;Lorenzo en su blog&nbsp;<a href="https://www.atareao.es/" target="_blank">elatareao</a>&nbsp;existe otro m&eacute;todo de acceso que permite darle otra vuelta de tuerca, optimizando y facilitando aun m&aacute;s el acceso. En lugar de acceder mediante user y contrase&ntilde;a, es posible acceder mediante clave o llave p&uacute;blica. Para ello es necesario generar una clave en el equipo y copiar la clave al equipo remoto.</p>

<p>GENERAR CLAVE</p>

<pre>
<code class="language-bash">ssh-keygen -t rsa
</code></pre>

<p>La introducci&oacute;n del comando genera varias peticiones, como introducir un nombre al archivo, opci&oacute;n de a&ntilde;adir una contrase&ntilde;a,....</p>

<p>En caso de necesitar cambiar la contrase&ntilde;a de una clave ya creada existe tambi&eacute;n la posibilidad de modificarla.</p>

<p>MODIFICAR UNA CLAVE CREADA</p>

<pre>
<code class="language-bash">ssh-keygen -p -f directorio/[archivodeclave]
</code></pre>

<p>Una vez creada la clave es necesario crear el directorio ssh y&nbsp;copiar la clave&nbsp;en el usuario del equipo remoto.</p>

<p>CREAR DIRECTORIO EN EQUIPO REMOTO</p>

<pre>
<code class="language-bash">ssh [usuario]@[IP] mkdir -p .ssh
</code></pre>

<p>COPIAR CLAVE EN EQUIPO REMOTO</p>

<pre>
<code class="language-bash">ssh-copy-id -i ~/.ssh/[archivodeclave] [usuario]@[IP]
</code></pre>

<p>Ahora desde el equipo cliente es necesario configurar el archivo config del directorio .ssh que en caso de no existir ser&aacute; creado y a continuaci&oacute;n a&ntilde;adir las siguientes l&iacute;neas.</p>

<p>ESTRUCTURA DE UN ARCHIVO CONFIG</p>

<pre>
<code class="language-bash">Host [nombredehost]
    Hostname IP
    IdentityFile ~/.ssh/[archivodeclave]
    IndentitiesOnly yes
    User [usuario]
    Port [puerto]</code></pre>

<p>Ejemplo de un archivo config</p>

<pre>
<code class="language-bash">Host bahiaxip
    Hostname 85.208.20.18
    IndentityFile ~/.ssh/id_rsa
    User root
    Port 22</code></pre>

<p>Finalizada la configuraci&oacute;n del archivo config es necesario reiniciar el servicio ssh y ya es posible el acceso mediante clave p&uacute;blica.</p>

<pre>
<code class="language-bash">systemctl restart ssh
systemctl restart sshd</code></pre>

<p>ACCESO MEDIANTE CLAVE P&Uacute;BLICA Y CONFIGURACI&Oacute;N EN CLIENTE</p>

<pre>
<code class="language-bash">ssh bahiaxip
</code></pre>

<p>Quiz&aacute;s sea necesario asignar permisos al equipo remoto.</p>

<pre>
<code class="language-bash">chmod 750 /home/[usuario]
chmod 700 /home[usuario]/.ssh
chmod 600 /home/[usuario]/.ssh/authorized_keys</code></pre>

<p>El comando rsync permite realizar una copia de seguridad desde el equipo cliente.</p>

<pre>
<code class="language-bash">rsync --delete --progress --omit-dir-times --no-perms --stats -avz /home/[usuario]/[directorio_a_copiar]/ [usuario]@[IP]:/volume1/home/[usuario]/[directorio]
</code></pre>

<p>FIREWALL UFW</p>

<p>Para una mayor seguridad es recomendable la instalaci&oacute;n y configuraci&oacute;n de un firewall como ufw.&nbsp;</p>

<p>INSTALAR UFW</p>

<pre>
<code class="language-bash">apt install ufw
</code></pre>

<p>COMPROBACI&Oacute;N DE FIREWALL</p>

<pre>
<code class="language-bash">sudo ufw status
</code></pre>

<p>CONFIGURACI&Oacute;N</p>

<pre>
<code class="language-bash">sudo ufw default deny incoming  
sudo ufw default allow outgoing 
sudo ufw allow 25/tcp
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw allow 500000:51000/udp
</code></pre>

<p>ACTIVAR UFW</p>

<pre>
<code class="language-bash">ufw enable
</code></pre>

<p>DESACTIVAR UFW</p>

<pre>
<code class="language-bash">ufw disable
</code></pre>

<p>DESACTIVAR REGLA</p>

<pre>
<code class="language-bash">ufw delete allow 25/tcp
</code></pre>

<p>Todo mejor documentado y detallado en&nbsp;<a href="https://www.atareao.es/" target="_blank">//www.atareao.es</a></p>

<p>Enlaces relacionados:</p>

<p><a href="https://www.atareao.es/tutorial/servidor-virtual/primeros-pasos-con-tu-vps/">//www.atareao.es/tutorial/servidor-virtual/primeros-pasos-con-tu-vps/</a></p>

<p><a href="https://www.atareao.es/ubuntu/configuracion-de-ssh/" target="_blank">//www.atareao.es/ubuntu/configuracion-de-ssh/</a></p>

<p><a href="https://www.atareao.es/ubuntu/sincronizacion-sin-contrasena-en-linux/">//www.atareao.es/ubuntu/sincronizacion-sin-contrasena-en-linux/</a></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/wtFYwrtJWFLqMVlMjVCh9d16AzEdD6W1SUd8ruVQ.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //76
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Preparar servidor Angular',
            'slug' => 'preparar-servidor-angular',
            'body_main' => 'Preparar servidor para subir proyecto Angular',
            'body_plus' => '<p>Para habilitar un servidor destinado a un proyecto Angular es necesaria&nbsp; o recomendable la instalaci&oacute;n de una serie de paquetes &uacute;tiles.&nbsp;Uno de los paquetes indispensables es&nbsp;<strong>NodeJS</strong>&nbsp;o&nbsp;<strong>NVM</strong>&nbsp;(Node Version Manager). NVM no es m&aacute;s que un gestor de versiones de NodeJS, pero es m&aacute;s recomendable, ya que permite actualizar la versi&oacute;n de Node y en caso de alg&uacute;n tipo de error o incompatibilidad con la nueva versi&oacute;n permite volver a la versi&oacute;n anterior.</p>

<p>NodeJS se puede instalar con apt o desde su p&aacute;gina&nbsp;<a href="https://nodejs.org/es/" target="_blank">oficial</a></p>

<p><strong>INSTALAR NODEJS&nbsp;</strong></p>

<pre>
<code class="language-bash">apt install nodejs
</code></pre>

<p>INSTALAR NVM&nbsp;&nbsp;(se puede instalar con curl o con&nbsp;<a href="https://github.com/nvm-sh/nvm" target="_blank">wget</a>)</p>

<pre>
<code class="language-bash">curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.35.2/install.sh | bash
</code></pre>

<p>Tal como indica la documentaci&oacute;n, es posible que al hacer uso de nvm la primera vez devuelva comando no encontrado. En distribuciones Linux se puede solucionar cerrando y volviendo a abrir la terminal, en MAC es necesario crear un archivo en el directorio de usuario con nombre &quot;.bashrc&quot;.</p>

<p>CREACI&Oacute;N DEL ARCHIVO .BASHRC</p>

<pre>
<code class="language-bash">source ~/.bashrc
</code></pre>

<p>NVM dispone de distintos comandos para manejar las versiones, en las siguientes l&iacute;neas se muestran algunos de los m&aacute;s b&aacute;sicos.</p>

<p>LISTA DE VERSIONES DISPONIBLES</p>

<pre>
<code class="language-bash">nvm ls-remote
</code></pre>

<p>INSTALAR VERSI&Oacute;N</p>

<pre>
<code class="language-bash">nvm install [versión]
</code></pre>

<p>MOSTRAR VERSIONES INSTALADAS</p>

<pre>
<code class="language-bash">nvm ls
</code></pre>

<p>CAMBIAR DE UNA VERSI&Oacute;N A OTRA</p>

<pre>
<code class="language-bash">nvm use [versión]
</code></pre>

<p>INSTALAR NGINX</p>

<pre>
<code class="language-bash">apt install nginx
</code></pre>

<p>INSTALAR MONGODB</p>

<pre>
<code class="language-bash">apt install mongodb
</code></pre>

<p>INSTALAR GIT</p>

<p>Git es recomendable para la gesti&oacute;n del intercambio de archivos.</p>

<pre>
<code class="language-bash">apt install git
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ImagIbt00Wybs7efvpJj7hYHKHlx0K5BoE3TyryD.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 9
        ]);

        //77
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Módulos SQL',
            'slug' => 'modulos-sql',
            'body_main' => 'Listado de módulos de SQL',
            'body_plus' => '<p>SQL&nbsp;(Structured Query Language) es un lenguaje est&aacute;ndar de comunicaci&oacute;n que permite acceder y manejar bases de datos relacionales y que puede ser implementada en otros lenguajes de programaci&oacute;n. Fue dise&ntilde;ado por IBM a finales de la d&eacute;cada de los 70 ante la necesidad de generar consultas de datos.</p>

<p>M&Oacute;DULOS SQL</p>

<p>SQL se divide en m&oacute;dulos, a continuaci&oacute;n se muestran algunos de los m&oacute;dulos.</p>

<p>DQL</p>

<p>(Data Query Language) basado en la selecci&oacute;n de informaci&oacute;n.</p>

<ul>
    <li>SELECT</li>
</ul>

<p>DML</p>

<p>(Data Modification Language) basado en la modificaci&oacute;n de la informaci&oacute;n.</p>

<ul>
    <li>DELETE</li>
    <li>INSERT</li>
    <li>LOAD DATA</li>
    <li>OPTIMIZE</li>
    <li>REPLACE</li>
    <li>UPDATE</li>
</ul>

<p>DDL</p>

<p>(Data Definition Language) basado en la creaci&oacute;n, vaciado y selecci&oacute;n de bases de datos.</p>

<ul>
    <li>CREATE DATABASE</li>
    <li>DROP DATABASE</li>
    <li>USE</li>
</ul>

<p>Creaci&oacute;n, alteraci&oacute;n y vaciado de tablas e &iacute;ndices</p>

<ul>
    <li>ALTER [TABLE]</li>
    <li>CREATE [INDEX]</li>
    <li>CREATE [TABLE]</li>
    <li>DROP [INDEX]</li>
    <li>DROP [TABLE]</li>
</ul>

<p>Sentencia de administraci&oacute;n</p>

<ul>
    <li>FLUSH</li>
    <li>GRANT</li>
    <li>KILL</li>
    <li>REVOKE</li>
</ul>

<p>Obtenci&oacute;n de informaci&oacute;n sobre bases de datos y consultas</p>

<ul>
    <li>DESCRIBE</li>
    <li>EXPLAIN</li>
    <li>SHOW</li>
</ul>

<p>MIscel&aacute;neas de sentencias</p>

<ul>
    <li>CREATE [FUNCTION]</li>
    <li>DROP [FUNCTION]</li>
    <li>LOCK [TABLES]</li>
    <li>SET</li>
    <li>UNLOCK [TABLES]</li>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/UsfYxjQiVvPPLI493pU0urfvX7jhYUe7M14qfqoA.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 19
        ]);
        //78
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'HTTP',
            'slug' => 'http',
            'body_main' => 'Protocolo HTTP',
            'body_plus' => '<p>El protocolo&nbsp;HTTP&nbsp;es un conjunto de normas o reglas que permite comunicarse e intercambiar datos entre un servidor web y un cliente. Este protocolo se basa en el esquema petici&oacute;n-respuesta, el cliente (user agent) env&iacute;a una petici&oacute;n al servidor y el servidor web (webservice) recibe la solicitud y env&iacute;a una respuesta. Existen distintos m&eacute;todos de petici&oacute;n, a continuaci&oacute;n se explican los m&aacute;s usados.</p>

<p>M&Eacute;TODOS O VERBOS HTTP</p>

<ul>
    <li>GET</li>
</ul>

<p>Una petici&oacute;n realizada con el m&eacute;todo&nbsp;<strong>GET</strong>&nbsp;indica que el servidor debe devolver informaci&oacute;n al cliente y los datos se env&iacute;an mediante la url.</p>

<ul>
    <li>POST</li>
</ul>

<p>Una petici&oacute;n realizada con m&eacute;todo&nbsp;<strong>POST</strong>&nbsp;indica que el servidor debe actualizar o a&ntilde;adir nuevos datos con la informaci&oacute;n recibida. A diferencia del m&eacute;todo GET el m&eacute;todo POST permite enviar un cuerpo o contenido al servidor.</p>

<ul>
    <li>PUT</li>
</ul>

<p>Una petici&oacute;n realizada con m&eacute;todo&nbsp;<strong>PUT</strong>&nbsp;indica que la informaci&oacute;n que se env&iacute;a ser&aacute; procesada en el servidor para actualizar datos.</p>

<ul>
    <li>DELETE</li>
</ul>

<p>Una petici&oacute;n realizada con m&eacute;todo&nbsp;<strong>DELETE</strong>&nbsp;indica que la informaci&oacute;n env&iacute;ada ser&aacute; procesada en el servidor para eliminar datos.</p>

<ul>
    <li>OPTIONS</li>
</ul>

<p>Una petici&oacute;n realizada con m&eacute;todo&nbsp;<strong>OPTIONS</strong>&nbsp;indica que la petici&oacute;n se realiza desde un dominio a otro dominio.</p>

<p>C&Oacute;DIGOS DE RESPUESTA&nbsp;</p>

<p>Un servidor web que recibe una solicitud siempre va a retornar una respuesta que adem&aacute;s de poder contener otros datos va a contener&nbsp;la versi&oacute;n del protocolo y&nbsp;un c&oacute;digo de respuesta. Este c&oacute;digo de respuesta&nbsp;indica el estado de la petici&oacute;n que se acaba de enviar y lo hace en forma cadena que contiene un valor de tres d&iacute;gitos, los cuales seg&uacute;n el d&iacute;gito devuelto indicar&aacute; el tipo de estado. Estos c&oacute;digos se clasifican en cinco grupos donde el primer d&iacute;gito representa el grupo al que pertenece.&nbsp;Los d&iacute;gitos restantes definen de forma m&aacute;s espec&iacute;fica el tipo de respuesta que se puede obtener revisando la lista en la documentaci&oacute;n de&nbsp;<a href="https://es.wikipedia.org/wiki/Anexo:C%C3%B3digos_de_estado_HTTP" target="_blank">wikipedia</a>.</p>

<ul>
    <li>1XX - Respuestas informativas</li>
    <li>2XX - Peticiones correctas</li>
    <li>3XX - Redirecciones&nbsp;</li>
    <li>4XX - Errores del cliente</li>
    <li>5XX - Errores de servidor</li>
</ul>

<p>&nbsp;CABECERAS</p>

<p>Las&nbsp;<strong>cabeceras HTTP</strong>&nbsp;permiten a&ntilde;adir informaci&oacute;n adicional en el intercambio de datos entre el servidor y el cliente. Estas cabeceras pueden contener informaci&oacute;n&nbsp;descriptiva&nbsp;como puede ser el t&iacute;tulo de la p&aacute;gina, el idioma, la ubicaci&oacute;n como tambi&eacute;n pueden contener informaci&oacute;n de cookies con datos de la sesi&oacute;n&nbsp; o datos adicionales que indiquen el tipo de documento a recibir (XML, HTML, texto plano, etc...).</p>
',          
            'user_id' => 1,
            'status' => 'DRAFT',
            'file' => 'NULL'

        ]);
        
        //79
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Ajax XMLHttpRequest',
            'slug' => 'ajax-xmlhttprequest',
            'body_main' => 'El objeto XMLHttpRequest de Javascript',
            'body_plus' => '<p>Ajax es una tecnolog&iacute;a basada en el objeto&nbsp;XMLHttpRequest.&nbsp;El objeto&nbsp;<strong>XMLHttpRequest</strong>&nbsp;es una interfaz que permite realizar peticiones HTTP al servidor, pero que, a diferencia de la petici&oacute;n cl&aacute;sica permite recargar una parte de la p&aacute;gina sin recargar la p&aacute;gina completa.</p>

<p>El c&oacute;digo b&aacute;sico para crear una nueva instancia del objeto XMLHttpRequest se define en la siguiente&nbsp;l&iacute;nea.</p>

<pre>
<code class="language-javascript">var req = new XMLHttpRequest();
</code></pre>

<p>Internet Explorer fue el primer navegador en introducir esta interfaz, pero en lugar del objeto XMLHttpRequest introdujo el objeto ActiveX. Por tanto en versiones anteriores a la versi&oacute;n 7 de este navegador es necesaria una instancia un poco m&aacute;s compleja.</p>

<pre>
<code class="language-javascript">function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();</code></pre>

<p>AHAH Y AJAX</p>

<p>El objeto XMLHttpRequest&nbsp;permite cargar archivos que se encuentran en el servidor sin recargar la p&aacute;gina. Tal como su nombre indica permite cargar archivos XML, pero tambi&eacute;n archivos HTML, XHTML, texto plano, etc.., En los casos en que la carga del archivo es&nbsp;HTML&nbsp;se denomina&nbsp;AHAH&nbsp;aunque Ajax sigue siendo la forma m&aacute;s extendida de referirse a esta tecnolog&iacute;a.</p>

<p>A continuaci&oacute;n se muestra un ejemplo b&aacute;sico de una petici&oacute;n&nbsp;Ajax&nbsp;o&nbsp;Ahah&nbsp;realizando una petici&oacute;n recargando solo un elemento de la p&aacute;gina.</p>

<p><strong>index.html</strong></p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
  &lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
    &lt;title&gt;Ajax&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div id="resultado"&gt;&lt;/div&gt;
    &lt;button id="boton"&gt;Enviar&lt;/button&gt;
    &lt;script src="ajax.js"&gt;&lt;/script&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>load.html</strong></p>

<pre>
<code class="language-html">&lt;p&gt;Este es el resultado de Ajax&lt;/p&gt;
</code></pre>

<p><strong>ajax.js</strong></p>

<pre>
<code class="language-javascript">let boton = document.getElementById("boton");
let div = document.getElementById("resultado");
boton.addEventListener("click", evt =&gt; {
    let xhr = new XMLHttpRequest();
    xhr.open("GET","./load.html",true);
    xhr.addEventListener("load", e =&gt; {
        console.log(e.target);
        resultado.innerHTML=e.target.responseText;    
    });
    xhr.send();
});</code></pre>

<p><strong>ESTADOS</strong></p>

<p>El ciclo de vida del objeto&nbsp;<strong>XMLHttpRequest&nbsp;</strong>se puede dividir en cinco estados mediante la propiedad readyState.</p>

<pre>
<code class="language-bash">0       UNINITIALIZED          aun no se llamó al método open
1       LOADING                aun no se llamó al método send
2       LOADED                 send() fue inicializado
3       INTERACTIVE            obteniendo respuesta
4       COMPLETED              respuesta completa</code></pre>

<p>Cada vez que cambia de estado esta propiedad, se activa el evento readystatechange que permite detectar el momento de ese cambio. El c&oacute;digo de abajo muestra un ejemplo similar al archivo ajax.js anterior obteniendo el mismo resultado pero obteniendo el cambio de estado mediante la propiedad readyState.</p>

<p><strong>ajax.js</strong></p>

<pre>
<code class="language-javascript">let boton = document.getElementById("boton");
let div = document.getElementById("resultado");
boton.addEventListener("click", evt =&gt; {
    let xhr = new XMLHttpRequest();
    xhr.open("GET","./load.html",true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                console.log(e.target);
                resultado.innerHTML=e.target.responseText;
            }
        }
    }
    xhr.send();
});</code></pre>

<p><strong>JSON</strong></p>

<p>Los objetos de tipo JSON son normalmente elegidos en el intercambio de datos entre el servidor y el cliente por su eficiencia. Estos objetos viajan desde el servidor al cliente en formato de cadena y desde el cliente se convierte a JSON, siempre y cuando, el contenido de la cadena mantenga la estructura de un objeto JSON. A continuaci&oacute;n se describe un objeto JSON para observar su estructura.</p>

<pre>
<code class="language-javascript">{ "Nombre" : "Javier", "edad" : "46", "Ciudad" : "Murcia"}
</code></pre>

<p>Una array de objetos JSON</p>

<pre>
<code class="language-javascript">[ {"Nombre" : "Javier", "edad" : "46", "Ciudad" : "Murcia"}, {"Nombre" : "Jose", "edad" : "50", "Ciudad" : "Soria"},
{"Nombre" : "Laura", "edad" : "22", "Ciudad" : "Lugo"} ]</code></pre>

<p>Por tanto una cadena que contiene un array de objetos JSON dispone de la siguiente estructura</p>

<pre>
<code class="language-javascript">\'[ {"Nombre" : "Javier", "edad" : "46", "Ciudad" : "Murcia"}, {"Nombre" : "Jose", "edad" : "50", "Ciudad" : "Soria"},
{"Nombre" : "Laura", "edad" : "22", "Ciudad" : "Lugo"} ]\'</code></pre>

<p>Para que Javascript pueda convertir esa cadena a un objeto JSON nativo es necesario el uso del m&eacute;todo&nbsp;<strong>parse</strong>. Manteniendo el ejemplo anterior se convierten los datos devueltos por el servidor a formato JSON. Los datos devueltos por console.log muestran los datos en formato cadena y los datos ya convertidos a JSON.</p>

<pre>
<code class="language-javascript">let boton = document.getElementById("boton");
let div = document.getElementById("resultado");
boton.addEventListener("click", evt =&gt; {
    let xhr = new XMLHttpRequest();
    xhr.open("GET","./load.html",true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4){
            if(xhr.status == 200){
                console.log(e.target.responseText);
                const data = JSON.parse(e.target.responseText);
                console.log(data);
                div.innerHTML=e.target.responseText;
            }
        }
    }
    xhr.send();
});</code></pre>

<p>Para entender mejor el proceso y manteniendo parte del&nbsp; ejemplo anterior,el c&oacute;digo siguiente permite mostrar el resultado en pantalla de los datos obtenidos en elementos html y a&ntilde;adiendo la funcionalidad de un loader. Para que este ejemplo funcione es necesario que el archivo load.html retorne un array de objetos de tipo JSON v&aacute;lido.</p>

<p>&nbsp;&nbsp;<strong>index.html</strong></p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
  &lt;head&gt;
    &lt;meta charset="utf-8"&gt;
    &lt;meta http-equiv="X-UA-Compatible" content="IE=edge"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
    &lt;title&gt;Ajax&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;div id="resultado"&gt;&lt;/div&gt;
    &lt;div id="load_icon"&gt;&lt;/div&gt;
    &lt;button id="boton"&gt;Enviar&lt;/button&gt;
    &lt;script src="ajax.js"&gt;&lt;/script&gt;
  &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>ajax.js</strong></p>

<pre>
<code class="language-javascript">let boton = document.getElementById("boton");
let div = document.getElementById("resultado");
let loadIcon = document.getElementById("load_icon");
//ocultamos loader
loadIcon.style.display = "none";
//evento clic
boton.addEventListener("click", evt =&gt; {
    //mostramos loader
    loadIcon.style.display = "block";
    let xhr = new XMLHttpRequest();
    xhr.open("GET","./load.html",true);
    xhr.onreadystatechange = function(e){
        if(xhr.readyState == 4){
            if(xhr.status == 200){                
                const data = JSON.parse(e.target.responseText);
                //renderizamos datos convertidos a JSON
                render(data);
                //ocultamos loader
                loadIcon.style.display = "none";        
            }
        }
    }
    xhr.send();
});
let render = data =&gt; {
    div.innerHTML = "";
    //añadimos fragment para evitar renderizar cada vez el elemento div
    let fragment = document.createDocumentFragment();
    data.forEach( user =&gt; {
        let el = document.createElement("div");
        let name = document.createElement("p");
        let age = document.createElement("span");
        let city = document.createElement("span");
        //añadimos los datos de cada objeto a los elementos creados
        name.textContent = user.name;
        age.textContent = user.age;
        city.textContent = user.city;
        
        el.append(name);
        el.append(age);
        el.append(city);
        fragment.append(el);
    });
    //finalmente añadimos todo el array completo al elemento div
    div.append(fragment);        
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/gJUvsFEYINS50Ax4HnzDE2zc836doEJsvVET2FRX.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);

        //80
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'WebSocket',
            'slug' => 'websocket',
            'body_main' => 'Protocolo WebSocket',
            'body_plus' => '<p>WebSocket es un protocolo de comunicaciones&nbsp;(protocolo ws)&nbsp;dentro del protocolo HTTP que permite realizar conexiones&nbsp;cliente-servidor donde la comunicaci&oacute;n se realiza mediante un canal bidireccional&nbsp; y full-duplex. Es decir,&nbsp;WebSocket permite enviar y recibir datos a la vez,&nbsp; a diferencia de&nbsp;Ajax, que solo permite enviar o recibir datos (half-duplex). Esto es realmente &uacute;til en comunicaciones en tiempo real como un videojuego online, una llamada telef&oacute;nica o un chat donde es necesario mantener la conexi&oacute;n abierta durante cierto tiempo. Para crear una conexi&oacute;n&nbsp;ws&nbsp;es necesario crear una instancia WebSocket, la cual, inicia realizando una petici&oacute;n http y una vez revisados los datos permite iniciar la conexi&oacute;n websocket. mateni&eacute;ndose abierta y preparada para enviar y recibir datos.&nbsp;</p>

<p><strong>CREAR CONEXI&Oacute;N WEBSOCKET</strong></p>

<pre>
<code class="language-javascript">var ws = new WebSocket("ws://example.com/socketserver");
</code></pre>

<p><strong>EVENTOS</strong></p>

<p>Existen distintos tipos de evento que pueden ser registrados durante la conexi&oacute;n.</p>

<p><strong>onopen</strong></p>

<p>Permite asegurarse de que existe&nbsp;al menos&nbsp;una conexi&oacute;n&nbsp; WebSocket abierta.</p>

<p><strong>onmessage</strong></p>

<p>Permite realizar una acci&oacute;n cuando un mensaje es recibido</p>

<p><strong>onerror</strong></p>

<p>Permite manejar el error si se produce.</p>

<p><strong>M&Eacute;TODOS</strong></p>

<p><strong>send</strong></p>

<p>Permite enviar informaci&oacute;n.</p>

<p><strong>close</strong></p>

<p>Permite finalizar y cerrar la conexi&oacute;n</p>

<p><strong>WebSocket</strong>&nbsp;puede manejar archivos&nbsp; de texto plano, archivos json, archivos de tipo Blob y archivos binarios. Cabe destacar que este tipo de conexiones dispone de una versi&oacute;n segura (WebSobket Security), as&iacute;, de la misma forma que&nbsp; http, dispone de su versi&oacute;n segura https, ws dispone de la versi&oacute;n wss. A continuaci&oacute;n un ejemplo b&aacute;sico de un chat mediante el protocolo WebSocket manejando un objeto json, basado en&nbsp;<a href="https://www.websocket.org/echo.html" target="_blank">websocket.org</a>.</p>

<p><strong>index.html</strong></p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Websocket&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;        
        &lt;button id="btnConnect"&gt;Conectar&lt;/button&gt;
        &lt;button id="btnDisconnect"&gt;Desconectar&lt;/button&gt;
        &lt;label for="txtName"&gt;Nombre&lt;/label&gt;
        &lt;input type="text" id="txtName"&gt;
        &lt;label for="txtMsg"&gt;Mensaje&lt;/label&gt;
        &lt;input type="text" id="txtMsg"&gt;
        &lt;button id="btnSend"&gt;Enviar&lt;/button&gt;
        &lt;label for="chat"&gt;Chat&lt;/label&gt;
        &lt;div id="chat"&gt;&lt;/div&gt;
        &lt;script src="script.js"&gt;&lt;/script&gt;
         
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>ws.js</strong></p>

<pre>
<code class="language-javascript">let ws = null;
const setText = data =&gt; {
    const msg = `&lt;div&gt;${data}div&gt;`;
    chat.insertAdjacentHTML("beforeend",msg);
}
const setMessage = data =&gt; {
    const msg = `&lt;div&gt;&lt;span&gt;${data.name}&lt;/span&gt;:${data.message}span&gt;div&gt;`;
    chat.insertAdjacentHTML("beforeend",msg);
}
btnConnect.addEventListener("click", evt =&gt; {    
    ws = new WebSocket("ws://demos.kaazing.com/echo");
    ws.onopen = () =&gt; setText("Conectado");
    ws.onclose = () =&gt; setText("Desconectado");
    ws.onerror = () =&gt; setText(e);
    ws.onmessage = e =&gt; {
        const msg = JSON.parse(e.data);     
        setMessage(msg);
    }
})
btnDisconnect.addEventListener("click", evt =&gt; {
    ws.close();
})
btnSend.addEventListener("click", evt =&gt; {
    const msg = {
        name: txtName.value,
        message: txtMsg.value
    }
    ws.send(JSON.stringify(msg));
})</code></pre>

<p>fuente:&nbsp;<a href="https://ed.team/cursos/ajax-ws" target="_blank">Alexys Lozada de EDteam</a></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/rvLRkZqSnzYsquv7bz9DeKSf7Hdr9KSjEefAZx9F.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //81
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Dependencias útiles de NodeJS',
            'slug' => 'dependencias-utiles-de-nodejs',
            'body_main' => 'Librerías más usadas en el entorno NodeJS',
            'body_plus' => '<p>Nodemon permite recargar la p&aacute;gina cada vez que detecta un cambio en el editor sin necesidad de inicializar continuamente el proyecto. Esta herramienta es realmente &uacute;til y eficaz en la etapa de desarrollo, por esta raz&oacute;n, es recomendable instalarla indicando el par&aacute;metro&nbsp;<strong>-dev&nbsp;</strong>para que NPM la instale en la secci&oacute;n de desarrollo.</p>

<p><strong>INSTALAR NODEMON</strong></p>

<pre>
<code class="language-bash">npm install nodemon -dev
</code></pre>

<p>Una vez instalada se puede inicializar el proyecto con el comando&nbsp;<strong>nodemon</strong>&nbsp;desde un archivo espec&iacute;fico o a&ntilde;adirla como tarea en la secci&oacute;n&nbsp;<strong>scripts</strong>&nbsp;del archivo&nbsp;<strong>package.json.&nbsp;&nbsp;</strong>Para verlo mejor a continuaci&oacute;n se muestra un ejemplo&nbsp;de cada caso.</p>

<p><strong>Ejemplo de inicializaci&oacute;n con nodemon&nbsp;</strong></p>

<pre>
<code class="language-bash">nodemon app.js
</code></pre>

<p><strong>Ejemplo de inicializaci&oacute;n como tarea</strong></p>

<ul>
    <li>Se a&ntilde;ade la tarea al&nbsp;scripts&nbsp;con un nombre, en el ejemplo,&nbsp;start</li>
</ul>

<pre>
<code class="language-javascript">{
  "name": "proyecto_prueba",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" &amp;&amp; exit 1",
    "start": "nodemon app.js"
  },
  "author": "",
  "license": "MIT"
}</code></pre>

<ul>
    <li>Desde terminal se llama a la tarea</li>
</ul>

<pre>
<code class="language-bash">npm start
</code></pre>

<p>Nodemon, por defecto, solamente detecta los cambios de los archivos&nbsp;js&nbsp;y&nbsp;json&nbsp;pero&nbsp;permite detectar cambios en otra clase de archivos, mediante la configuraci&oacute;n del archivo package.json,&nbsp; indicando la extensi&oacute;n a detectar. Manteniendo el ejemplo anterior, se modifica el script de nodemon a&ntilde;adiendo la extensi&oacute;n&nbsp;<strong>hbs</strong>&nbsp;que hace referencia al motor de plantillas&nbsp;<strong>handlebars</strong>.</p>

<pre>
<code class="language-javascript">{
  "name": "proyecto_prueba",
  "version": "1.0.0",
  "description": "",
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" &amp;&amp; exit 1",
    "start": "nodemon -e hbs app.js"
  },
  "author": "",
  "license": "MIT"
}</code></pre>

<p><strong>HTTP</strong></p>

<p>Dispone de los m&eacute;todos necesarios para realizar la conexi&oacute;n a internet y viene ya predefinido en la instalaci&oacute;n de NodeJS.&nbsp; A continuaci&oacute;n un ejemplo de&nbsp;la creaci&oacute;n de un servidor muy b&aacute;sico pero suficiente para&nbsp;&nbsp;mostrar la sencillez con la que se puede crear un servidor utilizando esta librer&iacute;a.</p>

<pre>
<code class="language-javascript">var http = require("http");
var servidor = http.createServer(function(){
    console.log("Existe petición");
})
servidor.listen(3389);
console.log("Iniciando servidor");</code></pre>

<p>Este c&oacute;digo permite&nbsp;que al iniciar el servidor devuelva la cadena &quot;<strong>Iniciando servidor</strong>&quot; y que al realizar una petici&oacute;n desde un navegador al puerto indicado (3389) devuelva la cadena &quot;<strong>Existe petici&oacute;n</strong>&quot;. En los dos casos el resultado lo devuelve por terminal. Para poder visualizar un resultado por el navegador es necesario ampliar el anterior c&oacute;digo a&ntilde;adiendo los m&eacute;todos&nbsp;<strong>writeHead</strong>&nbsp;para el encabezado y&nbsp;<strong>write</strong>&nbsp;o&nbsp;<strong>end</strong>&nbsp;para mostrar el resultado en pantalla como muestra en el c&oacute;digo que sigue a continuaci&oacute;n.</p>

<pre>
<code class="language-javascript">var http = require("http");
var servidor = http.createServer(function(req,res){
    res.writeHead(200,{ "Content-Type":"text/html"});
    res.write("Resultado" + req.url );
    console.log("Existe petición");
})
servidor.listen(3389);
console.log("Iniciando servidor");</code></pre>

<p style="text-align:center"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff"><span style="color:#0000ff"><strong>HTTP-ERRORS</strong></span></span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">Esta librer&iacute;a permite configurar los posibles errores de peticiones http autom&aacute;ticamente.</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">COOKIE-PARSER</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">Permite analizar y cachear todas las cookies requeridas</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">EXPRESS-SESSION</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">Manejo de sesiones</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">MORGAN</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">Permite monitorear las peticiones de la aplicaci&oacute;n</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">PLANTILLAS HANDLEBARS</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">NODE-SASS-MIDDLEWARE</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">SERVE-FAVICON</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">BABELIFY-EXPRESS</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">Une Babel con Browserify para poder importar m&oacute;dulos en la parte del front.</span></span></span></span></p>

<p style="text-align:center"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff"><strong>EXPRESS-GENERATOR</strong></span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">Esta librer&iacute;a adem&aacute;s de instalar&nbsp;<strong>Express</strong>&nbsp;permite crear el andamiaje necesario (scaffolding) de un proyecto en NodeJS solamente con un comando. Para crear un proyecto con esta librer&iacute;a partiendo desde cero, es necesario instalarla de forma global, para as&iacute; disponer de ella desde cualquier carpeta del sistema.</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff"><strong>Instalaci&oacute;n de Express-Generator de forma global</strong></span></span></span></span></p>

<pre>
<code class="language-bash">npm install express-generator -g
</code></pre>

<ul>
    <li><strong>Error instalando con la opci&oacute;n global (-g)</strong></li>
</ul>

<p>En caso de error de permisos, al realizar una instalaci&oacute;n de forma global, es necesario crear un nuevo directorio, por ejemplo,&nbsp;<strong>.npm-global</strong>&nbsp; y registrarlo en la configuraci&oacute;n de NPM&nbsp;tal como muestran las siguientes l&iacute;neas de c&oacute;digo.&nbsp;</p>

<pre>
<code class="language-bash">mkdir ~/.npm-global
npm config SET PREFIX \'~./npm-global\'
</code></pre>

<p>Esta configuraci&oacute;n debe solucionar el error y permitir instalar la librer&iacute;a.</p>

<p><strong>Registrar Express-Generator</strong></p>

<p>El siguiente paso es a&ntilde;adir el subdirectorio bin del directorio creado y a&ntilde;adirlo a la variable de entorno $PATH para poder disponer de la librer&iacute;a desde cualquier lugar del sistema.</p>

<ul>
    <li><strong>Registrar temporalmente</strong></li>
</ul>

<p>Introduciendo la siguiente l&iacute;nea de c&oacute;digo es posible disponer de Express-generator desde cualquier directorio del sistema, sin embargo, en cada reinicio o al cerrar y abrir la terminal es necesario volver a realizar la misma operaci&oacute;n.</p>

<pre>
<code class="language-bash">export PATH=~/.npm-global/bin:$PATH
</code></pre>

<ul>
    <li><strong>Registrar permanentemente</strong></li>
</ul>

<p>Para disponer de Express-Generator de forma permanente es necesario editar el documento&nbsp;<strong>~/.profile</strong>&nbsp;(o crearlo si no existe) con alg&uacute;n editor de texto e incluirlo al final del archivo.</p>

<p>Se edita el archivo .<strong>profile</strong></p>

<pre>
<code class="language-bash">sudo gedit ~/.profile
</code></pre>

<p>Se a&ntilde;ade el directorio a la variable de entorno $PATH</p>

<pre>
<code class="language-bash">export PATH=~/.npm-global/bin:$PATH
</code></pre>

<p>CREAR PROYECTO EXPRESS-GENERATOR</p>

<p>Para crear un proyecto con&nbsp;Express-Generator&nbsp;tan solo es necesario introducir la palabra&nbsp;<strong>express</strong>&nbsp;seguido de las opciones a incluir y por &uacute;ltimo el nombre del proyecto.</p>

<pre>
<code class="language-bash">express miProyecto
</code></pre>

<p>MOSTRAR OPCIONES</p>

<p>Las opciones permiten configurar el proyecto para un sistema de plantillas, de estilos, git...</p>

<pre>
<code class="language-bash">express -h
</code></pre>

<p>El paquete de plantillas jade que Express-Generator incorpora por defecto est&aacute; obsoleto, es recomendable a&ntilde;adir el sistema&nbsp;<strong>pug</strong>&nbsp;o alg&uacute;n otro sistema de plantillas.</p>

<pre>
<code class="language-bash">express --view=pug miProyecto
</code></pre>

<p>Al finalizar la creaci&oacute;n del proyecto, la terminal muestra las indicaciones necesarias para iniciar el servidor.</p>

<pre>
<code class="language-bash">change directory:
     $ cd miProyecto
   install dependencies:
     $ npm install
   run the app:
     $ DEBUG=miproyecto:* npm start</code></pre>

<p>Al iniciar el servidor, la terminal vuelve a mostrar informaci&oacute;n especificando el puerto, por el cual, el servidor est&aacute; escuchando. Ya solamente es necesario acceder con el puerto indicado desde el navegador y comprobar que todo funciona correctamente.</p>

<p>FS</p>

<p>FileSystem&nbsp;permite acceder al sistema de archivos y realizar acciones como copiar, mover, eliminar... No es necesario instalar FS, ya que, al igual que http, ya viene incluido en NodeJS. A continuaci&oacute;n se muestran distintos ejemplos con algunos de los m&eacute;todos m&aacute;s utilizados de esta librer&iacute;a.</p>

<p>Leer archivos</p>

<pre>
<code class="language-javascript">var fs = require("fs");
var read = fs.readFileSync("./archivo.txt", "utf8");
console.log(read);</code></pre>

<p>Mediante el m&eacute;todo&nbsp;<strong>readFileSync</strong>&nbsp;la lectura de archivos se realiza mediante un proceso llamado&nbsp;<strong>blocking</strong>, esto quiere decir que puede detener o retrasar la ejecuci&oacute;n del resto del c&oacute;digo mientras el archivo es totalmente le&iacute;do por el sistema. Para que esto no ocurra y el proceso de lectura se realice de forma as&iacute;ncrona es necesario realizar la lectura mediante el m&eacute;todo&nbsp;<strong>readFile</strong>, este proceso es denominado&nbsp;<strong>non-blocking</strong>. A continuaci&oacute;n un ejemplo de este m&eacute;todo a&ntilde;adiendo adem&aacute;s un condicional que permite mostrar un mensaje en caso de error.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
var read = fs.readFile("./archivo.txt", "utf8", function(error,data){
    if(error){
        console.log("error al leer el archivo");
        throw error;
    }else{
    console.log(data);
    }
});</code></pre>

<p><strong>Leer directorios</strong></p>

<p>El m&eacute;todo&nbsp;<strong>readdir</strong>&nbsp;permite mostrar el contenido de una carpeta con el c&oacute;digo siguiente.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
fs.readdir("./directorio", (error, data) =&gt; {
    console.log(data);
})</code></pre>

<p>Este m&eacute;todo permite a&ntilde;adir par&aacute;metros opcionales y ampliar la informaci&oacute;n del contenido de la carpeta. A continuaci&oacute;n el mismo ejemplo anterior pero se establece la propiedad&nbsp;<strong>withFileTypes</strong>, esta opci&oacute;n devuelve informaci&oacute;n que permite distinguir mediante&nbsp; valores num&eacute;ricos cual es archivo y cual directorio. Si devuelve 1 es un archivo, en cambio si devuelve 2 es un directorio.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
fs.readdir("./directorio",{withFileTypes:true}, (error, data) =&gt; {
    console.log(data);
})</code></pre>

<p><strong>Escribir archivos</strong></p>

<p>El m&eacute;todo&nbsp;<strong>writeFile</strong>&nbsp;permite escribir contenido en un archivo y en caso de no existir el archivo autom&aacute;ticamente lo crea en la ruta especificada.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
fs.writeFile("./archivos/texto.txt", "nuevo archivo", (error) =&gt; {
    if(error){
        console.log("error de escritura");
    }else{
        console.log("OK");
    }
})</code></pre>

<p>Si en lugar de escribir datos a un archivo se requiere a&ntilde;adir datos a un archivo ya existente que ya contiene datos,&nbsp;<strong>fs</strong>&nbsp;dispone del m&eacute;todo&nbsp;<strong>appendFile</strong>&nbsp;que agrega el nuevo contenido a continuaci&oacute;n del anterior.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
fs.appendFile("./archivos/texto.txt", "  agregando datos al archivo", (error) =&gt; {
    if(error){
        console.log("error de escritura");
    }else{
        console.log("OK");
    }
})
</code></pre>

<p><strong>Copiar archivos</strong></p>

<p>La copia de archivos se realiza mediante el m&eacute;todo&nbsp;<strong>copyFile</strong>&nbsp;y de igual forma que los m&eacute;todos anteriores se pasan los distintos par&aacute;metros. El primer par&aacute;metro indica la ruta del archivo original, el segundo par&aacute;metro indica la ruta y el nombre del nuevo archivo y el tercer par&aacute;metro indica la posibilidad de a&ntilde;adir una funci&oacute;n callback que permite continuar realizando acciones una vez haya finalizado la copia del archivo.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
fs.copyFile("./img/imagen.jpg", "./img/imagenNueva.jpg", (error) =&gt; {
    if(error){
        console.log("error en la copia de archivos");
        throw error;
    }else{
    console.log("OK");
    }
});</code></pre>

<p><strong>Eliminar archivos</strong></p>

<p>Nodejs dispone de un m&eacute;todo para eliminar archivos con el mismo nombre que PHP, el m&eacute;todo&nbsp;<strong>unlink</strong>&nbsp;incluye dos par&aacute;metros, el primero, que es la ruta del archivo y el segundo, que es un callback que permite comprobar si existe alg&uacute;n error y continuar con el siguiente proceso.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
fs.unlink("./img/imagen.jpg", (error) =&gt; {
    if(error){
        console.log("error eliminando el archivo");
        throw error;
    }else{
    console.log("OK");
    }
});</code></pre>

<p>Es importante destacar que una vez eliminado un archivo con este m&eacute;todo no existe posibilidad de recuperar el archivo.&nbsp;</p>

<p><strong>Mover archivos</strong></p>

<p>La librer&iacute;a&nbsp;<strong>fs</strong>&nbsp;no dispone de un m&eacute;todo personalizado para poder mover archivos, pero si permite encadenar m&eacute;todos de forma s&iacute;ncrona, por tanto, una f&oacute;rmula posible para mover archivos consiste en copiar un archivo nuevo con el mismo nombre del original y eliminar el archivo original. El c&oacute;digo siguiente contiene un ejemplo moviendo una imagen.</p>

<pre>
<code class="language-javascript">var fs = require("fs");
function copiar(ruta, rutaNueva, nombre){
    fs.copyFile(ruta+ "/"+nombre,rutaNueva+"/"+nombre,(error) =&gt; {
        if(error){
            console.log(error);
        }else{
            eliminar(ruta,nombre);
        }
    })
}
function eliminar(ruta,nombre){
    fs.unlink(ruta+"/"+nombre,(error)=&gt; {
        if(error){
            console.log("error al eliminar");
        }else{
            console.log("OK");
        }
    })
}
copiar("./img","./","imagen.jpg");
</code></pre>

<p>De esta forma el m&eacute;todo copiar copia el archivo a la ruta indicada y si este proceso de copia se realiza con &eacute;xito se encadena con el m&eacute;todo eliminar que borra el archivo original dando como resultado final el movimiento de un archivo.</p>

<p><strong>ARCHIVOS JSON</strong></p>

<p>&nbsp;</p>

<p>Los archivos json (Javascript Object Notation) son archivos de texto plano y de f&aacute;cil lectura basados en Javascript. Se utilizan mayoritariamente para el intercambio de datos y est&aacute;n sustituyendo a los populares archivos XML, por ser m&aacute;s eficientes y legibles. A continuaci&oacute;n un ejemplo de un archivo json muy b&aacute;sico.</p>

<p>usuario.json</p>

<pre>
<code class="language-javascript">{
    "nombre": "Juan",
    "edad": "50",
    "correo":"juan@gmail.com"
}</code></pre>

<p>IMPORTAR JSON</p>

<p>Para importar archivos de tipo json en un entorno NodeJS es necesario realizar la llamada al archivo con el comando&nbsp;require&nbsp;indicando la ruta del archivo, para despu&eacute;s hacer uso de sus propiedades como si de un objeto se tratase.&nbsp;</p>

<p>index.js</p>

<pre>
<code class="language-javascript">var usuario = require("./usuario.json");
console.log(usuario.nombre);
console.log(usuario.correo);</code></pre>

<p>LEER JSON</p>

<p>La lectura de archivos json desde NodeJS ser realiza de igual forma que cualquier otro archivo. Tal como est&aacute; explicado en esta misma entrada (en el apartado de la librer&iacute;a fs), la lectura se realiza mediante el m&eacute;todo readFile. Este m&eacute;todo realiza la lectura del archivo obteniendo un conjunto de datos binarios que, para poder manejarlo como archivo json, es necesario aplicarle el m&eacute;todo parse del objeto JSON y as&iacute; acceder f&aacute;cilmente al contenido del archivo.</p>

<p>index.js</p>

<pre>
<code class="language-javascript">var fs = require("fs");
fs.readFile("./usuario.json", (error,data) =&gt; {
    console.log(JSON.parse(data));
    console.log(JSON.parse(data).nombre);
})</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/vcwFZyutDfuHIFSvBBYuIqdQeiK9QgmkqwelAEyg.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //82
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Express',
            'slug' => 'express',
            'body_main' => 'El microframework popular de NodeJS',
            'body_plus' => '<p>Express es una librer&iacute;a basada en Javascript y es la librer&iacute;a m&aacute;s popular para trabajar con NodeJS. Permite crear proyectos para aplicaciones web trabajando con otras librer&iacute;as y frameworks. Cuenta con un sistema de rutas que maneja los m&eacute;todos HTTP de forma muy eficiente&nbsp;y adem&aacute;s permite trabajar con una amplia variedad de sistemas de plantillas. Express es considerado un microframework debido al tama&ntilde;o de su n&uacute;cleo, que a diferencia de otros frameworks, es muy reducido y destaca por disponer de una estructura flexible y sencilla.&nbsp; Este denominado&nbsp;<strong>microframework&nbsp;</strong>no ofrece todas las ventajas o recursos que si ofrecen otros frameworks, funcionalidades como pueden ser la autenticaci&oacute;n de usuarios, m&eacute;todos para el manejo de bases de datos, pruebas de testing, etc..., pero si ofrece gran cantidad de paquetes de middleware compatibles, r&aacute;pidos y f&aacute;ciles de instalar que permiten conectarse con Express y&nbsp; que permiten realizar cualquier funcionalidad como cualquier otro framework.&nbsp;</p>

<p>INSTALAR EXPRESS</p>

<pre>
<code class="language-bash">npm install express
</code></pre>

<p style="text-align:center"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff"><span style="color:#0000ff"><strong>MANEJO DE PETICIONES</strong></span></span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff"><span style="font-size:20px"><span style="color:#0000ff"><span style="background-color:#ffffff"><strong>ENRUTADO B&Aacute;SICO</strong></span></span></span></span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:Quicksand"><span style="background-color:#ffffff">Para la implementaci&oacute;n de Express es necesario llamar a la librer&iacute;a e instanciarla&nbsp; como un objeto. Este objeto es el que va a permitir trabajar con los distintos m&eacute;todos de Express.&nbsp; A continuaci&oacute;n un ejemplo de un proyecto Express&nbsp;<span style="font-size:1rem">muy b&aacute;sico.</span></span></span></span></span></p>

<pre>
<code class="language-javascript">const   express = require("express"),
            app=express();
app.all("/",(req,res) =&gt; {
    res.send("Respuesta con Express.js");
})
app.listen(3000, () =&gt; {"Iniciando Express.js en el puerto 3000 });</code></pre>

<p>Analizando el ejemplo anterior se observa como se crea la instancia en la constante&nbsp;app&nbsp;y esa constante realiza una llamada al m&eacute;todo&nbsp;all()&nbsp;de Express. A este m&eacute;todo&nbsp;all&nbsp;(que engloba todos los verbos o m&eacute;todos de HTTP) se le pasa como primer par&aacute;metro la ruta de la petici&oacute;n y como segundo par&aacute;metro un callback que env&iacute;a los par&aacute;metros de petici&oacute;n y respuesta (muy presentes en los m&eacute;todos de Express).&nbsp;&nbsp;Por &uacute;ltimo se llama al m&eacute;todo&nbsp;listen&nbsp;indicando el n&uacute;mero de puerto a escuchar y un callback que permite mostrar alg&uacute;n tipo de informaci&oacute;n en la terminal.</p>

<p>ENRUTADO B&Aacute;SICO CON M&Eacute;TODOS</p>

<p>Express permite manejar las rutas con los distintos m&eacute;todos o verbos de http. El c&oacute;digo siguiente muestra como se crean las rutas con algunos de los m&eacute;todos m&aacute;s utilizados. El c&oacute;digo refleja la posibilidad de compartir la misma ruta, siempre y cuando, los m&eacute;todos sean distintos.</p>

<pre>
<code class="language-javascript">const     express = require("express"),
    app=express();
app
.get("/user",(req,res) =&gt; res.end("Hola Mundo desde Express.js vía get"))
.post("/user",(req,res) =&gt; res.send("Hola desde Express vía post"))
.delete("/user",(req,res) =&gt; res.send("Hola desde Express vía delete"))
.listen(3000,() =&gt; console.log("Iniciando Express.js en el puerto 3000"))</code></pre>

<p>ENRUTAR ARCHIVO EST&Aacute;TICO</p>

<p>Es posible mostrar el contenido de un archivo en el navegador mediante el m&eacute;todo&nbsp;sendFile&nbsp;y enviando la ruta de un archivo est&aacute;tico.</p>

<pre>
<code class="language-javascript">const   express = require("express"),
            app=express();
app.get("/",(req,res) =&gt; {
    res.sendFile(`${__dirname}/index.html`);
})
app.listen(3000, () =&gt; {"Iniciando Express.js en el puerto 3000 });</code></pre>

<p>RUTAS CON PAR&Aacute;METROS</p>

<p>Express permite manejar los par&aacute;metros pasados por la url mediante el signo de dos puntos y concatenarlos de forma indefinida. A continuaci&oacute;n un ejemplo de rutas con par&aacute;metros mediante el uso de los dos puntos y separando los par&aacute;metros por guiones. Para evitar errores con tildes, e&ntilde;es y otros caracteres es recomendable a&ntilde;adir el tipo de contenido y el tipo de codificaci&oacute;n de caracteres con el m&eacute;todo&nbsp;<strong>set</strong>.</p>

<pre>
<code class="language-javascript">const   express = require("express"),
            app=express();
app.get("/user/:id-:name-:age",(req,res) =&gt; {
    res
    .set({"Content-Type":"text/html,charset=UTF-8"})
    .end(`
        El usuario ${req.params.name} tiene ${req.params.age} años 
    `);
})
app.listen(3000, () =&gt; {"Iniciando Express.js en el puerto 3000 });</code></pre>

<p>RUTAS CON PAR&Aacute;METROS DE TIPO B&Uacute;SQUEDA</p>

<p>Express permite obtener informaci&oacute;n de las variables incluidas en la url, muy &uacute;til para los mecanismos de b&uacute;squeda. Para ello en lugar de&nbsp;<strong>params</strong>&nbsp;visto en el apartado anterior, dispone del m&eacute;todo&nbsp;&nbsp;<strong>query&nbsp;</strong>que permite indicar el nombre de la variable y manejar el valor pasado por dicha variable.</p>

<pre>
<code class="language-javascript">const   express=require("express"),            
            app=express();
app
.get("/search",(req,res) =&gt; {
    res
    .set({"content-type":"text/html;charset=utf-8"})
    .end(`      
        &lt;p&gt;El usuario ${req.params.name} tiene ${req.params.age} años&lt;/p&gt;
    &lt;p&gt;Los datos de s: ${req.query.w}&lt;/p&gt;
    `)
})
app.listen(3000, () =&gt; {"Iniciando Express.js en el puerto 3000 });</code></pre>

<p>En el c&oacute;digo de arriba se observa como la variable asignada al m&eacute;todo query es una&nbsp;<strong>w</strong>&nbsp;(aunque podr&iacute;a tener cualquier otro nombre), por tanto, a diferencia de las rutas anteriores que se puede indicar el tipo de separador como diagonal o gui&oacute;n (<strong>/</strong>&nbsp;,&nbsp;<strong>-)</strong>&nbsp;que son los m&aacute;s comunes. Para este tipo de par&aacute;metros es necesario utilizar el interrogante seguido de la variable y su valor, comparable al manejo de par&aacute;metros de forma nativa en PHP.&nbsp; Para dejar clara la diferencia, la ruta necesaria para una petici&oacute;n con par&aacute;metros con guiones, tal como se describe en la secci&oacute;n anterior, deber&iacute;a ser de esta forma:</p>

<pre>
<code class="language-bash">http://localhost:3000/users/12-Albert-58
</code></pre>

<p>Mientras que para realizar una petici&oacute;n, tal como se describe en esta secci&oacute;n, deber&iacute;a ser de esta otra:</p>

<pre>
<code class="language-bash">http://localhost:3000/search?w=dato
</code></pre>

<p>RUTAS DIN&Aacute;MICAS</p>

<p>Las rutas din&aacute;micas posibilitan la modificaci&oacute;n o cambio del contenido&nbsp; bas&aacute;ndose en la informaci&oacute;n pasada por la url. Express permite trabajar&nbsp;mediante el objeto Router&nbsp;con rutas din&aacute;micas, por lo general se crea un directorio&nbsp;routes&nbsp;donde se almacenan los archivos manteniendo una estructura m&aacute;s&nbsp;ordenada. Para trabajar con estas rutas es necesario indicar los datos requeridos de la url y la ubicaci&oacute;n del archivo de ruta en cuesti&oacute;n.</p>

<pre>
<code class="language-javascript">let dinamicRoute = require("./routes/dinamic")
app.use("/", dinamicRoute)</code></pre>

<p>El archivo de rutas puede interferir en la ruta o complementarla&nbsp;permitiendo trabajar las distintas rutas de forma independiente con los par&aacute;metros de la url.</p>

<pre>
<code class="language-javascript">var express = require("express")
var router = express.Router();
router.get("/", (req,res) =&gt; {
    res.send("respuesta");
})
router.get("/:id", (req,res) =&gt; {
    res.send("Parámetro pasado por url: "+ req.params.id);
})
module.exports = router;</code></pre>

<p><strong>MANEJO DE RESPUESTAS</strong></p>

<p>REDIRECCIONES</p>

<p>Express dispone de m&eacute;todos de respuesta que permiten redireccionar a una ruta externa. Para ello es necesario indicar el tipo de redirecci&oacute;n y la ruta a la que se va a enviar.</p>

<pre>
<code class="language-javascript">const     express = require("express"),
        app=express();
app
.get("/",(req,res) =&gt; {
    res.send("Hola Mundo desde Express")
})
.get("/1",(req,res) =&gt; {
    res.redirect(301,"//www.google.es")
})</code></pre>

<p>MANEJO DE DATOS JSON</p>

<p>&nbsp;Para el manejo de datos json existe el m&eacute;todo json() que permite transformar datos a un objeto de tipo json.&nbsp;</p>

<pre>
<code class="language-javascript">const     express = require("express"),
        app=express();
app
.get("/",(req,res) =&gt; {
    res.send("Hola Mundo desde Express")
})
.get("/2",(req,res) =&gt; {
    res.json({
        name: "Joan",
        age: "57",
        email: "joan@gmail.com"    
    })
})
</code></pre>

<p><strong>RENDERIZADO</strong></p>

<p>El m&eacute;todo render permite manejar las distintas vistas en sistemas de plantillas. Existen muchos motores de plantillas handlebars, pug, hogan, etc... Para integrar un motor a Express es necesario instalarlo y registrarlo en con el m&eacute;todo set.</p>

<pre>
<code class="language-javascript">.set("views", "./views")
.set("view engine", "hbs")</code></pre>

<p>Express-generator dispone de opciones para instalar y registrar algunos motores de plantillas al crear el proyecto.</p>

<pre>
<code class="language-javascript">express --view=pug miproyecto
</code></pre>

<p>Las distintas opciones se pueden revisar mediante la opci&oacute;n de ayuda antes de crear el proyecto.</p>

<pre>
<code class="language-bash">express --help
</code></pre>

<p>MOTORES DE PLANTILLAS</p>

<p>A continuaci&oacute;n la implementaci&oacute;n de algunos de estos sistemas de plantillas en Express.</p>

<p><strong>HANDLEBARS</strong></p>

<p>Handlebars es un motor de plantillas Javascript que permite generar html con objetos json, dispone de helpers, es&nbsp;sencillo y uno de los m&aacute;s utilizados.&nbsp;</p>

<p><strong>INSTALAR HANDLEBARS</strong></p>

<pre>
<code class="language-bash">npm i hbs
</code></pre>

<p><strong>HANDLEBARS EN NODEJS</strong></p>

<p>Para trabajar con Handlebars es necesario importar la librer&iacute;a,&nbsp;indicar&nbsp;el directorio de las vistas y establecer el motor de plantillas.</p>

<pre>
<code class="language-javascript">const express=require("express"),
        fs = require("fs"),
        app= express(),
        routes = require("./routes/index"),
        hbs = require("hbs")
app
.set("port",(process.env.port||3000))
.set("views",`${__dirname}/views`)
.set("view engine","hbs")
.get("/",(req,res)=&gt; {
    res.render("index",{title: "Index"})
})
app.listen(3000, () =&gt; {"Iniciando Express.js en el puerto 3000 });
module.exports = app</code></pre>

<p>El contenido html se almacena en archivos con extensi&oacute;n hbs en el directorio registrado. La plantilla se asigna autom&aacute;ticamente al detectar un archivo layout.hbs aunque es posible modificarlo a&ntilde;adiendo la propiedad layout en el m&eacute;todo render.</p>

<pre>
<code class="language-javascript">.get("/",(req,res)=&gt; {
    res.render("index",{title: "Index", layout: "plantilla"})
})</code></pre>

<p>El layout o plantilla permite, mediante llaves, a&ntilde;adir cadenas y expresiones (con doble llave) y contenido html (con triple llave).</p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
        &lt;title&gt;{{ title }}&lt;/title&gt;      
    &lt;/head&gt;
    &lt;body&gt;        
        &lt;div class="main"&gt;
            {{{body}}}
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Include en Handlebars</p>

<p>Handlebars tambi&eacute;n permite a&ntilde;adir secciones a la vista que se encuentran en otros archivos,&nbsp; similar a los include mediante los denominados partials. Para poder mostrar&nbsp; estas partes de c&oacute;digo es necesario establecer la ruta de dichos archivos mediante el m&eacute;todo registerPartials() y deben mantener la extensi&oacute;n hbs.</p>

<pre>
<code class="language-javascript">const express=require("express"),
        fs = require("fs"),
        app= express(),
        routes = require("./routes/index"),
        hbs = require("hbs")
        
hbs.registerPartials(`${__dirname}/views/partials`)
app
.set("port",(process.env.port||3000))
.set("views",`${__dirname}/views`)
.set("view engine","hbs")
.use(routes)
app.listen(
    app.get("port"),
    () =&gt; console.log(`Iniciando Express en el puerto ${app.get(\'port\')}`)
)
module.exports = app</code></pre>

<p>Para incluir estos archivos se indica el archivo entre dobles llaves como si de una expresi&oacute;n o cadena se tratase, pero, a diferencia de los anteriores se incluye un gui&oacute;n (<strong>&gt;)&nbsp;</strong>antes del nombre del archivo.</p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
        &lt;title&gt;{{ title }}&lt;/title&gt;      
    &lt;/head&gt;
    &lt;body&gt;
                {{&gt;header}}      
        &lt;div&gt;
            {{{body}}}
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>PUG</strong></p>

<p>Es un motor de plantillas de alto nivel, sencillo basado en la indentaci&oacute;n que permite generar c&oacute;digo html sin necesidad de escribir etiquetas html. Ha sido implementado en Javascript para NodeJS y su versi&oacute;n anterior (jade) viene por defecto al crear un proyecto con Express-generator (aunque se recomienda instalar pug, ya que jade es considerado una versi&oacute;n obsoleta) .</p>

<p><strong>INSTALAR PUG</strong></p>

<pre>
<code class="language-bash">npm i pug 
</code></pre>

<p>Con Pug es posible crear contenido html de forma normal, como tambi&eacute;n es posible crearlo sin necesidad de introducir ninguna etiqueta. Para que el sistema reconozca el contenido es indispensable que los archivos dispongan de la extensi&oacute;n pug y la ruta se encuentre registrada en Express.</p>

<p>El motor de Pug toma en cuenta&nbsp;la indentaci&oacute;n para identiificar el nivel de los elementos y&nbsp;su sintaxis se&nbsp;basa en&nbsp;caracteres y palabras reservadas que permiten sustituir etiquetas html o a&ntilde;adir contenido externo. Un ejemplo de ello es la palabra reservada&nbsp;<strong>extends,&nbsp;</strong>t&eacute;rmino utilizado frecuentemente&nbsp;por otros frameworks, que permite incorporar una plantilla a un contenido espec&iacute;fico,y de esa forma, una plantilla con contenido m&aacute;s gen&eacute;rico, puede ser compartido en distintas vistas&nbsp;.</p>

<pre>
<code class="language-html">extends layout
block content
    h1 = "Google"
    
p
    a(href="//www.google.es")</code></pre>

<p>El sistema de Pug en Express permite manejar y enviar datos en formato json a la vista mediante el m&eacute;todo render.&nbsp;</p>

<pre>
<code class="language-javascript">var express = require("express");
var router = express.Router();
router.get("/:id",(req,res) =&gt; {
    res.render("index",{
        data:{
            title: "Datos por ID",
            ID: req.params.id
        }
    })
})</code></pre>

<p>La vista recoge los datos haciendo uso de la indentaci&oacute;n y sintaxis anteriormente mencionada</p>

<pre>
<code class="language-html">h2 #{data.title}
if data
    ul
        li ID: #{data.ID}
else
    &lt;p&gt;No existe data&lt;/p&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/C6TvfIkC0MrcYu57M2FXZgskxXbyKH8nOYxgCvz6.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //83
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Socket.IO',
            'slug' => 'socket-io',
            'body_main' => 'El JQuery de los Websockets',
            'body_plus' => '<p>Socket.IO es una librer&iacute;a que permite trabajar con websockets de forma simplificada y sencilla, es compatible con la mayor&iacute;a de navegadores y probablemente sea la librer&iacute;a m&aacute;s popular que trabaja con este protocolo. Un punto&nbsp; importante de esta librer&iacute;a es que ofrece la misma interface mediante lenguaje Javascript tanto para el lado del cliente como para el lado del servidor. Para ampliar informaci&oacute;n es recomendable revisar la documentaci&oacute;n oficial de&nbsp;<a href="https://socket.io/docs" target="_blank">Socket.IO</a>.</p>

<p>INSTALAR SOCKET.IO</p>

<pre>
<code class="language-bash">npm i socket.io
</code></pre>

<p>Socket.IO se comunica a trav&eacute;s de eventos, para ello, dispone de distintos eventos y permite trabajar con ellos tanto en el lado del servidor como en el lado del cliente. A continuaci&oacute;n los eventos b&aacute;sicos para el intercambio de datos.</p>

<p>on:&nbsp;M&eacute;todo que detecta los eventos</p>

<p>connection: Evento de conexi&oacute;n&nbsp;</p>

<p>disconnect: Evento de desconexi&oacute;n</p>

<p>emit: M&eacute;todo que permite emitir un evento&nbsp; y enviar datos al servidor y a todos los clientes conectados</p>

<p>broadcast.emit: M&eacute;todo que permite emitir un evento&nbsp; enviar datos al servidor y a todos los clientes conectados, excepto al que lo inicia.</p>

<p>INTERCAMBIO DE DATOS</p>

<p>&nbsp;</p>

<p>El intercambio de datos se inicia desde el servidor mediante el m&eacute;todo&nbsp;<strong>on&nbsp;</strong>que captura el evento y el evento&nbsp;<strong>connection</strong>&nbsp;que detecta la conexi&oacute;n. El m&eacute;todo&nbsp;<strong>on</strong>&nbsp;requiere de dos par&aacute;metros, un&nbsp;<strong>evento</strong>, que puede ser un evento propio o un evento de SocketIO ,<strong>&nbsp;</strong>y un&nbsp;<strong>callback</strong>&nbsp;que permite continuar el proceso.</p>

<pre>
<code class="language-javascript">io.on("connection",socket =&gt; {
}
</code></pre>

<p>El cliente debe disponer de la librer&iacute;a SocketIO para poder emitir o capturar eventos, de la misma forma que se hace en el servidor. El script se puede realizar desde el mismo archivo o desde un archivo externo.</p>

<pre>
<code class="language-html">&lt;script src="./socket.io/socket.io.js"&gt;&lt;/script&gt;

&lt;script src="./script.js"&gt;&lt;/script&gt;</code></pre>

<p>INTERCAMBIO DE DATOS B&Aacute;SICO CON SOCKETIO</p>

<p>&nbsp;</p>

<p>A continuaci&oacute;n un ejemplo de un intercambio de datos entre un servidor b&aacute;sico y un cliente, basado en un archivo est&aacute;tico (index.html) que inicia una conexi&oacute;n mediante&nbsp;<strong>SocketIO</strong>.&nbsp;Una vez inicia la conexi&oacute;n, el servidor emite un evento enviando un mensaje de confirmaci&oacute;n que el cliente recibe y muestra en pantalla.</p>

<pre>
<code class="language-javascript">const   http = require("http").createServer(handler),
    fs = require("fs"),
    io = require("socket.io")(http)
let discEvent = "conexión finalizada"
let name={};
function handler(req,res){
    fs.readFile(__dirname+"/index.html", (err,data) =&gt; {
        if(err) {
            res.writeHead(500,{"Content-Type":"text/html"})
        return res.send("Error Interno del Servidor")
        }else{
        res.writeHead(200,{"Content-Type":"text/html"})
        return res.end(data,"utf-8")
        }
    })
}
http.listen(3000,console.log("Servidor corriendo desde el localhost:3000"))
io.on("connection",socket =&gt; {
    socket.emit("evento",{message: "conexión iniciada"})
}</code></pre>

<p>Desde el cliente (index.html)&nbsp; se captura el evento mediante el m&eacute;todo&nbsp;<strong>on</strong>&nbsp;que recoge los datos se a&ntilde;aden a un elemento html que permite visualizarlos en la pantalla de forma instant&aacute;nea.</p>

<pre>
<code class="language-html">&lt;!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;SocketIO&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;h1&gt;Comunicación con SocketIO&lt;/h1&gt;
    &lt;p id="div"&gt;&lt;/p&gt;
    &lt;script src="./socket.io/socket.io.js"&gt;&lt;/script&gt;
    &lt;script&gt;  
    ((d,io) =&gt; {       
        io.on("evento",data =&gt;{
            console.log(data)                   
            d.getElementById("div").textContent = data.message          
        })
    })(document,io());
    &lt;/script&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>De esta forma se puede continuar capturando y emitiendo otros eventos. Eventos como pueden ser el evento&nbsp;<strong>click</strong>&nbsp;<strong>(</strong>propio de Javascript) que detecta cuando se pulsa un bot&oacute;n o el evento&nbsp;<strong>disconnect</strong>&nbsp;(de SocketIO) que detecta la desconexi&oacute;n por parte del cliente.&nbsp;</p>

<p>&nbsp;</p>

<p>INTERCAMBIO DE DATOS CON VARIOS EVENTOS</p>

<p>El c&oacute;digo siguiente ejemplifica los distintos eventos anteriormente mencionados. Emite un evento enviando un mensaje de bienvenida al iniciar la conexi&oacute;n y captura otros dos eventos, uno al presionar un bot&oacute;n y otro al desconectarse. Se puede observar como en la captura de este &uacute;ltimo evento (disconnect) se aplica el m&eacute;todo&nbsp;<strong>broadcast.emit</strong>&nbsp;en lugar del m&eacute;todo&nbsp;<strong>emit</strong>, ya que, al desconectarse no tiene sentido que el mismo cliente que se desconecta reciba ningun dato.</p>

<pre>
<code class="language-javascript">const   http = require("http").createServer(handler),
    fs = require("fs"),
    io = require("socket.io")(http)
let discEvent = "conexión finalizada"
let name={};
function handler(req,res){
    fs.readFile(__dirname+"/index.html", (err,data) =&gt; {
        if(err) {
            res.writeHead(500,{"Content-Type":"text/html"})
            return res.send("Error Interno del Servidor")
    }else{
        res.writeHead(200,{"Content-Type":"text/html"})
        return res.end(data,"utf-8")
    }
    })
}
http.listen(3000,console.log("Servidor corriendo desde el localhost:3000"))
io.on("connection",socket =&gt; {
    socket.emit("evento",{message: "Bienvenido la conexión ha sido iniciada"})
    socket.on("boton",(data) =&gt; {
        console.log(data)
        socket.emit("otro evento", {message: "Botón pulsado"})
    })
    socket.on("disconnect",() =&gt; {
        socket.broadcast.emit("desconexion",{discEvent})
    })    
})</code></pre>

<p>A continuaci&oacute;n el archivo html que contiene varios elementos. Este archivo incluye el script (aunque es posible realizarlo desde un archivo externo) que emite un &uacute;nico evento, que se activa al pulsar el bot&oacute;n, y captura los tres eventos que se emiten desde el servidor que recogen los datos&nbsp; y los muestra en la vista.</p>

<pre>
<code class="language-html">!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;SocketIO&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;h1&gt;Comunicación con SocketIO&lt;/h1&gt;
    &lt;p id="div"&gt;&lt;/p&gt;        
        &lt;button id="boton"&gt;Emitir evento&lt;/button&gt;
        &lt;span id="span" style="color:green"&gt;&lt;/span&gt;
    &lt;script src="./socket.io/socket.io.js"&gt;&lt;/script&gt;
    &lt;script&gt;  
    ((d,io) =&gt; {
                
        document.getElementById("boton").addEventListener("click", e =&gt; {
            e.preventDefault()
            io.emit("boton",{name: "Xip",email:"xip@gmail.com"})
            return false
        })
    io.on("evento",data =&gt;{
            console.log(data)                   
        d.getElementById("div").textContent = data.message          
    })
        io.on("otro evento", data =&gt; {
            d.getElementById("span").textContent = data.message
        })    
        io.on("desconexion",data =&gt; {
            d.getElementById("div").textContent = data.discEvent
        })                      
    })(document,io());
    &lt;/script&gt;
    &lt;/body&gt;
&lt;/html&gt;
</code></pre>

<p>INTERCAMBIO DE DATOS CON EXPRESS</p>

<p>A continuaci&oacute;n un chat muy b&aacute;sico que se comunica mediante el protocolo websocket utilizando para ello la librer&iacute;a Socket.IO. El servidor se crea con la librer&iacute;a Express en lugar de http (que viene incluida en la instalaci&oacute;n de NodeJS) como en los ejemplos anteriores. Este chat lanza una ventana con un mensaje de alerta cada vez que se realiza una nueva conexi&oacute;n o una desconexi&oacute;n y permite mostrar los mensajes de todos los usuarios que se encuentran conectados de forma instant&aacute;nea.</p>

<p><strong>app.js</strong></p>

<pre>
<code class="language-javascript">const c = console.log,
    express = require("express"),
    app = express(),
    http = require("http").createServer(app),
    io = require("socket.io")(http),
    port = process.env.PORT || 3000,
    publicDir = express.static(`${__dirname}/public`)
app
.use(publicDir)
.get("/",(req,res) =&gt; res.sendFile(`${publicDir}/index.html`))
http.listen(port,()=&gt; c(`Iniciando Chat en localhost: ${port}`))
io.on("connection",socket =&gt;{
    socket.broadcast.emit("new user",{message:"Ha entrado un usuario al Chat"})
    socket.on("new message",message =&gt; io.emit("user message",message))
    socket.on("disconnect",() =&gt; {
        let message = "Ha salido un usuario del chat";
        c(message)
        socket.broadcast.emit("disconnect user",{message});
    })
    
})
</code></pre>

<p><strong>index.html</strong></p>

<pre>
<code class="language-html">&lt;!DOCTYPE HTML&gt;
&lt;html lang="es"&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
        &lt;title&gt;Chat con Express y Socket.IO&lt;/title&gt;
        &lt;link rel="stylesheet" href="./style.css"&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;ul id="chat"&gt;
            &lt;li&gt;Comentario 1&lt;/li&gt;
            &lt;li&gt;Comentario 2&lt;/li&gt;
            &lt;li&gt;Comentario 3&lt;/li&gt;
            &lt;li&gt;Comentario 4&lt;/li&gt;
            &lt;li&gt;Comentario 5&lt;/li&gt;
        &lt;/ul&gt;
        &lt;form id="chat-form"&gt;
            &lt;input type="text" id="chat-message" autocomplete="off" required&gt;
            &lt;button&gt;Enviar&lt;/button&gt;
        &lt;/form&gt;
        &lt;script src="./socket.io/socket.io.js"&gt;&lt;/script&gt;
        &lt;script src="./script.js"&gt;&lt;/script&gt;     
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>script.js</strong></p>

<pre>
<code class="language-javascript">((d,io)=&gt;{
    const chatForm = d.getElementById("chat-form"),
        chatMessage = d.getElementById("chat-message"),
        chat = d.getElementById("chat")
        chatForm.addEventListener("submit", e =&gt; {
            e.preventDefault();
            //io.emit("new user", chatMessage.value)
            io.emit("new message",chatMessage.value)
            chatMessage.value=null
            return false            
        })
        io.on("new user",newUser =&gt; alert(newUser.message))
        io.on("user message", userMessage =&gt; {
            //opción 1 creando elementos y añadiendo
            //let li = document.createElement("li");
            //li.textContent=userMessage;
            //chat.append(li);
            
            //opción 2 añadiendo con insertAdjacentHTML
            chat.insertAdjacentHTML("beforeend",`&lt;li&gt;${userMessage}li&gt;`)
        })
        io.on("disconnect user",disconnectUser =&gt; {
            alert(disconnectUser.message)
        })
})(document,io())</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/awFHL27gbmH78nPWtrlfSsOMvIdHB0I8KT91v10a.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //84
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Java',
            'slug' => 'java',
            'body_main' => 'Lenguaje de programación Java',
            'body_plus' => '<p>Java es uno de los lenguajes de programaci&oacute;n m&aacute;s completos y populares. Es utilizado por usuarios y empresas de todo el mundo, convirti&eacute;ndose en un lenguaje de referencia para muchos desarrolladores, y que actualmente contin&uacute;a&nbsp;ense&ntilde;&aacute;ndose en universidades. Java fue creada por Sun Microsystems, publicada y comercializada en 1995 hasta que finalmente Sun acab&oacute; siendo&nbsp;adquirida por Oracle en 2010. Es un lenguaje orientado a objetos, tipado, seguro, multiplataforma y multihilo permitiendo crear programas de todo tipo y para m&uacute;ltiples entornos como pueden ser servidores, aplicaciones web, aplicaciones m&oacute;vil, programas de escritorio, videojuegos,etc...&nbsp;</p>

<p>Java, a pesar de ser considerado un lenguaje compilado, se distingue en este aspecto de otros lenguajes, ya que la compilaci&oacute;n genera un c&oacute;digo&nbsp; intermedio (bytecode) que es interpretado por los distintos sistemas mediante un programa llamado JVM.&nbsp;</p>

<p><strong>&nbsp;VERSIONES JAVA</strong></p>

<p>Java dispone de tres versiones:</p>

<ul>
    <li><strong>Java EE</strong></li>
    <li><strong>Java SE</strong></li>
    <li><strong>Java ME</strong></li>
</ul>

<p><strong>Java Micro Edition</strong>&nbsp;est&aacute; dirigida para el peque&ntilde;o dispositivo en general, m&oacute;viles, televisores, reproductores y una amplia variedad de electrodom&eacute;sticos.</p>

<p><strong>Java Standard Edition&nbsp;</strong>es la versi&oacute;n preferida por la mayor&iacute;a de usuarios, m&aacute;s enfocada para aplicaciones de escritorio y servidores de un nivel medio.</p>

<p><strong>Java Enterprise Edition</strong>&nbsp;es la indicada para grandes aplicaciones y aplicaciones en red que trabajan generalmente grandes empresas, destacando especialmente del &aacute;mbito financiero.</p>

<p>HERRAMIENTAS DE JAVA</p>

<p>Java dispone de distintas herramientas. Es importante distinguir estas herramientas debido, en parte, a la similitud de las siglas, que en ocasiones pueden acabar generando cierta confusi&oacute;n.</p>

<ul>
    <li>JVM</li>
    <li>JRE</li>
    <li>JDK</li>
    <li>JDBC</li>
    <li>OPENJDK</li>
</ul>

<p>JVM&nbsp;(Java Virtual Machine) o m&aacute;quina Virtual de Java es un programa que, una vez instalado,&nbsp; interpreta y ejecuta el c&oacute;digo bytecode escrito en Java. JVM&nbsp;se encuentra disponible de forma gratuita en distintas&nbsp;versiones&nbsp;para distintas plataformas desde la secci&oacute;n de descargas de su&nbsp;<a href="https://www.java.com/es/download/" target="_blank">p&aacute;gina oficial</a>.</p>

<p>JRE&nbsp;(Java Runtime Environment) o entorno en tiempo de ejecuci&oacute;n de Java es un paquete de instalaci&oacute;n que contiene el JVM y&nbsp;proporciona algunas librer&iacute;as adicionales necesarias en distintos dispositivos. JRE viene incluido en multitud de paquetes de instalaci&oacute;n desarrollados en Java.</p>

<p>JDK&nbsp;(Java Development Kit) o kit de desarrollo de Java es un paquete de instalaci&oacute;n compuesto por un conjunto de herramientas que permiten el desarrollo de aplicaciones y applets en Java y adem&aacute;s incluye el JRE.&nbsp;</p>

<p>JDBC&nbsp;(Java Database Connectivity) o conectividad a base de datos en Java es una API de Java que permite realizar conexiones y trabajar con bases de datos mediante el lenguaje SQL.</p>

<p><strong>OPENJDK</strong>&nbsp;es la versi&oacute;n libre y abierta del JDK generalmente utilizada en distribuciones Linux.</p>

<p>Existen varios IDE para el desarrollo de Java, sin embargo se distinguen dos, por ser los m&aacute;s populares y veteranos, son Netbeans y Eclipse. Tanto Netbeans se&nbsp; puede descargar desde su&nbsp;<a href="https://netbeans.apache.org/download/index.html" target="_blank">p&aacute;gina oficial</a>, de igual forma que&nbsp;<a href="https://www.eclipse.org/downloads/" target="_blank">Eclipse</a>. En ambos,&nbsp;es indispensable tener instalado el JDK para el desarrollo de aplicaciones Java.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/kImj9n4dbO8dAOM0q2Zu1hIjzD47YhRejNeOgliT.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);
        //85
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Swing en Java',
            'slug' => 'swing-en-java',
            'body_main' => 'Creación de interfaces con Java Swing',
            'body_plus' => '<p><strong>Swing</strong>&nbsp;es un conjunto de librer&iacute;as que permiten la creaci&oacute;n de interfaces gr&aacute;ficas de usuario (GUI) en Java. Swing viene incluida en el paquete&nbsp;<strong>JDK</strong>&nbsp;y es considerada una versi&oacute;n mejorada de la librer&iacute;a&nbsp;<strong>AWT</strong>.</p>

<p>Swing permite integrar y configurar un proyecto Java mediante un conjunto de elementos como pueden ser botones, cajas de texto, paneles, etc..., Los componentes de Swing&nbsp;son f&aacute;cilmente diferenciables de otras librer&iacute;as por llevar incorporada la letra J al comienzo del nombre (prefijo) del elemento, JPanel, JFrame, JButton.&nbsp;Adem&aacute;s dispone de m&eacute;todos que permiten configurar todos esos elementos, como pueden ser asignar un tama&ntilde;o, un color, una fuente, integrar una imagen, etc...</p>

<p>VENTANAS</p>

<p>CREAR VENTANA</p>

<p>Para crear una ventana en Swing es necesario importar y extender la clase JFrame.</p>

<pre>
<code class="language-java">package ventana2;
import javax.swing.JFrame;
public class Ventana2 extends JFrame {
    public Ventana2(){
        setSize(200,200);
        setTitle("Ventana básica");       
    }
    
    public static void main(String[] args) {
        Ventana2 ventana = new Ventana2();
        ventana.setVisible(true);
    }    
}</code></pre>

<p><strong>CERRAR VENTANA CON EVENTOS</strong></p>

<p>El cierre de la ventana se realiza mediante eventos que detectan la pulsaci&oacute;n del bot&oacute;n de cierre.</p>

<pre>
<code class="language-java">package ventana2;
import javax.swing.JFrame;
public class Ventana2 extends JFrame {
    public Ventana2(){
        setSize(400,400);
        setTitle("Cerrar ventana con evento");
        initComponents();
    }
    
    public void initComponents(){
        addWindowListener(new java.awt.event.WindowAdapter() {
            
            @Override
            public void windowClosing(java.awt.event.WindowEvent evento){
                System.exit(0);
            }
        });
    }
    public static void main(String[] args) {
        Ventana2 ventana = new Ventana2();
        ventana.setVisible(true);
    }    
}</code></pre>

<p>CERRAR VENTANA CON setDefaultCloseOperation</p>

<p>Swing dispone del m&eacute;todo&nbsp;<strong>setDefaultCloseOperation()</strong>&nbsp;que realiza la detecci&oacute;n de evento autom&aacute;ticamente de forma sencilla. Este m&eacute;todo permite cuatro constantes:</p>

<ul>
    <li>DON_NOTHING_ON_CLOSE</li>
</ul>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No realiza ninguna acci&oacute;n al accionar el cierre de ventana</p>

<ul>
    <li>HIDE_ON_CLOSE</li>
</ul>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oculta la ventana pero no detiene la ejecuci&oacute;n</p>

<ul>
    <li>DISPOSE_ON</li>
</ul>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oculta solamente una ventana pero no detiene la ejecuci&oacute;n</p>

<ul>
    <li>EXIT_ON_CLOSE</li>
</ul>

<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Detiene la ejecuci&oacute;n del programa</p>

<pre>
<code class="language-java">package ventana2;
import javax.swing.JFrame;
public class Ventana2 extends JFrame {
    public Ventana2(){
        setSize(400,400);
        setTitle("Cerrar ventana con evento");
        setDefaultCloseOperation(EXIT_ON_CLOSE);
    }
    public static void main(String[] args) {
        Ventana2 ventana = new Ventana2();
        ventana.setVisible(true);
    }    
}
</code></pre>

<p><strong>CONFIGURAR VENTANA</strong></p>

<p>A continuaci&oacute;n un ejemplo de una ventana que establece la configuraci&oacute;n de anchura y altura, el t&iacute;tulo, la activaci&oacute;n del bot&oacute;n de cierre, las dimensiones m&iacute;nimas y el fondo.</p>

<pre>
<code class="language-java">package ventana2;
import java.awt.Dimension;
import javax.swing.JFrame;
public class Ventana2 extends JFrame {
    public Ventana2(){
        setSize(400,400);
        setTitle("Cerrar ventana con evento");
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        this.setMinimumSize(new Dimension(200, 200));
        this.getContentPane().setBackground(Color.Red);
    }
    public static void main(String[] args) {
        Ventana2 ventana = new Ventana2();
        ventana.setVisible(true);
    }    
}</code></pre>

<p>CREAR PANEL</p>

<p>Un proyecto puede requerir m&aacute;s de una ventana, para ello,&nbsp;<strong>Swing</strong>&nbsp;permite crear dentro de la ventana los paneles necesarios.</p>

<pre>
<code class="language-java">package ventana2;
import java.awt.Color;
import java.awt.Dimension;
import javax.swing.JFrame;
import javax.swing.JPanel;
public class Ventana2 extends JFrame {
    public Ventana2(){
        setVentana();
        initComponents();
    }
    private void setVentana() {
        setSize(400,400);
        setTitle("Cerrar ventana con evento");
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        this.setMinimumSize(new Dimension(200, 200));
        this.getContentPane().setBackground(Color.red);
    }
    
    private void newPanel(){
        JPanel panel = new JPanel();
        panel.setBackground(Color.ORANGE);
        this.getContentPane().add(panel);
    }
    
    private void initComponents(){
        newPanel();
    }
    public static void main(String[] args) {
        Ventana2 ventana = new Ventana2();
        ventana.setVisible(true);
    }    
}</code></pre>

<p>LAYOUT MANAGER</p>

<p>Java recomienda trabajar con gestores de dise&ntilde;o, con ellos se puede definir el estilo a los distintos paneles, permitiendo ordenar los elementos que contiene cada panel y evitando que al dimensionar &eacute;ste no se descomponga, es decir, no se altere el orden y la dimensi&oacute;n de dichos elementos. A continuaci&oacute;n algunos de los dise&ntilde;os m&aacute;s recomendados y utilizados.</p>

<p><strong>BORDERLAYOUT</strong></p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,200,200);
    this.getContentPane().add(panel,BorderLayout.CENTER);
    JPanel panel2 = new JPanel();
    panel2.setBackground(Color.red);
    this.getContentPane().add(panel2,BorderLayout.NORTH);
    JPanel panel3 = new JPanel();
    panel3.setBackground(Color.BLUE);
    this.getContentPane().add(panel3,BorderLayout.SOUTH);
    JPanel panel4 = new JPanel();
    panel4.setBackground(Color.GRAY);
    this.getContentPane().add(panel4,BorderLayout.EAST);
    JPanel panel5 = new JPanel();
    panel5.setBackground(Color.GREEN);
    this.getContentPane().add(panel5,BorderLayout.WEST);
}
</code></pre>

<p><strong>FLOWLAYOUT</strong></p>

<pre>
<code class="language-java">private void newPanel(){
    this.setLayout(new FlowLayout());
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,200,200);
    this.getContentPane().add(panel);
    JPanel panel2 = new JPanel();
    panel2.setBackground(Color.white);
    this.getContentPane().add(panel2);
    JPanel panel3 = new JPanel();
    panel3.setBackground(Color.BLUE);
    this.getContentPane().add(panel3);
    JPanel panel4 = new JPanel();
    panel4.setBackground(Color.GRAY);
    this.getContentPane().add(panel4);
    JPanel panel5 = new JPanel();
    panel5.setBackground(Color.GREEN);
    this.getContentPane().add(panel5);
}</code></pre>

<p><strong>BOXLAYOUT</strong></p>

<pre>
<code class="language-java">private void newPanel(){
    this.setLayout(new BoxLayout(this.getContentPane(),BoxLayout.X_AXIS));
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,200,200);
    this.getContentPane().add(panel);
    JPanel panel2 = new JPanel();
    panel2.setBackground(Color.white);
    this.getContentPane().add(panel2);
    JPanel panel3 = new JPanel();
    panel3.setBackground(Color.BLUE);
    this.getContentPane().add(panel3);
    JPanel panel4 = new JPanel();
    panel4.setBackground(Color.GRAY);
    this.getContentPane().add(panel4);
    JPanel panel5 = new JPanel();
    panel5.setBackground(Color.GREEN);
    this.getContentPane().add(panel5);
}</code></pre>

<p><strong>LAYOUT VAC&Iacute;O</strong></p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,200,200);
    this.getContentPane().add(panel);
    JPanel panel2 = new JPanel();
    panel2.setBackground(Color.white);
    panel2.setBounds(200,200,200,200);
    this.getContentPane().add(panel2);
    JPanel panel3 = new JPanel();
    panel3.setBackground(Color.BLUE);
    panel3.setBounds(0,200,200,200);
    this.getContentPane().add(panel3);
    JPanel panel4 = new JPanel();
    panel4.setBackground(Color.GRAY);
    panel4.setBounds(200,0,200,200);
    this.getContentPane().add(panel4);
    JPanel panel5 = new JPanel();
    panel5.setBackground(Color.GREEN);
    panel5.setBounds(400,400,200,200);
    this.getContentPane().add(panel5);
}</code></pre>

<p><strong>COMPONENTES</strong></p>

<p>Java trabaja con objetos, tambi&eacute;n llamados componentes . Componente es cualquier elemento de un proyecto y a su vez puede contener uno o m&aacute;s componentes. Por tanto, una ventana es un componente que puede contener un panel que es otro componente que a su vez puede contener un bot&oacute;n que es otro componente. De esta forma el proyecto mantiene una estructura y un c&oacute;digo ordenado.</p>

<p><strong>ETIQUETAS</strong></p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,600,600);
    panel.setLayout(null);
    getContentPane().add(panel);
    
    JLabel tag = new JLabel();
    tag.setText("Etiqueta");
    tag.setBounds(10, 10, 100, 30);
    panel.add(tag);
}</code></pre>

<p>CONFIGURAR ETIQUETAS</p>

<p>Color de fuente y fondo</p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,600,600);
    panel.setLayout(null);
    getContentPane().add(panel);
        
    JLabel tag = new JLabel();
    tag.setText("Etiqueta");
    tag.setBounds(10, 10, 100, 30);
    tag.setForeground(Color.magenta);
    tag.setBackground(Color.BLACK);
    tag.setOpaque(true);
    panel.add(tag);
}</code></pre>

<p>Posici&oacute;n texto</p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,600,600);
    panel.setLayout(null);
    getContentPane().add(panel);
        
    JLabel tag = new JLabel("Etiqueta",SwingConstants.CENTER);        
    tag.setBounds(10, 10, 100, 30);
    tag.setForeground(Color.magenta);
    tag.setBackground(Color.BLACK);
    tag.setOpaque(true);
    panel.add(tag);
}</code></pre>

<p>Fuentes</p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,600,600);
    panel.setLayout(null);
    getContentPane().add(panel);
        
    JLabel tag = new JLabel("Etiqueta",SwingConstants.CENTER);        
    tag.setBounds(10, 10, 100, 30);
    tag.setForeground(Color.magenta);
    tag.setBackground(Color.BLACK);
    tag.setOpaque(true);
    tag.setFont(new Font("arial", Font.BOLD,20));
    panel.add(tag);
}</code></pre>

<p>Fuentes externas</p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,600,600);
    panel.setLayout(null);
    getContentPane().add(panel);
        
    JLabel tag = new JLabel("Etiqueta",SwingConstants.CENTER);        
    tag.setBounds(10, 10, 200, 30);
    tag.setForeground(Color.magenta);
    tag.setBackground(Color.BLACK);
    tag.setOpaque(true);
    File myFont = new File("TheGodFather.ttf");
    try{
        Font font = Font.createFont(Font.TRUETYPE_FONT,myFont);
        Font sizeFont = font.deriveFont(40f);
        tag.setFont(sizeFont);
    }catch(FontFormatException ex){
        System.err.println("Error estableciendo fuente tipográfica");
    }catch (IOException ex) {
        System.err.println("Error I/O");
    }
    panel.add(tag);
}</code></pre>

<p>IMAGEN EN ETIQUETA</p>

<pre>
<code class="language-java">private void newPanel(){
    JPanel panel = new JPanel();
    panel.setBackground(Color.ORANGE);
    panel.setBounds(0,0,600,600);
    panel.setLayout(null);
    getContentPane().add(panel);
        
    JLabel tag = new JLabel("Etiqueta",SwingConstants.CENTER);        
    tag.setBounds(10, 10, 200, 30);
    tag.setForeground(Color.magenta);
    tag.setBackground(Color.BLACK);
    tag.setOpaque(true);
    File myFont = new File("TheGodFather.ttf");
    try{
        Font font = Font.createFont(Font.TRUETYPE_FONT,myFont);
        Font sizeFont = font.deriveFont(40f);
        tag.setFont(sizeFont);
    }catch(FontFormatException ex){
        System.err.println("Error estableciendo fuente tipográfica");
    }catch (IOException ex) {
        System.err.println("Error I/O");
    }
    panel.add(tag);
       
    //Imagen
    ImageIcon emoticono = new ImageIcon("emoticono.jpeg");
    JLabel emo = new JLabel();
    //emo.setIcon(emoticono);
    emo.setBounds(10,100,200,200);
    emo.setIcon(new ImageIcon(emoticono.getImage().getScaledInstance(emo.getWidth(),emo.getHeight(),Image.SCALE_SMOOTH)));
    panel.add(emo);
}</code></pre>

<p>BOTONES</p>

<pre>
<code class="language-java">private void addButton(){
        button = new JButton("Hola");
        button.setBounds(250,280,100,50);
        //button.setText("Hola");
        panel.add(button);
    }
private void initComponents(){
        addPanel();
        addTag();
        addButton();
    }</code></pre>

<p>BOTONES CON FUENTE</p>

<pre>
<code class="language-java">private void addButton(){
        button = new JButton("Hola");
        button.setBounds(250,280,100,50);
        button.setForeground(Color.BLUE);        
        button.setFont(new Font("arial",Font.ITALIC,20));
        panel.add(button);
}</code></pre>

<p>BOTONES CON FUENTE EXTERNA</p>

<pre>
<code class="language-java">private void addButton(){
        button = new JButton("Hola");
        button.setBounds(250,280,100,50);
        button.setForeground(Color.BLUE);        
        File myFont = new File("TheGodFather.ttf");
        try{
            Font font = Font.createFont(Font.TRUETYPE_FONT,myFont);
            Font sizeFont = font.deriveFont(40f);
            button.setFont(sizeFont);
        }catch(FontFormatException ex){
            System.err.println("Error estableciendo fuente tipográfica");
        }catch (IOException ex) {
            System.err.println("Error I/O");
        }
        panel.add(button);
    }</code></pre>

<p>FONDO DE BOTONES</p>

<pre>
<code class="language-java">private void addButton(){
    button = new JButton("Hola");
    button.setBounds(200,260,200,80);    
    button.setBackground(Color.magenta);        
    panel.add(button);
}</code></pre>

<p>BORDE DE BOTONES</p>

<pre>
<code class="language-java">private void addButton(){
    button = new JButton("Hola");
    button.setBounds(200,260,200,80);        
    button.setOpaque(false);
    button.setBorder(BorderFactory.createBevelBorder(BevelBorder.RAISED));
    button.setBackground(Color.green);        
    panel.add(button);
}</code></pre>

<p>CONFIGURACI&Oacute;N DE BORDE (BISEL)</p>

<pre>
<code class="language-java">private void addButton(){
    button = new JButton("Hola");
    button.setBounds(200,260,200,80);        
    button.setOpaque(true);        
    button.setBorder(BorderFactory.createBevelBorder(BevelBorder.RAISED,Color.yellow,Color.black));
    button.setBackground(Color.green);        
    panel.add(button);
}</code></pre>

<p>&nbsp;</p>

<pre>
<code class="language-java">private void addButton(){
    button = new JButton("Hola");
    button.setBounds(200,260,200,80);        
    button.setOpaque(true);       
    button.setBorder(BorderFactory.createBevelBorder(BevelBorder.RAISED,Color.white,Color.black,Color.GRAY,Color.BLACK));
    button.setBackground(Color.green);        
    panel.add(button);
}</code></pre>

<p>CONFIGURACI&Oacute;N DE BORDE (LINEA)</p>

<pre>
<code class="language-java">private void addButton(){
    button = new JButton("Hola");
    button.setBounds(200,260,200,80);        
    button.setOpaque(true);        
    button.setBorder(BorderFactory.createLineBorder(Color.gray,5, true));
    button.setBackground(Color.lightGray);        
    panel.add(button);
}</code></pre>

<p>EVENTOS</p>

<p>MouseListener</p>

<p>MouseClicked</p>

<p>Detecta que el bot&oacute;n del rat&oacute;n ha sido pulsado</p>

<p>MousePressed</p>

<p>Detecta que el bot&oacute;n del rat&oacute;n est&aacute; siendo pulsado</p>

<p>MouseReleased</p>

<p>Detecta que el bot&oacute;n se ha soltado, si es movido mientras est&aacute; pulsado no detecta MouseClicked&nbsp;</p>

<p>MouseEntered</p>

<p>Detecta el rat&oacute;n sobre el &aacute;rea del elemento</p>

<p>MouseExited</p>

<p>Detecta el rat&oacute;n fuera del&nbsp; &aacute;rea del elemento</p>

<pre>
<code class="language-java">private void actionMouse(){
        button.addMouseListener(new MouseListener(){
            @Override
            public void mouseClicked(MouseEvent e) {
                button.setBackground(Color.green);                
            }
            @Override
            public void mousePressed(MouseEvent e) {
                button.setBackground(Color.red);
            }
            @Override
            public void mouseReleased(MouseEvent e) {
                button.setBackground(Color.orange);
                button.setText("Color naranja");
            }
            @Override
            public void mouseEntered(MouseEvent e) {
                button.setBackground(Color.black);
            }
            @Override
            public void mouseExited(MouseEvent e) {
                button.setBackground(Color.white);
            }            
        });
    }</code></pre>

<p>MouseMotionListener</p>

<p>MouseDragged</p>

<p>Detecta el movimiento del rat&oacute;n pulsado sobre el &aacute;rea del bot&oacute;n.</p>

<p>MouseMoved</p>

<p>Detecta el movimiento sobre el &aacute;rea del bot&oacute;n.</p>

<pre>
<code class="language-java">private void actionMouse(){
        button.addMouseMotionListener(new MouseMotionListener(){
            @Override
            public void mouseDragged(MouseEvent e) {
                button.setBackground(Color.pink);                
            }
            @Override
            public void mouseMoved(MouseEvent e) {
                button.setBackground(Color.red);                
            }            
        });
    }</code></pre>

<p>MouseWheelListener</p>

<p>MouseWheelMoved</p>

<p>Detecta el movimiento de la rueda del rat&oacute;n.</p>

<pre>
<code class="language-java">private void actionMouse(){
        button.addMouseWheelListener(new MouseWheelListener(){
            @Override
            public void mouseWheelMoved(MouseWheelEvent e) {
                button.setBackground(Color.DARK_GRAY);
                button.setForeground(Color.white);
            }                  
        });
    }</code></pre>

<p><strong>ActionListener</strong></p>

<p>ActionPerformed</p>

<p>Detecta alguna acci&oacute;n que ocurre en alg&uacute;n elemento como pulsar un bot&oacute;n, pulsar Enter en una caja de texto o desplegar un men&uacute;.</p>

<pre>
<code class="language-java">private void action(){
        button.addActionListener(new ActionListener(){
            @Override
            public void actionPerformed(ActionEvent e) {
                System.out.print(e);
                button.setBackground(Color.red);
            }                              
        });
    }</code></pre>

<p>KeyListener</p>

<p>keyTyped</p>

<p>Detecta que una tecla ha sido pulsada, si existe la misma acci&oacute;n que keyPressed la sobreescribe.</p>

<p>keyPressed</p>

<p>Detecta una tecla presionada.</p>

<p>keyReleased</p>

<p>Detecta una tecla soltada.</p>

<pre>
<code class="language-java">private void action(){
        button.addKeyListener(new KeyListener(){
            @Override
            public void keyTyped(KeyEvent e) {
                button.setText("click");
                button.setBackground(Color.white);
            }
            @Override
            public void keyPressed(KeyEvent e) {
                button.setText("tecla presionada");
            }
            @Override
            public void keyReleased(KeyEvent e) {
                button.setText("tecla soltada");
            }            
        });
    }</code></pre>

<p>Lista orientativa de componentes Swing y listeners recomendables.</p>

<p><a href="https://docs.oracle.com/javase/tutorial/uiswing/events/eventsandcomponents.html" target="_blank">Tabla Listener Swing</a></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/CcAsphdTcIC7u9G9TvyTTLK3Ph1uqQfKnPGYlQRY.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);
        //86
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Componentes Swing',
            'slug' => 'componentes-swing',
            'body_main' => 'Componentes de la librería Swing',
            'body_plus' => '<p>A continuaci&oacute;n se listan distintos ejemplos de la implementaci&oacute;n de algunos de los componentes de Swing m&aacute;s utilizados.</p>

<p><strong>JTextField</strong></p>

<p>Caja de texto b&aacute;sica, equivalente a input text en PHP.</p>

<pre>
<code class="language-java">JTextField input;
private void inputText(){
    input = new JTextField();
    input.setBounds(10,10,200,50);
    panel.add(input);
}</code></pre>

<p><strong>JRadioButton</strong></p>

<p>Radiobot&oacute;n es una caja de marcado similar al JCheckBox pero que suele permitir una sola opci&oacute;n marcada, equivalente a input radio en PHP.</p>

<pre>
<code class="language-java">JRadioButton radioH;
JRadioButton radioM;
private void inputRadio("H"){
    radioH = new JRadioButton();
    radioH.setBounds(10,10,200,50);
    radioH.setSelected(true);
    panel.add(radioH);
    radioM = new JRadioButton();
    radioM.setBounds(10,100,200,50);
    panel.add(radioM);
}</code></pre>

<p>Para poder elegir solo una opci&oacute;n es necesario a&ntilde;adirlo manualmente mediante ActionListener (como se realiza en el c&oacute;digo siguiente) o mediante un grupo de botones (como se realiza en el c&oacute;digo de ejemplo final del JMenu) permitiendo desactivar las opciones que pudieran encontrarse ya marcadas.</p>

<pre>
<code class="language-java">JRadioButton radioH;
JRadioButton radioM;
private void inputRadio("H"){
    radioH = new JRadioButton();
    radioH.setBounds(10,10,200,50);
    radioH.setSelected(true);
    panel.add(radioH);
    radioM = new JRadioButton();
    radioM.setBounds(10,100,200,50);
    panel.add(radioM);
    radioH.addActionListener(new ActionListener() {
        public void actionPerformed(ActionEvent e) {
            if(radioH.isSelected())
            {
                radioM.setSelected(false);
            }   
        }
    });
    radioM.addActionListener(new ActionListener() {
        public void actionPerformed(ActionEvent e)
        {
            if(radioM.isSelected())
            {
                radioH.setSelected(false);
            }
        }
    });
}</code></pre>

<p>Tambi&eacute;n puede ser &uacute;til restringir la opci&oacute;n de desmarcar las opciones. Para ello es suficiente con a&ntilde;adir un else a los ActionListener, de esta forma se sigue mateniendo siempre marcada&nbsp;la opci&oacute;n seleccionada.</p>

<pre>
<code class="language-java">radioH.addActionListener(new ActionListener() {
        public void actionPerformed(ActionEvent e) {
            if(radioH.isSelected())
            {
                radioM.setSelected(false);
            }else{
                radioH.setSelected(true);
            }
        }
    });
    radioM.addActionListener(new ActionListener() {
        public void actionPerformed(ActionEvent e)
        {
            if(radioM.isSelected())
            {
                radioH.setSelected(false);
            }else{
                radioM.isSelected(true);
            }
        }
    });
}</code></pre>

<p><strong>JCheckBox</strong></p>

<p>Cajas de marcado, equivalente a un input checkbox en PHP.</p>

<pre>
<code class="language-java">private void checkBox()
{
    caja1 = new JCheckBox("USB");
    caja1.setBounds(10,10,240,50);
    this.add(caja1);
    caja2 = new JCheckBox("TV LCD");
    caja2.setBounds(10,110,240,50);
    this.add(caja2);
    caja3 = new JCheckBox("Cepillo eléctrico");
    caja3.setBounds(10,210,240,50);
    this.add(caja3);
}
</code></pre>

<p><strong>JTextArea</strong></p>

<p>Caja de texto con opci&oacute;n de scroll, equivalente a textarea en PHP.</p>

<pre>
<code class="language-java">private void textArea()
    {
        JTextArea text = new JTextArea();
        text.setEditable(true);
        text.setBounds(10,10,620,360);
        this.add(text);
        
        //opción básica
        /*JScrollPane jsp = new JScrollPane(text);
        jsp.setBounds(10,10,620,360);
        jsp.setHorizontalScrollBarPolicy(ScrollPaneConstants.HORIZONTAL_SCROLLBAR_AS_NEEDED);
        jsp.setVerticalScrollBarPolicy(ScrollPaneConstants.VERTICAL_SCROLLBAR_AS_NEEDED);        
        this.add(jsp);*/
        //opción simplificada        
        JScrollPane jsp = new JScrollPane(text, ScrollPaneConstants.VERTICAL_SCROLLBAR_AS_NEEDED, ScrollPaneConstants.HORIZONTAL_SCROLLBAR_AS_NEEDED);
        jsp.setBounds(10,10,620,360);
        this.add(jsp);        
        
        JButton boton = new JButton("Coger el contenido");
        boton.setBounds(10,400,620,50);
        this.add(boton);
        
        boton.addActionListener(new ActionListener() {
            public void actionPerformed(ActionEvent e)
            {
                String s = "";
                s += text.getText();                    
                System.out.println(s);
            }
        });
    }</code></pre>

<p><strong>JComboBox</strong></p>

<p>Men&uacute; desplegable , equivalente a un select en PHP</p>

<pre>
<code class="language-java">public void comboBox()
{
    String elementos[]={"USB","TV LCD","Cepillo eléctrico","Batidora","Exprimidor","Secador","Altavoces"};
    JComboBox combo = new JComboBox(elementos);                
    combo.setBounds(10,10,620,50);        
    this.add(combo);
      
    JButton boton = new JButton("Mostrar selección");        
    boton.setBounds(10,100,300,50);
    this.add(boton);
        
    boton.addActionListener(new ActionListener() {
        public void actionPerformed(ActionEvent e)
        {
            System.out.println(combo.getSelectedItem());
        }
    });
}</code></pre>

<p><strong>JPasswordField</strong></p>

<p>Caja de texto oculto, equivalente a un input&nbsp; hidden en PHP.</p>

<pre>
<code class="language-java">public void passwordField()
{
    JPasswordField pass = new JPasswordField();
    pass.setBounds(10, 10,620,50);
    this.add(pass);
    JButton boton= new JButton("Ver contenido del JComboBox");
    boton.setBounds(10,100,200,50);
    this.add(boton);
        
    boton.addActionListener(new ActionListener() {            
        @Override
        public void actionPerformed(ActionEvent e)
        {   
            System.out.println(pass.getPassword());
        }
    });
}</code></pre>

<p><strong>JMenuBar</strong></p>

<p>Barra de men&uacute; que permite incorporar elementos, normalmente men&uacute;s desplegables, presente en la mayor&iacute;a de programas, generalmente de forma fija y el parte superior de la ventana.</p>

<pre>
<code class="language-java">JMenuBar menubar = new JMenuBar();
this.setJMenuBar(menubar);
</code></pre>

<p><strong>JMenu</strong></p>

<p>Bot&oacute;n integrado en la barra de men&uacute; que permite desplegar un elemento o conjunto de elementos denominados items.</p>

<pre>
<code class="language-java">JMenu menu = new JMenu("Menu");
menubar.add(menu);</code></pre>

<p><strong>JMenuItem</strong></p>

<p>Un item es uno de los elementos que componen un men&uacute;, similar a un bot&oacute;n, que permiten realizar una acci&oacute;n, normalmente una opci&oacute;n o funci&oacute;n del programa.</p>

<pre>
<code class="language-java">JMenuItem itemArchivo = new JMenuItem("Archivo");
menu.add(itemArchivo);</code></pre>

<p>A continuaci&oacute;n un ejemplo de una barra de men&uacute; b&aacute;sica que contiene distintos tipos de items.</p>

<pre>
<code class="language-java">package cartelera;
import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.BoxLayout;
import javax.swing.ButtonGroup;
import javax.swing.JCheckBoxMenuItem;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JPanel;
import javax.swing.JRadioButtonMenuItem;
public class menu extends JFrame {
    
    private JPanel panel;
    private int size_x = 480, size_y = 640;
    
    public menu(){
        this.setTitle("Cartelera de cine");
        this.setSize(size_x,size_y);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);        
        initComponents();
    }
    
    public void initComponents(){
        
        //barra de menú
        JMenuBar menubar = new JMenuBar();
        this.setJMenuBar(menubar);
        //menu 1
        JMenu menu = new JMenu("Menu");
        menubar.add(menu);
        //item de menu 1
        JMenuItem itemArchivo = new JMenuItem("Archivo");
        menu.add(itemArchivo);
        //separador
        menu.addSeparator();
        //item de menu 1
        JMenuItem itemSalir = new JMenuItem("Salir");
        menu.add(itemSalir);
        
        itemSalir.addActionListener(new ActionListener(){
            @Override
            public void actionPerformed(ActionEvent e) {
                System.exit(0);
            }
        });
        //menu 2
        JMenu menu2 = new JMenu("Menú 2");
        //submenu
        JMenu submenu = new JMenu("Submenú");
        menu2.add(submenu);
        //items
        JMenuItem item = new JMenuItem("item1");
        JMenuItem item2 = new JMenuItem("item2");
        //check items
        JCheckBoxMenuItem item3 = new JCheckBoxMenuItem("item3-check");
        //radio items
        JRadioButtonMenuItem item4 = new JRadioButtonMenuItem("item4-radio");
        JRadioButtonMenuItem item5 = new JRadioButtonMenuItem("item5-radio");
        ButtonGroup grupo = new ButtonGroup();
        grupo.add(item4);
        grupo.add(item5);        
        submenu.add(item);
        submenu.add(item2);        
        submenu.add(item3);        
        submenu.add(item4);
        //separador
        submenu.addSeparator();
        submenu.add(item5);        
        menubar.add(menu2);
        //panel
        panel = new JPanel();
        panel.setBackground(Color.white);
        panel.setLayout(new BoxLayout(panel,BoxLayout.Y_AXIS));        
        this.add(panel);
    }
    
    public static void main(String[] args) {
        menu c = new menu();
        c.setVisible(true);
    }    
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ayAwIYqz9lS3E0U269bqAIzS0DOffrPEuJFgTFDM.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);
        //87
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Dibujar y pintar en Java',
            'slug' => 'dibujar-y-pintar-en-java',
            'body_main' => 'Dibujar y pintar con paintComponent',
            'body_plus' => '<p>El m&eacute;todo&nbsp;<strong>paintComponent</strong>&nbsp;es el m&eacute;todo utilizado por Java para dibujar y pintar los componentes de un panel o de una ventana con Swing. Este m&eacute;todo tambi&eacute;n es posible llamarlo manualmente mediante el uso del m&eacute;todo repaint() permitiendo realizar un redibujado o repintado en la pantalla. Adem&aacute;s de esto, dispone de m&eacute;todos que permiten dibujar o pintar l&iacute;neas o figuras como pueden ser cuadrados, c&iacute;rculos, pol&iacute;gonos, etc...</p>

<p>Para poder implementarlo es necesario sobreescribirlo aportando los m&eacute;todos y los datos necesarios para realizar el dibujado o pintado. El m&eacute;todo paintComponent requiere de un argumento de tipo Graphics, que a su vez, debe ser convertido a tipo Graphics2D para poder realizar este dibujado.</p>

<p>Para entender mejor el funcionamiento, el siguiente c&oacute;digo muestra un ejemplo de una clase llamada Dibujo que llama a la clase&nbsp;<strong>Draw()</strong>&nbsp;que es la encargada de incorporar los distintos m&eacute;todos en el proceso de dibujado y/o pintado.&nbsp;</p>

<pre>
<code class="language-java">package dibujo;
import javax.swing.JFrame;
public class Dibujo extends JFrame {    
    private Draw draw;
    private int sizeX = 600, sizeY = 600 + 40;
    
    public Dibujo() {
        this.setSize(sizeX,sizeY);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
        //quitar margen de ventana
        //this.setUndecorated(true);        
        draw = new Draw();
        draw.setBounds(0,0,sizeX,sizeY);
        this.add(draw);        
    }
    
    public static void main(String[] args) {
        Dibujo dibujo= new Dibujo();
        dibujo.setVisible(true);
    }
}
</code></pre>

<p>A continuaci&oacute;n la clase&nbsp;<strong>Draw()</strong>&nbsp;implementando algunas de las distintas opciones para dibujar o pintar que permite Java mediante el m&eacute;todo&nbsp;<strong>paintComponent()</strong>&nbsp;.</p>

<p><strong>L&Iacute;NEAS</strong></p>

<p>Para dibujar l&iacute;neas solamente es necesario indicar las coordenadas (x,y) de inicio de l&iacute;nea y las coordenadas (x,y)de fin de l&iacute;nea.&nbsp;</p>

<p><strong>L&Iacute;NEAS con Line2D</strong></p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Line2D;
import javax.swing.JPanel;
public class Draw extends JPanel {
    private Line2D.Float linea = new Line2D.Float(0, 0, 600, 600);
    private Line2D.Float linea2 = new Line2D.Float(0,600,600,0);
    @Override
    public void paintComponent(Graphics g)
    {
        Graphics2D g2d = (Graphics2D) g;
        g2d.setBackground(Color.yellow);
        g2d.draw(linea);
        g2d.draw(linea2);
    }
}</code></pre>

<p><strong>L&Iacute;NEAS con drawLine()</strong></p>

<pre>
<code class="language-java">@Override
public void paintComponent(Graphics g)
{
    Graphics2D g2d = (Graphics2D) g;
    g2d.drawLine(0, 600, 600, 0);
}</code></pre>

<p><strong>ELIPSES</strong></p>

<p>Seg&uacute;n su definici&oacute;n la elipse es el lugar geom&eacute;trico de los puntos del plano cuya suma de las distancias a dos puntos fijos, llamados focos es constante.&nbsp;De forma simple una elipse es una forma geom&eacute;trica similar a un c&iacute;rculo pero que mantiene una forma ovalada. Para crear una elipse, de igual forma que la l&iacute;nea, es necesario indicar las coordenadas del inicio y del final, teniendo en cuenta que &eacute;stas se manejan como si un rect&aacute;ngulo se trazara sobre los puntos m&aacute;s alejados del centro de la elipse.</p>

<p><strong>ELIPSE con Ellipse2D</strong></p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Ellipse2D;
import javax.swing.JPanel;
public class Draw extends JPanel {
    private Ellipse2D.Float elipse = new Ellipse2D.Float(0,0,400,200);
    @Override
    public void paintComponent(Graphics g)
    {
        Graphics2D g2d = (Graphics2D) g;
        g2d.setColor(Color.yellow);
        g2d.draw(elipse);
        g2d.setColor(Color.red);
        g2d.fill(elipse);  
    }
}</code></pre>

<p><strong>ELIPSE con drawOval()</strong></p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
public class Draw extends JPanel {    
    @Override
    public void paintComponent(Graphics g)
    {
        Graphics2D g2d = (Graphics2D) g;
        g2d.setColor(Color.yellow);
        g2d.drawOval(100, 100, 200, 400);
        g2d.setColor(Color.red);
        g2d.fillOval(100, 100, 200, 400);  
    }
}</code></pre>

<p><strong>C&Iacute;RCULOS</strong>&nbsp;</p>

<p>Un c&iacute;rculo es una elipse con la particularidad adicional de que mantiene la misma distancia desde cualquier punto que delimita dicha elipse respecto a su radio. Por tanto de la misma forma que se crea una&nbsp; elipse se crea un c&iacute;rculo, la &uacute;nica diferencia son las coordenadas dadas.</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Ellipse2D;
import javax.swing.JPanel;
public class Draw extends JPanel {
    private Ellipse2D.Float elipse = new Ellipse2D.Float(0,0,400,400);
    @Override
    public void paintComponent(Graphics g)
    {
        Graphics2D g2d = (Graphics2D) g;
        g2d.setColor(Color.yellow);
        g2d.draw(elipse);    
    }
}</code></pre>

<p><strong>RECT&Aacute;NGULOS</strong></p>

<p>Un rect&aacute;ngulo es una forma geom&eacute;trica formada por cuatro &aacute;ngulos de 90 grados y que la distancia de un lado debe ser la misma que la del lado opuesto.</p>

<p>RECT&Aacute;NGULOS con Rectangle2D()</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
public class Draw extends JPanel {
    private Rectangle2D.Float rectangulo = new Rectangle2D.Float(100,20,300,500);
    @Override
    public void paintComponent(Graphics g)
    {
        Graphics2D g2d = (Graphics2D) g;
        g2d.setColor(Color.MAGENTA);
        g2d.fill(rectangulo);
        g2d.setColor(Color.BLUE);
        g2d.draw(rectangulo);   
    }
}</code></pre>

<p>RECT&Aacute;NGULOS con drawRect()</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
public class Draw extends JPanel {
    
    @Override
    public void paintComponent(Graphics g)
    {
        Graphics2D g2d = (Graphics2D) g;
        g2d.setColor(Color.BLUE);
        g2d.fillRect(0, 300, 300, 300);
        g2d.setColor(Color.MAGENTA);
        g2d.drawRect(100, 100, 300, 500);   
    }
}</code></pre>

<p>CUADRADO</p>

<p>El cuadrado es un rect&aacute;ngulo con la caracter&iacute;stica a&ntilde;adida de que todos los lados son iguales.</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.Rectangle2D;
import javax.swing.JPanel;
public class Draw extends JPanel {
    private Rectangle2D.Float rectangulo = new Rectangle2D.Float(20,20,100,100);
    @Override
    public void paintComponent(Graphics g)
    {
        Graphics2D g2d = (Graphics2D) g;
        g2d.setColor(Color.MAGENTA);
        g2d.fill(rectangulo);
        g2d.setColor(Color.BLUE);
        g2d.draw(rectangulo);   
    }
}</code></pre>

<p><strong>POL&Iacute;GONOS</strong></p>

<p>Para dibujar o pintar&nbsp;<strong>pol&iacute;gonos</strong>&nbsp;con paintComponent es necesario indicar los puntos de intersecci&oacute;n mediante dos arrays, un array que representa el eje de coordenadas&nbsp;<strong>x</strong>&nbsp;y otro array el eje de coordenadas&nbsp;<strong>y</strong>.&nbsp; El orden de los elementos de cada array deben ser coincidentes y tambi&eacute;n corresponder&aacute; al recorrido que realizar&aacute; el trazo en proceso de dibujado.</p>

<p>TRI&Aacute;NGULO con Polygon</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Polygon;
import javax.swing.JPanel;
public class Draw extends JPanel {
    private int x[] = {300,0,600,300};
    private int y[] = {0,600,600,0};
    private Polygon triangulo = new Polygon(x2,y2,3)
    @Override
    public void paintComponent(Graphics g)
    {
        
        Graphics2D g2d = (Graphics2D) g;
        g2d.setColor(Color.red);
        g2d.draw(triangulo);
    }
}</code></pre>

<p>TRI&Aacute;NGULO con drawPolygon</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
public class Draw extends JPanel {    
    @Override
    public void paintComponent(Graphics g)
    {        
        Graphics2D g2d = (Graphics2D) g;
        int x[] = {300,0,600};
        int y[] = {0, 600,600};
        g2d.fillPolygon(x,y,3);
        g2d.setColor(Color.red);
        g2d.drawPolygon(x,y,3);
    }
}</code></pre>

<p>TRI&Aacute;NGULO con drawPolyline</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
public class Draw extends JPanel {    
    @Override
    public void paintComponent(Graphics g)
    {        
        Graphics2D g2d = (Graphics2D) g;
        int x[] = {300,0,600,300};
        int y[] = {0, 600,600,0};
        g2d.fillPolygon(x,y,4);
        g2d.setColor(Color.red);
        g2d.drawPolygon(x,y,4);
    }
}</code></pre>

<p>La diferencia entre drawPolygon y drawPolyline es que drawPolygon incluye&nbsp;autom&aacute;ticamente&nbsp;una &uacute;ltima coordenada igual a la primera para cerrar el pol&iacute;gono mientras que drawPolyline permite&nbsp;trabajar con pol&iacute;gonos abiertos y, por tanto, es necesario incluir en el array la coordenada de cierre.</p>

<p>ESTRELLAS</p>

<p>ESTRELLA (5 puntas)</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
public class Draw extends JPanel {    
    @Override
    public void paintComponent(Graphics g)
    {        
        Graphics2D g2d = (Graphics2D) g;
        int x[] = {300,0,600,0,450,300};
        int y[] = {0,600,200,200,600,0};
        g2d.fillPolygon(x,y,5);
        g2d.setColor(Color.red);
        g2d.drawPolygon(x,y,5);
    }
}</code></pre>

<p>ESTRELLA (6 puntas)</p>

<pre>
<code class="language-java">package dibujo;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import javax.swing.JPanel;
public class Draw extends JPanel {    
    @Override
    public void paintComponent(Graphics g)
    {        
        Graphics2D g2d = (Graphics2D) g;
        int x[] = {300,0, 600};
        int y[] = {0,450,450};
        g2d.fillPolygon(x,y,3);
        int x2[] = {0,300,600};
        int y2[] = {150,600,150};
        g2d.fillPolygon(x2,y2,3);
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/OX97LUxxR9dRSSjAqPjYczUAn5ZzKVElTmsXWKff.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);
        //88
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Objetos en Java',
            'slug' => 'objetos-en-java',
            'body_main' => 'Crear un objeto en Java',
            'body_plus' => '<p>El primer requisito para poder crear un objeto es que exista una clase definida. Al igual que otros lenguajes, Java dispone de la palabra reservada new para crear un objeto. Instanciado el objeto es posible acceder a sus m&eacute;todos y a sus propiedades.</p>

<pre>

&nbsp;</pre>

<pre>
<code class="language-java">package miclase;

public class MiClase{

int numero = 2;

boolean sesion=true;

public void cambiar(){

numero = 10;

}

public static void main(String[] args){

MiClase miclase = new MiClase();

System.out.println(miclase.numero);

miclase.cambiar();

System.out.println("Con el método cambiar del objeto miclase modifico el número");

System.out.println(miclase.numero);

}

}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/5bg3cZzB64PGBTlHYc5NFBPAUoSfCeoa9c395jCy.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);
        //89
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Sobrecarga de métodos',
            'slug' => 'sobrecarga-de-metodos',
            'body_main' => 'Sobrecarga de métodos en Java',
            'body_plus' => '<p>SOBRECARGA</p>

<p>Se denomina sobrecarga en Java al m&eacute;todo duplicado en una clase, distinguidos mediante los par&aacute;metros incluidos. Es decir, son m&eacute;todos que&nbsp;comparten el mismo nombre pero&nbsp;pueden realizar procesos distintos y que Java los identifica entre s&iacute; por el tipo de par&aacute;metro o por la cantidad de par&aacute;metros que incluye dicho m&eacute;todo.</p>

<pre>
<code class="language-java">package miclase;
public class MiClase{
    int numero = 2;
    String cadena;
    public void cambiar(){
        numero = 10;
    }
    public void cambiar(String nombre){
        cadena="Hola "+nombre;
    }
    public void cambiar(int num){
        numero = numero + num;
    }
    public void cambiar(int num,int num2){
        numero = numero + num+num2;
    }
    public static void main(String[] args){
        MiClase miclase = new MiClase();
        System.out.println(miclase.numero);
        miclase.cambiar(20,10);
        System.out.println("Java identifica el método por la cantidad de parámetros dados");
        System.out.println(miclase.numero);
        miclase.cambiar("Jose");
        System.out.println(miclase.cadena);
    }
}</code></pre>

<p>CONSTRUCTOR</p>

<p>El m&eacute;todo constructor es un m&eacute;todo inicializador que se ejecuta cada vez que se crea un objeto y es donde se deben asignar todos los valores iniciales. En Java es necesario que el constructor coincida con el nombre de la clase, y como cualquier otro m&eacute;todo,&nbsp;admite la sobrecarga permitiendo que una clase contenga m&aacute;s de un constructor.</p>

<pre>
<code class="language-java">package miclase;
public class MiClase{
    int numero;
    String nombre;
    
    public MiClase(){
        numero = 10;
        nombre = "Jose";
    }
    public MiClase(String cadena){
        nombre = cadena;
    }    
    public static void main(String[] args) {
        MiClase miclase = new MiClase("María");
        System.out.println(miclase.nombre);        
    }
}</code></pre>

<p>HERENCIA</p>

<p>Java soporta herencia, concretamente herencia simple&nbsp; &nbsp;que permite que una clase denominada&nbsp;<strong>hijo</strong>&nbsp;extienda de otra clase denominada&nbsp;<strong>padre</strong>. Para ello, es necesario indicar a continuaci&oacute;n de&nbsp;la palabra reservada&nbsp;<strong>extends,</strong>&nbsp;el nombre de la clase de la que va a heredar y as&iacute; cualquier otra clase disponer de las propiedades y m&eacute;todos de esta clase. Por defecto la clase hijo toma el constructor del padre si no dispone de uno propio.</p>

<p><strong>clase Padre</strong></p>

<pre>
<code class="language-java">package miclase;
public class MiClase{
    int numero;
    String nombre;    
    public MiClase(){
        numero = 10;
    }
    
    public static void main(String[] args) {
        Hija hija = new Hija();
        System.out.println(hija.numero);
        Hijo hijo = new Hijo();
        System.out.println(hijo.numero);        
    }
}</code></pre>

<p><strong>clase Hijo</strong></p>

<pre>
<code class="language-java">package miclase;
public class Hija extends MiClase {
    
    String cadena;        
}</code></pre>

<p><strong>clase Hijo</strong></p>

<pre>
<code class="language-java">package miclase;
public class Hijo extends MiClase {
    int numero = 100;
}</code></pre>

<p>POLIMORFISMO</p>

<p>El polimorfismo en Java indica que un mismo m&eacute;todo puede tener distintos comportamientos seg&uacute;n la clase desde la que es llamado. Para poder entenderlo mejor y manteniendo la estructura del ejemplo anterior es necesario analizar el siguiente c&oacute;digo.</p>

<p>La clase MiClase (clase padre) es una clase abstracta que debe estar compuesta por lo menos por un m&eacute;todo abstracto obligando a toda clase que extienda de ella a incluir ese m&eacute;todo.</p>

<p>clase padre</p>

<pre>
<code class="language-java">package miclase;
public abstract class MiClase {
    
    int numero;
    String cadena;
    
    public abstract void metodoAbstracto();
    
    public static void main(String[] args) {
        Hijo hijo = new Hijo();
        Hija hija = new Hija();
        
        hijo.metodoAbstracto();
        hija.metodoAbstracto();
    }
}</code></pre>

<p>Esta clase abstracta permite&nbsp;a sus clases hijas&nbsp;definir la funcionalidad de dicho m&eacute;todo.&nbsp;</p>

<p>clase hijo</p>

<pre>
<code class="language-java">package miclase;
public class Hijo extends MiClase {
    
    @Override
    public void metodoAbstracto(){
        System.out.println("método desde Hijo");
    }
}
</code></pre>

<p>clase hija&nbsp;</p>

<pre>
<code class="language-java">package miclase;
public class Hija extends MiClase {
    
    @Override
    public void metodoAbstracto(){
        System.out.println("método desde Hija");
    }        
}</code></pre>

<p>STATIC</p>

<p>Definir una variable como est&aacute;tica permite acceder a esa variable sin necesidad de crear un objeto.</p>

<pre>
<code class="language-java">package miclase;
public abstract class MiClase {
        
    static String cadena;
    
    public static void main(String[] args) {        
        System.out.println(MiClase.cadena);        
    }
}</code></pre>

<p>FINAL</p>

<p>La palabra final es el equivalente a una constante (const) en PHP, es decir, indica que una variable no puede ser modificada.</p>

<pre>
<code class="language-java">final int numero = 10;
</code></pre>

<p>CASTING</p>

<pre>
<code class="language-java">package miclase;
public abstract class MiClase {
    
    public static void main(String[] args) {        
        double num = 10000.00000;
        int numI = (int) num;
        System.out.println(numI);        
    }
}</code></pre>

<p>JDBC</p>

<p>JDBC&nbsp;es considerado un tipo de conexi&oacute;n en Java. Para poder utilizarlo es necesario descargarlo desde la&nbsp;<a href="https://www.mysql.com/products/connector/" target="_blank">p&aacute;gina oficial de&nbsp;</a><a href="https://www.mysql.com/products/connector/" target="_blank">MySQL</a>&nbsp;para despu&eacute;s desde el propio&nbsp;IDE&nbsp;importarlo&nbsp; al proyecto.&nbsp;</p>

<p>SONIDOS</p>

<p>Java dispone de la clase&nbsp;AudioSystem&nbsp;que permite trabajar con archivos de audio. A continuaci&oacute;n un ejemplo b&aacute;sico de la reproducci&oacute;n de un sonido.&nbsp;</p>

<pre>
<code class="language-java">package Multimedia;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.IOException;
import javax.sound.sampled.AudioSystem;
import javax.sound.sampled.Clip;
import javax.sound.sampled.LineUnavailableException;
import javax.sound.sampled.UnsupportedAudioFileException;
import javax.swing.BoxLayout;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JPanel;
public class Sonido implements ActionListener{
    JFrame ventana;
    JPanel panel;
    JButton botonPlay;
    Clip sonido;
    
    public Sonido(){
        addPanel();
        addFrame();
    }
    
    public void addPanel(){
        panel = new JPanel();
        panel.setSize(120,120);
        panel.setLayout(new BoxLayout(panel,BoxLayout.X_AXIS));
        botonPlay = new JButton();
        botonPlay.setSize(100,100);
        botonPlay.setText("Play");
        panel.add(botonPlay);
    }    
    public void addFrame(){
        ventana = new JFrame();
        ventana.setLayout(new BoxLayout(ventana.getContentPane(),BoxLayout.Y_AXIS));
        ventana.setTitle("Ventana");
        ventana.setSize(600,600);
        botonPlay.addActionListener(this);
        ventana.add(panel);
        ventana.setDefaultCloseOperation(ventana.EXIT_ON_CLOSE);
        ventana.setVisible(true);        
    }
    
    public void actionPerformed(ActionEvent e){
        if(e.getSource()==botonPlay){
            try{
                playAudio();
            }catch(IOException | UnsupportedAudioFileException el){
                el.printStackTrace();
            }catch(InterruptedException el){
                el.printStackTrace();
            }
        }
    }
    
    public void playAudio() throws IOException, UnsupportedAudioFileException, InterruptedException{
        try{
            sonido = AudioSystem.getClip();
            File archivo = new File("sonido2.wav");
            sonido.open(AudioSystem.getAudioInputStream(archivo));
            sonido.start();
            Thread.sleep(1000);
            sonido.close();            
        }catch(LineUnavailableException ex){
            ex.printStackTrace();
        }
    }
    
    public static void main(String[] args) {
        Sonido ventana = new Sonido();
    }
}</code></pre>

<p><strong>DIBUJAR IM&Aacute;GENES&nbsp;</strong></p>

<p>Las im&aacute;genes pueden dibujarse sobreescribiendo el m&eacute;todo&nbsp;<strong>paintComponent()&nbsp;</strong>o el m&eacute;todo&nbsp;<strong>paint()</strong>. Seg&uacute;n si la clase extiende de un JFrame o un JPanel se sobreescribir&aacute; un m&eacute;todo u otro.</p>

<p><strong>paintComponent()</strong></p>

<p>El c&oacute;digo siguiente consta de una clase (Dibujar) que crea una ventana y a&ntilde;ade esta ventana un elemento de tipo Panel.</p>

<pre>
<code class="language-java">package Multimedia;
import java.awt.Toolkit;
import javax.swing.JFrame;
public class Dibujar extends JFrame{    
    Panel panel;    
    
    public Dibujar(){
        this.setTitle("Imagen");
        this.setSize(300,300);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
        panel= new Panel(); 
        this.add(panel);
    }
    
    public static void main(String[] args) {
        Dibujar ima = new Dibujar();
        ima.setVisible(true);        
    }
}</code></pre>

<p>La clase Panel que extiende de JPanel es la que junto a los m&eacute;todos de la clase Graphics2D sobreescribe el m&eacute;todo paintComponent() permitiendo dibujar la imagen.</p>

<pre>
<code class="language-java">package Multimedia;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.Toolkit;
import javax.swing.JPanel;
public class Panel extends JPanel{
    
    Toolkit toolkit = Toolkit.getDefaultToolkit();
    public Panel(){
        this.setBackground(Color.red);
        this.setSize(300,300);        
    }    
    @Override
    public void paintComponent(Graphics g){
        Graphics2D g2d = (Graphics2D) g;
        g2d.setBackground(Color.white);
        g2d.clearRect(0, 0, 300, 300);
        Image imagen = toolkit.getImage("angular_logo.png");
        g2d.drawImage(imagen,0,0,250,250,this);
    }
}</code></pre>

<p><strong>paint()</strong></p>

<p>El ejemplo siguiente es id&eacute;ntico al anterior pero realiz&aacute;ndose todo desde un mismo archivo, extendiendo solamente de la clase JFrame. Para sobreescribir desde el JFrame se llama al m&eacute;todo&nbsp;<strong>paint()</strong>&nbsp;de la misma forma que si fuera paintComponent().</p>

<pre>
<code class="language-java">package Multimedia;
import java.awt.Color;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.Toolkit;
import javax.swing.JFrame;
public class DrawImage extends JFrame{    
    JPanel panel;
    Toolkit toolkit = Toolkit.getDefaultToolkit();
    
    public DrawImage(){
        this.setTitle("Imagen");
        this.setSize(300,300);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
        panel= new JPanel(); 
        panel.setSize(300,300);
        panel.setBackground(Color.red);
        this.add(panel);        
    }  
    
    @Override
    public void paint(Graphics g){
        Graphics2D g2d = (Graphics2D) g;
        Image imagen = toolkit.getImage("angular_logo.png");
        g2d.drawImage(imagen,10,10,280,280,this);
    }
    
    public static void main(String[] args) {
        DrawImage ima = new DrawImage();
        ima.setVisible(true);        
    }
}</code></pre>

<p>Adem&aacute;s de dibujar la imagen es posible realizar algunas transformaciones a dicha imagen mediante la clase&nbsp;<strong>AffineTransform()</strong>.&nbsp;</p>

<pre>
<code class="language-java">package Multimedia;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.geom.AffineTransform;
import javax.swing.ImageIcon;
import javax.swing.JComponent;
import javax.swing.JFrame;
public class TransformImage {
    Dibujo draw;
    
    public TransformImage(){
        JFrame frame = new JFrame();
        draw=new DrawImg();
        frame.add(draw);
        frame.setSize(300,300);
        frame.setVisible(true);        
    }
    
    class DrawImg extends JComponent {
        @Override
        public void paint (Graphics g){
            Graphics2D g2d = (Graphics2D) g;
            AffineTransform at = new AffineTransform();            
            double x =120;
            double y =320;            
            at.translate(x,y);
            at.rotate(180);
            g2d.setTransform(at);
            g2d.drawImage(new ImageIcon("angular_logo.png").getImage(),at,this);
        }
    }
    
    public static void main(String[] args) {
        TransformImage edit = new TransformImage();
        
    }
}</code></pre>

<p>La acci&oacute;n de dibujar se lleva a cabo mediante la clase&nbsp;Graphics2D&nbsp;con su m&eacute;todo&nbsp;drawImage(), pero es importante destacar&nbsp;que mientras en los ejemplos anteriores se obtiene la imagen mediante la clase&nbsp;Image&nbsp;y se indica la ruta mediante clase&nbsp;Toolkit, en &eacute;ste, se realiza la conversi&oacute;n mediante la clase&nbsp;ImageIcon&nbsp;y su m&eacute;todo&nbsp;getImage().</p>

<p>ESCRIBIR ARCHIVOS&nbsp;</p>

<p>La clase&nbsp;BufferedWriter&nbsp;y la clase&nbsp;PrintWriter&nbsp;permiten la escritura de archivos. BufferedWriter es m&aacute;s eficiente mientras que PrintWriter tiene acceso a m&eacute;todos basados en print como println(). Los dos prescinden de la clase&nbsp;FileWriter&nbsp;para el proceso de escritura y los dos disponen de m&eacute;todos similares.</p>

<p>Para crear un archivo con&nbsp;PrintWriter&nbsp;son necesarios tres pasos. Un primer paso que consiste en abrir el archivo, un segundo paso basado en&nbsp;escribir los datos y el tercero y &uacute;ltimo que cierra el archivo.</p>

<p>El c&oacute;digo siguiente realiza este proceso de escritura de archivos mediante la clase PrintWriter. B&aacute;sicamente se basa en la creaci&oacute;n de un archivo (mediante la clase File), donde se escribe una l&iacute;nea con una cadena predefinida y otra l&iacute;nea con los datos introducidos en el campo de texto de la ventana. El proceso de escritura se genera&nbsp; mediante un evento que se activa cuando se pulsa el bot&oacute;n Guardar.</p>

<pre>
<code class="language-java">package Archivos;
import java.awt.BorderLayout;
import java.awt.Container;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JTextField;
public class writeFile extends JFrame implements ActionListener {
    
    JTextField inputText;
    File file;
    JButton button;
    
    public writeFile(){
        inputText = new JTextField("Escribir");
        button = new JButton("Guardar");
        add(inputText);
        add(button);
        button.addActionListener(this);        
        Container contenedor = getContentPane();        
        contenedor.add(inputText,BorderLayout.NORTH);        
        setSize(400,400);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setVisible(true);
    }    
    @Override
    public void actionPerformed(ActionEvent e) {
        String text = inputText.getText();
        if(e.getSource() == button){
            file = new File("archivo.txt");            
            try{
                FileWriter writer = new FileWriter(file);                
                PrintWriter printwriter = new PrintWriter(writer);
                printwriter.append("Hola");
                printwriter.println();
                printwriter.append(text);
                printwriter.close();
            }catch(Exception ex){
                ex.printStackTrace();
            }
        }
    }
    
    public static void main(String[] args){
        writeFile esc = new writeFile();        
    }
}</code></pre>

<p>El c&oacute;digo siguiente es similar al ejemplo anterior pero utilizando&nbsp;BufferedWriter, con la opci&oacute;n a&ntilde;adida de que en lugar de crear un archivo nuevo cada vez que se pulsa el bot&oacute;n Guardar, a&ntilde;ade datos a continuaci&oacute;n de los datos existentes sin sobrescribir el archivo y solo lo crea si no existe.</p>

<pre>
<code class="language-java">package Archivos;
import java.awt.BorderLayout;
import java.awt.Container;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JTextField;
public class writeFile extends JFrame implements ActionListener {
    
    JTextField inputText;
    File file;
    JButton button;
    
    public writeFile(){
        inputText = new JTextField("Escribir");
        button = new JButton("Guardar");
        add(inputText);
        add(button);
        button.addActionListener(this);        
        Container contenedor = getContentPane();        
        contenedor.add(inputText,BorderLayout.NORTH);        
        setSize(400,400);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setVisible(true);
    }    
    @Override
    public void actionPerformed(ActionEvent e) {
        String text = inputText.getText();
        if(e.getSource() == button){
            file = new File("archivo.txt");            
            try{
                BufferedWriter writer =new BufferedWriter(new FileWriter(file.getAbsoluteFile(),true));                
                writer.write("hola");
                writer.newLine();
                writer.write("otra línea");
                writer.newLine();
                writer.write(text);
                writer.flush();
            }catch(Exception ex){
                ex.printStackTrace();
            }
        }
    }
    
    public static void main(String[] args){
        writeFile esc = new writeFile();        
    }
}</code></pre>

<p>LEER ARCHIVOS</p>

<p>Para leer archivos Java dispone de la clase BufferedReader, que a diferencia de FileReader, permite leer l&iacute;nea por l&iacute;nea y devuelve null cuando finaliza la lectura.&nbsp; El&nbsp;c&oacute;digo que sigue a&nbsp;continuaci&oacute;n permite introducir la ruta de un archivo y mediante un evento identifica si los datos introducidos pertenecen a la ruta de un archivo o de un directorio. En caso de un directorio muestra en el textarea el contenido del directorio en forma de lista, mientras que en caso de un archivo realiza el proceso de escritura y muestra en el textarea el contenido del archivo.</p>

<pre>
<code class="language-java">package Archivos;
import java.awt.BorderLayout;
import java.awt.Container;
import java.awt.ScrollPane;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JTextArea;
import javax.swing.JTextField;
public class ReadFile extends JFrame implements ActionListener, MouseListener {
    JTextArea text;
    JTextField input;
    boolean focus;
    
    public ReadFile(){
        focus = false;
        input = new JTextField("Escribir la ruta del archivo");
        input.addActionListener(this);
        input.addMouseListener(this);
        
        text = new JTextArea();
        ScrollPane scroll = new ScrollPane();
        scroll.add(text);
        
        Container container = getContentPane();
        container.add(input,BorderLayout.NORTH);
        container.add(scroll, BorderLayout.CENTER);
        setSize(400,400);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
    }
    @Override
    public void actionPerformed(ActionEvent e) {
        File file = new File(e.getActionCommand());
        //File file2 = new File("archivo.txt");
        System.out.println(e.getActionCommand());
        if(file.exists()){
            text.setText("El dato "+file.getName()+ " existe en la ruta especificada\n");
            if(file.isFile()){
                text.append("Es un archivo\n");
                try{
                    BufferedReader read = new BufferedReader(new FileReader(file));                    
                    StringBuffer buffer = new StringBuffer();
                    String st;
                    text.append("\n");
                    while((st = read.readLine())!=null){
                        buffer.append(st+"\n");
                    }
                    text.append(buffer.toString());
                }catch(Exception ex){
                    JOptionPane.showMessageDialog(this, "ERROR LEYENDO ARCHIVO", "Error", JOptionPane.ERROR_MESSAGE);
                }
                
            }else{
                if(file.isDirectory()){
                    String dir[]=file.list();
                    text.append("Es un directorio \n");
                    text.append("El contenido a continuación en forma de lista \n");
                    for(int i=0;i&lt;dir.length;i++){                        
                        text.append(dir[i]+"\n");
                    }
                }
                
            }
        }
        
    }
    public static void main(String[] args) {
        ReadFile readfile = new ReadFile();
        readfile.setVisible(true);
    }
    @Override
    public void mouseClicked(MouseEvent e) {
        input.setText("");
    }
    @Override
    public void mousePressed(MouseEvent e) {
    }
    @Override
    public void mouseReleased(MouseEvent e) {
    }
    @Override
    public void mouseEntered(MouseEvent e) {        
    }
    @Override
    public void mouseExited(MouseEvent e) {     
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/WO0MKpBwCTI3J9fTkMru6Ic7Rw87TBKYzdUNpPV6.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //90
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Interfaz y clase abstracta',
            'slug' => 'interfaz-y-clase-abstracta',
            'body_main' => 'Diferencia entre clase, interfaz y clase abstracta',
            'body_plus' => '<p><strong>CLASE</strong></p>

<p><span style="font-size:18px">La clase debe estar definida por la palabra reservada class y est&aacute; compuesta por atributos, constructor y m&eacute;todos y se utiliza b&aacute;sicamente para crear un objeto.</span></p>



<pre>
<code class="language-java">public class MiClase {

int numero;

String dato;

public MiClase(){

}

public void metodoUno(){

System.out.println("método uno");

}

}</code></pre>

<p><strong>INTERFAZ</strong></p>

<p><span style="font-size:18px">La interfaz debe definirse con la palabra reservada </span><strong><span style="font-size:18px">interface </span></strong><span style="font-size:18px">y</span><span style="font-size:18px">&nbsp;difiere de la clase principalmente en que puede definir m&eacute;todos pero no pueden ser implementados, es decir, la interfaz puede contener m&eacute;todos pero &eacute;stos no pueden contener ninguna instrucci&oacute;n. Se usan generalmente para definir m&eacute;todos.</span></p>


<pre>
<code class="language-java">public interface MiInterfaz {

public void metodoUno();

public void metodoDos();

}</code></pre>

<p><strong>CLASE ABSTRACTA</strong></p>

<p><span style="font-size:18px">La clase abstracta requiere de al menos un m&eacute;todo definido como abstracto y, al igual que en la interfaz, tampoco puede ser implementado. La clase abstracta tiene la caracter&iacute;stica de que no se puede instanciar, es decir, no se pueden crear objetos a partir de ellas. Generalmente las clases abstractas se usan como clase padre.</span></p>

<pre>

&nbsp;</pre>

<pre>
<code class="language-java">public abstract class MiClaseAbstracta {

int numero;

public MiClaseAbstracta(){



}

public void metodoUno(){

}

public abstract void correr();

}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/BOsA8Vx5OamNi0Gn0m48yMH4m8uHZ3eSPkw7pIbw.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);
        //91
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Clases anidadas en Java',
            'slug' => 'clases-anidadas-en-java',
            'body_main' => 'Clase anidada miembro en Java',
            'body_plus' => '<p><span style="font-size:18px">Una clase anidada es una clase que se encuentra definida dentro de otra clase. Esta clase puede constituir un miembro de la clase que la contiene, tambi&eacute;n denominada como una clase anidada miembro.</span></p>

<pre>
&nbsp;</pre>

<pre>
<code class="language-java">package anidada;

public class Principal {

int numero;

String cadena;

Anidada anidada;

public Principal(){

anidada = new Anidada();

}

class Anidada{

int numeroAnidada;

String cadenaAnidada;

public Anidada(){

}

}

}</code></pre>

<p><span style="font-size:18px">Para poder acceder a esta clase anidada es necesario instanciar la clase principal. </span></p>

<p><span style="font-size:18px">Para entenderlo mejor el siguiente c&oacute;digo consiste en una clase Coche como clase principal y una clase Motor como clase anidada.</span></p>

<pre>

&nbsp;</pre>

<pre>
<code class="language-java">package anidada;

public class Coche {

boolean arrancado;

public Coche(){

arrancado = true;

}

public void pararCoche(){

arrancado = false;

}

//clase anidada

public class Motor{

public Motor(int dato){

System.out.println("El motor tiene "+dato+" caballos de potencia");

}

}

}</code></pre>

<p><span style="font-size:18px">Para crear un objeto de la clase Motor es necesario crear en primer lugar un objeto de la clase Coche y mediante ese objeto acceder a la clase Motor.</span></p>

<pre>
<code class="language-java">package anidada;

public class Main {

public static void main(String[] args){

Coche coche = new Coche();

coche.pararCoche();

Coche.Motor cocheMotor = coche.new Motor(100);

}

}</code></pre>

<p><strong><span style="font-size:18px">CONVERSI&Oacute;N IMPL&Iacute;CITA Y EXPL&Iacute;CITA</span></strong></p>

<p><span style="font-size:18px">Una conversi&oacute;n en Java consiste en convertir un tipo de dato en otro tipo de dato, es decir, convertir un tipo de dato entero en un decimal o un decimal en un entero se considera una conversi&oacute;n de tipos.</span></p>

<p><strong><span style="font-size:18px">CONVERSI&Oacute;N IMPL&Iacute;CITA</span></strong></p>

<p><span style="font-size:18px">Es la conversi&oacute;n en la que el tipo de dato final es de mayor capacidad que el dato a convertir, as&iacute; pues, un dato de tipo entero puede ser convertido a un dato de tipo flotante, ya que el flotante es de mayor capacidad. Las conversiones impl&iacute;citas se realizan autom&aacute;ticamente sin necesidad de a&ntilde;adir nada m&aacute;s.&nbsp;&nbsp;</span></p>

<pre>
<code class="language-java">int numeroInt = 10;

float numeroFloat = numeroInt;</code></pre>

<p><span style="font-size:18px">Esta conversi&oacute;n se puede realizar asignando el valor directamente o mediante operaciones como se observa en el c&oacute;digo siguiente.</span> &nbsp;</p>

<pre>
<code class="language-java">package implicita;

public class Conversion{

public static void main(String[] args){

float numerof;

int numeroInt = 100;

float numeroFloat = 100.1111f;

numerof = numeroInt + numeroFloat;

System.out.println(numerof);

}

}</code></pre>

<p><strong><span style="font-size:18px">CONVERSI&Oacute;N EXPL&Iacute;CITA</span></strong></p>

<p><span style="font-size:18px">Es la conversi&oacute;n en la que el tipo de dato final es de menor capacidad que el dato a convertir. Este tipo de conversi&oacute;n requiere un procedimiento especial denominado </span><strong><span style="font-size:18px">Casting. </span></strong><span style="font-size:18px">El casting puede ser &uacute;til en distintas situaciones pero debe manejarse con cuidado, ya que, puede conllevar a errores de compatibilidad o a la p&eacute;rdida parcial de la informaci&oacute;n de dicho dato.</span> &nbsp;</p>

<pre>
<code class="language-java">float numeroFloat = 100.1111f;

int numeroInt = (int) numeroFloat;</code></pre>

<p><span style="font-size:18px">El c&oacute;digo siguiente mantiene la misma operaci&oacute;n que en el c&oacute;digo de la conversi&oacute;n impl&iacute;cita pero a la inversa, es decir, la conversi&oacute;n se realiza a un entero. Esta conversi&oacute;n se realiza correctamente mediante el procedimiento (anteriormente mencionado) de casting, permitiendo resolver la operaci&oacute;n pero generando una p&eacute;rdida de informaci&oacute;n, ya que, el resultado de dicho casting&nbsp;conlleva perder la parte decimal.</span></p>

<pre>

&nbsp;</pre>

<pre>
<code class="language-java">package explicita;

public class Conversion{

public static void main(String[] args){

int numeroInt=10;

float numeroFloat=100.1111f;

int numeroI;

numeroI = numeroInt + (int)numeroFloat;

System.out.println(numeroI);

}

}</code></pre>

<p><span style="font-size:18px">Cabe resaltar que el denominado Casting puede generar errores con tipos de datos no compatibles, por ejemplo un tipo de dato int con uno de tipo string. Un caso de compatibilidad algo especial existe en el casting de tipo int a tipo char que se debe a que est&aacute; asociado a la tabla de c&oacute;digo ASCII.</span></p>

<pre>

&nbsp;</pre>

<pre>
<code class="language-java">package casting;

public class Conversion{

public static void main(String[] args){

char c;

int numeroI=100;

c = (char) numeroI;

System.out.println(c);

}

}</code></pre>

<p><strong><span style="font-size:18px">RECOLECCI&Oacute;N DE BASURA</span></strong></p>

<p><span style="font-size:18px">Es un sistema de Java que permite controlar los recursos de los objetos. Los objetos en Java pueden ser finalizados liberando recursos de memoria para que el sistema pueda disponer de ellos. Java permite eliminar un objeto mediante la asignaci&oacute;n de la palabra reservada null y dispone del m&eacute;todo especial finalize() que es llamado&nbsp;al finalizar un objeto permitiendo realizar alguna instrucci&oacute;n justo antes de eliminarlo.</span></p>

<pre>

&nbsp;</pre>

<pre>
<code class="language-java">package RecoleccionDeBasura;

public class MiClase {

int num;

public MiClase(){

System.out.println("Constructor");

}

protected void finalize(){

System.out.println("Final");

}

public static void main(String[] args) {

Object objeto = new Object();

objeto=null;

MiClase miclase = new MiClase();

miclase=null;

System.gc();

}

}</code></pre>

<p><span style="font-size:18px">La instrucci&oacute;n System.gc() permite comprobar si el m&eacute;todo finalize() est&aacute; funcionando. Si se prueba el c&oacute;digo anterior sin&nbsp; la llamada a este m&eacute;todo no mostrar&aacute; la cadena &quot;Final&quot;, no porque no se haya ejecutado, si no porque no da tiempo a mostrarse, por ello es conveniente a&ntilde;adirlo a continuaci&oacute;n de la eliminaci&oacute;n del objeto.</span></p>

<p><span style="color:#0000ff; font-size:18px">ARRAYLIST</span></p>

<p><span style="font-size:18px">La clase ArrayList permite agrupar elementos en forma de lista con la opci&oacute;n de poder acceder, insertar o eliminar elementos. Un ArrayList est&aacute; basado en tres posibles constructores:</span></p>

<p><span style="font-size:18px">ArrayList()</span></p>

<p><span style="font-size:18px">No incorpora ning&uacute;n par&aacute;metro, por tanto, no indica un tama&ntilde;o fijo.</span></p>

<p><span style="font-size:18px">ArrayList(int num);</span></p>

<p><span style="font-size:18px">Va acompa&ntilde;ado de un dato de tipo entero como par&aacute;metro que indica la cantidad de elementos.</span></p>

<p><span style="font-size:18px">ArrrayList(Collection c);</span></p>

<p><span style="font-size:18px">&nbsp;LLeva un dato de tipo Collection como par&aacute;metro que indica que es de tipo Collection.</span></p>

<p><span style="font-size:18px">Para a&ntilde;adir elementos al ArrayList se dispone del m&eacute;todo </span><strong><span style="font-size:18px">add</span></strong><span style="font-size:18px"> y para eliminar se dispone del m&eacute;todo </span><strong><span style="font-size:18px">remove</span></strong><span style="font-size:18px">, mientras que para asignar un elemento en una posici&oacute;n concreta se establece con el m&eacute;todo </span><strong><span style="font-size:18px">set</span></strong><span style="font-size:18px">.</span> &nbsp;</p>

<pre>
<code class="language-java">package arraylist;

import java.util.ArrayList;

public class ArrayLis {

public static void main(String[] args) {

ArrayList&lt;String&gt; array = new ArrayList&lt;String&gt;();

array.add("A");

array.add("B");

array.add("C");

array.add("D");

array.add("E");

array.remove("D");

array.set(0,"");

System.out.println(array);

}

}</code></pre>

<p><strong><span style="font-size:18px">CONVERTIR A CADENAS</span></strong></p>

<p><span style="font-size:18px">La clase String dispone de un m&eacute;todo est&aacute;tico que permite convertir cualquier dato en una cadena. Al&nbsp; ser est&aacute;tico tan solo es necesario llamarlo desde su clase sin necesidad de crear ning&uacute;n objeto y es capaz de convertir tipo de datos grandes como pueden ser double o long.</span></p>

<p>&nbsp;</p>

<pre>
<code class="language-java">package convertiracadena;

public class ACadena(){

double numeroDouble = 10.8888d;

String cadenaDouble = String.valueOf(numeroDouble);

long numeroLong =1000000;

String cadenaLong = String.valueOf(numeroLong);

boolean numeroBoolean = true;

String cadenaBoolean = String.valueOf(numeroBoolean);

}</code></pre>

<pre>

&nbsp;</pre>

<p>&nbsp;</p>

<p><strong><span style="font-size:18px">BUSCAR SUBCADENA EN UNA CADENA</span></strong></p>

<p><span style="font-size:18px">Para la b&uacute;squeda de una subcadena o un caracter en una cadena existen dos m&eacute;todos, el m&eacute;todo </span><strong><span style="font-size:18px">indexOf</span></strong><span style="font-size:18px"> y el m&eacute;todo </span><strong><span style="font-size:18px">lastIndexOf. </span></strong><span style="font-size:18px">Estos dos m&eacute;todos devuelven la posici&oacute;n de la primera coincidencia de la subcadena o patr&oacute;n indicado que existe en la cadena. El m&eacute;todo indexOf comienza la b&uacute;squeda recorriendo la cadena desde el principio y el m&eacute;todo lastIndexOf comienza la b&uacute;squeda recorriendo la cadena desde el final, en caso de no existir coincidencia alguna devuelve como resultado un </span><strong><span style="font-size:18px">-1</span></strong><span style="font-size:18px">. Estos m&eacute;todos permiten a&ntilde;adir un segundo par&aacute;metro indicando la posici&oacute;n de inicio de la b&uacute;squeda.</span> &nbsp;</p>

<pre>
<code class="language-java">package busqueda;

public class BusquedaEnCadena(){

public static void main(String[] args){

String cadena = "El parque ha sido remodelado";

int posicion;

int posicion2;

int posicion3;

posicion = cadena.indexOf((int) "parque");

posicion2 = cadena.indexOf((int) "e", 20);

posicion3 = cadena.lastIndexOf((int) "r");

System.out.println(posicion);

System.out.println(posicion2);

}</code></pre>

<p><strong><span style="font-size:18px">COMPARAR CADENAS</span></strong></p>

<p><strong><span style="font-size:18px">CompareTo</span></strong></p>

<p><span style="font-size:18px">El m&eacute;todo </span><strong><span style="font-size:18px">compareTo</span></strong><span style="font-size:18px"> permite comparar dos cadenas devolviendo un resultado num&eacute;rico. Si el resultado es 0 indica que las dos cadenas son exactamente iguales y si el resultado es un entero distinto de 0 (ya sea mayor o menor a 0) indica que la primera cadena es mayor o menor que la otra estando sujeto a la tabla ASCII.</span></p>

<pre>
<code class="language-java">package comparar;



public class Compare {

public static void main(String[] args) {

String cadenaUno = "Jose";

String cadenaDos = "Jose";

String cadenaTres = "José";

String cadenaCuatro = "JOSE";

System.out.println(cadenaUno.compareTo(cadenaDos));

System.out.println(cadenaUno.compareTo(cadenaTres));

System.out.println(cadenaUno.compareTo(cadenaCuatro));

}

}</code></pre>

<p><strong><span style="font-size:18px">equals y equalsIgnoreCase</span></strong></p>

<p><span style="font-size:18px">El m&eacute;todo equals permite comparar cadenas devolviendo como resultado un tipo de dato boolean. En caso de ser igual devuelve un true y en caso de ser distinto devuelve false. El m&eacute;todo equalsIgnoreCase es id&eacute;ntico a equals pero ignorando la diferencia entre may&uacute;sculas y min&uacute;sculas.</span></p>

<pre>
<code class="language-java">package comparar;



public class Equal {

public static void main(String[] args) {

String cadenaUno = "Jose";

String cadenaDos = "Jose";

String cadenaTres = "José";

String cadenaCuatro = "JOSE";

if(cadenaUno.equals(cadenaDos)){

System.out.println("cadenaUno y cadenaDos son iguales");

}

if(cadenaUno.equals(cadenaTres)){

System.out.println("cadenaUno y cadenaTres son iguales");

}

if(cadenaUno.equalsIgnoreCase(cadenaCuatro)){

System.out.println("cadenaUno y cadenaCuatro son iguales");

}

}

}</code></pre>

<p><strong>chatAt y getChars</strong></p>

<p>El m&eacute;todo charAt devuelve el caracter de una cadena indicando la posici&oacute;n del caracter en dicha cadena. El m&eacute;todo getChars genera una copia de caracteres en un array de tipo char indicando cuatro par&aacute;metros: el primero indica la posici&oacute;n del primer caracter a copiar, el segundo el n&uacute;mero de caracteres que ser&aacute;n copiados, el tercero el nombre del array de tipo char y el cuarto y &uacute;ltimo es la posici&oacute;n del array pasado en el tercer par&aacute;metro.</p>

<pre>
<code class="language-java">package caracteres;

public class CharAt_GetChars {

public static void main(String[] args) {

String cadena = "Hace un día soleado";

System.out.println("El caracter de la posición indicada es "+cadena.charAt(2));

char lista[] = new char[10];

cadena.getChars(0, 10, lista, 0);

System.out.println(lista);

}

}</code></pre>

<p><strong>substring</strong></p>

<p>El m&eacute;todo substring extrae una parte de una cadena indicando en un primer par&aacute;metro la posici&oacute;n inicial y en un segundo par&aacute;metro que es opcional indicando la posici&oacute;n final. Si el segundo par&aacute;metro se omite asume&nbsp; como posici&oacute;n final el &uacute;ltimo caracter de la cadena.</p>

<pre>
<code class="language-java">package cadenas;

public class Substring {

public static void main(String[] args) {

String cadena = "Hace un día soleado";

System.out.println(cadena.substring(3));

System.out.println(cadena.substring(0,10));

}

}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/afeoz79X3WzDWICox3pFf9SPycDtZFPYzsroTYD7.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //92
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Multithread',
            'slug' => 'multithread',
            'body_main' => 'Multithread (multihilo) en Java',
            'body_plus' => '<p><strong>MULTITHREAD</strong></p>

<p><strong>Multithread</strong>&nbsp;en Java es una caracter&iacute;stica que permite realizar m&aacute;s de una tarea a la vez (multitarea) obteniendo una ejecuci&oacute;n m&aacute;s r&aacute;pida de la aplicaci&oacute;n y alcanzando un mayor rendimiento del procesador. El&nbsp;<strong>multithread</strong>&nbsp;o multihilo se basa en&nbsp;<strong>threads</strong>&nbsp;o hilos y estos threads son los encargados de realizar las distintas tareas del programa. Los threads pueden ser iniciados, detenidos o parados y trabajar en segundo plano permitiendo obtener una mejor experiencia al usuario, ya sea por menores tiempos de espera durante la ejecuci&oacute;n o de obtenci&oacute;n de resultados.&nbsp;</p>

<p>Debido a las cont&iacute;nuas mejoras de los procesadores que, a velocidad imperial aumentan de n&uacute;cleos, toma importancia el multithread. Cada&nbsp;Thread&nbsp;representa un n&uacute;cleo, es decir, si el programa tiene varios hilos, el sistema exige al procesador trabajar con los n&uacute;cleos que dispone para ejecutar esos hilos o tareas. Aun cuando existe solamente un n&uacute;cleo los hilos pueden obtener cierto tiempo de actividad al usuario, por tanto,&nbsp; es recomendable trabajar con threads siempre que se pueda. Este concepto multihilo es muy similar al multiproceso que utilizan los sistemas operativos, que permiten descomprimir un archivo, reproducir varias c&aacute;maras de vigilancia y ver una pel&iacute;cula online a la vez. Y mucho m&aacute;s... solo hay que acceder al administrador de tareas de Windows o teclear en una terminal de Linux el comando&nbsp;<strong>ps -A</strong>&nbsp;para observar la cantidad de procesos que se encuentran trabajando, pero que no se visualizan por pantalla.</p>

<p>Trabajar con hilos, se hace posible mediante dos f&oacute;rmulas. Una,&nbsp;basada en implementar la interface&nbsp;Runnable,&nbsp;y&nbsp;otra&nbsp;basada en extender de la clase&nbsp;Thread&nbsp;que implementa la interface&nbsp;<strong>Runnable</strong>&nbsp;.&nbsp;&nbsp;En el primer caso&nbsp;tan solo requiere el m&eacute;todo&nbsp;run&nbsp;y&nbsp;en el segundo caso&nbsp;se dispone de todos los m&eacute;todos de la clase Thread. Tanto en un caso como en otro es imprescindible&nbsp;sobreescribir el m&eacute;todo&nbsp;run(),. A continuaci&oacute;n una lista con los m&eacute;todos m&aacute;s utilizados de la clase&nbsp;Thread&nbsp;que permiten trabajar el estado de los hilos.</p>

<p><strong>run()</strong></p>

<p>Este m&eacute;todo es indispensable,&nbsp;tanto si se implementa la interface Runnable como si se hereda de Thread (Thread la implementa) y es donde se incluye la funcionalidad del hilo.&nbsp;</p>

<p><strong>start()</strong></p>

<p>Inicia la ejecuci&oacute;n de un hilo realizando la ejecuci&oacute;n del m&eacute;todo run().</p>

<p><strong>sleep()</strong></p>

<p>Cambia el estado del hilo a la fase de dormido durante un tiempo determinado. El tiempo se determina pas&aacute;ndole un par&aacute;metro en milisegundos.</p>

<p><strong>stop()</strong></p>

<p>Detiene la ejecuci&oacute;n del hilo y lo destruye.</p>

<p><strong>suspend()</strong></p>

<p>Detiene la ejecuci&oacute;n del hilo pero no lo destruye.</p>

<p><strong>resume()</strong></p>

<p>Retoma la ejecuci&oacute;n del hilo suspendida anteriormente con suspend().</p>

<p><strong>getName()</strong></p>

<p>Obtiene el nombre establecido anteriormente por setName(). Si no se ha establecido se obtiene un nombre definido por defecto(Thread-0, Thread-1,...)</p>

<p><strong>setName()</strong></p>

<p>Establece el nombre pasado por par&aacute;metro al hilo.</p>

<p><strong>getPriority()</strong></p>

<p>Obtiene el nivel de prioridad de ejecuci&oacute;n. El nivel se compone de un rango del 1 al 10. El nivel 1 indica prioridad&nbsp;m&aacute;xima&nbsp;(MAX_PRIORITY), el nivel 5 indica prioridad normal (NORM_PRIORITY) siendo el nivel que inicia el hilo por defecto y el nivel 10 indica prioridad m&iacute;nima(MIN_PRIORITY).</p>

<p><strong>setPriority()</strong></p>

<p>Establece el nivel de prioridad del hilo.</p>

<p><strong>yield()</strong></p>

<p>Cede el paso a otro hilo y se mantiene en espera temporalmente. Durante el tiempo de espera se mantiene en una fase intermedia preparada para volver a retomar el hilo.</p>

<p><strong>currentThread()</strong></p>

<p>Devuelve el objeto Thread que inicia el m&eacute;todo.</p>

<p>DIFERENCIA ENTRE UN PROYECTO CON UN &Uacute;NICO HILO Y UN PROYECTO MULTIHILO</p>

<p>El c&oacute;digo que sigue a continuaci&oacute;n se divide en dos proyectos que permiten diferenciar claramente de trabajar sin hilos o un &uacute;nico hilo a trabajar con varios hilos. Los dos se basan en un taller de reparaci&oacute;n de autom&oacute;viles y est&aacute;n compuestos solamente por dos clases, una que es casi id&eacute;ntica en los dos proyectos y la otra que es donde se encuentran las diferencias de trabajar con hilos a trabajar sin ellos.&nbsp;</p>

<p>PROYECTO &Uacute;NICO HILO</p>

<p>Este proyecto est&aacute; compuesto por la clase Coche y la clase Reparaci&oacute;n que tambi&eacute;n contiene el m&eacute;todo principal(main). La clase Coche es una clase muy b&aacute;sica, formada por un constructor que asigna la marca y modelo del coche y contiene cuatro m&eacute;todos, por un lado el getter y el setter del coche que trabajan con datos de tipo cadena, marca y modelo respectivamente, y por otro lado el getter y el setter de las aver&iacute;as que hay que reparar en cada coche, que trabajan con datos de tipo entero en forma de array y que representan una lista de tiempos fijados para cada reparaci&oacute;n. Para entender el orden del array de aver&iacute;as se puede suponer que un coche que entra en el taller, puede precisar de tres reparaciones, la primera tiene un tiempo fijado de 15&nbsp;minutos, la segunda de 35 y la tercera de 10, por tanto el array de aver&iacute;as ser&iacute;a el siguiente: {15,35,10}.&nbsp;</p>

<p>Clase Coche</p>

<pre>
<code class="language-java">package unicohilo;
public class Coche {
    private String marca;
    private String modelo;
    private int[] averias;
    
    public Coche(String marca, String mod){
        this.marca=marca;
        this.modelo=mod;        
    }
    
    public String getCoche(){
        return this.marca+" "+this.modelo;        
    }
    public void setCoche(String marca,String mod){
        this.marca=marca;
        this.modelo=mod;
    }
    public int[] getAverias(){
        return this.averias;
    }
    public void setAverias(int[] averias){
        this.averias=averias;
    }
}</code></pre>

<p>La clase Reparacion est&aacute; compuesta por un constructor, dos m&eacute;todos que manejan el &uacute;nico hilo y el m&eacute;todo principal.</p>

<p>El constructor asigna un dato de tipo Coche basado en la clase Coche, un array de tipo entero que contiene los tiempos de reparaci&oacute;n de cada aver&iacute;a y un dato de tipo long que almacena el tiempo en milisegundos del comienzo de las reparaciones. Este &uacute;ltimo solo sirve para mostrar la diferencia de tiempo empleado en un proyecto y en otro, por tanto, es un par&aacute;metro independiente sin ninguna relaci&oacute;n con los hilos.</p>

<p>El m&eacute;todo repararCoche es el encargado de manejar el hilo, est&aacute; compuesto, por un lado, por varios mensajes que permiten distinguir a que coche pertenece cada cambio del hilo, y por otro, por un bucle for&nbsp; que realiza una iteraci&oacute;n asociada con el array de las aver&iacute;as.&nbsp; Por cada aver&iacute;a de cada coche, realiza una iteraci&oacute;n y en cada iteraci&oacute;n realiza una llamada al m&eacute;todo repararAveria() que es el cambia de estado el hilo a fase de dormido. Esta fase es iniciada mediante el m&eacute;todo sleep(), perteneciente a la clase Thread y lo que hace es pausar el flujo del hilo durante el tiempo fijado de cada aver&iacute;a expresado en cada elemento del array.</p>

<p>Por &uacute;ltimo el m&eacute;todo principal que comienza creando los coches, asigna la cantidad y los tiempos de las aver&iacute;as (tiempos peque&ntilde;os y en segundos para el ejemplo), continua creando las reparaciones de cada coche y finalmente realiza la llamada al m&eacute;todo repararCoche() que se encarga de la reparaci&oacute;n total de cada coche.</p>

<p>Clase Reparacion</p>

<pre>
<code class="language-java">package unicohilo;
public class Reparacion {    
    private Coche coche;
    private int[] tiempoReparacion;
    private long inicioReparaciones;
    
    public Reparacion(Coche coche,int[]tiempo,long t){
        this.coche=coche;
        this.tiempoReparacion=tiempo;
        this.inicioReparaciones = t;
    }
    
    public void repararCoche(){
        System.out.println("El coche "+this.coche.getCoche()+" ha entrado en taller");
        for(int i=0;i&lt;this.tiempoReparacion.length;i++){
            repararAveria(this.tiempoReparacion[i]);
            System.out.println("El coche "+this.coche.getCoche()+" tiene "+(i+1)+" averías reparadas de "+this.tiempoReparacion.length);
        }
        System.out.println("El coche "+this.coche.getCoche()+" ha sido reparado y está listo para su entrega");
        System.out.println("El tiempo transcurrido desde el inicio de las reparaciones ha sido de "+(System.currentTimeMillis()-this.inicioReparaciones)/1000+" segundos");
    }
    
    public void repararAveria(int t){                    
        try {
            Thread.sleep(t*1000);
        } catch (InterruptedException ex) {
            Thread.currentThread().interrupt();
        }
    }
    public static void main(String[] args) {
        Coche coche1 = new Coche("Ford","Focus");
        coche1.setAverias(new int[]{2,3,4});
        Coche coche2 = new Coche("Seat", "Ibiza");
        coche2.setAverias(new int[] {1,8,10});
        Coche coche3 = new Coche("VolskWagen","Passat");
        coche3.setAverias(new int[]{5,7});
        long horaEntrada=System.currentTimeMillis();        
        Reparacion reparacion1=new Reparacion(coche1,coche1.getAverias(),horaEntrada);
        Reparacion reparacion2 = new Reparacion(coche2,coche2.getAverias(),horaEntrada);
        Reparacion reparacion3 = new Reparacion(coche3,coche3.getAverias(),horaEntrada);
        reparacion1.repararCoche();
        reparacion2.repararCoche();
        reparacion3.repararCoche();        
    }
}
</code></pre>

<p>Resultado &uacute;nico hilo</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666288778.png" style="height:355px; width:758px" /></p>

<p>PROYECTO MULTIHILO</p>

<p>El proyecto con multihilo est&aacute; formado por la clase&nbsp;CocheMultithread y la clase ReparacionMultithread que contiene la clase principal(main).&nbsp;La clase CocheMultithread es id&eacute;ntica a la clase Coche, la &uacute;nica diferencia se encuentra en el nombre de la clase.</p>

<p>Clase CocheMultithread</p>

<pre>
<code class="language-java">package multihilo;
public class CocheMultithread {
    private String marca;
    private String modelo;
    private int[] averias;
    
    public CocheMultithread(String marca, String mod){
        this.marca=marca;
        this.modelo=mod;        
    }
    
    public String getCoche(){
        return this.marca+" "+this.modelo;        
    }
    public void setCoche(String marca,String mod){
        this.marca=marca;
        this.modelo=mod;
    }
    public int[] getAverias(){
        return this.averias;
    }
    public void setAverias(int[] averias){
        this.averias=averias;
    }
}</code></pre>

<p>La clase ReparacionMultithread es similar a la clase Reparacion con m&iacute;nimas diferencias. Una de ellas es que hereda de la clase Thread, la otra es que el m&eacute;todo repararCoche() se ha convertido en el m&eacute;todo run() y la &uacute;ltima es que el m&eacute;todo main ya no realiza la llamada al m&eacute;todo repararCoche() si no que realiza la llamada al m&eacute;todo&nbsp;<strong>start()</strong>.&nbsp;</p>

<p>Clase ReparacionMultithread</p>

<pre>
<code class="language-java">package multihilo;
public class ReparacionMultithread extends Thread {
    private CocheMultithread coche;
    private int[] tiempoReparacion;
    private long inicioReparaciones;
    
    public ReparacionMultithread(CocheMultithread coche,int[]tiempo,long t){
        this.coche=coche;        
        this.tiempoReparacion=tiempo;
        this.inicioReparaciones = t;
    }
    
    public void run(){
        System.out.println("El coche "+this.coche.getCoche()+" ha entrado en taller");
        for(int i=0;i&lt;this.tiempoReparacion.length;i++){
            repararAveria(this.tiempoReparacion[i]);
            System.out.println("El coche "+this.coche.getCoche()+" tiene "+(i+1)+" averías reparadas de "+this.tiempoReparacion.length);
        }
        System.out.println("El coche "+this.coche.getCoche()+" ha sido reparado y está listo para su entrega");
        System.out.println("El tiempo transcurrido desde el inicio de las reparaciones ha sido de "+(System.currentTimeMillis()-this.inicioReparaciones)/1000+" segundos");
    }
    
    public void repararAveria(int t){                    
        try {
            Thread.sleep(t*1000);            
        } catch (InterruptedException ex) {
            Thread.currentThread().interrupt();
        }
    }
    public static void main(String[] args) {
        CocheMultithread coche1 = new CocheMultithread("Ford","Focus");
        coche1.setAverias(new int[]{2,3,4});
        CocheMultithread coche2 = new CocheMultithread("Seat", "Ibiza");
        coche2.setAverias(new int[]{1,8,10});
        CocheMultithread coche3 = new CocheMultithread("VolskWagen","Passat");
        coche3.setAverias(new int[]{5,7});
        long horaEntrada=System.currentTimeMillis();        
        ReparacionMultithread reparacion1=new ReparacionMultithread(coche1,coche1.getAverias(),horaEntrada);
        ReparacionMultithread reparacion2 = new ReparacionMultithread(coche2,coche2.getAverias(),horaEntrada);
        ReparacionMultithread reparacion3 = new ReparacionMultithread(coche3,coche3.getAverias(),horaEntrada);
        reparacion1.start();
        reparacion2.start();
        reparacion3.start();        
    }
}
</code></pre>

<p>Resultado multihilo</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666288858.png" style="height:350px; width:752px" /></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/IswsMme8QK9HVLCyi9IgWKqPZWzDJy7lugrAeAP9.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //93
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Guardar y Leer archivos en Java',
            'slug' => 'guardar-y-leer-archivos-en-java',
            'body_main' => 'Crear archivos, guardar datos y leer datos en Java',
            'body_plus' => '<p>Las clases&nbsp;<strong>FileInputStream</strong>&nbsp;y&nbsp;<strong>FileOuputStream</strong>&nbsp;permiten leer y escribir archivos mediante&nbsp;<strong>streams,</strong>&nbsp;trabajando con datos binarios y bas&aacute;ndose en objetos de tipo File que representan el archivo de lectura y el archivo de escritura. El c&oacute;digo siguiente muestra la estructura b&aacute;sica de lectura y escritura de un archivo con FileInputStream y FileOutputStream mediante un array de bytes.</p>

<pre>
<code class="language-java">import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
public class CopiarArchivo {
 
    public FileInputStream input;
    public FileOutputStream output;
    public byte[] b;
    public File fileInput,fileOutput;
    
    public CopiarArchivo(){
        fileInput= new File("archivo.txt");
        fileOutput = new File("archivo2.txt");
    }
    
    public void duplicar(){
        input = new FileInputStream(fileInput);
        output = new FileOutputStream(fileOutput);

        b = new byte[(int)fileInput.length()];            
        input.read(b);
        output.write(b);
        input.close();
        output.close();
    
    public static void main(String[] argumentos) {
        CopiarArchivo cp = new CopiarArchivo();
        cp.duplicar();
    }
}</code></pre>

<p>Este mismo ejemplo se puede realizar mediante un while y un dato de tipo entero.</p>

<pre>
<code class="language-java">import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
public class CopiarArchivo {
 
    public FileInputStream input;
    public FileOutputStream output;
    public int b;
    public File fileInput,fileOutput;
    
    public CopiarArchivo(){
        fileInput= new File("archivo.txt");
        fileOutput = new File("archivo2.txt");
    }
    
    public void duplicar(){
        input = new FileInputStream(fileInput);
        output = new FileOutputStream(fileOutput);
        while((b=input.read())!=-1)                    
            output.write(b);
        input.close();
        output.close();
    
    public static void main(String[] argumentos) {
        CopiarArchivo cp = new CopiarArchivo();
        cp.duplicar();
    }
}</code></pre>

<p>Para poder compilar estos dos c&oacute;digos anteriores es necesario encerrarlo todo con try-catch obteniendo un archivo duplicado mediante las clases FileInputStream y FileOutputStream.</p>

<pre>
<code class="language-java">import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
public class CopiarArchivo {
 
    public FileInputStream input;
    public FileOutputStream output;
    public byte[] b;
    public File fileInput,fileOutput;
    
    public CopiarArchivo(){
        fileInput= new File("archivo.txt");
        fileOutput = new File("archivo2.txt");
    }
    
    public void duplicar(){
        try {
            input = new FileInputStream(fileInput);
        } catch (FileNotFoundException ex) {
            ex.printStackTrace();
        }
        try {
            output = new FileOutputStream(fileOutput);
        } catch (FileNotFoundException ex) {
            ex.printStackTrace();
        }
        b = new byte[(int)fileInput.length()];            
        try {
            input.read(b);
        } catch (IOException ex) {
            ex.printStackTrace();
        }
        try {
            output.write(b);
        } catch (IOException ex) {
            ex.printStackTrace();
        }
        try {
            input.close();
        } catch (IOException ex) {
            ex.printStackTrace();
        }
        try {
            output.close();
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }
    
    public static void main(String[] argumentos) {
        CopiarArchivo cp = new CopiarArchivo();
        cp.duplicar();
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/9xLYGcepdBFSMozYTktDQB7kE2HQiGrVIRNBEz8y.jpg'

        ]);
    
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //94
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Apache Tomcat',
            'slug' => 'apache-tomcat',
            'body_main' => 'Instalar Apache Tomcat en Linux',
            'body_plus' => '<p>Apache Tomcat es un software desarrollado por Java orientado a servidores web que permite ejecutar servlets y proyectos JSP.</p>

<p>INSTALAR APACHE TOMCAT</p>

<p>Para instalar Tomcat en Linux el primer paso consiste en descargar una de sus versiones (binario) desde su&nbsp;<a href="https://tomcat.apache.org/" target="_blank">p&aacute;gina oficial</a>&nbsp;y descomprimirlo en un directorio del sistema.&nbsp; Para ello se crea un directorio, se copia el archivo y se descomprime en dicho directorio. El c&oacute;digo siguiente realiza este proceso despu&eacute;s de haber descargado la versi&oacute;n 8.5.51 y comprimido a tar.gz.</p>

<pre>
<code class="language-java">mkdir server-tomcat
cp Descargas/apache-tomcat-8.5.51.tar.gz server-tomcat/
cd server-tomcat
tar xvzf apache-tomcat-8.5.51.tar.gz</code></pre>

<p>El segundo paso es a&ntilde;adir Apache Tomcat a una variable de entorno.&nbsp;</p>

<pre>
<code class="language-bash">sudo nano .profile
</code></pre>

<p>Se crea la variable de entorno CATALINA_HOME asignando la ruta donde se encuentra la instalaci&oacute;n de Apache Tomcat. (Entre la variable, el signo &quot;=&quot; y la ruta no deben existir espacios).</p>

<pre>
<code class="language-bash">export CATALINA_HOME=/home/usuario/server-tomcat/apache-tomcat-8.5.51
</code></pre>

<p>Actualizar</p>

<pre>
<code class="language-bash">apt update
</code></pre>

<p>El tercer paso es comprobar si funciona correctamente, accediendo al subdirectorio bin y arrancando o deteniendo el servidor.</p>

<pre>
<code class="language-bash">cd /home/usuario/server-tomcat/apache-tomcat-8.5.51/bin
</code></pre>

<p>Arrancar servidor.</p>

<pre>
<code class="language-bash">./startup.sh
</code></pre>

<p>Detener servidor.</p>

<pre>
<code class="language-bash">./shutdown.sh
</code></pre>

<p><strong>ERROR build-impl.xml:1045 Deployment error</strong></p>

<p>Este error impide iniciar el navegador desde NetBeans al ejecutar un proyecto con Tomcat. Para solucionar este error es necesario sustituir el archivo org-netbeans-modules-tomcat5.jar que se encuentra en el subdirectorio enterprise/modules de la carpeta de instalaci&oacute;n de NetBeans. Si el directorio enterprise/modules no existe es necesario crearlo y copiar dentro el archivo que se puede descargar desde&nbsp;<a href="https://mega.nz/#!F9oihIAZ!3yL-UWzm8AwKBe7d2KmHNvlL_qyH0QXQPpZnMBLSs9U" target="_blank">aqu&iacute;</a>.</p>

<p>Fuente (error build-impl.xml):&nbsp;<a href="https://issues.apache.org/jira/browse/NETBEANS-3903">//issues.apache.org/jira/browse/NETBEANS-3903</a></p>

<p>Error Could not contact [localhost:8005]</p>

<p>Este error se soluciona revisando firewalls o probando una versi&oacute;n de Java o OpenJDK anterior.</p>

<p>&nbsp;</p>

<p>ESTRUCTURA APACHE TOMCAT</p>

<p>La estructura de Tomcat se basa en los siguientes directorios:</p>

<ul>
    <li>bin: Archivos ejecutables</li>
    <li>conf: Archivos de configuraci&oacute;n</li>
    <li>lib: Archivos JAR</li>
    <li>logs: Archivos de texto del registro</li>
    <li>temp: Archivos temporales</li>
    <li>webapp: Aplicaciones Web</li>
    <li>work: Archivos class</li>
</ul>

<p><strong>bin</strong></p>

<ul>
    <li>El directorio bin contiene los ejecutables startup y shutdown que permiten iniciar y detener el servicio,&nbsp; disponibles en dos formatos distintos, la extensi&oacute;n bat (para Windows) y sh (para Linux). Adem&aacute;s existen otros ejecutables como version (versi&oacute;n), configtest, setclasspath,etc...&nbsp;</li>
</ul>

<p><strong>conf</strong></p>

<ul>
    <li>El directorio conf contiene distintos archivos de configuraci&oacute;n como web.xml (para las rutas), tomcat-users.xml (para los roles), context.xml,etc...</li>
</ul>

<p><strong>lib</strong></p>

<ul>
    <li>El directorio lib contiene las librer&iacute;as necesarias para el funcionamiento de Apache Tomcat junto a otras librer&iacute;as disponibles para las aplicaciones, todas ellas con la extensi&oacute;n&nbsp;jar.</li>
</ul>

<p><strong>webapp</strong></p>

<ul>
    <li>El directorio webapp es el lugar donde se encuentran las aplicaciones web, Tomcat incluye por defecto algunas aplicaciones: un proyecto web de ejemplo, un administrador de aplicaciones, documentaci&oacute;n,etc..</li>
</ul>

<p><strong>work</strong></p>

<ul>
    <li>El directorio work contiene el c&oacute;digo fuente y otros archivos con extensi&oacute;n class generados por Tomcat.</li>
</ul>

<p>ESTRUCTURA DE APLICACI&Oacute;N WEB&nbsp;</p>

<p>Una aplicaci&oacute;n web se compone de un directorio raiz, ubicado en el directorio webapps de Apache Tomcat y con un nombre que normalmente identifica el proyecto. La estructura b&aacute;sica del proyecto es la siguiente:</p>

<ul>
    <li>[MiProyecto] : Contiene archivos HTML, CSS,JSP,Javascript&nbsp;</li>
    <li>WEB-INF/web.xml :&nbsp;Permite configurar los servlets y p&aacute;gina de inicio</li>
    <li>WEB-INF/classes :&nbsp;Contiene los servlets y subdirectorios con paquetes de Java</li>
    <li>WEB-INF/lib :&nbsp;Contiene las librerias necesarias para la aplicaci&oacute;n</li>
    <li>(opcional) META-INF/context.xml :&nbsp;Permite configurar la ruta ra&iacute;z de la aplicaci&oacute;n</li>
</ul>

<p><strong>web.xml</strong></p>

<p>﻿El archivo web.xml permite configurar un archivo o ruta inicial</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;web-app version="3.1" xmlns="http://xmlns.jcp.org/xml/ns/javaee" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlns.jcp.org/xml/ns/javaee http://xmlns.jcp.org/xml/ns/javaee/web-app_3_1.xsd"&gt;    
    &lt;welcome-file-list&gt;
        &lt;welcome-file&gt;index.html&lt;/welcome-file&gt;
    &lt;/welcome-file-list&gt;
&lt;/web-app&gt;</code></pre>

<p>El valor&nbsp;(index.html)&nbsp;de la etiqueta&nbsp;<strong>welcome-file</strong>&nbsp;indica el archivo o ruta que se ejecuta al inicio.</p>

<p><strong>context.xml</strong></p>

<p>El archivo context.xml permite indicar la ruta ra&iacute;z de la aplicaci&oacute;n mediante el atributo path</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;Context path="/MiProyecto"&gt;
&lt;/Context path&gt;</code></pre>

<p>Para comprobar si la configuraci&oacute;n es correcta se inicia el servidor y se accede a la aplicaci&oacute;n mediante la ruta indicada.</p>

<p><strong>Iniciar servidor</strong></p>

<pre>
<code class="language-bash">./startup.sh
</code></pre>

<p><strong>Acceder a aplicaci&oacute;n</strong></p>

<p>Para acceder a la aplicaci&oacute;n se introduce la direcci&oacute;n en el navegador</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666298063.png" style="height:36px; width:216px" /></p>

<p>GESTOR DE APACHE TOMCAT</p>

<p>Apache Tomcat incorpora en la instalaci&oacute;n un gestor de aplicaciones propio. Este gestor permite varias opciones como iniciar, detener, instalar, eliminar y acceder a las aplicaciones. Este gestor se encuentra restringido por defecto, para obtener acceso es requerida la configuraci&oacute;n del&nbsp;rol&nbsp;<strong>manager-gui</strong>&nbsp;en el&nbsp;archivo tomcat-users.xml (<strong>conf/tomcat-users.xml</strong>)</p>

<p><strong>Configurar tomcat-users.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="UTF-8"?&gt; 
&lt;tomcat-users xmlns="http://tomcat.apache.org/xml" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" version="1.0" xsi:schemaLocation="http://tomcat.apache.org/xml tomcat-users.xsd"&gt;        
    &lt;role rolename="manager-gui"/&gt;    
    &lt;user password="admin" roles="manager-gui" username="admin"/&gt;        
&lt;/tomcat-users&gt;</code></pre>

<p>Se crea el rol manager-gui y al crear el usuario se le asigna el rol manager-gui. Para que el servidor reconozca la configuraci&oacute;n es necesario detener e iniciar el servicio.</p>

<p><strong>Acceder desde una m&aacute;quina externa</strong></p>

<p>A partir de versiones de Apache Tomcat 8.5 o superiores, la configuraci&oacute;n por defecto no permite acceder desde una m&aacute;quina externa al gestor de aplicaciones. Para permitir el acceso es necesario configurar los archivos&nbsp;<strong>context</strong>&nbsp;relacionados con el gestor de aplicaciones:</p>

<ul>
    <li>webapps/manager/META-INF/context.xml</li>
    <li>webapps/host-manager/META-INF/context.xml</li>
</ul>

<p>Se modifica el atributo&nbsp;<strong>allow</strong>&nbsp;de la etiqueta&nbsp;<strong>Valve</strong>, ya sea, a&ntilde;adiendo una IP determinada o permitiendo acceso a cualquier IP.</p>

<p>Etiqueta Valve por defecto:</p>

<pre>
<code class="language-xml">&lt;Valve className="org.apache.catalina.valves.RemoteAddrValve" 
allow="127\.\d+\.\d+\.\d+|::1|0:0:0:0:0:0:0:1" /&gt;</code></pre>

<p>Configuraci&oacute;n a&ntilde;adiendo una IP determinada:</p>

<pre>
<code class="language-xml">&lt;Valve className="org.apache.catalina.valves.RemoteAddrValve" 
    allow="127\.\d+\.\d+\.\d+|::1|0:0:0:0:0:0:0:1|192.85.123.82" /&gt;</code></pre>

<p>Configuraci&oacute;n permitiendo acceso a cualquier IP:</p>

<pre>
<code class="language-xml">&lt;Valve className="org.apache.catalina.valves.RemoteAddrValve" allow="^.*$"/&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/yfKuQajaeoiB4tUenADCwkZVnxxDBNbQDfTc1DYM.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //94
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar NetBeans en Linux',
            'slug' => 'instalar-netbeans-en-linux',
            'body_main' => 'Instalar IDE NetBeans en distribuciones Linux',
            'body_plus' => '<p>La instalaci&oacute;n de NetBeans se puede realizar desde repositorios mediante un gestor de paquetes como puede ser synaptic, centro de software, apt, aptitude..,</p>

<p>La instalaci&oacute;n de los repositorios es una opci&oacute;n r&aacute;pida y segura, pero generalmente, los repositorios disponen de versiones estables pero no actualizadas, por tanto si se requiere una versi&oacute;n m&aacute;s actualizada es necesario descargar y realizar manualmente la instalaci&oacute;n.</p>

<p><strong>INSTALACI&Oacute;N R&Aacute;PIDA&nbsp;</strong></p>

<pre>
<code class="language-bash">sudo apt install netbeans
</code></pre>

<p>INSTALACI&Oacute;N MANUAL&nbsp;</p>

<p>Para instalar NetBeans manualmente, es necesario dirigirse a su&nbsp;<a href="https://netbeans.org/" target="_blank">p&aacute;gina oficial</a>&nbsp;en su secci&oacute;n de descargas y descargar la opci&oacute;n ejecutable de la versi&oacute;n correspondiente. La versi&oacute;n ejecutable viene indicada con la terminaci&oacute;n&nbsp;<strong>bin</strong>, es decir, para la versi&oacute;n 10 el archivo es&nbsp;<strong>incubating-netbeans-10.0-bin.zip</strong>, para la versi&oacute;n 11 es&nbsp;<strong>netbeans-11.1-bin.zip</strong>, etc...</p>

<p>Una vez descargado el archivo se crea un nuevo directorio y se copia en dicho directorio.</p>

<pre>
<code class="language-bash">mkdir /opt/netbeans10
sudo cp ~/Descargas/incubating-netbeans-10.0-bin.zip /opt/netbeans10</code></pre>

<p>Se descomprime el archivo, se accede al directorio bin de la carpeta descomprimida y se ejecuta el IDE.</p>

<pre>
<code class="language-bash">sudo unzip incubating-netbeans-10.0-bin.zip
cd netbeans
cd bin
./netbeans
</code></pre>

<p>En caso de obtener errores de permisos se modifican los permisos de forma recursiva al directorio descomprimido y se vuelve a ejecutar la aplicaci&oacute;n.</p>

<pre>
<code class="language-bash">sudo chmod -R 777 netbeans
cd netbeans
cd bin
./netbeans</code></pre>

<p>CONFIGURACI&Oacute;N DE JDK</p>

<p>Para configurar la ruta del JDK se procede a editar el archivo netbeans.conf que se encuentra en el directorio etc y se busca la siguiente l&iacute;nea.</p>

<pre>
<code class="language-bash">#netbeans_jdkhome="path/to/jdk"
</code></pre>

<p>Se elimina la almohadilla para descomentar la l&iacute;nea y se a&ntilde;ade la ruta donde se encuentre instalado el JDK en el sistema.</p>

<pre>
<code class="language-bash">netbeans_jdkhome="/usr/lib/jvm/java-8-openjdk-amd64"
</code></pre>

<p>CONFIGURACI&Oacute;N DE SERVIDOR (Tomcat, Glassfish,..)</p>

<p>Para agregar un nuevo servidor en NetBeans es necesario acceder a la opci&oacute;n Ventana -&gt; Prestaciones</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666299903.jpg" style="height:298px; width:397px" /></p>

<p>Clic derecho en Servidores -&gt; Agregar servidor...</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666299933.jpg" style="height:263px; width:275px" /></p>

<p>Se selecciona el servidor a configurar</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666299977.png" style="height:432px; width:667px" /></p>

<p>Se indica la ruta donde se encuentra ubicado el servidor, un nombre de usuario y contrase&ntilde;a</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666300028.jpg" style="height:451px; width:853px" /></p>

<p>Ahora desde la opci&oacute;n servidores se despliegan los servidores registrados permitiendo las distintas opciones.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666300065.jpg" style="height:409px; width:386px" /></p>

<p>ERROR No server plugins are installed in the IDE</p>

<p>En algunas versiones de Netbeans al agregar un nuevo servidor por primera vez, aparece una ventana con el mensaje&nbsp;<strong>No server plugins are installed in the IDE&nbsp;</strong>impidiendo realizar el proceso. Tal como el mensaje indica, es necesario instalar algunos plugins en el IDE. Para instalar estos plugins se accede al men&uacute; Herramientas-&gt;Plugins.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666300108.png" style="height:323px; width:511px" /></p>

<p>Al seleccionar la opci&oacute;n NetBeans 8.2 Plugin Portal, autom&aacute;ticamente, se actualiza la ventana aumentando el n&uacute;mero de plugins&nbsp; disponibles. Es posible que sea necesario cerrar el men&uacute; de plugins y volver a acceder a &eacute;l para que esta actualizaci&oacute;n se haga visible.&nbsp;</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666300235.png" style="height:325px; width:529px" /></p>

<p>Se procede a la instalaci&oacute;n de los plugins, marcando todos los que pertenecen a la categor&iacute;a Java Web and EE y pulsando el bot&oacute;n de instalaci&oacute;n</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666300268.png" style="height:502px; width:447px" /></p>

<p>Una vez instalados deber&iacute;a aparecer el desplegable de servidores disponibles al agregar un nuevo servidor.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666300329.png" style="height:442px; width:646px" /></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/zG6YSYfVttv8nr0lXbrZqPIWjC9VB8bhiFdfMgJt.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //95
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Servlet',
            'slug' => 'servlet',
            'body_main' => 'Servlets en Java',
            'body_plus' => '<p>Los&nbsp;<strong>Servlets</strong>&nbsp;son clases Java ejecutadas en un servidor que permiten recibir solicitudes HTTP (HTTP Request) y procesarlas y devolver una respuesta tambi&eacute;n mediante el protocolo HTTP (HTTP Response). La respuesta puede ser de tipo HTML, XML, JSON, PDF, audio, imagen, video,..</p>

<p><strong>ESTRUCTURA DE UN SERVLET</strong></p>

<p>Un servlet hereda o extiende de la clase&nbsp;<strong>HttpServlet</strong>&nbsp;y debe sobreescribir los m&eacute;todos encargados de realizar las peticiones(doGet, doPost,...).&nbsp;&nbsp;</p>

<pre>
<code class="language-java">package servlets;
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
@WebServlet(name = "Servlet", urlPatterns = {"/Servlet"})
public class Servlet extends HttpServlet {
   
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        System.out.println("petición vía GET");
    }
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        System.out.println("petición vía POST");
    }
}</code></pre>

<p><strong>CONFIGURACI&Oacute;N DE UN SERVLET</strong></p>

<p>La configuraci&oacute;n de un servlet se almacena en el archivo web.xml que se encuentra generalmente en el directorio WEB-INF. Este archivo permite definir mediante elementos de tipo XML (tags) la configuraci&oacute;n del servlet. La configuraci&oacute;n requiere un elemento servlet, que define el nombre del servlet y de la clase, y un elemento servlet-mapping, que define de nuevo el nombre del servlet y la ruta relativa&nbsp; que realiza la solicitud.</p>

<pre>
<code class="language-xml">&lt;webapp&gt;
    &lt;servlet&gt;
        &lt;servlet-name&gt;Servlet&lt;/servlet-name&gt;
        &lt;servlet-class&gt;servlets.Servlet&lt;/servlet-class&gt;
    &lt;/servlet&gt;
    &lt;servlet-mapping&gt;
        &lt;servlet-name&gt;Servlet&lt;/servlet-name&gt;
        &lt;url-pattern&gt;/servlet&lt;/url-pattern&gt;
    &lt;/servlet-mapping&gt;
&lt;/webapp&gt;</code></pre>

<p>A partir de la API Servlet 3.0 tambi&eacute;n existe la opci&oacute;n de configuraci&oacute;n por&nbsp;<strong>anotaci&oacute;n</strong>, tal como se observa en la&nbsp;l&iacute;nea&nbsp;siguiente y&nbsp;la l&iacute;nea 9 del c&oacute;digo anterior&nbsp;donde se define el nombre y la ruta.</p>

<pre>
<code class="language-java">@WebServlet(name = "Servlet", urlPatterns = {"/Servlet"})
</code></pre>

<p><strong>PETICIONES GET Y POST</strong></p>

<p>El servlet se encarga de procesar las peticiones HTTP como cualquier otro lenguaje. Las de tipo GET, mediante url o link, las de tipo POST, mediante formulario.</p>

<pre>
<code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;title&gt;Peticiones&lt;/title&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;div&gt;&lt;b&gt;Enviando datos por POST&lt;/b&gt;&lt;/div&gt;
        &lt;form name="form-comentarios" action="comentarios" method="POST"&gt;
            &lt;p&gt;Introduce los datos&lt;/p&gt;
            &lt;p&gt;Nombre: &lt;input type="text" name="name"&gt;&lt;/p&gt;
            &lt;p&gt;E-Mail: &lt;input type="text" name="email"&gt;&lt;/p&gt;
            &lt;p&gt;&lt;input type="submit" name="enviar" value="Enviar"&gt;&lt;/p&gt;            
        &lt;/form&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>El m&eacute;todo&nbsp;<strong>getParameter()</strong>&nbsp;permite obtener los datos, ya sea v&iacute;a&nbsp;<strong>GET</strong>&nbsp;o v&iacute;a&nbsp;<strong>POST</strong>,&nbsp;que pueden ser manejados antes de devolver la respuesta.</p>

<pre>
<code class="language-java">package servlets;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
public class Servlet extends HttpServlet {
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String name = request.getParameter("name");
        String email = request.getParameter("email");        
        if(name.equals("jose")){
            response.setContentType("text/html;charset=UTF-8");
            try(PrintWriter out=response.getWriter()){
                out.println("&lt;!DOCTYPE HTML&gt;");
                out.println("&lt;html&gt;");
                out.println("&lt;head&gt;");
                out.println("&lt;tittle&gt;Petición&lt;/title&gt;");
                out.println("&lt;/head&gt;");
                out.println("&lt;body&gt;");
                out.println("&lt;h2&gt;Accediendo por GET&lt;/h2&gt;");
                out.println("&lt;/body&gt;");
                out.println("&lt;/html&gt;");
            }
        }else{
            response.sendError(HttpServletResponse.SC_UNAUTHORIZED);            
        }
    }
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String name = request.getParameter("name");
        String email = request.getParameter("email");        
        System.out.println(name);
        System.out.println(email);
        if(name.equals("jose")){
            response.setContentType("text/html;charset=UTF-8");
            try(PrintWriter out=response.getWriter()){
                out.println("&lt;!DOCTYPE HTML&gt;");
                out.println("&lt;html&gt;");
                out.println("&lt;head&gt;");
                out.println("&lt;tittle&gt;Petición&lt;/title&gt;");
                out.println("&lt;/head&gt;");
                out.println("&lt;body&gt;");
                out.println("&lt;h2&gt;Accediendo por POST&lt;/h2&gt;");
                out.println("&lt;/body&gt;");
                out.println("&lt;/html&gt;");
            }
        }else{
            response.sendError(HttpServletResponse.SC_UNAUTHORIZED);            
        }
    }
}</code></pre>

<p><strong>TIPOS DE RESPUESTA</strong></p>

<p>El servlet permite devolver los distintos tipos de respuesta y formato estableciendo el tipo MIME. Generalmente, en aplicaciones web, el tipo de respuesta m&aacute;s com&uacute;n es el documento en formato HTML, sin embargo es posible devolver&nbsp;otro tipo de&nbsp;respuestas&nbsp;&nbsp;como pueden ser documentos en formato JSON, archivos de imagen, video, documentos PDF,etc... El tipo MIME se establece&nbsp;mediante el m&eacute;todo&nbsp;<strong>setContentType()&nbsp;</strong>pasando por par&aacute;metro el correspondiente tipo MIME.</p>

<pre>
<code class="language-java">setContentType([tipo_respuesta]);
</code></pre>

<p>Establecer respuesta de tipo HTML</p>

<pre>
<code class="language-java">setContentType("text/html;charset=UTF-8");
</code></pre>

<p>Establecer respuesta de tipo imagen (extensi&oacute;n png)</p>

<pre>
<code class="language-java">setContentType("image/png");
</code></pre>

<p>Para establecer tipos de respuesta con otros tipos MIME se puede acceder a la entrada&nbsp;<a href="https://bahiaxip.com/entrada/lista-de-tipos-mime" target="_blank">Lista de Tipos MIME</a>&nbsp;que contiene una tabla con los MIME m&aacute;s comunes.</p>

<p><strong>REDIRECCIONES</strong></p>

<p>Los servlets permiten realizar redirecciones mediante el m&eacute;todo sendRedirect(). Estas redirecciones pueden realizarse dentro del mismo directorio o proyecto, o pueden realizarse hacia una web externa.&nbsp;</p>

<p>Redireccionar a un documento dentro del mismo directorio.</p>

<pre>
<code class="language-java">sendRedirect("menu.html");
</code></pre>

<p>Redireccionar a un documento de otro nivel dentro del mismo proyecto.</p>

<pre>
<code class="language-java">sendRedirect("/contacto/form.html");
</code></pre>

<p>Redireccionar a una url externa.</p>

<pre>
<code class="language-java">sendRedirect("//www.google.es");
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/00doLKSx0rL81h29cna6gO6i2ujeyUEZf7JCeZFY.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);


        //96
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Lista de tipos MIME',
            'slug' => 'lista-de-tipos-mime',
            'body_main' => 'Lista de tipos MIME más comunes',
            'body_plus' => '<p>Los tipos MIME (Multipurpose Internet Mail Extensions) tambi&eacute;n denominados tipos de medios, son considerados un conjunto de especificaciones que indican&nbsp;el tipo de datos que contiene un archivo, permitiendo&nbsp;al navegador intercambiar informaci&oacute;n y manejar el archivo de forma optimizada.&nbsp; La&nbsp; estructura que establece un tipo MIME se basa en tipo, subtipo y&nbsp;par&aacute;metros&nbsp;de forma opcional.&nbsp;</p>

<pre>
<code class="language-bash">tipo/subtipo; parámetros(opcional)
</code></pre>

<p>Algunos tipos MIME incorporan adem&aacute;s un sufijo.</p>

<pre>
<code class="language-bash">tipo/subtipo+sufijo; parámetros (opcional)
</code></pre>

<p>Los tipos MIME son establecidos&nbsp;por defecto como&nbsp;<strong>text/plain</strong>&nbsp;para archivos de texto&nbsp;y&nbsp;como&nbsp;<strong>application/octet-stream</strong>&nbsp;para el resto de casos.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666300913.jpg" style="height:808px; width:730px" /></p>

<p>Los siguientes enlaces externos redirigen a listas m&aacute;s amplias de tipos MIME.</p>

<p><a href="https://developer.mozilla.org/es/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Lista_completa_de_tipos_MIME" target="_blank">Lista completa de tipos MIME</a></p>

<p><a href="https://www.iana.org/assignments/media-types/media-types.xhtml" target="_blank">Lista oficial de todos los tipos MIME</a></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'NULL'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //97
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'JSP',
            'slug' => 'jsp',
            'body_main' => 'JSP en Java',
            'body_plus' => '<p>Los JSP (Java Server Page) son archivos que permiten contener datos en formato HTML y datos en c&oacute;digo&nbsp;Java (mediante los JSP tags). Estos archivos son ejecutados&nbsp;en el servidor y est&aacute;n&nbsp;orientados para mostrar informaci&oacute;n al usuario.&nbsp;En un proyecto de tipo MVC (Modelo,Vista,Controlador) los JSP son equivalentes a las denominadas vistas o views que utilizan muchos frameworks.</p>

<p>Los JSP permiten a&ntilde;adir piezas o bloques de c&oacute;digo Java mediante los JSP tags.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666301092.jpg" style="height:302px; width:754px" /></p>

<p>Por tanto, un documento&nbsp;<strong>JSP</strong>&nbsp;puede contener c&oacute;digo en lenguaje HTML y c&oacute;digo en lenguaje Java, siempre y cuando se encuentre envuelto por alguno de los JSP tags.</p>

<p><strong>Ejemplo b&aacute;sico de JSP</strong></p>

<p>&nbsp;</p>

<p>El c&oacute;digo siguiente consiste en un archivo JSP que crea una lista de tipo&nbsp;<strong>ArrayList</strong>&nbsp;nativa de&nbsp;<strong>Java</strong>&nbsp;y la muestra en un elemento desplegable tipo&nbsp;<strong>select</strong>&nbsp;nativo de&nbsp;<strong>HTML</strong>.</p>

<pre>
<code class="language-html">&lt;%@page import="java.util.ArrayList"%&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta http-equiv="Content-Type" content="text/html; charset=UTF-8"&gt;
        &lt;title&gt;JSP Page&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Ejemplo JSP&lt;/h1&gt;
        &lt;%
            ArrayList&lt;String&gt; el = new ArrayList&lt;String&gt;();
            el.add("Secador de pelo");
            el.add("Batidora");
            el.add("Aspiradora");
            el.add("Frigorífico");
            el.add("Microondas");
            el.add("Lavavajillas");
        %&gt;
        &lt;select&gt;
            &lt;% 
                for(String e : el){
                    out.println("&lt;option&gt;"+e+"&lt;/option&gt;");
                }
            %&gt;
        &lt;/select&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Obtener datos desde un JavaBeans</p>

<p>&nbsp;</p>

<p>El ejemplo anterior es totalmente funcional y v&aacute;lido. Sin embargo se recomienda manejar los datos mediante el&nbsp;<a href="https://bahiaxip.com/posts/222/edit" target="_blank">patr&oacute;n MVC</a>.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/RKrMdWhTOuvqMuppAODLqT1OMYj38Sx3uydAETJx.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //98
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Seguridad en Apache Tomcat',
            'slug' => 'seguridad-en-apache-tomcat',
            'body_main' => 'Seguridad en aplicaciones web con Apache Tomcat',
            'body_plus' => '<p>Apache Tomcat permite a&ntilde;adir seguridad a un proyecto mediante la denominada seguridad basada en contenedores&nbsp;(Container Managed Security). Debido a la coincidencia de sus siglas (CMS) es preciso mencionar que este tipo de seguridad no guarda ninguna relaci&oacute;n con los conocidos Content Management System (Sistemas de gesti&oacute;n de contenido) tambi&eacute;n llamados popularmente gestores de contenido (Wordpress, Blogger, Joomla, etc...).</p>

<p>Esta seguridad permite la configuraci&oacute;n de usuarios, contrase&ntilde;as y roles en una base de datos, definida&nbsp;en el archivo web.xml.&nbsp;Esta configuraci&oacute;n de seguridad se basa en dos etiquetas:&nbsp;&nbsp;La primera (<strong>security-constraint</strong>), que permite proteger un conjunto de directorios y su contenido, y la segunda (<strong>login-config</strong>), que permite asignar el tipo de autenticaci&oacute;n de los usuarios. Este tipo de autenticaci&oacute;n se clasifica generalmente en dos modelos: La configuraci&oacute;n con&nbsp;<strong>BASIC</strong>,<strong>&nbsp;</strong>que dispone de un formulario predefinido por el navegador y la configuraci&oacute;n con&nbsp;<strong>FORM</strong>&nbsp;que requiere de un formulario dise&ntilde;ado previamente por el desarrollador.</p>

<p>La base de datos, denominada&nbsp;<strong>Realm</strong>, permite identificar el acceso que dispone un usuario en una aplicaci&oacute;n o un conjunto de aplicaciones web.</p>

<p>Existen 6 tipos de Realm, de los que destacan&nbsp;2 por ser los m&aacute;s utilizados.</p>

<p><strong>UserDatabaseRealm</strong>: La base de datos y los distintos roles se encuentran en un archivo xml (conf/tomcat-users.xml). Es recomendable para aplicaciones web con una cantidad peque&ntilde;a de usuarios.</p>

<p><strong>JDBCRealm</strong>: Los usuarios y roles se almacenan en una base de datos relacional. El acceso a la base de datos se puede realizar mediante JDBC y es recomendable para aplicaciones web con una gran cantidad de usuarios.</p>

<p><strong>USERDATABASEREALM</strong></p>

<p>La configuraci&oacute;n de un Realm de tipo UserDatabase se realiza mediante archivos de tipo XML. La creaci&oacute;n de roles y usuarios se realizan en el archivo ya incluido, con el nombre de&nbsp;<strong>tomcat-users.xml</strong>&nbsp;y que se encuentra en la carpeta&nbsp;<strong>conf</strong>&nbsp;del directorio de Apache Tomcat.&nbsp; Mediante las etiquetas&nbsp;<strong>role</strong>&nbsp;y&nbsp;<strong>user</strong>&nbsp;se pueden crear los distintos roles y a continuaci&oacute;n asignarlos a un usuario.</p>

<pre>
<code class="language-xml">&lt;role rolename="role1"/&gt;
&lt;role rolename="role2"/&gt;
&lt;user username="user1" password="pass1" roles="role1"/&gt;
&lt;user username="user2" password="pass2" roles="role1,role2"/&gt;</code></pre>

<p>A continuaci&oacute;n se realiza la restricci&oacute;n de las rutas asociando los roles ya definidos mediante el archivo&nbsp;<strong>web.xml</strong></p>

<pre>
<code class="language-xml">&lt;security-constraint&gt;
    &lt;display-name&gt;Ruta protegida&lt;/display-name&gt;
    &lt;web-resource-collection&gt;
        &lt;web-resource-name&gt;Nombre de la ruta&lt;/web-resource-name&gt;
        &lt;url-pattern&gt;/directorio1/*&lt;/url-pattern&gt;
        &lt;url-pattern&gt;/users.jsp&lt;/url-pattern&gt;
    &lt;/web-resource-collection&gt;
    &lt;auth-constraint&gt;
        &lt;role-name&gt;role1&lt;/role-name&gt;
    &lt;/auth-constraint&gt;
&lt;/security-constraint&gt;
</code></pre>

<p>Es necesario tener en cuenta algunos aspectos para este tipo de configuraci&oacute;n:</p>

<ul>
    <li>Es necesario reiniciar Apache Tomcat cada vez que se asignen nuevos datos en los archivos de configuraci&oacute;n.</li>
    <li>Los roles son asignados por primera vez cuando el usuario accede a un ruta restringida.</li>
</ul>

<p><strong>&nbsp;AUTENTICACI&Oacute;N EN BASIC</strong></p>

<p>Los datos de autenticaci&oacute;n en&nbsp;<strong>BASIC</strong>&nbsp;se introducen en una ventana que proporciona el propio navegador. El&nbsp;tipo de autenticaci&oacute;n se indica con la palabra BASIC mediante la etiqueta&nbsp;<strong>login-config</strong>&nbsp;en el archivo web.xml.</p>

<pre>
<code class="language-xml">&lt;login-config&gt;
    &lt;auth-method&gt;BASIC&lt;/auth-method&gt;
&lt;/login-config&gt;</code></pre>

<p><strong>AUTENTICACI&Oacute;N EN FORM</strong></p>

<p>La autenticaci&oacute;n en&nbsp;<strong>FORM</strong>&nbsp;precisa de la creaci&oacute;n de un formulario que debe realizar el desarrollador y que debe permitir introducir los datos necesarios para autenticarse. En el archivo web.xml se deben indicar los archivos (jsp,html,...) del formulario en la etiqueta&nbsp;<strong>login-config</strong>.</p>

<pre>
<code class="language-xml">&lt;login-config&gt;
    &lt;auth-method&gt;FORM&lt;/auth-method&gt;
    &lt;form-login-config&gt;
        &lt;form-login-page&gt;/login.jsp&lt;/form-login-page&gt;
        &lt;form-error-page&gt;/error.jsp&lt;/form-error-page&gt;
    &lt;/form-login-config&gt;
&lt;/login-config&gt;</code></pre>

<p>Las etiquetas form-login-page y form-error-page permiten indicar los archivos de login y de error de formulario de autenticaci&oacute;n.&nbsp;Este formulario exige incluir los siguientes atributos y sus valores&nbsp; para que el servlet interno de Java identifique y permita realizar la validaci&oacute;n correctamente.</p>

<pre>
<code class="language-html">&lt;form action=\'j_security_check\' method=\'POST\'&gt;    
    &lt;input name=\'j_username\'&gt;
    &lt;input type=\'password\' name=\'j_password\'&gt;
  &lt;input type=\'submit\' &gt;
&lt;/form&gt;</code></pre>

<p>Un ejemplo de un formulario de autenticaci&oacute;n gen&eacute;rico basado en la estructura anterior podr&iacute;a ser similar al siguiente c&oacute;digo.&nbsp;</p>

<pre>
<code class="language-html">&lt;form name="form" action="j_security_check" method="POST"&gt;
    &lt;div class="form-group"&gt;
        &lt;label for="j_username"&gt;Usuario&lt;/label&gt;
        &lt;input name="j_username" type="text" class="form-control" placeholder="Nombre"&gt;
    &lt;/div&gt;
    &lt;div class="form-group"&gt;
        &lt;label for="j_password"&gt;Contraseña&lt;/label&gt;
        &lt;input type="password" name="j_password" class="form-control" placeholder="Contraseña"&gt;
        &lt;button type="submit" class="btn btn-success"&gt;Acceder&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>

<p>El archivo de error solamente se diferencia del archivo de login en que debe contener alg&uacute;n mensaje que indique un error de autenticaci&oacute;n en el formulario.</p>

<pre>
<code class="language-html">&lt;div class="bg-danger"&gt;
    El usuario o la contraseña no son correctos
&lt;/div&gt;
&lt;form name="form" action="j_security_check" method="POST"&gt;
    &lt;div class="form-group"&gt;
        &lt;label for="j_username"&gt;Usuario&lt;/label&gt;
        &lt;input name="j_username" type="text" class="form-control" placeholder="Nombre"&gt;
    &lt;/div&gt;
    &lt;div class="form-group"&gt;
        &lt;label for="j_password"&gt;Contraseña&lt;/label&gt;
        &lt;input type="password" name="j_password" class="form-control" placeholder="Contraseña"&gt;
        &lt;button type="submit" class="btn btn-success"&gt;Acceder&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>

<p>JDBCREALM</p>

<p>La configuraci&oacute;n de un Realm tipo&nbsp;<strong>JDBC</strong>&nbsp;se realiza tambi&eacute;n en un archivo de tipo&nbsp;<strong>XML</strong>&nbsp;pero, a diferencia del UserDataBaseRealm que usa el archivo tomcat-users.xml, JDBCRealm utiliza el archivo&nbsp;<strong>context.xml,</strong>&nbsp;ubicado en el directorio META-INF de la aplicaci&oacute;n y los datos para la autenticaci&oacute;n son almacenados en una base de datos relacional. Esta base de datos debe constar, como m&iacute;nimo, de dos tablas y, a su vez, estas tablas deben estar compuestas, al menos, por dos campos cada una (independientemente del campo identificador), algo similar a la imagen siguiente.<br />
<img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666301632.png" style="float:left; height:133px; margin-left:200px; margin-right:200px; width:484px" /></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>El archivo&nbsp;<strong>context.xml</strong>&nbsp;debe configurarse a&ntilde;adiendo los datos de conexi&oacute;n, el nombre de la base de datos, de las tablas y los campos para poder relacionarlas. El c&oacute;digo siguiente permite el acceso a una ruta especificando los datos de conexi&oacute;n, la base de datos y los datos requeridos de las dos tablas anteriores, adem&aacute;s,&nbsp;encriptando&nbsp;con MD5&nbsp;la contrase&ntilde;a introducida&nbsp;&nbsp;al enviar el formulario.</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;Context path="/home"&gt;
&lt;Realm  className="org.apache.catalina.realm.JDBCRealm"
            connectionName="admin" connectionPassword="admin"
            connectionURL="jdbc:mysql://localhost/sistemaJDBC"
            driverName="com.mysql.cj.jdbc.Driver"
            digest="MD5"
            roleNameCol="role"
            userCredCol="password"
            userNameCol="user"
            userRoleTable="role_user"
            userTable="user"&gt;
        &lt;CredentialHandler className="org.apache.catalina.realm.MessageDigestCredentialHandler"
                            algorithm="MD5"
                            iterations="1"
                            saltlength="0"/&gt;
    &lt;/Realm&gt;
&lt;/Context&gt;</code></pre>

<p>Este tipo de configuraci&oacute;n omite otras configuraciones como las de tipo&nbsp;UserDatabase&nbsp;y permite, mediante el conector&nbsp;JDBC, trabajar con distintos tipos de bases de datos(MySQL,PostgreSQL,...).&nbsp;De la misma forma que la autenticaci&oacute;n del tipo&nbsp;UserDataBase, el archivo web.xml permite indicar las rutas restringidas y las vistas del formulario.</p>

<ul>
    <li>El driver JDBC debe siempre estar instalado en&nbsp;el directorio WEB-INF/lib de la aplicaci&oacute;n y&nbsp;en el directorio lib de Apache Tomcat para evitar errores.</li>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/yfKuQajaeoiB4tUenADCwkZVnxxDBNbQDfTc1DYM.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //99
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar Android Studio',
            'slug' => 'instalar-android-studio',
            'body_main' => 'Instalación del IDE Android Studio',
            'body_plus' => '<p>Para la instalaci&oacute;n de Android Studio es necesario disponer del JDK instalado en el sistema y descargar el paquete de instalaci&oacute;n de Android Studio desde su&nbsp;<a href="https://developer.android.com/studio" target="_blank">p&aacute;gina oficial.</a></p>

<p>El primer paso es comprobar si el sistema ya tiene instalado el JDK (Java Development Kit) y a continuaci&oacute;n instalar el paquete descargado.</p>

<p><strong>COMPROBAR JDK (Windows)</strong></p>

<pre>
<code class="language-bash">set JAVA_HOME
</code></pre>

<p><strong>COMPROBAR JDK (Linux)</strong></p>

<pre>
<code class="language-bash">echo $JAVA_HOME
</code></pre>

<pre>
<code class="language-bash">update-alternatives --config java
</code></pre>

<p>Si al introducir alguno de los comandos anteriores en la consola aparece una ruta es que ya se encuentra instalado, si por el contrario no aparece nada, es necesario instalarlo.</p>

<p><strong>INSTALAR JDK&nbsp;</strong></p>

<p>Para instalar JDK en Windows es necesario descargar el paquete instalador de la&nbsp;<a href="https://www.oracle.com/technetwork/es/java/javase/downloads/index.html" target="_blank">p&aacute;gina oficial</a>&nbsp;y seguir los pasos de instalaci&oacute;n. En el caso de Linux se descarga el paquete binario comprimido y se descomprime en el directorio elegido, las rutas m&aacute;s comunes son&nbsp;<strong>/usr/java</strong>,&nbsp;<strong>/usr/jvm, /usr/local</strong>&nbsp;o&nbsp;<strong>/opt.&nbsp;</strong>Existe tambi&eacute;n la opci&oacute;n de instalar el paquete&nbsp;<strong>openjdk&nbsp;</strong>que se puede descargar desde los repositorios o para versiones m&aacute;s actualizadas desde la&nbsp;<a href="https://openjdk.java.net/install/" target="_blank">p&aacute;gina oficial</a>.</p>

<p><strong>CONFIGURAR JDK (Windows)</strong></p>

<p><strong>Acceder a la opci&oacute;n de configuraci&oacute;n de variables de entorno:</strong></p>

<p>Panel de Control &gt; Editar el sistema variables de entorno &gt; Variables de entorno.</p>

<p><strong>Crear una nueva variable de entorno de sistema:</strong></p>

<p>Pulsar el bot&oacute;n&nbsp;<strong>Nueva...</strong>&nbsp;que se encuentra en la parte&nbsp;inferior de la ventana. Se crea la variable indicando el nombre de la variable que se denominar&aacute;&nbsp;<strong>JAVA_HOME&nbsp;</strong>y el valor de la variable que ser&aacute; la ruta donde se encuentra instalado el JDK.&nbsp;Una vez creada la variable JAVA_HOME editamos la variable de sistema&nbsp;<strong>path</strong>&nbsp;y concatenamos&nbsp; con punto y coma el valor ya existente, la ruta de JAVA_HOME incluyendo al final el subdirectorio bin</p>

<p>&nbsp;</p>

<p>CONFIGURAR JDK (Linux)</p>

<p>La variable de entorno se puede crear en el archivo oculto&nbsp;<strong>.profile</strong>&nbsp;que se encuentra en la carpeta de usuario o en el archivo etc/profile. Para ello se edita uno de los archivos con el editor nano o gedit, se crea la variable&nbsp;<strong>JAVA_HOME</strong>,&nbsp;se actualiza la variable&nbsp;<strong>PATH&nbsp;</strong>y mediante el comando export se amplia el acceso de una variable de entorno local a una variable global.</p>

<pre>
<code class="language-bash">JAVA_HOME=[ruta del JDK]
export JAVA_HOME</code></pre>

<pre>
<code class="language-bash">PATH=$PATH:$JAVA_HOME/bin
export PATH
</code></pre>

<p><strong>L</strong>a variable JAVA_HOME almacena la ruta de instalaci&oacute;n del JDK o del OpenJDK mientras que la variable PATH se actualiza. La actualizaci&oacute;n de la variable PATH requiere ampliar la ruta del JDK&nbsp;con el subdirectorio bin que es donde se encuentra el archivo binario. A continuaci&oacute;n se muestra el bloque de c&oacute;digo de configuraci&oacute;n del Openjdk.</p>

<pre>
<code class="language-bash">JAVA_HOME=/usr/local/java/jdk-8-openjdk-amd64
export JAVA_HOME
PATH=$PATH:$JAVA_HOME/bin
export PATH</code></pre>

<p><strong>CONFIGURAR SDK</strong></p>

<p>La opci&oacute;n del gestor SDK se accede mediante la opci&oacute;n de configuraci&oacute;n al inicio o bien desde la opci&oacute;n de herramientas en la barra superior tal como se observa en las im&aacute;genes siguientes.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666301952.jpg" style="height:503px; width:334px" /><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666301967.jpg" style="height:324px; width:364px" /></p>

<p>El gestor SDK permite instalar m&uacute;ltiples opciones y versiones para Android. Se recomienda instalar las opciones&nbsp;<strong>Android SDK Tools&nbsp;</strong>y<strong>&nbsp;Support Repository&nbsp;</strong>desde la pesta&ntilde;a SDK Tools<strong>&nbsp;</strong>&nbsp;y desde la pesta&ntilde;a SDK Platform seleccionar las versiones de Android, y el gestor descargar&aacute; e instalar&aacute; en el sistema. Es preciso indicar que esta acci&oacute;n puede demorarse bastante, por tanto, es conveniente no instalar muchas versiones a la misma vez. Para tener una orientaci&oacute;n a la hora de seleccionar, es recomendable revisar el porcentaje de dispositivos que usan las distintas versiones de Android&nbsp;desde el el siguiente&nbsp;<a href="https://developer.android.com/about/dashboards" target="_blank">enlace</a>.&nbsp;</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666302002.png" style="height:541px; width:773px" /></p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666302035.png" style="height:471px; width:768px" /></p>

<p>Una vez realizados estos pasos es posible crear proyectos con el IDE Android Studio.</p>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/u1saYCTN1IEHA28kbf5fh9yPJj3Ew772QfENMM0R.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //100
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Estructura en Android',
            'slug' => 'estructura-en-android',
            'body_main' => 'Estructura de una aplicación Android',
            'body_plus' => '<p>La estructura de una aplicaci&oacute;n en Android est&aacute; compuesta por un conjunto de archivos y directorios que se crean dentro de un directorio ra&iacute;z. Este directorio ra&iacute;z est&aacute; identificado con el nombre introducido en la creaci&oacute;n del proyecto. La estructura puede variar seg&uacute;n el IDE o la versi&oacute;n utilizada del mismo, aunque siempre mantiene un conjunto de archivos&nbsp; comunes: el directorio&nbsp;<strong>src</strong>&nbsp;(source)&nbsp; que es el que contiene los archivos de desarrollo de la aplicaci&oacute;n, el directorio&nbsp;<strong>build</strong>&nbsp;que contiene los archivos que se generan en la compilaci&oacute;n y el directorios&nbsp;<strong>libs</strong>&nbsp;que contiene las librer&iacute;as externas. El directorio src es en el cual se encuentran los archivos b&aacute;sicos del proyecto, generalmente se divide en tres partes o subdirectorios:&nbsp;<strong>manifests</strong>,&nbsp;<strong>java</strong>&nbsp;y&nbsp;<strong>res</strong>.&nbsp;</p>

<p>La imagen siguiente muestra todos los m&eacute;todos y los estados (rect&aacute;ngulos con esquinas redondeadas y coloreados) por los que pasa una activity.&nbsp;</p>

<p style="text-align: center;"><strong>Ciclo de vida de un Activity</strong></p>

<p><strong><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666302139.png" style="height:663px; width:513px" /></strong></p>

<p>&nbsp;</p>

<p>El IDE puede mostrar una estructura del proyecto distinta a la que muestra el gestor o explorador de archivos del sistema. Esta vista, m&aacute;s simplificada, optimiza la navegaci&oacute;n entre los archivos&nbsp;durante el desarrollo.</p>

<p>Vista de un proyecto en Android Studio (versi&oacute;n 3.0)</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666302165.png" style="height:347px; width:379px" /></p>

<p>Vista de un proyecto en un gestor de archivos (Nautilus)</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666302188.png" style="height:133px; width:646px" /></p>

<p><strong>MANIFEST</strong></p>

<p>El manifest es un archivo xml que contiene informaci&oacute;n preconfigurada de la aplicaci&oacute;n y que permite configurar las activities. La informaci&oacute;n indica la versi&oacute;n de la aplicaci&oacute;n, la api m&iacute;nima y m&aacute;xima a la que est&aacute; dirigida, el icono de la aplicaci&oacute;n, el nombre del paquete,etc... Cada una de las activities debe encontrarse reflejada dentro de la etiqueta&nbsp;<strong>activity&nbsp;</strong>y una de ellas debe identificarse como la activity principal de la aplicaci&oacute;n. A continuaci&oacute;n un archivo manifest.xml b&aacute;sico compuesto de una sola activity</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;manifest xmlns:android="//schemas.android.com/apk/res/android"
    package="xip.midominio.com.miaplicacion"&gt;
    &lt;application
        android:allowBackup="true"
        android:icon="@mipmap/ic_launcher"
        android:label="@string/app_name"
        android:roundIcon="@mipmap/ic_launcher_round"
        android:supportsRtl="true"
        android:theme="@style/AppTheme"&gt;
        &lt;activity android:name=".MainActivity"&gt;
            &lt;intent-filter&gt;
                &lt;action android:name="android.intent.action.MAIN" /&gt;
                &lt;category android:name="android.intent.category.LAUNCHER" /&gt;
            &lt;/intent-filter&gt;
        &lt;/activity&gt;
    &lt;/application&gt;
&lt;/manifest&gt;</code></pre>

<p><strong>ACTIVITY</strong></p>

<p>Una&nbsp;<strong>Activity</strong>&nbsp;o Actividad en Android representa cada una de las ventanas de la aplicaci&oacute;n,&nbsp;configurada en el archivo manifest.xml y que&nbsp;consta de una parte gr&aacute;fica y una parte l&oacute;gica . La parte gr&aacute;fica viene definida en c&oacute;digo XML en el directorio de recursos y la parte l&oacute;gica viene definida en c&oacute;digo java.&nbsp;</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;RelativeLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="xip.midominio.com.miaplicacion.MainActivity"&gt;
&lt;/RelativeLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<p>En primeras versiones un&nbsp;<strong>activity</strong>&nbsp;heredaba de la clase Activity pero, a medida que Android ha ido evolucionando, creando nuevas versiones con nuevas funcionalidades, Android puede generar durante la creaci&oacute;n del proyecto la herencia de otras clases para el mismo fin, como pueden ser FragmentActivity, AppCompatActivity,etc...&nbsp;</p>

<p>Es necesario destacar el m&eacute;todo&nbsp;<strong>setContentView</strong>&nbsp;que se encarga de relacionar la parte gr&aacute;fica (XML) de la&nbsp; activity.</p>

<pre>
<code class="language-java">package com.mipaquete.app.miproyecto;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
public class MainActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }
}</code></pre>

<p><strong>Ejemplo de relaci&oacute;n de activities</strong></p>

<p>Activity principal</p>

<p>Parte gr&aacute;fica (<strong>activity_main.xml)</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"
    tools:context = ".MainActivity"&gt;
    &lt;EditText
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:id="@+id/caja"
        android:hint="nombre"
    /&gt;
    &lt;Button
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:id="@+id/boton"
        android:text="Enviar"
    /&gt;    
&lt;/LinearLayout&gt;</code></pre>

<p>Parte l&oacute;gica (<strong>MainActivity.java)</strong></p>

<pre>
<code class="language-java">package com.mipaquete.app.miproyecto;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        caja = (EditText) findViewById(R.id.caja);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.main,menu);
        return true;
    }
    @Override
    public void onClick(View v) {
        switch(v.getId()){
        case R.id.boton:
            texto = caja.getText().toString();
            Intent intent = new Intent(getBaseContext(),Otra.class);
            intent.putExtra("valor",texto);
            startActivity(intent);
            break;
        default:
            break;
    }
}</code></pre>

<p>Segunda Activity</p>

<p>Parte gr&aacute;fica&nbsp;<strong>(otra_activity.xml)</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;
    
    &lt;TextView
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:id="@+id/caja"
        android:text="@string/hola_mundo"
    /&gt;
&lt;/LinearLayout&gt;
</code></pre>

<p>Parte l&oacute;gica&nbsp;<strong>(Otra.java)</strong></p>

<pre>
<code class="language-java">package com.mipaquete.app.miproyecto;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
public class Otra extends AppCompatActivity implements OnClickListener {
    String val;
    TextView textview;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.otra_activity);
        textview = (TextView) findViewById(R.id.texto);
        Bundle extras = getIntent().getExtras();
        if(extras != null){
            val = extras.getString("valor");
            textview.setText(val);
        }        
    }
}</code></pre>

<p>Manifest.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;manifest xmlns:android="//schemas.android.com/apk/res/android"
    package="com.mipaquete.app.miproyecto"&gt;
    &lt;application
        android:allowBackup="true"
        android:icon="@mipmap/ic_launcher"
        android:label="@string/app_name"
        android:roundIcon="@mipmap/ic_launcher_round"
        android:supportsRtl="true"
        android:theme="@style/AppTheme"&gt;
        &lt;activity android:name="com.mipaquete.app.miproyecto.MainActivity"&gt;
            &lt;intent-filter&gt;
                &lt;action android:name="android.intent.action.MAIN" /&gt;
                &lt;category android:name="android.intent.category.LAUNCHER" /&gt;
            &lt;/intent-filter&gt;
        &lt;/activity&gt;
        
        &lt;activity android:name="com.mipaquete.app.miproyecto.Otra"&gt;
            &lt;intent-filter&gt;
                &lt;action android:name="android.intent.action." /&gt;
                &lt;category android:name="android.intent.category.DEFAULT" /&gt;
            &lt;/intent-filter&gt;
        &lt;/activity&gt;
    &lt;/application&gt;
&lt;/manifest&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ttedEM82iy6A0wOqxGcU66nlv2kiYMO6poEfTWyr.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //101
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Layouts Android',
            'slug' => 'layouts-android',
            'body_main' => 'Layouts en Android',
            'body_plus' => '<p>Un layout en programaci&oacute;n se refiere a la disposici&oacute;n o el dise&ntilde;o de un conjunto de elementos. En Android un layout representa un contenedor que ordena y gestiona el dise&ntilde;o de los elementos de la interfaz gr&aacute;fica de un modo determinado. Estos contenedores pueden contener, a su vez, otros contenedores son configurados mediante un archivo xml (dentro del directorio layouts). Una de las caracter&iacute;sticas m&aacute;s importante es que permite organizar los elementos (botones, etiquetas, campos de texto...) manteniendo la misma apariencia en diferentes dispositivos y a distintas resoluciones.</p>

<p><strong>LinearLayout</strong></p>

<p>Es uno de los layouts m&aacute;s f&aacute;ciles y utilizados, permite orientar los elementos en direcci&oacute;n horizontal o vertical.&nbsp;Dispone del atributo&nbsp;orientation&nbsp;que permite asignar el valor, en el caso de horizontal los elementos se muestran de izquierda a derecha, en el caso vertical se van&nbsp;apilando de arriba hacia abajo y siempre en el orden que aparecen.</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"
    tools:context="com.xip.com.miAplicacion.MainActivity"&gt;
    &lt;EditText
        android:id="@+id/texto"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:hint="dato a guardar"/&gt;
    &lt;Button
        android:id="@+id/shared"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Guardar"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>RelativeLayout</strong></p>

<p>Este layout se caracteriza porque los elementos se posicionan en relaci&oacute;n a otros elementos. Mediante atributos permite indicar la posici&oacute;n&nbsp; respecto a otro elemento, ya sea, al mismo nivel o a un elemento padre. Este layout puede tener peque&ntilde;as variaciones en distintas resoluciones.</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;RelativeLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="xip.recetapp.com.crudandroid.MainActivity"&gt;
    &lt;Button
        android:id="@+id/botonCrearAlumnos"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:layout_alignParentTop="true"
        android:layout_centerHorizontal="true"
        android:layout_marginTop="79dp"
        android:text="Crear Alumnos" /&gt;        
    &lt;TextView
        android:id="@+id/contador"
        android:layout_width="fill_parent"
        android:layout_height="wrap_content"
        android:layout_alignParentLeft="true"
        android:layout_alignParentStart="true"
        android:layout_below="@+id/botonCrearAlumnos"
        android:layout_marginTop="19dp"
        android:gravity="center"
        android:text="En este momento no hay alumnos" /&gt;
&lt;/RelativeLayout&gt;</code></pre>

<p><strong>FrameLayout</strong></p>

<p>Ubica siempre los elementos en la parte superior izquierda y aunque dispone de padding y permite contener otros layouts que permiten el atributo padding generalmente se recomienda su uso para un &uacute;nico elemento.</p>

<pre>
<code class="language-xml">&lt;LinearLayout
        android:orientation="vertical"
        android:layout_width="match_parent"
        android:layout_height="match_parent"
        android:weightSum="10"
        &gt;
        &lt;include
            android:id="@+id/toolbar"
            layout="@layout/toolbar"/&gt;
        &lt;FrameLayout
            android:id="@+id/fragment"
            android:layout_width="match_parent"
            android:layout_height="match_parent" &gt;
        &lt;/FrameLayout&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MATCH PARENT&nbsp;</strong>Y<strong>&nbsp;WRAP CONTENT</strong></p>

<p>Existen dos atributos gen&eacute;ricos que permiten indicar el ancho y el alto (width y height) de casi todos los elementos. Estos atributos puede contener un valor espec&iacute;fico de porcentajes o un valor gen&eacute;rico de los dos existentes:&nbsp;<strong>match_parent</strong>&nbsp;y&nbsp;<strong>wrap_content</strong>.</p>

<p>El valor&nbsp;<strong>match parent&nbsp;</strong>o fill parent en versiones anteriores de Android indica que hereda el ancho del elemento padre que en caso de ser el primer elemento se considera que hereda el ancho total del dispositivo.</p>

<p>El&nbsp;valor&nbsp;<strong>wrap content</strong>&nbsp;indica que el ancho es proporcional al contenido de dicho elemento.</p>

<p><strong>ORIENTACI&Oacute;N</strong></p>

<p>La orientaci&oacute;n de pantalla en Android se divide en dos tipos:&nbsp;<strong>Portrait</strong>&nbsp;y&nbsp;<strong>Landscape</strong>, Portrait est&aacute; representado por el dispositivo en forma vertical y Landscape en forma horizontal. Generalmente en los dispositivos m&oacute;viles prevalece mayoritariamente el tipo de orientaci&oacute;n portrait mientras que tablets y otros dispositivos no mantienen una orientaci&oacute;n fija mayoritaria.&nbsp;</p>

<p>Los dispositivos disponen de sensores que detectan la orientaci&oacute;n en que se encuentran. Por defecto, Android&nbsp; mantiene el uso de una orientaci&oacute;n variable pero existe la opci&oacute;n de configurar una orientaci&oacute;n fija</p>

<p>Para mantener una orientaci&oacute;n fija es necesaria la configuraci&oacute;n desde el archivo manifest del proyecto mediante el atributo&nbsp;<strong>screenOrientation.&nbsp;</strong>Puede ser recomendable la ayuda del atributo&nbsp;configChanges&nbsp;que&nbsp;permite ocultar el teclado al detectar un cambio de orientaci&oacute;n del dispositivo.</p>

<pre>
<code class="language-xml">&lt;activity 
    android:name=".MainActivity"
    android:screenOrientation="portrait"
    android:configChanges="orientation|keyboardHidden"
    &gt;
    &lt;intent-filter&gt;
        &lt;action android:name="android.intent.action.MAIN" /&gt;
        &lt;category android:name="android.intent.category.LAUNCHER" /&gt;
    &lt;/intent-filter&gt;
&lt;/activity&gt;</code></pre>

<p>Adem&aacute;s, Android tambi&eacute;n ofrece la posibilidad de mantener un mismo layout para los dos tipos de orientaci&oacute;n o disponer de un layout independiente en cada caso.</p>

<p>La configuraci&oacute;n de un layout independiente se realiza mediante la creaci&oacute;n de un directorio con el nombre&nbsp;<strong>layout-land</strong>&nbsp;en el mismo nivel del directorio layout y en su interior los archivos xml correspondientes que no tienen porque mantener los mismos elementos, es decir, pueden ser totalmente distintos el layout de la orientaci&oacute;n vertical (portrait) y el layout de la orientaci&oacute;n horizontal(lanscape).</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/cYo1SNK37OJBPXfGGwKzf2H2KUuVmlBxwB429kWs.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //102
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Componentes en Android',
            'slug' => 'componentes-en-android',
            'body_main' => 'Componentes de la interfaz gráfica en Android',
            'body_plus' => '<p>Android dispone de m&uacute;ltiples elementos que componen la aplicaci&oacute;n como pueden ser botones, campos de texto, desplegables, etc... Estos componentes son creados en c&oacute;digo xml y disponen de atributos que permiten configurar las caracter&iacute;sticas de dicho elemento. A continuaci&oacute;n se muestra la implementaci&oacute;n de algunos de los componentes m&aacute;s b&aacute;sicos.</p>

<p><strong>TextView</strong></p>

<p>Este componente es el indicado para mostrar texto, es el equivalente a una etiqueta en html.</p>

<pre>
<code class="language-xml">&lt;TextView
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Hello World!"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintLeft_toLeftOf="parent"
        app:layout_constraintRight_toRightOf="parent"
        app:layout_constraintTop_toTopOf="parent" /&gt;</code></pre>

<p>Nota: Los atributos de tipo&nbsp;constraint pertenecen a un layout&nbsp;<strong>Constraint</strong>.</p>

<p><strong>AutoCompleteTextView</strong></p>

<p>Este componente es un TextView pero con la caracter&iacute;stica a&ntilde;adida de autocompletado. Es necesario relacionar los datos para dicha acci&oacute;n ya sea mediante c&oacute;digo Java o xml y la ayuda del adaptador ArrayAdapter.</p>

<p>activity.xml</p>

<pre>
<code class="language-xml">&lt;AutoCompleteTextView
        android:id="@+id/autocomplete"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:hint="Componentes"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintLeft_toLeftOf="parent"
        app:layout_constraintRight_toRightOf="parent"
        app:layout_constraintTop_toTopOf="parent" /&gt;</code></pre>

<p>Activity.java</p>

<pre>
<code class="language-java">public class MainActivity extends AppCompatActivity {
    AutoCompleteTextView autocomplete;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        autocomplete = (AutoCompleteTextView) findViewById(R.id.autocomplete);
        String [] componentes = getResources().getStringArray(R.array.componentes);
        ArrayAdapter&lt;String&gt; adapter = new ArrayAdapter&lt;String&gt;(this,android.R.layout.simple_list_item_1,componentes);
        autocomplete.setAdapter(adapter);
    }
}</code></pre>

<p>string.xml (datos fuente)</p>

<pre>
<code class="language-xml">&lt;resources&gt;
    &lt;string name="app_name"&gt;EditTextAutoComplete&lt;/string&gt;
    &lt;string-array name="componentes"&gt;
        &lt;item&gt;Monitor&lt;/item&gt;
        &lt;item&gt;USB&lt;/item&gt;
        &lt;item&gt;Tarjeta Gráfica&lt;/item&gt;
        &lt;item&gt;Procesador&lt;/item&gt;
        &lt;item&gt;Disco Duro&lt;/item&gt;
        &lt;item&gt;Torre&lt;/item&gt;
        &lt;item&gt;Placa Base&lt;/item&gt;
        &lt;item&gt;Ventilador&lt;/item&gt;
    &lt;/string-array&gt;
&lt;/resources&gt;</code></pre>

<p><strong>EditText</strong></p>

<p>El campo de texto o caja de texto es el componente indicado para introducir datos. Es el elemento m&aacute;s utilizado en formularios y es el equivalente a un input en html. La caja de texto es configurable mediante el atributo&nbsp;<strong>inputType</strong>&nbsp;en el que su valor puede variar seg&uacute;n el tipo de dato a introducir, es decir, la caja puede estar definida para introducir un tipo de dato num&eacute;rico, un tipo de dato fecha, un tipo de dato correo... Este valor puede atribuir peque&ntilde;as caracter&iacute;sticas distintas, como pueden ser la visualizaci&oacute;n directa del teclado n&uacute;merico o un tipo de teclado que incluye el s&iacute;mbolo de la arroba. Otro atributo destacable es el atributo&nbsp;<strong>password</strong>&nbsp;que acepta los valores true o false permitiendo ocultar los caracteres introducidos de la contrase&ntilde;a.</p>

<pre>
<code class="language-xml">&lt;EditText
        android:id="@+id/editTextTarea"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:layout_alignParentTop="true"
        android:layout_centerHorizontal="true"
        android:layout_marginTop="96dp"
        android:text=" "
        android:inputType="textPersonName"
        android:password="true"
/&gt;     </code></pre>

<p><strong>Button</strong></p>

<p>Un bot&oacute;n es un tipo de elemento que permite interactuar con el usuario y que generalmente realiza alg&uacute;n tipo de acci&oacute;n.</p>

<pre>
<code class="language-xml">&lt;Button
        android:id="@+id/Enviar"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Button" /&gt;</code></pre>

<p><strong>CheckBox</strong></p>

<p>Las cajas de chequeo o de verificaci&oacute;n permiten marcar o desmarcar opciones sin que se mantenga ninguna relaci&oacute;n una opci&oacute;n respecto a otra.</p>

<pre>
<code class="language-xml">&lt;CheckBox
        android:id="@+id/checkbox1"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Hombre"
    /&gt;</code></pre>

<p><strong>Spinner</strong></p>

<p>Un spinner es un elemento similar a un bot&oacute;n que al accionarlo despliega un conjunto de opciones (tambi&eacute;n denominadas items), es el equivalente al elemento select en html.</p>

<pre>
<code class="language-xml">&lt;Spinner
        android:id="@+id/spinner"
        android:layout_width="368dp"
        android:layout_height="wrap_content"
        android:layout_marginBottom="134dp"
        android:layout_marginEnd="8dp"
        android:layout_marginStart="8dp"
        android:layout_marginTop="97dp"&gt;</code></pre>

<p><strong>ListView</strong></p>

<p>Este elemento est&aacute; formado por una lista que contiene un item o un conjunto de items que pueden ser personalizables y que permite incluir un gran n&uacute;mero de elementos ordenados de arriba hacia abajo.</p>

<pre>
<code class="language-xml">&lt;ListView
    android:id="@+id/listview"
    android:layout_width="match_parent"
    android:layout_height="wrap_content"
&gt;
&lt;/ListView&gt;</code></pre>

<p><strong>ImageView</strong></p>

<p>Es uno de los elementos m&aacute;s utilizado para mostrar im&aacute;genes en una vista o activity. Las im&aacute;genes se almacenan dentro de la carpeta&nbsp;<strong>drawable</strong>&nbsp;que contiene los distintos directorios que corresponden a las distintas resoluciones (-dpi,-mdpi,-hdpi,...etc) manteniendo el mismo nombre de imagen en todos ellos.</p>

<pre>
<code class="language-xml">&lt;ImageView
    android:id="@+id/imagen"
    android:layout_width="200px"
    android:layout_height="200px"
    android:src="@drawable/imagen"
/&gt;</code></pre>

<p>Independientemente de que exista una imagen asignada es posible sobrescribir la imagen desde la clase.</p>

<pre>
<code class="language-java">public class MainActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);        
        imagen = (ImageView) findViewById(R.id.imagen);
        image.setImageResource(R.drawable.imagen_alternativa
    }
}</code></pre>

<p><strong>ScrollView</strong></p>

<p>El ScrollView es un elemento similar al ListView pero permite contener distintos elementos y poder desplazarse por todos los elementos haciendo uso de la funci&oacute;n t&aacute;ctil del dispositivo.</p>

<pre>
<code class="language-xml">&lt;ScrollView xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context=".MainActivity"&gt;
    &lt;LinearLayout
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:orientation="vertical" &gt;
        &lt;EditText
            android:id="@+id/id"
            android:hint="ID"
            android:layout_width="match_parent"
            android:layout_height="wrap_content" /&gt;
        &lt;EditText
            android:id="@+id/nombre"
            android:hint="Nombre"
            android:layout_width="match_parent"
            android:layout_height="wrap_content" /&gt;
        &lt;EditText
            android:id="@+id/apellido"
            android:hint="Apellido"
            android:layout_width="match_parent"
            android:layout_height="wrap_content" /&gt;
    &lt;/LinearLayout&gt;
&lt;/ScrollView&gt;</code></pre>

<p><strong>HorizontalView</strong></p>

<p>Este elemento es igual al elemento anterior ScrollView pero mostrando los elementos en sentido horizontal. Es necesario sustituir el atributo orientation a horizontal, y a su vez permite mostrar o no la barra de scroll mediante el atributo scrollbars.</p>

<pre>
<code class="language-xml">&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context=".MainActivity"&gt;
    &lt;HorizontalScrollView
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:scrollbars="none"
        &gt;
        &lt;LinearLayout
            android:layout_width="match_parent"
            android:layout_height="wrap_content"
            android:orientation="horizontal" &gt;
            &lt;EditText
                android:id="@+id/id"
                android:hint="ID"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;EditText
                android:id="@+id/nombre"
                android:hint="Nombre"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;EditText
                android:id="@+id/apellido"
                android:hint="Apellido"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
        &lt;/LinearLayout&gt;
    &lt;/HorizontalScrollView&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>Toast</strong></p>

<p>Elemento en forma de mensaje flotante que aparece de forma temporal indicando alguna informaci&oacute;n.</p>

<pre>
<code class="language-java">Toast.makeText(getApplicationContext(), "Mensaje Toast", Toast.LENGTH_SHORT).show();
</code></pre>

<p><strong>WebView</strong></p>

<p>Elemento representado por un navegador nativo de Android que permite mostrar alg&uacute;n servicio o p&aacute;gina web en una activity y que adem&aacute;s permite configurar un conjunto de opciones relacionadas con el navegador como pueden ser la activaci&oacute;n de Javascript con setJavascriptEnabled() o enlazar a la ruta anterior utilizando el historial del navegador con goBack(),etc.. Se puede ampliar la informaci&oacute;n&nbsp;<a href="https://developer.android.com/guide/webapps/webview?hl=es-419#java" target="_blank">aqu&iacute;</a>.&nbsp;</p>

<p>activity_main.xml</p>

<pre>
<code class="language-xml">&lt;WebView
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:id="@+id/navegador"
/&gt;</code></pre>

<p>MainActivity.java</p>

<pre>
<code class="language-java">WebView webview;
protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        webview = (WebView)findViewById(R.id.navegador);
        webview.loadUrl("//bahiaxip.com");
    }</code></pre>

<p>MainActivity.java (WebView con opciones)</p>

<ul>
    <li>setJavascriptEnabled: Activaci&oacute;n de Javascript</li>
    <li>setBuiltInZoomControls: Opci&oacute;n de zoom</li>
    <li>setWebViewClient: Mantiene las redirecciones en el mismo navegador</li>
</ul>

<pre>
<code class="language-java">WebView webview;
protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        webview = (WebView)findViewById(R.id.navegador);
        webview.getSettings().setJavascriptEnabled(true);
        webview.getSettings().setBuiltInZoomControls(true);        
        webview.loadUrl("//bahiaxip.com");
        webview.setWebViewClient(new WebViewClient(){
            public boolean shouldOverrideUrlLoading(WebView view, String url){
                return false;
            }
        });
    }</code></pre>

<p>El elemento WebView requiere permisos de acceso a internet.</p>

<p><strong>DatePicker</strong></p>

<p>Es un elemento predefinido por Android que permite seleccionar una fecha (d&iacute;a, mes, a&ntilde;o) y almacenarla en una variable o en otro elemento, para despu&eacute;s poder realizar alg&uacute;n tipo de acci&oacute;n.</p>

<p>A continuaci&oacute;n un ejemplo b&aacute;sico de DatePicker</p>

<p>archivo xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;android.support.constraint.ConstraintLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="xip.midominio.com.datepicker.MainActivity"&gt;
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Hello World!"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintLeft_toLeftOf="parent"
        app:layout_constraintRight_toRightOf="parent"
        app:layout_constraintTop_toTopOf="parent" /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Enviar"
        /&gt;
&lt;/android.support.constraint.ConstraintLayout&gt;
</code></pre>

<p>archivo java</p>

<pre>
<code class="language-java">package xip.midominio.com.datepicker;
import android.app.DatePickerDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.TextView;
import android.view.View.OnClickListener;
import java.util.Calendar;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    TextView texto;
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        switch(v.getId()){
            case R.id.boton:
                final Calendar c = Calendar.getInstance();
                int mYear = c.get(Calendar.YEAR);
                int mMonth = c.get(Calendar.MONTH);
                int mDay = c.get(Calendar.DAY_OF_MONTH);
                DatePickerDialog dpd = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {
                    @Override
                    public void onDateSet(DatePicker datePicker, int year, int month, int day) {
                        texto.setText(day+"-"+month+"-"+year);
                    }
                },mYear,mMonth,mDay);
                dpd.show();
                break;
            default:
                break;
        }
    }
}</code></pre>

<p>TimePicker</p>

<p>Es el mismo elemento que DatePicker pero permite establecer la hora (horas y minutos) en lugar de la fecha.&nbsp;</p>

<p>A continuaci&oacute;n un ejemplo de TimePicker manteniendo el mismo c&oacute;digo xml que el ejemplo DatePicker.</p>

<pre>
<code class="language-java">package xip.midominio.com.datepicker;
import android.app.DatePickerDialog;
import android.app.TimePickerDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.TextView;
import android.view.View.OnClickListener;
import android.widget.TimePicker;
import java.util.Calendar;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    TextView texto;
    Button boton;
    int mHour,mMinute;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        switch(v.getId()){
            case R.id.boton:
                TimePickerDialog tpd = new TimePickerDialog(this, new TimePickerDialog.OnTimeSetListener() {
                    @Override
                    public void onTimeSet(TimePicker timePicker, int hour, int minute) {
                        texto.setText(hour+":"+minute);
                    }
                },mHour,mMinute,false);
                tpd.show();
                break;
            default:
                break;
        }
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/GmeqEWykxtDjZAJDytvwEQzSe9V7QXWP2PIbOoOI.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //103
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Permisos en Android',
            'slug' => 'permisos-en-android',
            'body_main' => 'Asignación de permisos en Android',
            'body_plus' => '<p>Los permisos sirven para permitir acceso a funciones protegidas de un dispositivo. En Android existen dos clases de permisos:&nbsp;<strong>permisos normales</strong>&nbsp;y&nbsp;<strong>permisos riesgosos o peligrosos</strong>. Los permisos normales son los que no suponen un gran riesgo para la privacidad del usuario y se otorgan autom&aacute;ticamente, mientras que los permisos peligrosos si pueden suponer un riesgo a la privacidad, ya que permite a la aplicaci&oacute;n acceder a datos que pueden ser vulnerables y por ello se requiere la confirmaci&oacute;n del usuario. Todos los permisos peligrosos&nbsp;que pertenecen a Android pertenecen a un grupo de permisos.</p>

<p><strong>ASIGNAR PERMISOS</strong></p>

<p>A pesar de que Android permite definir permisos personalizados dispone de una&nbsp;<a href="https://developer.android.com/reference/android/Manifest.permission?hl=es-419" target="_blank">lista de permisos</a>, que suelen ser suficientes en la mayor&iacute;a de los casos.</p>

<p>La asignaci&oacute;n de permisos se realiza en el archivo AndroidManifest.xml.</p>

<p>Ejemplo de asignaci&oacute;n de permiso de escritura del almacenamiento externo.</p>

<pre>
<code class="language-xml">&lt;uses-permission android:name="android.permission.WRITE_EXTERNAL_STORAGE"/&gt;
</code></pre>

<p>SOLICITAR PERMISOS</p>

<p>La solicitud de permisos depende de la versi&oacute;n del sistema Android disponible. Si el dispositivo dispone de una versi&oacute;n&nbsp;6.0 (API 23)&nbsp;o superior, la solicitud se realiza en tiempo de ejecuci&oacute;n, es decir, en el momento que la acci&oacute;n de la aplicaci&oacute;n requiere esos permisos. Si la versi&oacute;n es&nbsp;5.1.1 (API 22)&nbsp;&nbsp;o inferior el sistema realiza la solicitud en el proceso de instalaci&oacute;n de la aplicaci&oacute;n.&nbsp;</p>

<p>La solicitud se realiza mediante una comprobaci&oacute;n utilizando el m&eacute;todo checkSelfPermission() de la clase ContextCompat o de la subclase ActivityCompat&nbsp; obteniendo como resultado un permiso concedido o un permiso denegado.</p>

<pre>
<code class="language-java">if(ContextCompat.checkSelfPermission(MainActivity.this,
Manifest.permission.WRITE_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED){
}</code></pre>

<p>SOLICITAR PERMISOS EN TIEMPO DE EJECUCI&Oacute;N</p>

<p>Para solicitar este tipo de permisos primero se debe realizar una solicitud y si la respuesta resulta un permiso denegado, se env&iacute;a una ventana de solicitud al usuario que permite aceptar o denegar dicho permiso. Este tipo de solicitud se realiza mediante el m&eacute;todo requestPermission() de la clase ActivityCompat&nbsp; y el tipo de ventana se encuentra definida por el sistema que puede variar de una versi&oacute;n a otra de Android.</p>

<pre>
<code class="language-java">if(ContextCompat.checkSelfPermission(MainActivity.this,
Manifest.permission.WRITE_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED){
    ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.WRITE_EXTERNAL_STORAGE}, 1);    
}</code></pre>

<p><strong>CONTROL DE RESPUESTA</strong></p>

<p>Otra opci&oacute;n m&aacute;s que ofrece Android es el control de respuesta de la solicitud. Esto es posible sobreescribiendo el m&eacute;todo onRequestPermissionsResult() que permite realizar cualquier acci&oacute;n si el usuario deniega la solicitud o incluso se puede detectar si se ha marcado la casilla &quot;no volver a mostrar&quot;.</p>

<pre>
<code class="language-java">@Override
public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        switch (requestCode){
            case PERMISSION_REQUEST_WRITE_EXTERNAL:
                if(grantResults.length &gt; 0 &amp;&amp; grantResults[0] == PackageManager.PERMISSION_GRANTED){
                    Log.i("Permisos","Permisos concedidos");                    
                }else{
                    if(ActivityCompat.shouldShowRequestPermissionRationale(MainActivity.this,
                          Manifest.permission.WRITE_EXTERNAL_STORAGE)){                        
                        Log.i("Permisos","Los permisos han sido denegados");
                    }else{
                        Log.i("Permisos","Los permisos y volver a preguntar han sido denegados");
                    }
                }
                break;
        }
}</code></pre>

<p>Ejemplo de solicitud de permiso</p>

<p>En este ejemplo se realiza una solicitud en tiempo de ejecuci&oacute;n mediante un m&eacute;todo (miMetodo) que exige aceptar la solicitud para poder pasar al m&eacute;todo guardarArchivo() y procesar el archivo. Esto se hace simplemente a&ntilde;adiendo un comando &quot;return&quot; que detiene la ejecuci&oacute;n.</p>

<pre>
<code class="language-java">public void miMetodo(){
        if(ContextCompat.checkSelfPermission(MainActivity.this,
            Manifest.permission.WRITE_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED){
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.WRITE_EXTERNAL_STORAGE}, PERMISSION_REQUEST_WRITE_EXTERNAL);
            return;
        }
        guardarArchivo();
}</code></pre>

<p>Ejemplo de solicitud&nbsp; con control de respuesta</p>

<p>Este ejemplo permite mostrar las distintas acciones de una solicitud en tiempo de ejecuci&oacute;n que se pueden realizar tanto si el usuario acepta el permiso, lo rechaza o lo rechaza junto con la casilla marcada de &quot;no volver a mostrar&quot;.&nbsp;</p>

<pre>
<code class="language-java">public void creatFile(){
        if(ContextCompat.checkSelfPermission(context,
            Manifest.permission.WRITE_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED){
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.WRITE_EXTERNAL_STORAGE}, PERMISSION_REQUEST_WRITE_EXTERNAL);
            return;
        }
        CreateAndWrite(sd);
}
@Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        switch (requestCode){
            case PERMISSION_REQUEST_WRITE_EXTERNAL:
                if(grantResults.length &gt; 0 &amp;&amp; grantResults[0] == PackageManager.PERMISSION_GRANTED){
                    Log.i("Permisos","Permiso correcto");
                    //CreateAndWrite(sd);
                }else{
                    if(ActivityCompat.shouldShowRequestPermissionRationale(MainActivity.this,
                          Manifest.permission.WRITE_EXTERNAL_STORAGE)){
                        Toast.makeText(context,"Los permisos son necesarios",Toast.LENGTH_LONG).show();
                        Log.i("Permisos","Deniega permisos");
                    }else{
                        Toast.makeText(context,"Puede activar los permisos en los ajustes de la apliación",Toast.LENGTH_LONG).show();
                    }
                }
                break;
        }
}</code></pre>

<p>Nota: El usuario siempre puede modificar los permisos desde la opci&oacute;n de ajustes manualmente.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/RKS6EmuEPBl2v5CRaKflvkXGiH7l8HJtlI1w4Wz3.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //104
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Dibujo 2D en Android',
            'slug' => 'dibujo-2d-en-android',
            'body_main' => 'Dibujar líneas y polígonos en Android',
            'body_plus' => '<p>De la misma manera que otros lenguajes permiten dibujar mediante paquetes o librer&iacute;as, Android dispone de una librer&iacute;a que permite dibujar gr&aacute;ficos en 2D de forma sencilla. Los dibujos se basan en la clase Paint que representa el trazo, el cual, dispone de m&eacute;todos para configurar el estilo del trazo y la clase Canvas que representa el lienzo y dispone de m&eacute;todos que realizan los distintos trazados. A continuaci&oacute;n algunos ejemplos de dibujo b&aacute;sicos.</p>

<p><strong>Dibujar L&iacute;neas</strong></p>

<p>El m&eacute;todo drawLine permite realizar trazos introduciendo los datos num&eacute;ricos que representan los puntos de coordenadas que indican el comienzo(x,y) y el fin del trazo (x,y).</p>

<p>Dibujo.java</p>

<pre>
<code class="language-java">package xip.midominio.com.dibujo;
import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.view.View;
public class Dibujo extends View {
    Paint paint = new Paint();
    public Dibujo(Context context){
        super(context);
        paint.setColor(Color.BLUE);
        paint.setStrokeWidth(8);
    }
    public void onDraw(Canvas canvas){
        canvas.drawLine(0,0,300,300,paint);
        canvas.drawLine(0,300,300,0,paint);
    }
}</code></pre>

<p>Dibujar pol&iacute;gonos</p>

<p>El m&eacute;todo&nbsp;<strong>drawRect</strong>&nbsp;permite realizar rect&aacute;ngulos introduciendo los puntos de coordenadas donde los dos primeros (x,y) indican el punto de inicio del rect&aacute;ngulo y los dos &uacute;ltimos (x,y) indican el punto final del rect&aacute;ngulo.</p>

<p>Dibujo.java</p>

<pre>
<code class="language-java">package xip.midominio.com.dibujo;
import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.view.View;
public class Dibujo extends View {
    Paint paint = new Paint();
    public Dibujo(Context context){
        super(context);
        paint.setColor(Color.BLACK);
        paint.setStrokeWidth(10);
    }
    public void onDraw(Canvas canvas){
        RectF rectF = new RectF(50,50,500,500);
        canvas.drawRect(rectF,paint);
    }
}</code></pre>

<p>El m&eacute;todo drawCircle permite realizar c&iacute;rculos introduciendo los puntos de coordenadas del centro del c&iacute;rculo (x,y) y el radio del c&iacute;rculo.</p>

<pre>
<code class="language-java">package xip.midominio.com.dibujo;
import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.view.View;
public class DibujarLineas extends View {
    Paint paint = new Paint();
    public DibujarLineas(Context context){
        super(context);
        paint.setColor(Color.BLUE);
        paint.setStrokeWidth(8);
    }
    public void onDraw(Canvas canvas){        
        canvas.drawCircle(250,250,150,paint);
    }
}
</code></pre>

<p>El m&eacute;todo drawOval permite realizar figuras ovaladas introduciendo un objeto RectF. Aunque no es recomendable,es posible prescindir del rect&aacute;ngulo y a&ntilde;adir los datos directamente a&ntilde;adiendo&nbsp;la anotaci&oacute;n de la API Lollipop.</p>

<pre>
<code class="language-java">package xip.midominio.com.dibujo;
import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.RectF;
import android.view.View;
public class DibujarLineas extends View {
    Paint paint = new Paint();
    public DibujarLineas(Context context){
        super(context);
        paint.setColor(Color.BLUE);
        paint.setStrokeWidth(8);
    }
    public void onDraw(Canvas canvas){        
        RectF oval = new RectF(1000,1200,280,280);
        canvas.drawOval(oval,paint);
    }
}</code></pre>

<p>En caso de dibujar varias figuras con distintos colores es necesario establecer el color antes de la creaci&oacute;n de cada figura.</p>

<pre>
<code class="language-java">package xip.midominio.com.dibujo;
import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.RectF;
import android.view.View;
public class DibujarLineas extends View {
    Paint paint = new Paint();
    public DibujarLineas(Context context){
        super(context);
        paint.setColor(Color.BLUE);
        paint.setStrokeWidth(8);
    }
    public void onDraw(Canvas canvas){        
        canvas.drawCircle(250,250,150,paint);
        paint.setColor(Color.GREEN);
        RectF oval = new RectF(1000,1200,280,280);
        canvas.drawOval(oval,paint);
    }
}</code></pre>

<p>La llamada a la clase se realiza desde el m&eacute;todo onCreate. Revisar los m&uacute;ltiples m&eacute;todos de la clase Canvas desde la&nbsp;<a href="https://developer.android.com/reference/android/graphics/Canvas" target="_blank">p&aacute;gina oficial</a></p>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.dibujo;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
public class MainActivity extends AppCompatActivity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);        
        setContentView(new Dibujo(this));
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/g5Ab8Z4i1KEQ7xfJJcTxm7AgxXUCarPAFcUXjUrq.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //105
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Animaciones en Android',
            'slug' => 'animaciones-en-android',
            'body_main' => 'Animaciones de vistas en Android',
            'body_plus' => '<p>Se consideran animaciones a cualquier sensaci&oacute;n de movimiento que se realiza de una imagen. Android dispone del paquete Animation que contiene varias clases dise&ntilde;adas para crear animaciones.</p>

<p>Las animaciones pueden llegar a exigir gran cantidad de recursos de del procesador, por tanto, se deben tratar con precauci&oacute;n ya que pueden ralentizar excesivamente la aplicaci&oacute;n. Android permite distintas formas de desarrollar estas animaciones pero es recomendable el desarrollo de animaciones en vistas mediante xml que permite ahorrar cierta cantidad de recursos.</p>

<p>A continuaci&oacute;n algunos ejemplos de las animaciones m&aacute;s b&aacute;sicas, compuestas por una imagen que realiza la animaci&oacute;n y un bot&oacute;n permite el comienzo. Es recomendable ordenar las animaciones en un directorio nombrado&nbsp;<strong>anim.</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="wrap_content"
    android:orientation="vertical"&gt;
    &lt;ImageView
        android:id="@+id/imagen"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:src="@drawable/ic_launcher_foreground"
        android:layout_gravity="center_horizontal"
        android:background="@color/colorPrimary"
        &gt;&lt;/ImageView&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Iniciar"
        android:layout_gravity="center_horizontal"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p>Rotaci&oacute;n</p>

<p>rotacion.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;rotate xmlns:android="//schemas.android.com/apk/res/android"
    android:fromDegrees="0"
    android:toDegrees="360"
    android:duration="2500"
    &gt;
&lt;/rotate&gt;</code></pre>

<p>MainActivity.java</p>

<pre>
<code class="language-java">package xip.midominio.com.rotacion;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.ImageView;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    ImageView imagen;
    Button boton;    
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        imagen=(ImageView)findViewById(R.id.imagen);
        boton= (Button)findViewById(R.id.boton);
        boton.setOnClickListener(this);        
    }
    public void onClick(View view) {
        switch(view.getId()){
            case R.id.boton:
                Animation rotacion = AnimationUtils.loadAnimation(this,R.anim.rotacion);
                rotacion.reset();
                imagen.startAnimation(rotacion);
                break;
            default:
                break;
        }
    }
}
</code></pre>

<p>Transici&oacute;n</p>

<p>transicion.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;translate xmlns:android="//schemas.android.com/apk/res/android"
    android:fromYDelta="0"
    android:toYDelta="200"
    android:duration="2000"
    &gt;</code></pre>

<p>MainActivity.java</p>

<pre>
<code class="language-java">package xip.midominio.com.transicion;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.ImageView;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    ImageView imagen;
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        imagen = (ImageView) findViewById(R.id.imagen);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View view){
        switch(view.getId()){
            case R.id.boton:
                Animation translate= AnimationUtils.loadAnimation(this,R.anim.transicion);
                translate.reset();
                imagen.startAnimation(translate);
                break;
            default:
                break;
        }
    }
}</code></pre>

<p>Mostrar/Ocultar</p>

<p>alpha.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;alpha xmlns:android="//schemas.android.com/apk/res/android"
    android:fromAlpha="0.0"
    android:toAlpha="1.0"
    android:duration="2000"
    android:repeatCount="infinite"
    &gt;
&lt;/alpha&gt;</code></pre>

<p>MainActivity.java</p>

<pre>
<code class="language-java">package xip.midominio.com.mostrar_ocultar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.Button;
import android.widget.ImageView;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    ImageView imagen;
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        imagen = (ImageView) findViewById(R.id.imagen);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View view){
        switch(view.getId()){
            case R.id.boton:
                Animation translate= AnimationUtils.loadAnimation(this,R.anim.alpha);
                translate.reset();
                imagen.startAnimation(translate);
                break;
            default:
                break;
        }
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/MvZreIzdavAo478mPWLfTlcbJL4x9ttZDQiYnQDe.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //106
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Llamadas en Android',
            'slug' => 'llamadas-en-android',
            'body_main' => 'Realizar llamadas y SMS en una aplicación',
            'body_plus' => '<p>Android ofrece la posibilidad de realizar llamadas y mensajes de texto sin necesidad de salir de la aplicaci&oacute;n mediante los llamados&nbsp;<strong>intents</strong>&nbsp;<strong>impl&iacute;citos</strong>. &Eacute;stos nos permiten&nbsp;aprovechar ciertas funcionalidades como&nbsp;realizar llamadas o mensajes de texto requiriendo para ello los correspondientes permisos.&nbsp;</p>

<p><strong>REALIZAR LLAMADA</strong></p>

<p>Una de las opciones se basa en realizar una llamada autom&aacute;tica, es decir, que realiza la llamada directamente&nbsp;(ACTION_CALL) y otra de las opciones consiste en preparar una llamada, es decir, preparar&nbsp;la llamada con el n&uacute;mero o contacto marcado lista para pulsar el bot&oacute;n de llamar (ACTION_DIAL).</p>

<p>Basic&aacute;mente la diferencia para el usuario entre una y otra es que &eacute;sta &uacute;ltima permite una &uacute;ltima revisi&oacute;n antes de realizar la llamada, sin embargo, para el desarrollador existe otra diferencia, la llamada autom&aacute;tica requiere de permisos mientras que la preparaci&oacute;n de llamada no requiere de ning&uacute;n permiso. Para ver la diferencia entre una y otra, a continuaci&oacute;n se muestra un ejemplo muy b&aacute;sico de una aplicaci&oacute;n con un &uacute;nico bot&oacute;n que al pulsarlo inicia la acci&oacute;n de cada una de las opciones de llamada y donde el n&uacute;mero es introducido de forma directa.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"
    &gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Llamar"
        /&gt;
&lt;/LinearLayout&gt;
</code></pre>

<p>Opci&oacute;n de llamada autom&aacute;tica (ACTION_CALL)</p>

<p>En esta opci&oacute;n existe adem&aacute;s otra diferencia en lo relativo a los permisos. Y es que hay que diferenciar entre la versi&oacute;n inferior a la 6.0 que se basta con un permiso en el AndroidManifest.xml y la versi&oacute;n 6.0 y superior que requiere de permisos extra que requieren confirmaci&oacute;n la primera vez que realiza la acci&oacute;n .</p>

<p>AndroidManifest.xml</p>

<pre>
<code class="language-xml">&lt;uses-permission android:name="android.permission.CALL_PHONE" /&gt;
</code></pre>

<p>MainActivity.java (versiones inferiores a 6.0)</p>

<pre>
<code class="language-java">package xip.midominio.com.llamadas_sms;
import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.boton:
                llamar();
                break;
            default:
                break;
        }
    }
    private void llamar() {
        Uri uri = Uri.parse("tel:657747447");
        Intent intent = new Intent(Intent.ACTION_CALL, uri);
        startActivity(intent);
    }
}</code></pre>

<p>MainActivity.java (versiones 6.0 o superiores)</p>

<pre>
<code class="language-java">package xip.midominio.com.llamadas_sms;
import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.Uri;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.boton:
                llamar();
                break;
            default:
                break;
        }
    }
    private void llamar() {
        Uri uri = Uri.parse("tel:657747447");        
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.CALL_PHONE) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this,new String[]{Manifest.permission.CALL_PHONE},225);            
            return;
        }
        Intent intent = new Intent(Intent.ACTION_CALL, uri);
        startActivity(intent);
    }
}</code></pre>

<p>Opci&oacute;n de llamada preparada (ACTION_DIAL)</p>

<p>Esta opci&oacute;n de llamada no requiere de ning&uacute;n permiso y la &uacute;nica diferencia respecto a la opci&oacute;n anterior es que la constante ACTION_CALL se sustituye por ACTION_DIAL.</p>

<pre>
<code class="language-java">package xip.midominio.com.llamadas_sms;
import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.boton:
                llamar();
                break;
            default:
                break;
        }
    }
    private void llamar() {
        Uri uri = Uri.parse("tel:657747447");
        Intent intent = new Intent(Intent.ACTION_DIAL, uri);
        startActivity(intent);
    }
}</code></pre>

<p>ENVIAR SMS</p>

<p>El env&iacute;o de mensajes de texto contin&uacute;a el mismo estilo de la llamada preparada con la variaci&oacute;n del Uri y el Intent y a&ntilde;adiendo el m&eacute;todo&nbsp;<strong>putExtra</strong>&nbsp;que permite introducir el texto del mensaje.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"
    &gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Enviar SMS"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.llamadas_sms;
import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener {
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        boton = (Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    @Override
    public void onClick(View v) {
        switch (v.getId()) {
            case R.id.boton:
                enviarSMS();
                break;
            default:
                break;
        }
    }
    private void enviarSMS() {
        Uri uri = Uri.parse("smsto:657747447");
        Intent intent = new Intent(Intent.ACTION_SENDTO, uri);
        intent.putExtra("sms_body","Enviando SMS");
        startActivity(intent);
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/zZAQeO46SgByxPjrj1WU4FavxfX38HufwbWbYluE.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //107
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Diálogos en Android',
            'slug' => 'dialogos-en-android',
            'body_main' => 'Ventanas de diálogo en Android',
            'body_plus' => '<p>Las ventanas de di&aacute;logo en Android son ventanas flotantes basadas en la clase Dialog y que permiten mostrar informaci&oacute;n o alguna indicaci&oacute;n al usuario. A continuaci&oacute;n un ejemplo de una ventana de di&aacute;logo b&aacute;sica.</p>

<p><strong>VENTANA DE DI&Aacute;LOGO B&Aacute;SICA</strong></p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Mostrar"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.dialogs;
import android.app.Dialog;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        boton=(Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        showDialog(0);
    }
    protected Dialog onCreateDialog(int id){
        Dialog dialog = null;
        if(id==0){
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder = builder.setIcon(R.drawable.ic_launcher_foreground);
            builder=builder.setTitle("Diálogo");
            dialog = builder.create();
        }
        return dialog;
    }
}</code></pre>

<p>VENTANA DE DI&Aacute;LOGO CON BOTONES</p>

<p>La ventana de di&aacute;logo con botones ofrece una interacci&oacute;n al usuario con posibilidad de hasta tres botones.</p>

<p>activity_main.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="texto de botón"
        /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Mostrar"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p>MainActivity.java</p>

<pre>
<code class="language-java">package xip.midominio.com.dialogs;
import android.app.Dialog;
import android.content.DialogInterface;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    Button boton;
    TextView texto;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton=(Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        showDialog(0);
    }
    protected Dialog onCreateDialog(int id){
        Dialog dialog = null;
        DialogoListener listener = new DialogoListener();
        if(id==0){
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder = builder.setIcon(R.drawable.ic_launcher_foreground);
            builder=builder.setTitle("Diálogo con botones");
            builder=builder.setMessage("Selecciona botón");
            builder = builder.setPositiveButton("Afirmativo",listener);
            builder = builder.setNegativeButton("Negativo",listener);
            builder = builder.setNeutralButton("Neutral",listener);
            dialog = builder.create();
        }
        return dialog;
    }
    class DialogoListener implements DialogInterface.OnClickListener{
        @Override
        public void onClick(DialogInterface dialogInterface, int i) {
            if(i == DialogInterface.BUTTON_POSITIVE){
                texto.setText("Positivo");
            }
            if(i == DialogInterface.BUTTON_NEGATIVE){
                texto.setText("Negativo");
            }
            if(i == DialogInterface.BUTTON_NEUTRAL){
                texto.setText("Neutral");
            }
        }
    }
}</code></pre>

<p>VENTANA DE DI&Aacute;LOGO CON ELEMENTOS</p>

<p>Ventana de di&aacute;logo que permite integrar una lista de elementos y realizar una acci&oacute;n determinada al seleccionar cada uno de los elementos.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Seleccionar elemento"
        /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Mostrar"
        /&gt;
&lt;/LinearLayout&gt;
</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.dialogs;
import android.app.Dialog;
import android.content.DialogInterface;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    Button boton;
    TextView texto;
    CharSequence[] items={"Procesador","Monitor","Tarjeta de red","Impresora"};
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton=(Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        showDialog(0);
    }
    protected Dialog onCreateDialog(int id){
        Dialog dialog = null;
        DialogoListener listener = new DialogoListener();
        if(id==0){
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder = builder.setIcon(R.drawable.ic_launcher_foreground);
            builder=builder.setTitle("Diálogo con elementos");
            builder.setItems(items,listener);
            dialog = builder.create();
        }
        return dialog;
    }
    class DialogoListener implements DialogInterface.OnClickListener{
        @Override
        public void onClick(DialogInterface dialogInterface, int i) {
            texto.setText("Elemento "+i);
        }
    }
}</code></pre>

<p>DI&Aacute;LOGO CON ELEMENTOS Y CONFIRMACI&Oacute;N</p>

<p>Esta ventana es similar a la anterior pero requiere de un paso m&aacute;s de confirmaci&oacute;n.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Seleccionar elemento y confirmar"
        /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Mostrar"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.dialogs;
import android.app.Dialog;
import android.content.DialogInterface;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    Button boton;
    TextView texto;
    CharSequence[] items={"Procesador","Monitor","Tarjeta de red","Impresora"};
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton=(Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        showDialog(0);
    }
    protected Dialog onCreateDialog(int id){
        Dialog dialog = null;
        DialogoListener listener = new DialogoListener();
        if(id==0){
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder = builder.setIcon(R.drawable.ic_launcher_foreground);
            builder=builder.setTitle("Diálogo con elementos confirmados");
            builder.setSingleChoiceItems(items,0,listener);
            builder.setPositiveButton("OK",listener);
            builder.setNegativeButton("Cancelar",listener);
            dialog = builder.create();
        }
        return dialog;
    }
    class DialogoListener implements DialogInterface.OnClickListener{
        @Override
        public void onClick(DialogInterface dialogInterface, int i) {
                int it = 0;
                if(i &gt;= 0){
                    texto.setText("Item " + i);
                }
                if(i == DialogInterface.BUTTON_NEGATIVE){
                    texto.setText("Opción cancelada" + i);
                }
        }
    }
}</code></pre>

<p>VENTANA DE DI&Aacute;LOGO CON M&Uacute;LTIPLES ELEMENTOS</p>

<p>Este tipo de ventana es similar a la anterior con la diferencia de que permite seleccionar varios elementos simult&aacute;neamente.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;    
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="texto de botón"
        /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Mostrar"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.dialogs;
import android.app.Dialog;
import android.content.DialogInterface;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.view.View.OnClickListener;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    Button boton;
    TextView texto;
    CharSequence[] items={"Procesador","Monitor","Tarjeta de red","Impresora"};
    boolean[] seleccionados = new boolean [items.length];
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton=(Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        showDialog(0);
    }
    protected Dialog onCreateDialog(int id){
        Dialog dialog = null;
        DialogoListener listener = new DialogoListener();
        MultipleListener multipleListener = new MultipleListener();
        if(id==0){
            AlertDialog.Builder builder = new AlertDialog.Builder(this);
            builder = builder.setIcon(R.drawable.ic_launcher_foreground);
            builder=builder.setTitle("Diálogo con opciones");
            builder.setMultiChoiceItems(items,seleccionados,multipleListener);
            builder.setPositiveButton("OK",listener);
            builder.setNegativeButton("Cancelar",listener);
            dialog = builder.create();
        }
        return dialog;
    }
    class DialogoListener implements DialogInterface.OnClickListener{
        @Override
        public void onClick(DialogInterface dialogInterface, int i) {
            if(i &gt;= DialogInterface.BUTTON_POSITIVE){
                texto.setText("Items ");
                for(int j = 0;j&lt;seleccionados.length;j++){
                    if(seleccionados[j]){
                        texto.append("\n"+items[j]);
                    }
                }
            }
            if(i == DialogInterface.BUTTON_NEGATIVE){
                texto.setText("Opción cancelada");
            }
        }
    }
    class MultipleListener implements DialogInterface.OnMultiChoiceClickListener{
        @Override
        public void onClick(DialogInterface dialogInterface, int i, boolean seleccionados) {
        }
    }
}</code></pre>

<p><strong>VENTANA DE DI&Aacute;LOGO PERSONALIZADO</strong></p>

<p>Este tipo de ventana de di&aacute;logo permite a&ntilde;adir los elementos de forma personalizada mediante un segundo layout y la clase onCreateDialog. Es el tipo de ventana de di&aacute;logo m&aacute;s compleja.</p>

<p>activity_main.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;    
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="texto de botón"
        /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Mostrar"
        /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p>dialogo.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="wrap_content"
    android:orientation="vertical"&gt;
    &lt;TextView
        android:id="@+id/textoDial"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="botón de diálogo"
        /&gt;
    &lt;EditText
        android:id="@+id/campoDial"
        android:layout_width="match_parent"
        android:layout_height="wrap_content" /&gt;
    &lt;Button
        android:id="@+id/botonDial"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="botón de diálogo"/&gt;
&lt;/LinearLayout&gt;
</code></pre>

<p>MainActivity.java</p>

<pre>
<code class="language-java">package xip.midominio.com.dialogs;
import android.app.Dialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.view.View.OnClickListener;
import android.widget.EditText;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    TextView texto;
    Button boton;
    TextView textoD;
    EditText edittext;
    Button botonD;
    int id = 0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton=(Button) findViewById(R.id.boton);
        boton.setOnClickListener(this);
    }
    @Override
    public void onClick(View view) {
        showDialog(id);
    }
    protected Dialog onCreateDialog(int id){
        Dialog dialog = new Dialog(this);
        Window window = dialog.getWindow();
        int flag = WindowManager.LayoutParams.FLAG_SHOW_WALLPAPER;
        window.setFlags(flag,flag);
        dialog.setTitle("Diálogo personalizado");
        dialog.setContentView(R.layout.dialogo);
        textoD = (TextView) dialog.findViewById(R.id.textoDial);
        edittext = (EditText) dialog.findViewById(R.id.campoDial);
        botonD = (Button) dialog.findViewById(R.id.botonDial);
        botonD.setOnClickListener(new Dialogo());
        return dialog;
    }
    class Dialogo implements OnClickListener{
        @Override
        public void onClick(View view) {
            texto.setText(edittext.getText().toString());
            dismissDialog(id);
        }
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/BA8v5EtrIRLqfdpOuuXwPaWyyjQztfk3vQuXD4cX.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //108
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Sonidos en Android',
            'slug' => 'sonidos-en-android',
            'body_main' => 'Sonidos con SoundPool y Mediaplayer en Android',
            'body_plus' => '<p>SoundPool (OBSOLETO. Para API 21 o superiores es recomendable SoundPool.Builder)</p>

<p>SoundPool es una librer&iacute;a nativa de Android que permite reproducir audio desde un archivo. A continuaci&oacute;n un ejemplo de reproducci&oacute;n de un sonido.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;android.support.constraint.ConstraintLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="xip.midominio.com.sonidos.MainActivity"&gt;
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Hello World!"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintLeft_toLeftOf="parent"
        app:layout_constraintRight_toRightOf="parent"
        app:layout_constraintTop_toTopOf="parent" /&gt;
&lt;/android.support.constraint.ConstraintLayout&gt;
</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.sonidos;
import android.media.AudioManager;
import android.media.SoundPool;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.MotionEvent;
import android.view.View;
import android.view.View.OnTouchListener;
public class MainActivity extends AppCompatActivity implements OnTouchListener{
    private SoundPool soundPool;
    private int soundID;
    boolean loaded;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        View view = findViewById(R.id.texto);
        view.setOnTouchListener(this);
        this.setVolumeControlStream(AudioManager.STREAM_MUSIC);
        soundPool = new SoundPool(10,AudioManager.STREAM_MUSIC,0);
        soundPool.setOnLoadCompleteListener(new SoundPool.OnLoadCompleteListener() {
            @Override
            public void onLoadComplete(SoundPool soundPool, int i, int i1) {
                loaded = true;
            }
        });
        soundID = soundPool.load(this,R.raw.sound37,1);
    }
    public boolean onTouch(View v, MotionEvent event){
        if(event.getAction() == MotionEvent.ACTION_DOWN){
            AudioManager audioManager = (AudioManager)getSystemService(AUDIO_SERVICE);
            float volumenActual = (float) audioManager.getStreamVolume(AudioManager.STREAM_MUSIC);
            float volumenMax = (float) audioManager.getStreamMaxVolume(audioManager.STREAM_MUSIC);
            float volumen = volumenActual / volumenMax;
            if(loaded){
                soundPool.play(soundID,volumen,volumen,1,0,1f);
                Log.e("test","reproduce sonido");
            }
        }
        return false;
    }
}</code></pre>

<p>MediaPlayer</p>

<p>Esta librer&iacute;a permite reproducir sonido y v&iacute;deo.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"
    &gt;
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Hello World!"
        /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Play"/&gt;
    &lt;Button
        android:id="@+id/boton2"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Stop"/&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.mediplayer;
import android.media.MediaPlayer;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    Button boton,boton2;
    TextView texto;
    public MediaPlayer mp;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView) findViewById(R.id.texto);
        boton = (Button) findViewById(R.id.boton);
        boton2 = (Button) findViewById(R.id.boton2);
        boton.setOnClickListener(this);
        boton2.setOnClickListener(this);
    }
    public void onClick(View view){
        switch(view.getId()){
            case R.id.boton:
                play_mp();
                break;
            case R.id.boton2:
                stop_mp();
                break;
            default:
                break;
        }
    }
    public void play_mp(){
        mp = MediaPlayer.create(this,R.raw.sound37);
        mp.start();
    }
    public void stop_mp(){
        mp.stop();
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/aS8U4nV2ODylmXUDO2WLOdo2RSE3ysax8HWPEvLR.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //109
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Menú en Android',
            'slug' => 'menu-en-android',
            'body_main' => 'Menús en Android',
            'body_plus' => '<p>Un men&uacute; en Android es un componente que al pulsarlo se abre un desplegable con distintas opciones. Al comienzo de Android el men&uacute; se inclu&iacute;a en todos los proyectos debido a que los dispositivos Android dispon&iacute;an de un bot&oacute;n f&iacute;sico llamado menu. Desde la API 11 es un componente opcional y que no est&aacute; relacionado con ning&uacute;n bot&oacute;n. A continuaci&oacute;n se muestra el c&oacute;digo de un ejemplo de men&uacute; b&aacute;sico con tres opciones.</p>

<p><strong>Men&uacute;</strong></p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"&gt;
    &lt;TextView
        android:id="@+id/texto"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Menú"
         /&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.menu;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity {
    TextView texto;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView)findViewById(R.id.texto);
    }
    public boolean onCreateOptionsMenu(Menu menu){
        super.onCreateOptionsMenu(menu);
        MenuItem item1 = menu.add(0,1,1,"Item1");
        MenuItem item2 = menu.add(0,2,2,"Item2");
        MenuItem item3 = menu.add(0,3,3,"Item3");
        item1.setIcon(R.drawable.ic_launcher_foreground);
        item2.setIcon(R.drawable.ic_launcher_foreground);
        item3.setIcon(R.drawable.ic_launcher_foreground);
        return true;
    }
    public boolean onOptionsItemSelected(MenuItem item){
        int id = item.getItemId();
        texto.setText("\n Seleccionado "+id);
        //texto.append("\n Seleccionado "+id);
        return true;
    }
}</code></pre>

<p>Submen&uacute;</p>

<p>El submen&uacute; permite crear otras opciones dentro de las opciones principales ampliando la estructura anterior.</p>

<pre>
<code class="language-java">package xip.midominio.com.menu;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.SubMenu;
import android.widget.TextView;
public class MainActivity extends AppCompatActivity {
    TextView texto;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        texto = (TextView)findViewById(R.id.texto);
    }
    public boolean onCreateOptionsMenu(Menu menu){
        super.onCreateOptionsMenu(menu);
        SubMenu sub1 = menu.addSubMenu(0,1,1,"Sub1");
        SubMenu sub2 = menu.addSubMenu(0,2,2,"Sub2");
        MenuItem item1 = sub1.add(0,3,3,"Item1");
        MenuItem item2 = sub1.add(0,4,4,"Item2");
        MenuItem item3 = sub2.add(0,5,5,"Item3");
        MenuItem item4 = sub2.add(0,6,6,"Item4");
        return true;
    }
    public boolean onOptionsItemSelected(MenuItem item){
        int id = item.getItemId();
        if(id&gt;2) {
            texto.setText("\n Seleccionado " + id);
            //texto.append("\n Seleccionado "+id);
        }
        return true;
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ajJy34gINJjUyCQ0qWApNjLj5KENxVdRSgiyjLPj.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //110
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Preferencias compartidas en Android',
            'slug' => 'preferencias-compartidas-en-android',
            'body_main' => 'Preferencias compartidas (SharedPreference) en Android',
            'body_plus' => '<p>PREFERENCIAS COMPARTIDAS</p>

<p>La clase&nbsp;<strong>SharedPreference</strong>&nbsp;es una clase que permite almacenar datos denominados primitivos, generalmente datos de configuraci&oacute;n de la aplicaci&oacute;n, en un archivo xml en la memoria del dispositivo en lugar de una base de datos y que de la misma forma que la base de datos al cerrar la aplicaci&oacute;n los datos se mantienen almacenados. Datos primitivos: byte,short,int,long,float,double,boolean,char.</p>

<p>Estas preferencias dispone de tres modos de almacenamiento:&nbsp;&nbsp;privado&nbsp;(private),&nbsp;legible&nbsp;(readable) y&nbsp;editable&nbsp;(writeable).</p>

<p><strong>Privado</strong>: Solo la aplicaci&oacute;n tiene acceso a ellas.</p>

<p><strong>Legible</strong>: Una aplicaci&oacute;n externa tiene solamente acceso de lectura.</p>

<p><strong>Editable</strong>: Una aplicaci&oacute;n externa tiene acceso de lectura y escritura.</p>

<p>A continuaci&oacute;n un ejemplo b&aacute;sico de SharedPreferences en el que se almacenan los datos introducidos y se leen esos datos.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"
    &gt;
    &lt;EditText
        android:id="@+id/editT"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:text="Nombre"
        /&gt;
    &lt;Button
        android:id="@+id/boton"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Guardar"/&gt;
&lt;/LinearLayout&gt;</code></pre>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.sharedpreference;
import android.content.Context;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.view.View.OnClickListener;
public class MainActivity extends AppCompatActivity implements OnClickListener{
    EditText editT;
    Button boton;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        editT = (EditText)findViewById(R.id.editT);
        boton = (Button) findViewById(R.id.boton);
        SharedPreferences pref = getSharedPreferences("nombre",Context.MODE_PRIVATE);
        editT.setText(pref.getString("nombre",""));
        boton.setOnClickListener(this);
    }
    public void onClick(View v){
        switch(v.getId()){
            case R.id.boton:
                String guardar = editT.getText().toString();
                SharedPreferences preferencias = getSharedPreferences("nombre", Context.MODE_PRIVATE);
                SharedPreferences.Editor editor = preferencias.edit();
                editor.putString("nombre",guardar);
                editor.commit();
                finish();
                break;
            default:
                break;
        }
    }
}</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/7kXYkuWpByTw6cUsJNqgE2ENxvKPVoMaLjDI6WGX.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);

        //111
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Opciones de almacenamiento en Android',
            'slug' => 'opciones-de-almacenamiento-en-android',
            'body_main' => 'Opciones de almacenamiento en Android',
            'body_plus' => '<p><strong>PREFERENCIAS COMPARTIDAS</strong></p>

<p>Las preferencias compartidas son un tipo de almacenamiento que permiten almacenar datos de la aplicaci&oacute;n en el dispositivo y&nbsp;no se recomienda para grandes cantidades de datos.</p>

<p><strong>ALMACENAMIENTO INTERNO</strong></p>

<p>Se considera almacenamiento interno a la memoria interna que contiene los datos del propio sistema operativo junto a sus aplicaciones. Esta memoria se encuentra integrada y forma parte del dispositivo, es decir, no se puede extraer f&aacute;cilmente de forma f&iacute;sica. Este tipo de memoria suele presentarse en tama&ntilde;os de 4GB, 8GB, 16GB, 32GB, 64GB, 128GB.,etc...</p>

<p><strong>ALMACENAMIENTO EXTERNO</strong></p>

<p>El almacenamiento externo en la mayor&iacute;a de dispositivos se encuentra instalado en el dispositivo de la misma forma que el almacenamiento interno, representado bajo una partici&oacute;n distinta, sin embargo, este tipo de almacenamiento viene dise&ntilde;ado para poder acceder f&aacute;cilmente a la mayor&iacute;a de archivos desde otras aplicaciones o dispositivos. Anteriormente se presentaba el almacenamiento externo solamente como tarjetas extra&iacute;bles, actualmente los dispositivos suelen traer una cantidad de memoria instalada como almacenamiento externo.</p>

<p>El almacenamiento externo tambi&eacute;n est&aacute; disponible de forma extra&iacute;ble en formatos de tarjeta SD, miniSD y microSD que se encuentra dentro del dispositivo pero, a diferencia de la anterior, &eacute;sta puede extraerse f&aacute;cilmente, generalmente mediante alguna trampilla o apertura que permite la expulsi&oacute;n de la tarjeta.&nbsp;</p>

<p>Por motivos de seguridad el almacenamiento externo requiere de configuraci&oacute;n de permisos, a diferencia del almacenamiento interno.</p>

<p><strong>BASES DE DATOS SQLITE</strong></p>

<p>Almacenamiento de datos en una base de datos basada en la librer&iacute;a SQLite que trabaja c&oacute;digo en lenguaje SQL, lenguaje utilizado en la mayor&iacute;a de bases de datos y que permite manejar datos y relaciones entre ellos.</p>

<p><strong>CONEXI&Oacute;N DE RED</strong></p>

<p>Almacenamiento basado en servidores internos.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/Imkde8Ey7HcbHmJeqRQvY1as8XX5dipYwp37ezDu.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);
        //112
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Persistencia de datos en Android',
            'slug' => 'persistencia-de-datos-en-android',
            'body_main' => 'Persistencia de datos en Android',
            'body_plus' => '<p>Existen casos como el cambio autom&aacute;tico de orientaci&oacute;n (al girar el dispositivo) en los que Android destruye la&nbsp;activity y&nbsp;crea una nueva, pero destruyendo tambi&eacute;n la informaci&oacute;n que ha sido introducida. Para solucionar esto Android ofrece m&eacute;todos que almacenan los datos de forma temporal para despu&eacute;s restaurarlos en la nueva Activity y as&iacute; mantener la&nbsp;persistencia de datos.</p>

<p>Con la aparici&oacute;n de los&nbsp;fragments&nbsp;el conflicto fue en aumento, ya que, estos m&eacute;todos solo son efectivos desde las activities, y, aunque era posible la persistencia, acababa convirti&eacute;ndose en un proceso algo complejo.&nbsp;Android opt&oacute; por una soluci&oacute;n efectiva, basada en el identificador de los componentes. As&iacute; pues, un componente que disponga de un&nbsp;ID&nbsp;&uacute;nico, autom&aacute;ticamente mantiene la persistencia de datos tanto en los activities como en los fragments.</p>

<p>Aun as&iacute; es conveniente conocer como trabajan estos m&eacute;todos que&nbsp;no pertenecen al ciclo de vida de la activity ni del fragment.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666365228.png" style="height:663px; width:513px" /><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666365248.png" style="height:847px; width:317px" /></p>

<p>A continuaci&oacute;n un ejemplo b&aacute;sico de persistencia de datos de un activity mediante estos m&eacute;todos.</p>

<p>activity_main.xml</p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="//schemas.android.com/apk/res/android"    
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    android:orientation="vertical"
    android:id="@+id/lay"
    tools:context="xip.midominio.com.persistencia.MainActivity"&gt;
    &lt;EditText        
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:hint="nombre"/&gt;
&lt;/LinearLayout&gt;</code></pre>

<p>MainActivity.java</p>

<pre>
<code class="language-java">package xip.midominio.com.persistencia;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;
import android.widget.LinearLayout;
 public class MainActivity extends AppCompatActivity {
    
    LinearLayout layout;
    EditText usuario;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);        
        layout = (LinearLayout) findViewById(R.id.lay);
        usuario = (EditText) layout.getChildAt(0);
    }
    @Override
    public void onSaveInstanceState(Bundle outState){
        super.onSaveInstanceState(outState);        
        outState.putString("nombre",usuario.getText().toString());
    }
     @Override
     protected void onRestoreInstanceState(Bundle savedInstanceState) {
         super.onRestoreInstanceState(savedInstanceState);
         usuario.setText(savedInstanceState.getString("nombre"));
     }
 }</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/ba8ihMgKC1ISxV3VzoaQdJgKMbhQbiluVeEqg5ez.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);
        //113
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Guardar y Leer en Android',
            'slug' => 'guardar-y-leer-en-android',
            'body_main' => 'Reciclaje de vista en Android',
            'body_plus' => '<p><strong>RECYCLERVIEW</strong></p>

<p>Este componente, basado en la clase&nbsp;<strong>RecyclerView</strong>, representa un contenedor en forma de lista, similar al&nbsp;<strong>ListView</strong>, pero m&aacute;s flexible y m&aacute;s eficiente. Este componente establece l&iacute;mites al n&uacute;mero de elementos que aparecen en la vista&nbsp;y mediante el desplazamiento realiza un proceso de reciclaje, que consiste b&aacute;sicamente en ir eliminando unos elementos y cargando otros, obteniendo como resultado una&nbsp;carga de datos m&aacute;s optimizada.</p>

<p>A continuaci&oacute;n, una aplicaci&oacute;n b&aacute;sica ejemplo de&nbsp;<strong>RecyclerView,</strong>&nbsp;apoy&aacute;ndose en dos subclases:&nbsp;la subclase&nbsp;<strong>RecyclerView.Adapter</strong>() que relaciona el layout con una lista de objetos y la subclase&nbsp;<strong>RecyclerView.ViewHolder</strong>&nbsp;que se encarga de almacenar los datos en los distintos elementos de la lista.&nbsp;</p>

<p>El layout principal define el elemento&nbsp;<strong>RecyclerView</strong>.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;android.support.constraint.ConstraintLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="xip.midominio.com.recyclerview.MainActivity"&gt;
    &lt;android.support.v7.widget.RecyclerView
        android:id="@+id/recycler"
        android:layout_width="match_parent"
        android:layout_height="match_parent"&gt;
    &lt;/android.support.v7.widget.RecyclerView&gt;
&lt;/android.support.constraint.ConstraintLayout&gt;</code></pre>

<p>El MainActivity genera una lista de objetos tipo Datos mediante el m&eacute;todo create(), declara el RecyclerView y establece el gestor de dise&ntilde;o (layout) y el adaptador (datosAdapter).</p>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.recyclerview;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import java.util.ArrayList;
import xip.midominio.com.recyclerview.POJOS.Adapters.DatosAdapter;
import xip.midominio.com.recyclerview.POJOS.Datos;
public class MainActivity extends AppCompatActivity {
    RecyclerView recyclerDatos;
    ArrayList&lt;Datos&gt; datos;
    DatosAdapter datosAdapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        create();
        recyclerDatos = (RecyclerView)findViewById(R.id.recycler);
        LinearLayoutManager layout = new LinearLayoutManager(this);
        layout.setOrientation(LinearLayoutManager.VERTICAL);
        recyclerDatos.setLayoutManager(layout);
        datosAdapter = new DatosAdapter(this,datos);
        recyclerDatos.setAdapter(datosAdapter);
    }
    public void create(){
        datos = new ArrayList&lt;&gt;();
        datos.add(new Datos("1","Yogurt","Danone","Danone natural", 100,550,"Yogurt natural sin azúcar",null,0));
        datos.add(new Datos("2","Yogurt","Danone", "Yogurt melocotón trozitos",50,400,"Yogurt de melocotón con trocitos de Activia",null,0));
        datos.add(new Datos("3","Petisuisse","LIDL", "petisuisse fresa-platano",50,400,"PetitSuisse con sabor a fresa y plátano",null,0));
        datos.add(new Datos("4","Cafe","Genérico", "café molido tueste natural",5,100,"Café molido ",null,0));
        datos.add(new Datos("5","Yogurt","Milbona","Yogur fresa-morango", 200,550,"Yogurt sabor a fresa",null,0));
        datos.add(new Datos("6","Yogurt","Milbona", "Petit beber fresa-platano",71,301,"Yogurt para beber con sabor a fresa y plátano",null,0));
        datos.add(new Datos("7","Chocolate","Nestlé", "Kinder chocolate",150,300,"Huevo Kinder con chocolate blanco y sorpresa",null,0));
        datos.add(new Datos("8","Jamon cocido","CampoFrio", "Fiambre de jamon cocido",50,150,"Fiambre de jamón cocido en lonchas sandwich",null,0));
        datos.add(new Datos("9","Galletas","ARTIACH", "Marbú Dorada 0%",447,1873,"Galletas doradas al horno con acetite 100% girasol y 0% azúcares añadidos ",null,0));
    }
}</code></pre>

<p>Este layout se basa en el elemento CardView que es un tipo de vista presentada como una tarjeta. Est&aacute; formado por una imagen y cuatro etiquetas de texto y cada uno ellos representa uno de los objetos de la lista.</p>

<p><strong>datos_item.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;android.support.v7.widget.CardView
    xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="wrap_content"
    android:id="@+id/cardview"&gt;
    &lt;LinearLayout
        xmlns:android="//schemas.android.com/apk/res/android"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:orientation="horizontal"
        &gt;
        &lt;ImageView
            android:id="@+id/imageview"
            android:src="@drawable/ic_launcher_foreground"
            android:layout_width="100dp"
            android:layout_height="100dp" /&gt;
        &lt;LinearLayout
            android:layout_width="match_parent"
            android:layout_height="150dp"
            android:orientation="vertical"
            android:layout_marginTop="10dp"&gt;
            &lt;TextView
                android:id="@+id/nombre"
                android:text="Nombre"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;TextView
                android:id="@+id/marca"
                android:text="Marca"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;TextView
                android:id="@+id/modelo"
                android:text="Modelo"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;TextView
                android:id="@+id/descripcion"
                android:text="Descripción"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
        &lt;/LinearLayout&gt;
    &lt;/LinearLayout&gt;
&lt;/android.support.v7.widget.CardView&gt;</code></pre>

<p>Este adaptador (hace de puente entre la vista y los datos) consta b&aacute;sicamente de tres bloques:</p>

<p>Por un lado, un constructor, que asigna el contexto y un elemento Lista de tipo&nbsp;<strong>Datos</strong>.</p>

<p>Por otro lado, ubicada al final del archivo, la clase ViewHolder, que mediante la herencia de&nbsp;RecyclerView.ViewHolder&nbsp;declara todos los elementos de una vista.</p>

<p>Por &uacute;ltimo, la herencia de la subclase&nbsp;<strong>RecyclerView.Adapter</strong>&nbsp;ofrece los tres m&eacute;todos necesarios, onCreateViewHolder(),onBindViewHolder(), getItemCount(), que se encargan de asignar el layout y los valores de los elementos.&nbsp;</p>

<p><strong>DatosAdapter.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.recyclerview.POJOS.Adapters;
import android.content.Context;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import java.util.List;
import xip.midominio.com.recyclerview.POJOS.Datos;
import xip.midominio.com.recyclerview.R;
public class DatosAdapter extends RecyclerView.Adapter&lt;DatosAdapter.ViewHolder&gt;{
    Context context;
    List&lt;Datos&gt; listaDatos;
    public DatosAdapter(Context context,List&lt;Datos&gt; lista){
        this.context = context;
        this.listaDatos = lista;
    }
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(context).inflate(R.layout.datos_item,parent,false);
        ViewHolder viewHolder = new ViewHolder(view);
        return viewHolder;
    }
    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        //holder.nombre.setText();
        nombre.setText("Nombre: "+listaDatos.get(position).getNombre());
        marca.setText("Marca: "+listaDatos.get(position).getMarca());
        modelo.setText("Modelo: "+listaDatos.get(position).getModelo());
        descripcion.setText(listaDatos.get(position).getDescripcion());
    }
    @Override
    public int getItemCount() {
        //return 0;
        return listaDatos.size();
    }
    CardView cardView;
    ImageView imageView;
    TextView nombre,marca,modelo,descripcion;
    public class ViewHolder extends RecyclerView.ViewHolder{
        public ViewHolder(View itemView){
            super(itemView);
            cardView = (CardView) itemView.findViewById(R.id.cardview);
            imageView = (ImageView) itemView.findViewById(R.id.imageview);
            nombre = (TextView) itemView.findViewById(R.id.nombre);
            marca = (TextView) itemView.findViewById(R.id.marca);
            modelo = (TextView) itemView.findViewById(R.id.modelo);
            descripcion = (TextView) itemView.findViewById(R.id.descripcion);
        }
    }
}</code></pre>

<p>Esta clase representa el modelo que define las propiedades junto a sus getter y sus setter que permiten obtener y establecer los valores respectivamente.</p>

<p><strong>Datos.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.recyclerview.POJOS;
public class Datos {
    private String id,nombre,descripcion,imagen,marca,modelo;
    private int fav,energia,fuerza;
    public Datos (String id,String nombre,String marca,String modelo, int calorias,int fuerza,
                    String descripcion, String imagen,int fav){
        this.id=id;
        this.nombre=nombre;
        this.modelo = modelo;
        this.marca = marca;
        this.energia= calorias;
        this.fuerza=fuerza;
        this.descripcion=descripcion;
        this.imagen=imagen;
        this.fav=fav;
    }
    public String getId() {
        return id;
    }
    public void setId(String id) {
        this.id = id;
    }
    public String getNombre() {
        return nombre;
    }
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    public String getMarca() {
        return marca;
    }
    public void setMarca(String marca) {
        this.marca = marca;
    }
    public String getModelo() {
        return modelo;
    }
    public void setModelo(String modelo) {
        this.modelo = modelo;
    }
    public int getFuerza() {
        return fuerza;
    }
    public void setFuerza(int fuerza) {
        this.fuerza = fuerza;
    }
    public int getEnergia() {
        return energia;
    }
    public void setEnergia(int energia) {
        this.energia = energia;
    }
    public String getDescripcion() {
        return descripcion;
    }
    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }
    public String getImagen() {
        return imagen;
    }
    public void setImagen(String imagen) {
        this.imagen = imagen;
    }
    public int getFav() {
        return fav;
    }
    public void setFav(int fav) {
        this.fav = fav;
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/tWBXMZwHG55ZAuVMiGntw0eXUJC2SSFQwf34RN3H.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);
        //114
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'RecyclerView',
            'slug' => 'recyclerview',
            'body_main' => 'Reciclaje de vista en Android',
            'body_plus' => '<p><strong>RECYCLERVIEW</strong></p>

<p>Este componente, basado en la clase&nbsp;<strong>RecyclerView</strong>, representa un contenedor en forma de lista, similar al&nbsp;<strong>ListView</strong>, pero m&aacute;s flexible y m&aacute;s eficiente. Este componente establece l&iacute;mites al n&uacute;mero de elementos que aparecen en la vista&nbsp;y mediante el desplazamiento realiza un proceso de reciclaje, que consiste b&aacute;sicamente en ir eliminando unos elementos y cargando otros, obteniendo como resultado una&nbsp;carga de datos m&aacute;s optimizada.</p>

<p>A continuaci&oacute;n, una aplicaci&oacute;n b&aacute;sica ejemplo de&nbsp;<strong>RecyclerView,</strong>&nbsp;apoy&aacute;ndose en dos subclases:&nbsp;la subclase&nbsp;<strong>RecyclerView.Adapter</strong>() que relaciona el layout con una lista de objetos y la subclase&nbsp;<strong>RecyclerView.ViewHolder</strong>&nbsp;que se encarga de almacenar los datos en los distintos elementos de la lista.&nbsp;</p>

<p>El layout principal define el elemento&nbsp;<strong>RecyclerView</strong>.</p>

<p><strong>activity_main.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;android.support.constraint.ConstraintLayout xmlns:android="//schemas.android.com/apk/res/android"
    xmlns:app="//schemas.android.com/apk/res-auto"
    xmlns:tools="//schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="xip.midominio.com.recyclerview.MainActivity"&gt;
    &lt;android.support.v7.widget.RecyclerView
        android:id="@+id/recycler"
        android:layout_width="match_parent"
        android:layout_height="match_parent"&gt;
    &lt;/android.support.v7.widget.RecyclerView&gt;
&lt;/android.support.constraint.ConstraintLayout&gt;</code></pre>

<p>El MainActivity genera una lista de objetos tipo Datos mediante el m&eacute;todo create(), declara el RecyclerView y establece el gestor de dise&ntilde;o (layout) y el adaptador (datosAdapter).</p>

<p><strong>MainActivity.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.recyclerview;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import java.util.ArrayList;
import xip.midominio.com.recyclerview.POJOS.Adapters.DatosAdapter;
import xip.midominio.com.recyclerview.POJOS.Datos;
public class MainActivity extends AppCompatActivity {
    RecyclerView recyclerDatos;
    ArrayList&lt;Datos&gt; datos;
    DatosAdapter datosAdapter;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        create();
        recyclerDatos = (RecyclerView)findViewById(R.id.recycler);
        LinearLayoutManager layout = new LinearLayoutManager(this);
        layout.setOrientation(LinearLayoutManager.VERTICAL);
        recyclerDatos.setLayoutManager(layout);
        datosAdapter = new DatosAdapter(this,datos);
        recyclerDatos.setAdapter(datosAdapter);
    }
    public void create(){
        datos = new ArrayList&lt;&gt;();
        datos.add(new Datos("1","Yogurt","Danone","Danone natural", 100,550,"Yogurt natural sin azúcar",null,0));
        datos.add(new Datos("2","Yogurt","Danone", "Yogurt melocotón trozitos",50,400,"Yogurt de melocotón con trocitos de Activia",null,0));
        datos.add(new Datos("3","Petisuisse","LIDL", "petisuisse fresa-platano",50,400,"PetitSuisse con sabor a fresa y plátano",null,0));
        datos.add(new Datos("4","Cafe","Genérico", "café molido tueste natural",5,100,"Café molido ",null,0));
        datos.add(new Datos("5","Yogurt","Milbona","Yogur fresa-morango", 200,550,"Yogurt sabor a fresa",null,0));
        datos.add(new Datos("6","Yogurt","Milbona", "Petit beber fresa-platano",71,301,"Yogurt para beber con sabor a fresa y plátano",null,0));
        datos.add(new Datos("7","Chocolate","Nestlé", "Kinder chocolate",150,300,"Huevo Kinder con chocolate blanco y sorpresa",null,0));
        datos.add(new Datos("8","Jamon cocido","CampoFrio", "Fiambre de jamon cocido",50,150,"Fiambre de jamón cocido en lonchas sandwich",null,0));
        datos.add(new Datos("9","Galletas","ARTIACH", "Marbú Dorada 0%",447,1873,"Galletas doradas al horno con acetite 100% girasol y 0% azúcares añadidos ",null,0));
    }
}</code></pre>

<p>Este layout se basa en el elemento CardView que es un tipo de vista presentada como una tarjeta. Est&aacute; formado por una imagen y cuatro etiquetas de texto y cada uno ellos representa uno de los objetos de la lista.</p>

<p><strong>datos_item.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;android.support.v7.widget.CardView
    xmlns:android="//schemas.android.com/apk/res/android"
    android:layout_width="match_parent"
    android:layout_height="wrap_content"
    android:id="@+id/cardview"&gt;
    &lt;LinearLayout
        xmlns:android="//schemas.android.com/apk/res/android"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:orientation="horizontal"
        &gt;
        &lt;ImageView
            android:id="@+id/imageview"
            android:src="@drawable/ic_launcher_foreground"
            android:layout_width="100dp"
            android:layout_height="100dp" /&gt;
        &lt;LinearLayout
            android:layout_width="match_parent"
            android:layout_height="150dp"
            android:orientation="vertical"
            android:layout_marginTop="10dp"&gt;
            &lt;TextView
                android:id="@+id/nombre"
                android:text="Nombre"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;TextView
                android:id="@+id/marca"
                android:text="Marca"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;TextView
                android:id="@+id/modelo"
                android:text="Modelo"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
            &lt;TextView
                android:id="@+id/descripcion"
                android:text="Descripción"
                android:layout_width="match_parent"
                android:layout_height="wrap_content" /&gt;
        &lt;/LinearLayout&gt;
    &lt;/LinearLayout&gt;
&lt;/android.support.v7.widget.CardView&gt;</code></pre>

<p>Este adaptador (hace de puente entre la vista y los datos) consta b&aacute;sicamente de tres bloques:</p>

<p>Por un lado, un constructor, que asigna el contexto y un elemento Lista de tipo&nbsp;<strong>Datos</strong>.</p>

<p>Por otro lado, ubicada al final del archivo, la clase ViewHolder, que mediante la herencia de&nbsp;RecyclerView.ViewHolder&nbsp;declara todos los elementos de una vista.</p>

<p>Por &uacute;ltimo, la herencia de la subclase&nbsp;<strong>RecyclerView.Adapter</strong>&nbsp;ofrece los tres m&eacute;todos necesarios, onCreateViewHolder(),onBindViewHolder(), getItemCount(), que se encargan de asignar el layout y los valores de los elementos.&nbsp;</p>

<p><strong>DatosAdapter.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.recyclerview.POJOS.Adapters;
import android.content.Context;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import java.util.List;
import xip.midominio.com.recyclerview.POJOS.Datos;
import xip.midominio.com.recyclerview.R;
public class DatosAdapter extends RecyclerView.Adapter&lt;DatosAdapter.ViewHolder&gt;{
    Context context;
    List&lt;Datos&gt; listaDatos;
    public DatosAdapter(Context context,List&lt;Datos&gt; lista){
        this.context = context;
        this.listaDatos = lista;
    }
    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(context).inflate(R.layout.datos_item,parent,false);
        ViewHolder viewHolder = new ViewHolder(view);
        return viewHolder;
    }
    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        //holder.nombre.setText();
        nombre.setText("Nombre: "+listaDatos.get(position).getNombre());
        marca.setText("Marca: "+listaDatos.get(position).getMarca());
        modelo.setText("Modelo: "+listaDatos.get(position).getModelo());
        descripcion.setText(listaDatos.get(position).getDescripcion());
    }
    @Override
    public int getItemCount() {
        //return 0;
        return listaDatos.size();
    }
    CardView cardView;
    ImageView imageView;
    TextView nombre,marca,modelo,descripcion;
    public class ViewHolder extends RecyclerView.ViewHolder{
        public ViewHolder(View itemView){
            super(itemView);
            cardView = (CardView) itemView.findViewById(R.id.cardview);
            imageView = (ImageView) itemView.findViewById(R.id.imageview);
            nombre = (TextView) itemView.findViewById(R.id.nombre);
            marca = (TextView) itemView.findViewById(R.id.marca);
            modelo = (TextView) itemView.findViewById(R.id.modelo);
            descripcion = (TextView) itemView.findViewById(R.id.descripcion);
        }
    }
}</code></pre>

<p>Esta clase representa el modelo que define las propiedades junto a sus getter y sus setter que permiten obtener y establecer los valores respectivamente.</p>

<p><strong>Datos.java</strong></p>

<pre>
<code class="language-java">package xip.midominio.com.recyclerview.POJOS;
public class Datos {
    private String id,nombre,descripcion,imagen,marca,modelo;
    private int fav,energia,fuerza;
    public Datos (String id,String nombre,String marca,String modelo, int calorias,int fuerza,
                    String descripcion, String imagen,int fav){
        this.id=id;
        this.nombre=nombre;
        this.modelo = modelo;
        this.marca = marca;
        this.energia= calorias;
        this.fuerza=fuerza;
        this.descripcion=descripcion;
        this.imagen=imagen;
        this.fav=fav;
    }
    public String getId() {
        return id;
    }
    public void setId(String id) {
        this.id = id;
    }
    public String getNombre() {
        return nombre;
    }
    public void setNombre(String nombre) {
        this.nombre = nombre;
    }
    public String getMarca() {
        return marca;
    }
    public void setMarca(String marca) {
        this.marca = marca;
    }
    public String getModelo() {
        return modelo;
    }
    public void setModelo(String modelo) {
        this.modelo = modelo;
    }
    public int getFuerza() {
        return fuerza;
    }
    public void setFuerza(int fuerza) {
        this.fuerza = fuerza;
    }
    public int getEnergia() {
        return energia;
    }
    public void setEnergia(int energia) {
        this.energia = energia;
    }
    public String getDescripcion() {
        return descripcion;
    }
    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }
    public String getImagen() {
        return imagen;
    }
    public void setImagen(String imagen) {
        this.imagen = imagen;
    }
    public int getFav() {
        return fav;
    }
    public void setFav(int fav) {
        this.fav = fav;
    }
}</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/80SA6HuJVZ9xtOZ4x3FcSX4W0I0M78P0YkAM00fl.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);
        
        //115
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'SQLite',
            'slug' => 'sqlite',
            'body_main' => 'Como formatear un dispositivo usb desde una terminal en linux.',
            'body_plus' => '<p>Linux dispone del comando dd para crear im&aacute;genes de distribuciones linux y poder instalarlas en nuestro PC de forma sencilla y r&aacute;pida.</p>

<p>Para hacer uso del comando dd es recomendable formatear y desmontar la partici&oacute;n.</p>

<p>A&ntilde;adimos la ruta de la imagen iso&nbsp; y la ruta del dispositivo:</p>

<pre>
<code class="language-bash">dd if=[imagen.iso] of=[dispositivo]
</code></pre>

<p>Ejemplo de instalaci&oacute;n de una distribuci&oacute;n debian en un usb:</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955715.png" style="height:106px; width:626px" /></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/IPDBLIEjlYaQdDQM7X29NF5ComOzrVl1RbwxEjmO.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 24
        ]);
        
        //116
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Obtener información del sistema en Linux',
            'slug' => 'obtener-informacion-del-sistema-en-linux',
            'body_main' => 'Como obtener información del hardware en Linux',
            'body_plus' => '<p>Actualmente existen aplicaciones con entorno gr&aacute;fico para obtener informaci&oacute;n del equipo, sin embargo esta entrada est&aacute; basada en comandos ejecutados en la terminal.</p>

<p>FDISK</p>

<p>Permite crear, eliminar, listar y mostrar informaci&oacute;n de los discos, particiones y cualquier dispositivo de almacenamiento que se encuentre conectado al equipo.</p>

<p><strong>LISTAR</strong></p>

<p>Listar todos los dispositivos de almacenamiento.</p>

<pre>
<code class="language-bash">fdisk -l
</code></pre>

<p><strong>ACCIONES</strong></p>

<p>Para realizar alguna acci&oacute;n a una de las particiones se introduce el comando fdisk seguido de la ruta de la partici&oacute;n.</p>

<pre>
<code class="language-bash">fdisk /dev/particion
</code></pre>

<p>Ejemplo:</p>

<pre>
<code class="language-bash">fdisk /dev/sda4
</code></pre>

<p>FDisk realizar&aacute; las peticiones desde la misma terminal permitiendo introducir caracteres que realizan una acci&oacute;n.&nbsp;</p>

<pre>
<code class="language-bash">Welcome to fdisk (util-linux 2.29.2).
Changes will remain in memory only, until you decide to write them.
Be careful before using the write command.
Command (m for help):
</code></pre>

<p>Cada caracter representa una acci&oacute;n: la letra n (new) representa la opci&oacute;n de crear, la letra d (delete) representa la opci&oacute;n de eliminar, la letra m lista todas las acciones y sus caracteres.</p>

<pre>
<code class="language-bash">Help:
  DOS (MBR)
   a   toggle a bootable flag
   b   edit nested BSD disklabel
   c   toggle the dos compatibility flag
  Generic
   d   delete a partition
   F   list free unpartitioned space
   l   list known partition types
   n   add a new partition
   p   print the partition table
   t   change a partition type
   v   verify the partition table
   i   print information about a partition
  Misc
   m   print this menu
   u   change display/entry units
   x   extra functionality (experts only)
  Script
   I   load disk layout from sfdisk script file
   O   dump disk layout to sfdisk script file
  Save &amp; Exit
   w   write table to disk and exit
   q   quit without saving changes
  Create a new label
   g   create a new empty GPT partition table
   G   create a new empty SGI (IRIX) partition table
   o   create a new empty DOS partition table
   s   create a new empty Sun partition table</code></pre>

<p><strong>DF (Disk Filesystem)</strong></p>

<p>El comando df muestra informaci&oacute;n de uso del disco duro.</p>

<p>ACCIONES</p>

<p>Mostrar informaci&oacute;n en un formato legible para humano</p>

<pre>
<code class="language-bash">df -h
</code></pre>

<p>Mostrar informaci&oacute;n en MB.</p>

<pre>
<code class="language-bash">df -m
</code></pre>

<p>Mostrar informaci&oacute;n en KB.</p>

<pre>
<code class="language-bash">df -k
</code></pre>

<p>Mostrar informaci&oacute;n del disco actual</p>

<pre>
<code class="language-bash">df /
</code></pre>

<p>Mostrar informaci&oacute;n del directorio indicado</p>

<pre>
<code class="language-bash">df /directorio/subdirectorio
</code></pre>

<p>Mostrar informaci&oacute;n del disco a&ntilde;adiendo una columna adicional que indica el sistema de archivos</p>

<pre>
<code class="language-bash">df -T
</code></pre>

<p>Mostrar informaci&oacute;n del sistema de archivos indicado</p>

<pre>
<code class="language-bash">df -t ext4
</code></pre>

<p>Mostrar informaci&oacute;n de los inodos</p>

<pre>
<code class="language-bash">df -ih /
</code></pre>

<p>Con df se puede personalizar la informaci&oacute;n mediante la opci&oacute;n --output y los campos de la siguiente lista.</p>

<ul>
    <li>source,fstype</li>
    <li>itotal, iused, iavail, ipcent</li>
    <li>size, used, avail, pcent, file, target</li>
</ul>

<p>Ejemplos:</p>

<pre>
<code class="language-bash">df -ht ext4 --output =source,avail,pcent
</code></pre>

<p>(fuseblk representa sistema de archivos NTFS)</p>

<pre>
<code class="language-bash">df -ht fuseblk --output=size
</code></pre>

<p><strong>DU(Disk Manager)</strong></p>

<p>Muestra informaci&oacute;n del uso del disco duro, similar a df.</p>

<p>ACCIONES</p>

<p>Listar y mostrar el espacio que ocupa cada uno de los directorios y subdirectorios comenzando desde la ruta indicada.</p>

<pre>
<code class="language-bash">du /directorio
</code></pre>

<p>Listar y mostrar el espacio que ocupa cada uno de los directorios y subdirectorios comenzando desde la ruta indicada en formato legible para humano.</p>

<pre>
<code class="language-bash">du -h /directorio
</code></pre>

<p>Mostrar el espacio que ocupa el directorio indicado y todo su contenido.</p>

<pre>
<code class="language-bash">du -s /directorio
</code></pre>

<p>Mostrar el espacio que ocupa el directorio indicado y con todo su contenido en MB.</p>

<pre>
<code class="language-bash">du -sm /directorio
</code></pre>

<p>Mostrar el espacio que ocupa el directorio indicado con todo su contenido en KB.</p>

<pre>
<code class="language-bash">du -sk /directorio
</code></pre>

<p>Listar y mostrar el espacio que ocupa cada uno de los archivos comenzando desde la ruta indicada</p>

<pre>
<code class="language-bash">du -a /directorio
</code></pre>

<p>Listar todas las opciones</p>

<pre>
<code class="language-bash">du --help
</code></pre>

<p>LSCPU</p>

<p>Muestra informaci&oacute;n de la unidad o unidades de procesamiento.</p>

<pre>
<code class="language-bash">lscpu</code></pre>

<p>LSPCI</p>

<p>Muestra informaci&oacute;n de los pcis disponibles y los dispositivos conectados a ellos.</p>

<pre>
<code class="language-bash">lspci
</code></pre>

<p>LSBLK</p>

<p>Muestra informaci&oacute;n de los dispositivos de almacenamiento conectados.</p>

<pre>
<code class="language-bash">lsblk
</code></pre>

<p>FREE-M</p>

<p>Muestra informaci&oacute;n de la memoria RAM.</p>

<pre>
<code class="language-bash">free-m
</code></pre>

<p>DIRECTORIO PROC</p>

<p>El directorio&nbsp;proc&nbsp;contiene algunos archivos con informaci&oacute;n del sistema que con los distintos comandos se pueden visualizar en pantalla.&nbsp;</p>

<p>cpuinfo</p>

<pre>
<code class="language-bash">more /proc/cpuinfo
</code></pre>

<p>partitions</p>

<pre>
<code class="language-bash">cat /proc/partitions
</code></pre>

<p>versi&oacute;n de kernel</p>

<pre>
<code class="language-bash">less /proc/version
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/lDWYcpHKZWFgGSA5W2NvsbhLcz6muovr3qOmgsFQ.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //117
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Búsqueda y conexión de redes en Linux',
            'slug' => 'busqueda-y-conexion-de-redes-en-linux',
            'body_main' => 'Buscar y conectarse a redes desde la terminal',
            'body_plus' => '<p>En sistemas Linux conviven distintos comandos enfocados a buscar redes, obtener informaci&oacute;n o conectarse a ellas. A continuaci&oacute;n algunos de ellos.&nbsp;</p>

<p>IW (paquete iw)</p>

<p><strong>Obtener informaci&oacute;n de la tarjeta de red&nbsp;</strong></p>

<pre>
<code class="language-bash">iw list
</code></pre>

<p><strong>Obtener&nbsp; las interfaces de red inal&aacute;mbricas</strong></p>

<pre>
<code class="language-bash">iw dev
</code></pre>

<p><strong>Obtener todas las redes disponibles (escaneo)</strong></p>

<pre>
<code class="language-bash">iw dev INTERFAZ scan
</code></pre>

<p>Ejemplos de un escaneo de redes</p>

<pre>
<code class="language-bash">iw dev wlan0 scan
</code></pre>

<pre>
<code class="language-bash">iw wlp3s0 scan
</code></pre>

<p><strong>Conectarse a una red desprotegida</strong></p>

<pre>
<code class="language-bash">iw [INTERFAZ] connect [SSID]
</code></pre>

<p>Ejemplo de una conexi&oacute;n a una red sin contrase&ntilde;a</p>

<pre>
<code class="language-bash">iw wlan0 connect MIRED
</code></pre>

<p><strong>Obtener estado de interfaz</strong></p>

<pre>
<code class="language-bash">iw [INTERFAZ] link
</code></pre>

<p>Ejemplo</p>

<pre>
<code class="language-bash">iw wlan0 link
</code></pre>

<p>HERRAMIENTAS DE RED (net-tools)</p>

<p>&nbsp;Obtener interfaces de red</p>

<pre>
<code class="language-bash">ifconfig
</code></pre>

<p>Obtener y modificar la tabla de enrutamiento</p>

<pre>
<code class="language-bash">route</code></pre>

<p>Nota: La tabla de enrutamiento es el documento donde se almacenan las rutas de los nodos de red, estos nodos representan cualquier dispositivo que se encuentre conectado a esa red)</p>

<p>Obtener las conexiones abiertas (entrantes y salientes)</p>

<pre>
<code class="language-bash">netstat
</code></pre>

<p>( netstat -r -n es similar a route -e )</p>

<p>Obtener nombre del sistema</p>

<pre>
<code class="language-bash">hostname
</code></pre>

<p>Obtener y Modificar el cach&eacute; del arp</p>

<pre>
<code class="language-bash">arp</code></pre>

<p>Nota: ARP es el protocolo que se encarga de vincular la direcci&oacute;n MAC de un dispositivo en una determinada IP.</p>

<p>IPROUTE2 (iproute2)</p>

<p>Obtener interfaces de red</p>

<pre>
<code class="language-bash">ip link
</code></pre>

<pre>
<code class="language-bash">ip addr list
</code></pre>

<pre>
<code class="language-bash">ip addr show
</code></pre>

<p>(ip addr list y ip addr show son similares al comando ifconfig del paquete net-tools)</p>

<p>Obtener y modificar la tabla de enrutamiento</p>

<pre>
<code class="language-bash">ip route
</code></pre>

<p>Nota: Una de las caracter&iacute;sticas m&aacute;s destacadas de ip route es que permite asignar rutas est&aacute;ticas.</p>

<p>Obtener las conexiones abiertas</p>

<pre>
<code class="language-bash">ss</code></pre>

<p>(ss es el equivalente a netstat del paquete net-tools)</p>

<p>Obtener y modificar el cach&eacute; del ARP</p>

<pre>
<code class="language-bash">ip neigh show
</code></pre>

<p>Simplificada</p>

<pre>
<code class="language-bash">ip n s
</code></pre>

<pre>
<code class="language-bash">(ip neigh es el equivalente al comando arp de net-tools)

NetworkManager (network-manager)

</code></pre>

<pre>

&nbsp;</pre>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/9yOhXjMexo4UsXgFPpJMjHGBwL5JbEg25yxoUKwj.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //118
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Configuración de envío de mensajes con Laravel',
            'slug' => 'configuracion-de-envio-de-mensajes-con-laravel',
            'body_main' => 'Configurar un proyecto Laravel con Outlook y Gmail mediante el protocolo SMTP',
            'body_plus' => '<p>Para configurar el env&iacute;o de mensajes de correo electr&oacute;nico desde un proyecto Laravel es necesario modificar el archivo .env que se encuentra ubicado en la ra&iacute;z del proyecto. Este&nbsp;archivo contiene un conjunto de variables predefinidas por defecto, destinadas a la configuraci&oacute;n del env&iacute;o de mensajes y que son f&aacute;cilmente diferenciadas del resto de variables por el prefijo MAIL.</p>

<pre>
<code class="language-php">MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null</code></pre>

<p>Adem&aacute;s del archivo .env existe otro archivo relacionado con el env&iacute;o de mensajes, el archivo&nbsp;<strong>mail.php</strong>, ubicado en el directorio&nbsp;<strong>config</strong>. El archivo mail.php contiene el array&nbsp;<strong>from</strong>&nbsp;que incluye dos variables:&nbsp;<strong>address</strong>&nbsp;y&nbsp;<strong>name</strong>.&nbsp;&nbsp;</p>

<pre>
<code class="language-php">\'from\' =&gt; [
        \'address\' =&gt; env(\'MAIL_FROM_ADDRESS\', \'hello@example.com\'),
        \'name\' =&gt; env(\'MAIL_FROM_NAME\', \'Example\')
    ],</code></pre>

<p>Este array asigna las variables&nbsp;<strong>address</strong>&nbsp;y&nbsp;<strong>name</strong>&nbsp;mediante las variables&nbsp;<strong>MAIL_FROM_ADDRESS</strong>&nbsp;y&nbsp;<strong>MAIL_FROM_NAME</strong>&nbsp;respectivamente y, en su defecto, asigna el segundo par&aacute;metro de tipo cadena.&nbsp;Por tanto, para asignar estas dos variables existen dos opciones: se crea una nueva variable MAIL_FROM_ADDRESS y una nueva variable MAIL_FROM_NAME con los datos en el archivo de configuraci&oacute;n .env, o bien, se sustituyen los datos directamente por las cadenas de ejemplo en el array from.&nbsp;</p>

<p><strong>Configuraci&oacute;n Outlook</strong></p>

<pre>
<code class="language-php">MAIL_DRIVER=smtp
MAIL_HOST=smtp.office365.com
MAIL_PORT=587
MAIL_USERNAME=[email@email.com]
MAIL_PASSWORD=[contraseña]
MAIL_ENCRYPTION=TLS
MAIL_FROM_ADDRESS=[email@email.com]
MAIL_FROM_NAME=[dominio]
</code></pre>

<p>Para obtener los datos de conexi&oacute;n de Outlook es posible mediante el panel de Outlook, en el apartado de configuraci&oacute;n y la opci&oacute;n Sincronizar correo electr&oacute;nico.</p>

<p>Nota: La primera vez ser&aacute; necesaria la activaci&oacute;n que se realiza mediante un enlace de confirmaci&oacute;n que Outlook env&iacute;a autom&aacute;ticamente al propio correo.</p>

<p><strong>Configuraci&oacute;n Gmail</strong></p>

<pre>
<code class="language-php">MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=[email@email.com]
MAIL_PASSWORD=[contraseña]
MAIL_ENCRYPTION=TLS
MAIL_FROM_ADDRESS=[email@email.com]
MAIL_FROM_NAME=[dominio]</code></pre>

<p>En Gmail es necesario activar el interruptor de Acceso de Aplicaciones poco seguras que se encuentra accediendo a la opci&oacute;n Seguridad dentro del apartado Gestionar cuenta Google.</p>

<p>En caso de errores por primera vez pueden solucionarse mediante la&nbsp;<a href="https://www.google.com/landing/2step/" target="_blank">verificaci&oacute;n en 2 pasos</a>&nbsp;o el&nbsp;<a href="https://accounts.google.com/DisplayUnlockCaptcha" target="_blank">desbloqueo</a>.</p>

<p>En caso de asignar los datos mediante el archivo mail.php es necesario que coincida el segundo par&aacute;metro de la variable address con la variable MAIL_USERNAME del archivo .env.</p>

<pre>
<code class="language-php">\'from\' =&gt; [
        \'address\' =&gt; env(\'MAIL_FROM_ADDRESS\', \'email@email.com\'),
        \'name\' =&gt; env(\'MAIL_FROM_NAME\', \'midominio\')
    ],</code></pre>

<p>Nota: Al realizar las pruebas, tanto en Gmail como en Outlook es recomendable limpiar la cach&eacute; del proyecto:</p>

<pre>
<code class="language-php">php artisan config:cache
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/acrSWCzkv7BaVpplMO5j90gBw3jKPBirpGIn7t9j.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //119
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Gestionar usuarios y grupos',
            'slug' => 'gestionar-usuarios-y-grupos',
            'body_main' => 'Gestionar usuarios y grupos en Linux',
            'body_plus' => '<p>La seguridad de los sistemas operativos para administrar los datos se apoya en un sistema de permisos. Este sistema de permisos se basa en&nbsp;permitir el acceso o&nbsp;denegar el acceso de los datos del sistema a un determinado usuario.&nbsp;</p>

<p>La gesti&oacute;n de usuarios y grupos permite organizar y coordinar el acceso de datos de un usuario o un grupo mediante el sistema de permisos.&nbsp;La base de la gesti&oacute;n de usuarios y grupos no est&aacute; en dar o denegar acceso, la complejidad realmente&nbsp;est&aacute;&nbsp;en el nivel de acceso que se debe permitir a determinados usuarios sin comprometer la seguridad del sistema.&nbsp;&nbsp;</p>

<p>La ventaja del grupo se basa en que los privilegios de un grupo ser&aacute;n heredados por todo usuario que pertenezca a ese grupo.&nbsp;</p>

<p><strong>USUARIOS</strong></p>

<p>TIPOS DE USUARIO:</p>

<ul>
    <li><strong>Usuario root:</strong>&nbsp;Usuario superadministrador con acceso total en todo el sistema, su UID es 0</li>
    <li><strong>Usuario normal:</strong>&nbsp;Usuario con acceso total en su directorio personal, su UID es mayor a 1000.</li>
    <li><strong>Usuario de sistema:</strong>&nbsp; Usuario sin acceso a login, sin directorio personal y sin contrase&ntilde;a, suelen pertenecer a servicios como&nbsp; daemon, apache, mail,sync,..., su&nbsp;UID es entre 1 y 100.</li>
</ul>

<p>La gesti&oacute;n de usuarios y grupos se puede realizar con binarios (useradd,usermod,userdel) o con scripts (adduser,deluser). Estos &uacute;ltimos est&aacute;n basados en los binarios y permiten crear un usuario con una configuraci&oacute;n b&aacute;sica por defecto&nbsp; y otros datos que se generan mediante peticiones desde la misma terminal.</p>

<p>GESTI&Oacute;N DE USUARIOS CON SCRIPTS</p>

<p>Crear usuario con acceso al sistema</p>

<pre>
<code class="language-bash">sudo adduser [usuario]
</code></pre>

<p>Crear un usuario estableciendo un grupo ya definido.</p>

<pre>
<code class="language-bash">sudo adduser --ingroup [grupo] [usuario]
</code></pre>

<p>Asignar un usuario a un grupo</p>

<pre>
<code class="language-bash">sudo adduser [usuario] [grupo]
</code></pre>

<p>Eliminar usuario (parcial)</p>

<pre>
<code class="language-bash">deluser [usuario]
</code></pre>

<p>Eliminar usuario (completa)</p>

<pre>
<code class="language-bash">sudo deluser --remove-home [usuario]
</code></pre>

<p>Manuales</p>

<pre>
<code class="language-bash">man adduser
</code></pre>

<pre>
<code class="language-bash">man deluser
</code></pre>

<p><strong>GESTI&Oacute;N DE USUARIOS CON BINARIOS</strong></p>

<p>Crear usuario&nbsp;</p>

<pre>
<code class="language-bash">sudo useradd [usuario]
</code></pre>

<p>Crear un usuario con acceso al sistema</p>

<pre>
<code class="language-bash">sudo useradd -m -G [otros grupos] -s /bin/bash [usuario]
</code></pre>

<ul>
    <li>-m: Crea el directorio personal de usuario</li>
    <li>-G: Permite asignarle al usuario m&aacute;s grupos</li>
    <li>-s: Establece el shell&nbsp;</li>
</ul>

<p>Establecer contrase&ntilde;a</p>

<pre>
<code class="language-bash">sudo passwd [usuario]
</code></pre>

<p>Establecer acceso a usuario sin contrase&ntilde;a</p>

<pre>
<code class="language-bash">sudo passwd -d [usuario]
</code></pre>

<p>Establecer shell a un usuario</p>

<pre>
<code class="language-bash">sudo useradd -s [shell] [usuario]
</code></pre>

<ul>
    <li>Valor de shell con acceso al sistema: /bin/bash</li>
    <li>Valor de shell sin acceso al sistema: /bin/false</li>
</ul>

<p>Eliminar usuario (parcial)</p>

<pre>
<code class="language-bash">userdel [usuario]
</code></pre>

<p>Eliminar usuario (completa)</p>

<pre>
<code class="language-bash">userdel -r [usuario]
</code></pre>

<p>Cambiar nombre a usuario</p>

<pre>
<code class="language-bash">usermod -l [nuevo_usuario] [usuario]
</code></pre>

<p>Cambiar contrase&ntilde;a a usuario</p>

<pre>
<code class="language-bash">passwd [usuario]
</code></pre>

<p>Cambiarse la contrase&ntilde;a a s&iacute; mismo</p>

<pre>
<code class="language-bash">passwd</code></pre>

<p>Bloquear usuario</p>

<pre>
<code class="language-bash">passwd -l [user]
</code></pre>

<p>Desbloquear usuario</p>

<pre>
<code class="language-bash">passwd -u [user]
</code></pre>

<p>Manuales</p>

<pre>
<code class="language-bash">man useradd
</code></pre>

<pre>
<code class="language-bash">man userdel
</code></pre>

<p>La eliminaci&oacute;n&nbsp;parcial&nbsp;de un usuario elimina el usuario y su grupo, mientras que la eliminaci&oacute;n completa de un usuario elimina el usuario, el grupo y&nbsp; si existen, elimina el directorio personal&nbsp; y el directorio mail asignado.</p>

<p>Nota: El directorio mail asignado a un usuario se encuentra en /var/mail/[usuario].</p>

<p>GRUPOS</p>

<p>De la misma manera que los usuarios, la gesti&oacute;n de los grupos se puede realizar con binarios y con scripts</p>

<p>GESTI&Oacute;N DE GRUPOS CON SCRIPTS</p>

<p>Crear grupo</p>

<pre>
<code class="language-bash">sudo addgroup [grupo]
</code></pre>

<p>Crear grupo de sistema</p>

<pre>
<code class="language-bash">sudo addgroup --system [grupo]
</code></pre>

<p>Eliminar grupo</p>

<pre>
<code class="language-bash">sudo delgroup [grupo]
</code></pre>

<p>Eliminar grupo sin usuario asignado</p>

<pre>
<code class="language-bash">sudo delgroup --only-if-empty [grupo]
</code></pre>

<p>Asignar un usuario a un grupo</p>

<pre>
<code class="language-bash">sudo adduser [usuario] [grupo]
</code></pre>

<p>Desasignar un usuario de un grupo</p>

<pre>
<code class="language-bash">sudo deluser [user] [group]
</code></pre>

<p>GESTI&Oacute;N DE GRUPOS CON BINARIOS</p>

<p>Crear grupo</p>

<pre>
<code class="language-bash">sudo groupadd [group]
</code></pre>

<p>Crear grupo de sistema</p>

<pre>
<code class="language-bash">sudo groupadd -r [grupo]
</code></pre>

<p>Modificar nombre de grupo</p>

<pre>
<code class="language-bash">sudo groupmod -n [nuevo grupo] [grupo]
</code></pre>

<p>Eliminar grupo</p>

<pre>
<code class="language-bash">sudo groupdel [grupo]
</code></pre>

<p>Asignar un usuario a un grupo o grupos</p>

<pre>
<code class="language-bash">sudo usermod -a -G [grupo1,grupo2] [usuario]
</code></pre>

<p>Obtener grupos asignados a un usuario</p>

<pre>
<code class="language-bash">sudo groups [user]
</code></pre>

<p>Nota: No se puede eliminar un grupo asignado como grupo principal de un usuario existente.&nbsp; Al eliminar un grupo es recomendable revisar sudoers (/etc/sudoers y los archivos en /etc/sudoers.d) por si ese grupo dispone de privilegios, esto evita que al crear un nuevo grupo con ese nombre herede privilegios inapropiados .</p>

<p>Un usuario asignado a m&aacute;s de un grupo puede establecer otro grupo como grupo principal</p>

<pre>
<code class="language-bash">sudo newgrp [maingroup_tmp]
</code></pre>

<p>Volver a su anterior grupo principal</p>

<pre>
<code class="language-bash">exit</code></pre>

<p><strong>Para que sirve el newgrp?</strong></p>

<p>Un usuario dispone de un grupo principal al iniciar sesi&oacute;n, si se crea un directorio o un archivo se registra con el grupo principal. Teniendo esto en cuenta si, por ejemplo un directorio es compartido entre varios usuarios que crean archivos, cada archivo ser&aacute; registrado con el grupo de cada usuario. Con newgrp se puede establecer otro grupo como grupo principal de forma temporal, de esa forma, los archivos y directorios creados o modificados ser&aacute;n registrados con ese grupo permitiendo el acceso a todos los usuarios pertenecientes a ese grupo.</p>

<p>EJEMPLOS: CREAR Y ELIMINAR&nbsp;UN USUARIO</p>

<p>EJEMPLO: Crear y eliminar el usuario javi con adduser y deluser (scripts)</p>

<p>Se crea el usuario con acceso al sistema</p>

<pre>
<code class="language-bash">sudo adduser javi
</code></pre>

<p>Se asigna el usuario a otro grupo</p>

<pre>
<code class="language-bash">sudo adduser javi amigos
</code></pre>

<p>Se elimina el usuario</p>

<pre>
<code class="language-bash">sudo deluser --remove-home javi
</code></pre>

<p><strong>EJEMPLO: Crear y eliminar el usuario jose con useradd y userdel (binarios)</strong></p>

<p><strong>Creaci&oacute;n del usuario en una sola l&iacute;nea (simplificada)</strong></p>

<p>Se crea el usuario con acceso al sistema</p>

<pre>
<code class="language-bash">sudo useradd -m -s /bin/bash jose
</code></pre>

<p>Creaci&oacute;n del usuario paso a paso (extendida):</p>

<p>Se crea el usuario</p>

<pre>
<code class="language-bash">sudo useradd jose
</code></pre>

<p>Se establece la contrase&ntilde;a al usuario</p>

<pre>
<code class="language-bash">sudo passwd jose
</code></pre>

<p>Se crea el directorio personal de usuario&nbsp;</p>

<pre>
<code class="language-bash">sudo mkdir /home/jose
</code></pre>

<p>Se establecen propiedad y grupo al directorio personal</p>

<pre>
<code class="language-bash">sudo chown jose:jose /home/jose
</code></pre>

<p>Se establece el shell al usuario con acceso al sistema</p>

<pre>
<code class="language-bash">sudo usermod -s /bin/bash jose
</code></pre>

<p>Se elimina el usuario</p>

<pre>
<code class="language-bash">sudo userdel -r jose
</code></pre>

<p><strong>Acceso al sistema desde la interfaz gr&aacute;fica</strong></p>

<p>Para acceder al sistema es suficiente con configurar el usuario el acceso a la shell y asignar una contrase&ntilde;a o establecer el acceso sin contrase&ntilde;a. Sin embargo, para poder acceder desde la interfaz gr&aacute;fica es necesario tambi&eacute;n disponer de un directorio de usuario registrado con permisos de propiedad.</p>

<p>Nota: Los subdirectorios del directorio personal se crean autom&aacute;ticamente una vez se inicia sesi&oacute;n por primera vez desde la interfaz gr&aacute;fica.</p>

<p><strong>Privilegios&nbsp;</strong></p>

<p>Un usuario o grupo por defecto, no dispone de privilegios, para asignarle privilegios es necesario configurar sudoers.</p>

<p>&nbsp;</p>

<p>Nota: En versiones anteriores de Ubuntu(12.04 o inferiores) se otorgaban permisos mediante el grupo admin al usuario creado durante la instalaci&oacute;n, por eso, en algunas instalaciones que han sido actualizadas es posible que se mantenga el grupo admin en el archivo /etc/sudoers. En Debian, en cambio, inicia con usuario root y aunque no se aconseja se pueden otorgar permisos a un usuario mediante el grupo sudo, de la misma forma que se hac&iacute;a con Ubuntu con el grupo admin</p>

<p>Nota: En instalaciones nuevas es posible que no est&eacute; disponible adduser o useradd desde el usuario root. Esto se debe a que no hereda el acceso al directorio /sbin, para solucionar este inconveniente se puede llamar al comando mediante la ruta completa o bien acceder al usuario root heredando dicho acceso:</p>

<p>- Mediante ruta completa:</p>

<pre>
<code class="language-bash">/sbin/adduser [usuario] [grupo]
</code></pre>

<p>- Mediante herencia (incluyendo gui&oacute;n al acceder a usurio root):</p>

<pre>
<code class="language-bash">su -
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/AzPynscZDhA3u6CnIsuhXDCcIMfUCozTNHQjQIUq.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //120
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Passwd y Group',
            'slug' => 'passwd-y-group',
            'body_main' => 'Gestionar Usuarios y grupos editando los archivos de configuración',
            'body_plus' => '<p>La gesti&oacute;n de usuarios y grupos se puede realizar editando los archivos passwd y group. Estos archivos se encuentran en el directorio etc y contienen la configuraci&oacute;n de cada usuario y cada grupo. Es necesario disponer de los permisos de administrador para acceder a ellos.</p>

<p><strong>PASSWD</strong></p>

<p>El archivo passwd contiene los datos de los usuarios del sistema</p>

<p>Ejemplo de configuraci&oacute;n de un usuario en el archivo passwd&nbsp;</p>

<pre>
<code class="language-bash">lucas:x:1001:1001:lucas,,,:/home/lucas:/bin/bash
</code></pre>

<ul>
    <li>Par&aacute;metro 1:&nbsp;Nombre de usuario</li>
    <li>Par&aacute;metro 2:&nbsp;Contrase&ntilde;a cifrada, si es una x la contrase&ntilde;a se encuentra en el archivo /etc/shadow</li>
    <li>Par&aacute;metro 3:&nbsp;N&uacute;mero identificador (UID)</li>
    <li>Par&aacute;metro 4:&nbsp;N&uacute;mero identificador de grupo</li>
    <li>Par&aacute;metro 5:&nbsp;Nombre completo de usuario</li>
    <li>Par&aacute;metro 6:&nbsp;Directorio personal de usuario</li>
    <li>Par&aacute;metro 7:&nbsp;Shell asignada al usuario</li>
</ul>

<p>Teniendo en cuenta el orden de la lista de par&aacute;metros anterior, se pueden modificar los datos de un usuario, ya sea estableciendo, suprimiendo o a&ntilde;adiendo, separando por comas en caso de varios datos en un mismo par&aacute;metro.</p>

<pre>
<code class="language-bash">[usuario]:x:1001:[grupo1],[grupo2],[usuario]:::/bin/false
</code></pre>

<p><strong>GROUP</strong></p>

<p>El archivo group contiene los datos de los grupos del sistema</p>

<p>Ejemplo de configuraci&oacute;n de un grupo en el archivo group</p>

<pre>
<code class="language-bash">jose:x:1001:
</code></pre>

<ul>
    <li>Par&aacute;metro 1:&nbsp;Nombre del grupo</li>
    <li>Par&aacute;metro 2:&nbsp;Contrase&ntilde;a cifrada, si es una x las contrase&ntilde;as se encuentran en el archivo /etc/gshadow</li>
    <li>Par&aacute;metro 3:&nbsp;N&uacute;mero identificador UID</li>
    <li>Par&aacute;metro 4:&nbsp;Lista de miembros del grupo</li>
</ul>

<p>Teniendo en cuenta el orden de la lista de par&aacute;metros anterior, se pueden modificar los datos a un grupo.</p>

<pre>
<code class="language-bash">[grupo]:x:1001:[usuario1],[usuario2]
</code></pre>

<p>Adem&aacute;s de los archivos passwd y group existen otros dos archivos en el mismo directorio (etc) relacionados con los usuarios y los grupos del sistema: shadow y gshadow.</p>

<p><strong>SHADOW</strong></p>

<p>El archivo shadow contiene las contrase&ntilde;as de los usuarios del sistema.</p>

<p>Ejemplo de configuraci&oacute;n de un usuario en el archivo shadow</p>

<pre>
<code class="language-bash">jose:$6$zDiyFzsf$Hb/Yy87wPSfoNsdvnOFt5tV9U1AJDLn3xqdRlleYd7tFimFZQZwLIshPO1U56cTcGeGNmkoQyNUuj6hLmpceg.:18469:0:99999:7:::
</code></pre>

<ul>
    <li>Par&aacute;metro 1&nbsp;(jose):&nbsp;<strong>Nombre de usuario</strong>&nbsp;</li>
    <li>Par&aacute;metro 2&nbsp;($6$zDiy...):&nbsp;Contrase&ntilde;a cifrada</li>
    <li>Par&aacute;metro 3&nbsp;(18469):&nbsp;D&iacute;as desde 1/1/1970 hasta &uacute;ltimo cambio de contrase&ntilde;a</li>
    <li>Par&aacute;metro 4&nbsp;(0):&nbsp;N&uacute;mero m&iacute;nimo de d&iacute;as asignados que prohiben poder cambiar la contrase&ntilde;a, si es 0 no existe prohibici&oacute;n</li>
    <li>Par&aacute;metro 5&nbsp;(99999):&nbsp;N&uacute;mero m&aacute;ximo de d&iacute;as asignados que obligan cambiar la contrase&ntilde;a&nbsp;(Si es 99999 nunca expira o no lo necesitaremos :) ).</li>
    <li>Par&aacute;metro 6&nbsp;(7):N&uacute;mero de d&iacute;as anteriores a la expiraci&oacute;n de contrase&ntilde;a que se debe prevenir al usuario.</li>
    <li>Par&aacute;metro 7&nbsp;(vac&iacute;o):N&uacute;mero de d&iacute;as restantes despu&eacute;s de expirar la contrase&ntilde;a, si no se cambia antes.</li>
    <li>Par&aacute;metro 8&nbsp;(vac&iacute;o):&nbsp;N&uacute;mero de d&iacute;as desde 1/1/1970 que indica la expiraci&oacute;n del usuario.</li>
</ul>

<p>GSHADOW</p>

<p>El archivo gshadow contiene las contrase&ntilde;as de los grupos del sistema.</p>

<p>Ejemplo de configuraci&oacute;n de un grupo en el archivo gshadow</p>

<pre>
<code class="language-bash">amigos:*::jose,javi
</code></pre>

<ul>
    <li>Par&aacute;metro 1&nbsp;(audio):&nbsp;Nombre del grupo</li>
    <li>Par&aacute;metro 2&nbsp;(*):&nbsp;Contrase&ntilde;a cifrada, si es ! o * ning&uacute;n usuario tiene acceso mediante el comando newgrp, si es !! igual que con ! pero indica que nunca se ha establecido contrase&ntilde;a en el grupo.</li>
    <li>Par&aacute;metro 3&nbsp;(vac&iacute;o):&nbsp;Los usuarios indicados son administradores y puede a&ntilde;adir y eliminar usuarios usando gpasswd</li>
    <li>Par&aacute;metro 4&nbsp;:&nbsp;Usuarios comunes del grupo&nbsp;</li>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/eW2QFJ35iO7pj8a6jJgZPrVs1RPgyGLsIPFtfpEN.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //121
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Configuración de sudo',
            'slug' => 'configuracion-de-sudo',
            'body_main' => 'Configuración de sudo (sudoers)',
            'body_plus' => '<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;">La configuraci&oacute;n de sudo se encuentra por defecto en el archivo sudoers (/etc/sudoers). Este archivo no solo permite establecer acceso a usuarios o grupos, tambi&eacute;n permite establecer distintos niveles de acceso a esos usuarios o grupos.</span></span></span></p>

<p style="text-align:center"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="color:#0000ff"><strong><span style="font-size:18px">SUDO</span></strong></span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="font-size:18px">Algunas distribuciones de Linux no incorporan sudo instalado por defecto. Un m&eacute;todo simple para detectar si se encuentra instalado es comprobar su versi&oacute;n.</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><strong><span style="font-size:18px">Comprobar versi&oacute;n&nbsp;</span></strong></span></span></span></p>

<pre>
<code class="language-bash">sudo -V
</code></pre>

<p>Si no est&aacute; instalado se accede al usuario root y se procede a la instalaci&oacute;n</p>

<p><strong>Acceder a root</strong></p>

<pre>
<code class="language-bash">su</code></pre>

<p><strong>Instalar sudo</strong></p>

<pre>
<code class="language-bash">apt install sudo
</code></pre>

<p><strong>Trabajar con sudo</strong></p>

<p>Para trabajar con sudo los comandos introducidos deben ir acompa&ntilde;ados de la palabra sudo al inicio:</p>

<pre>
<code class="language-bash">sudo mkdir carpeta
</code></pre>

<p>Sudo comprobar&aacute; la configuraci&oacute;n y si el usuario dispone del suficiente nivel para acceder se continuar&aacute; con la ejecuci&oacute;n, si por el contrario no dispone de privilegios suficientes se denegar&aacute;.</p>

<p><strong>SUDOERS</strong></p>

<p>Sudo, por defecto, incorpora una configuraci&oacute;n b&aacute;sica que, en la mayor&iacute;a de los casos, puede ser m&aacute;s que suficiente, sin embargo, para otros casos se requiere establecer distintos niveles de acceso para los distintos usuarios o grupos.</p>

<p><strong>sudoers&nbsp;</strong></p>

<pre>
<code class="language-bash"># Please consider adding local content in /etc/sudoers.d/ instead of
# directly modifying this file.
#
# See the man page for details on how to write a sudoers file.
#
Defaults    env_reset
Defaults    mail_badpass
Defaults    secure_path="/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin"
# Host alias specification
# User alias specification
# Cmnd alias specification
# User privilege specification
root    ALL=(ALL:ALL) ALL
# Allow members of group sudo to execute any command
%sudo   ALL=(ALL:ALL) ALL
# See sudoers(5) for more information on "#include" directives:
#includedir /etc/sudoers.d</code></pre>

<p>Revisi&oacute;n del c&oacute;digo que incorpora por defecto el archivo sudoers:</p>

<ul>
    <li>Las tres l&iacute;neas con el texto resaltado&nbsp; de la parte superior son ajustes de configuraci&oacute;n de sudo.</li>
    <li>La dos l&iacute;neas con texto resaltado de la parte inferior son dos reglas de acceso: una regla que permite el acceso total al usuario root y otra regla que permite el acceso total al grupo sudo.</li>
</ul>

<p><strong>PRIVILEGIOS</strong></p>

<p>Las reglas de configuraci&oacute;n de privilegios mantiene la siguiente estructura:</p>

<pre>
<code class="language-bash">[usuario_receptor] [host] = ([usuario]:[grupo]) [comando]
</code></pre>

<ul>
    <li><strong>receptor</strong>:&nbsp;Usuario o grupo que recibe el acceso o privilegio</li>
    <li><strong>host</strong>:&nbsp;Nombre del sistema, servidor local, dominio, IP,...</li>
    <li><strong>usuario</strong>:&nbsp;Usuario o usuarios que permiten el acceso al usuario o grupo receptor</li>
    <li><strong>grupo</strong>:&nbsp;Grupo o grupos que permiten el acceso al usuario o grupo receptor</li>
    <li><strong>comando</strong>:&nbsp;Comandos o comandos</li>
</ul>

<p><strong>Acceso total</strong></p>

<p>Para establecer el acceso total a un usuario, se sigue manteniendo el esquema de la configuraci&oacute;n de privilegios. Se asigna el usuario receptor y la palabra ALL para el resto de par&aacute;metros.</p>

<pre>
<code class="language-bash">[usuario] ALL = (ALL:ALL) ALL
</code></pre>

<p>Para establecer acceso total al usuario jose:&nbsp;</p>

<pre>
<code class="language-bash">jose ALL = (ALL:ALL) ALL
</code></pre>

<p>Para los grupos es similar a los usuarios pero a los grupos se a&ntilde;ade el s&iacute;mbolo % al inicio</p>

<pre>
<code class="language-bash">%[grupo] ALL=(ALL:ALL) ALL
</code></pre>

<p>Para establecer acceso total al grupo amigos:</p>

<pre>
<code class="language-bash">%amigos ALL=(ALL:ALL) ALL
</code></pre>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;">Nota: Para que un usuario pueda heredar el privilegio de un grupo ser&aacute; necesario asignar ese usuario a ese grupo.</span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="font-size:18px"><span style="color:#0000ff"><strong>Nivel de Acceso</strong></span></span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><span style="font-size:18px">Para establecer un determinado nivel de acceso es necesario ser m&aacute;s espec&iacute;fico en la configuraci&oacute;n. Se puede especificar un determinado comando, un determinado equipo,...</span></span></span></span></p>

<p style="text-align:left"><span style="font-size:18px"><span style="color:#000000"><span style="font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;"><strong><span style="font-size:18px">Acceso a un comando espec&iacute;fico</span></strong></span></span></span></p>

<pre>
<code class="language-bash">[usuario] ALL = (ALL:ALL) [comando]
</code></pre>

<p><strong>Ejemplo de acceso comando espec&iacute;fico</strong></p>

<pre>
<code class="language-bash">javi ALL = (ALL:ALL) /usr/bin/apt update
</code></pre>

<p><strong>Acceso a un sistema espec&iacute;fico</strong></p>

<pre>
<code class="language-bash">javi 192.168.1.105 = (ALL:ALL) ALL
</code></pre>

<p><strong>Acceso a un comando espec&iacute;fico sin requerimiento de contrase&ntilde;a</strong></p>

<pre>
<code class="language-bash">%javi ALL = (ALL:ALL) NOPASSWD:/usr/bin/apt autoremove
</code></pre>

<p>Nivel de Acceso con Alias</p>

<p>En la configuraci&oacute;n de las reglas se pueden incorporar los datos mediante el concepto de alias, es decir, se asignan todos los datos a unos Alias con nombres f&aacute;ciles de identificar y a continuaci&oacute;n se declaran las reglas recurriendo a esos Alias.</p>

<p>Alias&nbsp;</p>

<p>Para crear un Alias se indica el tipo de Alias, el nombre del nuevo Alias y se asigna el valor</p>

<pre>
<code class="language-bash">[tipo_alias] [nombre_alias] = [valor]
</code></pre>

<p>Para crear m&aacute;s de un alias del mismo tipo se puede simplificar a&ntilde;adi&eacute;ndolos a continuaci&oacute;n, separados por dos puntos</p>

<pre>
<code class="language-bash">[tipo_alias] [nombre] = [valor] : [nombre2] = [valor2] : [nombre3] = [valor3] 
</code></pre>

<p>Tipos de Alias (4)</p>

<ul>
    <li><strong>Host_Alias</strong>: host (equipo,servidor local, dominio, IP,...)</li>
    <li><strong>User_Alias</strong>: nombre de usuario</li>
    <li><strong>Runas_Alias</strong>: ID de usuario administrador (se indica con la almohadilla delante)</li>
    <li><strong>Cmnd_Alias</strong>: comando</li>
</ul>

<p>Configuraci&oacute;n con Alias</p>

<p>Para establecer la regla se a&ntilde;aden los distintos Alias siguiendo el esquema de configuraci&oacute;n de privilegios</p>

<pre>
<code class="language-bash">[Alias_tipo_user] [Alias_tipo_host] = ([usuario]:[grupo]) [Alias_tipo_Cmnd]
</code></pre>

<p><strong>Ejemplo de acceso con Alias</strong></p>

<p>Esta configuraci&oacute;n permite al grupo iptable&nbsp;el acceso&nbsp;en un determinado equipo y de un determinado comando. A efectos pr&aacute;cticos, esta configuraci&oacute;n indica que cualquier usuario que pertenezca al grupo iptable dispone del privilegio para trabajar con el programa iptables.</p>

<pre>
<code class="language-bash">#Alias
Host_Alias HOST_SERVER = DebianServer
Cmnd_Alias CMND_IPTABLES = /sbin/iptables
#Reglas
%iptable HOST_SERVER = (ALL:ALL) CMND_IPTABLES</code></pre>

<p><strong>El orden de las reglas</strong></p>

<p>La configuraci&oacute;n anterior permite a un grupo el acceso al comando iptables. En el siguiente c&oacute;digo se repite la configuraci&oacute;n anterior pero se a&ntilde;ade un nuevo alias y una nueva regla.&nbsp;Este nuevo alias realiza justamente la acci&oacute;n inversa que el anterior, es decir, restringe el comando iptables pero a un &uacute;nico usuario. Ante esta situaci&oacute;n, el orden de las reglas puede afectar.&nbsp;</p>

<pre>
<code class="language-bash">#Alias
Host_Alias HOST_SERVER = DebianServer
Cmnd_Alias CMND_IPTABLES = /sbin/iptables
Cmnd_Alias CMND_IPTABLESNO = !/sbin/iptables
#Reglas
%iptable HOST_SERVER = (ALL:ALL) CMND_IPTABLES
jose HOST_SERVER = (ALL:ALL) CMND_IPTABLESNO</code></pre>

<p>Para entenderlo y teniendo en cuenta que el usuario jose&nbsp;pertenece al grupo iptable, la primera regla permite a jose el acceso al comando iptables y la segunda regla restringe a jose el acceso al comando iptables. Este orden determina que jose no dispone de acceso al comando iptables.</p>

<p>La configuraci&oacute;n del c&oacute;digo siguiente es igual al anterior pero invirtiendo el orden de las reglas</p>

<pre>
<code class="language-bash">#Alias
Host_Alias HOST_SERVER = DebianServer
Cmnd_Alias CMND_IPTABLES = /sbin/iptables
Cmnd_Alias CMND_IPTABLESNO = !/sbin/iptables
#Reglas
jose HOST_SERVER = (ALL:ALL) CMND_IPTABLESNO
%iptable HOST_SERVER = (ALL:ALL) CMND_IPTABLES</code></pre>

<p>En este caso la primera regla restringe a jose el acceso al comando iptables y la segunda regla permite a jose el acceso al comando iptables. Este orden si permite a jose el acceso al comando iptables.</p>

<p>Esta diferencia en el resultado de las dos configuraciones anteriores evidencia que&nbsp;el orden de las reglas de configuraci&oacute;n puede resultar determinante, por&nbsp;todo ello se recomienda mantener el archivo sudoers correctamente organizado procurando as&iacute;, evitar errores.</p>

<p>Ejemplo de acceso con Alias</p>

<pre>
<code class="language-bash"># Host alias specification
Host_Alias SISTEMA = DebianCasa
Host_Alias SERVIDOR = localhost

# User alias specification
User_Alias USR_JOSE = jose
User_Alias USR_LUCAS = lucas

# Cmnd alias specification
Cmnd_Alias CMD_APT_UPDATE = /usr/bin/apt-get update
Cmnd_Alias CMD_APT_UPGRADE = /usr/bin/apt-get upgrade
Cmnd_Alias COMANDO_CLEAN = /usr/bin/apt-get clean

# User privilege specification
USR_JOSE SISTEMA = CMD_APT_UPDATE
USR_LUCAS ALL = CMD_APT_UPGRADE
USR_JOSE SISTEMA = COMANDO_CLEAN
</code></pre>

<p>En lugar de a&ntilde;adir las nuevas especificaciones al archivo sudoers se puede crear uno o m&aacute;s archivos en el directorio sudoers.d, asignando permisos 440 y registrando un nombre de archivo que permita ser m&aacute;s f&aacute;cil de identificar.</p>

<p>Opciones de sudo</p>

<p>Los ajustes permiten personalizar opciones del programa como por ejemplo los valores por defecto de los intentos de contrase&ntilde;a permitidos y el tiempo de espera, con passwd_tries y passwd_timeout, respectivamente.</p>

<pre>
<code class="language-bash">Defaults passwd_tries = 3, passwd_timeout = 5
</code></pre>

<p>Nota: En ocasiones es necesario cerrar sesi&oacute;n y abrir de nuevo para que tengan efecto los cambios.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/eW2QFJ35iO7pj8a6jJgZPrVs1RPgyGLsIPFtfpEN.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //122
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Patrón MVC y JSP en Java',
            'slug' => 'patron-mvc-y-jsp-en-java',
            'body_main' => 'Patrón o modelo MVC',
            'body_plus' => '<p>PATRON MVC&nbsp;</p>

<p>El modelo o patr&oacute;n MVC permite dividir la aplicaci&oacute;n en capas:</p>

<ul>
    <li><strong>El modelo o JavaBean</strong>&nbsp;que permite obtener los datos</li>
    <li><strong>El controlador o servlet</strong>&nbsp;que procesa la petici&oacute;n y permite controlar el flujo de datos</li>
    <li><strong>La vista o JSP</strong>&nbsp;que env&iacute;a la respuesta final al cliente&nbsp;&nbsp;</li>
</ul>

<p>El esquema siguiente muestra el proceso de intercambio de datos manteniendo el modelo MVC en Java, muy similar a la mayor&iacute;a de frameworks.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666468118.png" style="height:454px; width:908px" /></p>

<ul>
    <li><strong>Cliente</strong>: Es el usuario que accede a la aplicaci&oacute;n, generalmente, desde un navegador mediante el protocolo HTTP.</li>
    <li><strong>JavaBean</strong>: es una clase Java que mantiene una estructura determinada y que permite acceder a los datos que pueden estar almacenados en una base de datos (DAO).</li>
    <li><strong>Servlet</strong>: controla el flujo de datos de las peticiones y puede comunicarse con el JavaBean y con el JSP.</li>
    <li><strong>JSP</strong>: permite acceder al servlet y al JavaBean y es el que env&iacute;a la respuesta final al usuario (cliente).<br />
    &nbsp;</li>
</ul>

<p><strong>Caracter&iacute;sticas de JavaBean</strong></p>

<ul>
    <li>Debe contener un constructor sin argumentos que ser&aacute; el indicado para instanciar la clase desde el JSP.</li>
    <li>Las variables no deben ser p&uacute;blicas, accediendo&nbsp;a los datos mediante m&eacute;todos (getter,setter).</li>
    <li>El nombre de los m&eacute;todos getter y setter deben mantener cierta relaci&oacute;n con el nombre de la variable. Por tanto, si el nombre de la variable es&nbsp;<strong>firstName</strong>, el nombre de los m&eacute;todos deben ser&nbsp;<strong>getFirstName()</strong>&nbsp;y&nbsp;<strong>setFirstName()</strong>&nbsp;respectivamente.</li>
</ul>

<p><strong>EJEMPLO (aplicaci&oacute;n MVC)</strong></p>

<p>A continuaci&oacute;n se muestra un ejemplo de aplicaci&oacute;n b&aacute;sica con distintos JSP accediendo a los datos mediante los distintos tipos m&eacute;todos.</p>

<p><strong>web.xml</strong></p>

<pre>
<code class="language-xml">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;web-app version="3.1" xmlns="http://xmlns.jcp.org/xml/ns/javaee" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://xmlns.jcp.org/xml/ns/javaee http://xmlns.jcp.org/xml/ns/javaee/web-app_3_1.xsd"&gt;
    &lt;servlet&gt;
        &lt;servlet-name&gt;testController&lt;/servlet-name&gt;
        &lt;servlet-class&gt;com.jsp.controladores.testController&lt;/servlet-class&gt;
    &lt;/servlet&gt;
    &lt;servlet-mapping&gt;
        &lt;servlet-name&gt;testController&lt;/servlet-name&gt;
        &lt;url-pattern&gt;/testController&lt;/url-pattern&gt;
    &lt;/servlet-mapping&gt;
    &lt;session-config&gt;
        &lt;session-timeout&gt;
            30
        &lt;/session-timeout&gt;
    &lt;/session-config&gt;
&lt;/web-app&gt;</code></pre>

<p><strong>JavaBean</strong>&nbsp;(modelo de datos)</p>

<pre>
<code class="language-java">package com.jsp_10.modelos;
public class testModel 
{
    private String nombre;
    private String correo;
    
    public testModel()
    {
        this.nombre="Jose";
        this.correo="jose@gmail.com";
    }
    
    public String getNombre()
    {
        return this.nombre;
    }
    
    public void setNombre(String n)
    {
        this.nombre=n;
    }
    
    public String getCorreo()
    {
        return this.correo;
    }
    
    public void setCorreo(String n)
    {
        this.correo=n;
    }
}</code></pre>

<p><strong>Servlet</strong></p>

<pre>
<code class="language-java">import javax.servlet.http.HttpServletResponse;
import com.jsp_10.modelos.testModel;
public class testController extends HttpServlet {    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        testModel t=new testModel();
        request.setAttribute("t", t);
        request.getRequestDispatcher("test.jsp").forward(request, response);
    }   
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }    
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }    
    @Override
    public String getServletInfo() {
        return "Short description";
    }
}
</code></pre>

<p>Este servlet crea una instancia del JavaBean,.&nbsp;asigna los datos a un atributo&nbsp;con el m&eacute;todo&nbsp;<strong>setAttribute()</strong>&nbsp;y mediante el m&eacute;todo&nbsp;<strong>getRequestDispatcher()</strong>&nbsp;redirige la petici&oacute;n al JSP.</p>

<p>JSP</p>

<p>Los JSP que siguen a continuaci&oacute;n permiten&nbsp;acceder a los datos del JavaBean&nbsp;con tags distintos pero&nbsp;obteniendo el mismo resultado.</p>

<p>JSP (EL)</p>

<pre>
<code class="language-html">&lt;%@page contentType="text/html" pageEncoding="UTF-8"%&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8" /&gt;
        &lt;title&gt;Ejemplo de JSP con EL&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Ejemplo de JSP con EL&lt;/h1&gt;        
        El nombre es: ${t.nombre}
        &lt;hr&gt;
        El E-Mail es : ${t.correo}        
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p><strong>EL</strong>&nbsp;(Expression Language) permite acceder f&aacute;cilmente a los datos de un JavaBeans, estos datos pueden ser enteros, flotantes, cadenas, constantes booleanas (true, false) y null. Aunque&nbsp;<strong>El</strong>&nbsp;no permite establecer los datos (setter) ofrece cierta flexibilidad a la hora obtenerlos ya que eval&uacute;a la expresi&oacute;n permitiendo operaciones y condiciones.</p>

<pre>
<code class="language-bash">${(1+2)*3}
</code></pre>

<p><strong>JSP</strong>&nbsp;(jsp:getProperty)</p>

<pre>
<code class="language-html">&lt;%@page contentType="text/html" pageEncoding="UTF-8"%&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8" /&gt;
        &lt;title&gt;Ejemplo de JSP con jsp:getProperty&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;JSP con jsp:getProperty&lt;/h1&gt;        
        El nombre es: &lt;jsp:getProperty name="t" property="nombre" /&gt;
        &lt;hr&gt;
        El E-Mail es : &lt;jsp:getProperty name="t" property="correo" /&gt;        
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Este ejemplo de acceso con&nbsp;<strong>jsp:getProperty</strong>&nbsp;permite acceder a los datos sin necesidad de identificaci&oacute;n. El servidor Glassfish (y versiones anteriores de Tomcat) identifican el JavaBean mediante el atributo name, sin embargo en otros servidores es necesario establecer el identificador JavaBean dentro del JSP con el tag&nbsp;<strong>jsp:useBean</strong>&nbsp;que se inlcuye en el c&oacute;digo siguiente.</p>

<pre>
<code class="language-html">&lt;%@page contentType="text/html" pageEncoding="UTF-8"%&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8" /&gt;
        &lt;title&gt;Ejemplo de JSP con jsp:getProperty y jsp:useBean&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;JSP con jsp:getProperty y jsp:useBean&lt;/h1&gt;
        &lt;jsp:useBean id="t" scope="request" class="com.jsp_10.modelos.testModel" /&gt;        
        El nombre desde el EJB es: &lt;jsp:getProperty name="t" property="nombre" /&gt;
        &lt;hr&gt;
        El E-Mail es : &lt;jsp:getProperty name="t" property="correo" /&gt;        
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Esta identificaci&oacute;n mediante la directiva&nbsp;<strong>jsp:useBean</strong>&nbsp;permite acceder tanto por la ruta relativa configurada en web.xml, como adem&aacute;s acceder por la url desde el archivo JSP directamente, ya que el JavaBean se est&aacute; instanciando desde el propio JSP.</p>

<ul>
    <li>El&nbsp;<strong>tag jsp:useBean</strong>&nbsp;permite declarar desde el JSP el modelo JavaBean mientras que los tags&nbsp;<strong>jsp:getProperty</strong>&nbsp;y&nbsp;<strong>jsp:setProperty</strong>&nbsp;permiten obtener y establecer los datos respectivamente.</li>
</ul>

<p><strong>JSP</strong>&nbsp;(scriptlet - expression)</p>

<pre>
<code class="language-html">&lt;%@page contentType="text/html" pageEncoding="UTF-8"%&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8" /&gt;
        &lt;title&gt;Ejemplo de JSP con scriptlets&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;JSP con scriptlets&lt;/h1&gt;        
        &lt;% com.jsp_10.modelos.testModel t= new com.jsp_10.modelos.testModel(); %&gt; 
        &lt;% t.setCorreo("correo@hotmail.com"); %&gt; 
        El nombre desde el EJB es: &lt;%= t.getNombre() %&gt; 
        &lt;hr&gt;
        El E-Mail es : &lt;%= t.getCorreo() %&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Los scriptlets permiten instanciar el JavaBean desde el JSP, de la misma forma que la directiva&nbsp;<strong>jsp:useBean.</strong>&nbsp;En cambio para obtener los datos se recomienda recurrir al m&eacute;todo en lugar del atributo, ya que,&nbsp;el atributo del JavaBean&nbsp;requiere declararse&nbsp; con el modificador&nbsp;<strong>public</strong>&nbsp;para permitir el acceso a las propiedades desde el JSP.</p>

<p><strong>JSP</strong>&nbsp;(JSTL)</p>

<pre>
<code class="language-html">&lt;% @taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %&gt;
&lt;% @page contentType="text/html" pageEncoding="UTF-8" %&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8" /&gt;
        &lt;title&gt;Ejemplo de EJB&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Ejemplo de EJB&lt;/h1&gt;
                
        El nombre desde el EJB es: &lt;c:out value="${t.nombre}"/&gt;
        &lt;hr&gt;
        El E-Mail es : &lt;c:out value="${t.correo}"/&gt;        
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>(Pasar a otra entrada)</p>

<p>JSTL</p>

<p>La librer&iacute;a JSTL (JSP Standard Tag Library) es un conjunto de librer&iacute;as que permiten el acceso al JavaBean mediante tags de una forma m&aacute;s amigable y sencilla para el desarrollador. Se divide en 4 tipos y permite manejar condicionales, iteraciones, DAO, XML...</p>

<p>Para poder hacer uso de JSTL es necesario asegurarse de que se encuentra instalado en el directorio WEB-INF/lib de la aplicaci&oacute;n. Desde NetBeans se a&ntilde;aden mediante la opci&oacute;n A&ntilde;adir Librer&iacute;a y seleccionando las librer&iacute;as.</p>

<p><a href="https://mvnrepository.com/artifact/javax.servlet/javax.servlet-api/4.0.1" target="_blank">Librer&iacute;a JSTL</a></p>

<p><a href="http://tomcat.apache.org/download-taglibs.cgi" target="_blank">Apache Standard TagLib</a></p>

<p>Tipos comunes de JSTL</p>

<p>c:forEach</p>

<p>c:out</p>

<p>c:when</p>

<p>c:set</p>

<p>c:if</p>

<p>Ejemplos de JSTL&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/LQJNB99mbYC4Wsp3mf7d28L0XSy5uHlhv0eppO86.jpg'
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //123
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'MySQL en Java',
            'slug' => 'mysql-en-java',
            'body_main' => 'Acceso a MySQL desde una aplicación Java',
            'body_plus' => '<p>Para establecer conexi&oacute;n con una base de datos MySQL es necesario disponer de un&nbsp;<strong>servidor MySQL</strong>&nbsp;instalado en el sistema con una base de datos creada y el&nbsp;<strong>conector JDBC</strong>&nbsp;instalado en la aplicaci&oacute;n.&nbsp;</p>

<p><strong>INSTALAR JDBC</strong></p>

<p>Para instalar el conector JDBC se accede desde el IDE (Eclipse, NetBeans,...) a la opci&oacute;n&nbsp;<strong>Agregar Librer&iacute;as JAR&nbsp;</strong>seleccionando el archivo.&nbsp;El conector se puede descargar desde la&nbsp;<a href="https://dev.mysql.com/downloads/" target="_blank">p&aacute;gina oficial de MySQL</a>. En el caso de Debian la descarga se basa en un paquete instalador que instala la librer&iacute;a en el directorio asignado de librer&iacute;as Java (/usr/share/java), aunque tambi&eacute;n se puede descomprimir el paquete y extraer el archivo&nbsp;<strong>jar</strong>&nbsp;al lugar deseado.</p>

<p>Conectar a la base de datos (con JSTL)</p>

<p>﻿La librer&iacute;a JSTL permite establecer la conexi&oacute;n y realizar las consultas a la base de datos desde el propio JSP. Para ello es necesario disponer de la librer&iacute;a instalada y configurar los datos de conexi&oacute;n mediante tags XML.</p>

<pre>
<code class="language-html">&lt;%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%&gt;
&lt;%@taglib prefix="sql" uri="http://java.sun.com/jsp/jstl/sql"%&gt;
&lt;%@page contentType="text/html" pageEncoding="UTF-8"%&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"/&gt;
        &lt;title&gt;Conexión MySQL con JSTL&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;h1&gt;Conexión MySQL con JSTL&lt;/h1&gt;
        &lt;sql:setDataSource driver="com.mysql.jdbc.Driver"
         url="jdbc:mysql://localhost/test" user="xip" password="cali" var="con" /&gt;
        &lt;sql:query dataSource="${con}" var="resultados"&gt;            
            select id,nombre from usuarios;
        &lt;/sql:query&gt;
            &lt;ul&gt;
                &lt;c:forEach var="filas" items="${resultados.rows}" &gt;
                    &lt;li&gt;
                        ID: &lt;c:out value="${filas.id}" /&gt;&lt;br&gt;
                        Nombre: &lt;c:out value="${filas.nombre}" /&gt;
                        &lt;hr&gt;
                    &lt;/li&gt;
                &lt;/c:forEach&gt;
            &lt;/ul&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>El tag&nbsp;<strong>sql:setDataSource</strong>&nbsp;permite establecer la conexi&oacute;n y el tag&nbsp;<strong>sql:query</strong>&nbsp;permite realizar las consultas asignando el atributo&nbsp;<strong>dataSource</strong>&nbsp;que representa a la conexi&oacute;n.</p>

<p>&nbsp;</p>

<p><strong>Conectar con la base de datos MySQL</strong></p>

<p>El m&eacute;todo getConnection() envuelto&nbsp;dentro de un bloque try-catch&nbsp;es el encargado de establecer la conexi&oacute;n.&nbsp;Para ello se requiere importar algunas clases del paquete java.sql, y disponer de los datos de conexi&oacute;n a la base de datos.&nbsp;</p>

<pre>
<code class="language-java">package com.mundaxip.com.mysql;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
public class Conectar
{    
    protected  Connection con;
    protected PreparedStatement consulta;
    protected ResultSet datos;
    private String server,user,bd,pass;
    
    public Conectar() {        
        this.server="localhost";
        this.bd="miBaseDeDatos";
        this.user="admin";
        this.pass="admin";       
    }    
    public void con() throws SQLException {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            this.con=DriverManager.getConnection("jdbc:mysql://"+this.server+"/"+this.bd,this.user,this.pass);                    
        }catch(ClassNotFoundException e) {
            e.printStackTrace();
        }       
    }
}</code></pre>

<p><strong>Consultas a la base de datos (desde la clase)</strong></p>

<p>Las consultas a la base de datos se preparan previamente con el m&eacute;todo&nbsp;<strong>prepareStatement()</strong>&nbsp;que permite pasar como argumento la consulta en formato&nbsp;<strong>SQL</strong>&nbsp;para, a continuaci&oacute;n, ejecutar la consulta con el m&eacute;todo&nbsp;<strong>executeQuery()</strong>.</p>

<pre>
<code class="language-java">package com.mundaxip.com.mysql;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
public class Conectar
{    
    protected  Connection con;
    protected PreparedStatement consulta;
    protected ResultSet datos;
    private String server,user,bd,pass;
    
    public Conectar() {        
        this.server="localhost";
        this.bd="miBaseDeDatos";
        this.user="admin";
        this.pass="admin";       
    }    
    public void con() throws SQLException {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            this.con=DriverManager.getConnection("jdbc:mysql://"+this.server+"/"+this.bd,this.user,this.pass);                    
        }catch(ClassNotFoundException e) {
            e.printStackTrace();
        }       
    }
    public ResultSet getDatos() throws SQLException
    {
        this.con();
        this.consulta=this.con.prepareStatement("select * from mitabla");
        this.datos=this.consulta.executeQuery();
        return this.datos;
    }
}</code></pre>

<p><strong>MOSTRAR DATOS EN JSP</strong></p>

<p><strong>Servlet</strong></p>

<pre>
<code class="language-java">package com.mundaxip.com.servlet;
import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import com.mundaxip.com.mysql.Conectar;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
public class test_datos extends HttpServlet {
    
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, SQLException {
        response.setContentType("text/html;charset=UTF-8");        
            Conectar c = new Conectar();
            ResultSet rs=c.getDatos();
            List&lt;String&gt; listaNombre=new ArrayList&lt;String&gt;();
            List&lt;String&gt; listaCorreo=new ArrayList&lt;String&gt;();
            while(rs.next())
            {
                listaNombre.add(rs.getString("nombre"));
                listaCorreo.add(rs.getString("email"));
            }            
            request.setAttribute("nombre",listaNombre);
            request.setAttribute("correo",listaCorreo);
            request.getRequestDispatcher("index.jsp").forward(request,response);                    
    }
   
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(test_datos.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(test_datos.class.getName()).log(Level.SEVERE, null, ex);
        }
    }    
}</code></pre>

<p>Este servlet maneja los datos de la base de datos bas&aacute;ndose en la clase de conexi&oacute;n anterior. Para no extender el post este ejemplo almacena los datos en listas en lugar de un modelo de datos, pero es suficiente para poder enviar los datos mediante el m&eacute;todo&nbsp;<strong>setAttribute()</strong>&nbsp;y redirigir al JSP mediante el m&eacute;todo&nbsp;<strong>getRequestDispatcher()</strong>.</p>

<p><strong>index.jsp</strong></p>

<pre>
<code class="language-html">&lt;%@page import="java.util.List"%&gt;
&lt;%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core"%&gt;
&lt;%@page contentType="text/html" pageEncoding="UTF-8"%&gt;
&lt;!DOCTYPE html&gt;
&lt;html&gt;
    &lt;head&gt;
        &lt;meta charset="UTF-8"&gt;
        &lt;title&gt;JSP Page&lt;/title&gt;
    &lt;/head&gt;
    &lt;body&gt;
        &lt;%
            List listaNombre=(List)request.getAttribute("nombre");
            List listaCorreo=(List)request.getAttribute("correo");
        %&gt;
        &lt;h1&gt;Hello World!&lt;/h1&gt;&lt;c:out value="Hola mundo desde JSTL"/&gt;        
        &lt;table&gt;
            &lt;tr style="background:#696969;color:white;font-weight:bold"&gt;
                &lt;td align="center"&gt;Nombre&lt;/td&gt;
                &lt;td align="center"&gt;Correo&lt;/td&gt;
            &lt;/tr&gt;        
        &lt;% for(int i=0;i&lt;listaNombre.size();i++){ %&gt;
        &lt;tr&gt;            
            &lt;td&gt;                
                &lt;%= listaNombre.get(i) %&gt;
            &lt;/td&gt;
            &lt;td&gt;
                &lt;%= listaCorreo.get(i) %&gt;
            &lt;/td&gt;
        &lt;/tr&gt;
        &lt;% } %&gt;
        &lt;/table&gt;
    &lt;/body&gt;
&lt;/html&gt;</code></pre>

<p>Este JSP se compone de una tabla que, mediante scriptlets, realiza un bucle for&nbsp; y con expresiones JSP se incorporan los datos de las listas en cada campo.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/QdD5YPfiMojLdvBUK7ptF7dlUOcjNGlRhizYdZOI.jpg'

        ]);
        
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 7
        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 22
        ]);

        //124
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'React',
            'slug' => 'react',
            'body_main' => 'Instalación y creación de un proyecto con ReactJS',
            'body_plus' => '<p>T&eacute;cnicamente, React es una librer&iacute;a de JavaScript open source (c&oacute;digo abierto), coloquialmente, React es uno de los frameworks m&aacute;s punteros para construir aplicaciones de una sola p&aacute;gina (SPA) similar a Angular o Vue.&nbsp;Desarrollado por Facebook, se basa en la creaci&oacute;n de componentes mediante la implementaci&oacute;n de una nueva sintaxis denominada JSX que combina lenguaje HTML y XML con c&oacute;digo JavaScript. A diferencia de otros frameworks, React no incluye todas las herramientas necesarias&nbsp;para aplicaciones grandes y complejas,&nbsp;se encuentra m&aacute;s enfocado al sistema de vistas, sin embargo,&nbsp;se apoya en otras librer&iacute;as, f&aacute;ciles de implementar, que permiten desarrollar f&aacute;cilmente cualquier tipo de aplicaci&oacute;n.</p>

<p>NPM</p>

<p>Para la instalaci&oacute;n de Reactjs es necesario disponer del gestor npm, a ser posible en la &uacute;ltima versi&oacute;n y limpiar la cach&eacute; para asegurar la instalaci&oacute;n de la &uacute;ltima versi&oacute;n de React.</p>

<pre>
<code class="language-bash">npm install -g npm@latest
</code></pre>

<pre>
<code class="language-bash">npm cache clean --force
</code></pre>

<p>INSTALACI&Oacute;N REACT</p>

<pre>
<code class="language-bash">npm install -g create-react-app
</code></pre>

<p>CREAR PROYECTO REACT</p>

<pre>
<code class="language-bash">create-app-react [nombre_proyecto]
</code></pre>

<p>Nota: El nombre de proyecto debe ser introducido en min&uacute;sculas.</p>

<p>ARRANCAR PROYECTO</p>

<pre>
<code class="language-bash">npm start
</code></pre>

<p>Al iniciar el proyecto React abre el navegador predeterminado del sistema. Para asignar otro navegador (Chrome o Firefox) como navegador por defecto, es necesario editar el archivo package.json y modificar el valor de la propiedad&nbsp;<strong>starts</strong>&nbsp;del objeto&nbsp;<strong>scripts</strong>.</p>

<p>Objeto inicial:</p>

<pre>
<code class="language-javascript">"scripts": {
    "start": "react-scripts start",
    "build": "react-scripts build",
    "test": "react-scripts test",
    "eject": "react-scripts eject"
  },</code></pre>

<p>Asignar a&nbsp; Firefox</p>

<pre>
<code class="language-javascript">"start": "BROWSER=firefox react-scripts start",
...</code></pre>

<p>Asignar a&nbsp; Chrome</p>

<pre>
<code class="language-javascript">"BROWSER=\'google-chrome-stable\' react-scripts start"
...</code></pre>

<p>Asignar a&nbsp; Chromium</p>

<pre>
<code class="language-javascript">"start": "BROWSER=\'chromium\' react-scripts start",
...
</code></pre>

<p>INICIAR PROYECTO EN UN PUERTO DIFERENTE</p>

<p>Para poder arrancar el proyecto en un puerto distinto se puede crear un nuevo fichero en la ra&iacute;z del proyecto con el nombre&nbsp;<strong>.env</strong>&nbsp;indicando el n&uacute;mero de puerto.</p>

<p>.env</p>

<pre>
<code class="language-bash">PORT=[número_puerto]
</code></pre>

<p>A continuaci&oacute;n iniciar el proyecto&nbsp;</p>

<pre>
<code class="language-bash">npm start
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'DRAFT',
            'file' => 'NULL'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 25
        ]);

        //125
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Componente React',
            'slug' => 'componente-react',
            'body_main' => 'Componentes en ReactJS',
            'body_plus' => '<p>Un componente en React se basa en un archivo con extensi&oacute;n&nbsp;<strong>js</strong>&nbsp;y una clase compuesta con el m&eacute;todo&nbsp;<strong>render()</strong>&nbsp;que se encarga de renderizar dicho componente. Aunque t&eacute;cnicamente React permite crear un componente con una funci&oacute;n tradicional JavaScript, es recomendable el uso de clases mediante el est&aacute;ndar ECMAScript 6.</p>

<pre>
<code class="language-javascript">import React from \'react\';
class MiComponente extends React.Component{
    render(){
        let persona = {
            nombre: "Jose",
            ciudad: "Barcelona",
            edad: 30,
        };
        return (
            &lt;div className="mi-componente"&gt;
                &lt;h1&gt;{persona.nombre}&lt;/h1&gt;
                &lt;h2&gt;{persona.ciudad}&lt;/h2&gt;
            &lt;/div&gt;
        )
}
export default MiComponente;</code></pre>

<p>Para poder visualizar el componente en un proyecto React, de la misma forma que otros frameworks, es necesario importarlo y declararlo en el componente principal del proyecto, por defecto&nbsp;<strong>App.js</strong>.</p>

<p>App.js</p>

<pre>
<code class="language-javascript">import \'./App.css\';
import MiComponente from \'./MiComponente\';
function App() {
  return (
    &lt;div className="App"&gt;
        &lt;MiComponente /&gt;
    &lt;/div&gt;
  );
}
export default App;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'DRAFT',
            'file' => 'NULL'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 25
        ]);

        //126
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Características de React',
            'slug' => 'caracteristicas-de-react',
            'body_main' => 'Características comunes de un componente React',
            'body_plus' => '<p><strong>CARACTER&Iacute;STICAS</strong></p>

<p><strong>M&eacute;todo return</strong></p>

<p>Algunas de las caracter&iacute;sticas de React es que su m&eacute;todo return permite mostrar los datos siempre que est&eacute;n dentro de llaves, la declaraci&oacute;n de variables u objetos debe realizarse fuera del m&eacute;todo y que tan solo permite un nodo principal, es decir, se pueden a&ntilde;adir todos los elementos que se quieran pero siempre dentro de un &uacute;nico elemento principal, generalmente un div o un elemento propio de React denominado React.Fragment, tal como se muestra en el c&oacute;digo a continuaci&oacute;n.</p>

<pre>
<code class="language-javascript">import React from \'react\';
class MiComponente extends React.Component{
    render(){
        let persona = {
            nombre: "Jose",
            ciudad: "Barcelona",
            edad: 30,
        };
        return (
            &lt;React.Fragment&gt;
                &lt;h1&gt;{persona.nombre}&lt;/h1&gt;
                &lt;h2&gt;{persona.ciudad}&lt;/h2&gt;
            &lt;/React.Fragment&gt;
        )
}
export default MiComponente;</code></pre>

<p><strong>Destructuring</strong></p>

<p>Una de las pecualiaridades de ES6 aplicable a React y comunmente utilizado es el llamado Destructuring, que permite&nbsp; importar de forma m&aacute;s limpia un componente.</p>

<pre>
<code class="language-javascript">import React, {Component} from \'react\';
class MiComponente extends Component{
}
export default MiComponente;
</code></pre>

<p>Aunque el Destructuring no es una caracter&iacute;stica propia de React, es muy com&uacute;n su uso, tambi&eacute;n en&nbsp; propiedades de un objeto.</p>

<p>Tradicional</p>

<pre>
<code class="language-javascript">let persona = {
            nombre: "Jose",
            ciudad: "Barcelona",
            edad: 30,
        };
console.log(persona.nombre); //Jose
</code></pre>

<p>Destructuring</p>

<pre>
<code class="language-javascript">let persona = {
            nombre: "Jose",
            ciudad: "Barcelona",
            edad: 30,
        };
const {nombre,ciudad,edad} = persona;
console.log(nombre); //Jose</code></pre>

<p><strong>Condicionales y bucles&nbsp;</strong></p>

<p>Otra de las ventajas de React que lo hacen interesante es que no requiere de directivas o de otros elementos nuevos a la hora de realizar condicionales o bucles.</p>

<pre>
<code class="language-javascript">import React, {Component} from \'react\';
class MiComponente extends Component{
  render(){
    let coche = {
      modelo:["BMW","Audi","Seat","Opel"]
    }
    return(
      &lt;ul&gt;
      {
        coche.modelo.map((mod,i) =&gt; {
          return(
            &lt;li key = {i}&gt;
              {mod}
            &lt;/li&gt;
          )
        })
      }
      &lt;/ul&gt;
    );
  }
}
export default MiComponente;</code></pre>

<p><strong>Comentarios</strong></p>

<p>Los comentarios en React deben encerrarse entre llaves</p>

<pre>
<code class="language-javascript">{/*mi comentario */}
</code></pre>

<p><strong>Im&aacute;genes</strong></p>

<p>Los imports de las im&aacute;genes...</p>
',          
            'user_id' => 1,
            'status' => 'DRAFT',
            'file' => 'NULL'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 25
        ]);

        //127
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Vue',
            'slug' => 'vue',
            'body_main' => 'Instalación de Vue.js',
            'body_plus' => '<p>Vue es un framework de JavaScript open source (de c&oacute;digo abierto), basado en aplicaciones de una sola p&aacute;gina (SPA). Este framework fue creado en China por Evan You y se ha posicionado en poco tiempo en uno de los frameworks m&aacute;s demandados por las empresas. De la misma forma que Angular y React se basa en la creaci&oacute;n de componentes, permitiendo la reutilizaci&oacute;n de c&oacute;digo y manteniendo conceptos tanto de Angular como de React. Como ventajas a destacar es que no es necesario conocer una sintaxis distinta y la estructura de los componentes es clara y sencilla, sin embargo, s&iacute; requiere de un nivel medio alto de JavaScript para elaborar un proyecto limpio, si no, se puede acabar creando un c&oacute;digo dif&iacute;cil de leer y de manejar, comunmente llamado c&oacute;digo espaguetti,&nbsp;a medida que va escalando el proyecto.&nbsp;</p>

<p><strong>Instalaci&oacute;n</strong></p>

<p>Para instalar Vue.js v&iacute;a npm es necesario tener instalado Nodejs en el sistema</p>

<pre>
<code class="language-bash">npm install -g @vue/cli
</code></pre>

<p><strong>Comprobar versi&oacute;n</strong></p>

<pre>
<code class="language-javascript">vue --version
</code></pre>

<p><strong>Crear proyecto Vue</strong></p>

<pre>
<code class="language-bash">vue create [proyecto]
</code></pre>

<p><strong>Arrancar proyecto</strong></p>

<pre>
<code class="language-bash">npm run serve
</code></pre>

<p><strong>Arrancar proyecto en un puerto diferente</strong></p>

<pre>
<code class="language-bash">npm run serve -- --port [número_puerto]
</code></pre>

<p><strong>Nueva versi&oacute;n Vue 3</strong></p>

<p>La creaci&oacute;n de un proyecto Vue mediante el comando npm permite la opci&oacute;n de instalar la versi&oacute;n Vue 2 o Vue 3. La versi&oacute;n Vue 3 viene con novedades interesantes como el soporte a TypeScript y una mayor optimizaci&oacute;n del c&oacute;digo JavaScript en los componentes.</p>

<p>Para los anteriores proyectos creados con Vue2 existe la posibilidad de instalar un plugin que permite compatibilizar la versi&oacute;n Vue 2 con la Vue 3.</p>

<pre>
<code class="language-bash">npm install --save @vue/composition-api
</code></pre>

<p>&nbsp;Una vez instalado el plugin es necesario importar la api desde el archivo&nbsp;<strong>main.js</strong>. Con esto es suficiente para poder hacer uso del m&eacute;todo&nbsp;<strong>setup()</strong>&nbsp;y elementos nuevos como&nbsp;<strong>reactive</strong>.</p>

<pre>
<code class="language-javascript">import VueCompositionApi from \'@vue/composition-api\';
Vue.use(VueCompositionApi);</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/A6ghD40VtCRfJuGwgBfziO9kcx8fb0RqGDoT3MWY.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);

        //128
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Componente Vue',
            'slug' => 'componente-vue',
            'body_main' => 'Componentes en Vue.js',
            'body_plus' => '<p>Un componente Vue se distingue por la extensi&oacute;n&nbsp;<strong>vue</strong>&nbsp;y se compone de tres etiquetas html, la etiqueta&nbsp;<strong>template</strong>&nbsp;que contiene la vista, la etiqueta&nbsp;<strong>script</strong>&nbsp;que contiene todo el c&oacute;digo JavaScript y la etiqueta&nbsp;<strong>style</strong>&nbsp;compuesta por los estilos CSS.</p>

<p><strong>Estructura de un componente en Vue</strong></p>

<ul>
    <li>Etiqueta template</li>
    <li>Etiqueta script</li>
    <li>Etiqueta style</li>
</ul>

<pre>
<code class="language-html">&lt;template&gt;
...
&lt;/template&gt;
&lt;script&gt;
... 
&lt;/script&gt;
&lt;style&gt;
...
&lt;/style&gt;</code></pre>

<p>MiComponente.vue</p>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;div&gt;
        &lt;h1 class="titulo"&gt;{{titulo}}&lt;/h1&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
    name: \'MiComponente\',
    data() {
        return {
            titulo: "Mi nuevo componente"
        }
    }
}
&lt;/script&gt;
&lt;style&gt;
.titulo{
    font-weight:bold
}
&lt;/style&gt;</code></pre>

<p>Es recomendable crear uno o varios directorios para mantener un orden de los distintos componentes y siempre incorporar la extensi&oacute;n vue en la creaci&oacute;n del componente. Para incluir un componente al proyecto, ya sea a otro componente creado anteriormente o al componente principal&nbsp;<strong>(App.vue)</strong>, que se encuentra en la ra&iacute;z del proyecto, se requiere importar dicho componente, la declaraci&oacute;n del componente en el objeto components y a continuaci&oacute;n a&ntilde;adirlo a la vista como un elemento xml, con el nombre definido en el propio componente.</p>

<p><strong>A&ntilde;adir componente en Vue</strong></p>

<ul>
    <li>Importar componente</li>
    <li>Declarar componente en components</li>
    <li>Incluir componente en el template en formato XML</li>
</ul>

<p>App.vue</p>

<pre>
<code class="language-html">&lt;template&gt;
  &lt;div id="app"&gt;
    &lt;img alt="Vue logo" src="./assets/logo.png"&gt;
    &lt;HelloWorld msg="Welcome to Your Vue.js App"/&gt;
    &lt;MiComponente&gt;&lt;/MiComponente&gt;
  &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
import HelloWorld from \'./components/HelloWorld.vue\'
import MiComponente from \'./components/MiComponente.vue\';
export default {
  name: \'App\',
  components: {
    HelloWorld,
    MiComponente
  }
}
&lt;/script&gt;
&lt;style&gt;
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
&lt;/style&gt;
</code></pre>

<p><strong>Importar vistas y estilos a un componente en Vue</strong></p>

<p>La etiqueta template permite importar una vista a un componente mediante el atributo&nbsp;<strong>src</strong>.</p>

<pre>
<code class="language-html">&lt;template src="./MiVista.html\'&gt;&lt;/template&gt;
</code></pre>

<p>La etiqueta style permite importar una hoja de estilos mediante la&nbsp;<strong>@</strong>.</p>

<pre>
<code class="language-html">&lt;style&gt;
@import \'./assets/css/styles.css\';
&lt;/style&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/A80nrSbnnz4ATHU4r40q7cINzodWtao5aUtlk8df.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);
        //129
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Rutas en Vue',
            'slug' => 'rutas-en-vue',
            'body_main' => 'Sistema de rutas en Vue.js',
            'body_plus' => '<p>Vue no incorpora un sistema de rutas por defecto como&nbsp;Angular, sin embargo es muy sencillo de instalar mediante npm.</p>

<p><strong>Instalar paquete de rutas en Vue</strong></p>

<pre>
<code class="language-bash">npm install --save vue-router
</code></pre>

<p><strong>Crear rutas en Vue (main.js)</strong></p>

<p>Las rutas se crean&nbsp;mediante un array de objetos indicando la ruta y el componente y a&nbsp;continuaci&oacute;n,&nbsp;se crea un nuevo objeto de rutas incluyendo dicho array.</p>

<pre>
<code class="language-javascript">const routes = [
    {path: [ruta1], component: [Componente1]},
    {path: [ruta2], component: [Componente2]},
    ...
];
const router = new VueRouter({
    routes,
    mode: \'history\'
})</code></pre>

<p>Para activar las rutas creadas de forma global&nbsp;se incluye en el objeto Vue del archivo main.js, habiendo antes importado todos los componentes requeridos, incluyendo la declaraci&oacute;n del paquete anteriormente instalado.</p>

<p>main.js</p>

<pre>
<code class="language-javascript">import Vue from \'vue\'
import App from \'./App.vue\'
import VueRouter from \'vue-router\';
import HomeComponent from \'./components/HomeComponent.vue\';
import MiComponente from \'./components/MiComponente\';
Vue.config.productionTip = false
Vue.use(VueRouter);
const routes = [
    {path:\'/home\',component: HomeComponent},
    {path:\'/mi-componente\', component: MiComponente}
];
const router = new VueRouter({
    routes,
    mode: \'history\'
});
new Vue({
  router,
  render: h =&gt; h(App),
}).$mount(\'#app\')</code></pre>

<p>Es conveniente especificar que si se asigna un nombre distinto de&nbsp;<strong>router</strong>&nbsp;al objeto VueRouter no podr&aacute; ser simplificado y por tanto ser&aacute; necesario incluir la propiedad y el valor.</p>

<pre>
<code class="language-javascript">const myRouter = new VueRouter({
    routes,
    mode: \'history\'
});
new Vue({
  router: myRouter,
  render: h =&gt; h(App),
}).$mount(\'#app\')</code></pre>

<p>Finalmente se a&ntilde;ade la etiqueta router-view en la vista del componente principal o se sustituye por los componentes a&ntilde;adidos de forma est&aacute;tica. De esta forma tan sencilla y con una etiqueta similar a la etiqueta router-outlet de Angular se cargan los distintos componentes sin necesidad de recargar toda la p&aacute;gina.</p>

<pre>
<code class="language-html">&lt;template&gt;
  &lt;div id="app"&gt;
    &lt;Header&gt;&lt;/Header&gt;    
    &lt;!--&lt;HomeComponent&gt;&lt;/HomeComponent&gt;--&gt;
    &lt;!--&lt;MiComponente&gt;&lt;/MiComponente&gt;--&gt;
    &lt;router-view&gt;&lt;/router-view&gt;
    &lt;Footer&gt;&lt;/Footer&gt;
  &lt;/div&gt;
&lt;/template&gt;</code></pre>

<p><strong>A&ntilde;adir par&aacute;metros en las rutas</strong></p>

<p>Los par&aacute;metros de una ruta se separan con barra (&nbsp;<strong>/</strong>&nbsp;) y deben ir precedidos del signo de dos puntos (&nbsp;<strong>:</strong>&nbsp;). Para indicar que el par&aacute;metro de una ruta sea opcional debe ir seguido del signo de interrogante (&nbsp;<strong>?&nbsp;</strong>).</p>

<pre>
<code class="language-javascript">...
{path: \'/editar/:id\', component: EditUsuario },
{path: \'/mi-componente/:id?\',name:\'mi-componente\', component: MiComponente },
...</code></pre>

<p><strong>Capturar par&aacute;metros de la url</strong></p>

<p>Para capturar un par&aacute;metro desde un componente se genera mediante la propiedad&nbsp;<strong>params</strong>&nbsp;del objeto&nbsp;<strong>route</strong>&nbsp;indicando el nombre del par&aacute;metro.</p>

<pre>
<code class="language-html">&lt;script&gt;
export default {
    name: \'MiComponente\',
    miParametro: null,
    mounted(){
        this.miParametro = this.$route.params.id;
    } 
}
&lt;script&gt;</code></pre>

<p><strong>Crear enlace en la vista de un componente</strong></p>

<p>Los enlaces se manejan con la etiqueta&nbsp;<strong>router-link</strong>&nbsp;y el atributo o directiva&nbsp;<strong>to</strong>&nbsp;y pueden redirigir a una ruta simple o una ruta con par&aacute;metros.</p>

<ul>
    <li>Enlace de ruta simple mediante atributo</li>
</ul>

<pre>
<code class="language-html">&lt;router-link to="/home"&gt;Inicio&lt;/router-link&gt;
</code></pre>

<ul>
    <li>Enlace de ruta con par&aacute;metros mediante atributo</li>
</ul>

<pre>
<code class="language-html">&lt;router-link to="/mi-componente/10"&gt;MiComponente&lt;/router-link&gt;</code></pre>

<ul>
    <li>Enlace de ruta mediante directiva</li>
</ul>

<pre>
<code class="language-html">&lt;router-link :to="{name:\'mi-componente\',params:{id:\'10\'}}"&gt;MiComponente&lt;/router-link&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/yEHzFgw2ymo3hTVpZ8MozYVR4Ptyz6KmBCspGGiG.jpg'

        ]);

         DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);
        //130
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Data Binding Vue',
            'slug' => 'data-binding-vue',
            'body_main' => 'Two way data binding y directivas en Vue',
            'body_plus' => '<p><strong>Two way data binding</strong>&nbsp;es una funcionalidad com&uacute;n en frameworks modernos, est&aacute; basado en la comunicaci&oacute;n de datos reactiva dentro de un componente. De un modo pr&aacute;ctico, se puede decir que un usuario puede interactuar mediante un elemento de la vista y realizar una acci&oacute;n determinada, hasta aqu&iacute; ninguna novedad, algo normal con JavaScript, la ventaja est&aacute; en que esta acci&oacute;n puede ser procesada por un m&eacute;todo espec&iacute;fico y volver a reflejarse&nbsp;en un elemento de la vista&nbsp;(mostrando, ocultando o modificando)&nbsp;sin implicar al resto de elementos de la p&aacute;gina y todo de forma instant&aacute;nea (reactiva).</p>

<p><strong>Directivas</strong></p>

<p>Este tipo de comunicaci&oacute;n, denominada bidireccional, se apoya en&nbsp;directivas&nbsp;de atributo que no son otra cosa que atributos que se pueden insertar en las etiquetas html, que son identificadas por Vue y pueden ser manejadas como una propiedad del componente.</p>

<p><strong>v-model</strong></p>

<p>La directiva v-model permite enlazar una propiedad con el valor de un elemento html de los soportados por Vue (input, textarea, select).</p>

<pre>
<code class="language-html">&lt;template&gt;
&lt;div&gt;
    &lt;h1&gt;Directiva v-model&lt;/h1&gt;
    &lt;input type="text" v-model="color" /&gt;
    &lt;h2&gt;{{color}}&lt;/h2&gt;
&lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
    name: \'MiComponente\',
    data(){
        return {
            color:""
        }
    }
}
&lt;/script&gt;</code></pre>

<p><strong>v-if, v-else-if, v-else</strong></p>

<p>Las directivas v-if, v-else-if, v-else permiten realizar condicionales dentro de la vista.</p>

<pre>
<code class="language-html">&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Directivas v-if, v-else-if, v-else&lt;/h1&gt;
    &lt;input type="number" v-model="numero" /&gt;
    &lt;div class="verde" v-if="!numero || numero == 0"&gt;
      No existe número o tiene el valor 0
    &lt;/div&gt;    
    &lt;div class="rojo" v-if="numero &lt; 0"&gt;
      El número es negativo
    &lt;/div&gt;
    &lt;p&gt;{{numero}}&lt;/p&gt; 
    &lt;p class="verde" v-if="numero &gt; 5"&gt;El número es mayor a 5&lt;/p&gt;
    &lt;p class="naranja" v-else-if="numero == 5"&gt;El número es igual a 5&lt;/p&gt;
    &lt;p class="rojo" v-else&gt;El número es menor a 5&lt;/p&gt; 
  &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
  name: \'MiComponente\',  
  data(){
    return {
      numero: 0
    }
  }  
}
&lt;/script&gt;
&lt;style&gt;
  .verde{color:green;}
  .naranja{color:orange;}
  .rojo{color:red;}
&lt;/style&gt;</code></pre>

<p><strong>v-for</strong></p>

<p>La directiva v-for permite realizar bucles dentro de la vista.</p>

<pre>
<code class="language-html">&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Directiva v-for&lt;/h1&gt;    
    &lt;div class="div-deportes"&gt;
      &lt;ul&gt;
        &lt;li v-for="deporte in deportes" :key="deporte"&gt;{{deporte}}&lt;/li&gt;        
      &lt;/ul&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
  name: \'MiComponente\',  
  data(){
    return {      
      deportes: [\'balonmano\', \'balonpie\', \'baloncesto\',\'balonvolea\']
    }
  }  
}
&lt;/script&gt;
&lt;style&gt;  
  .div-deportes ul{
    float:left;    
    transform: translate(-50%,-20%);
    top:50%;left:50%;
    position:relative;}
&lt;/style&gt;</code></pre>

<p><strong>v-bind</strong></p>

<p>El v-bind permite asignar una propiedad a un atributo propio de HTML, para ello es necesario que el atributo vaya precedido de&nbsp;<strong>v-bind:</strong>&nbsp;o&nbsp;&nbsp;<strong>:</strong></p>

<pre>
<code class="language-html">&lt;template&gt;
  &lt;div&gt;
    &lt;h1&gt;Directiva v-bind&lt;/h1&gt;    
    &lt;img v-bind:src="image"/&gt;
    &lt;div :class="{
    divAzul: range &gt;= 50,
    divVerde: range &lt; 50,
    divRosa: range &gt; 75
    }"&gt;
      &lt;input type="range" min="0" max="100" v-model="range"/&gt;
    &lt;/div&gt;    
  &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
  import imagen from \'../assets/foto.jpg\';
export default {
  name: \'MiComponente\',  
  data(){
    return {
      image:imagen,
      range: "50"     
    }
  }  
}
&lt;/script&gt;
&lt;style&gt;
  img{width:200px;margin-bottom:50px;}
  .divAzul{background-color: lightblue;}
  .divVerde{background-color: lightgreen;}
  .divRosa{background-color: lightpink;}
&lt;/style&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/MJKMMNCnF9BUNMus31qnfMll4HLgC5ItpOGP3dZb.jpg'

        ]);

         DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);
        //131
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'computadas y filtros en Vue',
            'slug' => 'computadas-y-filtros-en-vue',
            'body_main' => 'Propiedades computadas y filtros en Vue.js',
            'body_plus' => '<p><strong>Propiedades computadas</strong></p>

<p>Las propiedades computadas en Vue permiten que las propiedades que&nbsp;forman parte de la l&oacute;gica del componente&nbsp;y que requieren alguna modificaci&oacute;n o cambio se modifiquen de una forma limpia sin necesidad de sobrecargar el template del componente.&nbsp;</p>

<p>A continuaci&oacute;n se muestra un ejemplo de un componente que convierte datos a may&uacute;sculas mediante el uso de propiedades computadas.</p>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;div&gt;
    &lt;p&gt;Propiedad: {{datos[0]}}&lt;/p&gt;
    &lt;p&gt;Propiedad computada: {{pasarAMayus[0]}}&lt;/p&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
    name: \'MiComponente\',
    computed:{
    pasarAMayus(){
        var data=this.datos;
        for(var i=0;i&lt;data.length;i++){
        data[i]=data[i].toUpperCase();
        }
        return data;
        }
    },
    data(){
    return {
        datos:["coche","moto","bicicleta"]  
    }
    }
}
&lt;/script&gt;
</code></pre>

<p>Una particularidad de las propiedades en Vue es que no permiten trabajar con otras propiedades, para ello es necesario recurrir&nbsp;a m&eacute;todos y ejecutarlos desde mounted() o created(), las&nbsp;propiedades computadas son una buena opci&oacute;n.</p>

<pre>
<code class="language-html">&lt;template&gt;
   &lt;div&gt;      
        &lt;p&gt;{{otroDato}}&lt;/p&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
    name: \'MiComponente\',
    computed:{      
        otroDato(){
        let datus;
        datus=this.datos;
        datus.push("triciclo");
        return datus;
        }
    },  
    data(){
        return {
        datos:["coche","moto","bicicleta"]
        }
    }   
}
&lt;/script&gt;
</code></pre>

<p><strong>Filtros en Vue</strong></p>

<p>Los filtros en Vue son similares a los Pipes de Angular, permiten de forma sencilla y r&aacute;pida modificar datos como pueden ser fechas, tipos de moneda, convertir a may&uacute;sculas o min&uacute;sculas,...</p>

<p>A continuaci&oacute;n un ejemplo b&aacute;sico de filtro convirtiendo euros a d&oacute;lares</p>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;div&gt;     
    &lt;p&gt;Euros: {{euro}}€&lt;/p&gt;
    &lt;p&gt;Dolares: {{euro | dolares}}&lt;/p&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
    name: \'MiComponente\',
    filters:{
    dolares(value){
        let data=value*1.21;
        return "$"+data;
    }
    },  
    data(){
    return {
            euro:200
    }
    }   
}
&lt;/script&gt;</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/CVREV3mVem3kYSupNFdr8RAH4e1OFYXy4pRdNlX0.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);

        //132
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Formularios en Vue',
            'slug' => 'formularios-en-vue',
            'body_main' => 'Formularios y validación en Vue.js',
            'body_plus' => '<p><strong>Formularios</strong></p>

<p>El proceso de env&iacute;o de formularios en Vue es realmente eficiente, gracias a la reactividad mediante la directiva&nbsp;<strong>v-model</strong>, que permite obtener los datos introducidos de forma instant&aacute;nea.</p>

<p>El c&oacute;digo de abajo muestra un campo asociado a la propiedad nombre que permite mostrar en el navegador el funcionamiento de captura y renderizado de los datos.</p>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;div class="content-form"&gt;
    &lt;div class="form-group"&gt;
        &lt;label for="nombre"&gt;Nombre&lt;/label&gt;
        &lt;input  type="text" name="nombre" v-model="nombre" /&gt;
    &lt;/div&gt;
    &lt;p&gt;&lt;strong&gt;{{nombre}}&lt;/strong&gt;&lt;/p&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
    name: \'MiComponente\',
    data(){
    return {        
        nombre:"",
    }
    }
}
&lt;/script&gt;
</code></pre>

<p>A continuaci&oacute;n se muestra un formulario b&aacute;sico completo donde los campos a completar est&aacute;n asociados a las propiedades de un objeto (user) y debajo del formulario las etiquetas h2 que reflejan el efecto de reactividad representadas por los datos introducidos.</p>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;div class="content-form"&gt;        
        &lt;form class="form" @submit.prevent="sendForm()"&gt;
        &lt;div class="form-group"&gt;
            &lt;label for="nombre"&gt;Nombre&lt;/label&gt;
        &lt;input  type="text" name="nombre" v-model="user.nombre"&gt;
        &lt;/div&gt;    
        &lt;div class="form-group" &gt;
        &lt;label for="apellidos"&gt;Apellidos&lt;/label&gt;
        &lt;input  type="text" name="apellidos" v-model="user.apellidos"&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
        &lt;label for="edad"&gt;Edad&lt;/label&gt;
        &lt;input type="number" name="edad" v-model="user.edad" /&gt;
        &lt;/div&gt;
        &lt;div class="form-group radio"&gt;
        &lt;label for="genero"&gt;Género&lt;/label&gt;                      
        &lt;input type="radio" name="genero" value="hombre" checked v-model="user.genero"/&gt;Hombre 
        &lt;input type="radio" name="genero" value="mujer" v-model="user.genero"/&gt;Mujer              
        &lt;/div&gt;
        &lt;input type="submit" value="Enviar" /&gt;
    &lt;/form&gt;
    &lt;h2&gt;{{user.nombre}}&lt;/h2&gt;
    &lt;h2&gt;{{user.apellidos}}&lt;/h2&gt;
    &lt;h2&gt;{{user.edad}}&lt;/h2&gt;
    &lt;h2&gt;{{user.genero}}&lt;/h2&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
export default {
    name: \'MiComponente\',   
    data(){
        return {
        user:{
        nombre:"",
        apellidos:"",
        edad:"",
        genero:""
        }
    }
    },
    methods:{
        sendForm(){
        console.log(this.user);
    }
    }
}
&lt;/script&gt;
&lt;style&gt;
.form label{
    display:block;  
    margin:0 auto;  
    font-weight:bold;font-size:18px;
}
.form input{
    width:300px;
    font-size:18px;
    margin-top:10px;margin-bottom: 10px
}
.form input[type=radio]{
    width:20px; 
}
.form input[type=submit]{
    width:100px;
    padding:5px;
    background-color:grey;
    color:white;
    font-weight:bold;
}
&lt;/style&gt;
</code></pre>

<p><strong>Validaci&oacute;n de formularios en Vue</strong></p>

<p>Vue no incorpora ning&uacute;n sistema de validaci&oacute;n propio, pero existen distintos paquetes similares a los que incluyen otros frameworks y f&aacute;ciles de instalar como pueden ser veevalidate, vuelidate o vuetify.</p>

<p><strong>Validaci&oacute;n con Vuelidate</strong></p>

<p>Instalar Vuelidate</p>

<pre>
<code class="language-bash">npm install --save vuelidate
</code></pre>

<p>Vuelidate dispone de algunas caracter&iacute;sticas interesantes:</p>

<ul>
    <li>Ofrece la posibilidad de importar a nivel global o importar solamente a un componente espec&iacute;fico.</li>
    <li>Permite importar solo las librer&iacute;as necesarias para el tipo de validaci&oacute;n que se requiere.</li>
    <li>Dispone de multitud de validaciones como pueden ser requerir el campo, validaci&oacute;n de n&uacute;meros, validaci&oacute;n de enteros, establecer un m&iacute;nimo y un m&aacute;ximo de caracteres, validaci&oacute;n de campo email, etc...</li>
</ul>

<p>Para consultar todos lo tipos de validaciones se puede acceder a su p&aacute;gina oficial&nbsp;<a href="https://vuelidate.js.org/" target="_blank">Vuelidate</a>.</p>

<p>Para disponer de Vuelidate en un proyecto Vue se importan en uno de los componentes o en el archivo&nbsp;<strong>main.js,</strong>&nbsp;ubicado en la ra&iacute;z del proyecto.</p>

<pre>
<code class="language-javascript">import Vue from \'vue\';
import Vuelidate from \'vuelidate\';
Vue.use(Vuelidate);</code></pre>

<p>Desde el componente a validar se importan las librer&iacute;as espec&iacute;ficas de las diferentes validaciones.</p>

<pre>
<code class="language-javascript">import {validacion1,validacion2, validacion3,...} from \'vuelidate/lib/validators\';
</code></pre>

<p>Una vez disponibles las librer&iacute;as se indican los campos y las validaciones mediante el objeto validations.</p>

<pre>
<code class="language-javascript">validations:{
    campo1:{
        validacion1,
        validacion2
    },
    campo2:{
    validacion1,
    validacion3
    }
}</code></pre>

<p>A continuaci&oacute;n se muestra un ejemplo de validaci&oacute;n b&aacute;sico&nbsp;&nbsp;con Vuelidate, construido&nbsp;con un solo campo (campo nombre) y dos de las validaciones m&aacute;s comunes que son el campo requerido y el m&iacute;nimo de caracteres.&nbsp;</p>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;form @submit="enviar($event)"&gt;
      &lt;div class="form-group"&gt;
        &lt;label for="nombre"&gt;Nombre&lt;/label&gt;
        &lt;input  type="text" name="nombre" v-model="nombre"&gt;
        &lt;div v-if="!$v.nombre.required"&gt;
          &lt;span&gt;Este campo es requerido&lt;/span&gt;
        &lt;/div&gt;
        &lt;div v-if="!$v.nombre.minLength"&gt;
          &lt;span&gt;Este campo debe contener al menos 3 caracteres&lt;/span&gt;
        &lt;/div&gt;      
      &lt;/div&gt;
      &lt;input type="submit" value="Enviar" /&gt;
    &lt;/form&gt;
&lt;/template&gt;
&lt;script&gt;
import { required, minLength } from \'vuelidate/lib/validators\';
export default {
    name: \'MiComponente\',
    validations: {
        nombre: {
            required,
            minLength: minLength(3)
        }
    },
    data(){
        nombre: ""
    },
    methods: {
        enviar(e){
            e.preventDefault();
            alert(this.nombre);
        }
    }
}
&lt;/script&gt;</code></pre>

<p>El siguiente c&oacute;digo es otro ejemplo de formulario algo m&aacute;s extenso pero manteniendo la misma l&oacute;gica. Si se compara el ejemplo anterior con el siguiente detalladamente se observan algunos cambios o mejoras en &eacute;ste &uacute;ltimo que conviene destacar:</p>

<ul>
    <li>La detenci&oacute;n del evento se realiza mediante la extensi&oacute;n&nbsp;<strong>@submit.prevent</strong>&nbsp;evitando tener que pasar el par&aacute;metro $event y captur&aacute;ndolo en el m&eacute;todo.</li>
    <li>Las propiedades engloban un&nbsp;<strong>objeto</strong>, de la misma forma que se manejan los modelos de datos.</li>
    <li>La variable&nbsp;<strong>sendedForm</strong>&nbsp;realiza una funci&oacute;n de interruptor que permite comprobar que se ha enviado el formulario.</li>
    <li>Existe una condici&oacute;n en el m&eacute;todo sendForm() que detiene el env&iacute;o si no pasa alguna de las validaciones&nbsp;<strong>(this.$v.$invalid)</strong>.</li>
</ul>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;div class="content-form"&gt;        
      &lt;form class="form" @submit.prevent="sendForm()"&gt;
        &lt;div class="form-group"&gt;
      &lt;label for="nombre"&gt;Nombre&lt;/label&gt;
      &lt;input  type="text" name="nombre" v-model="user.nombre"&gt;
      &lt;div v-if="sendedForm &amp;&amp; !$v.user.nombre.required"&gt;
        &lt;span&gt;Este campo es requerido&lt;/span&gt;
      &lt;/div&gt;
      &lt;div v-if="sendedForm &amp;&amp; !$v.user.nombre.minLength"&gt;
        &lt;span&gt;Este campo debe contener al menos 2 caracteres&lt;/span&gt;
      &lt;/div&gt;
        &lt;/div&gt;        
        &lt;div class="form-group"&gt;
          &lt;label for="apellidos"&gt;Apellidos&lt;/label&gt;
          &lt;input  type="text" name="apellidos" v-model="user.apellidos"&gt;              
          &lt;div v-if="sendedForm &amp;&amp; !$v.user.apellidos.required"&gt;
        &lt;span&gt;Este campo es requerido&lt;/span&gt;
          &lt;/div&gt;
          &lt;div v-if="sendedForm &amp;&amp; !$v.user.apellidos.minLength"&gt;
        &lt;span&gt;Este campo debe contener al menos 2 caracteres&lt;/span&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="form-group"&gt;
          &lt;label for="edad"&gt;Edad&lt;/label&gt;
          &lt;input type="number" name="edad" v-model="user.edad" /&gt;
          &lt;div v-if="sendedForm &amp;&amp; !$v.user.edad.required"&gt;
        &lt;span&gt;Este campo es requerido&lt;/span&gt;
          &lt;/div&gt;              
        &lt;/div&gt;
        &lt;div class="form-group radio"&gt;
          &lt;label for="genero"&gt;Género&lt;/label&gt;                        
          &lt;input type="radio" name="genero" value="hombre" checked v-model="user.genero"/&gt;Hombre 
          &lt;input type="radio" name="genero" value="mujer" v-model="user.genero"/&gt;Mujer
          &lt;div v-if="sendedForm &amp;&amp; !$v.user.genero.required"&gt;
        &lt;span&gt;Debe seleccionar un género&lt;/span&gt;
          &lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="clearfix"&gt;&lt;/div&gt;
         &lt;input type="submit" value="Enviar" /&gt;
      &lt;/form&gt;
    &lt;/div&gt;
&lt;/template&gt;
&lt;script&gt;
import {required,minLength} from \'vuelidate/lib/validators\';
export default{
  name: \'MiComponente\',
  validations:{
    user:{
      nombre:{
    required,
    minLength: minLength(2)
      },
      apellidos:{
    required,
    minLength: minLength(2)
      },
      edad:{
    required,
    minLength:minLength(1)
      },
      genero:{
    required
      }
    }
  },
  data(){
    return {
      sendedForm:false,
      user:{
    nombre:"",
    apellidos:"",
    edad:"",
    genero:""
      }
    }
  },
  methods:{
    sendForm(){
      this.sendedForm=true;
      this.$v.$touch();
    if(this.$v.$invalid){
      return false;
    }
    console.log(this.user);
    }
  }
}
&lt;/script&gt;
&lt;style&gt;
.form label{
  display:block;    
  margin:0 auto;    
  font-weight:bold;
  font-size:18px;
}
.form input{
  width:300px;
  font-size:18px;
  margin-top:10px;margin-bottom: 10px
}
.form input[type=radio]{
  width:20px;   
}
.form input[type=submit]{
  width:100px;
  padding:5px;
  background-color:grey;
  color:white;
  font-weight:bold;
}
.form span{color:red;}
&lt;/style&gt;   </code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/A8vTsvVx5Lx9Z5nGlMDlSrZZfB3F1bEjUVqAMUwC.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);

        //133
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Peticiones HTTP en Vue',
            'slug' => 'peticiones-http-en-vue',
            'body_main' => 'Peticiones HTTP con axios en Vue.js',
            'body_plus' => '<p>Vue no incorpora un servicio cliente-HTTP como si disponen otros frameworks como Angular, por tanto es necesario instalar alguna librer&iacute;a en el proyecto que permita realizar peticiones HTTP. Axios es un cliente HTTP muy popular y com&uacute;nmente utilizado por otros frameworks que ofrece un servicio HTTP manejando&nbsp;promesas de JavaScript.</p>

<p><strong>Instalar Axios</strong></p>

<pre>
<code class="language-bash">npm install --save axios
</code></pre>

<p>Para trabajar con Axios tan solo es necesario importar la librer&iacute;a desde el componente donde se desea trabajar y mediante los distintos verbos&nbsp;realizar las peticiones a la API.</p>

<pre>
<code class="language-bash">import axios from \'axios\';
</code></pre>

<p>A continuaci&oacute;n se muestra un ejemplo de un m&eacute;todo que utiliza la librer&iacute;a axios para procesar una petici&oacute;n de tipo GET con una promesa que obtiene la respuesta y la muestra por consola.</p>

<pre>
<code class="language-javascript">...
methods:{
    getUsers(){
        axios.get("http://bahiaxip.com/api/users").then( response =&gt; {
            console.log(res);
        }
    }
}
...</code></pre>

<p>Petici&oacute;n tipo POST</p>

<pre>
<code class="language-javascript">...
data(){
    user: new User("xip","bahiaxip@hotmail.com","2020","1234")
}
methods:{
    save(){
      axios.post("http://bahiaxip.com/api/save",this.user).then(response=&gt; {
        if(res.data.status === \'success\'){
          alert("El usuario se ha creado correctamente);
        }else{
          alert("Hubo un error y el usuario no ha sido creado"); 
        }
      }
    } 
}
...</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/jQG6BjEBbttX8KrqUDGJsGMxo5JDpLVFRKLmPO5q.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);

        //134
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar Composer en Debian 10',
            'slug' => 'instalar-composer-en-debian-10',
            'body_main' => 'Instalar Composer en Debian Buster',
            'body_plus' => '<p><strong>Instalaci&oacute;n de Composer</strong></p>

<p>Para la instalaci&oacute;n de Composer es necesario revisar si&nbsp;<strong>php-cli</strong>&nbsp;se encuentra instalado en el sistema</p>

<pre>
<code class="language-bash">apt-cache search php-cli
</code></pre>

<p><strong>Instalar php-cli</strong></p>

<pre>
<code>apt install php-cli
</code></pre>

<p><strong>La descarga se puede realizar mediante wget o mediante php</strong></p>

<p><strong>Descargar archivo instalador&nbsp; composer-setup.php con wget</strong></p>

<pre>
<code class="language-bash">wget -O composer-setup.php https://getcomposer.org/installer
</code></pre>

<p>Descargar archivo instalador&nbsp; composer-setup.php con php</p>

<pre>
<code class="language-bash">php -r "copy(\'https://getcomposer.org/installer\', \'composer-setup.php\');"
</code></pre>

<p><strong>Instalar Composer en /usr/local/bin</strong></p>

<pre>
<code class="language-bash">sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
</code></pre>

<p><strong>Instalar Composer en otro directorio o con otro nombre</strong></p>

<pre>
<code class="language-bash">sudo php composer-setup.php --install-dir=[directorio] --filename=[nombre_de_archivo]
</code></pre>

<p><strong>Eliminar archivo instalador</strong></p>

<pre>
<code class="language-bash">sudo rm composer-setup.php
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/3Be6SPmh8ywfWLvGgRuHUtC7ll9ORpsXuIcOEUEU.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //135
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Crear marca de agua con Biedit',
            'slug' => 'crear-marca-de-agua-con-biedit',
            'body_main' => 'Crear una marca de agua con Biedit',
            'body_plus' => '<p>Pasos para crear una marca de agua en una imagen con Biedit</p>

<p><strong>Acceder a&nbsp;<a href="http://biedit.bahiaxip.com/" target="_blank">Biedit</a>&nbsp;</strong></p>

<p>Es necesario iniciar sesi&oacute;n para tener acceso a la subida de im&aacute;genes, si es la primera vez ser&aacute; necesario registrarse desliz&aacute;ndose por el mismo panel de sesi&oacute;n&nbsp;<img src="https://bahiaxip.com/image/post/iFrceqgLRlperson.png" /></p>

<p><strong>Subir imagen</strong></p>

<p>Acceder a la subida de im&aacute;genes&nbsp;<img src="https://bahiaxip.com/image/post/1Xr6J7DEvpadd_photo_1x.png" />&nbsp;y seleccionar nuestra imagen</p>

<p><strong>Crear marca de agua</strong></p>

<p>Acceder al panel de efectos&nbsp;<img src="https://bahiaxip.com/image/post/ni0rCtfNrzphoto_filter.png" />&nbsp;y a continuaci&oacute;n al men&uacute;&nbsp;<strong>Crear marca de agua</strong>&nbsp;<img src="https://bahiaxip.com/image/post/qeXhWFK6umannotation-plus.png" />&nbsp;</p>

<p>Introducir el texto y configurar las opciones de tama&ntilde;o de letra, tipo de letra y color de letra.</p>

<p>Pulsar en&nbsp;<strong>Crear</strong>&nbsp;&nbsp;<img src="https://bahiaxip.com/image/post/dvNdTzXj22check.png" />&nbsp;y en la ventana que se muestra a continuaci&oacute;n con el mensaje&nbsp;﻿&quot;<strong>Cargar la nueva imagen&quot;</strong>&nbsp;pulsar en&nbsp;<strong>Cancelar (</strong>para mantener la imagen subida en el panel principal).</p>

<p><strong>﻿Establecer marca de agua&nbsp;</strong></p>

<p>Acceder al men&uacute;&nbsp;<strong>Marca de agua&nbsp;</strong>﻿<img src="https://bahiaxip.com/image/post/pOdpaPqvvewatermark2.png" />&nbsp;</p>

<p>Seleccionar desde el primer desplegable la posici&oacute;n y desde el segundo la marca de agua creada en el paso anterior, identificada con el nombre de watermark.</p>

<p>Pulsar en Crear&nbsp;<img src="https://bahiaxip.com/image/post/1VTLJlsFVAcheck.png" /></p>

<p>&nbsp;</p>

<p><strong>Recomendaciones</strong></p>

<ul>
    <li>﻿Es recomendable aumentar el tama&ntilde;o de letra al establecido por defecto si las dimensiones de la imagen superan los 500 p&iacute;xeles y seleccionar un color claro si en la imagen predominan los tonos oscuros para que sea lo suficientemente visible.</li>
    <li>La marca de agua se visualiza en el desplegable en formato mini y con un fondo circular que en ocasiones puede ocultar el texto, sin embargo, no altera el resultado final.</li>
    <li>Para descargar la imagen en nuestro dispositivo&nbsp; se puede hacer accediendo al &aacute;lbum&nbsp;<img src="https://bahiaxip.com/image/post/M3dxhSx7wMcollections.png" />&nbsp;y descargamos nuestra imagen mediante el bot&oacute;n de descarga&nbsp;<img src="https://bahiaxip.com/image/post/vpP7H3uH0Xsave.png" /></li>
</ul>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/3Be6SPmh8ywfWLvGgRuHUtC7ll9ORpsXuIcOEUEU.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 32
        ]);

        //136
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Helpers en Laravel',
            'slug' => 'helpers-en-laravel',
            'body_main' => 'Crear un helper en Laravel',
            'body_plus' => '<p>Los&nbsp; helpers en Laravel son simplemente funciones&nbsp; en PHP. con la caracter&iacute;stica de que son globales, que quiere decir globales? pues que de la misma forma que las variables se las llama globales porque est&aacute;n a disposici&oacute;n desde cualquier parte de nuestro proyecto, los helpers pueden ser llamados desde cualquier parte. Con la ventaja de que pueden ser llamados desde el controlador pero tambi&eacute;n desde la vista. Suelen ser muy &uacute;tiles cuando se requiere llamar varias veces a un mismo m&eacute;todo, con ellos nos ahorramos de tener que repetir ese mismo m&eacute;todo varias veces.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/tjFMrkl06RI2mqQVjDVYRDgzKhTPKhEqcJVzf46k.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 1
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 4
        ]);

        //137
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Custom Banner',
            'slug' => 'custom-banner',
            'body_main' => 'Banner rotatorio personalizado en VueJS',
            'body_plus' => '<p>Custom Banner Vue es un banner rotatorio de elementos, creado en lenguaje JavaScript, con distintas opciones de personalizaci&oacute;n y dise&ntilde;ado para el framework VueJS. Custom Banner es f&aacute;cil y r&aacute;pido de instalar mediante el gestor de paquetes npm y se compone de 3 elementos (im&aacute;genes o cadenas de texto). Este plugin ofrece una opci&oacute;n sencilla de implementar y adaptar en cualquier proyecto creado con VueJS con distintas opciones de configuraci&oacute;n detalladas a continuaci&oacute;n.&nbsp;</p>

<p>Instalaci&oacute;n</p>

<pre>
<code class="language-bash">npm install custom-banner-vue
</code></pre>

<p>Importar globalmente (main.js o similar)</p>

<pre>
<code class="language-javascript">import CustomBannerVue from \'custom-banner-vue\';
Vue.use(CustomBannerVue);</code></pre>

<p>&nbsp;Importar localmente (componente)</p>

<pre>
<code class="language-javascript">import { CustomBannerVue } from \'custom-banner-vue\';
...
export default {
...
    components: {
        CustomBannerVue,
    }
}</code></pre>

<p>A&ntilde;adir componente en el template</p>

<pre>
<code class="language-html">&lt;template&gt;
    &lt;div&gt;
        &lt;custom-banner-vue :options="options"&gt;&lt;/custom-banner-vue&gt;
    &lt;/div&gt;
&lt;/template&gt;</code></pre>

<p>Opciones de Configuraci&oacute;n</p>

<ul>
    <li>Orientaci&oacute;n</li>
</ul>

<p>2 opciones de orientaci&oacute;n: horizontal y vertical. Horizontal es la opci&oacute;n establecida por defecto.</p>

<ul>
    <li>Dimensiones</li>
</ul>

<p>2 opciones: min o medium. Medium es la opci&oacute;n establecida por defecto.&nbsp;</p>

<ul>
    <li>Orden de animaciones</li>
</ul>

<p>Permite establecer la cantidad de animaciones y la combinaci&oacute;n de elementos que realizan la rotaci&oacute;n.</p>

<ul>
    <li>Transiciones</li>
</ul>

<p>6 posibles transiciones:</p>

<p>width, height, top, left, rotate y opacity. La transici&oacute;n de opacidad es posible establecerla simult&aacute;neamente con cualquiera de las otras.</p>

<ul>
    <li>Tiempo</li>
</ul>

<p>Tiempo establecido entre cada transici&oacute;n.</p>

<ul>
    <li>Im&aacute;genes y textos</li>
</ul>

<p>3 opciones de enlace de im&aacute;genes:</p>

<p>externa: ruta absoluta assets public</p>

<p>&nbsp;</p>

<p><strong>Ejemplo b&aacute;sico con im&aacute;genes</strong></p>

<pre>
<code class="language-javascript">...
data() {
  return {
    options:{
      orientation:"horizontal",
      images:[
      //folder public
        [
          "img/image1.jpg",
          "img/image2.jpg",
          "img/image3.jpg"
        ],
      //folder assets  
        [
          require("@/assets/img/image1.jpg"),
          require("@/assets/img/image2.jpg"),
          require("@/assets/img/image3.png")
        ],
      //absolute path
        [
          "http://www.server/image1.jpg",
          "http://www.server/image2.jpg",
          "http://www.server/image3.jpg"
        ]
      ],
    }   
  }
},
....</code></pre>

<p><strong>Ejemplo b&aacute;sico con textos&nbsp;</strong></p>

<pre>
<code class="language-javascript">...
options:{
  orientation:"vertical",
  texts:[
    [
      "Regístrese ahora y obtendrá",
      "un cupón de descuento de 5€",
      "en su próxima compra"
    ],
    [
      "Si desea más información",
      "póngase en contacto con uno",
      "de nuestro asesores llamando al 606060606"
    ],
    [
      "Welcome to mydomain.com",
      "browse the different sections"
    ]
  ],
  effects:{
    1:{
      modeText:true 
    },
    2:{
      modeText:true
    },
    3:{
      modeText:true
    }
  }
}
...</code></pre>

<p>Nota: Para activar los textos es necesario establecer el valor de la opci&oacute;n modeText a true&nbsp; en cada elemento.</p>

<p>&nbsp;</p>

<p><strong>Ejemplo de configuraci&oacute;n de orden y transiciones</strong></p>

<pre>
<code class="language-javascript">...
options:{
  orientation:"vertical",
  size:"min",
    images:[
      [
        "img/image1.jpg",
        "img/image2.jpg",
        "img/image3.jpg"
      ],
      [
        "img/image1.png",
        "img/image2.png",
        "img/image3.png"
      ],
      [
        "http://www.server/image1.jpg",
        "http://www.server/image2.jpg",
        "http://www.server/image3.jpg"
      ]
  ],
  effects:{
    1:{
      opacity:true,
      width:true,
    },
    2:{
      top:true
    },
    3:{
      rotate:true
    }
  },
  order:{
    0:[1,3],
    1:[2],
    2:[3],
    3:[1,2,3]
    ...
    ...
  }
},
...</code></pre>

<p><strong>Ejemplo de im&aacute;genes y textos</strong></p>

<pre>
<code class="language-javascript">...
options:{
  orientation:"vertical",
  size:"min",
  images:[
    [    
      "img/image1.jpg",
      "img/image2.jpg",
      "img/image3.jpg"
    ],
    [
      "img/image1.png",
      "img/image2.png",
      "img/image3.png"
    ],
    [
      "http://www.server/image1.jpg",
      "http://www.server/image2.jpg",
      "http://www.server/image3.jpg"
    ]
  ],
  texts:[
    [
      "Welcome to mydomain.com",
      "browse the different sections"     
    ],
    [],
    []    
  ],
  effects:{
    1:{
      opacity:true,
      width:true,
      modeText:true
    },
    2:{
      left:true     
    },
    3:{
      opacity:true
    }
  },        
},
...</code></pre>

<p>Otras opciones de configuraci&oacute;n</p>

<p>widthHTML: La opci&oacute;n widthHTML permite establecer un ancho fijo de las im&aacute;genes de cada elemento</p>

<pre>
<code class="language-javascript">...
effects:{
  1:{
    opacity:true,
    width:true,
    widthHTML:120,
  },
  2:{
    left:true
    modeText:true,
  },
  3:{
    opacity:true
  }
},     
...</code></pre>

<p>fontSizeStyle: La opci&oacute;n fontSizeStyle permite asignar un tama&ntilde;o&nbsp; de texto fijo de los textos de cada elemento.</p>

<pre>
<code class="language-javascript">...
effects:{
  1:{
    opacity:true,
    width:true,
  },
  2:{
    left:true
    modeText:true,
    fontSizeStyle:"20px",
  },
  3:{
    opacity:true
  }
}
...
</code></pre>

<p>Este plugin permite establecer m&uacute;ltiples banners en un mismo componente, tan solo ser&aacute; necesario cambiar el nombre del objeto.</p>

<pre>
<code class="language-html">&lt;custom-banner-vue :options="options"&gt;&lt;/custom-banner-vue&gt;
....
&lt;custom-banner-vue :options="options2"&gt;&lt;/custom-banner-vue&gt;
...
&lt;custom-banner-vue :options="options3"&gt;&lt;/custom-banner-vue&gt;</code></pre>

<p><strong>CSS</strong></p>

<p>Es&nbsp; posible modificar los estilos mediante las clases&nbsp;<strong>bh_banner</strong>,&nbsp;<strong>div_banner</strong>,&nbsp;&nbsp;<strong>img_banner</strong>&nbsp;apoy&aacute;ndose en la declaraci&oacute;n&nbsp;<strong>!important</strong>.</p>

<p>Nota: Este plugin se encuentra todav&iacute;a en fase beta, si encuentra alg&uacute;n error o mejora puede comunicarse con el autor mediante la secci&oacute;n de contacto, en la parte superior de este blog.&nbsp;</p>

<p>Puede acceder desde&nbsp;<a href="https://www.npmjs.com/package/custom-banner-vue" target="_blank">aqu&iacute;</a>&nbsp;a la publicaci&oacute;n en&nbsp; npmjs.com.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/EEILGHM8o9EYJvkM0HIGVFpG36Js6uvUyU51cNsI.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 2
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 8
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 26
        ]);

        //138
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Nano Editor',
            'slug' => 'nano-editor',
            'body_main' => 'Comandos básicos de nano',
            'body_plus' => '<p>Nano es un editor ligero para uso de terminal en distribuciones Linux y que viene preinstalado en la mayor&iacute;a de ellas. Fue creado en 1999 con el nombre de Tip y renombrado a Nano en el a&ntilde;o 2000, declarado oficialmente GNU por Richard Stallman en Febrero de 2001. Este editor dispone de una configuraci&oacute;n muy b&aacute;sica en comparaci&oacute;n con otros editores, sin embargo destaca por su buen rendimiento en la mayor&iacute;a de situaciones y que no llega a 1 Megabyte.</p>

<p><strong>Instalar nano</strong></p>

<p>Debian</p>

<pre>
<code class="language-bash">sudo apt install nano
</code></pre>

<p>Fedora</p>

<pre>
<code class="language-bash">sudo dnf install nano
</code></pre>

<p><strong>Atajos de teclado</strong></p>

<p>Guardar archivo:&nbsp;<strong>Ctrl + o</strong></p>

<p>Salir:&nbsp;<strong>Ctrl + x</strong></p>

<p>Activar/Desactivar rat&oacute;n:<strong><strong>&nbsp;Esc + m</strong></strong></p>

<p>Ir al comienzo de la l&iacute;nea:&nbsp;<strong>Ctrl + a</strong></p>

<p>Ir al final de la l&iacute;nea:&nbsp;<strong>Ctrl + e</strong></p>

<p>Buscar cadena:&nbsp;<strong>Ctrl + w</strong></p>

<p>Men&uacute; de ayuda:&nbsp;<strong>Ctrl + g</strong></p>

<p>Ir a l&iacute;nea y columna:&nbsp;<strong>Esc +</strong><strong>&nbsp;g</strong></p>

<p>Ir a l&iacute;nea y columna:&nbsp;<strong>Ctrl + Mayus + -</strong></p>

<p>Ir al comienzo o p&aacute;gina anterior:&nbsp;<strong>Ctrl + y</strong></p>

<p>Ir al final o p&aacute;gina siguiente:&nbsp;<strong>Ctrl + v</strong></p>

<p>Salto de l&iacute;nea:&nbsp;<strong>Ctrl + m</strong></p>

<p>Justificaci&oacute;n:&nbsp;<strong>Ctrl+ j</strong></p>

<p>Copiar/Desactivar modo selecci&oacute;n:&nbsp;<strong>Alt + 6</strong></p>

<p>Cortar selecci&oacute;n:&nbsp;<strong>Ctrl + k</strong></p>

<p>Pegar selecci&oacute;n:&nbsp;<strong>Ctrl + u</strong></p>

<p>Activar modo selecci&oacute;n:&nbsp;<strong>Alt + a</strong></p>

<p>Activar modo selecci&oacute;n:&nbsp;<strong>Esc + a</strong></p>

<p>Ampliar/Reducir selecci&oacute;n (en modo selecci&oacute;n activado):&nbsp;<strong>teclas de direcci&oacute;n, inicio y fin</strong></p>

<p>Ampliar/Reducir selecci&oacute;n:&nbsp;<strong>teclas de direcci&oacute;n + Mayus</strong></p>

<p>Seleccionar l&iacute;nea:&nbsp;<strong>Esc + 6</strong></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Configuraci&oacute;n</p>

<p>La configuraci&oacute;n de nano se establece en el archivo .nanorc ubicado en el directorio de usuario.</p>

<p>Opciones de configuraci&oacute;n</p>

<p>linenumbers: Muestra una columna num&eacute;rica de las l&iacute;neas</p>

<p>titlecolor: Modificar el color de la barra de t&iacute;tulo</p>

<p>mouse: Activar/Desactivar interacci&oacute;n del rat&oacute;n</p>

<p>statuscolor: Establecer color de letra y fondo de informaci&oacute;n de l&iacute;neas</p>

<p>functioncolor: Establecer color de letra y fondo de los distintos comandos visibles de la parte inferior</p>

<p>keycolor: Establecer color de letra y fondo de los atajos de teclado visibles en la parte inferior</p>

<pre>
<code class="language-bash">set mouse
set titlecolor lightyellow, lightblack
</code></pre>

<p>Algunos de los colores disponibles:</p>

<p>blue,lightblue,green,lightgreen,red,lightred,cyan,lightcyan,magenta,lightmagenta,yellow,lightyellow black,lightblack,white,lightwhite, grey, gray, purple, lightpurple, pink,orange</p>

<p>Se puede configurar un archivo de manera puntual al abrir el archivo</p>

<pre>
<code class="language-bash">nano archivo.php --linenumbers
</code></pre>

<p>Nota: Para modificar el color de letra y fondo se puede acceder a las preferencias del terminal</p>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/bbVOqRC69nUfc9SLVCW86tSjerpB9hJCuVYiSXgz.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //139
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Head y Tail',
            'slug' => 'head-y-tail',
            'body_main' => 'Comandos head y tail',
            'body_plus' => '<p>Head y Tail son comandos que permiten mostrar el contenido de un archivo. La diferencia entre ambos se basa en head muestra por defecto las primeras 10 l&iacute;neas mientras que tail muestra por defecto las &uacute;ltimas 10 l&iacute;neas.</p>

<p>HEAD</p>

<p>Mostrar las primeras 10 l&iacute;neas (por defecto)</p>

<pre>
<code class="language-bash">head archivo.html
</code></pre>

<p>Mostrar un n&uacute;mero determinado de l&iacute;neas</p>

<pre>
<code class="language-bash">head -n100 archivo.html
</code></pre>

<p>Mostrar a la inversa</p>

<pre>
<code class="language-bash">head archivo.html | sort
</code></pre>

<p>Mostrar un n&uacute;mero determinado de caracteres</p>

<pre>
<code class="language-bash">head archivo.html -c 10
</code></pre>

<p>Mantener en espera actualizando en tiempo de ejecuci&oacute;n</p>

<pre>
<code class="language-bash">head archivo.html -f
</code></pre>

<p>TAIL</p>

<p>Mostrar las &uacute;ltimas 10 l&iacute;neas (por defecto)</p>

<pre>
<code class="language-bash">tail archivo.html
</code></pre>

<p>Mostrar un n&uacute;mero determinado de las &uacute;ltimas l&iacute;neas</p>

<pre>
<code class="language-bash">tail archivo.html -n 100
</code></pre>

<p>Mostrar a la inversa</p>

<pre>
<code class="language-bash">tail archivo.html | sort
</code></pre>

<p>Mostrar &uacute;ltimos caracteres</p>

<pre>
<code class="language-javascript">tail archivo.html -c 10
</code></pre>

<p>Mostrar &uacute;ltimos caracteres indicando el caracter de inicio</p>

<pre>
<code class="language-bash">tail archivo.html -c +20
</code></pre>

<p>Mantener en espera actualizando en tiempo de ejecuci&oacute;n</p>

<pre>
<code class="language-bash">tail archivo.html -f
</code></pre>

<p>Mostrar manual de head y tail</p>

<pre>
<code class="language-bash">man head
man tail
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/Y3olQwT2qw1X2W5fPm7q9DgbJ6ep82rkvWMQLLfd.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //140
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar WoeUSB',
            'slug' => 'instalar-woeusb',
            'body_main' => 'Instalar WoeUSB en Linux',
            'body_plus' => '<p>WoeUSB&nbsp;es un&nbsp;programa dirigido a distribuciones&nbsp;Linux&nbsp;que permite convertir un dispositivo usb&nbsp; en un dispositivo instalador del sistema operativo Windows. Es una herramienta estable y sencilla,&nbsp; compatible con Windows Vista, Windows 7, Windows 8 y Windows 10 en cualquiera de sus versiones. WoeUSB&nbsp;ofrece&nbsp;la l&iacute;nea de comandos para realizar el proceso y&nbsp;en algunas de sus versiones una sencilla interfaz gr&aacute;fica.</p>

<p>La instalaci&oacute;n de WoeUSB se puede realizar desde distintos gestores, a continuaci&oacute;n se indican los pasos para instalarlo desde el gestor de paquetes com&uacute;n de tu distribuci&oacute;n, el gestor snap o el gestor de m&oacute;dulos pip.</p>

<p>Instalar WoeUSB</p>

<p>Debian</p>

<pre>
<code class="language-bash">sudo apt install woeusb
</code></pre>

<p>Fedora</p>

<pre>
<code class="language-bash">sudo dnf install WoeUSB
</code></pre>

<p>Instalaci&oacute;n en versiones anteriores con webupd8</p>

<p>Para distribuciones anteriores de Debian o Ubuntu que no disponen de woeusb incluido en sus repositorios existe la posibilidad de agregar&nbsp;el paquete&nbsp;<strong>webupd8</strong>&nbsp;de Alin&nbsp;Andrei, se puede acceder al enlace de&nbsp;<a href="https://launchpad.net/~nilarimogard/+archive/ubuntu/webupd8" target="_blank">launchpad.net</a>&nbsp;para m&aacute;s informaci&oacute;n.</p>

<p>Agregar repositorio webupd8</p>

<pre>
<code class="language-bash">sudo add-apt-repository ppa:nilarimogard/webupd8
</code></pre>

<p>Actualizar repositorios</p>

<pre>
<code class="language-bash">sudo apt update
</code></pre>

<p>Instalar WoeUSB</p>

<pre>
<code class="language-bash">sudo apt-get install woeusb
</code></pre>

<p>Nota: Si no reconoce el comando add-apt-repository instalar los siguiente paquetes:</p>

<pre>
<code class="language-bash">sudo apt install software-properties-common python-software-properties
</code></pre>

<p>Desinstalar woeusb</p>

<p>Debian</p>

<pre>
<code class="language-bash">sudo apt remove woeusb
</code></pre>

<p>Fedora</p>

<pre>
<code class="language-bash">sudo dnf remove woeusb
</code></pre>

<p>Instalaci&oacute;n con snap</p>

<p>Comprobaci&oacute;n de snap instalado en el sistema</p>

<pre>
<code class="language-bash">snap --version
</code></pre>

<p>Si snap se encuentra instalado la terminal devuelve algo similar a la siguiente l&iacute;nea</p>

<pre>
<code class="language-bash">snap    2.54.2-1.fc35
snapd   2.54.2-1.fc35
series  16
fedora  35
kernel  5.16.8-200.fc35.x86_64
</code></pre>

<p>Si no se encuentra instalado se procede a la instalaci&oacute;n de snap</p>

<p>Instalar snap en Debian</p>

<pre>
<code class="language-bash">sudo apt install snapd
</code></pre>

<p>Instalar snap en Fedora</p>

<pre>
<code class="language-bash">sudo dnf install snapd
</code></pre>

<p>Instalar WoeUSB con snap&nbsp;</p>

<p>La instalaci&oacute;n con snap incluye la versi&oacute;n con interfaz gr&aacute;fica.</p>

<pre>
<code class="language-bash">sudo snap install woe-usb --edge
</code></pre>

<p>Desinstalar WoeUSB con snap</p>

<pre>
<code class="language-bash">sudo snap remove woe-usb
</code></pre>

<p>Instalaci&oacute;n con pip o pip3</p>

<p>La instalaci&oacute;n con pip o pip3 se basa en la distribuci&oacute;n WoeUSB-ng que es una r&eacute;plica de WoeUSB que incluye&nbsp;<strong>woeusbgui,&nbsp;</strong>su interfaz gr&aacute;fica.</p>

<p>Paquetes necesarios antes de instalar con pip3</p>

<p>Debian</p>

<pre>
<code class="language-bash">sudo apt install git p7zip-full python3-pip python3-wxgtk4.0 grub2-common grub-pc-bin</code></pre>

<p>Fedora</p>

<pre>
<code class="language-bash">sudo dnf install git p7zip p7zip-plugins python3-pip python3-wxpython4
</code></pre>

<p>Instalaci&oacute;n con pip o pip3</p>

<p>La instalaci&oacute;n con pip o pip3 se basa en la distribuci&oacute;n WoeUSB-ng que es una r&eacute;plica de WoeUSB que incluye&nbsp;<strong>woeusbgui,&nbsp;</strong>su interfaz gr&aacute;fica.</p>

<p>Paquetes necesarios antes de instalar con pip3</p>

<p>Debian</p>

<pre>
<code class="language-bash">sudo apt install git p7zip-full python3-pip python3-wxgtk4.0 grub2-common grub-pc-bin
</code></pre>

<p>Fedora</p>

<pre>
<code class="language-bash">sudo dnf install git p7zip p7zip-plugins python3-pip python3-wxpython4
</code></pre>

<p>Instalar desde dependencias WoeUSB</p>

<pre>
<code class="language-bash">sudo pip3 install WoeUSB-ng
</code></pre>

<p>Instalar desde c&oacute;digo fuente</p>

<pre>
<code class="language-bash">git clone https://github.com/WoeUSB/WoeUSB-ng.git
cd WoeUSB-ng
sudo pip3 install .
</code></pre>

<p>Desinstalar con pip3</p>

<pre>
<code class="language-bash">sudo pip3 uninstall WoeUSB-ng
sudo rm /usr/share/icons/WoeUSB-ng/icon.ico \
    /usr/share/applications/WoeUSB-ng.desktop \
    /usr/local/bin/woeusbgui
sudo rmdir /usr/share/icons/WoeUSB-ng/</code></pre>

<p>Posibles errores</p>

<p>[Errno 2]</p>

<pre>
<code class="language-bash">[Errno 2] No such file or directory: \'/usr/local/bin/woeusbgui\'
</code></pre>

<p>Este error es com&uacute;n al instalar con pip, indica que no encuentra el directorio especificado. Para solucionarlo se comprueba si existe la ruta y crean los directorios, en este caso el directorio bin no existe y es necesario crearlo.</p>

<p>Comprobar directorio</p>

<pre>
<code class="language-bash">cd /usr/local/bin
bash: cd: /usr/local/bin: No existe el fichero o el directorio</code></pre>

<p>Crear directorio bin</p>

<pre>
<code class="language-bash">cd /usr/local
sudo mkdir bin</code></pre>

<p>ERROR: Failed building wheel for wxpython&nbsp;</p>

<p>Al instalar con pip o pip3 es posible encontrarse con errores relacionados con la dependencia wxPython. Para solucionarlo se instalan los siguientes paquetes y se procede de nuevo a la instalaci&oacute;n de WoeUSB-ng</p>

<pre>
<code class="language-bash">sudo apt install dpkg-dev build-essential python3-dev freeglut3-dev libgl1-mesa-dev libglu1-mesa-dev libgstreamer-plugins-base1.0-dev libgtk-3-dev libjpeg-dev libnotify-dev libpng-dev libsdl2-dev libsm-dev libtiff-dev libwebkit2gtk-4.0-dev libxtst-dev
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/cnLIGCRBTHCDAyE3zyufiztD305cxILGGiwxNezM.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        //141
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Crear un USB arrancable Dual con Ventoy',
            'slug' => 'crear-un-usb-arrancable-dual-con-ventoy',
            'body_main' => 'Crear un USB booteable capaz de instalar Windows y Linux',
            'body_plus' => '<p>Ventoy es una herramienta de creaci&oacute;n de usb arrancable dual, es decir, permite arrancar e instalar Windows y Linux sin necesidad de tener que formatear ni volver a repetir el proceso. Una ventaja de Ventoy destacable respecto a otras herramientas es, que una vez instalado el sistema de arranque, es posible a&ntilde;adir una o varias distribuciones Linux o Windows directamente al usb con las acciones copiar y pegar como si se tratase de cualquier otro archivo.&nbsp;</p>

<p><strong>Descarga</strong></p>

<p>La descarga de Ventoy se puede realizar desde la secci&oacute;n de descargas de su p&aacute;gina oficial o mediante wget.</p>

<p>Descarga directa&nbsp;(p&aacute;gina oficial)</p>

<p><a href="https://www.ventoy.net/en/download.html" target="_blank">https://www.ventoy.net/en/download.html</a></p>

<p>Descarga con wget</p>

<pre>
<code class="language-bash">wget https://github.com/ventoy/Ventoy/releases/download/v1.0.70/ventoy-1.0.70-linux.tar.gz
</code></pre>

<p>Descomprimir paquete tar.gz</p>

<pre>
<code class="language-bash">sudo tar -xvzf ventoy-1.0.70-linux.tar.gz
</code></pre>

<p>Ventoy ofrece varias opciones para la instalaci&oacute;n: ejecutable, web y l&iacute;nea de comandos</p>

<p>Ventoy (Interfaz gr&aacute;fica)</p>

<p>Se accede al directorio y se inicia Ventoy</p>

<pre>
<code class="language-bash">cd ventoy-1.0.70
sudo ./VentoyGUI.x86_64</code></pre>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666882640.png" style="height:409px; width:479px" /></p>

<p>Ventoy Web</p>

<pre>
<code class="language-bash">sudo ./VentoyWeb.sh
</code></pre>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666882690.png" style="height:366px; width:653px" /></p>

<p>Ventoy Terminal</p>

<pre>
<code class="language-bash">sudo ./Ventoy2Disk.sh [ruta_dispositivo]
</code></pre>

<p>Para obtener la ruta del dispositivo visitar el siguiente&nbsp;<a href="https://bahiaxip.com/entrada/obtener-la-ruta-de-dispositivos-en-linux" target="_blank">enlace</a></p>

<p>Una vez realizada la instalaci&oacute;n tan solo es necesario copiar los archivos de imagen(iso) de la instalaci&oacute;n de Windows o Linux al usb.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/1ilbDBzBucSbkJy6uxX1uGxjWlV5sJXTEx8T986j.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 28
        ]);

        //142
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Crear un USB booteable de Windows con WoeUSB',
            'slug' => 'crear-un-usb-booteable-de-windows-con-woeusb',
            'body_main' => 'Crear un usb de instalación de Windows en Linux',
            'body_plus' => '<p>Crear USB instalador</p>

<p>Para el proceso con WoeUSB es necesario un dispositivo usb con&nbsp;suficiente&nbsp;espacio disponible&nbsp; y una instalaci&oacute;n de Windows en formato de imagen(ISO). A continuaci&oacute;n se muestra la proceso mediante interfaz gr&aacute;fica si viene incluida en la versi&oacute;n descargada y mediante la terminal de Linux.</p>

<p>Proceso con interfaz gr&aacute;fica</p>

<p>Para iniciar WoeUSB en modo gr&aacute;fico se selecciona desde el men&uacute; de aplicaciones o se puede iniar desde la l&iacute;nea de comandos.</p>

<pre>
<code class="language-bash">sudo woeusbgui
</code></pre>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666882880.png" style="height:595px; width:395px" /></p>

<p>El proceso mediante interfaz gr&aacute;fica consta de tan solo tres pasos una vez iniciado:</p>

<ul>
    <li>Seleccionar el archivo .iso desde el desplegable superior</li>
    <li>Seleccionar el dispositivo usb desde el desplegable inferior</li>
    <li>Opcionalmente se puede seleccionar el tipo de sistema de archivos de la unidad, en caso de im&aacute;genes mayores de 4GB</li>
</ul>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666882926.png" style="height:491px; width:400px" /></p>

<p>Proceso con l&iacute;nea de comandos</p>

<pre>
<code class="language-bash">sudo woeusb --device [ruta]/[image].iso /dev/sXX
</code></pre>

<p>Ejemplo en la unidad sdc</p>

<pre>
<code class="language-bash">sudo woeusb --device /home/miusuario/windows10.iso /dev/sdc
</code></pre>

<p>Para asegurarse de a&ntilde;adir la correcta ruta de la unidad usb se puede obtener siguiendo este&nbsp;<a href="https://bahiaxip.com/entrada/obtener-la-ruta-de-dispositivos-en-linux" target="_blank">enlace</a></p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<p>Linux</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/pwjHuY8UCXM98QSNXsvatmmrtYpAGhTzwERGCxqL.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 28
        ]);

        //143
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Obtener la ruta de dispositivos en Linux',
            'slug' => 'obtener-la-ruta-de-dispositivos-en-linux',
            'body_main' => 'Ruta de los dispositivos conectados en distribuciones Linux',
            'body_plus' => '<p>Linux almacena todos los dispositivos conectados en el directorio&nbsp;<strong>/dev</strong>, en la ra&iacute;z del sistema. Para mantener una estructura ordenada, por cada dispositivo y por cada partici&oacute;n crea archivos en este directorio. As&iacute; pues, si se encuentran conectados al ordenador un disco duro con dos particiones y una unidad usb con una partici&oacute;n el sistema crear&aacute; los siguientes archivos:</p>

<ul>
    <li>/dev/sda (disco duro)</li>
    <li>/dev/sda1 (partici&oacute;n 1 del disco duro)</li>
    <li>/dev/sda2 (partici&oacute;n 2 del discoduro)</li>
    <li>/dev/sdb (dispositivo usb)</li>
    <li>/dev/sdb1 (partici&oacute;n 1 del usb)</li>
</ul>

<p>Estas rutas permiten identificar los discos y sus particiones, para ello existen una amplia variedad de herramientas que permiten listar los dispositivos conectados y sus particiones&nbsp;permitiendo identificar la ruta de cada uno. A continuaci&oacute;n se indican algunas de ellas.</p>

<p>A trav&eacute;s de terminal&nbsp;(l&iacute;nea de comandos)</p>

<p>Fdisk</p>

<pre>
<code class="language-bash">sudo fdisk -l
</code></pre>

<p>Lsblk</p>

<pre>
<code class="language-bash">sudo lsblk -p
</code></pre>

<p>Parted</p>

<pre>
<code class="language-bash">sudo parted -l
</code></pre>

<p>Sfdisk</p>

<pre>
<code class="language-bash">sudo sfdisk -l
</code></pre>

<p>A trav&eacute;s de interfaz gr&aacute;fica</p>

<p><strong>Discos</strong></p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666883215.png" style="height:590px; width:895px" /></p>

<p>Instalar Discos</p>

<pre>
<code class="language-bash">sudo apt install disk-gnome-utility
</code></pre>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666883283.png" style="height:528px; width:764px" /></p>

<p>Instalar Gparted</p>

<pre>
<code class="language-bash">sudo apt install gparted
</code></pre>

<p>Partition Manager</p>

<p><br />
<img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666883320.png" style="height:599px; width:885px" /></p>

<p>Instalar Partition Manager</p>

<pre>
<code class="language-bash">sudo apt install kde-partitionmanager
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/8tCchlf8SuCbkAUgboXjtHf5Tl9hbPEPkgVUUbhm.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //144
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'NVM',
            'slug' => 'nvm',
            'body_main' => 'Node Version Manager (NVM)',
            'body_plus' => '<p>NVM es un gestor de versiones de NodeJS que permite manejar las distintas versiones de Node desde la l&iacute;nea de comandos con un conjunto de opciones amigable y sencillo. Con NVM se evitan ciertos conflictos cuando se trabaja en distintos proyectos y ahorrando tiempo en la b&uacute;squeda y selecci&oacute;n de una versi&oacute;n espec&iacute;fica. A continuaci&oacute;n se indica la instalaci&oacute;n y algunas de las opciones m&aacute;s &uacute;tiles.</p>

<p>Para la instalaci&oacute;n de NVM es recomendable no disponer de NodeJS instalado en el sistema.</p>

<p>Comprobar NVM</p>

<pre>
<code class="language-bash">command -v nvm
</code></pre>

<p>Comprobar NodeJS</p>

<pre>
<code class="language-bash">node -v
</code></pre>

<p>Desinstalaci&oacute;n de node</p>

<pre>
<code class="language-bash">sudo apt remove nodejs
sudo apt purge nodejs
npm uninstall nodejs</code></pre>

<p>&nbsp;Instalar NVM</p>

<pre>
<code class="language-bash">wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash
</code></pre>

<p>Nota: Necesario cerrar y volver a abrir el terminal</p>

<p>Listar versiones instaladas</p>

<pre>
<code class="language-bash">nvm list
</code></pre>

<p>Listar versiones disponibles para descargar</p>

<pre>
<code class="language-bash">nvm ls-remote
</code></pre>

<p>Listar versiones disponibles para descargar (lista progresiva)</p>

<pre>
<code class="language-bash">nvm ls-remote | less
</code></pre>

<p>Listar versiones disponibles para descargar (solo versiones estables)</p>

<pre>
<code class="language-bash">nvm ls-remote --lts
</code></pre>

<p>Instalar versi&oacute;n</p>

<pre>
<code class="language-bash">nvm install [version]
nvm install v15.0.1</code></pre>

<p>Nota: si ya se encuentra en una versi&oacute;n, al instalar otra autom&aacute;ticamente se pasa a la nueva instalada</p>

<p>Instalar versi&oacute;n estable por nombre</p>

<pre>
<code class="language-bash">nvm install lts/fermium
</code></pre>

<p>Pasarse de una versi&oacute;n a otra</p>

<pre>
<code class="language-bash">nvm use [version]
nvm use v15.0.1</code></pre>

<p>Desintalar versi&oacute;n</p>

<pre>
<code class="language-bash">nvm uninstall [version]
nvm uninstall v15.0.1</code></pre>

<p>Configuraci&oacute;n de versiones en proyectos</p>

<p>NVM permite establecer una versi&oacute;n determinada en un proyecto mediante la configuraci&oacute;n de un archivo en el directorio ra&iacute;z y autom&aacute;ticamente NVM seleccionar&aacute; la versi&oacute;n configurada en ese proyecto.</p>

<p>Para crear el archivo se puede editar con cualquier editor y a&ntilde;adir la versi&oacute;n espec&iacute;fica o mediante echo.</p>

<pre>
<code class="language-bash">echo "v12.13" &gt; .nvmrc
</code></pre>

<p>Ahora desde la ra&iacute;z NVM se pasa autom&aacute;ticamente a la versi&oacute;n</p>

<pre>
<code class="language-bash">nvm use
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/eqszWsusEAcTV6cbZKMLCBItoOK4nR9Ncm6XabEs.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //145
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar certificado digital en Linux',
            'slug' => 'instalar-certificado-digital-en-linux',
            'body_main' => 'Instalar el certificado digital de España en Linux',
            'body_plus' => '<p>El certificado digital es un documento digital que contiene los datos necesarios para identificar a una persona permitiendo realizar multitud de procesos administrativos desde un dispositivo mediante la ayuda de firma&nbsp; electr&oacute;nica. A continuaci&oacute;n se indica como obtener el certificado digital y su instalaci&oacute;n en Linux.&nbsp;</p>

<p><span style="background-color:#ffffff; color:#0000ff">Requisitos de software</span></p>

<ul>
    <li>Configurador fnmt</li>
</ul>

<p><a href="https://www.sede.fnmt.gob.es/descargas/descarga-software/instalacion-software-generacion-de-claves" target="_blank">Enlace de descarga</a>&nbsp;de configurador fnmt</p>

<ul>
    <li>Autofirma</li>
</ul>

<p><a href="https://firmaelectronica.gob.es/Home/Descargas.html" target="_blank">Enlace de descarga</a> de Autofirma</p>

<p><span style="background-color:#ffffff; color:#0000ff">Seleccionar el paquete correcto seg&uacute;n la distribuci&oacute;n</span></p>

<p>Descargar el paquete de instalaci&oacute;n correspondiente a nuestra distribuci&oacute;n. Si es basada en Debian es necesario el archivo en formato .deb, en cambio si es basada en RedHat es necesario el archivo .rpm.</p>

<p>Si no sabemos cual es la distribuci&oacute;n actual y no tenemos claro que paquete debemos instalar podemos revisar el siguiente <a href="https://bahiaxip.com/entrada/obtener-informacion-de-distribucion-linux" target="_blank">enlace</a>. Una vez descargados los archivos se procede a su instalaci&oacute;n.&nbsp;</p>

<p><span style="background-color:#ffffff; color:#0000ff">Instalar AutoFirma</span></p>

<ul>
    <li>Instalaci&oacute;n en distribuciones basadas en Debian</li>
</ul>

<pre>
<code class="language-bash">sudo dpkg -i AutoFirma_1_7_1.deb
</code></pre>

<p>Instalaci&oacute;n en distribuciones basadas en RedHat</p>

<pre>
<code class="language-bash">rpm -i autofirma-1.7.1-1.noarch_FEDORA.rpm</code></pre>

<p><span style="color:#0000ff">Instalar configurador fnmt</span></p>

<ul>
    <li>Instalaci&oacute;n en distribuciones basadas en Debian</li>
</ul>

<pre>
<code class="language-bash">sudo dpkg -i configuradorfnmt_1.0.1-0_amd64.deb</code></pre>

<p>Instalaci&oacute;n en distribuciones basadas en RedHat</p>

<ul>
</ul>

<pre>
<code class="language-bash">sudo rpm -U autofirma-1.7.1-1.noarch_FEDORA.rpm</code></pre>

<p><span style="background-color:#ffffff; color:#0000ff">Solicitud de certificado</span></p>

<p>Se ejecuta el software previamente instalado desde el men&uacute; de aplicaciones y se procede a realizar la solicitud desde la p&aacute;gina oficial de emisi&oacute;n de certificados de Espa&ntilde;a desde el siguiente <a href="https://www.sede.fnmt.gob.es/certificados/persona-fisica/obtener-certificado-software/solicitar-certificado" target="_blank">enlace</a>, se recomienda utilizar el navegador Firefox. Si la solicitud se procesa correctamente se recibe un mensaje al correo electr&oacute;nico introducido en el formulario de solicitud, este mensaje contiene un c&oacute;digo necesario para la acreditaci&oacute;n.</p>

<p><span style="background-color:#ffffff; color:#0000ff">Acreditar identidad</span></p>

<p>Para acreditar la identidad es necesario presentarse con el Documento Nacional de identidad (D.N.I) vigente y el c&oacute;digo recibido al correo electr&oacute;nico a una de las oficinas de acreditaci&oacute;n, para obtener la direcci&oacute;n de las oficinas m&aacute;s pr&oacute;ximas se puede visitar el localizador desde el&nbsp;siguiente&nbsp;<a href="http://mapaoficinascert.appspot.com/" target="_blank">enlace</a>.&nbsp;</p>

<p><span style="background-color:#ffffff; color:#0000ff">Instalaci&oacute;n del certificado</span></p>

<p>La instalaci&oacute;n del certificado se debe realizar desde el mismo ordenador y con el mismo usuario que se realiz&oacute; el proceso de solicitud. El proceso anterior de acreditaci&oacute;n env&iacute;a un nuevo mensaje al correo electr&oacute;nico, esta vez con el c&oacute;digo de descarga que es requerido en el formulario de descarga del certificado que se puede acceder desde el siguiente <a href="https://www.sede.fnmt.gob.es/certificados/persona-fisica/obtener-certificado-software/descargar-certificado" target="_blank">enlace</a>. Una vez acabado el proceso del formulario de descarga se instala el certificado estando disponible de forma autom&aacute;tica.</p>

<p>Para obtener informaci&oacute;n del proceso del certificado digital se puede visitar la <a href="https://www.sede.fnmt.gob.es/certificados/persona-fisica" target="_blank">p&aacute;gina oficial</a> (Sede Electr&oacute;nica)</p>

<p><span style="background-color:#ffffff; color:#0000ff">Soluci&oacute;n a posibles errores</span></p>

<p>Si al instalar alguno de los paquetes genera alg&uacute;n error requiriendo la instalaci&oacute;n de alguna dependencia se procede a instalar la dependencia sugerida.</p>

<p>En el caso de AutoFirma puede ser requerida la librer&iacute;a libnss3-tools o similar.</p>

<pre>
<code class="language-bash">sudo apt install libnss3-tools</code></pre>
<p>En caso de error enviando documentos a la plataforma de ja Junta de Andalucia desinstalar la version instalada y volver a instalar la version de Autofirma que ofrece la Junta desde el siguiente enlace:&nbsp;&nbsp;<a href="https://ws024.juntadeandalucia.es/clienteafirma/autofirma/autofirma.html">AutoFirma Junta de Andalucia</a></p>

<p>En el caso de Configurador fnmt puede ser requerida la librer&iacute;a libcanberra.</p>

<pre>
<code class="language-bash">sudo apt install libcanberra-gtk-module</code></pre>

<p>Conflicto con Firefox en versiones anteriores</p>

<p>Es com&uacute;n el conflicto con la ruta de firefox en versiones anteriores como Debian 10, ya que la instalaci&oacute;n de firefox puede encontrarse en el directorio firefox-esr en lugar del directorio firefox, se puede solucionar con las siguientes l&iacute;neas, tal como se indica en el blog esferas.org.</p>

<pre>
<code class="language-bash">sudo apt install gconf2
sudo ln -s /etc/firefox-esr /etc/firefox
sudo ln -s /usr/lib/firefox-esr /etc/firefox
sudo install -d -o root -g root /etc/firefox-esr/pref</code></pre>

<p>Fuente:&nbsp;<a href="https://esferas.org/msqlu/2020/10/13/el-configurador-de-la-fnmt-en-debian/" target="_blank">https://esferas.org/msqlu/2020/10/13/el-configurador-de-la-fnmt-en-debian/</a></p>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/KRacol7M8eXr19TQjBXmvPoz79W0AUwOqIYR4r4v.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //146
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Obtener información de distribución Linux',
            'slug' => 'obtener-informacion-de-distribucion-linux',
            'body_main' => 'Obtener información de una distribución en Linux desde la terminal',
            'body_plus' => '<p>En ocasiones puede ser necesario conocer cual es la distribuci&oacute;n de Linux en la que nos encontramos trabajando. Generalmente la mayor parte de distribuciones Linux se basan en dos distribuciones denominadas madres. &Eacute;stas son&nbsp;<strong>RedHat</strong>&nbsp;y&nbsp;<strong>Debian</strong>. La gran diferencia entre ellas y/o la m&aacute;s requerida a nivel de usuario es la gesti&oacute;n de paquetes, mientras Debian los gestiona mediante&nbsp;<strong>dpkg&nbsp;</strong>(paquetes&nbsp;<strong>deb</strong>) RedHat lo hace mediante&nbsp;<strong>rpm&nbsp;</strong>(paquetes&nbsp;<strong>rpm</strong>). Obteniendo la distribuci&oacute;n en la cual se basa, se puede identificar que tipo de archivo (deb o rpm) se debe descargar.</p>

<p>Para obtener el nombre de la distribuci&oacute;n madre, se puede visualizar cualquiera de los dos&nbsp; archivos:&nbsp;<strong>os-release</strong>&nbsp;o&nbsp;<strong>version</strong>. Para acceder al contenido de los archivos se puede realizar con cualquier editor o imprimiendo en pantalla desde la terminal con herramientas como cat, tail o cualquier otra.</p>

<pre>
<code class="language-bash">cat /etc/os-release
</code></pre>

<pre>
<code class="language-bash">cat /proc/version
</code></pre>

<p><strong>os-release (Fedora)</strong></p>

<p><strong><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666883960.png" style="height:396px; width:642px" /></strong></p>

<p>&nbsp;</p>

<p><strong>os-release (Debian)</strong></p>

<p><strong><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666883982.png" style="height:156px; width:365px" /></strong></p>

<p><strong>version (Fedora)</strong></p>

<p><strong><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666884019.png" style="height:54px; width:643px" /></strong></p>

<p><strong>version (Debian)</strong></p>

<p><strong><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666884069.png" style="height:53px; width:634px" /></strong></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/uETrI4DcCFP3dlFsau4ka6GzgEETkjOlyJTv2ulu.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //147
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar SublimeText y Visual Studio en Debian',
            'slug' => 'instalar-sublimetext-y-visual-studio-en-debian',
            'body_main' => 'Instalar Sublime Text 3 y Visual Studio Code en Debian',
            'body_plus' => '<p>Instalar Visual Studio Code</p>

<p>Software requerido</p>

<pre>
<code class="language-bash">sudo apt install software-properties-common apt-transport-https curl
</code></pre>

<p>Importar GPG key (con curl)</p>

<pre>
<code class="language-bash">curl -sSL https://packages.microsoft.com/keys/microsoft.com/keys/microsoft.asc | sudo apt-key add -
</code></pre>

<p>A&ntilde;adir Visual Studio Code a la lista de repositorios</p>

<pre>
<code class="language-bash">sudo add-apt-repository "deb [arch=amd64] https://packages.microsoft.com/repos/vscode stable main"
</code></pre>

<p>Actualizar</p>

<pre>
<code class="language-bash">sudo apt update
</code></pre>

<p>Instalar</p>

<pre>
<code class="language-bash">sudo apt install code
</code></pre>

<p>Instalar Sublime Text (Debian)</p>

<p>Software requerido</p>

<pre>
<code class="language-bash">sudo apt install apt-transport-https
</code></pre>

<p>Importar GPG key</p>

<pre>
<code class="language-bash">wget -qO - https://download.sublimetext.com/sublimehq-pub.gpg | sudo apt-key add -
</code></pre>

<p>A&ntilde;adir Sublime Text a la lista de repositorios (versi&oacute;n estable o versi&oacute;n desarrollo)</p>

<p><br />
A&ntilde;adir versi&oacute;n estable</p>

<pre>
<code class="language-bash">echo "deb https://download.sublimetext.com/ apt/stable/" | sudo tee /etc/apt/sources.list.d/sublime-text.list
</code></pre>

<p>A&ntilde;adir versi&oacute;n de desarrollo</p>

<pre>
<code class="language-bash">echo "deb https://download.sublimetext.com/ apt/dev/" | sudo tee /etc/apt/sources.list.d/sublime-text.list
</code></pre>

<p>Actualizar</p>

<pre>
<code class="language-bash">sudo apt update
</code></pre>

<p>Instalar</p>

<pre>
<code class="language-bash">sudo apt install sublime-text
</code></pre>

<p>Versi&oacute;n instalada</p>

<pre>
<code class="language-bash">subl --version
</code></pre>

<p>Instalar Sublime Text (Fedora)</p>

<p>Importar GPG key</p>

<pre>
<code class="language-bash">sudo rpm -v --import https://download.sublimetext.com/sublimehq-rpm-pub.gpg
</code></pre>

<p>A&ntilde;adir versi&oacute;n estable</p>

<pre>
<code class="language-bash">sudo dnf config-manager --add-repo https://download.sublimetext.com/rpm/stable/x86_64/sublime-text.repo
</code></pre>

<p>Instalar</p>

<pre>
<code class="language-bash">sudo dnf install sublime-text
</code></pre>

<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/DCh4U9KMXENarqLGrJhcAgGdNighTNybA5eWPEZA.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //148
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Obtener información de sistema en Linux',
            'slug' => 'obtener-informacion-de-sistema-en-linux',
            'body_main' => 'Obtener información de sistema en Linux',
            'body_plus' => '<p>Linux dispone de m&uacute;ltiples herramientas para obtener informaci&oacute;n del sistema. Es necesario indicar que dentro del entorno Linux la mayor&iacute;a de distribuciones generalmente se basan en dos de ellas. Estas distribuciones, denominadas madre son&nbsp;Debian&nbsp;y&nbsp;RedHat.</p>

<p>Debian trabaja con los paquetes mediante&nbsp;dpkg&nbsp;(paquetes .deb) y RedHat trabaja con paquetes mediante&nbsp;rpm&nbsp;(paquetes .rpm). Por tanto, si se requiere la instalaci&oacute;n de un paquete se requiere saber en cual de ellas est&aacute; basada nuestra distribuci&oacute;n para descargar y/o instalar el paquete correcto.</p>

<p>Procesador</p>

<pre>
<code class="language-bash">lscpu
lscpu -a -e
cat /proc/cpuinfo</code></pre>

<pre>
Memoria RAM
</pre>

<pre>
<code class="language-bash">free -m</code></pre>

<p>Temperatura del disco duro</p>

<pre>
<code class="language-bash">hddtemp /dev/sdX</code></pre>

<p>En todas las distribuciones Linux existen distintas formas para obtener datos del sistema, como la distribuci&oacute;n espec&iacute;fica, la versi&oacute;n, el hardware instalado, la arquitectura...&nbsp;</p>

<p>A continuaci&oacute;n se enumeran y detallan algunas de estas herramientas</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/GENQwrJEotvq5QMP5KipKuOlJ0sT5jAKupDDRbYr.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);

        //149
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Instalar youtube-dl',
            'slug' => 'instalar-youtube-dl',
            'body_main' => 'Instalar youtube-dl',
            'body_plus' => '<p>Instalaci&oacute;n en Linux</p>

<p>Tipos de instalaci&oacute;n</p>

<ul>
    <li>curl</li>
    <li>wget</li>
    <li>pip</li>
    <li>apt - dnf</li>
</ul>

<p>Instalar con curl</p>

<pre>
<code class="language-bash">sudo curl -L https://yt-dl.org/downloads/latest/youtube-dl -o /usr/local/bin/youtube-dl
sudo chmod a+rx /usr/local/bin/youtube-dl</code></pre>

<p>Instalar con wget</p>

<pre>
<code class="language-bash">sudo wget https://yt-dl.org/downloads/latest/youtube-dl -O /usr/local/bin/youtube-dl
sudo chmod a+rx /usr/local/bin/youtube-dl</code></pre>

<p>Instalar con pip o pip3</p>

<pre>
<code class="language-bash">sudo -H pip install --upgrade youtube-dl
</code></pre>

<p>Instalar con apt y dnf</p>

<p>Debian</p>

<pre>
<code>sudo apt install youtube-dl
</code></pre>

<p>Fedora</p>

<pre>
<code class="language-bash">sudo dnf install youtube-dl
</code></pre>

<p>Instalaci&oacute;n en Windows</p>

<p>Descargar youtube-dl</p>

<p>1. Descargar el archivo youtube-dl.exe desde su p&aacute;gina&nbsp;<a href="https://youtube-dl.org/" target="_blank">oficial</a>.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666900539.png" style="height:121px; width:438px" /></p>

<p>Copiar el archivo a la carpeta de programas</p>

<p>1. Acceder a la shell de Windows con permisos de Administrador</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666900559.jpg" style="height:680px; width:1152px" /></p>

<p>2. Crear el directorio youtube-dl en el directorio de programas y copiar el archivo</p>

<pre>
<code class="language-bash">C:\Windows\system32&gt;mkdir "C:\Program Files\youtube-dl"
</code></pre>

<pre>
<code class="language-bash">C:\Windows\system32&gt;copy "C:\Users\miusuario\Downloads\youtube-dl" "C:\Program Files\youtube-dl"
</code></pre>

<p>A&ntilde;adir ruta a variable de entorno</p>

<p>1. Acceder a Sistema (Panel de control)</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666900628.jpg" style="height:680px; width:392px" /></p>

<p>2. Seleccionar la opci&oacute;n &quot;Configuraci&oacute;n avanzada del sistema&quot; del men&uacute; lateral y en la siguiente ventana el bot&oacute;n &quot;Variables de entorno&quot;.</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666900663.jpg" style="height:486px; width:412px" /></p>

<p>3. Seleccionar la variable path y a continuaci&oacute;n el bot&oacute;n Editar.</p>

<p>4. En la ventana de edici&oacute;n seleccionar Nuevo y a&ntilde;adir la nueva ruta de youtube-dl. A continuaci&oacute;n aceptar todas las ventanas</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1666900683.jpg" style="height:501px; width:527px" /></p>

<p>Instalaci&oacute;n en macOS</p>

<pre>
<code class="language-bash">brew install youtube-dl
</code></pre>

<p>Obtener formatos disponibles de un v&iacute;deo</p>

<pre>
<code class="language-bash">youtube-dl -F [video]
</code></pre>

<p>Descargar v&iacute;deo con el formato indicado</p>

<pre>
<code class="language-bash">youtube-dl -f [formato] [video]
</code></pre>

<p>Actualizar</p>

<pre>
<code class="language-bash">sudo apt upgrade youtube-dl
</code></pre>

<p>Para descargar v&iacute;deos con youtube-dl pasar por el siguiente&nbsp;<a href="https://bahiaxip.com/entrada/descargar-videos-de-youtube-con-youtube-dl" target="_blank">enlace</a>.</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/guoV2UCo8RV2fQTjXVWKfL6sMxIkekJ4mv8Blseq.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 33
        ]);

        //150
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Descargar vídeos de Youtube con youtube-dl',
            'slug' => 'descargar-videos-de-youtube-con-youtube-dl',
            'body_main' => 'Descargar vídeos de Youtube con youtube-dl',
            'body_plus' => '<p>youtube-dl es una herramienta que permite descargar v&iacute;deos de Youtube a tu ordenador. A continuaci&oacute;n se indican las opciones para descargar v&iacute;deos con youtube-dl.</p>

<p>Obtener formatos disponibles de un v&iacute;deo</p>

<pre>
<code class="language-bash">youtube-dl -F [video]
</code></pre>

<p>Descargar v&iacute;deo en el formato indicado</p>

<pre>
<code class="language-bash">youtube-dl -f [formato] [video]
</code></pre>

<p>Ejemplo de descarga</p>

<pre>
<code class="language-bash">youtube-dl -f 18 https://www.youtube.com/watch?v=gyWw-Ba1ULM
</code></pre>

<p>Versi&oacute;n</p>

<pre>
<code class="language-bash">youtube-dl --version
</code></pre>

<p>Descargar v&iacute;deo con subt&iacute;tulos</p>

<pre>
<code class="language-bash">youtube-dl -f [formato] --write-auto-sub [vídeo]
</code></pre>

<p>&nbsp;Descargar v&iacute;deo con metadatos</p>

<pre>
<code class="language-bash">youtube-dl -f [formato] --add-metadata [vídeo]
</code></pre>
<p>Para poder instalar youtube-dl se puede seguir el proceso de instalacion desde&nbsp;<a href="/post/instalar-youtube-dl">Instalar youtube-dl</a></p>
<p>&nbsp;</p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/5NMJAk6Hm5HATwioeIk6uHiN4Yrlw6SUwqUWyb8m.jpg'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 33
        ]);


        //COPIAMOS TODOS LOS DATOS A LA NUEVA COLUMNA AÑADIDA (PARA EVITAR CONFLICTOS CON ENUM AL INTENTAR CAMBIAR EL TIPO DE DATO).
        //HEMOS AÑADIDO LA COLUMNA STATUSSTR DE TIPO INTEGER Y COPIAMOS TODOS LOS VALORES ALMACENADOS EN STATUS.
        //LA FORMA DE COPIAR ES LA SIGUIENTE: 
        //AL HACER LA MIGRACIÓN SE ESTABLECE "0" POR DEFECTO,EN LA SIGUIENTE CONSULTA SOLO CAMBIAMOS A 1 LOS CAMPOS QUE SE ENCUENTRAN
        //EN PUBLISHED (YA QUE SOLO EXISTEN 2 VALORES(DRAFT O PUBLISHED))
        
        DB::statement("UPDATE posts SET statusint = 1 WHERE status = 'PUBLISHED'");
        /*
        //2
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Crear un USB de arranque para Linux',
            'slug' => 'crear-un-usb-de-arranque-para-linux',
            'body_main' => 'Como formatear un dispositivo usb desde una terminal en linux.',
            'body_plus' => '<p>Linux dispone del comando dd para crear im&aacute;genes de distribuciones linux y poder instalarlas en nuestro PC de forma sencilla y r&aacute;pida.</p>

<p>Para hacer uso del comando dd es recomendable formatear y desmontar la partici&oacute;n.</p>

<p>A&ntilde;adimos la ruta de la imagen iso&nbsp; y la ruta del dispositivo:</p>

<pre>
<code class="language-bash">dd if=[imagen.iso] of=[dispositivo]
</code></pre>

<p>Ejemplo de instalaci&oacute;n de una distribuci&oacute;n debian en un usb:</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955715.png" style="height:106px; width:626px" /></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/66JVEXchmxa2gRAe8idWEm8tI0q8O4V6REOzt5xf.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        */

        /*
        //2
        $post = Posts::create([
            'category_id' => 1,
            'title' =>'Crear un USB de arranque para Linux',
            'slug' => 'crear-un-usb-de-arranque-para-linux',
            'body_main' => 'Como formatear un dispositivo usb desde una terminal en linux.',
            'body_plus' => '<p>Linux dispone del comando dd para crear im&aacute;genes de distribuciones linux y poder instalarlas en nuestro PC de forma sencilla y r&aacute;pida.</p>

<p>Para hacer uso del comando dd es recomendable formatear y desmontar la partici&oacute;n.</p>

<p>A&ntilde;adimos la ruta de la imagen iso&nbsp; y la ruta del dispositivo:</p>

<pre>
<code class="language-bash">dd if=[imagen.iso] of=[dispositivo]
</code></pre>

<p>Ejemplo de instalaci&oacute;n de una distribuci&oacute;n debian en un usb:</p>

<p><img alt="" src="http://localhost:8000/upload/posts/bahiaxip@hotmail.com/1665955715.png" style="height:106px; width:626px" /></p>
',          
            'user_id' => 1,
            'status' => 'PUBLISHED',
            'file' => 'image/post/main/66JVEXchmxa2gRAe8idWEm8tI0q8O4V6REOzt5xf.png'

        ]);

        DB::table('post_tag')->insert([
            'post_id' => $post->id,
            'tag_id' => 3
        ]);
        */
        
    }
}
