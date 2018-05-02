<!DOCTYPE html>
<html lang="en">
<head>
  <title>Patient Monitor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link id="bootstrap-style" href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="./assets/css/style.css" rel="stylesheet">
        <link id="base-style-responsive" href="./assets/css/style-responsive.css" rel="stylesheet">
        
        

  <script src="./assets/js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body> 


<script type="text/javascript">
    $(document).ready(function(){
            setInterval(function(){
                $("#pulse").load("pulse.txt",function( response, status, xhr ) {
                    if(response > 0){
                        $("#warning1").load("notifications.txt #pulse_found");
                    }
                    else{
                        $("#warning1").load("notifications.txt #pulse_not_found");
                    }

});                    
                    $("#temp").load("temp.txt",function( response, status, xhr ) {
                    if(response >70){
                        $("#warning2").load("notifications.txt #temp_found");
                    }
                    else{
                        $("#warning2").load("notifications.txt #temp_not_found");
                    }

});
                    $("#system").load("system.txt",function( response, status, xhr ) {
                    if(response>0){
                        $("#warning3").load("notifications.txt #system_on");
                    }
                    else{
                        $("#warning3").load("notifications.txt #system_off");
                    }

});

                    $("#oxygen").load("oxygen.txt",function( response, status, xhr ) {
                        if(response>0){
                        $("#warning4").load("notifications.txt #oxygen_on");
                    }
                    else{
                        $("#warning4").load("notifications.txt #oxygen_off");
                    }

});

                $("#resp").load("resp.txt");
               // $("#temp").load("temp.txt");
               //alert();
            }, 100);
    });

</script>


<div class="container-fluid">
<div style="width:100%; height:100px;"> </div>

<div class="row-fluid"  style="width:100%; height:230px;">

                            <!-- EMPTY DIV -->
                        <div class="span3 statbox white" onTablet="span8" onDesktop="span3">
                            
                        </div>

                            <!-- RED DIV -->
                        <div class="span3 statbox " onTablet="span8" onDesktop="span3" >
                            

                         <div class="statbox bg-danger text-white">
                            <div class="number" ><p id="pulse" style="font-size:60px"></p></i></div>
                            
							<div class="footer" style="background-color: black; ">
                                <p> Pulse Rate </p>
                            </div>
                            </div>

                                        <div id="warning1"></div>


                        </div>



                        <!-- BLUE DIV -->
                        <div class="span3 statbox" onTablet="span8" onDesktop="span3">
                           <div class="statbox bg-info text-white">
                            <div class="number"><p id="temp" style="font-size:60px"></p</i></div>
                            
                            <div class="footer" style="background-color: black; ">
                                <p> Body Temperature</p>
                            </div>
                            </div>

                                             <div id="warning2"></div>

                        </div>


                        <!-- EMPTY DIV -->
                        <div class="span3 statbox white" onTablet="span8" onDesktop="span3">
                            
                            </div>
                        	
                        
    </div>

<div class="row-fluid">

<div class="span4 statbox white" onTablet="span8" onDesktop="span4">
    
    </div>


   <!-- Yellow DIV -->
   <div class="span4 statbox " onTablet="span8" onDesktop="span4" >
                            

                            <div class="statbox bg-warning text-white">
                               <div class="number" ><p id="resp" style="font-size:60px"></p></i></div>
                               
                               <div class="footer" style="background-color: black; ">
                                   <p> Respiratory Rate Per Minute</p>
                               </div>
                               </div>
   
                                           <div id="warning1"></div>
   
   
                           </div>
   

<div class="span4 statbox white" onTablet="span8" onDesktop="span4">
    
    </div>
    

</div>




<div class="row-fluid">

<div class="span4 statbox white" onTablet="span8" onDesktop="span4">
    
    </div>


<div class="span4 statbox white" onTablet="span8" onDesktop="span4">


            
            <div id="system" hidden></div>
            <div id="oxygen" hidden></div>

            <div id="warning3"></div>
            <div id="warning4"></div>
            

    
    </div>

<div class="span4 statbox white" onTablet="span8" onDesktop="span4">
    
    </div>
    

</div>



</div>

</body>
</html>
