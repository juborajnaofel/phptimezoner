# phptimezoner
When you are working with different timezones, you may store time in user's timezone store them in UTC and later retrieve again. This is how you could do that.


Usage syntax
```php
$timeZoner = TimeZoner::get();

$utc = $timeZoner->anyToUTC('Asia/Dhaka', '2023-10-1 1:00:00', $outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = true);

$timeZoner->fromUTCtoAny('Asia/Dhaka', $utc, $outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = true);

$timeZoner->currentUTC($outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = true);

$timeZoner->currentAny('Asia/Dhaka',$outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = true);
```
