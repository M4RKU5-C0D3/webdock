#!/usr/bin/env bash
set -e
CPD="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

cd $CPD/../..

tools/docker/run.sh /var/pac/bin/console "$@"
