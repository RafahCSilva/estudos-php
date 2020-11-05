<?php

namespace MyNamespace {

    /**
     * Class Dependency
     * Isso é um PhpDoc dad Class.
     * @package MyNamespace
     */
    class Dependency
    {
        /**
         * Isso é um PhpDoc do method.
         * @return string
         */
        public function showMe()
        {
            return "class Dependency has be used";
        }
    }
}

namespace {

    $class = new \ReflectionClass(\MyNamespace\Dependency::class);

    $object = $class->newInstance();

    var_dump($class->getDocComment());
    var_dump($class->getMethods());
    var_dump($class->getMethod('showMe')->getClosure($object));
    var_dump($class->getMethod('showMe')->getDocComment());
    var_dump($object->showMe());
}
