# Google Fonts CSP Logging

## Setup

1. Add the following header (via `.htaccess` for example):

`Content-Security-Policy-Report-Only: default-src 'none'; report-uri /csp-log.php`

For `.htaccess` you should use this:

`Header always set Content-Security-Policy-Report-Only "default-src 'none'; report-uri /csp-log.php"`

2. Upload `csp-log.php` and `csp-test.html`.

3. Go to `https://example.com/csp-test.html` (replace `example.com` with your domain name).

4. Check if `.ht-csp-violations.log` is created. It should look like [this file](.ht-csp-violations.log).

5. Delete the test file `csp-test.html` afterwards.

6. Regularly check the file for new entries and resolve them. You can either let a crawler open all pages or manually visit all pages to let the CSP rule detect the CSP violations.

## Support

only via [Threema](https://threema.id/74SF7MW6?text=)