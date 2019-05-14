<! doctype html>

<head>

<title>Flyer Analysis Reporting System</title>
<link href="/JF.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

<body>
<cfoutput>
<Table width=90% align="center" border=0>
<tr><td width=180><a href="menu.cfm"><img src="/images/MFD125.jpg" height=75 align="Left" border=0></a></td>
<td class="BigTitle" align="left"> Flyer Analysis Reporting System</td></tr>
</Table>
<p>

<Table align="center" width=40%>
<tr bgcolor="##000000"><td class="BigTitleW" align="center">Postal Code Analysis Report</td></tr></Table>


<Cfinclude template="application.cfm">

<cfparam name="TXX" default="">
<cfparam name="FXX" default="">
<cfparam name="PXX" default="">
<cfparam name="MXX" default="">
<Cfparam name="form.Pcode" default="">

<Cfif isdefined("URL.N")><Cfset Form.Code=URL.N><Cfset form.Pcode=""></Cfif>

<Cfif isdefined("Form.pcode")><Cfset PXX=Ucase(Form.Pcode)></Cfif>

<cfif #isuserinrole("guest")# eq "YES">
<span class="smalltext">guest</span>
</cfif>

<!--- Business Rules --->
<Cfif Len(PXX) GT 3><Cfset TXX=""><Cfset FXX=""></Cfif>

<Cfif Len(FXX) GT 2><Cfset TXX=""></Cfif>
<Cfif Len(TXX) GT 2><Cfset FXX=""><Cfset PXX=""></Cfif>
<Cfif Len(MXX) GT 2><Cfset TXX=""><Cfset FXX=""><Cfset PXX=""></Cfif>

<Cfparam name="storeno" default="">

<Cfif isdefined("Form.Show")>
	<Cfquery name="EPCCF" datasource="#ds_dataGeyser#" username="#ds_UserGeyser#" password="#ds_passGeyser#">
		Select * from Epccf2008_07 where FSA_LDU='#Form.Pcode#'
	</Cfquery>
	
	<Cfset URL.S = "19,31,33"><Cfset SS="FS">	<!--- Future Shop --->
		<Cfset Range=25><!--- urban default --->
		<Cfif Mid(Pcode,2,1) EQ "0"><Cfset Range=50></cfif><!--- for rural areas --->
	<cfquery name="Matches" datasource="#ds_dataGeyser#" username="#ds_UserGeyser#" password="#ds_passGeyser#" blockfactor=100>
		SELECT DISTINCT top 25 dbo.STORESXY.PK_ID, dbo.STORESXY.X, dbo.STORESXY.Y, dbo.STORESXY.STORE_NAME, dbo.STORESXY.STORE_NUMBER,
		   dbo.STORESXY.MALL,dbo.STORESXY.Address1,6367 * ACOS(SIN(#EPCCF.Latitude# / 57.2958) 
       * SIN(dbo.STORESXY.Y / 57.2958) + COS(#EPCCF.Latitude# / 57.2958) * COS(dbo.STORESXY.Y / 57.2958) 
       * COS(dbo.STORESXY.X / 57.2958 -  (#EPCCF.Longitude# / 57.2958))) AS Distance
		FROM dbo.STORESXY INNER JOIN
     dbo.RETAIL_LIST ON dbo.STORESXY.STORE_NAME = dbo.RETAIL_LIST.STORE_NAME
		WHERE ((6367 * ACOS(SIN(#EPCCF.Latitude# / 57.2958) * SIN(dbo.STORESXY.Y / 57.2958) + COS(#EPCCF.Latitude# / 57.2958) * COS(dbo.STORESXY.Y / 57.2958) 
       * COS(dbo.STORESXY.X / 57.2958 -  (#EPCCF.Longitude# / 57.2958))) <= #Range#) AND (dbo.RETAIL_LIST.Sub_ID IN (#URL.S#)))
		ORDER by Distance	   
</cfquery>

<!---Cfdump var="#Matches#"--->
</cfif>


<p><p></p></p><table size=60% align="center">

<cfform name="X" Action="PostalSearch2.cfm?Requesttimeout=900">

<tr><Td width=75><img src="/images/futureshop_logo.png" width=125></td><td class="Title" align="right">Postal Code: </td>

<td><Cfinput Name=Pcode mask="A9A 9A9" class="Title" value="#PXX#" size="10">&nbsp;<Cfinput name="Submit" type="submit" value="Go">
<td class="Title" width=200 align="right">Store Number 
<Cfinput size=5 id="StoreNo" name="StoreNo" readonly="yes" value="#Storeno#" style="font-weight:bold;font-size:14px;text-align:center;"></td></tr>



</cfform></table>

<Cfif Len(FXX) GT 2><center>
<Cfif Mid(FXX,2,1) EQ "0"><span class="red">The FSA Lookup is for Urban Areas. <br />Use Postal Code lookup for Rural areas</span><Cfabort>
</Cfif>
</Cfif>


<!--- Recursive --->
<Cfif isdefined("form.Pcode")>
<Cfif len(form.pcode) EQ 7><Cfset PXX=left(form.Pcode,3) & right(form.pcode,3)></Cfif>
<Cfif isdefined("matches.recordcount")>
	<Table align="center" border=0><tr><td>
</cfif>
<Table width=806 class="databox" align="center">
<tr><td class="Title">Dist ID</td><td class="Title">Distributor Name</td><td class="Title" align="center">Prime FSA</td>

<Cfif Len(PXX) GT 3><td class="Title" align="left">Route</td></Cfif>

<td class="Title" align="right">Homes</td><td class="Title" align="right">Apts</td><td class="Title" align="right">Total</tr>
<!---Cftry--->
		<CFstoredProc 
			procedure="p_Web_PostalCode_Analysis_Report"
			datasource="#ds_dataWBOX#" 
			username="#ds_userWBOX#" 
			password="#ds_passWBOX#">
		<cfprocparam 
			Value="FS" 
			cfsqltype="cf_sql_varchar">
		<cfprocparam 
			Value="#PXX#" 
			cfsqltype="cf_sql_varchar">
    	<cfprocresult name="G7">
		</CFstoredProc>
		
<!---Cfcatch type="database">
	<Tr><td colspan=7 align="center" class="HugeTitle">Sorry, there was a problem connecting to the database</td></tr>
	<tr><td colspan=15 align="Center" class="text">If this error persists, please contact MarketFocusDirect 905.477.0801</td></tr>
    <tr><td colspan=7 align="Center" class="smalltext">Error with #Cfcatch.Type# - #cfcatch.message#</td></tr>
	<tr><td class="text">Error Info:</td></tr>
	<Cfloop index="i" from="1" to="#Arraylen(Cfcatch.tagcontext)#">
		<Cfset scurrent = #cfcatch.tagcontext[i]#>
		<Tr><td class="smalltext">#i# #scurrent["ID"]# (#sCurrent["line"]#, #sCurrent["column"]#) #sCurrent["TEMPLATE"]#</td></Tr>
	</cfloop>
	
	</Table><cfabort>
</cfcatch--->

<!---/Cftry--->
<!---Cfdump var="#form	#">
TXX=#TXX#, FXX=#FXX#, PXX=#PXX#, MXX=#MXX##  <br />
<Cfdump var="#G7#">
<Cfabort--->

<cfset TH=0>
<Cfset TA=0>
<Cfset TT=0>

<Cfloop Query="G7">
<tr>

	<td class="text">
	#G7.code#
	</td>
	<td class="text">#G7.Distributor#</td>
	<td class="text" align="center">#G7.PrimeFSA#</td>

	<Cfif Len(PXX) GT 3><td class="text" align="left">#G7.Route#</td></Cfif>

<cfif #isuserinrole("guest")# eq "YES">
	<td class="text" align="right">--</td>
	<td class="text" align="right">--</td>
	<td class="text" align="right">--</td>
<cfelse>
	<td class="text" align="right">#numberformat(G7.DEL_Homes,"999,999,999")#</td>
	<td class="text" align="right">#numberformat(G7.DEL_Apts,"999,999,999")#</td>
	<td class="text" align="right">#numberformat(G7.DEL_Total,"999,999,999")#</td>
	<cfset TH = TH + G7.del_homes>
	<Cfset TA = TA + G7.del_Apts>

</cfif>
</tr>
</Cfloop>
<Cfif isdefined("URL.N")>
<tr><td class="Title" colspan=2 align="center"><b>T O T A L</td>
<td class="Title" align="center"><b>#G7.Recordcount#</td>
	<Cfset TT= TH + TA>
	<td class="Title" align="right"><b>#numberformat(TH,"999,999,999")#</td>
	<td class="Title" align="right"><b>#numberformat(TA,"999,999,999")#</td>
	<td class="Title" align="right"><b>#numberformat(TT,"999,999,999")#</td>
</tr></Cfif>

</Table>
<!--- Analysis --->
	
<Table width=806 class="databox" align="center" cellpadding=0 cellspacing=0>
	<Tr><td colspan=12 Class="BigTitle">Analysis</td></Tr>
	<tr bgcolor="black" bordercolor="black" bordercolordark="black" >
		<td colspan="4">&nbsp;</td><td class="textw" align="center" colspan=3>Deliver</td>
	<Tr bgcolor="black" bordercolor="black" bordercolordark="black"><!---td class="smalltext" align="center">Store</td>
	    <td class="smalltextw">Distributor</td--->
		<td class="textw">&nbsp;Route</td>
		<!---td class="smalltextw" align="right">Homes</td>
		<td class="textw" align="right">Apts</td>
		<td class="textw" align="right">Total H+A</td--->
		<td class="textw" align="right">Sales</td>
		<td class="textw" align="right">$/HHLD/Week</td>
		<td class="textw" align="center">Version</td>
		<td class="textw" align="center"><Span class="Titlew"><strong>A</strong></Span>(H)</td>
		<td class="textw" align="center"><strong>B</strong>(M)</td>
		<td class="textw" align="center"><strong>C</strong>(L)</td>
	</TR>

 <!--- Put Store # into StoreNo field --->
<SCRIPT LANGUAGE="JavaScript">
<!-- 	
function DoStore() {
	var Store = #G7.Store#
	document.getElementById("StoreNo").value = Store;
} 
-->
</SCRIPT> 
 <Cfloop query="G7">
 	 <Tr><!---td class="smalltext" align="center">#G7.Store#</td>
	 	 <td class="smalltext">#G7.Distributor#</td--->
	 	 <td class="text">&nbsp;#G7.Route#</td>
		 <td class="text" align="right">#DollarFormat(G7.Sales)#</td>
		 <td class="text" align="right">#Dollarformat(G7.SALES_HHLD_WEEK)#</td>
		 <td class="text" align="Center">#G7.Version#</td>
		 <td class="text" align="Center">#G7.A_Qty#</td>
		 <td class="text" align="Center">#G7.B_Qty#</td>
		 <td class="text" align="Center">#G7.C_Qty#</td>
	</tr>
 </cfloop>
 <TR><TD colspan=7>&nbsp;</TD></tr>
</cfif>	
<!---Cfdump var="#variables#"--->
<!---Cfif Len(TXX) GT 0><Cfinclude template="mapT.cfm"></Cfif>
<Cfif Len(FXX) GT 1><Cfinclude template="mapF.cfm"></Cfif--->
<Cfif Len(PXX) GT 1><Cfinclude template="MapX.cfm"></Cfif> 

<Cfif isdefined("matches.recordcount")>
	</td><td  width=175>
		
	<Table class="datatable">
		<Tr><td class="Title" colspan=3 align="center">Competition</td></tr>
		<Cfset Char="66">
<Cfloop query="matches" endrow="25">
	<tr><td class="smalltext">#Chr(Char)#</td>
	    <td class="smalltext">#matches.store_name# #matches.Store_Number#</td>
		<td class="smalltext" align="right" width=50 >#numberformat(matches.distance,"999.9")# km</td></tr>
	<Cfset Char=Char+1>
</cfloop>
</td></tr></table>

	</Table>	
</cfif>
<Cfif Len(Form.Pcode) GT 1>
<!---Cfinclude template="disclaimer.cfm"--->
<center><cfform name="CX" action="PostalSearch2.cfm">
	<Cfinput type="hidden" name="Pcode" value="#form.Pcode#">
	<Cfinput type="hidden" name="Show" value="1">
	<Cfinput type="submit" name="submit" value="Show Competition">
</cfform>
</cfif>
</center>



</Cfoutput>
</body>
</html>
