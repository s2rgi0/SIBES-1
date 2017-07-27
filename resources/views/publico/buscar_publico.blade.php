<!DOCTYPE doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <title>
                SIBES
            </title>
            <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport">
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel=stylesheet href="css/estilo_mostrar.css" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Baloo|Raleway" " rel="stylesheet">
            <link rel="shortcut icon" type="image/ico" href="/imagen/favicon.ico" />
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="css/side_bar_nav.css">
    

    <style type="text/css">
        
    .carousel{
        box-shadow: 0 7px 10px 0 rgba(0, 0, 0, 0.3);
    }

    @media screen and (min-width: 1000px) {
    
    
        .container-fluid{
         height:0px;
        }
    
    }
    

    </style>
    </head>
    <body>
<!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->

<header>
         @include('parciales.nav')
</header>


 
<!---->   <!---->      <!---->   <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->  <!---->
    <article>

    <div class="row">

    <div class="col-md-4">

    @include('publico.menu.menu_side_bar')
    @include('publico.menu.menu_forms')

    </div>
   

    <div class="col-md-6">
   



        <center>
            @yield('content')
        </center>
    
            
    
   
    </div>
    </div>
    
    </article>
    <script src="js/jquery-3.2.1.min.js"> </script>
    <script src="js/bootstrap.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @include('publico.menu.script_menu')        
    </body>
    


</html>
