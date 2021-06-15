<?php

namespace Mis3085\ForgotPassword;

use Encore\Admin\Extension;

class ForgotPassword extends Extension
{
    public $name = 'laravel-admin-ext-forgot-password';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
    ];
}
