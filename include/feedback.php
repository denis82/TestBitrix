<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<?$APPLICATION->IncludeComponent(
		"picom:main.feedback",
		"callback",
		Array(
			"EMAIL_TO" => "dtelegin.spok@yandex.ru",
			"EVENT_MESSAGE_ID" => array(),
			"OK_TEXT" => "Спасибо, ваше сообщение принято.",
			"REQUIRED_FIELDS" => array("NAME","EMAIL","PHONE","MESSAGE"),
			"USE_CAPTCHA" => "Y"
		)
	);
	?>
	<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php"); ?>