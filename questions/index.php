<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вопрос-ответ");
$post = $_POST;
?><?if($_GET["ELEMENT_ID"] == null):?> <a id="inline_question" href="#data">Задать вопрос</a>
<?endif?> <?
$el = new CIBlockElement;

if('' != $_POST['user_name'] && '' != $_POST['MESSAGE']) {
     
    $PROP = $_POST;

    $arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
    "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
    "IBLOCK_ID"      => 12,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => $_POST['MESSAGE'],
    "ACTIVE"         => "N",            // активен
    "PREVIEW_TEXT"   => "текст для списка элементов",
    "DETAIL_TEXT"    => "текст для детального просмотра",
    "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
    );
    if($PRODUCT_ID = $el->Add($arLoadProductArray))
        echo "New ID: ".$PRODUCT_ID;
    else
        echo "Error: ".$el->LAST_ERROR;
}  
?>
<div style="display:none">
	<div id="data">
		 <?$APPLICATION->IncludeComponent(
	"picom:main.feedback",
	"feedback",
	Array(
		"EMAIL_TO" => "dtelegin.spok@yandex.ru",
		"EVENT_MESSAGE_ID" => "",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(0=>"NAME",1=>"MESSAGE",),
		"USE_CAPTCHA" => "Y"
	)
);?>
	</div>
</div>
 <?$APPLICATION->IncludeComponent(
	"picom:news",
	"question_answer",
	Array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array("","name",""),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array("QUESTION","NAME","RESPONSE","question","name",""),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "12",
		"IBLOCK_TYPE" => "question",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array("",""),
		"LIST_PROPERTY_CODE" => array("QUESTION","NAME","RESPONSE","question","name",""),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_MODE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"VARIABLE_ALIASES" => Array("ELEMENT_ID"=>"ELEMENT_ID","SECTION_ID"=>"SECTION_ID")
	)
);?> <?if($_GET["ELEMENT_ID"] != null):?> <a id="inline_resp" href="#data_resp">Ответить на вопрос</a>
<?endif?>
<div style="display:none">
	<div id="data_resp">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.feedback",
	"feedback_resp",
	Array(
		"EMAIL_TO" => "dtelegin.spok@yandex.ru",
		"EVENT_MESSAGE_ID" => "",
		"OK_TEXT" => "Спасибо, ваше сообщение принято.",
		"REQUIRED_FIELDS" => array(0=>"NAME",1=>"MESSAGE",2=>"EMAIL",3=>"PHONE",),
		"USE_CAPTCHA" => "N"
	)
);?>
	</div>
</div>
<?
$ell = new CIBlockElement;

if('' != $_POST['response']) {
     
    $PROP = $_POST;

    $arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
    "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
    "PROPERTY_VALUES"=> $PROP,
    //"NAME"           => "Элемент",
    "ACTIVE"         => "Y",            // активен
    //"PREVIEW_TEXT"   => "текст для списка элементов",
   // "DETAIL_TEXT"    => "текст для детального просмотра",
   // "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/image.gif")
    );

    $PRODUCT_ID = (int)$_GET["ELEMENT_ID"];  
    $res = $ell->Update($PRODUCT_ID, $arLoadProductArray);
}  
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>