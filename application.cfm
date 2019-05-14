<!--- Application.cfm --->
<cfapplication name="whatever" clientmanagement="Yes" sessionmanagement="Yes" setclientcookies="Yes" sessiontimeout="#createTimeSpan(0,0,20,0)#" applicationtimeout="#createTimeSpan(0,0,20,0)#">
 
<cfsilent>
<!--- MFD color theme --->
<Cfset logo150 = "MFDGold.jpg">
<cfset themecolor="FFD700">
<Cfset tableheader="FFD700">
<Cfset color_active="FFFF66">
<Cfset color_LessActive="FFFF99">
<Cfset color_LeastActive="FFFFCC">

<!--- SQL Login Info --->
<Cfset ds_data="1101621_MFDSQL">
<Cfset ds_User="u1101621_marketfocus">
<Cfset ds_pass="550Alden@2211">

<cfset ds_dataswamp = "1101621_MFDSQL">		
<cfset ds_Userswamp = "u1101621_marketfocus">	
<Cfset ds_passswamp = "550Alden@2211">

<!--- Allow Session Management --->
<cfapplication name="MFD-JYSK" 
               sessionmanagement="yes" 
			   clientmanagement="no" 
			   setclientcookies="yes">
<!--- Application.cfm --->
<!---Helps Prevent SQL Injection Attacks.--->
<!--- E-Mail address for attack notifications --->
<cfparam name="request.errorEmail" default="john@johnnyfusion.ca" />

<!--- On attack, TRUE to abort FALSE to redirect to rootURL --->
<cfparam name="request.errorAbort" default="FALSE" />

<!--- On attack, TRUE to notify via e-mail --->
<cfparam name="request.errorNotify" default="TRUE" />

<!--- On Attack, TRUE to log --->
<cfparam name="request.errorLog" default="FALSE" />

<!--- Redirection URL --->
<cfparam name="request.rootURL" default="/" />

<cfscript>
// Default to nothing.
variables._SQLPrev_Found = "";

// What are the SQL Keywords?
variables._SQLPrev_Keywords = structNew();

// Populate the structure.
structInsert(variables._SQLPrev_Keywords, "EXEC", "");
structInsert(variables._SQLPrev_Keywords, "ALTER", "");
structInsert(variables._SQLPrev_Keywords, "EXECUTE", "");
structInsert(variables._SQLPrev_Keywords, "PROC", "");
structInsert(variables._SQLPrev_Keywords, "ASC", "");
structInsert(variables._SQLPrev_Keywords, "FILE", "");
structInsert(variables._SQLPrev_Keywords, "PROCEDURE", "");
structInsert(variables._SQLPrev_Keywords, "AUTHORIZATION", "");
structInsert(variables._SQLPrev_Keywords, "BACKUP", "");
structInsert(variables._SQLPrev_Keywords, "RAISERROR", "");
structInsert(variables._SQLPrev_Keywords, "FOREIGN", "");
structInsert(variables._SQLPrev_Keywords, "FREETEXT", "");
structInsert(variables._SQLPrev_Keywords, "READTEXT", "");
structInsert(variables._SQLPrev_Keywords, "BREAK", "");
structInsert(variables._SQLPrev_Keywords, "FREETEXTTABLE", "");
structInsert(variables._SQLPrev_Keywords, "RECONFIGURE", "");
structInsert(variables._SQLPrev_Keywords, "BROWSE", "");
structInsert(variables._SQLPrev_Keywords, "REFERENCES", "");
structInsert(variables._SQLPrev_Keywords, "BULK", "");
structInsert(variables._SQLPrev_Keywords, "FULL", "");
structInsert(variables._SQLPrev_Keywords, "REPLICATION", "");
structInsert(variables._SQLPrev_Keywords, "FUNCTION", "");
structInsert(variables._SQLPrev_Keywords, "RESTORE", "");
structInsert(variables._SQLPrev_Keywords, "CASCADE", "");
structInsert(variables._SQLPrev_Keywords, "GOTO", "");
structInsert(variables._SQLPrev_Keywords, "RESTRICT", "");
structInsert(variables._SQLPrev_Keywords, "GRANT", "");
structInsert(variables._SQLPrev_Keywords, "RETURN", "");
structInsert(variables._SQLPrev_Keywords, "CHECK", "");
structInsert(variables._SQLPrev_Keywords, "GROUP", "");
structInsert(variables._SQLPrev_Keywords, "REVOKE", "");
structInsert(variables._SQLPrev_Keywords, "CHECKPOINT", "");
structInsert(variables._SQLPrev_Keywords, "HAVING", "");
structInsert(variables._SQLPrev_Keywords, "RIGHT", "");
structInsert(variables._SQLPrev_Keywords, "CLOSE", "");
structInsert(variables._SQLPrev_Keywords, "HOLDLOCK", "");
structInsert(variables._SQLPrev_Keywords, "ROLLBACK", "");
structInsert(variables._SQLPrev_Keywords, "CLUSTERED", "");
structInsert(variables._SQLPrev_Keywords, "IDENTITY", "");
structInsert(variables._SQLPrev_Keywords, "ROWCOUNT", "");
structInsert(variables._SQLPrev_Keywords, "COALESCE", "");
structInsert(variables._SQLPrev_Keywords, "IDENTITY_INSERT", "");
structInsert(variables._SQLPrev_Keywords, "ROWGUIDCOL", "");
structInsert(variables._SQLPrev_Keywords, "COLLATE", "");
structInsert(variables._SQLPrev_Keywords, "IDENTITYCOL", "");
structInsert(variables._SQLPrev_Keywords, "COLUMN", "");
structInsert(variables._SQLPrev_Keywords, "COMMIT", "");
structInsert(variables._SQLPrev_Keywords, "SCHEMA", "");
structInsert(variables._SQLPrev_Keywords, "COMPUTE", "");
structInsert(variables._SQLPrev_Keywords, "INDEX", "");
structInsert(variables._SQLPrev_Keywords, "SELECT", "");
structInsert(variables._SQLPrev_Keywords, "CONSTRAINT", "");
structInsert(variables._SQLPrev_Keywords, "INNER", "");
structInsert(variables._SQLPrev_Keywords, "SESSION_USER", "");
structInsert(variables._SQLPrev_Keywords, "CONTAINS", "");
structInsert(variables._SQLPrev_Keywords, "INSERT", "");
structInsert(variables._SQLPrev_Keywords, "SET", "");
structInsert(variables._SQLPrev_Keywords, "CONTAINSTABLE", "");
structInsert(variables._SQLPrev_Keywords, "INTERSECT", "");
structInsert(variables._SQLPrev_Keywords, "SETUSER", "");
structInsert(variables._SQLPrev_Keywords, "CONTINUE", "");
structInsert(variables._SQLPrev_Keywords, "INTO", "");
structInsert(variables._SQLPrev_Keywords, "SHUTDOWN", "");
structInsert(variables._SQLPrev_Keywords, "CONVERT", "");
structInsert(variables._SQLPrev_Keywords, "CREATE", "");
structInsert(variables._SQLPrev_Keywords, "JOIN", "");
structInsert(variables._SQLPrev_Keywords, "STATISTICS", "");
structInsert(variables._SQLPrev_Keywords, "CROSS", "");
structInsert(variables._SQLPrev_Keywords, "KEY", "");
structInsert(variables._SQLPrev_Keywords, "SYSTEM_USER", "");
structInsert(variables._SQLPrev_Keywords, "CURRENT", "");
structInsert(variables._SQLPrev_Keywords, "KILL", "");
structInsert(variables._SQLPrev_Keywords, "TABLE", "");
structInsert(variables._SQLPrev_Keywords, "CURRENT_DATE", "");
structInsert(variables._SQLPrev_Keywords, "LEFT", "");
structInsert(variables._SQLPrev_Keywords, "TEXTSIZE", "");
structInsert(variables._SQLPrev_Keywords, "CURRENT_TIME", "");
structInsert(variables._SQLPrev_Keywords, "LIKE", "");
structInsert(variables._SQLPrev_Keywords, "THEN", "");
structInsert(variables._SQLPrev_Keywords, "CURRENT_TIMESTAMP", "");
structInsert(variables._SQLPrev_Keywords, "LINENO", "");
structInsert(variables._SQLPrev_Keywords, "CURRENT_USER", "");
structInsert(variables._SQLPrev_Keywords, "LOAD", "");
structInsert(variables._SQLPrev_Keywords, "TOP", "");
structInsert(variables._SQLPrev_Keywords, "CURSOR", "");
structInsert(variables._SQLPrev_Keywords, "NATIONAL", "");
structInsert(variables._SQLPrev_Keywords, "TRAN", "");
structInsert(variables._SQLPrev_Keywords, "DATABASE", "");
structInsert(variables._SQLPrev_Keywords, "NOCHECK", "");
structInsert(variables._SQLPrev_Keywords, "TRANSACTION", "");
structInsert(variables._SQLPrev_Keywords, "DBCC", "");
structInsert(variables._SQLPrev_Keywords, "NONCLUSTERED", "");
structInsert(variables._SQLPrev_Keywords, "TRIGGER", "");
structInsert(variables._SQLPrev_Keywords, "DEALLOCATE", "");
structInsert(variables._SQLPrev_Keywords, "TRUNCATE", "");
structInsert(variables._SQLPrev_Keywords, "DECLARE", "");
structInsert(variables._SQLPrev_Keywords, "NULL", "");
structInsert(variables._SQLPrev_Keywords, "TSEQUAL", "");
structInsert(variables._SQLPrev_Keywords, "DEFAULT", "");
structInsert(variables._SQLPrev_Keywords, "NULLIF", "");
structInsert(variables._SQLPrev_Keywords, "UNION", "");
structInsert(variables._SQLPrev_Keywords, "DELETE", "");
structInsert(variables._SQLPrev_Keywords, "UNIQUE", "");
structInsert(variables._SQLPrev_Keywords, "DENY", "");
structInsert(variables._SQLPrev_Keywords, "OFF", "");
structInsert(variables._SQLPrev_Keywords, "UPDATE", "");
structInsert(variables._SQLPrev_Keywords, "DESC", "");
structInsert(variables._SQLPrev_Keywords, "OFFSETS", "");
structInsert(variables._SQLPrev_Keywords, "UPDATETEXT", "");
structInsert(variables._SQLPrev_Keywords, "DISK", "");
structInsert(variables._SQLPrev_Keywords, "USE", "");
structInsert(variables._SQLPrev_Keywords, "DISTINCT", "");
structInsert(variables._SQLPrev_Keywords, "OPEN", "");
structInsert(variables._SQLPrev_Keywords, "USER", "");
structInsert(variables._SQLPrev_Keywords, "DISTRIBUTED", "");
structInsert(variables._SQLPrev_Keywords, "OPENDATASOURCE", "");
structInsert(variables._SQLPrev_Keywords, "VALUES", "");
structInsert(variables._SQLPrev_Keywords, "DOUBLE", "");
structInsert(variables._SQLPrev_Keywords, "OPENQUERY", "");
structInsert(variables._SQLPrev_Keywords, "VARYING", "");
structInsert(variables._SQLPrev_Keywords, "DROP", "");
structInsert(variables._SQLPrev_Keywords, "OPENROWSET", "");
structInsert(variables._SQLPrev_Keywords, "VIEW", "");
structInsert(variables._SQLPrev_Keywords, "DUMMY", "");
structInsert(variables._SQLPrev_Keywords, "OPENXML", "");
structInsert(variables._SQLPrev_Keywords, "WAITFOR", "");
structInsert(variables._SQLPrev_Keywords, "DUMP", "");
structInsert(variables._SQLPrev_Keywords, "OPTION", "");
structInsert(variables._SQLPrev_Keywords, "WHEN", "");
structInsert(variables._SQLPrev_Keywords, "WHERE", "");
structInsert(variables._SQLPrev_Keywords, "END", "");
structInsert(variables._SQLPrev_Keywords, "ORDER", "");
structInsert(variables._SQLPrev_Keywords, "WHILE", "");
structInsert(variables._SQLPrev_Keywords, "ERRLVL", "");
structInsert(variables._SQLPrev_Keywords, "OUTER", "");
structInsert(variables._SQLPrev_Keywords, "WITH", "");
structInsert(variables._SQLPrev_Keywords, "ESCAPE", "");
structInsert(variables._SQLPrev_Keywords, "OVER", "");
structInsert(variables._SQLPrev_Keywords, "WRITETEXT", "");

// Now check through the URL variables for possible SQL attacks.
for (_SQLPrev_Index1 in URL) {
	// Bring in the URL value.
	variables._SQLPrev_Value = URL[_SQLPrev_Index1];
	// Find any of the keywords in this value.
	for (_SQLPrev_Index2 in variables._SQLPrev_Keywords) {
		if (findNoCase(_SQLPrev_Index2, variables._SQLPrev_Value) and find(";", variables._SQLPrev_Value)) {
			variables._SQLPrev_Found = "sql";
		}
	}
}

// Kill the temp struct with the SQL keywords.
structClear(variables._SQLPrev_Keywords);

</cfscript>

<!--- Did we find anything? --->
<cfif len(variables._SQLPrev_Found)>

	<!--- Log if requested --->
	<cfif request.errorLog>
		<cflog file="SQLInjectionAttack" application="no" text="#cgi.remote_addr#" />
	</cfif>

	<!--- E-Mail the error for tracking. --->
	<cfif request.errorNotify>
		<cfmail to="#request.errorEmail#" from="#request.errorEmail#" subject="SQL Injection Attempt" type="HTML">
			<p>Date: #now()#</p>
			<p>Site: #cgi.server_name#</p>
			<p>URL: #cgi.script_name#?#cgi.query_string#</p>
			<p>IP: #cgi.remote_addr#</p>
			<cfdump var="#url#" />
			<cfdump var="#variables#" />
		</cfmail>
	</cfif>

	<!--- Abort or redirect to home. --->
	<cfif request.ErrorAbort>
		<cfabort>
	<cfelse>
		<cflocation url="#request.rootURL#" addtoken="no" />
	</cfif>

</cfif>

</cfsilent>
