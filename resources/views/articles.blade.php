@extends('layouts.landing')

@section('title', 'The Summit Journal')
@section('description', 'Expedition chronicles, technical insights, and adventure narratives from the mountains, glaciers, and wilderness that shape our community.')

@section('content')
    @include('partials.articles.hero')
    @include('partials.articles.category-nav')
    @include('partials.articles.editorial-grid')
    @include('partials.articles.pagination')
@endsection
