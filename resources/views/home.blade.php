@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="list-group">
                        <a href="{{route('form.index',['data'=>''])}}" class="list-group-item list-group-item-action">Получить Пустые формы</a>
                        <a href="{{route('form.index',['data'=>'true'])}}" class="list-group-item list-group-item-action">Получить Заполненые Формы</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
