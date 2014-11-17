<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Character Generator</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="chargen.css" rel="stylesheet" type="text/css">
</head>

<body>
<h3>Instructions</h3>
<p>Enter your e-mail address and select whether you are rolling a NPC or your main character.</p>
<p>All results will be sent to your and my e-mail addresses.</p>
<p class="small">The roller to not accept a 4d6 die roll total of lower than 10.</p>
<form action="charresults.php" method="post" id="charactergen" name="charactergen">
	<p class="small" align="right"><em class="caption">*</em> Required field.</p>
    <dl>
        <dt><em class="caption">*</em> <label for="email" id="lbl_email" title="(required field)">E-Mail Address</label></dt>
        <dd><input type="text" class="REQUIRED MASKVALIDEMAIL" name="email" id="email" title="your e-mail" maxlength="128" tabindex="1" /></dd>

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
