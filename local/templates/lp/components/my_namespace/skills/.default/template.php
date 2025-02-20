<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<fieldset style="width: 200px">
    <legend>Способности</legend>
    <?foreach($arResult["SKILLS"] as $key => $skill):?>
        <p class="my-component" style="color:blue"><?=$skill?>: <span><?=$arResult["SKILLS_PER"][$key]?></span></p>
    <?endforeach;?>
</fieldset>
    
