# Acivities log for CodeIgnitor 3

Third party will be installed automatically to application/third_party by [Composer Installers Extender](https://github.com/oomphinc/composer-installers-extender).

This third party also use [CoreUI-Smarty-ACL](https://github.com/andri-sudarmawijaya/CoreUI-Smarty-ACL).
to get identity.

## Installation

```bash
composer require andri-sudarmawijaya/ci-activities:1.0.x-dev
```
or
```bash
composer require andri-sudarmawijaya/ci-activities
```

add this third party as package to config/autoload.php
```php
$autoload['packages'] = array(
    '...',
    'APPPATH.'third_party/ci-activities'
);
```

### Use

In your controller
```php
    function __construct()
    {
        ...;
        $this->load->library('activities');

    }
```

#### use activities log
in your part of code
```php
        $param['tabel'] = 'Your tabel';
        $param['content'] = 'Your content want to log';
        $param['info'] = 'Your short info';

        $this->activities->log_activities($param);
```

#### use telegram bot
in your part of code
```php
        '...';
        $param['botToken'] = 'XXXXXXXXXX:YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY'; //your telegram bot
        $param['chatId'] = '-ZZZZZZZZZ'; //Your chat id
        $param['content'] = 'Your content want to log'; // your message to telegram

        $this->activities->log_activities($param);
```
