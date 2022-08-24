<?php

// author: Daniel Ruf (https://daniel-ruf.de)
// support: via Threema (https://threema.id/74SF7MW6?text=)
// license: CC-BY-SA 2.5 (https://creativecommons.org/licenses/by-sa/2.5/)
// based on https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-uri
// by https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy/report-uri/contributors.txt

$log_file = dirname(__FILE__) . '/.ht-csp-violations.log';

http_response_code(204);
$json_data = file_get_contents('php://input');

if ($json_data = json_decode($json_data, true)) {
  if (
    strpos($json_data['csp-report']['blocked-uri'], 'fonts.gstatic.com/') > 0 ||
    strpos($json_data['csp-report']['blocked-uri'], 'fonts.googleapis.com/') > 0
  ) {
    $json_data['csp-report']['datetime'] = date('c');
    $json_data = json_encode($json_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($log_file, $json_data, FILE_APPEND | LOCK_EX);
  }
}
