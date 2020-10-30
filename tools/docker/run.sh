#!/usr/bin/env bash
set -e
CPD="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

cd $CPD/../..

CMD="${@:-bash --login}"

docker-compose exec web ${CMD}
