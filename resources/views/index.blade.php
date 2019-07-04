@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <!--собакаinclude('common.errors')-->
        <form action="{{ url('/') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- App Name -->
            <div class="form-group">
                <label for="app-name" class="col-sm-3 control-label">Enter Application Name</label>
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
    @if (isset($app_details))
    <div class="steam-response">
        <div class="news-item">
            <h2 class="app-name">{{ $app_details->name[0] }}</h2>
            <div class="app-description">{!! $app_details->description[0] !!}</div>
            <div class="app-requirements">
                <div class="app-min-requirements">{!! $app_details->pcRequirements->minimum[0] !!}</div>
            </div>
            <div class="app-price">{!! $app_details->price->initial_formatted[0] !!}</div>
        </div>
        @foreach ($news as $news_item)
            <div class="news-item">
                <div class="news-title">{!! $news_item->title !!}</div>
                <div class="news-body">{!! $news_item->contents !!}</div>
            </div>
        @endforeach
    </div>
    @endif
    <a class="go-to-player-search" href="/">Player Info page</a>
@endsection