#!/usr/bin/env bash
set -e
CPD="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

cd $CPD/../../src

docker build -t m4rku5/webdock .
