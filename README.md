# IpsumHtml

IpsumHtml is a PHP utility that allows to generate Lorem Ipsum HTML.  

## Installation

Simply install the library using composer:

```
composer require bgaze/ipsum-html
```

## Basic usage

To quickly generate Lorme Ipsum HTML, import the `IpsumHtml` class into your script, 
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

> **Note about code completion**  
> IpsumHtml does an heavy usage of PHP `__callStatic` method, so using phpDocumentor is necessary to provide code completion.
> Sadly, the phpDocumentor `@method` tag isn't well handled by many editors when using the `static` modifier.
> 
> A workaround, used in this lib, is to declared static methods as non-static into phpDocumentor blocks, 
> then to configure the IDE to allow non-static methods after `::`.  
> In Netbeans IDE, you can do that by checking `Also Non-Static Methods after ::` into `Tools > Options > Code Completion > PHP`.

IpsumHtml ships three main classes which all methods are statics:

* **Bgaze\IpsumHtml\IpsumHtml:** creates HTML nodes randomly populated with Lorem Ipsum text.
* **Bgaze\IpsumHtml\Html:** creates HTML nodes. They can be manipulated fluently, minified and prettyfied.
* **Bgaze\IpsumHtml\Ipsum:** generates random Ipsum Ipsum text.

There are three types of HTML nodes, handled by a dedicated class.  
They can be manipulated fluently, and printed minified or prettyfied.  

* **Bgaze\IpsumHtml\Nodes\PlainText:** used to handle plain text sections of HTML structures.  
* **Bgaze\IpsumHtml\Nodes\Comment:** used to handle the special HTML comment tag.
* **Bgaze\IpsumHtml\Nodes\Node:** used to handle any other HTML tag.  

You can find documentation for each class in a dedicated page:

* [Bgaze\IpsumHtml\IpsumHtml](doc/ipsum-html.md)
* [Bgaze\IpsumHtml\Html](doc/html.md)
* [Bgaze\IpsumHtml\Ipsum](doc/ipsum.md)
* [Bgaze\IpsumHtml\Nodes\PlainText](doc/plain-text-node.md)
* [Bgaze\IpsumHtml\Nodes\Comment](doc/comment-node.md)
* [Bgaze\IpsumHtml\Nodes\Node](doc/standart-node.md)
