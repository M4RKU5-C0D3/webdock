<?php
/*
 * This is just a dummy project that redirects to P.A.C. 
 * This location should be overriden by docker volume, e.g.
 * docker-compose.yml -> {services: {web: {volumes: [./src:/var/project]}}}
 */
header('Location: '.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].'/pac/');
exit();
