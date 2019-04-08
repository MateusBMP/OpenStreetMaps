<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__.'\..\src\class\geocoding.php');

class FeatureTest extends TestCase {
    private $time = 1;    // use value >= 1

    public function test_SearchAddress() {
        $search = [
            'rua cincinato pinto',
            'levada',
            'maceio',
            'alagoas',
            '503'
        ];
        $geocoding = new Geocoding();
        $output = $geocoding->generate($search);
        $this->assertTrue($output);
        $output = $geocoding->getRequest();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_SearchCep() {
        $search = ['57020-050'];
        $geocoding = new Geocoding();
        $output = $geocoding->generate($search);
        $this->assertTrue($output);
        $output = $geocoding->getRequest();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }
}
