# Laravel HTTP Schedule Trigger

## Description

This library enables a Laravel application to trigger scheduled tasks via an HTTP request. 
By publishing a specific route within your application, this package allows for the execution of Laravel's scheduler from an external source,
such as a web-based cron job service. 
Authentication is managed through a Bearer token, which can be set via an environment variable, ensuring secure access to this functionality.

## Installation

To install the package, run the following command in your Laravel project:

```bash
composer require coufal/laravel-http-schedule-trigger
```

## Configuration

After installation, publish the package's configuration file to your project:

```bash
php artisan vendor:publish --provider="Coufal\LaravelHttpScheduleTrigger\Providers\ScheduledTaskServiceProvider"
```

This will publish a configuration file to `config/scheduled-tasks.php`, where you can customize the settings.

## Environment Settings

Set the Bearer token in your `.env` file:

```
SCHEDULED_TASKS_TOKEN=your-secure-token-here
```

This token will be used for authenticating the HTTP requests to the scheduled tasks route.

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
