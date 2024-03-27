@extends('layouts.app')
@section('title','Inicio')
@section('content')
{{--
@if(perm()->testPermission(Auth::user()->code,'active'))
--}}
<div class="wrap">
    
    {{-- section home --}}
    <div class="section_home">
        <div class="home">
            <!-- título -->
            <div class="box_profile">
                <div class="profile">
                    @include('home.title')
                </div>
            </div>
            
                <div class="center">
                    <div class="images">
                        <!-- <div class="slide img1"><img src="img/bg1.jpg" alt=""></div> -->
                        @foreach($posts as $post)
                        <div class="slide img1">
                            <!-- <img src="img/bg2.jpg" alt=""> -->
                            <div class="slidercss " style="background-image:url('{{asset($post->file)}}')">
                            <div class="slidetitle" >
                                <div class="back_slidetitle">
                                    <a href="{{config('app_url')}}/post/{{$post->slug}}">{{$post->title}}</a>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endforeach
                        {{--
                        <div class="slide">
                            <!-- <img src="img/bg3.jpg" alt=""> -->
                            <div class="slidercss imageslider2"></div>
                        </div>
                        <div class="slide">
                            <!-- <img src="img/bg4.jpg" alt=""> -->
                            <div class="slidercss imageslider3"></div>
                        </div>
                        <div class="slide">
                            <!-- <img src="img/bg5.jpg" alt=""> -->
                            <div class="slidercss imageslider4"></div>
                        </div>
                        <div class="slide">
                            <!-- <img src="img/bg5.jpg" alt=""> -->
                            <div class="slidercss imageslider5"></div>
                        </div>
                        --}}
                    </div>
                    
                    
                </div>
                <div class="buttons">
                        <a href="javascript:void(0)" class="btn1 active" onclick="slider(this)"></a>
                        <a href="javascript:void(0)" class="btn2" onclick="slider(this)"></a>
                        <a href="javascript:void(0)" class="btn3" onclick="slider(this)"></a>
                        <a href="javascript:void(0)" class="btn4" onclick="slider(this)"></a>
                        <a href="javascript:void(0)" class="btn5" onclick="slider(this)"></a>
                    </div>
            <!-- <div style="width:50%;height:100px;background-color:#FFF;">
                <img src="" alt="">
            </div> -->
            
            <!-- forma de ángulo en el contenedor -->
            <div class="div_angle">
                <div class="angle_bottom left"></div>
                <div class="angle_bottom right"></div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection
@section('scripts')
<script src="{{asset('js/imagesliderJS.js')}}"></script>
<script type="text/javascript">

    
    
window.addEventListener('resize',()=>{
    console.log("resize")
})

</script>

@endsection