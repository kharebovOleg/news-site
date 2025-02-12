<?php
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
    $APPLICATION->SetTitle("Главная");

/*
    оптимизировать компоненты
*/
?>

<div class="included_areas">
    <?php
        $APPLICATION->IncludeComponent(
            "bitrix:main.include", 
            "best", 
            [
                "AREA_FILE_SHOW" => "file",
                "PATH" => "local/includes/adidas.php"
            ]
        );
        
        $APPLICATION->IncludeComponent(
            "bitrix:main.include", 
            "best", 
            [
                "AREA_FILE_SHOW" => "file",
                "PATH" => "local/includes/team.php"
            ]
        );
        
        $APPLICATION->IncludeComponent(
            "bitrix:main.include", 
            "best", 
            [
                "AREA_FILE_SHOW" => "file",
                "PATH" => "local/includes/pegeot.php"
            ]
        );
    ?>
</div>

<div class="news_blocks">
    <?
        $APPLICATION->IncludeComponent(
            "my_namespace:list_info",
            "",
            [
                "ELEMENT_COUNT" => 6,
                "SHOW_PAGINATION" => 'Y',
                "ORDER" => ['SORT' => 'ASC'],
                "FILTER" => ["IBLOCK_ID" => 1],
                "SELECT" => ["ID", "CODE", "IBLOCK_ID", "ACTIVE_FROM", "NAME", "PREVIEW_TEXT"]
            ]
        );
    ?>
</div>

<form id="feedback" class="form" action="form.handler.php" method = "POST">
	<p class="form_title">Форма обратной связи</p>
    <p class="succes_submit hidden">Форма отправлена успешно</p>
	<div class="inputs">
		<div class="input_container">
			<input type="text" name="name" id="name" placeholder="Введите имя" autocomplete="on" required>
            <p class='name_validation_error hidden'>Пожалуйста, введите верное имя.</p>
		</div>
		<div class="input_container">
			<input type="tel" name="phone" id="phone" placeholder="Введите номер" required>
            <script>$(function() {$("#phone").mask("+7(999) 999-9999");});</script>
            <p class='phone_validation_error hidden'>Неверно указан номер телефона.</p>
		</div>
	</div>
	<button class="form_button" type="submit">Отправить</button>
</form>

<!-- скрипты для работы формы -->
<script src = "local/templates/lp/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>