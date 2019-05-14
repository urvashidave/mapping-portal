
<cfinclude template="application.cfm">

<!--- blacklist check --->
<cfset IP = cgi.REMOTE_ADDR>

<Cfquery Name="IPX" datasource="#ds_dataswamp#" username="#ds_Userswamp#" password="#ds_passswamp#">
	Select IP from Security_IP_BlackList where ip = <cfqueryparam cfsqltype="cf_sql_varchar" value="#IP#">
</Cfquery>
<Cfif IPX.Recordcount GT 0><Cflocation URL="/Under.cfm"></Cfif>
<!--- OK - not blacklisted --->

<Cfif len(GetAuthUser()) LT 1>

<!--- get company --->
<Cfquery Name="GCOM" datasource="#ds_dataswamp#" username="#ds_Userswamp#" password="#ds_passswamp#">
	Select * from MFD_Companies where Code = <cfqueryparam cfsqltype="cf_sql_varchar" value="#Form.Company#">
</Cfquery>

<!--- Not a valid company Err=2 --->
<Cfif GCOM.Recordcount EQ 0><Cflocation URL="http://www.marketfocusdirect.ca/bb/index.cfm?Err=2"></Cfif>

		<Cfquery name="Getuser"  datasource="#ds_dataswamp#" username="#ds_Userswamp#" password="#ds_passswamp#">
			Select * from Security
			  where Userlogin = '#Form.Username#'
			  and Userpassword = '#Form.password#'
			  and Company = #GCOM.Company#
		</Cfquery>

	<!--- Not a valid user Err=1--->
	<Cfif Getuser.Recordcount EQ 0><Cflocation url="http://www.marketfocusdirect.ca/bb/index.cfm?Err=1"></Cfif>
<!--- set roles --->
		<Cfif Getuser.Admin eq 1>
			<Cfset type="admin,user,sub">
				<cfelse>
			<cfset type="user">
		</Cfif>
		<Cfif GetUser.Logins LT 99><Cfset type="sub,user"></cfif>
		<Cfif Getuser.Logins LT 1><Cfset type="guest"></Cfif>
		<Cfif Getuser.Privilige EQ 0><Cfset type="guest"></Cfif>
<Cflogin>		
		<cfloginuser
			name="#Getuser.ID#:#Getuser.Name#"
			password="#Form.password#"
			roles=#type#>
</Cflogin>			
<!---Cfoutput><cfdump var="#session#"><cfdump var="#application#"><cfdump var="#variables#"></cfoutput><cfabort--->

<CfQuery Name="log" datasource="#ds_dataswamp#" username="#ds_Userswamp#" password="#ds_passswamp#">
		Insert into Security_Txns (ID,Txntime,Txntype,Notes)
		Values
		(#Getuser.ID#,#Now()#,'Login','from #CGI.Remote_ADDR#')
	</CfQuery>
	
	<Cfquery Name="Update" datasource="#ds_dataswamp#" username="#ds_Userswamp#" password="#ds_passswamp#">
		Update Security Set lastaccess=#Now()#
		<Cfif getuser.logins LT 1000>,logins = logins-1</Cfif>
			 where Userlogin = '#Form.username#'
			 and Userpassword = '#Form.password#'
	</Cfquery>
</Cfif>

	<Cfparam name="url.Refer" default="">
	<Cfif isdefined("form.Refer")><Cfset URL.Refer = form.Refer></Cfif>
	<Cfif Len(URL.Refer) GT 1><Cflocation url="#refer#"></Cfif>

<Cflocation URL="Menu.cfm">			<!--- authorized & happy --->


<h2>Thanks - logins are currently prohibited</h2>


