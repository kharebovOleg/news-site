<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

    $arComponentParameters = array(
        "PARAMETERS" => array(
            "FILE" => array(
                "PARENT" => "BASE",
                "NAME" => "picture",
                "TYPE" => "FILE",
                "FD_EXT" => "png,gif,jpg, jpeg",
                "FD_UPLOAD" => true,
                "FD_USE_MEDIALIB" => true,
                "FD_MEDIALIB_TYPES" => array(
                    "image",
                ),
                "DEFAULT" => ""
            ),
            "SKILLS" => array(
                "PARENT" => "BASE",
                "NAME" => "skill",
                "TYPE" => "STRING",
                "MULTIPLE" => "Y",
                "ADDITIONAL_VALUES" => "Y",
                "DEFAULT" => null
            ),

            "SKILLS_PER" => array(
                "PARENT" => "BASE",
                "NAME" => "skill_percent",
                "TYPE" => "STRING",
                "MULTIPLE" => "Y",
                "ADDITIONAL_VALUES" => "Y",
                "DEFAULT" => null
            )
        ),
    );
?>