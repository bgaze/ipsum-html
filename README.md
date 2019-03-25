# bgaze/html-ipsum

A PHP utility that allows to generate Lorem Ipsum HTML.  
It is usefull to generate fake HTML content, for instance when building a CMS app.

It ships three main classes that are detailed in following documentation:

+ **Bgaze\IpsumHtml\Ipsum:** generates random Ipsum Ipsum text.
+ **Bgaze\IpsumHtml\Html:** creates HTML structures. They can be manipulated fluently, minified and prettyfied.
+ **Bgaze\IpsumHtml\IpsumHtml:** creates HTML structures randomly populated with Lorem Ipsum text.

All this classes methods are statics. 

## Note about code completion

IpsumHtml does an heavy usage of PHP `__callStatic` method, so using phpDocumentor is necessary to provide code completion.  
Sadly, the phpDocumentor `@method` tag isn't well handled by many editors when using the `static` modifier.

A workaround, used in this lib, is to declared static methods as non-static into phpDocumentor blocks, 
then to configure the IDE to allow non-static methos after `::`.  
In Netbeans IDE, that I use, you can do that by checking "Also Non-Static Methods after ::" into "Tools > Options > Code Completion > PHP".

## Installation

Simply install the library using composer :

```
composer install bgaze/html-faker
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

## Bgaze\IpsumHtml\Ipsum


This class generates the Lorem Ipsum text.  
It offers three main methods :

+ **str:** generates a simple string of Lorem Ipsum.
+ **sentence:** generates a simple string of Lorem Ipsum with first letter capitalized and trailing dot if requested.
+ **str:** generates a Lorem Ipsum text composed of distinct sentences and randomly decorated with HTML inline tags if requested.

```php
use Bgaze\IpsumHtml\Ipsum;

$str = Ipsum::str(5);
// => eius totam possimus at necessitatibus

$str = Ipsum::sentence(5);
// => Ab odit exercitationem id doloribus.

$str = Ipsum::sentence(4, false);
// => Quos omnis optio repellendus

$str = Ipsum::text(20);
// => Alias vitae amet non nemo quas perspiciatis laborum officiis eveniet delectus. Sit neque suscipit autem id vero. Corrupti assumenda accusamus.

$str = Ipsum::text(20, true);
// The default tag list is : ['var', 'abbr', 'sub', 'sup', 'a', 'em', 'strong', 'small', 's', 'q', 'i', 'b', 'u', 'mark', 'br']
// => Aut illo ullam esse itaque.<br/> <sup>Accusantium saepe</sup> eius veniam iusto reiciendis consequuntur dolorem minima <i>harum libero</i> officiis velit tempora totam.

$str = Ipsum::text(20, ['a', 'strong']);
// => Et quasi odit ut nulla <a href="#">explicabo rem culpa facere</a> doloremque sequi nihil accusamus delectus <strong>ullam voluptatum</strong> id harum delectus aliquid.
```

