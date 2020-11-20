#!/usr/bin/env bash

echo "==> RUNNING PHPUnit..."
rm -rf tests/_reports
vendor/bin/phpunit

echo "==> FIM!"
