<?
/*
* Файл tempelate.php компонента стандартная страница поиска
*/
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<section>
	<div class="inner search_detail">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?// форма для поиска?>
					<form action="" method="get">
						<div class="row">
							<div class="col-12 col-md-6 mb-4">
								<?// поисковые подсказки?>
								<?if($arParams["USE_SUGGEST"] === "Y"):
								if(mb_strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
								{
									$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
									$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
									$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
								}
								?>
								<?// строка поиска?>
								<?$APPLICATION->IncludeComponent(
								"bitrix:search.suggest.input",
								"",
								array(
								"NAME" => "q",
								"VALUE" => $arResult["REQUEST"]["~QUERY"],
								"FILTER_MD5" => $arResult["FILTER_MD5"],
								),
								$component, array("HIDE_ICONS" => "Y")
								);?>
								<?else:?>
									<input class="search-suggest" type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" />
								<?endif;?>
							</div>
							<div class="col-12 col-md-3 mb-4">
								<div class="select-wrapper">
									<?// где искать?>
									<?if($arParams["SHOW_WHERE"]):?>
									<select name="where">
										<option value="">Выберете раздел</option>
										<?foreach($arResult["DROPDOWN"] as $key=>$value):?>
										<option value="<?=$key?>"<?if($arResult["REQUEST"]["WHERE"]==$key) echo "
										selected"?>><?=$value?></option>
										<?endforeach?>
									</select>
									<?endif;?>
									<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
									<?if($arParams["SHOW_WHEN"]):?>
									<script>
										var switch_search_params = function()
										{
											var sp = document.getElementById('search_params');
											var flag;
											var i;
											if(sp.style.display == 'none')
											{
												flag = false;
												sp.style.display = 'block'
											}
											else
											{
												flag = true;
												sp.style.display = 'none';
											}
											var from = document.getElementsByName('from');
											for(i = 0; i < from.length; i++)
												if(from[i].type.toLowerCase() == 'text')
													from[i].disabled = flag;
													var to = document.getElementsByName('to');
											for(i = 0; i < to.length; i++)
												if(to[i].type.toLowerCase() == 'text')
													to[i].disabled = flag;
											return false;
										}
									</script>
									<a class="search-page-params" href="#" onclick="return switch_search_params()"><?echo
									GetMessage('CT_BSP_ADDITIONAL_PARAMS')?></a>
									<div id="search_params" class="search-page-params" style="display:<?echo $arResult["REQUEST"]["FROM"] ||
									$arResult["REQUEST"]["TO"]? 'block': 'none'?>"></div>
									<?endif?>
								</div>
							</div>
							<?// кнопка отправить?>
							<div class="col-12 col-md-3 d-flex mb-4">
								<input class="btn" type="submit" value="<?=GetMessage("SEARCH_GO")?>"/>
							</div>
						</div>
					</form>
				</div>
				<?// блок ответов?>
				<?php if (count($arResult["SEARCH"]) > 0): /* если что-то найдено */ ?>
				<?php if ($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]; /* постраничная навигация вверху */
				?>
				<?php foreach($arResult["SEARCH"] as $arItem): ?>
				<div class="col-12">
					<div class="item">
						<div class="title">
							<a href="<?=$arItem["URL"];?>"><?=$arItem["TITLE_FORMATED"];?></a>
						</div>
						<div class="title_sub">
							Раздел - <?=$arItem["~PARAM1"];?>
						</div>
						<div class="tekst">
							<?=$arItem["BODY_FORMATED"];?>
						</div>
						<div class="button">
							<a href="<?=$arItem["URL"];?>" class="btn">Подробнее <span
							class="icon-arrow-right"></span></a>
						</div>
					</div>
				</div>
				<?php endforeach;?>
				<?php if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]; /* постраничная навигация внизу */
				?>
				<?php else: ?>
				<div class="col-12">
					<div class="vnimanie">
						<p>К сожалению, поисковый сервер не смог найти материалы по вашему запросу. Вы уверены что ответ на ваш вопрос
						существует?</p>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>