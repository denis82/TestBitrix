<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach ($arResult['ITEMS'] as $key => $arItem)
{
	foreach ($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty) {

		if ($pid != 'PRICECURRENCY') {
		
			$id_element=$arProperty ["VALUE"];
			$newWidth = 50; 
			$newHeight =50;
			$renderImage = CFile::ResizeImageGet($arProperty ["LINK_ELEMENT_VALUE"][$id_element]["DETAIL_PICTURE"], Array("width" => $newWidth, "height" => $newHeight), BX_RESIZE_IMAGE_EXACT );
			$arResult['ITEMS']['IMG_NAME'][$arItem['ID']] = $renderImage["src"];
		}		
	}

	$arItem['PRICES']['PRICE']['PRINT_VALUE'] = number_format($arItem['PRICES']['PRICE']['PRINT_VALUE'], 0, '.', ' ');
	$arItem['PRICES']['PRICE']['PRINT_VALUE'] .= ' '.$arItem['PROPERTIES']['PRICECURRENCY']['VALUE_ENUM'];
	
	$arResult['ITEMS'][$key] = $arItem;
}
?>