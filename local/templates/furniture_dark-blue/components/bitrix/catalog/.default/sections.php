<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

 
<?  
global $arrFilter;
//if( NULL != $_GET["order"]){
//$order = $_GET["order"];
//} 


    if ($_GET["price"] == 1)
    {
    
        $arParams["ELEMENT_SORT_FIELD"] = 'PROPERTY_PRICE';
        $arParams["ELEMENT_SORT_ORDER"] = 'DESC';
        $price="asortvibor";
        $price = $_GET["price"];
    }
    if ($_GET["price"] == 2)
    {
    
        $arParams["ELEMENT_SORT_FIELD"] = 'PROPERTY_PRICE';
        $arParams["ELEMENT_SORT_ORDER"] = 'ASC';
        $price="asortvibor";
        $price = $_GET["price"];
    }
    if ($_GET["name"] == 1)
    {
 
        $arParams["ELEMENT_SORT_FIELD"] = "name";
        $arParams["ELEMENT_SORT_ORDER"] = 'DESC';
        $name="asortvibor";
        $name=$_GET["name"];
    }
    if ($_GET["name"] == 2)
    {
        $arParams["ELEMENT_SORT_FIELD"] = "name";
        $arParams["ELEMENT_SORT_ORDER"] = 'ASC';
        $brend="asortvibor";
        $name=$_GET["name"];
    }
     if ($_GET["brand"] == 1)
    {
        $arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_BRAND.CODE";
        $arParams["ELEMENT_SORT_ORDER"] = 'DESC';
        $brand="asortvibor";
        $brand=$_GET["brand"];
    }
    if ($_GET["brand"] == 2)
    {
        $arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_BRAND.CODE";
        $arParams["ELEMENT_SORT_ORDER"] = 'ASC';
        $brand="asortvibor";
        $brand=$_GET["brand"];
    }
    if (isset($_GET["filterBrand"])) {
		$arrFilter = array("PROPERTY_BRAND" => $_GET["filterBrand"]);		
    }
    //var_dump($arrFilter);
    echo '<span>Сортировать по: </span>';
    if (1 == $price || NULL == $price) {
        echo '<a href="'.$APPLICATION->GetCurPageParam("price=2", array("price","name",'brand'), FALSE).'" class="'.$price.'">&#9660; цене</a> |';

    }
    if (2 == $price) {
       echo '<a href="'.$APPLICATION->GetCurPageParam("price=1", array("price","name",'brand'), FALSE).'" class="'.$price.'">&#9650; цене</a> |';
    }
    if (1 == $name || NULL == $name) {
        echo  '<a href="'.$APPLICATION->GetCurPageParam("name=2", array("name","price",'brand'), FALSE).'" class="'.$name.'">&#9660; названию</a> |<br>';
    }
    if (2 == $name) {
  
       echo '<a href="'.$APPLICATION->GetCurPageParam("name=1", array("name","price",'brand'), FALSE).'" class="'.$name.'">&#9650; названию</a> |';
    }
    
    if (1 == $brand || NULL == $brand) {
        echo  '<a href="'.$APPLICATION->GetCurPageParam("brand=2", array("name","price",'brand'), FALSE).'" class="'.$brand.'">&#9660; бренду</a> |<br>';
    }
    if (2 == $brand) {
  
       echo '<a href="'.$APPLICATION->GetCurPageParam("brand=1", array("name","price",'brand'), FALSE).'" class="'.$brand.'">&#9650; бренду</a> |';
    }
     
    echo 'По бренду: <ul style="display: inline">'; 
    
    if (CModule::IncludeModule("iblock")) {
		$iblock_id = 13;
		# show url my elements
		$my_elements = CIBlockElement::GetList (
		Array(),
		Array("IBLOCK_ID" => $iblock_id),
		FALSE,
		FALSE,
		Array('ID',"NAME")
		);
	}

    while ($ar_fields = $my_elements->GetNext()) {
		
		echo '<li style="display: inline; margin-right: 10px"><a href="'.$APPLICATION->GetCurPageParam("filterBrand=".$ar_fields['ID'],
		array('filterBrand'), FALSE).'">'.$ar_fields['NAME'].'</a></li>';
	}
    echo '</ul>';
?>


<?$APPLICATION->IncludeComponent(
	"picom:catalog.section",
	"furniture",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		
		"SHOW_ALL_WO_SECTION" => "Y",
		"SET_TITLE" => 'N',

		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
 		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
		"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"FILTER_NAME" => "arrFilter",
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],

		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
	),
	$component
);
?>
