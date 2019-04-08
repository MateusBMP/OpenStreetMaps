<?php

use PHPUnit\Framework\TestCase;
require_once(__DIR__.'\..\src\class\geocoding.php');

class UnitTest extends TestCase {
    private $baseSearch = ['57020-050'];
    private $time = 1;    // use value >= 1

    public function test_Geocoding_generate() {
        $geocoding = new Geocoding();
        $output = $geocoding->generate($this->baseSearch);
        $this->assertTrue($output);
        sleep($this->time);
    }

    public function test_Geocoding_saveRequest() {
        $geocoding = new Geocoding();
        $geocoding->generate($this->baseSearch);
        $output = $geocoding->saveRequest();
        $this->assertTrue($output);
        $this->assertDirectoryNotExists(__DIR__.'\..\src\outputs\request.json');
        unlink(__DIR__.'\..\src\outputs\request.json');
        sleep($this->time);
    }

    public function test_Geocoding_getApi() {
        $geocoding = new Geocoding();
        $output = $geocoding->getApi();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getAgent() {
        $geocoding = new Geocoding();
        $output = $geocoding->getAgent();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getFilename() {
        $geocoding = new Geocoding();
        $output = $geocoding->getFilename();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getFormat() {
        $geocoding = new Geocoding();
        $geocoding->generate($this->baseSearch);
        $output = $geocoding->getFormat();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getParams() {
        $geocoding = new Geocoding();
        $geocoding->generate($this->baseSearch);
        $output = $geocoding->getParams();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getSearch() {
        $geocoding = new Geocoding();
        $geocoding->generate($this->baseSearch);
        $output = $geocoding->getSearch();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getUrl() {
        $geocoding = new Geocoding();
        $geocoding->generate($this->baseSearch);
        $output = $geocoding->getUrl();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getRequest() {
        $geocoding = new Geocoding();
        $geocoding->generate($this->baseSearch);
        $output = $geocoding->getRequest();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }

    public function test_Geocoding_getCoordinates() {
        $geocoding = new Geocoding();
        $geocoding->generate($this->baseSearch);
        $output = $geocoding->getCoordinates();
        $this->assertNotEmpty($output);
        sleep($this->time);
    }
}
