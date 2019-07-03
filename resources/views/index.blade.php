@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!--собакаinclude('common.errors')-->
        <form action="{{ url('app-news') }}" method="GET" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="app-name" class="col-sm-3 control-label">Application</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="app-name" class="form-control">
                </div>
            </div>

            <!-- Search button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Search
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if (count($apps_array) > 0)
    <div class="steam-response">
        {{--@foreach ($news as $news_item)
            <div class="news-item">
                <div class="news-title">{{ $news_item->title }}</div>
                <div class="news-body" style="border-bottom: solid black 1px;">{{ $news_item->contents }}</div>
            </div>
        @endforeach--}}
{{--            @foreach ($apps_array as $app)--}}
{{--                <div class="news-item">--}}
{{--                    <div class="news-title">{{ $app->appid }}</div>--}}
{{--                    <div class="news-body" style="border-bottom: solid black 1px;">{{ $app->name }}</div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
    </div>
    @endif
@endsection