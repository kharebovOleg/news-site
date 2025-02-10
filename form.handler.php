<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$nameErr = $phoneErr = "";
$name = $_POST['name'];
$phone = $_POST['phone'];
    

if($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Валидация имени пользователя
    if(empty($name)) {
        $nameErr = "Пожалуйста, введите ваше имя.";
        echo $nameErr;
    } else {
        if(!validateName($name)){
            $nameErr = "Пожалуйста, введите верное имя.";
            echo $nameErr;
        }
    }
    
    // Валидация телефона
    if (empty($phone)) {
        $phoneErr = "Пожалуйста, введите номер телефона.";
        echo $phoneErr;
    } else {
        if(!validatePhone($phone)) {
            $phoneErr = "Пожалуйста, введите действительный номер телефона.";
            echo $phoneErr;
        }
    }
    
    // Проверяем ошибки ввода перед отправкой электронной почты
    if(empty($nameErr) && empty($phoneErr)) {
        // добавление инфоблока
        CModule::IncludeModule('iblock');
        $elem = new CIBlockElement;

        $fields = [
            "IBLOCK_ID" => 4,
            "NAME" => $name,
            "ACTIVE" => "Y",
            "PROPERTY_VALUES" => [
                "NAME" => $name,
                "PHONE" => $phone
            ]
        ];

        if ($elementId = $elem->Add($fields)) {
            echo "Форма успешно отправлена: ID =  ".$elementId;
        } else {
            echo "Ошибка: ".$el->LAST_ERROR;
        }

    }
}

function validatePhone($phone)
{
    return true; //preg_match('/^[0-9]+$/', $phone);
}

function validateName($name)
{
    if (preg_match("/^[А-Яа-яa-zA-Z'. -]+$/", $name)) {
        return true;
    }
    return false;
}