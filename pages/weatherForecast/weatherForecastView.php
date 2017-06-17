<?
$source = 'http://informer.gismeteo.ru/xml/34712_1.xml';
$weekday = array('','воскресенье','понедельник','вторник','ср еда','чертверг','пятница','суббота');
$precipitation = array(4=>'дождь', 5=>'ливень', 6=>'снег', 7=>'снег', 8=>'гроза', 9=>'нет данных', 10=>'без осадков');
$xmlstr = '';
 
$fp = fopen($source, 'r');
if ( $fp ) {
while (!feof($fp)) $xmlstr.= fread($fp, 8192);
$xml = new SimpleXMLElement($xmlstr);
 
 
$town = $xml->REPORT->TOWN[0];
 
 
echo '<table border="1" width="100%"><tr>';
foreach ($xml->REPORT->TOWN->FORECAST as $f) {
	echo '<td align="center"><font color="#000080" size="2">'.
	$f['day'].'.'.$f['month'].'.'.$f['year'].'<br>'.
	$weekday[intval($f['weekday'])].'<br>'.
	$precipitation[intval($f->PHENOMENA['precipitation'])].' '.
	$f->TEMPERATURE['min'].'-'.$f->TEMPERATURE['max'].'<br>'.
	'</td>';
	}
echo '</tr></table>';
}
 
?>