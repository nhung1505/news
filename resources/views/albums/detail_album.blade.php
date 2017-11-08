@extends('layouts.app')
@section('title')
    Detail Album
@endsection
@section('content')
    @component('/conponent/view_info_song')
    @slot('info_song')
        <div class="row">
            <div class="col-md-4">
                <img src="https://baomoi-photo-1-td.zadn.vn/17/09/08/139/23227992/1_59236.jpg">
            </div>
            <div class="col-md-6">
                <h3>Name : Duong</h3>
                <h3>Description</h3>
                <pre class="col-md-12">Lyrics are updating</pre>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    @endslot
    @endcomponent
    @component('/conponent/view_info_song')
    @slot('info_song')
    @endslot
    @endcomponent
@endsection