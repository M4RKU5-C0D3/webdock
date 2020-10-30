#!/bin/bash
set -e

# respect overrides
if [[ $DOCKER_APACHE_CONF ]] && [[ -f "/var/project/$DOCKER_APACHE_CONF" ]] ; then
    ln -sf /var/project/${DOCKER_APACHE_CONF} /etc/apache2/conf-available/project.conf
fi
if [[ $DOCKER_APACHE_SITE ]] && [[ -f "/var/project/$DOCKER_APACHE_SITE" ]] ; then
    ln -sf /var/project/${DOCKER_APACHE_SITE} /etc/apache2/sites-available/project.conf
fi
if [[ $DOCKER_PHP_INI ]] && [[ -f "/var/project/$DOCKER_PHP_INI" ]] ; then
    ln -sf /var/project/${DOCKER_PHP_INI} /usr/local/etc/php/conf.d/project.ini
fi
if [[ $DOCKER_ENTRYPOINT ]] && [[ -x "/var/project/$DOCKER_ENTRYPOINT" ]] ; then . /var/project/${DOCKER_ENTRYPOINT} ; fi

# give some info
echo
echo -e "\e[33m""Info:""\e[0m"
echo -e "PHP: $(php -r "echo PHP_VERSION;")"
echo -e "Composer: $(composer --version)"

# lets go...
echo
echo -e "\e[33m""Running""\e[0m"" $@:"
exec "$@"
