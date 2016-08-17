<? include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>

	<div id="data">
		 <?$APPLICATION->IncludeComponent(
	"picom:main.feedback",
	"callback",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"EMAIL_TO" => "dtelegin.spok@yandex.ru",
		"EVENT_MESSAGE_ID" => "",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array("NAME","MESSAGE",),
		"USE_CAPTCHA" => "N",
		"MY_FORM_PARAM" => "CALLBACK",
	)
);?>
	</div>
