# Centralized logging
Centralized logging for MaprR

## Setup
1. Download the project as a .zip and unarchive it somewhere in your web tree :

`/var/www/centralized_logging` (Ubuntu/Debian) or `/var/www/html/centralized_logging` (Centos/RHEL) e.g.

2. (Optional) You may encounter some issues with log files permissions.
To resolve this, add the web server user in the sudoer file : 

`visudo` and add the line : `apache ALL=NOPASSWD:/bin/bash`


## Main stack
<ul>
<li>Codeigniter</li>
<li>Materializecss</li>
</ul>
