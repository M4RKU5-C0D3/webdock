#!/usr/bin/env bash
set -e

PS1="\e[44;33m\t \e[47;34m \u@\h \e[42;30m \w \e[0m\n > "
export PS1

alias ..='cd ..'
alias -- ~='cd ~'
alias -- -="cd -"
alias ll='ls -laH'
