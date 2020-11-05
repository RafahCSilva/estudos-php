#!/usr/bin/env bash

echo "==> RUNNING PHPUnit..."
vendor/bin/phpunit


# echo "==> BUILDING SONAR..."
# cd /mnt/c/_WWW/sonar-qube-and-scanner-local
# docker-compose build sonar-scanner
# docker-compose pull sonar-scanner sonarqube db
# echo "==> RUNNING SONAR-SERVER..."
# docker-compose up -d db sonarqube
# echo "127.0.0.1 sonarqube-wsl.com.br" | sudo tee -a /etc/hosts
#  open http://localhost:9123/
#  open http://sonarqube-wsl.com.br:9123/
# docker-compose stop db sonarqube


echo "==> RUNNING SONAR-SCANNER..."
cd /mnt/c/_WWW/sonar-qube-and-scanner-local
docker-compose run --rm sonar-scanner bash -c "sonar-scanner \
  -Dsonar.projectKey=son02_solid_rev1 \
  -Dsonar.projectBaseDir=/code/projects/estudos-php/SoN02_SOLID_rev1 \
  -Dsonar.sources=/code/projects/estudos-php/SoN02_SOLID_rev1/src"


cd /mnt/c/_WWW/estudos-php/SoN02_SOLID_rev1
echo "==> FIM!"
