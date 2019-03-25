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

`IpsumHtml` class provides three "generator" methods, that allow to generate randomly a large amount of Lorem Ipsum HTML.

All of these methods accept into the `$tag` argument the list of tags that will be used whan generating HTML content.  
The key is the tag name and the value its weight (probability to appear).

The default tag list is :

```php
[
    'p' => 10,
    'ul' => 1,
    'ol' => 1,
    'dl' => 1,
    'bq' => 1,
    'table' => 1,
    'code' => 1,
    'img' => 1,
    'figure' => 1,
    'comment' => 1,
]
```

#### random($count, $tags = null)

Generates randomly an array of Lorem Ipsum HTML nodes.

```php
echo implode("\n\n", IpsumHtml::random(20));
```

<details>
<summary>See results</summary>
<p>

```html
<p>
    Perferendis in nihil excepturi quo labore expedita quo temporibus. Suscipit dignissimos atque
    accusamus sit sed consequuntur minima harum earum doloremque sequi labore nostrum praesentium
    officia eos consectetur deserunt officiis repudiandae <b>esse a</b> aliquid eum officia porro.
    Veritatis sed modi unde dolorum. <a href="#">Dicta ipsam in porro</a> explicabo dolorem aliquid
    cupiditate soluta.
</p>

<pre><code>&lt;ol&gt;
 &lt;li&gt;Alias nemo autem molestias sint tenetur maiores. Voluptates.&lt;/li&gt;
 &lt;li&gt;Eos iure cupiditate officia deserunt animi officiis. Laboriosam cumque assumenda.&lt;/li&gt;
 &lt;li&gt;Qui quos nobis possimus delectus voluptatibus. Eum corrupti.&lt;/li&gt;
&lt;/ol&gt;

&lt;img src=&quot;https://picsum.photos/640/480/?image=906&quot; alt=&quot;inventore neque consectetur adipisci ea nihil cumque earum asperiores&quot;/&gt;</code></pre>

<ol>
    <li>Dolorem adipisci numquam veniam id quo minus. Ex ea.</li>
    <li>Sed quia dolore harum libero porro assumenda repellendus recusandae.</li>
</ol>

<p>
    Reprehenderit occaecati cumque a. <a href="#">Vel natus maxime delectus</a> eaque architecto dolore
    veniam expedita a quam molestiae iusto fuga nam temporibus quae aspernatur dolores reprehenderit
    quidem repudiandae dolore exercitationem distinctio vero debitis veritatis iusto necessitatibus
    voluptates.
</p>

<img src="https://picsum.photos/g/640/480/?image=22" alt="veritatis et quia dolor non laboriosam voluptate quidem tempore"/>

<p>
    Ipsum voluptate dignissimos soluta nobis impedit ipsum laboriosam occaecati officia animi nam.
    Architecto ut dolore iure rem eveniet. Vitae quia neque fuga nulla. Nostrum reprehenderit excepturi
    soluta saepe earum <s>quae magnam rerum vero</s>. Sit dolorem fuga cumque ad nemo error mollitia
    <strong>voluptatem qui consectetur porro</strong> modi perspiciatis id impedit quibusdam accusamus
    <abbr>magni dolorem corrupti</abbr> ipsa odit veniam in voluptate voluptates quasi nesciunt eum
    animi quibusdam exercitationem deleniti quo.
</p>

<!--
    doloremque dicta odit quia ratione ut magnam aliquam ipsam ex eum perspiciatis omnis iste cum nobis
    impedit minus possimus assumenda debitis saepe a
    
    <bq>
        Illo quaerat in iusto maxime temporibus doloremque eaque esse minus nostrum corporis nihil animi
        tenetur perferendis officia distinctio quibusdam at voluptatem dicta iste quod placeat eveniet
        perferendis illo ut molestiae molestias cumque dicta explicabo voluptatum corrupti perspiciatis
        repudiandae labore nostrum quam sint similique quia rem omnis minus quod numquam tempora iure
        similique. Nemo eum corrupti quisquam possimus. Alias vel laborum assumenda asperiores accusantium
        eaque labore nemo quasi adipisci natus libero impedit voluptatibus.
    </bq>
    
    alias dicta aspernatur nesciunt neque eius eum voluptate nihil sint occaecati cupiditate natus animi
    soluta porro possimus quibusdam illum officiis doloribus
-->

<p>
    Illo ipsum perspiciatis tempore amet minima aliquid debitis sunt nesciunt commodi temporibus tenetur
    architecto quam facilis earum.<br/>
     Qui neque adipisci atque delectus <a href="#">deserunt recusandae</a>.<br/>
     Ab dolor consectetur iste harum et velit reprehenderit quam reiciendis corporis blanditiis
    voluptatum atque optio voluptatibus explicabo sed commodi sapiente fugit assumenda temporibus
    fugiat. Odio molestias harum rerum optio cupiditate facilis distinctio eligendi <b>quis voluptate
    cupiditate vero</b> consequatur quaerat similique rerum libero facere fugit odio corrupti quos
    <s>iure assumenda</s>. Accusantium eaque ex nihil iste soluta.
</p>

<!-- ipsa explicabo neque dolor nostrum suscipit commodi totam nam reiciendis -->

<p>
    Consectetur suscipit iste distinctio <strong>sed consequuntur nisi</strong> qui consectetur autem
    totam eaque veritatis dolore exercitationem voluptatum doloribus aut aliquam impedit tenetur sunt ad
    esse dolorum libero voluptates illo vitae dolore excepturi voluptatibus ipsum minima distinctio
    tempore quo saepe aspernatur magnam quidem cumque perferendis quia dolor dolore quidem debitis.
    <abbr>Quaerat pariatur</abbr> praesentium placeat at debitis earum. <i>Molestiae sint</i> deleniti
    perspiciatis illum fugiat earum. Quia ea dignissimos facilis perferendis labore nemo ex doloribus
    eius ullam deleniti mollitia laborum nulla.
</p>

<dl>
    <dt>Voluptatem nihil id eveniet</dt>
    <dd>Dolorem incidunt in corrupti quibusdam doloribus. Autem quam nobis.</dd>
    
    <dt>Accusantium ipsa incidunt quos</dt>
    <dd>Inventore minima quas excepturi quod itaque. Ipsum sint.</dd>
    
    <dt>Quaerat sint soluta</dt>
    <dd>Perferendis illo qui ad error repudiandae.</dd>
    
    <dt>Accusantium amet eum asperiores</dt>
    <dd>Modi nostrum cupiditate quidem tempore possimus. Sit eos qui exercitationem.</dd>
</dl>

<bq>
    Explicabo dolores corrupti soluta earum quia exercitationem soluta earum consequatur accusantium
    aliquam temporibus accusamus explicabo dolore ullam sint accusamus explicabo laudantium tempore
    itaque repellat.<br/>
     Sed cupiditate similique.
</bq>

<pre><code>&lt;ul&gt;
 &lt;li&gt;Accusantium ipsa ab sed ipsum provident doloribus. Saepe asperiores.&lt;/li&gt;
 &lt;li&gt;Aspernatur ullam commodi iusto ducimus repellendus. Nisi.&lt;/li&gt;
&lt;/ul&gt;

&lt;img src=&quot;https://picsum.photos/g/640/480/?image=703&quot; alt=&quot;ab inventore ullam natus deserunt mollitia repudiandae maiores&quot;/&gt;</code></pre>

<dl>
    <dt>Architecto natus laborum necessitatibus</dt>
    <dd>Vitae ullam expedita assumenda pariatur maiores. Ea.</dd>
    
    <dt>Voluptatem ipsa</dt>
    <dd>Doloremque quaerat nostrum ipsam autem est cumque earum. Incidunt reiciendis.</dd>
</dl>

<p>
    Dolorem veniam error rerum soluta numquam sapiente delectus asperiores.<br/>
     Corporis voluptas vel molestiae corrupti iste <small>quia dolore enim est</small>. Alias sed labore
    enim molestiae. Dolore magnam cum maxime. Iusto excepturi optio maiores.
</p>

<img src="https://picsum.photos/g/640/480?image=187" alt="quasi consequuntur ut eum voluptatum provident"/>

<p>
    Quae nihil excepturi occaecati est <mark>voluptatem omnis</mark> dicta ex iure totam facere
    accusamus dolor laboriosam occaecati eligendi. <small>Dolorem esse ducimus libero</small> et nisi
    praesentium iste cumque nulla qui modi eligendi assumenda temporibus maiores magnam ex quas
    cupiditate maiores velit reprehenderit cupiditate earum aspernatur commodi totam cum optio
    repudiandae voluptate praesentium totam rem distinctio ab consequuntur vero asperiores.
</p>

<!-- nesciunt ut magnam nemo unde rerum -->

<bq>
    Consequatur explicabo rem atque <abbr>cupiditate est</abbr> magni eos reprehenderit at cum quod
    temporibus tenetur <em>exercitationem rerum</em> eum corrupti soluta cumque quo maiores sequi
    incidunt expedita nam inventore ea id optio ea commodi in deleniti nulla necessitatibus.<br/>
     Aspernatur ex atque fuga <em>alias culpa accusamus</em>.
</bq>

<ol>
    <li>Aut velit tempora labore voluptas deserunt minus possimus accusamus.</li>
    <li>Sit aliquam ducimus laudantium quos nam.</li>
    <li>Velit veniam excepturi provident fuga eligendi fugiat nulla saepe repellat.</li>
    <li>Consequatur quae ipsum veniam ipsam officia dolorum cum.</li>
</ol>
```

</p>
</details> 

#### document($count, $tags = null)

Generate randomly an array of Lorem Ipsum HTML nodes hierarchically organised with headers (h1-h6 nodes).

```php
echo implode("\n\n", IpsumHtml::document(20));
```

<details>
<summary>See results</summary>
<p>

```html
<h1>Alias quae quis ipsam minus voluptates.</h1>

<h2>Aspernatur minima quis laboriosam blanditiis rem voluptatum perspiciatis harum.</h2>

<h3>Aspernatur quia neque tempora sint dolorum eligendi. Aperiam beatae quaerat.</h3>

<ul>
    <li>Magnam nostrum autem quas sint maxime.</li>
    <li>Ipsa sed dolores nesciunt unde mollitia animi nobis optio temporibus.</li>
    <li>Exercitationem ea dignissimos fuga harum saepe maiores. Dolore officia.</li>
    <li>Aperiam eaque numquam quaerat provident itaque. Totam officia.</li>
</ul>

<p>
    <abbr>Veritatis dicta</abbr> quae enim voluptatum facere odit qui animi harum cum. Perferendis
    inventore aspernatur amet quos hic aut consequuntur occaecati cupiditate fuga eveniet eius ducimus
    omnis deserunt placeat earum quis voluptatum quibusdam necessitatibus. <var>Et sequi ipsam
    placeat</var> amet commodi quam at reiciendis enim sint unde facere assumenda doloribus cupiditate
    deserunt nobis accusamus hic consequatur laboriosam iste similique quo <sup>eum soluta
    officiis</sup> molestiae id cumque necessitatibus aliquam id eligendi quo doloribus. <s>Dicta odit
    possimus</s> alias exercitationem provident officia eveniet delectus.
</p>

<dl>
    <dt>Sit dolor minima</dt>
    <dd>Quaerat suscipit deleniti eligendi quisquam debitis earum. Aspernatur labore.</dd>
    
    <dt>Ex est rerum hic</dt>
    <dd>Perferendis exercitationem ullam voluptas in quam quos excepturi nulla vero.</dd>
    
    <dt>Dolore soluta debitis</dt>
    <dd>Consequuntur minima veniam officia maxime possimus. Sit.</dd>
    
    <dt>Odio necessitatibus</dt>
    <dd>Eaque beatae non modi dignissimos laudantium reiciendis. Aperiam quo.</dd>
</dl>

<p>
    Aliquam eum excepturi deserunt optio necessitatibus.<br/>
     Ab sunt laboriosam omnis libero a illo et nemo debitis tempora nisi natus error culpa fugiat.
    Dolorem voluptas quam corrupti illum dolores id maxime assumenda repellendus voluptatem et amet
    excepturi fuga maxime et tempora possimus repellendus sapiente doloribus accusantium eaque autem nam
    accusamus itaque.<br/>
     Beatae explicabo ipsum similique impedit inventore neque in deserunt doloremque perspiciatis
    deserunt nobis sit ut quos quidem. Beatae adipisci velit accusamus.
</p>

<pre><code>&lt;img src=&quot;https://picsum.photos/g/640/480/?image=865&quot; alt=&quot;inventore quia eos modi aliquam ducimus nam voluptates earum&quot;/&gt;

&lt;bq&gt;
 &lt;i&gt;In recusandae&lt;/i&gt; alias aliquam rerum facilis eligendi eveniet. Quis ipsam voluptate deleniti
 repellat perferendis ab velit excepturi iste maiores voluptatem nesciunt amet laudantium cupiditate
 similique ipsa nostrum deleniti fuga.
&lt;/bq&gt;

&lt;figure&gt;
 &lt;img src=&quot;https://picsum.photos/g/640/480/?image=299&quot; alt=&quot;explicabo nesciunt ipsum reprehenderit iste pariatur&quot;/&gt;
 &lt;figcaption&gt;explicabo nesciunt ipsum reprehenderit iste pariatur&lt;/figcaption&gt;
&lt;/figure&gt;</code></pre>

<!-- dolores non ad commodi ducimus quas officiis -->

<table>
    <thead>
        <tr>
            <th>Sit officiis a</th>
            <th>Ipsum corporis officiis</th>
            <th>Fugiat hic</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nostrum harum pariatur vero</td>
            <td>Modi fuga repudiandae</td>
            <td>Perferendis beatae consequuntur quidem</td>
        </tr>
        <tr>
            <td>Nesciunt eius voluptatum expedita</td>
            <td>Quasi voluptas laboriosam laudantium</td>
            <td>Vitae modi possimus</td>
        </tr>
        <tr>
            <td>Maxime tenetur</td>
            <td>Amet minima perspiciatis</td>
            <td>Dicta non itaque</td>
        </tr>
        <tr>
            <td>Nesciunt nemo in expedita</td>
            <td>Rem optio</td>
            <td>Incidunt quas omnis quod</td>
        </tr>
        <tr>
            <td>Fugit sint cum</td>
            <td>Esse accusamus</td>
            <td>Suscipit iste error expedita</td>
        </tr>
        <tr>
            <td>Labore similique</td>
            <td>Architecto modi autem quam</td>
            <td>Nostrum tenetur</td>
        </tr>
    </tbody>
</table>

<bq>
    Illo velit commodi necessitatibus earum repellat <s>error laborum</s> sunt aliquam cupiditate animi
    quibusdam perferendis fugit dignissimos id eos sequi exercitationem voluptas <b>quas est</b> aut et
    tempora iusto. Laboriosam natus rerum voluptatibus doloremque fugit laudantium deserunt quod.
    <mark>Modi vel deleniti</mark> qui eius dolore voluptatum vero quae fugit aliquid vel maxime.
    <b>Rerum libero repudiandae tenetur</b> eos vel natus facere.
</bq>

<h2>Aperiam omnis libero impedit saepe doloribus.</h2>

<ul>
    <li>Dolor incidunt quis iure officia soluta quisquam. Perferendis laborum.</li>
    <li>Ab magnam nemo eum ducimus quos fuga expedita debitis.</li>
    <li>Consectetur nisi quam similique quibusdam itaque.</li>
</ul>

<h1>Alias sit fuga temporibus fugiat itaque. Voluptas.</h1>

<!-- quae adipisci exercitationem ipsam voluptas nihil totam occaecati fuga illum -->

<p>
    Magnam odio est optio quibusdam doloremque magni dolores adipisci. Amet veniam iure cupiditate harum
    tenetur. Ipsa amet labore veniam fuga accusamus. <b>Adipisci esse</b>.
</p>

<table>
    <thead>
        <tr>
            <th>Eos esse mollitia quod</th>
            <th>Aliquid molestias</th>
            <th>Odit dignissimos quod</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Quae esse saepe</td>
            <td>Enim nam eligendi</td>
            <td>Sed possimus</td>
        </tr>
        <tr>
            <td>Quas libero at necessitatibus</td>
            <td>Qui nisi</td>
            <td>Alias numquam error</td>
        </tr>
        <tr>
            <td>Accusantium corporis natus fuga</td>
            <td>Ipsa illum officiis</td>
            <td>Et cum</td>
        </tr>
        <tr>
            <td>Odit laudantium animi</td>
            <td>Laudantium rem similique</td>
            <td>Incidunt natus distinctio</td>
        </tr>
        <tr>
            <td>Ipsum vel</td>
            <td>Ad occaecati fugiat</td>
            <td>Alias aut quis earum</td>
        </tr>
        <tr>
            <td>Ducimus nulla</td>
            <td>Praesentium voluptatum</td>
            <td>Officia repellat</td>
        </tr>
        <tr>
            <td>Veniam suscipit voluptate nihil</td>
            <td>Consequatur beatae expedita nobis</td>
            <td>Explicabo impedit quo</td>
        </tr>
        <tr>
            <td>Aliquid totam necessitatibus maiores</td>
            <td>Quia porro</td>
            <td>Illo labore ea quidem</td>
        </tr>
        <tr>
            <td>Blanditiis perspiciatis</td>
            <td>Incidunt temporibus</td>
            <td>Dolore reprehenderit sint</td>
        </tr>
    </tbody>
</table>

<h2>Inventore exercitationem aliquid id possimus officiis. In.</h2>

<dl>
    <dt>Ullam autem rerum repudiandae</dt>
    <dd>Quae dolores in dignissimos blanditiis quos possimus.</dd>
    
    <dt>Occaecati quisquam</dt>
    <dd>Ad nihil deleniti impedit necessitatibus hic maiores repellat. Enim.</dd>
</dl>

<p>
    Iusto facere at eveniet voluptates et consequuntur sequi laudantium repudiandae <sub>nesciunt
    minus</sub> occaecati error facilis delectus ullam nemo quos est nulla. Ab dolor nemo voluptas at
    reiciendis aperiam illo vitae dolores incidunt asperiores eaque sunt ex harum rerum eligendi <em>ad
    reiciendis</em> magni voluptate blanditiis quisquam ratione ex cum impedit eveniet velit ducimus
    occaecati nam assumenda saepe.
</p>
```

</p>
</details> 

#### webpage($count, $tags = null, $lang = 'en')

Generate a complete Lorem Ipsum webpage, hierarchically organised with headers (h1-h6 nodes).

```php
echo IpsumHtml::webpage(20);
```

<details>
<summary>See results</summary>
<p>

```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Tempora possimus</title>
    </head>
    <body>
        <h1>Voluptatem sed magni quis corrupti saepe.</h1>
        
        <p>
            Consectetur ad in repellendus repudiandae <sup>neque sint natus pariatur</sup> tempora facilis optio
            vero officiis sapiente aliquam nisi quas dolorum eaque nemo cupiditate pariatur.<br/>
             Neque exercitationem omnis rerum repellat veritatis harum soluta illum. Odit numquam at tenetur sed
            corporis rem quas officiis repudiandae dolore quis eum nulla et exercitationem distinctio optio
            porro tenetur <u>voluptatem iusto cupiditate</u>.
        </p>
        
        <h2>Dicta explicabo amet dolorum temporibus saepe. Fugiat.</h2>
        
        <h2>Inventore odit ratione dolorem molestiae quibusdam. Dolor.</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Amet non ullam quisquam</th>
                    <th>Qui nisi autem hic</th>
                    <th>Suscipit aliquid mollitia debitis</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Praesentium possimus</td>
                    <td>Blanditiis corrupti</td>
                    <td>Aliquam commodi</td>
                </tr>
                <tr>
                    <td>Ipsa quis</td>
                    <td>Beatae ex molestiae</td>
                    <td>Laboriosam molestiae officiis</td>
                </tr>
                <tr>
                    <td>Unde soluta maxime</td>
                    <td>Ea expedita eveniet</td>
                    <td>Beatae iure impedit</td>
                </tr>
                <tr>
                    <td>Quidem maiores</td>
                    <td>Aspernatur quis dolorum</td>
                    <td>Odio molestias hic</td>
                </tr>
                <tr>
                    <td>Alias eius quaerat omnis</td>
                    <td>Quas cum</td>
                    <td>Ipsa quas quisquam sapiente</td>
                </tr>
                <tr>
                    <td>Eum nobis</td>
                    <td>Alias consectetur eum</td>
                    <td>Aspernatur quaerat earum repellat</td>
                </tr>
                <tr>
                    <td>Sequi autem praesentium</td>
                    <td>Dicta quod officiis tenetur</td>
                    <td>Illo facere</td>
                </tr>
                <tr>
                    <td>Ad autem illum</td>
                    <td>Velit corporis reprehenderit nulla</td>
                    <td>Magni autem unde tempore</td>
                </tr>
                <tr>
                    <td>Veritatis expedita maxime</td>
                    <td>Iste repellendus</td>
                    <td>Aut vitae</td>
                </tr>
            </tbody>
        </table>
        
        <p>
            Ipsam atque officia animi tempore repudiandae qui veniam nostrum aliquid provident perspiciatis
            voluptatem doloremque totam natus id. Aut dicta laboriosam blanditiis praesentium atque. <b>Ipsum
            nihil error</b> aperiam atque mollitia est debitis asperiores inventore adipisci ullam eum quos
            omnis <abbr>ex similique nam</abbr>. Sit modi ex libero maiores. Aut vitae veniam eum iusto maxime
            <em>voluptas quas repudiandae doloribus</em> quasi voluptas provident nam assumenda tempora
            voluptate voluptates a laudantium.
        </p>
        
        <table>
            <thead>
                <tr>
                    <th>Veritatis nulla</th>
                    <th>Velit laudantium cupiditate doloribus</th>
                    <th>Ullam ex facilis accusamus</th>
                    <th>Ducimus asperiores</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Perspiciatis tenetur</td>
                    <td>Quia facere</td>
                    <td>Sit voluptas iure fugiat</td>
                    <td>Praesentium quos cupiditate</td>
                </tr>
                <tr>
                    <td>Vel animi</td>
                    <td>Ipsa iste tenetur</td>
                    <td>Adipisci velit ut</td>
                    <td>Amet temporibus repudiandae delectus</td>
                </tr>
                <tr>
                    <td>Veritatis debitis</td>
                    <td>Animi repellendus</td>
                    <td>Optio pariatur</td>
                    <td>Voluptatem officiis</td>
                </tr>
                <tr>
                    <td>Fugit dolore rem</td>
                    <td>Dolor ut dolore voluptatibus</td>
                    <td>Corporis quam</td>
                    <td>Dignissimos laudantium cupiditate</td>
                </tr>
                <tr>
                    <td>Voluptate laborum illum</td>
                    <td>Perferendis dolor expedita quo</td>
                    <td>Accusantium esse necessitatibus repudiandae</td>
                    <td>Quam est</td>
                </tr>
                <tr>
                    <td>Dolorum eligendi quod</td>
                    <td>Eos unde</td>
                    <td>Nemo ipsam deserunt nam</td>
                    <td>Alias quasi facere</td>
                </tr>
                <tr>
                    <td>Dignissimos doloribus</td>
                    <td>Magni eius provident</td>
                    <td>Illo quia vel blanditiis</td>
                    <td>Magni non illum sapiente</td>
                </tr>
                <tr>
                    <td>Consequatur omnis accusamus</td>
                    <td>Perferendis dolores quis sapiente</td>
                    <td>Ab nisi quos</td>
                    <td>Provident mollitia</td>
                </tr>
                <tr>
                    <td>Quaerat ex maxime</td>
                    <td>Dolorem ex harum necessitatibus</td>
                    <td>Voluptatem molestiae facere temporibus</td>
                    <td>Alias aliquam vero</td>
                </tr>
            </tbody>
        </table>
        
        <h3>Vitae commodi distinctio eligendi cumque itaque. Labore.</h3>
        
        <h3>Eum dignissimos praesentium totam similique rerum nam. Quae.</h3>
        
        <p>
            <u>Dolor molestiae soluta officiis</u>. Sequi autem ducimus distinctio accusamus aspernatur sequi ut
            quis minus ipsa inventore ad aliquid blanditiis reiciendis. Eaque quia commodi harum numquam
            reprehenderit esse deserunt quidem repellat perferendis ab quos dolorum sapiente eos dolorem autem
            praesentium quas voluptates esse.
        </p>
        
        <h4>Sunt magni enim ex iure occaecati necessitatibus. Quae.</h4>
        
        <p>
            Accusantium dicta dolor numquam occaecati assumenda sequi enim eum totam in nihil praesentium
            corrupti reiciendis accusantium quasi occaecati facilis consequuntur nisi quam corrupti quas
            ducimus.
        </p>
        
        <pre><code>&lt;bq&gt;
 Dolorem autem id voluptates. &lt;a href=&quot;#&quot;&gt;Officia facere&lt;/a&gt; et ut ipsam blanditiis voluptatem veniam
 molestiae assumenda &lt;sup&gt;eos sint animi quisquam&lt;/sup&gt; ad facere at itaque corporis ea unde quidem
 accusamus dolor odio sapiente.
&lt;/bq&gt;

&lt;ul&gt;
 &lt;li&gt;Numquam quaerat ea eum laborum placeat. Nisi earum voluptatibus.&lt;/li&gt;
 &lt;li&gt;Voluptatem minima suscipit autem fuga voluptates reiciendis. Dolore esse facilis.&lt;/li&gt;
 &lt;li&gt;Quasi commodi molestiae mollitia cumque repellendus. Ad quidem.&lt;/li&gt;
 &lt;li&gt;Quae suscipit blanditiis tempore maxime vero. Excepturi dolorum quod.&lt;/li&gt;
&lt;/ul&gt;</code></pre>
        
        <p>
            Aut dolores eum corrupti officiis <small>tempora tempore</small>. Dignissimos nobis quisquam vero
            <sup>aut fuga fugiat</sup>.<br/>
             Alias iusto at officiis repellat.<br/>
             Ab omnis saepe voluptates itaque architecto exercitationem nulla repudiandae. Modi occaecati culpa
            nobis cumque delectus. Odit numquam illum necessitatibus asperiores. Quasi velit ullam in sint iste
            aut sequi velit distinctio soluta accusantium non corporis porro <sub>magnam harum hic</sub> aliquid
            vel eum iusto exercitationem laudantium molestias possimus saepe ut voluptas animi assumenda
            repudiandae reiciendis ab.
        </p>
        
        <ul>
            <li>Voluptatem quia incidunt voluptate nihil quidem fugiat reiciendis. Ab.</li>
            <li>Error maxime pariatur doloribus asperiores repellat.</li>
        </ul>
        
        <p>
            Fugit voluptas laboriosam aliquid excepturi repudiandae <small>quia iure natus</small> dolores
            magnam iste mollitia soluta recusandae dolore nisi excepturi cupiditate dolorum amet consectetur ut
            laboriosam aut quasi amet adipisci aliquam consequatur aut occaecati perspiciatis veritatis eos
            consectetur nostrum esse facilis <mark>modi fuga tempore optio</mark> non cum pariatur reiciendis
            eos ipsum fuga maiores molestias sint tempore.
        </p>
        
        <h5>Ad provident dolorum accusamus officiis repellat.</h5>
        
        <p>
            <abbr>Modi corporis nemo est</abbr> et mollitia harum a accusantium eum fuga voluptates repellat
            perferendis magnam molestias fugiat ab incidunt porro repellendus.
        </p>
        
        <figure>
            <img src="https://picsum.photos/640/480/?image=985" alt="quasi dicta ut corporis autem vel reprehenderit provident soluta earum"/>
            <figcaption>quasi dicta ut corporis autem vel reprehenderit provident soluta earum</figcaption>
        </figure>
        
        <ol>
            <li>Beatae sunt nesciunt adipisci laboriosam vel occaecati deserunt quibusdam accusamus.</li>
            <li>Sed qui enim nemo vel blanditiis voluptatum deserunt soluta.</li>
        </ol>
    </body>
</html>
```

</p>
</details> 

## Bgaze\IpsumHtml\Ipsum

This class generates the Lorem Ipsum text. It offers three main methods :

+ **str:** generates a simple string of Lorem Ipsum.
+ **sentence:** generates a simple string of Lorem Ipsum with first letter capitalized and trailing dot if requested.
+ **text:** generates a Lorem Ipsum text composed of distinct sentences and randomly decorated with HTML inline tags if requested.  
Pass a boolean to enable/disable decoration, or an array of tags to define which decorations to use.

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
