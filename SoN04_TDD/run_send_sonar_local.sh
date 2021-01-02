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

FILE_JUNIT="tests/_reports/report.junit.xml"
FILE_CLOVER="tests/_reports/_coverage/clover.xml"

# Verify files exists
if [[ ! -f "$FILE_JUNIT" ]] || [[ ! -f "$FILE_CLOVER" ]]; then
  echo "Tests results not found!"
  echo "  Run first ./run_tests.sh"
  exit 1
fi

# replace absolutes paths for Sonar-Scanner mounted volume
(echo "==> Replace Paths in Results..." &&
  sed -i "s|$(pwd)|/usr/src|" "$FILE_JUNIT" &&
  sed -i "s|$(pwd)|/usr/src|" "$FILE_CLOVER" &&
  echo "  Replace done") ||
  (echo "  Replace fail" && exit 1)

# Analyse and Send to Sonar
echo "==> RUNNING SONAR-SCANNER..." &&
  docker run \
    --rm \
    -v $(pwd):/usr/src/ \
    --network sonar-qube-and-scanner-local_sonarnet \
    -e SONAR_HOST_URL="http://sonarqube:9000" \
    sonarsource/sonar-scanner-cli &&
  echo "  DONE!"
