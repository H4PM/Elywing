# ![PocketMine-MP](http://image.noelshack.com/fichiers/2016/43/1477490625-elybanner.png)
###Elywing is now updated for MC:PE 1.0.3 [Windows 10 + Pocket Edition] 

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU Lesser General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Lesser General Public License for more details.

	You should have received a copy of the GNU Lesser General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

### How to get a server phar (assuming server has been setup once already)
1. Download the .zip from GitHub
2. Open Elywing-master and put the `src` file into the server folder. (DELETE OTHER SERVER PHARS, ONLY HAVE SRC)
3. Download [DevTools.phar](https://jenkins.pmmp.io/job/PocketMine-MP%20DevTools/) and place it in your plugins folder.
4. Run the server, and do /makeserver. Wait until it has finished, this can take a couple minutes.
5. Now go to plugins/DevTools/ and you can find elywing.phar.
6. Delete src from your server directory and place elywing.phar into the directory.
7. Start the server

__Elywing is a free, open-source software that creates Minecraft: Pocket Edition servers and allows extending its functionalities__

__Elywing no longer supports MCRegion worlds, as they are deprecated.__

### Elywing, a fork of PocketMine-MP, modified by

### [Twitter @SuperMaXAleX](https://twitter.com/SuperMaXAleX/)

### [Twitter @ReskillDEV](https://twitter.com/ReskillDEV/)

### [Twitter @Misteboss_mcpe](https://twitter.com/Misteboss_mcpe/)

### [Twitter @Pab45O](https://twitter.com/Pab45O/)

### [Twitter @muqsitrayyan](https://twitter.com/muqsitrayyan/)

### [Twitter @XenialDan/@thebigsmileXD](https://twitter.com/xenialdan/)

### [Twitter @AppleDevelops](https://twitter.com/AppleDevelops/)

### [Elywing's Twitter](https://twitter.com/elywing_h4pm/)

## Third-party Libraries/Protocols Used
* __[PHP Sockets](http://php.net/manual/en/book.sockets.php)__
* __[PHP mbstring](http://php.net/manual/en/book.mbstring.php)__
* __[PHP SQLite3](http://php.net/manual/en/book.sqlite3.php)__
* __[PHP BCMath](http://php.net/manual/en/book.bc.php)__
* __[PHP pthreads](http://pthreads.org/)__ by _[krakjoe](https://github.com/krakjoe)_: Threading for PHP - Share Nothing, Do Everything.
* __[PHP YAML](https://code.google.com/p/php-yaml/)__ by _Bryan Davis_: The Yaml PHP Extension provides a wrapper to the LibYAML library.
* __[LibYAML](http://pyyaml.org/wiki/LibYAML)__ by _Kirill Simonov_: A YAML 1.1 parser and emitter written in C.
* __[cURL](http://curl.haxx.se/)__: cURL is a command line tool for transferring data with URL syntax
* __[Zlib](http://www.zlib.net/)__: A Massively Spiffy Yet Delicately Unobtrusive Compression Library
* __[Source RCON Protocol](https://developer.valvesoftware.com/wiki/Source_RCON_Protocol)__
* __[UT3 Query Protocol](http://wiki.unrealadmin.org/UT3_query_protocol)__
