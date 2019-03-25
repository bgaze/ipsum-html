## Bgaze\IpsumHtml\Html

This class offers statics methods to create HTML nodes that you can manipulate fluently, and print minified or prettyfied.  

There are three types of HTML nodes, handled by a dedicated class.  
They can be manipulated fluently, and printed minified or prettyfied.  
The node `__toString` method is an alias to the `prettify` method.  

+ **Bgaze\IpsumHtml\Nodes\PlainText**  
PlainText node has no attributes, content is a string.  
Any element added to a node that is not ans instance of a node class will be turned into a PlainText node.  
+ **Bgaze\IpsumHtml\Nodes\Comment**  
Comment node has no attributes, content is an array of nodes.
+ **Bgaze\IpsumHtml\Nodes\Node**  
Node instance has attributes, content is an array of nodes except for void elements (self closing tags) that have no content.  

`Html` class offers methods to instanciate easily this nodes.
 
Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for all non obsoletes and non experimentals tags listed on [https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5](https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5)

### Manipulating nodes


### PlainText nodes

PlainTexts node can be created using the `Html::txt` method:

```php
/**
 * Create and returns a plain text node.
 * 
 * @param string $content
 * @return Bgaze\IpsumHtml\Nodes\PlainText
 */
public static function txt($content = null)
```

<details>
<summary>Example</code></summary>
<p>

```php
$txt = Html::txt('Ab illo aspernatur magnam cum at.')
    ->append(' Sunt consequuntur numquam nisi reprehenderit distinctio fugiat aspernatur magnam cum at.');

echo $txt->minify() . "\n\n";
echo $txt . "\n\n";
echo $txt->prettify(1, 2, 50);
```

Result:

```
Ab illo aspernatur magnam cum at. Sunt consequuntur numquam nisi reprehenderit distinctio fugiat aspernatur magnam cum at.

Ab illo aspernatur magnam cum at. Sunt consequuntur numquam nisi reprehenderit distinctio fugiat
aspernatur magnam cum at.

  Ab illo aspernatur magnam cum at. Sunt
  consequuntur numquam nisi reprehenderit distinctio
  fugiat aspernatur magnam cum at.
```

</p>
</details> 

### Comment nodes

Comment nodes can be created using the `Html::comment` method:

```php
/**
 * Create and returns a comment node.
 * 
 * @param mixed $content
 * @return Bgaze\IpsumHtml\Nodes\Comment
 */
public static function comment($content = null)
```

<details>
<summary>Example</code></summary>
<p>

```php
$comment = Html::comment('Ab illo aspernatur magnam cum at.')
        ->append(Html::p('Sunt consequuntur numquam nisi reprehenderit'))
        ->append('Distinctio fugiat aspernatur magnam cum at.');

echo $comment->minify() . "\n\n";
echo $comment . "\n\n";
echo $comment->prettify(1, 2, 50);
```

Result:

```html
<!-- Ab illo aspernatur magnam cum at.<p>Sunt consequuntur numquam nisi reprehenderit</p>Distinctio fugiat aspernatur magnam cum at. -->

<!--
    Ab illo aspernatur magnam cum at.
    <p>
        Sunt consequuntur numquam nisi reprehenderit
    </p>
    Distinctio fugiat aspernatur magnam cum at.
-->

  <!--
    Ab illo aspernatur magnam cum at.
    <p>
      Sunt consequuntur numquam nisi reprehenderit
    </p>
    Distinctio fugiat aspernatur magnam cum at.
  -->
```

</p>
</details> 

### Bgaze\IpsumHtml\Nodes\Node

Node instance has attributes, content is an array of nodes except for void elements (self closing tags) that have no content.

Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for all non obsoletes and non experimentals tags listed on [https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5](https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5)

There is two types of methods which signature is different:

+ **Void elements:** `Html::tagName(array $attributes = [])`  
Void elements are: area, base, br, col, embed, hr, img, input, link, meta, param, source, track, wbr.
+ **Other elements:** `Html::tagName($content = null, array $attributes = [])`  
The `$content` can be a string, a node or an array of strings and nodes.

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

