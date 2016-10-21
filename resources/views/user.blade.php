<h1>USER - ADD</h1>

{!! Form::open(['url'=>'store', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name') !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email') !!}
    </div>

    <div class="form-group">
        {!! Form::label('imagem', 'Imagem Perfil') !!}
            {!! Form::file('imagem') !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('gravar') !!}
    </div>

{!! Form::close() !!}

<hr>


<table border="1">
    <tr><td>name</td><td>email</td><td>imagem</td></tr>
@foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>

        <td><img src='/user/{{ $user->id }}/image' /></td>


    </tr>
@endforeach
</table>