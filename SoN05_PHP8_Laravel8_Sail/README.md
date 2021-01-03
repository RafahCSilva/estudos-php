# Laravel v8 com PHP8 e Laravel-Sail

````shell
# Instalando
docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    laravel new SoN05_PHP8_Laravel8_Sail
cd SoN05_PHP8_Laravel8_Sail
sudo chown -R $USER: .
````
