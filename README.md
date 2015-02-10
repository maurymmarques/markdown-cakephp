# Markdown plugin for CakePHP

This plugin facilitates the use of PHP Markdown with CakePHP

PHP Markdown is a port to PHP of the [Markdown](http://daringfireball.net/projects/markdown) program written by John Gruber.

“Markdown” is two things: a plain text markup syntax, and a software tool that converts the plain text markup to HTML for publishing on the web.

More info: http://michelf.com/projects/php-markdown

For this plugin, the application Markdown is inside Vendor

### Version

Written for CakePHP 2.x

### Copyright

Copyright (c) 2011 Maury M. Marques

## Installation

You can install this plugin using Composer, GIT Submodule, GIT Clone or Manually

_[Using [Composer](http://getcomposer.org/)]_

Add the plugin to your project's `composer.json` - something like this:

```javascript
{
  "require": {
    "maurymmarques/markdown-plugin": "dev-master"
  },
  "extra": {
    "installer-paths": {
      "app/Plugin/Markdown": ["maurymmarques/markdown-plugin"]
    }
  }
}
```
Then just run `composer install`

Because this plugin has the type `cakephp-plugin` set in it's own `composer.json`, composer knows to install it inside your `/Plugin` directory, rather than in the usual vendors file.

_[GIT Submodule]_

In your app directory (`app/Plugin`) type:

```bash
git submodule add git://github.com/maurymmarques/markdown-cakephp.git Plugin/Markdown
git submodule init
git submodule update
```

_[GIT Clone]_

In your plugin directory (`app/Plugin` or `plugins`) type:

```bash
git clone https://github.com/maurymmarques/markdown-cakephp.git Markdown
```

_[Manual]_

* Download the [Markdown archive](https://github.com/maurymmarques/markdown-cakephp/archive/master.zip).
* Unzip that download.
* Rename the resulting folder to `Markdown`
* Then copy this folder into `app/Plugin/` or `plugins`

## Configuration

Bootstrap the plugin in app/Config/bootstrap.php:

```php
CakePlugin::load(array('Markdown' => array('bootstrap' => true)));
```

## Usage

Enable the helper using the [plugin syntax](http://book.cakephp.org/2.0/en/appendices/glossary.html#term-plugin-syntax)

If desired, set the component to assist with the return of data from the markdown.

```php
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
// in app/View/Bakeries/index.ctp
echo $this->Markdown->transform($textInMarkdownFormat);
```

In the model you can use something like:

```php
// in app/Model/Bakery.php
class BakeryModel extends AppModel {
	
	public $actsAs = array('Markdown.Markdown');

	public function beforeSave($options = array()) {
		$this->data[$this->alias]['text_html'] = $this->transform( $this->data[$this->alias]['text_md'] );
		return true;
	}
}
