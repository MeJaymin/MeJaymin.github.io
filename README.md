<h2>Introduction to Selenium.</h2>

This is a demo script in a REST API format to open a browser, chrome and firefox both. You need to pass the name and key as browser_name = "chrome"/"firefox" (Without braces).

There are certain versions defined by testing all I have came up with <b>Selenium version 2.53</b> and <b>Firefox browser version upto 35</b> and
 <b>Chrome browser version >= 58.0.3029.0 and ChromeDriver 2.30.477691.</b>

You need to download the php webdriver by facebook as it is compatible with both Firefox and chrome functionality.

Here are the links for all:

1. Selenium jar file(s)  - http://selenium-release.storage.googleapis.com/index.htm

2. Chrome Driver - http://chromedriver.storage.googleapis.com/index.html

<h3>How to Install PHP facebook webdriver using Composer</h3>

Installation is possible using <a href="https://getcomposer.org/">Composer</a>.

If you don't already use Composer, you can download the composer.phar binary:

<code>curl -sS https://getcomposer.org/installer | php </code>

Then install the library:

<code>php composer.phar require facebook/webdriver </code>


To run the script follow the below steps:

<ul>
<li><h4><b>Firefox :</b></h4></li>


For firefox download and run selenium jar file, replacing # with the current server version.

<code> java -jar selenium-server-standalone-#.jar </code>

Then when you create a session, be sure to pass the url to where your server is running.

<code>
// This would be the url of the host running the server-standalone.jar

$host = 'http://localhost:4444/wd/hub'; // this is the default 
</code>

Launching Firefox

<code>
$driver = RemoteWebDriver::create($host, DesiredCapabilities::firefox());
</code>

<li><h4><b>Chrome :</b></h4></li>

For Chrome it's a bit typical, you need chrome driver to be in same folder with selenium .jar. By this you don't need to run chrome.exe individually. It will run although with Selenium.

<code> java -jar selenium-server-standalone-#.jar </code>

Then when you create a session, be sure to pass the url to where your server is running.

<code>
// This would be the url of the host running the server-standalone.jar

$host = 'http://localhost:4444/wd/hub'; // this is the default 
</code>

Launching Chrome

<code>
$driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
</code>


