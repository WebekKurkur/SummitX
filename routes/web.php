<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/articles', function () {
    return view('articles');
})->name('articles');

Route::get('/articles/{slug}', function (string $slug) {
    return view('article-detail', ['slug' => $slug]);
})->name('article.show');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/payment-success', function () {
    return view('payment-success');
})->name('payment.success');

Route::get('/payment-history', function () {
    return view('payment-history');
})->name('payment.history');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/articles/editor', function () {
    $articles = [
        [
            'title' => "Vertical Dreams: Ascending El Capitan's Dawn Wall",
            'author' => 'Tommy Caldwell',
            'category' => 'Climbing',
            'status' => 'published',
            'date' => 'May 8, 2026',
            'views' => '12,453',
            'image' => 'https://images.unsplash.com/photo-1516737490857-847e4dc7da42?auto=format&fit=crop&w=160&h=160&q=70',
        ],
        [
            'title' => 'Summit Strategies: Planning Your First 8000m Peak',
            'author' => 'Sarah Mitchell',
            'category' => 'Mountaineering',
            'status' => 'published',
            'date' => 'May 5, 2026',
            'views' => '8,921',
            'image' => 'https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=160&h=160&q=70',
        ],
        [
            'title' => 'Expedition Nutrition: Fueling Multi-Day Adventures',
            'author' => 'David Chen',
            'category' => 'Training',
            'status' => 'draft',
            'date' => 'May 3, 2026',
            'views' => '0',
            'image' => 'https://images.unsplash.com/photo-1505672678657-cc7037095e60?auto=format&fit=crop&w=160&h=160&q=70',
        ],
        [
            'title' => 'Alpine Photography: Capturing the Wilderness',
            'author' => 'Emma Rodriguez',
            'category' => 'Photography',
            'status' => 'published',
            'date' => 'April 28, 2026',
            'views' => '15,678',
            'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=160&h=160&q=70',
        ],
    ];

    return view('admin.article-editor', ['articles' => $articles]);
})->name('admin.articles.editor');

Route::get('/admin/articles', function () {
    return view('admin.articles');
})->name('admin.articles');

Route::get('/admin/products', function () {
    return view('admin.products');
})->name('admin.products');

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin.users');

Route::get('/admin/transactions', function () {
    return view('admin.transactions');
})->name('admin.transactions');

Route::get('/products/{category}/{slug}', function (string $category, string $slug) {
    $allowed = ['backpacks', 'camping', 'climbing', 'footwear'];
    abort_unless(in_array($category, $allowed, true), 404);

    return view('product-detail', [
        'category' => $category,
        'slug' => $slug,
    ]);
})
    ->where(['category' => '[a-z\-]+', 'slug' => '[a-z0-9\-]+'])
    ->name('product.show');

Route::get('/products/{category?}', function (?string $category = null) {
    $allowed = ['all', 'backpacks', 'camping', 'climbing', 'footwear'];
    $category = in_array($category, $allowed, true) ? $category : 'all';

    return view('products', ['category' => $category]);
})
    ->where('category', '[a-z\-]+')
    ->name('products');
