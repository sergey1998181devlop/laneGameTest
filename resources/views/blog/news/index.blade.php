@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.admin.news.includes.result_messages')

        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($userCurrentType == 1)
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary " href="{{ route('blog.news.create') }}">Создать новость</a>
                </nav>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Автор</th>
                                <th>Список Рубрик</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($paginator as $newsItem)
                                <tr @if(!$newsItem->is_published) style="background-color: #ccc" @endif>
                                    <td>{{ $newsItem->id }}</td>
                                    <td>{{ $newsItem->user->name }}</td>


                                    <td>
                                     @if($newsItem->category)
                                        @foreach($newsItem->category as $category)

                                                {{ $category->title }}<br>
                                        @endforeach
                                        @else
                                         -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('blog.news.edit' , $newsItem->id) }}">{{ $newsItem->title }}</a>
                                    </td>
                                    <td>{{ $newsItem->published_at ? \Carbon\Carbon::parse($newsItem->published_at)->format('d.M H:i') : '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @php /** @var Illuminate\Pagination\Paginator $paginator */ @endphp
            @if($paginator->hasPages())
                <br>
                <div class="d-flex justify-content-left">
                    {!! $paginator->links() !!}
                </div>
            @endif
        </div>
    </div>
@endsection
