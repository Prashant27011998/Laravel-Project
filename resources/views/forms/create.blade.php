<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
   
</head>
<body>


<div class="row">
  
    @extends('layouts.app')
    
    <div class="col-sm-2"></div>
    <div class="col-sm-8 forms">
  
    <p class="h3 text-center py-4 show"><b>Basic Information</b></p>
    {{-- @include('inc.messages'); --}}
    {!! Form::open([ 'id'=>"email_us"]) !!}
    <div class="alert alert-success d-none" id="msg_div">
        <span id="res_message"></span>
   </div>
        <div class="form-group">
            {{Form::label('name', 'Full Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Full Name'])}}
            <span id="names" class="text-danger"></span>
        </div>
       
        <div class="form-group">
            {{Form::label('email', 'Email Id')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Example: john@gmail.com'])}}
            <span id="emails" class="text-danger"></span>
        </div>
       
        <div class="form-group">
            {{Form::label('pin', 'Pin No.')}}
            {{Form::text('pin', '', ['class' => 'form-control', 'placeholder' => 'Enter 6 digit Pin Code'])}}
            <span id="pins" class="text-danger"></span>
        </div>
        
        <div class="form-group" style="text-align:center;">
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
    </div>
    <div class="col-sm-2"></div>
</div>
</body>
</html>
<script type="text/javascript">
     
     $(document).ready(function(){
      $(".btn-primary").click(function(e){
        e.preventDefault();
            
            $('#names').html("");
            $('#emails').html("");
            $('#pins').html("");
           
        var name = $("input[name=name]").val();

        var email = $("input[name=email]").val();

        var pin = $("input[name=pin]").val();



        $.ajax({
        type:'post',

        url:'{{ url("created") }}',

        data:$('#email_us').serialize(),

        success:function(response){
            if (response.status==true){
                $('#res_message').show();
                $('#res_message').html(response.msg);
                $('#msg_div').removeClass('d-none');
                $('#msg_div').show();
                document.getElementById("email_us").reset(); 
            }
            
            else{
                
                $('#names').html(response.name);
                $('#emails').html(response.email);
                $('#pins').html(response.pin);
            }
            
            setTimeout(function(){
                $('#msg_div').hide();
                $('#res_message').html("");
        },10000);
            
            
        }

        });



        });
     });
</script>

      