[< Back](../README.md)

# Nodes documentation

## Nodes handling.

All the nodes provide methods to use them fluently and to compile them to string, formatted.

The mains methods to keep in mind, once the node is instanciated, are :

**append:**

Append content to the node.
It accepts scalar, node or array of scalar/nodes.

> This method has not effect on void (self-closing) tags.

```php
/**
 * @param mixed $content    The content of the node
 * @return $this
 */
public function append($content)
```

**setAttribute:**

Add an attribute to the node.

> This method is only available into **Bgaze\IpsumHtml\Nodes\Node** class.

```php
/**
 * @param mixed $content    The content of the node
 * @return $this
 */
public function append($content)
```

**minify:**

Compile the node to a minified string.

```php
/**
 * @return string
 */
public function minify()
```

**prettify:**

Compile the node to a prettified string.

```php
/**
 * @param integer $offset   The number of indentations of the node
 * @param integer $size     The number of space in an indentation level
 * @param integer $wrap     Wrap text lines to not exceed specified length (indentation excluded) 
 * @return string
 */
public function prettify($offset = 0, $size = 4, $wrap = 100)
```

## Bgaze\IpsumHtml\Nodes\PlainText

TODO

## Bgaze\IpsumHtml\Nodes\Comment

TODO

## Bgaze\IpsumHtml\Nodes\Node

TODO