# A set of useful Laravel builder macros

[![Latest Version on Packagist](https://img.shields.io/packagist/v/signifly/laravel-builder-macros.svg?style=flat-square)](https://packagist.org/packages/signifly/laravel-builder-macros)
![Tests](https://github.com/signifly/laravel-janitor/workflows/Tests/badge.svg)
[![StyleCI](https://styleci.io/repos/144017418/shield?branch=master)](https://styleci.io/repos/144017418)
[![Quality Score](https://img.shields.io/scrutinizer/g/signifly/laravel-builder-macros.svg?style=flat-square)](https://scrutinizer-ci.com/g/signifly/laravel-builder-macros)
[![Total Downloads](https://img.shields.io/packagist/dt/signifly/laravel-builder-macros.svg?style=flat-square)](https://packagist.org/packages/signifly/laravel-builder-macros)

The `signifly/laravel-builder-macros` package allows you to easily add a set of useful builder macros to your Laravel app.

## Installation

You can install the package via composer:

```bash
$ composer require signifly/laravel-builder-macros
```

The package will automatically register itself.

## Macros

- [`addSubSelect`](#addSubSelect)
- [`defaultSelectAll`](#defaultSelectAll)
- [`joinRelation`](#joinRelation)
- [`leftJoinRelation`](#leftJoinRelation)
- [`map`](#map)
- [`whereLike`](#whereLike)

### `addSubSelect`

Add a select sub query.

```php
// Params: $column, $query
$query->addSubSelect('primary_address_id', 
    Address::select('id')
        ->where('user_id', $user->id)
        ->primary()
);

// It adds primary_address_id to the result set
```

### `defaultSelectAll`

It selects all columns from the query. Useful for queries with joins and additional selects.

```php
$query->defaultSelectAll()
    ->join('contacts', 'users.id', '=', 'contacts.user_id')
    ->addSelect('contacts.name as contact_name');
```

### `joinRelation`

A query way to join relations.

```php
// Params: $relationName, $operator
$query->joinRelation('contact');
```

### `leftJoinRelation`

A query to left join relations.

```php
// Params: $relationName, $operator
$query->leftJoinRelation('contact');
```

### `map`

A direct method to retrieve the results and map it.

```php
$userIds = $query->where('user_id', 10)->map(function ($user) {
    return $user->id;
});

// Returns a collection
```

### `whereLike`

Search in your models with the `LIKE` operator.

```php
$query->whereLike('title', 'john')->get();

// Returns all results where title  includes `john`
```

You can also supply an array of columns to search in:
```php
$query->whereLike(['title', 'contact.name'], 'john')->get();

// Returns all results where title or contact.name includes `john`
```

## Testing
```bash
$ composer test
```

## Security

If you discover any security issues, please email dev@signifly.com instead of using the issue tracker.

## Credits

- [Morten Poul Jensen](https://github.com/pactode)
- [All contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
