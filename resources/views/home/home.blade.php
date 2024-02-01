@extends('layouts.app')
@section('title','Inicio')
@section('content')
{{--
@if(perm()->testPermission(Auth::user()->code,'active'))
--}}
<div class="wrap">
    
    {{--
    <div  style="width:100%;height:60px;display:flex;background-color:black;transition:all 3s linear;position:relative">
        <div style="width:30px;height:30px;background-color:lightgreen;position:absolute;display:flex;justify-content:end;left:50%;top:15px;clip-path: polygon(100% 0%, 75% 50%, 100% 100%, 25% 100%, 0% 50%, 25% 0%);"></div>
        <div style="width:200px;margin:auto;background-color:transparent;display:flex;">
            <img src="{{asset('ima/logo_bahiaxipX800.png')}}" alt="" width="200" style="margin:auto;position:relative">
            <!--<img src="{{asset('ima/logo_bahiaxipX800.png')}}" alt="" width="350" style="margin:auto;position:absolute">-->
        </div>
    </div>
    --}}

    
    {{-- section home --}}
    <div class="section_home">
        
        <div   style="margin:auto;display: flex;justify-content:center;background-color:grey;display:none">
            <img id="image1" src="data:image/png;base64,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" alt="" >
        </div>
        
    {{--<div class="row mb-3 home">--}}
        <div class="home">
        <div class="background_cover" ></div>

        {{-- pasado al nav superior...
        <div class="box_canvas">
            <canvas id="canvas1" class="canvas1"></canvas>    
        </div>
        --}}
            <div class="box_profile" >
                
                
                <div class="profile">
                    {{-- <div class="text_name">
                        Fernando Gómez
                        <h5><span>FullStack</span> Developer</h5>
                    </div> --}}
                    {{-- <div class="text_name"><span style="margin:auto 10px;opacity:0.2">&#x0276E;  </span>
                        Bahiaxip<span style="margin:auto 0px auto 10px;opacity:0.2">/</span><span style="margin:auto 0px auto 0px;opacity:0.2">&#x0276F; </span>
                    </div> --}}
                    {{-- <div class="text_name">
                        BAHIA<span>XIP</span>
                    </div> --}}
                    @include('home.title')
                    <!--
                    <div class="image">
                        <div class="box_canvas">
                            <canvas id="canvas1" class="canvas1"></canvas>    
                        </div>
                    </div>
                    -->
                </div>
                

                
                <div class="skills2">
                    <div class="box_skills1">
                        @include('home.skills1')
                    </div>
                    <div class="box_skills2">
                        @include('home.skills2')
                    </div>

                </div>
            </div>
        {{--
        <div style="width:100%;justify-content: center;display:flex;align-items:center;position:relative">
        </div>
        --}}
        <div class="div_angle">
            <div class="angle_bottom left"></div>
            <div class="angle_bottom right"></div>
        </div>
        </div>

    </div>
    {{-- section blog --}}
    <div class="section_skills">
        {{--<button style="position:absolute;width:50px;height:50px;bottom:50px" onclick="dar()">Dar</button>--}}
        <div class="skills0">
            <h2>SKILLS</h2>
            @include('home.progress_skills')
        </div>
    </div>

    <div class="section_blog">
        <div class="div_angle">
            <div class="angle_bottom left"></div>
            <div class="angle_bottom right"></div>
        </div>
        <h2 >BLOG</h2>
        <div class="row blog">
            <div class="col-md-12 col-xl-7 pl-xl-0 mauto slider_blog">
                @include('home.slider_blog')
            </div>
            
            <div id="latcol" class="col-10 col-sm-8 mx-auto col-xl-4 text-center rounded mt-3 mt-xl-0 p-0 " >
                <!--<h5 class="text-white pt-2 font-weight-bold">Entradas Recientes</h5>-->
                @foreach($posts as $post)
                    <div class="div_lat">
                        <a class="column_index" href="{{route('post',['slug' => $post->slug])}}" >
                            <img src="{{asset($post->file)}}" alt="" >
                            <h4>{{$post->title}}</h4>
                        </a>
                        
                        {{--<p class="column_index2">{{$post->body_main}}</p>--}}
                        
                    </div>
                    <div class="w-100 d-xl-none" style="height:10px;">
                        
                    </div>
                
                @endforeach
            </div>
        </div>

    </div>


    {{--
    <div class="skills">
        <div class="div_angle">
            <div class="angle_bottom left"></div>
            <div class="angle_bottom right"></div>
        </div>
        <h4 style="color:white;text-align: center;margin:auto">Skills</h4>
        <div class="list" >
            <ul>
                <li>
                    <div class="div_skill">
                        <div class="logo">
                            <img src="{{asset('ima/logos/html5.svg')}}" alt="" class="p5" >
                        </div>
                        <div class="text">HTML5</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo">
                            <img src="{{asset('ima/logos/css3.svg')}}" alt="" class="p5">
                        </div>
                        <div class="text">CSS3</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/javascript.png')}}" alt="" class="p5">
                        </div>
                        <div class="text">JavaScript</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo">
                            <img src="{{asset('ima/logos/php.png')}}" alt="">
                        </div>
                        <div class="text">PHP</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo">
                            <img src="{{asset('ima/logos/jquery.png')}}" alt="" style="background-color:white;padding:8px">
                        </div>
                        <div class="text">jQuery</div>
                    </div>
                </li>
            </ul>
        
              
            <ul>
                <li>
                    <div class="div_skill">
                        <div class="logo">
                            <img src="{{asset('ima/logos/mysql.png')}}" alt="">
                        </div>
                        <div class="text">MySQL</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/mongo.svg')}}" alt="" >
                        </div>
                        <div class="text">MongoDB</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo">
                            <img src="{{asset('ima/logos/composer.png')}}" alt="" >
                        </div>
                        <div class="text">Composer</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/git_logo.png')}}" alt="" >
                        </div>
                        <div class="text">Git</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/npm.png')}}" alt="" >
                        </div>
                        <div class="text">NPM</div>
                    </div>
                </li>
            </ul>
            <ul>
                <li>
                    <div class="div_skill">
                        <div class="logo">
                            <img src="{{asset('ima/logos/angular.png')}}" alt="">
                        </div>
                        <div class="text">Angular</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/bootstrap.svg')}}" alt="" >
                        </div>
                        <div class="text">Bootstrap</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/laravel.png')}}" alt="" class="p5">
                        </div>
                        <div class="text">Laravel</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/livewire.png')}}" alt="" class="p5">
                        </div>
                        <div class="text">Livewire</div>
                    </div>
                </li>
                <li>
                    <div class="div_skill">
                        <div class="logo" >
                            <img src="{{asset('ima/logos/vue.png')}}" alt="" class="p5">
                        </div>
                        <div class="text">Vue</div>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="image"></div> 
    </div>
    --}}
    @include('layouts.footer')
    
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    
window.addEventListener('resize',()=>{
    console.log("resize")
})

</script>

@endsection