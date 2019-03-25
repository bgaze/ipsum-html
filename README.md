> **Note about code completion**  
> IpsumHtml does an heavy usage of PHP `__callStatic` method, so using phpDocumentor is necessary to provide code completion.
> Sadly, the phpDocumentor `@method` tag isn't well handled by many editors when using the `static` modifier.
> 
> A workaround, used in this lib, is to declared static methods as non-static into phpDocumentor blocks, 
> then to configure the IDE to allow non-static methods after `::`.  
> In Netbeans IDE, you can do that by checking `Also Non-Static Methods after ::` into `Tools > Options > Code Completion > PHP`.

# IpsumHtml

A PHP utility that allows to generate Lorem Ipsum HTML.  
It is usefull to generate fake HTML content, for instance when building a CMS app.

It ships three main classes that are detailed in following documentation:

+ [Bgaze\IpsumHtml\IpsumHtml](doc/ipsum-html.md): creates HTML structures randomly populated with Lorem Ipsum text.
+ [Bgaze\IpsumHtml\Html](doc/html.md): creates HTML structures. They can be manipulated fluently, minified and prettyfied.
+ [Bgaze\IpsumHtml\Ipsum](doc/ipsum.md): generates random Ipsum Ipsum text.

All this classes methods are statics. 

## Installation

Simply install the library using composer:

```
composer require bgaze/ipsum-html
```

## Basic usage

Import the `IpsumHtml` class into your script, then use it statics methods to generate what you need.

```php
use Bgaze\IpsumHtml\IpsumHtml;

// Generate 50 random html blocks then display them prettyfied.
$array = IpsumHtml::random(50);

// Generate a full webpage containing 100 random html blocks and print it prettyfied.
echo IpsumHtml::webpage(100);

// Generate and display a HTML table with 4 colums and 10 rows, then print it minified.
echo IpsumHtml::table(4, 10)->minify();
```



