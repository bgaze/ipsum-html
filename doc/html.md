[< Back](../README.md#documentation)

## Bgaze\IpsumHtml\Html

This class offers statics methods to create HTML nodes that you can manipulate fluently, and print minified or prettyfied.  

There are three types of HTML nodes, handled by a dedicated class:  

+ **Bgaze\IpsumHtml\Nodes\PlainText** ([documentation](./nodes.md#bgazeipsumhtmlnodesplaintext))  
PlainText node has no attributes, content is a string.  
+ **Bgaze\IpsumHtml\Nodes\Comment** ([documentation](./nodes.md#bgazeipsumhtmlnodescomment))  
Comment node has no attributes, content is an array of nodes.
+ **Bgaze\IpsumHtml\Nodes\Node** ([documentation](./nodes.md#bgazeipsumhtmlnodesnode))  
Node instance has attributes, content is an array of nodes except for void elements (self closing tags) that have no content.  

> Any element that is not an instance of a node class will be turned into a PlainText node when added to a node.  

### PlainText nodes

PlainTexts node can be created using the `Html::txt` method:

```php
/**
 * @param string $content
 * @return Bgaze\IpsumHtml\Nodes\PlainText
 */
public static function txt($content = null)
```

### Comment nodes

Comment nodes can be created using the `Html::comment` method:

```php
/**
 * @param mixed $content
 * @return Bgaze\IpsumHtml\Nodes\Comment
 */
public static function comment($content = null)
```

### Standart HTML nodes

 
Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for all non obsoletes and non experimentals tags listed on [https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5](https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5)

There is two types of methods which signature is different.

#### Void elements

Void elements are: **area**, **base**, **br**, **col**, **embed**, **hr**, **img**, **input**, **link**, **meta**, **param**, **source**, **track**, **wbr**.

They only have attributes: any content related method will have no effect.

The methods signature is :

```php
/**
 * @param array $attributes     An associative array of attributes: ['attribute name' => 'attribute value']
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tagName($attributes = [])
```

Examples:

```php
$node = Html::input(['id' => 'input', 'type' => 'text']);
echo $node->minify();
echo "\n\n";
echo $node;
echo "\n\n";
echo $node->prettify(1, 2, 50);

/*
<input id="input" type="text"/>

<input id="input" type="text"/>

  <input id="input" type="text"/>
*/
```

#### Other elements

They have attributes and content.

The methods signature is :

```php
/**
 * @param mixed $content        The content of the node: string/node/array
 * @param array $attributes     An associative array of attributes: ['attribute name' => 'attribute value']
 * @return Bgaze\IpsumHtml\Nodes\Node
 */
public static function tagName($content = null, $attributes = [])
```

Examples:

```php
$node = Html::ul([
    Html::li('One')->setAttribute('class', 'one'),
    Html::li('Two')->setAttribute('class', 'two'),
    Html::li('Three')->setAttribute('class', 'three'),
], ['id' => 'ul', 'class' => 'ul']);

echo $node->minify();
echo "\n\n";
echo $node;
echo "\n\n";
echo $node->prettify(1, 2, 50);

/*
<ul id="ul" class="ul"><li class="one">One</li><li class="two">Two</li><li class="three">Three</li></ul>

<ul id="ul" class="ul">
    <li class="one">One</li>
    <li class="two">Two</li>
    <li class="three">Three</li>
</ul>

  <ul id="ul" class="ul">
    <li class="one">One</li>
    <li class="two">Two</li>
    <li class="three">Three</li>
  </ul>
*/
```
