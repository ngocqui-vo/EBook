#!/bin/bash

# silent prompt
read -p 'GIT profile: ' profile

# switch
case $profile in
  m2)
    git config user.email "dzlama101@gmail.com"
    git config user.name "dzlama101" 
    git config user.signingKey "CxWQWnUxy7l8SF9itCBpwDbchrSPAlChMNKqeZ6jr5Q"
    ;;
  qui)
    git config user.email "ngocquivo11@gmail.com"
    git config user.name "qui" 
    git config user.signingKey "LQB2izq66XwqzEMHiviY5kW0/G5g3TI7OhbSC71gDc0"
    ;;
  # default case: raise error
  *)
    >&2 echo "ERR: Unknown profile: $profile"
    exit 1
esac