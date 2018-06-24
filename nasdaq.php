<?php

    // enter your api key here
    //you can get yours at https://www.alphavantage.co/support/#api-key
    $apikey = "";
    unset($argv[0]);
    
    if(!empty($argv)){
        $stock_url = "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=" . $argv[1] . "&interval=60min&apikey=" . $apikey;
        // getting json contents from the address
        $stock_json = file_get_contents($stock_url);
        // turning it into an array
        $stock_array = json_decode($stock_json, true);
        
        // if the form has been submitted and not empty...
        if(!empty($argv[1])) {
            // ...but there's an error message key in the array...
            if (!empty($stock_array['Error Message'])) {
                // ... output an error message with the symbol sent by a user.
                $result_price = "No data for stock symbol: {$argv[1]}";
                echo $result_price;
            
            // ... in a good-case scenario...
            } else {
                // ... check when there was the last refreshing of data needed...
                $cur_time_raw = $stock_array['Meta Data']["3. Last Refreshed"];
                // ...in case if there is more than just a date, but also time specified, clear that out using regex
                preg_match('/\d{4}-\d{2}-\d{2}/', $cur_time_raw, $matches);
                $cur_time = $matches[0];
                // ...use that date to address the latest stock price and output it.
                $result_price = round($stock_array['Time Series (Daily)']["$cur_time"]['4. close'], 2);
                echo "Current stock price: $$result_price";
                
            }
        // in case if the form was empty when submitted, output the warning
        }
    } else {
        $error_no_entry = "No stock symbol given";
        echo $error_no_entry;
    }
