# Laravel HTTP Cronjob

## Description

This library enables a Laravel application to trigger scheduled tasks via an HTTP request.
This package enables Laravel's scheduler to be triggered externally, for instance, 
via web-based cron job services provided by hosting companies such as IONOS or All-Inkl.com. 
Authentication is managed through a Bearer token, which can be set via an environment variable, ensuring secure access to this functionality.

## Installation

To install the package, run the following command in your Laravel project:

```bash
composer require coufal/laravel-http-cronjob
```

## Configuration

After installation, publish the package's configuration file to your project:

```bash
php artisan vendor:publish --provider="Coufal\LaravelHttpCronjob\Providers\HttpCronjobServiceProvider"
```

This will publish a configuration file to `config/scheduled-tasks.php`, where you can customize the settings.

## Environment Settings

Configure the Bearer token and a custom endpoint in your .env file:

```
HTTP_SCHEDULE_TRIGGER_TOKEN=your-secure-token-here
HTTP_SCHEDULE_TRIGGER_ROUTE=/custom/scheduler/endpoint
```

- `HTTP_SCHEDULE_TRIGGER_TOKEN` is used for authenticating the HTTP requests to the scheduled tasks route.
- `HTTP_SCHEDULE_TRIGGER_ROUTE` allows you to define a custom route for triggering scheduled tasks. If not set, the default route `/scheduler/cronjob` is used.

This flexibility ensures that you can secure and customize the HTTP cronjob endpoint according to your project's needs.

## Usage

Once configured, you can trigger the Laravel scheduler by making a POST request to the published route (`/scheduler/cronjob` by default) 
with the correct Bearer token in the Authorization header:

```
Authorization: Bearer your-secure-token-here
```

This can be set up as a web-based cron job pointing to this route to trigger your scheduled tasks remotely.

## Security Considerations

Ensure that your Bearer token is kept secure and is only known to the services that require access to trigger the scheduler.

## Contributing

Contributions to the package are welcome! Please feel free to submit pull requests or open issues to suggest improvements or report bugs.

## License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
