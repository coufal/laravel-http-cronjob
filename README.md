# Laravel HTTP Cronjob

## Description


This library allows a Laravel application to initiate scheduled tasks through an HTTP request. 
It lets you trigger Laravel's scheduler from external sources, such as web-based cron job services offered by 
hosting providers like IONOS or All-Inkl.com. Security for accessing this feature is maintained using a Bearer token, 
which can be configured using an environment variable.

## Installation

To install the package, run the following command in your Laravel project:

```bash
composer require coufal/laravel-http-cronjob
# you may optionally publish the config file to config/scheduled-tasks.php by running
php artisan vendor:publish --provider="Coufal\LaravelHttpCronjob\Providers\HttpCronjobServiceProvider"
```

Configure the Bearer token and a custom endpoint in your `.env` file. 
A random token may be generated using: `pwgen --secure 256`.

```
HTTP_CRONJOB_TOKEN=your-secure-token-here
HTTP_CRONJOB_ENDPOINT=/custom/scheduler/endpoint
```

- `HTTP_CRONJOB_TOKEN` is used for authenticating the HTTP requests to the scheduled tasks route.
- `HTTP_CRONJOB_ENDPOINT` allows you to define a custom route for triggering scheduled tasks. If not set, the default route `/scheduler/cronjob` is used.

## Usage

### POST Request

Once configured, you can trigger the Laravel scheduler by making a POST request to the published route (`/scheduler/cronjob` by default) 
with the correct Bearer token in the Authorization header:

```
Authorization: Bearer your-secure-token-here
```

### GET Request

Alternatively, you can trigger the Laravel scheduler by making a GET request to the published route (`/scheduler/cronjob` by default)

```
/custom/scheduler/endpoint?token=your-secure-token-here
```

This can be set up as a web-based cron job pointing to this route to trigger your scheduled tasks remotely.

## Security Considerations

Ensure that your Bearer token is kept secure and is only known to the services that require access to trigger the scheduler.

Currently, there is no protection against brute force attacks against the API endpoint, apart from using a long token.

## Contributing

Contributions to the package are welcome! Please feel free to submit pull requests or open issues to suggest improvements or report bugs.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
