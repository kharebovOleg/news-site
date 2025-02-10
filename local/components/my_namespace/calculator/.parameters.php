<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    $arComponentParameters = array(
        "PARAMETERS" => array(
            "FIRST" => array(
                "PARENT" => "BASE",
                "NAME" => "Operand 1",
                "TYPE" => "FILE",
                "DEFAULT" => ""
            ),
            "SECOND" => array(
                "PARENT" => "BASE",
                "NAME" => "Operand 2",
                "TYPE" => "STRING",
                "DEFAULT" => null
            ),

            "OPERATOR" => array(
                "PARENT" => "BASE",
                "NAME" => "operator",
                "TYPE" => "STRING",
                "DEFAULT" => null
            )
        )
    );
?>