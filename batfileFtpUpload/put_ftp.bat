@echo off
call MM.url
:loop
ftp -s:userftp.ftpfile 192.168.99.5

ping 1.1.1.1 -n 1 -w 5000>nul


goto loop