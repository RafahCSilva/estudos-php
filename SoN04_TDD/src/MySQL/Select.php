<?php
/**
 * Created by PhpStorm
 * User: rafaelcardoso
 * Date: 02/01/21
 * Time: 18:49
 */

namespace RCS\QueryBuilder\MySQL;

class Select
{

    public function table(string $table): void
    {
    }

    public function getSql(): string
    {
        return "SELECT * FROM pages;";
    }
}
