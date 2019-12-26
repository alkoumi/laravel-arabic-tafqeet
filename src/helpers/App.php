<?php


namespace Alkoumi\LaravelArabicTafqeet\Helpers;


trait App
{
    public function runBeforeComma()
    {
        $class = $this->detectClass($this->before_comma_len);
        $methodName = 'Class'.$class;

        if (method_exists($this, $methodName))
        {
            return $this->$methodName($this->before_comma_array, $this->before_comma_len);
        }

        return 'عفوا هذا الرقم خارج نطاقنا حاليا حاول لاحقاً';
    }

    public function runAfterComma()
    {
        $class =  $this->detectClass($this->after_comma_len);
        $methodName = 'Class' . $class;
        if(method_exists($this,$methodName))
        {
            return $this->$methodName($this->after_comma_array,$this->after_comma_len);
        }
        return 'عفوا هذا الرقم خارج نطاقنا حاليا حاول لاحقاً';
    }

    public function detectClass($len)
    {
        if($len == 1)
                return "A";


        if($len == 2)
            return "B";


        if($len == 3)
            return "C";


        if($len == 4)
            return "D";


        if($len == 5)
            return "E";

        if($len == 6)
            return "F";

        if($len == 7)
            return "G";

        if($len == 8)
            return "H";

        if($len == 9)
            return "I";

    }
}