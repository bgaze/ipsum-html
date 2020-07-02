# IpsumHtml

IpsumHtml is a PHP utility that allows to generate Lorem Ipsum HTML 5.  

> The HTML5 reference used to build this lib is [https://developer.mozilla.org/en-US/docs/Web/HTML/Element]().  
> No support for any older version of HTML is planned.

## Installation

Simply install the library using composer:

```
composer require bgaze/ipsum-html
```

## Basic usage

To quickly generate Lorem Ipsum HTML, import the `IpsumHtml` class into your script, 
then use it statics methods to generate what you need.

```php
use Bgaze\IpsumHtml\IpsumHtml;

// Generate 50 random html blocks.
$array = IpsumHtml::random(50);

// Generate a full webpage containing 100 random html blocks and print it prettyfied.
echo IpsumHtml::webpage(100);

// Generate and display a HTML table with 4 colums and 10 rows, then print it minified.
echo IpsumHtml::table(4, 10)->minify();
```

## Documentation

IpsumHtml ships three main classes which all methods are statics:

* **Bgaze\IpsumHtml\IpsumHtml:** creates HTML nodes randomly populated with Lorem Ipsum text.
* **Bgaze\IpsumHtml\Html:** creates HTML nodes. They can be manipulated fluently, minified and prettyfied.
* **Bgaze\IpsumHtml\Ipsum:** generates random Ipsum Ipsum text.

There are three types of HTML nodes, handled by a dedicated class:  

* **Bgaze\IpsumHtml\Nodes\PlainText:** used to handle plain text sections of HTML structures.  
* **Bgaze\IpsumHtml\Nodes\Comment:** used to handle the special HTML comment tag.
* **Bgaze\IpsumHtml\Nodes\Node:** used to handle any other HTML tag.  

You can find documentation into following sections:

* [Bgaze\IpsumHtml\IpsumHtml](doc/ipsum-html.md)
* [Bgaze\IpsumHtml\Html](doc/html.md)
* [Bgaze\IpsumHtml\Ipsum](doc/ipsum.md)
* [Nodes documentation](doc/nodes.md)
