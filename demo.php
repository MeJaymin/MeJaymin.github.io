<?php


namespace Facebook\WebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Firefox\FirefoxProfile;
use Facebook\WebDriver\Firefox\FirefoxDriver; 
use Facebook\WebDriver\Remote\LocalFileDetector; 
require_once('vendor/autoload.php');

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

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
    //naishadhchovatiya, marmik_6598
}
else
{
  $json = array("status" => 0, "msg" => "enter valid browser name"); 
  echo json_encode($json);
}
    $driver->get('https://manage.mylimobiz.com/admin/login.asp');
    sleep(2);
    $companyid = $driver->findElement(
    WebDriverBy::name('companyid')
    );
    $companyid->sendKeys('myprivatedriver');
    $username = $driver->findElement(
    WebDriverBy::name('username')
    );
    $username->sendKeys('Johnm');
    $password = $driver->findElement(
      WebDriverBy::name('password')
    );
    $password->sendKeys('Test123#')->submit();
    sleep(5);
    
    $new_reservation = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="header"]/form/div[1]/span[2]/a')
    );
    $new_reservation->click();
    sleep(2);
    $standard_reservation = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="header"]/form/ul/li[1]/a')
    );
    $standard_reservation->click();
    sleep(2);
    /*$driver->get('https://manage.mylimobiz.com/admin/manageRes.asp?action=showResForm&tripCode=aFvh8LK886Y71YO&idTrip=62691673&status=new');
    sleep(2);*/

    //Billing Contact
    $billing_contact = $driver->findElement(
      WebDriverBy::name('contName')
    );
    $billing_contact->sendKeys('Test Jaymin');
    //Booked by First
    $booked_fname = $driver->findElement(
      WebDriverBy::name('bookedFName')
    );
    $booked_fname->sendKeys('Test');
    //Booked by Last
    $booked_lname = $driver->findElement(
      WebDriverBy::name('bookedLName')
    );
    $booked_lname->sendKeys('Jaymin');
    sleep(3);
    //input[@class='ipp-number']
    $booked_phone = $driver->findElement(
      WebDriverBy::xpath('//input[@class="ipp-number"]')
    );
    $booked_phone->sendKeys('+918460629514');
    sleep(2);
    $booked_email = $driver->findElement(
      WebDriverBy::xpath('//input[@name="bookedContEmail"]')
    );
    $booked_email->sendKeys('testdemo@gmail.com');
    sleep(2);
    
    $passenger_fname = $driver->findElement(
      WebDriverBy::xpath('//input[@name="passFName"]')
    );
    $passenger_fname->sendKeys('Test');
    sleep(2);
    $passenger_lname = $driver->findElement(
      WebDriverBy::xpath('//input[@name="passLName"]')
    );
    $passenger_lname->sendKeys('Jaymin');
    sleep(2);
    $passenger_email = $driver->findElement(
      WebDriverBy::xpath('//input[@name="passEmail"]')
    );
    $passenger_email->sendKeys('passenger@pass.com');
    
    sleep(2);
    $additional_passenger = $driver->findElement(
      WebDriverBy::xpath('//b[contains(.,"Additional Passengers ")]')
    );
    sleep(3);
    if($additional_passenger->click())
    {
      sleep(2);
      $extra_passenger_fname = $driver->findElement(
      WebDriverBy::xpath('//input[@id="addPaxFirstName"]')
      );
      $extra_passenger_fname->sendKeys('extra');
      sleep(1);
      $extra_passenger_lname = $driver->findElement(
        WebDriverBy::xpath('//input[@id="addPaxLastName"]')
      );
      $extra_passenger_lname->sendKeys('passenger');
      sleep(2);
      $extra_passenger_email = $driver->findElement(
        WebDriverBy::xpath('//input[@id="addPaxEmail"]')
      );
      $extra_passenger_email->sendKeys('extrapassenger@pass.com');
      sleep(1);
      $add_passenger = $driver->findElement(
        WebDriverBy::xpath('//input[@name="submitAddPax"]')
      );
      $add_passenger->click();
    }
    
    sleep(2);
    $pu_date = $driver->findElement(
      WebDriverBy::xpath('//input[@id="tripPUDate"]')
    );
    $pu_date->click();
    $pu_date->sendKeys('07/18/2017');
    $pu_date_picker_done = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="ui-datepicker-div"]/div[2]/button[2]')
    );
    $pu_date_picker_done->click();
    sleep(1);
    $pu_time = $driver->findElement(
      WebDriverBy::xpath('//input[@id="tripPUTime"]')
    );
    $pu_time->sendKeys('13:30');
    sleep(1);
    $do_time = $driver->findElement(
      WebDriverBy::xpath('//input[@id="tripDOTime"]')
    );
    $do_time->sendKeys('14:30');
    //Click on Airport
    sleep(2);
    $airport_tab = $driver->findElement(
          WebDriverBy::xpath('.//*[@id="routingTabs"]/tbody/tr/td[2]')    
    );

    $airport_tab->click();
    sleep(2);
    $airport_code = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="tripRtAddr1"]')
    );
    $airport_code->sendKeys('DAL');
    
    $airport_name = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="tripRtName"]')
    );
    $airport_name->sendKeys('Dallas Love Field Airport');
    
    $airline_code = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="tripRtMisc2"]')
    );
    $airline_code->sendKeys('EK');
    $airline_name = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="tripRtMisc1"]')
    );
    $airline_name->sendKeys('Emirates');
    
    $flight_no = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="tripRtMisc3"]')
    );
    $flight_no->sendKeys('221');
    sleep(2);
    /*$pick_up = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="AutoNumber31"]/tbody/tr/td[1]/input')
    );
    $pick_up->click();
    sleep(2);*/
    
    /*$drop_off = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="addr_tripRtType"]/tbody/tr/td[1]/input')
    );*/

    $payment_status = new WebDriverSelect($driver->findElement(WebDriverBy::xpath('.//*[@id="AutoNumber22"]/tbody/tr[3]/td[2]/font/b/select')));
    $payment_status->selectByValue('DON');
    
    $service_id = 1;
    $service_type = new WebDriverSelect($driver->findElement(WebDriverBy::xpath('.//*[@id="svcCodeList"]')));
    if($service_id == 2)
    {
      $service_type->selectByValue('AirArrival');
    }
    else
    {
      $service_type->selectByValue('AirDepart');
    }
    $vehicle_id = 1;
    $vehicle_type = new WebDriverSelect($driver->findElement(WebDriverBy::xpath('.//*[@id="tripVehTypeList"]')));
    if($vehicle_id == 1)
    {
      $vehicle_type->selectByValue('TC-AUS||');
    }
    else
    {
      $vehicle_type->selectByValue('TC-SAT||');
    }
    /*$primary_tab = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="rateTabs"]/td/div[1]')
    );
    $primary_tab->click();
    $primary_tab = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="rateTabs"]/td/div[1]')
    );
    
    $secondary_tab = $driver->findElement(
      WebDriverBy::xpath('.//*[@id="rateTabs"]/td/div[2]')
    );*/
    /*$hour_mile_flag = 1
    //hour 0 
    //mile 1
    if($hour_mile_flag == 1)
    {
      $secondary_tab->click();
    }
    else
    {
      $primary_tab->click();  
    }*/
    
    
    


    
    