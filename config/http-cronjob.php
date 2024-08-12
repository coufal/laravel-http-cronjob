<?php

return [
  'token' => env('HTTP_CRONJOB_TOKEN', null),  // defaults to null to block access if no custom token was set
  'endpoint' => env('HTTP_CRONJOB_ENDPOINT', '/scheduler/cronjob'),
];
