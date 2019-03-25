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

+ [Bgaze\IpsumHtml\IpsumHtml](#bgazeipsumhtmlipsumhtml): creates HTML structures randomly populated with Lorem Ipsum text.
+ [Bgaze\IpsumHtml\Ipsum](#bgazeipsumhtmlipsum): generates random Ipsum Ipsum text.
+ [Bgaze\IpsumHtml\Html](#bgazeipsumhtmlhtml): creates HTML structures. They can be manipulated fluently, minified and prettyfied.

All this classes methods are statics. 

## Installation

Simply install the library using composer :

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

## Bgaze\IpsumHtml\IpsumHtml

This class offers statics methods to create HTML nodes populated with Lorem Ipsum text.
You can manipulate them fluently, and print minified or prettyfied.

Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for most of common HTML content tags.

### Generators

`IpsumHtml` class provides thre "generator" methods, that allow to generate randomly a large amount of Lorem Ipsum HTML.

```php
echo implode("\n\n", IpsumHtml::random(20));
```

<details>
<summary>See results</summary>
<p>

```html
\<p>
    Perferendis in nihil excepturi quo labore expedita quo temporibus. Suscipit dignissimos atque
    accusamus sit sed consequuntur minima harum earum doloremque sequi labore nostrum praesentium
    officia eos consectetur deserunt officiis repudiandae \<b>esse a\</b> aliquid eum officia porro.
    Veritatis sed modi unde dolorum. \<a href="#">Dicta ipsam in porro\</a> explicabo dolorem aliquid
    cupiditate soluta.
\</p>

\<pre>\<code>&lt;ol&gt;
 &lt;li&gt;Alias nemo autem molestias sint tenetur maiores. Voluptates.&lt;/li&gt;
 &lt;li&gt;Eos iure cupiditate officia deserunt animi officiis. Laboriosam cumque assumenda.&lt;/li&gt;
 &lt;li&gt;Qui quos nobis possimus delectus voluptatibus. Eum corrupti.&lt;/li&gt;
&lt;/ol&gt;

&lt;img src=&quot;https://picsum.photos/640/480/?random&quot; alt=&quot;inventore neque consectetur adipisci ea nihil cumque earum asperiores&quot;/&gt;\</code>\</pre>

\<ol>
    \<li>Dolorem adipisci numquam veniam id quo minus. Ex ea.\</li>
    \<li>Sed quia dolore harum libero porro assumenda repellendus recusandae.\</li>
\</ol>

\<p>
    Reprehenderit occaecati cumque a. \<a href="#">Vel natus maxime delectus\</a> eaque architecto dolore
    veniam expedita a quam molestiae iusto fuga nam temporibus quae aspernatur dolores reprehenderit
    quidem repudiandae dolore exercitationem distinctio vero debitis veritatis iusto necessitatibus
    voluptates.
\</p>

\<img src="https://picsum.photos/g/640/480/?random" alt="veritatis et quia dolor non laboriosam voluptate quidem tempore"/>

\<p>
    Ipsum voluptate dignissimos soluta nobis impedit ipsum laboriosam occaecati officia animi nam.
    Architecto ut dolore iure rem eveniet. Vitae quia neque fuga nulla. Nostrum reprehenderit excepturi
    soluta saepe earum \<s>quae magnam rerum vero\</s>. Sit dolorem fuga cumque ad nemo error mollitia
    \<strong>voluptatem qui consectetur porro\</strong> modi perspiciatis id impedit quibusdam accusamus
    \<abbr>magni dolorem corrupti\</abbr> ipsa odit veniam in voluptate voluptates quasi nesciunt eum
    animi quibusdam exercitationem deleniti quo.
\</p>

\<!--
    doloremque dicta odit quia ratione ut magnam aliquam ipsam ex eum perspiciatis omnis iste cum nobis
    impedit minus possimus assumenda debitis saepe a
    
    \<bq>
        Illo quaerat in iusto maxime temporibus doloremque eaque esse minus nostrum corporis nihil animi
        tenetur perferendis officia distinctio quibusdam at voluptatem dicta iste quod placeat eveniet
        perferendis illo ut molestiae molestias cumque dicta explicabo voluptatum corrupti perspiciatis
        repudiandae labore nostrum quam sint similique quia rem omnis minus quod numquam tempora iure
        similique. Nemo eum corrupti quisquam possimus. Alias vel laborum assumenda asperiores accusantium
        eaque labore nemo quasi adipisci natus libero impedit voluptatibus.
    \</bq>
    
    alias dicta aspernatur nesciunt neque eius eum voluptate nihil sint occaecati cupiditate natus animi
    soluta porro possimus quibusdam illum officiis doloribus
-->

\<p>
    Illo ipsum perspiciatis tempore amet minima aliquid debitis sunt nesciunt commodi temporibus tenetur
    architecto quam facilis earum.\<br/>
     Qui neque adipisci atque delectus \<a href="#">deserunt recusandae\</a>.\<br/>
     Ab dolor consectetur iste harum et velit reprehenderit quam reiciendis corporis blanditiis
    voluptatum atque optio voluptatibus explicabo sed commodi sapiente fugit assumenda temporibus
    fugiat. Odio molestias harum rerum optio cupiditate facilis distinctio eligendi \<b>quis voluptate
    cupiditate vero\</b> consequatur quaerat similique rerum libero facere fugit odio corrupti quos
    \<s>iure assumenda\</s>. Accusantium eaque ex nihil iste soluta.
\</p>

\<!-- ipsa explicabo neque dolor nostrum suscipit commodi totam nam reiciendis -->

\<p>
    Consectetur suscipit iste distinctio \<strong>sed consequuntur nisi\</strong> qui consectetur autem
    totam eaque veritatis dolore exercitationem voluptatum doloribus aut aliquam impedit tenetur sunt ad
    esse dolorum libero voluptates illo vitae dolore excepturi voluptatibus ipsum minima distinctio
    tempore quo saepe aspernatur magnam quidem cumque perferendis quia dolor dolore quidem debitis.
    \<abbr>Quaerat pariatur\</abbr> praesentium placeat at debitis earum. \<i>Molestiae sint\</i> deleniti
    perspiciatis illum fugiat earum. Quia ea dignissimos facilis perferendis labore nemo ex doloribus
    eius ullam deleniti mollitia laborum nulla.
\</p>

\<dl>
    \<dt>Voluptatem nihil id eveniet\</dt>
    \<dd>Dolorem incidunt in corrupti quibusdam doloribus. Autem quam nobis.\</dd>
    
    \<dt>Accusantium ipsa incidunt quos\</dt>
    \<dd>Inventore minima quas excepturi quod itaque. Ipsum sint.\</dd>
    
    \<dt>Quaerat sint soluta\</dt>
    \<dd>Perferendis illo qui ad error repudiandae.\</dd>
    
    \<dt>Accusantium amet eum asperiores\</dt>
    \<dd>Modi nostrum cupiditate quidem tempore possimus. Sit eos qui exercitationem.\</dd>
\</dl>

\<bq>
    Explicabo dolores corrupti soluta earum quia exercitationem soluta earum consequatur accusantium
    aliquam temporibus accusamus explicabo dolore ullam sint accusamus explicabo laudantium tempore
    itaque repellat.\<br/>
     Sed cupiditate similique.
\</bq>

\<pre>\<code>&lt;ul&gt;
 &lt;li&gt;Accusantium ipsa ab sed ipsum provident doloribus. Saepe asperiores.&lt;/li&gt;
 &lt;li&gt;Aspernatur ullam commodi iusto ducimus repellendus. Nisi.&lt;/li&gt;
&lt;/ul&gt;

&lt;img src=&quot;https://picsum.photos/g/640/480/?random&quot; alt=&quot;ab inventore ullam natus deserunt mollitia repudiandae maiores&quot;/&gt;\</code>\</pre>

\<dl>
    \<dt>Architecto natus laborum necessitatibus\</dt>
    \<dd>Vitae ullam expedita assumenda pariatur maiores. Ea.\</dd>
    
    \<dt>Voluptatem ipsa\</dt>
    \<dd>Doloremque quaerat nostrum ipsam autem est cumque earum. Incidunt reiciendis.\</dd>
\</dl>

\<p>
    Dolorem veniam error rerum soluta numquam sapiente delectus asperiores.\<br/>
     Corporis voluptas vel molestiae corrupti iste \<small>quia dolore enim est\</small>. Alias sed labore
    enim molestiae. Dolore magnam cum maxime. Iusto excepturi optio maiores.
\</p>

\<img src="https://picsum.photos/g/640/480/?random" alt="quasi consequuntur ut eum voluptatum provident"/>

\<p>
    Quae nihil excepturi occaecati est \<mark>voluptatem omnis\</mark> dicta ex iure totam facere
    accusamus dolor laboriosam occaecati eligendi. \<small>Dolorem esse ducimus libero\</small> et nisi
    praesentium iste cumque nulla qui modi eligendi assumenda temporibus maiores magnam ex quas
    cupiditate maiores velit reprehenderit cupiditate earum aspernatur commodi totam cum optio
    repudiandae voluptate praesentium totam rem distinctio ab consequuntur vero asperiores.
\</p>

\<!-- nesciunt ut magnam nemo unde rerum -->

\<bq>
    Consequatur explicabo rem atque \<abbr>cupiditate est\</abbr> magni eos reprehenderit at cum quod
    temporibus tenetur \<em>exercitationem rerum\</em> eum corrupti soluta cumque quo maiores sequi
    incidunt expedita nam inventore ea id optio ea commodi in deleniti nulla necessitatibus.\<br/>
     Aspernatur ex atque fuga \<em>alias culpa accusamus\</em>.
\</bq>

\<ol>
    \<li>Aut velit tempora labore voluptas deserunt minus possimus accusamus.\</li>
    \<li>Sit aliquam ducimus laudantium quos nam.\</li>
    \<li>Velit veniam excepturi provident fuga eligendi fugiat nulla saepe repellat.\</li>
    \<li>Consequatur quae ipsum veniam ipsam officia dolorum cum.\</li>
\</ol>
\```

</p>
</details> 

## Bgaze\IpsumHtml\Ipsum

This class generates the Lorem Ipsum text. It offers three main methods :

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

## Bgaze\IpsumHtml\Html

This class offers statics methods to create HTML nodes that you can manipulate fluently, and print minified or prettyfied.

The node `__toString` method is an alias to the `prettify` method.  

There are three types of nodes, handled by a dedicated class:

### Bgaze\IpsumHtml\Nodes\PlainText

PlainText node has no attributes, content is a string.  
Any element added to a node that is not ans instance of a node class will be turned into a PlainText node.

You can create PlainTexts node with the `Html::txt` method:

```php
$txt = Html::txt('Ab illo aspernatur magnam cum at.')->append(' Sunt consequuntur numquam nisi reprehenderit distinctio fugiat aspernatur magnam cum at.');

echo $txt->minify();
echo "\n\n";
echo $txt;
echo "\n\n";
echo $txt->prettify(1, 2, 50);

/*
Ab illo aspernatur magnam cum at. Sunt consequuntur numquam nisi reprehenderit distinctio fugiat aspernatur magnam cum at.

Ab illo aspernatur magnam cum at.Sunt consequuntur numquam nisi reprehenderit distinctio fugiat
aspernatur magnam cum at.

  Ab illo aspernatur magnam cum at. Sunt
  consequuntur numquam nisi reprehenderit distinctio
  fugiat aspernatur magnam cum at.
*/
```

### Bgaze\IpsumHtml\Nodes\Comment

Comment node has no attributes, content is an array of nodes.

You can create a Comment node with the `Html::comment` method:

```php
$comment = Html::comment('Ab illo aspernatur magnam cum at.')
        ->append(Html::p('Sunt consequuntur numquam nisi reprehenderit'))
        ->append('Distinctio fugiat aspernatur magnam cum at.');

echo $comment->minify();
echo "\n\n";
echo $comment;
echo "\n\n";
echo $comment->prettify(1, 2, 50);

/*
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
 */
```

### Bgaze\IpsumHtml\Nodes\Node

Node instance has attributes, content is an array of nodes except for void elements (self closing tags) that have no content.

Thanks to `__callStatic` magic, you can create any tag by using it's name as method on `Html` class.  
Completion is provided for all non obsoletes and non experimentals tags listed on [https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5](https://developer.mozilla.org/fr/docs/Web/Guide/HTML/HTML5/Liste_des_%C3%A9l%C3%A9ments_HTML5)

There is two types of methods which signature is different :

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
