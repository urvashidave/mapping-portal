<!--- act_Login.cfm --->

<Cfsilent>
<Cfinclude template="application.cfm">

<Cfquery name="Check" Datasource="#ds_dataswamp#" password="#ds_passswamp#" username="#ds_Userswamp#">
	Select * from JYSKStores where
	Location = <cfqueryparam cfsqltype="cf_sql_varchar" value="#form.Store#">
</Cfquery>

<Cfif Check.recordcount GT 0 and Form.Pass EQ "champion!">

	<Cfquery name="Upit" Datasource="#ds_dataswamp#" password="#ds_passswamp#" username="#ds_Userswamp#">
		Update JYSKStores Set logincount = logincount + 1, lastlogin = #Now()#
		Where Location = <cfqueryparam cfsqltype="cf_sql_varchar" value="#form.Store#">
	</Cfquery>

<Cflocation url="dsp_Menu.cfm?L=#form.store#">
</Cfif>

<Cflocation url="index.cfm?E=1">
</Cfsilent>

<!--- query used to have
and Password = <cfqueryparam cfsqltype="cf_sql_varchar" value="#form.Pass#">
--->
