@extends('layouts.landing')

@section('title', 'SummitX')
@section('description', 'Premium outdoor gear engineered for adventurers who seek the summit. Apparel, packs, climbing and camping built for the wild unknown.')

@section('content')
    @include('partials.landing.hero')
    @include('partials.landing.featured-categories')
    @include('partials.landing.editorial-story')
    @include('partials.landing.featured-products')
    @include('partials.landing.product-grid')
    @include('partials.landing.promo-banner')
    @include('partials.landing.article-preview')
    @include('partials.landing.cta-section')
    @include('partials.landing.testimonials')
@endsection
