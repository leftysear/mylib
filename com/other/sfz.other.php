<?php
defined('COM') or die('no access');

class sfz_other{
	public function __construct($conf){
		
	}
	
	private function C15ToC18($c15){
		 $cId = substr($c15,0,6)."19".substr($c15,6,9);
		 $strJiaoYan = array("1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2");
		 $intQuan = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
		 $intTemp = 0;
		 for($i = 0; $i < strlen($cId); $i++)
        	$intTemp +=  substr($cId, $i, 1)  * $intQuan[$i];
		$intTemp %= 11;
        $cId .= $strJiaoYan[$intTemp];
        return $cId;
	}
	
	private function Is18IDCard($IDNum) {
        $aCity=json_decode('{11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:"安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州",53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"}');
    
        $iSum=0;$info="";$sID=$IDNum;
        if(!preg_match("/^\d{17}(\d|x)$/i",$sID)) {
            return false;
        }
        $sID = preg_replace("/x$/i","a",$sID);
    
        if($aCity[intval(substr($sID,0,2))]==null) {
            return false;
        }

        for($i = 17;$i>=0;$i--) $iSum += (pow(2,$i) % 11) * intval($sID{17 - $i});
        
        if($iSum%11!=1)return false;
        return true;
    }
	
	public function isIDCard($card){
		return strlen($card)==15 ? $this->Is18IDCard($this->C15ToC18($card)) : $this->Is18IDCard($card);
	}
}
?>