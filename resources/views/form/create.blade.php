@extends('layouts.app')

@section('content')
    <!-- Start: 1 Row 1 Column -->
    <div class="container" style="padding-top: 40px;">
        <div class="row">
            <div class="col">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}"><span>Главная</span></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('form.index') }}"><span>Журнал Пустых форм</span></a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <h1 class="fs-3 text-center">Заполнение данных формы</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $forms->name }}</h4>
                        <p class="card-text">{{ $forms->description }}</p>
                        <form action="{{ route('form.store', $forms->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <?php $model =  json_decode($forms->model); ?>
                            @foreach ($model->elements as $item)
                                @switch($item->type)
                                    @case('text')
                                        <div class="mb-3">
                                            <label for="{{$item->name}}" class="form-label">{{$item->title}}</label>
                                            <input type="text" class="form-control" name="form[{{$item->name}}]" id="{{$item->name}}" aria-describedby="helpId"
                                                placeholder="" {{ $item->isRequired ? 'required' :""}} >
                                            <small id="helpId" class="form-text text-muted">Help text</small>
                                        </div>
                                    @break
                                    @case('textarea')
                                        <div class="mb-3">
                                            <label for="{{$item->name}}" class="form-label">{{$item->title}}</label>
                                            <textarea class="form-control" name="form[{{$item->name}}]" id="{{$item->name}}" rows="3"></textarea>
                                        </div>
                                    @break
                                    @default
                                @endswitch
                            @endforeach
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
