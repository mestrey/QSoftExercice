<?php

use App\Repositories\ArticlesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoryRepository;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator;

$articleRepository = new ArticlesRepository();
$categoryRepository = new CategoryRepository();
$carRepository = new CarsRepository();

Breadcrumbs::for('homepage', function (Generator $trail) {
    $trail->push('Главная', route('homepage'));
});

Breadcrumbs::for('about', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('О компании');
});

Breadcrumbs::for('contact', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Контактная информация');
});

Breadcrumbs::for('condition', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Условия продаж');
});

Breadcrumbs::for('finance', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Финансовый отдел');
});

Breadcrumbs::for('client', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Для клиентов');
});

Breadcrumbs::for('articles.index', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Новости', route('articles.index'));
});

Breadcrumbs::for('articles.show', function (Generator $trail, string $slug) use ($articleRepository) {
    $article = $articleRepository->findBySlug($slug);
    $trail->parent('articles.index');
    $trail->push($article->title, route('articles.show', $article));
});

Breadcrumbs::for('articles.edit', function (Generator $trail, string $slug) {
    $trail->parent('articles.show', $slug);
    $trail->push('Редактирование');
});

Breadcrumbs::for('catalog', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Каталог', route('catalog'));
});

Breadcrumbs::for('category', function (Generator $trail, string $slug) use ($categoryRepository) {
    $category = $categoryRepository->findBySlug($slug);
    $trail->parent('catalog');

    if ($category->parent != null) {
        $trail->push($category->parent->name, route('category', $category->parent));
    }

    $trail->push($category->name, route('category', $category));
});

Breadcrumbs::for('products.show', function (Generator $trail, int $id) use ($carRepository) {
    $car = $carRepository->findById($id);
    $trail->parent('category', $car->category->slug);
    $trail->push($car->name, route('products.show', $car));
});

Breadcrumbs::for('account', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Аккаунт');
});

Breadcrumbs::for('login', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Авторизация');
});

Breadcrumbs::for('register', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Регистрация');
});

Breadcrumbs::for('password.request', function (Generator $trail) {
    $trail->parent('homepage');
    $trail->push('Сброс пароля');
});
