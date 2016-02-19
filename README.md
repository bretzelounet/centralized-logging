# Centralized logging
Centralized logging for MaprR

## Setup
Download the project as a .zip and unarchive it somewhere in your web tree :

* `/var/www/logs` (Ubuntu/Debian)

* `/var/www/html/logs` (Centos/RHEL) e.g.


Add the web server user in the sudoer file : 

* use the command  `visudo` 

* and add the line : `apache ALL=(ALL) NOPASSWD: /var/www/html/logs/content.sh`


## Main stack
<ul>
<li>Codeigniter</li>
<li>Materializecss</li>
</ul>
