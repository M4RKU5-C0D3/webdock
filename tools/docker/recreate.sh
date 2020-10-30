#!/usr/bin/env bash
set -e
CPD="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

cd $CPD/../..

tools/docker/stop.sh "$@"
docker-compose rm -f "$@"
tools/docker/start.sh "$@"
