<?php

return [
  'token' => env('HTTP_CRONJOB_TOKEN', 'your-default-token-here'),
  'endpoint' => env('HTTP_CRONJOB_ENDPOINT', '/scheduler/cronjob'),
];
