<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

 
<?  
global $arrFilter;
if( NULL != $_GET["order"]){
$order = $_GET["order"];
} 


    if ($_GET["price"] == 1)
    {
    
        $arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_PRICE";
        $arParams["ELEMENT_SORT_ORDER"] = $order;
        $price="asortvibor";
        $brend="";
    }
    if ($_GET["price"] == 2)
    {
    
        $arParams["ELEMENT_SORT_FIELD"] = "PROPERTY_PRICE";
        $arParams["ELEMENT_SORT_ORDER"] = $order;
        $price="asortvibor";
        $brend="";
    }
    if ($_GET["sort"] == "name")
    {
 
        $arParams["ELEMENT_SORT_FIELD"] = "name";
        $name="asortvibor";
        $price="";
    }
    if ($_GET["sort"] == "brand")
    {
        $arrFilter = array("PROPERTY_BRAND" => $_GET["ELEMENT"]);
        $arParams["ELEMENT_SORT_FIELD"] = "name";
        $brend="asortvibor";
        $price="";
    }
    
    echo '<span>Сортировать по: </span>';
    if("ASC" == $order || NULL == $order) {
        echo '<a href="'.$APPLICATION->GetCurPageParam("sort=price",array("sort","order"), false).'&order=DESC" class="'.$price.'">&#9650; цене</a> |';

    }
    if("DESC" == $order) {
  
       echo '<a href="'.$APPLICATION->GetCurPageParam("sort=price",array("sort","order"), false).'&order=ASC" class="'.$price.'">&#9660; цене</a> |';
    }    
      echo  '<a href="'.$APPLICATION->GetCurPageParam("sort=name",array("sort"), false).'" class="'.$brend.'">названию</a> |<br>';
    echo 'По бренду: <ul style="display: inline">'; 
    
    if (CModule::IncludeModule("iblock")){
	$iblock_id = 13;
	# show url my elements
	$my_elements = CIBlockElement::GetList (
	  Array("ID" => $order),
	  Array("IBLOCK_ID" => $iblock_id),
	  false,
	  false,
	  Array('ID',"NAME")
	);
 
	
}
     while($ar_fields = $my_elements->GetNext())
	{
	echo '<li style="display: inline; margin-right: 10px"><a href="'.SITE_DIR.'products/?sort=brand&ELEMENT='.$ar_fields['ID'].'">'.$ar_fields['NAME'].'</a></li>';

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
