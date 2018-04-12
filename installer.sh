#!/bin/sh

## Installa tutte le dipendenze: 
# PHP 7 o superiore
# Mysql
# git 
# 
## Fa il clone del repo (pull dal master o tramite tag annotato) dentro /tmp
# sposta la directory del programma su /home/<utente>/.pwman/
# rimuove la directory .git/
# crea il symblink a /usr/local/bin o /usr/bin
# crea il DB e le tabelle users e games
