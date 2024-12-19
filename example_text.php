<!-- JESUS IS LORD FOREVER -->
<!-- <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        li { cursor: pointer; }
    </style>
</head>

<body class="emerald-active">
    <ul class="ulist">
        <li class="link" page-name="draw.html">Home</li>
        <li class="link" page-name="images.html">Images</li>
        <li class="link" page-name="resizing-objects/long_pressing.html">Glory</li>
        <li onclick="newDoc()">My life is to your glory, Beloved Father</li>
    </ul>

    <div>
        <h1>JESUS LOVES ME</h1>
    </div>
  <script src="emerald-load.js"></script>
</body>

</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Fetch Webpage Source Code</title>
<!-- Ensure that selenium-webdriver library is properly loaded -->
<script src="https://unpkg.com/selenium-webdriver"></script>
</head>
<body>

<textarea id="sourceCode" rows="20" cols="80"></textarea><br>
<button onclick="fetchSourceCode()">Fetch Source Code</button>


<script>
   
   
   
async function fetchSourceCode() {
    if (typeof window['selenium-webdriver'] !== 'undefined') {
        console.log('Selenium WebDriverJS library loaded successfully.');

        const { Builder } = window['selenium-webdriver'];

        let driver = await new Builder().forBrowser('chrome').build();

        try {
            await driver.get('https://www.youtube.com'); // Replace with the desired URL

            let sourceCode = await driver.getPageSource();
            document.getElementById('sourceCode').value = sourceCode;
        } catch (error) {
            console.error('There was a problem fetching the source code:', error);
        } finally {
            await driver.quit();
        }
    } else {
        console.error('Selenium WebDriverJS library is not loaded properly.');
    }
}
</script>

</body>
</html>



<?php
// $url = "https://web.facebook.com/"; // Replace with the desired URL

// // Initialize cURL session
// $curl = curl_init();

// // Set cURL options
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// // Set cURL timeout (e.g., 10 seconds)
// curl_setopt($curl, CURLOPT_TIMEOUT, 10);

// // Enable compression
// curl_setopt($curl, CURLOPT_ENCODING, '');

// // Execute cURL request
// $response = curl_exec($curl);

// // Check for errors
// if($response === false) {
//     echo "Error fetching content: " . curl_error($curl);
// } else {
//     // Escape HTML characters in the fetched content
//     $escapedResponse = htmlspecialchars($response);
    
//     // Output the escaped fetched content
//     echo "<pre>" . $escapedResponse . "</pre>";
// }

// // Close cURL session
// curl_close($curl);
?>
