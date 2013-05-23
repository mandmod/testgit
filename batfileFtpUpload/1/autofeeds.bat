ECHO Exporting Feeds
"C:\PATH\TO\ACCESS.EXE" "M:\PATH\TO\DATABASE.mdb" /x "Macro to export feed"
ECHO Feed has been exported.
ECHO:
ECHO Uploading feed...
ECHO:
ECHO -----------------------------------------------------------
ECHO:
ftp -s:ftpfeed.txt ftp.192.168.99.5
ECHO:
ECHO -----------------------------------------------------------
ECHO:
ECHO Feed has been uploaded.
ECHO Automatic Feeds Export is complete.