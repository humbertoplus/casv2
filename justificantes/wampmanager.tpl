<?php
$tpl = <<< EOTPL
[Config]
;WAMPCONFIGSTART
ImageList=images_off.bmp
ServiceCheckInterval=1
ServiceGlyphRunning=13
ServiceGlyphPaused=14
ServiceGlyphStopped=15
TrayIconAllRunning=16
TrayIconSomeRunning=17
TrayIconNoneRunning=18
ID={wampserver}
AboutHeader=WAMPSERVER
AboutVersion=Version ${c_wampVersion}
;WAMPCONFIGEND

[AboutText]
WampServer Version ${c_wampVersion}

Created by Romain Bourdon (romain@romainbourdon.com)
Maintainer / Upgrade / RoadMap by Herve Leclerc (herve.leclerc@alterway.fr)

Sources are available at SourceForge

http://www.wampserver.com

[Services]
Name: wampapache
Name: wampmysqld

[Messages]
AllRunningHint=WAMPSERVER - ${w_serverOffline}
SomeRunningHint=WAMPSERVER - ${w_serverOffline}
NoneRunningHint=WAMPSERVER - ${w_serverOffline}

[StartupAction]
;WAMPSTARTUPACTIONSTART
Action: run; FileName: "${c_phpCli}";Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
Action: service; Service: wampapache; ServiceAction: startresume; Flags: ignoreerrors
Action: service; Service: wampmysqld; ServiceAction: startresume; Flags: ignoreerrors
;WAMPSTARTUPACTIONEND

[Menu.Right.Settings]
;WAMPMENURIGHTSETTINGSSTART
BarVisible=no
SeparatorsAlignment=center
SeparatorsFade=yes
SeparatorsFadeColor=clBtnShadow
SeparatorsFlatLines=yes
SeparatorsGradientEnd=clSilver
SeparatorsGradientStart=clGray
SeparatorsGradientStyle=horizontal
SeparatorsSeparatorStyle=shortline
;WAMPMENURIGHTSETTINGSEND

[Menu.Left.Settings]
;WAMPMENULEFTSETTINGSSTART
AutoLineReduction=no
BarVisible=yes
BarCaptionAlignment=bottom
BarCaptionCaption=WAMPSERVER ${c_wampVersion}
BarCaptionDepth=1
BarCaptionDirection=downtoup
BarCaptionFont=Tahoma,16,clWhite,bold italic
BarCaptionHighlightColor=clNone
BarCaptionOffsetY=0
BarCaptionShadowColor=clNone
BarPictureHorzAlignment=center
BarPictureOffsetX=0
BarPictureOffsetY=0
BarPicturePicture=barimage.bmp
BarPictureTransparent=yes
BarPictureVertAlignment=bottom
BarBorder=clNone
BarGradientEnd=$00550000
BarGradientStart=clBlue
BarGradientStyle=horizontal
BarSide=left
BarSpace=0
BarWidth=32
SeparatorsAlignment=center
SeparatorsFade=yes
SeparatorsFadeColor=clBtnShadow
SeparatorsFlatLines=yes
SeparatorsFont=Arial,8,clWhite,bold 
SeparatorsGradientEnd=$00FFAA55
SeparatorsGradientStart=$00550000
SeparatorsGradientStyle=horizontal
SeparatorsSeparatorStyle=caption
;WAMPMENULEFTSETTINGSSTART

[Menu.Right]
;WAMPMENURIGHTSTART
Type: item; Caption: "${w_about}"; Action: about
Type: item; Caption: "Refresh"; Action: multi; Actions: wampreload
Type: item; Caption: "${w_help}"; Action: run; FileName: "${c_navigator}"; Parameters: "http://www.Wampserver.com/presentation.php"; Glyph: 5
Type: submenu; Caption: "${w_language}"; SubMenu: language; Glyph: 3
Type: item; Caption: "${w_exit}"; Action: multi; Actions: myexit;
;WAMPMENURIGHTEND


[wampreload]
;WAMPRELOADSTART
Action: run; FileName: "${c_phpCli}";Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
;WAMPRELOADEND


[language]
;WAMPLANGUAGESTART
;WAMPLANGUAGEEND


[Menu.Left]
;WAMPMENULEFTSTART
Type: separator; Caption: "Powered by Alter Way"
Type: item; Caption: "${w_localhost}"; Action: run; FileName: "${c_navigator}"; Parameters: "http://localhost/"; Glyph: 5
Type: item; Caption: "${w_phpmyadmin}"; Action: run; FileName: "${c_navigator}"; Parameters: "http://localhost/phpmyadmin/"; Glyph: 5
Type: item; Caption: "${w_wwwDirectory}"; Action: shellexecute; FileName: "${wwwDir}"; Glyph: 2
Type: submenu; Caption: "Apache"; SubMenu: apacheMenu; Glyph: 3
Type: submenu; Caption: "PHP"; SubMenu: phpMenu; Glyph: 3
Type: submenu; Caption: "MySQL"; SubMenu: mysqlMenu; Glyph: 3
Type: separator; Caption: "Debug"
;Type: item; Caption: "Client XDebug"; Glyph: 6; Action: run; FileName: "${c_installDir}/tools/xdc/xdc.exe"
Type: item; Caption: "${c_webgrind}"; Action: run; FileName: "${c_navigator}"; Parameters: "http://localhost/webgrind/"; Glyph: 5
Type: separator; Caption: "Quick Admin"
;Type: servicesubmenu; Caption: "${w_apache}"; Service: wampapache; SubMenu: apache
;Type: servicesubmenu; Caption: "${w_mysql}"; Service: wampmysqld; SubMenu: MySql
Type: item; Caption: "${w_startServices}"; Action: multi; Actions: StartAll
Type: item; Caption: "${w_stopServices}"; Action: multi; Actions: StopAll
Type: item; Caption: "${w_restartServices}"; Action: multi; Actions: RestartAll
Type: separator; 
Type: item; Caption: "${w_putOnline}"; Action: multi; Actions: onlineoffline
;WAMPMENULEFTEND

[apacheMenu]
;WAMPAPACHEMENUSTART
Type: submenu; Caption: "Version"; SubMenu: apacheVersion; Glyph: 3
Type: submenu; Caption: "Service"; SubMenu: apacheService; Glyph: 3
Type: submenu; Caption: "${w_apacheModules}"; SubMenu: apache_mod; Glyph: 3
Type: submenu; Caption: "${w_aliasDirectories}"; SubMenu: alias_dir; Glyph: 3
Type: item; Caption: "httpd.conf"; Glyph: 6; Action: run; FileName: "notepad.exe"; parameters:"${c_apacheConfFile}"
Type: item; Caption: "${w_apacheErrorLog}"; Glyph: 6; Action: run; FileName: "notepad.exe"; parameters:"${c_installDir}/${logDir}apache_error.log"
Type: item; Caption: "${w_apacheAccessLog}"; Glyph: 6; Action: run; FileName: "notepad.exe"; parameters:"${c_installDir}/${logDir}access.log"
;WAMPAPACHEMENUEND

[apacheVersion]
;WAMPAPACHEVERSIONSTART
;WAMPAPACHEVERSIONEND

[phpMenu]
;WAMPPHPMENUSTART
Type: submenu; Caption: "Version"; SubMenu: phpVersion; Glyph: 3
Type: submenu; Caption: "${w_phpSettings}"; SubMenu: php_params;  Glyph: 3
Type: submenu; Caption: "${w_phpExtensions}"; SubMenu: php_ext;  Glyph: 3
Type: item; Caption: "php.ini"; Glyph: 6; Action: run; FileName: "notepad.exe"; parameters: "${c_phpConfFile}"
Type: item; Caption: "${w_phpLog}"; Glyph: 6; Action: run; FileName: "notepad.exe"; parameters: "${c_installDir}/${logDir}php_error.log"
;WAMPPHPMENUEND

[phpVersion]
;WAMPPHPVERSIONSTART
;WAMPPHPVERSIONEND

[mysqlMenu]
;WAMPMYSQLMENUSTART
Type: submenu; Caption: "Version"; SubMenu: mysqlVersion; Glyph: 3
Type: submenu; Caption: "Service"; SubMenu: mysqlService; Glyph: 3
Type: item; Caption: "${w_mysqlConsole}"; Action: run; FileName: "${c_mysqlConsole}";Parameters: "-u root -p"; Glyph: 0
Type: item; Caption: "my.ini"; Glyph: 6; Action: run; FileName: "notepad.exe"; parameters: "${c_mysqlConfFile}"
Type: item; Caption: "${w_mysqlLog}"; Glyph: 6; Action: run; FileName: "notepad.exe"; parameters: "${c_installDir}/${logDir}mysql.log"
;WAMPMYSQLMENUEND

[mysqlVersion]
;WAMPMYSQLVERSIONSTART
;WAMPMYSQLVERSIONEND

[alias_dir]
;WAMPALIAS_DIRSTART
Type: separator; Caption: "${w_aliasDirectories}"
Type: item; Caption: "${w_adddAlias}"; Action: multi; Actions: add_alias;Glyph : 1
Type: separator
;WAMPADDALIAS
;WAMPALIAS_DIREND


[php_params]
Type: separator; Caption: "${w_phpSettings}"
;WAMPPHP_PARAMSSTART
;WAMPPHP_PARAMSEND


[php_ext]
Type: separator; Caption: "${w_phpExtensions}"
;WAMPPHP_EXTSTART
;WAMPPHP_EXTEND



[add_alias]
;WAMPADD_ALIASSTART
Action: run; FileName: "${c_phpExe}";Parameters: "-c . addAlias.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run; FileName: "${c_phpCli}";Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: service; Service: wampapache; ServiceAction: restart;
Action: resetservices
Action: readconfig;
;WAMPADD_ALIASEND


[DoubleClickAction]
Action: about;

[apacheService]
;WAMPAPACHESERVICESTART
Type: separator; Caption: "${w_apache}"
Type: item; Caption: "${w_startResume}"; Action: service; Service: wampapache; ServiceAction: startresume; Glyph: 9
;Type: item; Caption: "${w_pauseService}"; Action: service; Service: wampapache; ServiceAction: pause; Glyph: 10
Type: item; Caption: "${w_stopService}"; Action: service; Service: wampapache; ServiceAction: stop; Glyph: 11
Type: item; Caption: "${w_restartService}"; Action: service; Service: wampapache; ServiceAction: restart; Glyph: 12
Type: separator
Type: item; Caption: "${w_testPort80}"; Action: run; FileName: "${c_phpExe}";Parameters: "-c . testPort.php";WorkingDir: "$c_installDir/scripts"; Flags: waituntilterminated; Glyph: 9
Type: item; Caption: "${w_installService}";  Action: multi; Actions: ApacheServiceInstall; Glyph: 8
Type: item; Caption: "${w_removeService}"; Action: multi; Actions: ApacheServiceRemove; Glyph: 7
;WAMPAPACHESERVICEEND


[MySqlService]
;WAMPMYSQLSERVICESTART
Type: separator; Caption: "${w_mysql}"
Type: item; Caption: "${w_startResume}"; Action: service; Service: wampmysqld; ServiceAction: startresume; Glyph: 9 ;Flags: ignoreerrors
;Type: item; Caption: "${w_pauseService}"; Action: service; Service: mysql; ServiceAction: pause; Glyph: 10
Type: item; Caption: "${w_stopService}"; Action: service; Service: wampmysqld; ServiceAction: stop; Glyph: 11
Type: item; Caption: "${w_restartService}"; Action: service; Service: wampmysqld; ServiceAction: restart; Glyph: 12
Type: separator
Type: item; Caption: "${w_installService}"; Action: multi; Actions: MySQLServiceInstall; Glyph: 8
Type: item; Caption: "${w_removeService}"; Action: multi; Actions: MySQLServiceRemove; Glyph: 7
;WAMPMYSQLSERVICEEND


[StartAll]
;WAMPSTARTALLSTART
Action: service; Service: wampapache; ServiceAction: startresume; Flags: ignoreerrors
Action: service; Service: wampmysqld; ServiceAction: startresume; Flags: ignoreerrors
;WAMPSTARTALLEND

[StopAll]
;WAMPSTOPALLSTART
Action: service; Service: wampapache; ServiceAction: stop; Flags: ignoreerrors
Action: service; Service: wampmysqld; ServiceAction: stop; Flags: ignoreerrors
;WAMPSTOPALLEND

[RestartAll]
;WAMPRESTARTALLSTART
Action: service; Service: wampapache; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: service; Service: wampmysqld; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: service; Service: wampapache; ServiceAction: startresume; Flags: ignoreerrors waituntilterminated
Action: service; Service: wampmysqld; ServiceAction: startresume; Flags: ignoreerrors waituntilterminated
;WAMPRESTARTALLEND

[myexit]
;WAMPMYEXITSTART
Action: service; Service: wampapache; ServiceAction: stop; Flags: ignoreerrors
Action: service; Service: wampmysqld; ServiceAction: stop; Flags: ignoreerrors
Action:  exit
;WAMPMYEXITEND

[apache_mod]
Type: separator; Caption: "${w_apacheModules}"
;WAMPAPACHE_MODSTART
;WAMPAPACHE_MODEND


[ApacheServiceInstall]
;WAMPAPACHESERVICEINSTALLSTART
Action: run; FileName: "${c_phpExe}";Parameters: "-c . testPortForInstall.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run;  FileName: "${c_apacheExe}"; Parameters: "${c_apacheServiceInstallParams}"; ShowCmd: hidden; Flags: waituntilterminated
Action: run; FileName: "reg"; Parameters: "add HKLM\SYSTEM\CurrentControlSet\Services\wampapache /V Start /t REG_DWORD /d 3 /f"; ShowCmd: hidden; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
;WAMPAPACHESERVICEINSTALLEND


[ApacheServiceRemove]
;WAMPAPACHESERVICEREMOVESTART
Action: service; Service: wampapache; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_apacheExe}"; Parameters: "${c_apacheServiceRemoveParams}"; ShowCmd: hidden; Flags: waituntilterminated
Action: resetservices
Action: readconfig;
;WAMPAPACHESERVICEREMOVEEND

[MySQLServiceInstall]
;WAMPMYSQLSERVICEINSTALLSTART
Action: run; FileName: "${c_mysqlExe}"; Parameters: "${c_mysqlServiceInstallParams}"; ShowCmd: hidden; Flags: ignoreerrors waituntilterminated
Action: resetservices; 
Action: readconfig; 
;WAMPMYSQLSERVICEINSTALLEND

[MySQLServiceRemove]
;WAMPMYSQLSERVICEREMOVESTART
Action: service; Service: wampmysqld; ServiceAction: stop; Flags: ignoreerrors waituntilterminated
Action: run; FileName: "${c_mysqlExe}"; Parameters: "${c_mysqlServiceRemoveParams}"; ShowCmd: hidden; Flags: waituntilterminated
Action: resetservices; 
Action: readconfig; 
;WAMPMYSQLSERVICEREMOVEEND



[onlineoffline]
;WAMPONLINEOFFLINESTART
Action: run; FileName: "${c_phpCli}";Parameters: "onlineOffline.php on";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: run; FileName: "${c_phpCli}";Parameters: "refresh.php";WorkingDir: "${c_installDir}/scripts"; Flags: waituntilterminated
Action: service; Service: wampapache; ServiceAction: restart;
Action: resetservices
Action: readconfig;
;WAMPONLINEOFFLINEEND

EOTPL;

?>
