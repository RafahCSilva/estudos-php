<?php

declare(strict_types=1);

namespace RCS\DesignPatterns1\Pt4Comportamentais\Command;

class Invoker
{
    private static array $REGISTERED_COMMANDS = [];

    public static function register(array $commands): void
    {
        self::$REGISTERED_COMMANDS = $commands;
    }

    public static function call(string $commandToExecute): string
    {
        // Find command
        if (!array_key_exists($commandToExecute, self::$REGISTERED_COMMANDS)) {
            throw new InvokerException("Command not found");
        }
        $commandClass = self::$REGISTERED_COMMANDS[$commandToExecute];

        // Instancie and execute
        $commandInstancie = new $commandClass(new LampReceiver());
        return $commandInstancie->execute();
    }
}
