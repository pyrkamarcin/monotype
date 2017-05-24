@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/ramsey/uuid-console/bin/uuid
php "%BIN_TARGET%" %*
