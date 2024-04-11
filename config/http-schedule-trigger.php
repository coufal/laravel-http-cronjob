<?php

return [
  'token' => env('HTTP_SCHEDULE_TRIGGER_TOKEN', 'your-default-token-here'),
  'endpoint' => env('HTTP_SCHEDULE_TRIGGER_ENDPOINT', '/scheduler/cronjob'),
];
