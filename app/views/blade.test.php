<!doctype html>
<html>
<head>
    <title></title>
</head>
<body>
<!-- name Form Input -->
<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>
<!-- web Form Input -->
<div class="form-group">
    {{ Form::label('web', 'Web:') }}
    {{ Form::text('web', null, array('class' => 'form-control')) }}
</div>
<!-- winner Form Input -->
<div class="form-group">
    {{ Form::label('winner', 'Winner:') }}
    {{ Form::text('winner', null, array('class' => 'form-control')) }}
</div>
<!-- secret Form Input -->
<div class="form-group">
    {{ Form::label('secret', 'Secret:') }}
    {{ Form::password('secret', array('class' => 'form-control')) }}
</div>
</body>
</html>