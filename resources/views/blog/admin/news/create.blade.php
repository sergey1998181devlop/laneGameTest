@extends('layouts.app')

@section('content')
    <div class="container">
        @php /** @var \App\Models\BlogCategory $item */ @endphp
        @include('blog.admin.news.includes.result_messages')
        @if($item->exists)
            {{--            Обновление новости--}}
            <form method="POST" action="{{ route('blog.news.update' , $item->id) }}">
                @method('PATCH')
                @else
                    {{--            Добавление новости --}}
                    <form method="POST" action="{{ route('blog.news.store' ) }}">
                        @endif
                        @csrf
                        @php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp
                        @if($errors->any())
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                        {{ $errors->first() }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">x</span>
                                        </button>
                                        {{ session()->get('success') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    @include('blog.admin.news.includes.news_edit_main_col')
                                </div>
                                <div class="col-md-3">
                                    @include('blog.admin.news.includes.news_edit_add_col')
                                </div>
                            </div>
                        </div>
                    </form>
                    @if($item->exists)
                        <br>
                        <form method="POST" action="{{ route('blog.admin.news.destroy' , $item->id) }}">
                            @method('DELETE')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button type="submit" class="btn btn-link">Удалить</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    @endif
            </form>
@endsection
