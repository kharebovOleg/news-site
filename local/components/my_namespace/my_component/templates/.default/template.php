<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <h2>Professional skills</h2>
    <?foreach($arResult["SKILLS"] as $key => $skill):?>
        <p class="my-component" style="color:red"><?=$skill?><span>   <?=$arResult["SKILLS_PER"][$key]?></span></p>
    <?endforeach;?>
