@extends('layouts.app')
@section('title')
    Detail Album
@endsection
@section('content')
    @component('/conponent/view_info_song')
    @slot('info_song')
    @endslot
    @endcomponent

    @component('/conponent/view_list_song')
    @slot('list_song')
    @endslot
    @endcomponent

@endsection