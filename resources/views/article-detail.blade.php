@extends('layouts.landing')

@section('title', "Vertical Dreams: Ascending El Capitan's Dawn Wall")
@section('description', "A 19-day journey on one of climbing's most demanding routes, where every move is calculated, every pitch tests the limits of human endurance, and the granite wall becomes both obstacle and teacher.")

@section('content')
    @include('partials.article-detail.reading-progress')
    @include('partials.article-detail.hero-banner')
    @include('partials.article-detail.content')
    @include('partials.article-detail.related')
@endsection
