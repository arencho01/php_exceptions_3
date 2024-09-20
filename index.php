<?php

//assert(true);
//assert(false);

//Написать функцию customthrow(int $i) которая бросает исключение \Exception если $i меньше 6.
//Написать свою реализацию функции assertException (стандартными средствами языка php),
//которая будет проверять что вызывается исключение. Вызов функции может выглядеть так:
//assertException(
//    \Exception::class,
//    function ()
//    {
//        customthrow(2);
//    };
//)



function customthrow(int $i)
{
    if($i < 6)
    {
        throw new Exception('Значение меньше 6-ти!');
    }
}


function assertException($someClass, $someFunc)
{
    try {
        $someFunc();
    } catch (\Throwable $e) {
        if (get_class($e) === $someClass)
        {
            echo 'Исключение было вызвано!<br>';
        }
        else {
            echo 'Исключение НЕ было вызвано';
        }
        return;
    }
    echo 'Исключение НЕ было вызвано<br>';
}



assertException(
    \Exception::class,
    function()
    {
        customthrow(2);
    }
);

assertException(
    \Exception::class,
    function()
    {
        customthrow(10);
    }
);