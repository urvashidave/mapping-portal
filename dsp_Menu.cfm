<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JYSK Login</title>
<link href="JF.css" rel="stylesheet" type="text/css" />
<link rel='shortcut icon' type='image/x-icon' href='images/JYSK.ico' />
 <link rel="stylesheet" href="css/bootstrap.css">
 <script src="js/jquery.min.js" type="text/javascript"></script>
 <stylE>
 .table {
    width: 50%;
    max-width: 100%;
    margin-bottom: 5px;
    align-content: center;
    text-align: center;
	font-size:20px;

	border: 1px solid;
}
.table > thead > tr > td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 0.1px solid #ddd;
	

}
</style>
</head>

<body>
<cfif reFindNoCase("android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino",CGI.HTTP_USER_AGENT) GT 0 OR reFindNoCase("1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-",Left(CGI.HTTP_USER_AGENT,4)) GT 0>
  <style>
  .databox{
    width:90%;
  }
  .form-signin{
    width:90%;
  }
  .table{width:90%;
   font-size:30px;
  }
  .HugeTitle{
font-size:30px;

  }
  
  
  </style>

</cfif>



<!-- dsp_carriers -->
<Cfinclude template="application.cfm">
<!---Cfinclude template="/home1.html"--->
<p></p><p><p><p><center>
<a href="index.php"><Img src="JYSK.jpg" align="middle" /></a>
<p>
<Table width=50% class="databox"><tr>
  <td class="HugeTitle" align="center">Flyer Distribution Program</td>
</tr></Table>
<Cfoutput>
<p><p>
<Cfquery name="Check" Datasource="#ds_dataswamp#" password="#ds_passswamp#" username="#ds_Userswamp#">
	Select * from JYSKStores
	where Location= <cfqueryparam cfsqltype="cf_sql_varchar" value="#URL.L#">
</Cfquery>

<cfset newMapName="not found">
<cfdirectory action="list" directory="#expandPath('./Maps/New Maps')#" name="newMaps">
<cfloop query="newMaps">
	<cfif find(#URL.L#, #name#)>
		<cfset newMapName=#name#>
	</cfif>
</cfloop>

<cfdirectory name="newReports" action="list" directory="#expandPath('./Reports/New Reports')#">
<cfset newReportName="not found">
<cfloop query="newReports">
	<cfif find(#URL.L#, #name#)>
		<cfset newReportName=#name#>
	</cfif>
</cfloop>
<Table class="table">

<Tr><td class="">#Check.Market#<br />#Check.Address#<br />#check.Province# #Check.pcode#</td></Tr>
<tr><td>&nbsp;</td></tr>
<!-- display new report if found, else display error message -->
<tr><td class="">View <a target="" href="Reports/HOUSEHOLD REPORT STORE #L#.pdf"> Distribution Quantity Report</a></td></tr>
<cfif find("not found", #newReportName#)>
	<tr><td><p style="font-color: red">No distribution report found, please contact admin</p></td></tr>
<cfelse>
	<tr>
	  <td class="" style="padding-left: 34px"> <a  href="Reports/New Reports/#newReportName#"> Pinpoint Analysis Report</a></td>
	</tr>
</cfif>


	<tr>
	  <td class="">View<a target="" href="distribution_map.php"> Distribution Map </a></td>
	</tr>

<tr><td><a href="postalsearch1.cfm">Flyer Analysis Postal Code Lookup</a></td></tr>
<tr><td class="">Email a response to: <a href="mailto:JYSK@market-focus.com?Subject=Store_#URL.L#_Distribution&cc=KHARBULIK@market-focus.com">JYSK@market-focus.com</a></td></tr>
<tr><td>&nbsp;</td></tr>

</Table>

<table>
<tr>
<td colspan="2">
<a href="index.php"><button  class="btn btn-primary"  name="submit" id="submit" value="BACK"><span class="glyphicon glyphicon-chevron-left"></span>BACK</button></a>
</td>
</tr>

</table>
<br/><br/><br/><br/>
<p>
<Span class="smalltext"><A href="http://get.adobe.com/reader/enterprise"><img src="reader_icon_special.jpg" border=0 height=64 />Download Adobe Reader</A></Span>
</cfoutput>
</body>
</html>
