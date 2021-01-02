#!/usr/bin/env bash
# https://phpunit.readthedocs.io/pt_BR/latest/textui.html

if [ "$1" == "--fast" ]; then
  echo "==> RUNNING FAST PHPUnit..." &&
    vendor/bin/phpunit \
      --no-logging \
      --no-coverage \
      -d 'xdebug.profiler_enable=off' \
      -d 'xdebug.remote_enable=0' \
      --colors=auto
else
  echo "==> RUNNING FULL PHPUnit..." &&
    rm -rf tests/_reports &&
    time vendor/bin/phpunit &&
    echo "" &&
    echo "to see coverage, run:" &&
    echo "  open tests/_reports/_coverage/html-coverage/index.html"
fi

echo "==> FIM!"
