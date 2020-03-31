<?php
/**
 * Created by PhpStorm.
 * User: Tiago Gomes
 * Date: 15/03/2020
 * Time: 11:56
 */
namespace Geone\dddLaravelGenerator\Parcer;

class TemplateParcer
{
    /**
     * @param string $html
     * @return atring
     */
    public function parce(string $className, string $html, string $tableName=null): string {
        $html = str_replace('{{ClassName}}', $className, $html);
        $html = str_replace('{{ClassNameCamelCase}}', strtolower($className), $html);
        return str_replace('{{tableName}}', $tableName, $html);
    }
}