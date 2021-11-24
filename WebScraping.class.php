<?php
class WebScraping
{

public $url;
public $source;

// Construct method
function __construct($url) {

$this->url = $url;

//passing the url to function
$this->source = $this->getCurl($this->url);

// passing the return value from getCurl function
$this->pathObj= $this->getXPathObj($this->source);
}

// Method for a GET request using cURL
public function getCurl($url) {

// Initialising cURL session
$ch = curl_init();

// Returning string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

// Setting URL
curl_setopt($ch, CURLOPT_URL, $url);

// Executing cURL
$results = curl_exec($ch);

// Closing cURL
curl_close($ch);

return $results;
}



public function getXPathObj($item) {

// Instantiating a new DomDocument object
$xmlPageDom = new DomDocument();

// Loading the HTML from downloaded page
@$xmlPageDom->loadHTML($item);

$xmlPageXPath = new DOMXPath($xmlPageDom);


return $xmlPageXPath; //get xpath
}


}
?>
