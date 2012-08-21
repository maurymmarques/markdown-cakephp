# Markdown plugin for CakePHP

Copyright 2012, Maury M. Marques
Licensed under The MIT License
Redistributions of files must retain the above copyright notice.


### Markdown

PHP Markdown is a port to PHP of the [Markdown](http://daringfireball.net/projects/markdown) program written by John Gruber.

“Markdown” is two things: a plain text markup syntax, and a software tool that converts the plain text markup to HTML for publishing on the web.

More info: http://michelf.com/projects/php-markdown

For this plugin, the application Markdown is inside Vendor

### Version

Written for CakePHP 2.0+


### Installation

You can clone the plugin into your project (or if you want you can use as a [submodule](http://help.github.com/submodules)):

```
cd path/to/app/Plugin or /plugins
git clone https://github.com/maurymmarques/markdown-cakephp.git Markdown
```

Bootstrap the plugin in app/Config/bootstrap.php:

```php
<?php
CakePlugin::load(array('Markdown' => array('bootstrap' => true)));
```


### Usage

Enable the helper using the [plugin syntax](http://book.cakephp.org/2.0/en/appendices/glossary.html#term-plugin-syntax)

If desired, set the component to assist with the return of data from the markdown.

```php
<?php
// in app/Controller/BakeriesController.php
class BakeriesController extends AppController {

		public $helpers = array('Markdown.Markdown');

		public function index() {
			$this->set('textInMarkdownFormat', $yourTextInMarkdownFormat);
		}
}
```

Or, if the markdown content is in a file...

```php
<?php
// in app/Controller/BakeriesController.php
class BakeriesController extends AppController {

		public $helpers = array('Markdown.Markdown');
		public $components = array('Markdown.Markdown');

		public function index() {
			$this->set('textInMarkdownFormat', $this->Markdown->getFile($pathToMarkdownFile));
		}
}
```

In the view you can use something like:

```php
<?php
// in app/View/Bakeries/index.ctp
echo $this->Markdown->transform($textInMarkdownFormat);
```