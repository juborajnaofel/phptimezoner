<?php
    class TimeZoner{
        private static $instance;

        private function __construct() {}

        public static function get() {
            if (!isset(self::$instance)) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        public function anyToUTC($fromTimezone, $dateTime, $outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = false){
            // $fromTimezone "America/New_York";
            $original_timezone = new DateTimeZone($fromTimezone);

            // $dateTime = '2024-02-05 10:30:00';
            $original_datetime = new DateTime($dateTime, $original_timezone);
            $original_datetime->setTimezone(new DateTimeZone('UTC'));


            if($formateIndex !== null && (is_numeric($formateIndex) && $formateIndex >= 0 && $formateIndex <= 19)){
                $utc_datetime = $original_datetime->format($this->getFormate()[$formateIndex]);
            }else{
                $utc_datetime = $original_datetime->format($outputFormate);
            }
            
            if($show){
                echo "UTC Datetime: " . $utc_datetime.'<br>';
            }
            
            return $utc_datetime;
        }


        public function fromUTCtoAny($toTimezone, $dateTime, $outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = false){
            $fromTimezone = "UTC";
            $original_timezone = new DateTimeZone($fromTimezone);
            
            // $dateTime = '2024-02-05 10:30:00';
            $original_datetime = new DateTime($dateTime, $original_timezone);
            $original_datetime->setTimezone(new DateTimeZone($toTimezone));

            if($formateIndex !== null && (is_numeric($formateIndex) && $formateIndex >= 0 && $formateIndex <= 19)){
                $toDatetime = $original_datetime->format($this->getFormate()[$formateIndex]);
            }else{
                $toDatetime = $original_datetime->format($outputFormate);
            }
            if($show){
                echo "Datetime: " . $toDatetime.'<br>';
            }
            return $toDatetime;
        }



        public function currentUTC($outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = false){
            $original_timezone = new DateTimeZone('UTC');
            $original_datetime = new DateTime('now', $original_timezone);

            if($formateIndex !== null && (is_numeric($formateIndex) && $formateIndex >= 0 && $formateIndex <= 19)){
                $utc_datetime = $original_datetime->format($this->getFormate()[$formateIndex]);
            }else{
                $utc_datetime = $original_datetime->format($outputFormate);
            }

            if($show){
                echo "Current UTC Datetime: " . $utc_datetime.'<br>';
            }
            
            return $utc_datetime;
        }


        public function currentAny($toTimezone, $outputFormate = 'Y-m-d H:i:s', $formateIndex = null, $show = false){
            $fromTimezone = "UTC";
            $original_timezone = new DateTimeZone($fromTimezone);
            
            // $dateTime = '2024-02-05 10:30:00';
            $original_datetime = new DateTime('now', $original_timezone);
            $original_datetime->setTimezone(new DateTimeZone($toTimezone));

            if($formateIndex !== null && (is_numeric($formateIndex) && $formateIndex >= 0 && $formateIndex <= 19)){
                $toDatetime = $original_datetime->format($this->getFormate()[$formateIndex]);
            }else{
                $toDatetime = $original_datetime->format($outputFormate);
            }

            if($show){
                echo "Current Datetime: " . $toDatetime.'<br>';
            }
            
            return $toDatetime;
        }



        private function getFormate(){
            return array(
                'Y-m-d H:i:s',
                'Y-m-d',
                'H:i:s',
                'Y-m-d H:i',
                'd/m/Y',
                'm/d/Y',
                'D, M jS Y',
                'l, F jS Y',
                'jS F Y',
                'Y/m/d',
                'd-M-Y',
                'l, M jS, Y',
                'Y-m-d \a\t H:i',
                'D M j Y g:iA',
                'jS M Y, g:iA',
                'l, jS \of F Y',
                'D, j M Y g:i:s A',
                'D, d M Y H:i:s T',
                'D, j M Y H:i:s e',
            );
        }

        
    }
?>
