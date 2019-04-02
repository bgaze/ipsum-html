[< Back](../README.md)

# Nodes documentation

* [Bgaze\IpsumHtml\Nodes\PlainText](#bgazeipsumhtmlnodesplaintext)
* [Bgaze\IpsumHtml\Nodes\Comment](#bgazeipsumhtmlnodescomment)
* [Bgaze\IpsumHtml\Nodes\Node](#bgazeipsumhtmlnodesnode)

## Nodes handling.

All the nodes provide methods to use them fluently and to compile them to string, formatted.

The mains methods to keep in mind, once the node is instanciated, are :

* **append:** append content to the node (accepts scalar, node or array of scalar/nodes).  
This method has not effect on void (self-closing) tags.
* **setAttribute:** add an attribute to the node.  
This method is only available into **Bgaze\IpsumHtml\Nodes\Node** class.
* **minify:** compile the node to a minified string.
* **prettify:** compile the node to a prettified string.

## Bgaze\IpsumHtml\Nodes\PlainText

PlainText node has no attributes and its content is a string.  
Any node added to a PlainText node will be minified and appened to its content.

It's constructor signature is :

```php
/**
 * @param mixed $content        The node content : a "stringable" value, or an array of "stringable" values
 */
public function __construct($content = null)
```

Here are available methods :

**isInline:**

Is the node an inline element?

> Always return `true` for PlainText nodes.

```php
/**
 * @return boolean
 */
public function isInline()
```

**getContent:**

Get the node content.

```php
/**
 * @return string
 */
public function getContent() 
```

**setContent:**

Set the node content.

```php
/**
 * @param mixed $content        The node content : a "stringable" value, or an array of "stringable" values
 * @return $this
 */
public function setContent($content)
```

**append:**

Append content to the node.

```php
/**
 * @param mixed $content        The node content : a "stringable" value, or an array of "stringable" values
 * @return $this
 */
public function append($content) 
```

**minify:**

Compile node to a minified string.

```php
/**
 * Compile node to a minified string
 * @return string
 */
public function minify()
```

**prettify:**

Compile node to a prettified string.

```php
/**
 * @param integer $offset   The number of indentations of the node
 * @param integer $size     The number of space in an indentation level
 * @param integer $wrap     Wrap text lines to not exceed specified length (indentation excluded) 
 * @return string
 */
public function prettify($offset = 0, $size = 4, $wrap = 100)
```

## Bgaze\IpsumHtml\Nodes\Comment

Comment node extends PlainText node.

It has no attributes, its content is an array of nodes.  
Any element added to a node that is not an instance of a node class will be turned into a PlainText node.

It's constructor signature is :

```php
/**
 * @param mixed $content        The node content : node, string, or an array of strings/nodes
 */
public function __construct($content = null)
```

Here are available methods :

**isInline:**

Is the node an inline element?

> If true, all the node content will be minified and the comment will be printed on one line.

```php
/**
 * @return boolean
 */
public function isInline()
```

**setInline:**

Define if the node is an inline element.

```php
/**
 * @param boolean $inline
 */
public function setInline(bool $inline) 
```

**getContent:**

Get the node content

```php
/**
 * @return array
 */
public function getContent()
```

**setContent:**

Set the node content.

```php
/**
 * @param mixed $content        The node content : node, string, or an array of strings/nodes
 * @return $this
 */
public function setContent($content)
```

**append:**

Append content to the node.

```php
/**
 * @param mixed $content        The node content : node, string, or an array of strings/nodes
 * @return $this
 */
public function append($content) 
```

**minifyContent:**

Compile the node content to a minified string.

```php
/**
 * @return string
 */
public function minifyContent()
```

**minify:**

Compile node to a minified string.

```php
/**
 * @return string
 */
public function minify() 
```

**prettifyContent:**

Compile the node content to a prettified string.

```php
/**
 * @param integer $offset   The number of indentations of the node
 * @param integer $size     The number of space in an indentation level
 * @param integer $wrap     Wrap text lines to not exceed specified length (indentation excluded) 
 * @return string
 */
public function prettifyContent($offset = 0, $size = 4, $wrap = 100)
```

**prettify:**

Compile node to a prettified string.

```php
/**
 * @param integer $offset   The number of indentations of the node
 * @param integer $size     The number of space in an indentation level
 * @param integer $wrap     Wrap text lines to not exceed specified length (indentation excluded) 
 * @return string
 */
public function prettify($offset = 0, $size = 4, $wrap = 100) 
```

## Bgaze\IpsumHtml\Nodes\Node

Node extends Comment class.

Node instance has attributes, content is an array of nodes except for void elements (self closing tags) that have no content.  
Any element added to a node that is not an instance of a node class will be turned into a PlainText node.

Node's constructor signature is :

```php
/**
 * The class constructor.
 * 
 * @param string $tag           The node tag
 * @param mixed $content        The node content : node, string, or an array of strings/nodes
 */
public function __construct($tag, $content = null)
```

### Void nodes

HTML void elements are self closing tags, such as `link` or `input`.  
They have no content and only accept attributes: any content related method will have no effect.

Void elements are inline, and this status cannot be changed : a void element will always be printed on one line.

The void status is automatically set when instanciating the node based on this hardcoded list:  
**area**, **base**, **br**, **col**, **embed**, **hr**, **img**, **input**, **link**, **meta**, **param**, **source**, **track**, **wbr**

### Inline nodes

Inline elements will be printed on one line.  

The inline status is automatically set when instanciating the node based on this hardcoded list:  
**a**, **abbr**, **acronym**, **b**, **bdi**, **bdo**, **button**, **caption**, **cite**,
**code**, **data**, **dd**, **del**, **dfn**, **dt**, **em**, **figcaption**, **h1**,
**h2**, **h3**, **h4**, **h5**, **h6**, **i**, **kbd**, **label**, **legend**, **li**,
**mark**, **option**, **pre**, **q**, **rp**, **rt**, **s**, **samp**, **small**, **span**,
**strong**, **sub**, **sup**, **td**, **th**, **time**, **title**, **u**, **var**, **script**

Except for void elements, that are always inline, the inline status can be changed using **setInline** method.

### Available methods

**isVoid:**

Is the node a void element (self closing tag)?

```php
/**
 * @return boolean
 */
public function isVoid() 
```

**getTag:**

Get the node tag.

```php
/**
 * @return string
 */
public function getTag() 
```

**setTag:**

Set the node tag.

```php
/**
 * @param string $tag
 * @return $this
 * @throws \Exception   $tag MUST match /^[a-zA-Z]([a-zA-Z0-9])*$/
 */
public function setTag($tag)
```

**getAttributes:**

Get the node attributes.

```php
/**
 * @return array
 */
public function getAttributes()
```

**setAttributes:**

Set the node attributes.

```php
/**
 * @param array $attributes
 * @return $this
 */
public function setAttributes(array $attributes) 
```

**setAttribute:**

Set an attribute value.

```php
/**
 * @param string $key
 * @param string $value
 * @return $this
 */
public function setAttribute($key, $value) 
```

**getAttribute:**

Get an attribute value.

```php
/**
 * @param string $key
 * @return string|null
 */
public function getAttribute($key)
```

**append:**

Append child or children to the node.

```php
/**
 * @param mixed $content        The node content : node, string, or an array of strings/nodes
 * @return $this
 */
public function append($content)
```

**compileAttributes:**

Compile node attributes to a string.

```php
/**
 * @return string
 */
protected function compileAttributes() 
```

**minify:**

Compile node to a minified string.

```php
/**
 * @return string
 */
public function minify()
```

**prettify:**

Compile node to a prettified string.

```php
/**
 * @param integer $offset   The number of indentations of the node
 * @param integer $size     The number of space in an indentation level
 * @param integer $wrap     Wrap text lines to not exceed specified length (indentation excluded) 
 * @return string
 */
public function prettify($offset = 0, $size = 4, $wrap = 100) 
```
