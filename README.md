<h1 align="center">Toastr.js notifications for Laravel</h1>

<p align="center">:eyes: This package helps you to add <a href="https://github.com/CodeSeven/toastr">toastr.js</a> notifications to your Laravel projects.</p>

<p align="center">
    <a href="https://packagist.org/packages/yoeunes/toastr"><img src="https://poser.pugx.org/yoeunes/toastr/v/stable" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/yoeunes/toastr"><img src="https://poser.pugx.org/yoeunes/toastr/v/unstable" alt="Latest Unstable Version"></a>
    <a href="https://packagist.org/packages/yoeunes/toastr"><img src="https://poser.pugx.org/yoeunes/toastr/downloads" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/yoeunes/toastr"><img src="https://poser.pugx.org/yoeunes/toastr/license" alt="License"></a>
</p>

<p align="center"><img width="300" alt="toastr" src="https://user-images.githubusercontent.com/10859693/39634578-1a9f121a-4fb3-11e8-8863-d64fad42901b.png"></p>

## Install

You can install the package using composer

```sh
composer require yoeunes/toastr
```

## Usage:

The usage of this package is very simple and straightforward. it only required one step to use it :

Use `toastr()` helper function inside your controller to set a toast notification for info, success, warning or error

```php
// Display an error toast with no title
toastr()->error('Oops! Something went wrong!');
```

As an example:

```php
<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{
    public function store(PostRequest $request)
    {
        $post = Post::create($request->only(['title', 'body']));

        if ($post instanceof Model) {
            toastr()->success('Data has been saved successfully!');

            return redirect()->route('posts.index');
        }

        toastr()->error('An error has occurred please try again later.');

        return back();
    }
}
```

### Other Options

```php
// Set a warning toast, with no title
toastr()->warning('Are you sure you want to proceed ?');

// Set a success toast, with a title
toastr()->success('Data has been saved successfully!', 'Congrats');

// Set an error toast, with a title
toastr()->error('Oops! Something went wrong!', 'Oops!');

// Override global config options from 'config/toastr.php'
toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
```

### Other api methods:

You can also chain multiple messages together using method chaining

```php
toastr()
    ->info('Welcome back')
    ->success('Data has been saved successfully!')
    ->warning('Are you sure you want to proceed ?');
```

You can use `toastr('')` instead of `toastr()->success()`

```php
function toastr(string $message = null, string $type = 'success', string $title = '', array $options = []);
```

So

* `toastr($message)` is equivalent to `toastr()->success($message)`
* `toastr($message, 'info')` is equivalent to `toastr()->info($message)`
* `toastr($message, 'warning')` is equivalent to `toastr()->warning($message)`
* `toastr($message, 'error') ` is equivalent to `toastr()->error($message)`

### configuration:

As optional if you want to modify the default configuration, you can publish the configuration file:
 
```sh
php artisan vendor:publish --provider="Yoeunes\Toastr\ToastrServiceProvider"
```

```php
// config/toastr.php
<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Toastr options
    |--------------------------------------------------------------------------
    |
    | Here you can specify the options that will be passed to the toastr.js
    | library. For a full list of options, visit the documentation.
    |
    */
    
    'options' => [
        'closeButton'       => true,
        'closeClass'        => 'toast-close-button',
        'closeDuration'     => 300,
        'closeEasing'       => 'swing',
        'closeHtml'         => '<button><i class="icon-off"></i></button>',
        'closeMethod'       => 'fadeOut',
        'closeOnHover'      => true,
        'containerId'       => 'toast-container',
        'debug'             => false,
        'escapeHtml'        => false,
        'extendedTimeOut'   => 10000,
        'hideDuration'      => 1000,
        'hideEasing'        => 'linear',
        'hideMethod'        => 'fadeOut',
        'iconClass'         => 'toast-info',
        'iconClasses'       => [
            'error'   => 'toast-error',
            'info'    => 'toast-info',
            'success' => 'toast-success',
            'warning' => 'toast-warning',
        ],
        'messageClass'      => 'toast-message',
        'newestOnTop'       => false,
        'onHidden'          => null,
        'onShown'           => null,
        'positionClass'     => 'toast-top-right',
        'preventDuplicates' => true,
        'progressBar'       => true,
        'progressClass'     => 'toast-progress',
        'rtl'               => false,
        'showDuration'      => 300,
        'showEasing'        => 'swing',
        'showMethod'        => 'fadeIn',
        'tapToDismiss'      => true,
        'target'            => 'body',
        'timeOut'           => 5000,
        'titleClass'        => 'toast-title',
        'toastClass'        => 'toast',
    ],
];
```
For a list of available options, see [toastr.js' documentation](https://github.com/CodeSeven/toastr).

## Credits

- [Younes Khoubza](https://github.com/yoeunes)
- [All Contributors](../../contributors)

## License

MIT
