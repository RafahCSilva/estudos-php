#!/usr/bin/env bash


# echo "==> BUILDING GLOBALLY SONAR..."
# cd /mnt/c/_WWW/sonar-qube-and-scanner-local
# docker-compose build sonar-scanner
# docker-compose pull sonar-scanner sonarqube db
# echo "==> RUNNING GLOBALLY SONAR-SERVER..."
# docker-compose up -d db sonarqube
# echo "127.0.0.1 sonarqube-docker.test" | sudo tee -a /etc/hosts
#  open sonarqube-docker.test:9123/
# docker-compose stop db sonarqube


echo "==> REPLACE PATHS..."
# replace absolutes paths for Sonar-Scanner mounted volume
sed -i "s|$(pwd)|/usr/src|" tests/_reports/report.junit.xml
sed -i "s|$(pwd)|/usr/src|" tests/_reports/coverage_clover.xml


echo "==> RUNNING SONAR-SCANNER..."
docker run \
  --rm \
  -v $(pwd):/usr/src/ \
  --network sonar-qube-and-scanner-local_sonarnet \
  -e SONAR_HOST_URL="http://sonarqube:9000" \
  sonarsource/sonar-scanner-cli


echo "==> FIM!"
