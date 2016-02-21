<?php

namespace Hasantayyar\Tests;

use Hasantayyar\YamlRegex;

class MainTest extends \PHPUnit_Framework_TestCase
{
    public function testPasswords()
    {
        $passwords = [
          "zZLX"=> false,
          "JHUMqglxadA="=> false,
          "09RkLjFS"=> true,
          "YY+To8TYN6L7Gk="=> true,
          "09RkLjFSSSS"=> false,
          "CIlh6Hk="=>true,
          "CIlhHk="=>false
        ];
        foreach ($passwords as $password => $expected) {
          $pc = new YamlRegex();
          $actual = $pc->check($password, FALSE);
          $this->assertEquals($expected, $actual);
        }
    }
}
