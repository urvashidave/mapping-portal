<! doctype html>

<head>

<title>Flyer Dist Mgmt system</title>
<link href="/JF.css" rel="stylesheet" type="text/css" />

</head>

<body>
<cfoutput>
<Table width=90% align="center" border=0>
<tr><td width=200><img src="/images/MFD125.jpg" height=100 align="Left"></td>
<td class="BigTitle" align="left"> Flyer Distribution Management System</td></tr>
</Table>
<Table height=100><tr><td></td></tr></Table>
<Table class="databox" align="center">
<Cfform name="S" action="Log.cfm">
<tr><td class="HugeTitle" colspan=2>Client Sign In:</td></tr>
<tr><td class="text" align="right">Company:</td><td><cfinput name="Company" readonly="yes" value="Best Buy"></td></tr>
<tr><td class="text" align="right">ID name:</td><td><cfinput name="Username"></td></tr>
<tr><td class="text" align="right">Password:</td><td><cfinput name="Password" type="password"></td></tr>
<Tr><td colspan=2 align="Right"><Cfinput type="Submit" value="Login" name="Submit"></td></Tr>
</Cfform></Table>
</cfoutput>
</body>


