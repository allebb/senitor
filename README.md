# Senitor

Senitor is a PHP API client for the Sentora (and compatible with ZPanel) Web Hosting Panel Web Service Layer (XMWS.

Senitor is the new and improved version of my [XMWS PHP Client](https://github.com/bobsta63/xmws-php-client), it is recommend that people use this library instead now.

Requirements
------------

* PHP >= 5.4.0

License
-------

This library is released under the GPLv2 license, a [copy of the license](LICENSE) is provided in this package.

Setup
-----

To install the package into your project (assuming you are using the Composer package manager) you can simply execute the following command from your terminal in the root of your project folder:

```composer require ballen/senitor```

Alternatively you can manually add this library to your project using the following steps, simply edit your project's composer.json file and add the following lines (or update your existing require section with the library like so):

```json
"require": {
        "ballen/senitor": "^1.0"
}
```

Then install the package like so:

```composer update ballen/senitor```

Examples
--------

A set of working examples can be found in the ``/examples`` directory.

Support
-------

I am happy to provide support via. my personal email address, so if you need a hand drop me an email at: [ballen@bobbyallen.me](mailto:ballen@bobbyallen.me).