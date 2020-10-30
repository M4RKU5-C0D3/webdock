#!/usr/bin/env bash
set -e
CPD="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

cd $CPD/../..

docker-compose up -d "$@"
docker-compose logs -f "$@"
