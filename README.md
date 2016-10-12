# Utils

Library of several utilities for PHP applications.


Installation
------------

    composer require cybtow/utils "^0.1"


CtrlTime library
----------------
`
use Cybtow\Utils\CtrlTime;

$CtrlTime = new CtrlTime();
$CtrlTime->start();
// code here
echo $CtrlTime->time(); //show time between here and start.
`

FileSystem library
------------------
* mkdir: Create a directory.
* rrmdir: Delete a tree directory recursively.


GMTDateTime library
-------------------
This class extends from PHP \DateTime.


Less library
------------
This class is a wrapper for oyejorge/less.php library (https://github.com/oyejorge/less.php/tree/master)
`
use Cybtow\Utils\Less;

$Less = new Less();
$in = 'main.less';
$out = 'main.css';

$Less->options['cache_dir'] = './cacheless';
$Less->variables['my_color'] = '#ffaabb';
$Less->parseFile($in, '', array(), $out);
`

Utils library
-------------
* slug: Create a valid string for urls
* getUniqId: Return a unique random id
* echoVarDump: Prints a var dump and exists (optionaly)
