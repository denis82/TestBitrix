<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>	

<?
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$arERRORS = [];
$arFIELDS = [];
if(isset($_POST) && $_POST != null) {

	
	if(false == name($_POST['name'])) {
		$arERRORS['ERROR_NAME']="Поле имя заполнено не корректно";
		$arFIELDS['FIELD_NAME']='name';
	}	
	if(false == phone($_POST['phone'])) { 
		$arERRORS['ERROR_PHONE']="Поле телефон заполнено не корректно";
		$arFIELDS['FIELD_PHONE']='phone';
	}	
	if(false == email($_POST['email'])) {
		$arERRORS['ERROR_EMAIL']="Поле email заполнено не корректно";
		$arFIELDS['FIELD_EMAIL']='email';
	}	
	if(false == massage($_POST['massage'])) {
		$arERRORS['ERROR_MASSAGE']="Поле сообщение заполнено не корректно";
		$arFIELDS['FIELD_MASSAGE']='massage';
	}
}
CEvent::Send("EVENT_NAME", "2", $arFields['erter'], "N", IntVal(2));

function name($string) {
        $pattern = '/^[a-zA-Zа-яА-Я-]+$/u';
        $res =  preg_match($pattern, $string);
        if(false == $res){return false;} else {return true;} 
        }
function phone($string) {
        $pattern = '/^[0-9]+$/';//'/^( +)?((\+?7|8) ?)?((\(\d{3}\))|(\d{3}))?( )?(\d{3}[\- ]?\d{2}[\- ]?\d{2})( +)?$/';
        $res =  preg_match($pattern, $string);
        if(false == $res){return false;} else {return true;} 
        }
function massage($string) {
		$pattern = '/<[^>]*>/u';
        $res =  preg_match($pattern, $string);
        if(true == $res){return false;} else {return true;} 
		}   
function email($string) {
        $pattern = '/^[\w-]+(?:\.[\w]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/';
        $res =  preg_match($pattern, $string);
        if(false == $res){return false;} else {return true;}
		}
    
echo json_encode(array('errors' => $arERRORS,'fields' => $arFIELDS));
?>