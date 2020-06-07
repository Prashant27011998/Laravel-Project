<p class="h3 text-center py-4 hide"><b>Basic Information</b></p>

<div class="row">
    @extends('layouts.app')
    @section('content')
    <div class="col-sm-2"></div>
    <div class="col-sm-8 forms">
    <p class="h3 text-center py-4 show"><b>Basic Information</b></p>
    @include('inc.messages')
    {!! Form::open(['action' => 'ATGController@store', 'method' => 'POST']) !!}
    
        <div class="form-group">
            {{Form::label('name', 'Full Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Full Name'])}}
        </div>
       
        <div class="form-group">
            {{Form::label('email', 'Email Id')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Example: john@gmail.com'])}}
        </div>
       
        <div class="form-group">
            {{Form::label('pin', 'Pin No.')}}
            {{Form::text('pin', '', ['class' => 'form-control', 'placeholder' => 'Enter 6 digit Pin Code'])}}
        </div>
        
        <div class="form-group" style="text-align:center;">
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}
    </div>
    <div class="col-sm-2"></div>
</div>
@endsection

