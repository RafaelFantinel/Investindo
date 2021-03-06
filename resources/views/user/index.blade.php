@extends('templates.master')
@section('conteudo-view')

@if (session('success')&&'success'== true)
<div class="alert alert-success">
    <h3>{{ session('success') ['messages']}}</h3>   
</div>


@endif





   {!! Form::open([ 'route'=>'user.store','method' => 'post', 'class' => 'form-padrao']) !!}
   @include('templates.formulario.input', ['input' => 'cpf', 'attributes' => ['placeholder' =>'CPF']])
   @include('templates.formulario.input', ['input' => 'name', 'attributes' => ['placeholder'=> 'Nome']])
   @include('templates.formulario.input', ['input' => 'phone', 'attributes' => ['placeholder'=>'Telefone']])

   @include('templates.formulario.input', ['input' => 'email', 'attributes' => ['placeholder'=>'E-mail']])
   @include('templates.formulario.password', ['input' => 'password', 'attributes' => ['placeholder'=>'Senha']])
   @include('templates.formulario.submit', ['input' => 'Cadastrar'])

    {!! Form::close()!!}
    <section class="jumbotron text-center">
    <div class="container">
            <div class="card mb-4 shadow-sm">
    <table class="default-table">
        <thead>
            <tr>
                <td>#</td>
                <td>CPF</td>
                <td>Nome</td>
                <td>Telefone</td>
                <td>Nascimento</td>
                <td>E-mail</td>
                <td>Status</td>
                <td>Permissao</td>
                <td>Menu</td>
            </tr>

        </thead>
        <tbody>
            @foreach ($users as $user)
                <td>{{$user->id}}</td>
                <td>{{$user->cpf}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->birth}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->status}}</td>
                <td>{{$user->permission}}</td>

                <td>
                {!! Form::open(['route'=>['user.destroy',$user->id], 'method'=>'DELETE']) !!}
                {!! Form::submit('Remover') !!}
                {!! Form::close() !!}
            </td>
            </tr>
            <tr>
            @endforeach  
        </tbody>
    </table>
            </div>
    </div>
    </section>
@endsection

@section('css-view')
    
@endsection

@section('js-view')
    
@endsection