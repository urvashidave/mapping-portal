<!doctype HTML>

<Head>
<link rel="stylesheet" href="cbcscbindex2.css" type="text/css" />
<style type="text/css">
a {text-decoration:none}
</style>
</head>

<body>
<cfoutput>
<link href="/JF.css" rel="stylesheet" type="text/css" />

<!---login check--->
<Cfset j=Find(":",GetAuthUser())>

<Cfif j LT 1><Cflocation url="index.cfm"></cfif>

<Cfset Username=Mid(GetAuthUser(),j+1,len(GetAuthUser())-j)>
<Cfset UserID=Left(GetAuthUser(),j-1)>

<!--- look up user --->
<Cfquery name="GU"  datasource="#ds_dataswamp#" username="#ds_Userswamp#" password="#ds_passswamp#">
	Select * from Security where ID = #UserID#
</cfquery>

<center><Table class="databox" align="center" width=60% border=0>
<Tr><Td Class="BigTitle" valign="Middle" align="center"><Img src="/Images/MFD.jpg" height="75" align="left" colspan=2>
Customer Menu <br>to<br>MarketFocusDirect<br>Applications and Demos</td>
<td class="smalltext" valign="top" align="right">User: #Username#<br>
	<Cfif GU.Admin EQ 1> Admin,</cfif>
	<Cfif GU.ITdept EQ 1> IT Department </cfif></td>
</Tr>
<tr><td align="center"><img src="/images/spacer.gif" width=150 height=1>
<img src="/images/bestbuy.jpg" height=60>
<!---img src="/images/futureshop_logo.png" width=125---></td>
<td align="right" class="smalltext"><a href="Logout.cfm">Logout</a></td></tr>
</Table>

<Img src="/images/spacer.gif" height=50 align="center">

<ul id="cbindex2ebul_table" class="cbindex2ebul_menulist" style="width: 357px; height: 143px;">
  <li class="spaced_li"><a href="dsp_DRmaps1.cfm"><img id="cbi_cbindex2_4" src="ebbtcbindex24_0.png" name="ebbcbindex2_4" width="357" height="35" style="vertical-align: bottom;" border="0" alt="Distribution Reports / Maps" title="" /></a></li>
 <li><img src="/images/spacer.gif" height=20></li>
  <!---li class="spaced_li"><a href="dsp_choose.cfm"><img id="cbi_cbindex2_1" src="ebbtcbindex21_0.png" name="ebbcbindex2_1" width="357" height="35" style="vertical-align: bottom;" border="0" alt="Store and Office Copy Management" title="" /></a></li>
 <li><img src="/images/spacer.gif" height=20></li>
  <li class="spaced_li"><a><img id="cbi_cbindex2_2" src="ebbtcbindex22_0.png" name="ebbcbindex2_2" width="357" height="35" style="vertical-align: bottom;" border="0" alt="Version Management" title="" /></a></li>
 <li><img src="/images/spacer.gif" height=20></li--->
  <!---li class="spaced_li"><a href="postalsearch1.cfm"><img id="cbi_cbindex2_3" src="ebbtcbindex23_0.png" name="ebbcbindex2_3" width="357" height="35" style="vertical-align: bottom;" border="0" alt="Postal Code Analysis" title="" /></a></li--->
 </ul>
 <link rel="stylesheet" href="images/cbcscbinsmenu.css" type="text/css" />

<img src="/images/spacer.gif" height=20>
<center><ul id="cbinsmenuebul_table" class="cbinsmenuebul_menulist" style="width: 457px; height: 58px;">


  <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="postalsearch1.cfm"><img id="cbi_cbinsmenu_2" src="images/ebbtcbinsmenu2_0.png" name="ebbcbinsmenu_2" width="218" height="58" style="vertical-align: bottom;" border="0" alt="Postal Code Analysis
 BestBuy" title="" /></a></li>
 <li><img src="/images/spacer.gif" width=20 height=58></li>
   <!---li class="spaced_li"><a href="postalsearch2.cfm"><img id="cbi_cbinsmenu_1" src="images/ebbtcbinsmenu1_0.png" name="ebbcbinsmenu_1" width="218" height="58" style="vertical-align: bottom;" border="0" alt="Postal Code Analysis
 Future Shop" title="" /></a></li--->
</ul>
<script type="text/javascript" src="images/cbjscbinsmenu.js"></script>

<script type="text/javascript" src="cbjscbindex2.js"></script></body>

</cfoutput>

</body>
