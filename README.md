laravel-admin extension: Forgot Password
======

## Requirement
    - "php": "^7.3|^8.0",
    - "laravel/framework": "^8.0",
    - "encore/laravel-admin": "~1.6"

## Installation
```
composer require mis3085/laravel-admin-ext-forgot-password
```

## User Model Modification
- Add `email` field to `admin_users` table and migrate.
- Create a new model for `admin_users`
  - extends `Encore\Admin\Auth\Database\Administrator`
  - implements interface `Illuminate\Contracts\Auth\CanResetPassword`
  - use trait `Illuminate\Notifications\Notifiable`
  - use trait `Illuminate\Auth\Passwords\CanResetPassword`
  - ex:
    ```
    namespace App\Models;

    use Encore\Admin\Auth\Database\Administrator;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Auth\Passwords\CanResetPassword;
    use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

    class AdminUser extends Administrator implements CanResetPasswordContract
    {
        use CanResetPassword;
        use Notifiable;

        //...
    }
    ```

## Config Modification
- Edit `config/admin.php`, change `auth.providers.admin.model` from `Encore\Admin\Auth\Database\Administrator::class` to `App\Models\AdminUser::class`, ex:
    ```
    'providers' => [
        'admin' => [
            'driver' => 'eloquent',
            'model'  => App\Models\AdminUser::class,
        ],
    ],
    ```
- Edit `config/auth.php`, add a new broker to `passwords`
    ```
    'admin' => [
        'provider' => 'admin',
        'table' => 'password_resets',
        'expire' => 60,
        'throttle' => 60,
    ],
    ```

## View Modification
- Copy `./vendor/encore/laravel-admin/resources/views/login.blade.php` to `./resources/views/vendor/admin/` (skip this process if you have already done it before)
- Add this link to `./resources/views/vendor/admin/login.blade.php`
    ```
    <a class="btn btn-link" href="{{ route('admin.password.request') }}">{{ __('Forgot your password?') }}</a>
    ```
