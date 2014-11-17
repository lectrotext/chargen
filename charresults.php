<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Character Results</title>
<link href="chargen.css" rel="stylesheet" type="text/css">
</head>

<body>
<?
$num_stat = $_POST['character'];
$email = $_POST['email'];
$dice = 4;
$lowest = 10; 
$stats = array();
$die_sides = 6;

for ($i = 0; $i<$num_stat; $i++) {
    for ($j = 0; $j<$dice; $j++) {
        $stats[$i][$j] = rand(1,$die_sides);
    }
    $total = array_sum($stats[$i]);
    while($total<$lowest) {
        for ($j = 0; $j<$dice; $j++) {
                $stats[$i][$j] = rand(1,$die_sides);
        }
        $total = array_sum($stats[$i]);
    }
}
$message = "";
if ($num_stat > 6) $message .= '<h3>Player Character\'s Stats</h3>'; else $message .= "<h3>NPC's Stats</h3>";
foreach ($stats as $stat) { 
rsort($stat);
$stat_total = array_sum(array_slice($stat,0,3));
$message .= <<<TEXT
<p><span class="die">$stat[0]</span> + <span class="die">$stat[1]</span> + <span class="die">$stat[2]</span> | <span class="die">$stat[3]</span> =	<span class="total"><strong>$stat_total</strong></span></p>
TEXT;
} 

if (!empty($email)) {
    echo $message; 
    if($email != "lectrotext@gmail.com") {
        $header = 'From: no-reply@pozenel.com' . "\r\n";

        $message = "sent by: {$email} \r\n\r\n".$message;
        $message = str_replace("<h3>","",$message);
        $message = str_replace('<p class="small">throw out lowest stat.</p>',"",$message);
        $message = str_replace("<p>","",$message);
        $message = str_replace('<span class="die">',"",$message);
        $message = str_replace('<span class="total">',"",$message);
        $message = str_replace("</span>","",$message);
        $message = str_replace("</h3>","\r\n\r\n",$message);
        $message = str_replace("</p>","\r\n",$message);
        $message = str_replace("<strong>","",$message);
        $message = str_replace("</strong>","\r\n",$message);
        $result = mail($email, "Character Generated",$message, $header);
        $result2 = mail("lectrotext@hotmail.com", "Character Generated",$message, $header);
    }
}
else { 
    echo "error a email address is required"; 
}

?>
<p>Stats points may be traded around at a rate of 2 point deduction to rasie a different roll 1 point.</p>
<? if  ($num_stat > 6) { ?>
<p>Throw out lowest stat.</p>
<? } ?>
<form action="charresults.php" method="post" id="charactergen" name="charactergen">
	<p class="small" align="right"><em class="caption">*</em> Required field.</p>
    <dl>
        <dt><em class="caption">*</em> <label for="email" id="lbl_email" title="(required field)">E-Mail Address</label></dt>
        <dd><input type="text" class="REQUIRED MASKVALIDEMAIL" name="email" id="email" title="your e-mail" maxlength="128" tabindex="1" value="<?=$_POST['email']?>" /></dd>

        <dd id="emailMsg" class="fieldmessage">&#xA0;</dd>
    </dl>

<dl>
    <dt><em class="caption">*</em> <label for="character" id="lbl_character" title="(required field)">Character</label></dt>
    <dd><select name="character" class="REQUIRED" id="character" title="your character type" size="1">
                <option value="" ></option>
                <option value="7" >Player Character</option>
                <option value="6" >Non Player Character</option>
        </select></dd>
    <dd id="characterMsg" class="fieldmessage">&#xA0;</dd>
</dl>
<p align="center"><input type="submit" name="submit_btn" value="Roll em" /></p>
</form>

</body>
</html>
