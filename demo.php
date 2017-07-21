<?php


namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Firefox\FirefoxProfile;
use Facebook\WebDriver\Firefox\FirefoxDriver; 
use Facebook\WebDriver\Remote\LocalFileDetector; 
require_once('vendor/autoload.php');

$browser_name  = $_POST['browser_name'];

if($browser_name == 'chrome')
{
  $host = 'http://localhost:4444/wd/hub'; // this is the default
  $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
  $driver->manage()->deleteAllCookies();
  $driver->manage()->addCookie([
        'name' => 'cookie_name',
        'value' => 'cookie_value',
    ]);
  $cookies = $driver->manage()->getCookies();
}
elseif($browser_name == 'firefox')
{
    $url = 'http://localhost:4444/wd/hub'; // this is the default
    $driver = RemoteWebDriver::create($url, DesiredCapabilities::firefox());
    $driver->manage()->deleteAllCookies();
    $driver->manage()->addCookie([
        'name' => 'cookie_name',
        'value' => 'cookie_value',
    ]);
    $cookies = $driver->manage()->getCookies();
    sleep(2);
}
else
{
  $json = array("status" => 0, "msg" => "enter valid browser name"); 
  echo json_encode($json);
}
    $driver->get('https://google.com');
    
    
    
