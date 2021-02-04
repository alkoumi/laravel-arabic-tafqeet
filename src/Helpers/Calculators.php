<?php


namespace Alkoumi\LaravelArabicTafqeet\Helpers;


trait Calculators
{
    use Digit;

    public function classA($arr,$len = 1)
    {
        return $this->ones[$arr[0]];
    }

    public function classB($arr,$len = 2)
    {
        if($this->before_comma_len >= 2)
        {
            $ten_number_index = $this->before_comma_len - 2;
            $single_number_index = $this->before_comma_len - 1;
            $detecd_array = [
                $this->before_comma_array[$ten_number_index]
                ,
                $this->before_comma_array[$single_number_index]
            ];
            if($arr==$detecd_array)
            {
                if($arr[0]==0 and $arr[1]>=1 and $arr[1]<=10)
                    $this->is_main1_currency = true;
                elseif($arr[0]>=1 and $arr[1]>=1 and $arr[1]<=9)
                    $this->is_main1_currency = false;
                elseif($arr[0]>=2)
                    $this->is_main1_currency = false;
            }




        }



        if($arr[0]==0 and $arr[1]==0)
            return '';



        if($arr[0]==0)
            return $this->ones[$arr[1]];



        if($arr[0]==1 and $arr[1]==1)
            return $this->ones[11];


        if($arr[0]==1 and $arr[1]==0)
            return $this->ones[10];



        if($arr[1]==0)
           return $this->tens[$arr[0]];



        if($arr[0]>1)
            return $this->ones[$arr[1]] . $this->config['connection_tool'] . $this->tens[$arr[0]];

        if(in_array($arr[1],[1,2]))
             return $this->others[$arr[1]] . ' ' . $this->tens[$arr[0]];

        return $this->ones[$arr[1]] . ' ' . $this->tens[$arr[0]];
    }

    public function classC($arr,$len = 3)
    {
        if($arr[0]==0 and $arr[1] == 0 and $arr[2] == 0)
            return '';

        if($arr[0]==0 and $arr[1] == 0)
            return $this->ones[$arr[2]];

        if($arr[0]==0)
            return $this->classB([$arr[1],$arr[2]]);

        if($arr[2] == 0 and $arr[1] == 0)
            return $this->hundreds[$arr[0]];

        if($arr[1]!=0)
            return $this->hundreds[$arr[0]] . $this->config['connection_tool']  . $this->classB([$arr[1],$arr[2]]);

            //return $this->hundreds[$arr[0]] . $this->config['connection_tool'] . $this->classA([$arr[2]]);
    }

    public function classD($arr,$len = 4)
    {
        $classC = [$arr[1],$arr[2],$arr[3]];

        if($arr[0]<=2)
            $thousands = $this->thousands[$arr[0]] ;
        else
            $thousands = $this->ones[$arr[0]] . ' ' . $this->thousands['39'];


        if($arr[1] == 0 and $arr[2] == 0 and $arr[3] == 0)
             return $thousands;

        return $thousands . $this->config['connection_tool'] . $this->classC($classC);
    }

    public function classE($arr,$len = 5)
    {
        $classC = [$arr[2],$arr[3],$arr[4]];

        if($arr[0] != 0)
        {
            $conn = ' ';

            if($arr[1]>=2 and $arr[0]>1)
            {
                $conn = $this->config['connection_tool'];
            }

            if(in_array($arr[1],[2,1]))
                $thousands =  $this->others[$arr[1]]  . $conn . $this->tens[$arr[0]] ;
            else
                $thousands =  $this->ones[$arr[1]]  . $conn . $this->tens[$arr[0]] ;

            if($arr[1] == 0)
            {
                if($arr[0]==1)
                {
                    $thousands =  $this->ones[10] ;
                    $thousands.=' ' . $this->thousands[39];
                }else
                {
                    $thousands =  $this->tens[$arr[0]] ;
                    $thousands.=' ' . $this->thousands[1];
                }

            }else{
                if($arr[2] == 0 and $arr[3] == 0 and $arr[4] == 0)
                {
                    $thousands.=' ' . $this->thousands[1];
                }else
                {
                    $thousands.=' ' . $this->thousands[1199];
                }

            }

        }else
        {
            if(in_array($arr[1],[2,1]))
                $thousands =  $this->others[$arr[1]]  . ' '  ;
            else
                $thousands =  $this->ones[$arr[1]]  . ' ' ;


            if($arr[1] == 0)
            {
                //dd($arr[1]);
                //dd($arr[2]);
                $thousands =  $this->tens[$arr[2]] ;
            }

            $thousands.=' ' . $this->thousands[39];
        }
        if($this->classC($classC) != '' )
        {
            return $thousands . $this->config['connection_tool'] . $this->classC($classC);
        }
        return $thousands;
    }

    public function classF($arr,$len = 6) //100 000
    {
        $classC = [$arr[3],$arr[4],$arr[5]];
        if($arr[0]!=0)
        {
            if($arr[1] == 0 && $arr[2]==0)
            {
              $thousands =  $this->hundreds[$arr[0]] .' '. $this->thousands[1];
            }else{
                if($arr[1] == 0 )
                {
                    $thousands =  $this->hundreds[$arr[0]] .$this->config['connection_tool'].
                        $this->ones[$arr[2]]  . ' '. $this->thousands[1];
                }elseif($arr[2] == 0)
                {
                    if($arr[3] == 0 and $arr[4] == 0 and $arr[5] == 0)
                    {

                        $thousands =  $this->hundreds[$arr[0]] .$this->config['connection_tool'].
                            $this->tens[$arr[1]]  . ' '. $this->thousands[1];

                    }else
                    {
                        $thousands =  $this->hundreds[$arr[0]] .$this->config['connection_tool'].
                            $this->tens[$arr[1]]  . ' '. $this->thousands[1199];
                    }
                }
                else
                {
//                    $thousands_lang = $this->thousands[1199];
                    if($arr[1]==0 and $arr[2]>=1 and $arr[1]<=10)
                        $thousands_lang = $this->thousands[1];
                    elseif($arr[1]>=1 and $arr[2]>=1 and $arr[1]<=9)
                        $thousands_lang = $this->thousands[1199];
                    elseif($arr[1]>=2)
                        $thousands_lang = $this->thousands[1199];


                    $thousands = $this->classC([$arr[0],$arr[1],$arr[2]],3) . ' '. $thousands_lang;

                }
            }

        }else
        {
           return $this->classE([$arr[1],$arr[2],$arr[3],$arr[4],$arr[5]]);
        }

        if($this->classC($classC)!='')
                return $thousands . $this->config['connection_tool'] . $this->classC($classC);
        return $thousands;
    }

    public function classG($arr,$len = 7) //1 000 000
    {
        //dd($arr,$len);
        $classC = [$arr[4],$arr[5],$arr[6]];
        //$classC = [$arr[1],$arr[2],$arr[3]];
        //$classE = [$arr[1],$arr[2],$arr[3],$arr[4],$arr[5],$arr[6]];

        if($arr[0]<=2)
            $million = $this->millions[$arr[0]] ;
        else
            $million = $this->ones[$arr[0]] . ' ' . $this->millions['39'];

        if($this->classC($classC)!='')
            return $million . $this->config['connection_tool'] . $this->classC($classC);
        return $million;
    }

    public function classH($arr,$len = 8)
    {
        //dd($arr,$len);
        $classF = [$arr[2],$arr[3],$arr[4],$arr[5],$arr[6],$arr[7]];
        //$classC = [$arr[1],$arr[2],$arr[3]];

        if($arr[0] != 0)
        {
            $conn = ' ';

            if($arr[1]>=2 and $arr[0]>1)
            {
                $conn = $this->config['connection_tool'];
            }

            if(in_array($arr[1],[2,1]))
                $million =  $this->others[$arr[1]]  . $conn . $this->tens[$arr[0]] ;
            else
                $million =  $this->ones[$arr[1]]  . $conn . $this->tens[$arr[0]] ;

            if($arr[1] == 0)
            {
                if($arr[0]==1)
                {
                    $million =  $this->ones[10] ;
                    $million.=' ' . $this->millions[39];
                }else
                {
                    $million =  $this->tens[$arr[0]] ;
                    $million.=' ' . $this->millions[1];
                }

            }else{
                if($arr[2] == 0 and $arr[3] == 0 and $arr[4] == 0)
                {
                    $million.=' ' . $this->millions[1];
                }else
                {
                    $million.=' ' . $this->millions[1199];
                }

            }

        }else
        {
            if(in_array($arr[1],[2,1]))
                $million =  $this->others[$arr[1]]  . ' '  ;
            else
                $million =  $this->ones[$arr[1]]  . ' ' ;


            if($arr[1] == 0)
            {
                $million =  $this->tens[$arr[2]] ;
            }

            $million.=' ' . $this->millions[39];
        }
//        if(in_array($arr[1],[2]))
//            $million =  $this->others[$arr[1]]  . $this->config['connection_tool'] . $this->tens[$arr[0]] ;
//        else
//            $million =  $this->ones[$arr[1]]  . $this->config['connection_tool'] . $this->tens[$arr[0]] ;

        //$million =  $this->ones[$arr[1]]  . $this->config['connection_tool'] . $this->tens[$arr[0]] ;

//        if($arr[1] == 0)
//        {
//            $million =  $this->tens[$arr[0]] ;
//        }

        //$million.=' ' . $this->millions[1199];

        return $million . $this->config['connection_tool'] . $this->classC($classF);
    }

    public function classI($arr,$len = 9)
    {
        $classF = [$arr[3],$arr[4],$arr[5],$arr[6],$arr[7],$arr[8]];


        if(in_array($arr[1],[2]))
            $million =  $this->others[$arr[1]]  . $this->config['connection_tool'] . $this->tens[$arr[0]] ;
        else
            $million =  $this->ones[$arr[1]]  . $this->config['connection_tool'] . $this->tens[$arr[0]] ;


        if($arr[1] == 0)
        {
            $million =  $this->tens[$arr[0]] ;
        }


        $million.=' ' . $this->millions[1199];


        return $million . $this->config['connection_tool'] . $this->classF($classF);

    }

}



