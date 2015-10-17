# rcc-enable
Remote Call Control Enable Script

CUPS RCC ENABLE SCRIPT
Author: Tim Franklin
Contact: tim@tripplehelix.net
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
DEPENDENCIES:

php-cli-5.4.16-23.el7_0.3.x86_64
php-common-5.4.16-23.el7_0.3.x86_64
php-5.4.16-23.el7_0.3.x86_64
php-soap-5.4.16-23.el7_0.3.x86_64

USAGE:

Execute the following from command line, ensure the user account executing the script has rights to write the file system in the directory from which the script is executing.

php rcc-enable.php <USERNAME> <PASSWORD> <CUPS PUBLISHER SERVER IP>

The script runs silently all results will be written to a file rcc-enablelog-<SERVER IP>.txt
