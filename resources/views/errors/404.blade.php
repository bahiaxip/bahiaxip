


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen, Ubuntu, Cantarell,'Open Sans','Helvetica Neue',sans-serif;
        }
        .error404{
            width:100%;
            height:100vh;
            display:flex;
            background-color:#212529;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            color:#FFF;
            font-family:YoutubeB;
            position:relative;            
        }
        .back_icon{
            display:flex;
            height:100%;
            position:absolute;
            width:100%;
        }
        .div_icon{
            align-items:center;
            display:flex;
            height:100%;
            justify-content:center;
            width:50%;
        }
        
        .icon{
            background-image:url('../ima/logos_programacion/linux_new.png');
			background-repeat:no-repeat;
			background-size: 100%;
			display: flex;
			width:200px;
            height:200px;
            
        }
        p{
            font-size:80px;
            margin:0;
            color:#18D26E;
            
        }
        p span{
            font-size:40px;
            margin:0 10px;
            color:#FFF;
        }
        .button{
            align-items:center;
            border:#FFF 1px solid;
            border-radius:4px;
            display:flex;
            height:30px;
            justify-content:center;
            transition:all .3s;
            width:100px;
            z-index:1;
            margin:20px 0;
        }
        .button:hover{
            border:#18D26E 1px solid;
        }
        .button:hover a{
            color:#18D26E;
        }
        a{
            padding:10px;
            font-size:20px;
            color:#FFF;
            text-decoration:none;
            transition:all .3s;
        }

        @media screen and (max-width:1000px){
            .div_icon{
                width:100%;
                align-items:end;
            }
        }

        

        @font-face{
            font-family:Ecliptic_BRK;
            src:url(../fonts/Ecliptic_BRK.ttf);
        }
        @font-face{
	        font-family:YoutubeB;
	        src:url(../fonts/youtube-sans/youtube-sans-bold.ttf);
        }
            
    </style>
</head>
<body>

    <div class="error404" >
        <div class="back_icon">            
            <div class="div_icon" >
                <div class="icon"></div>
            </div>
        </div>
        
        <p><span>Error</span> 404</p>
        <h1>Esta página no existe</h1>
        <div class="button" >
            <a href="/">Volver</h3>
        </div>
    </div>
    
</body>
</html>